<?php
/**
 *  author: Liuxubo 1911440
 *  date: 2021/11/24
 * 
 *  */
namespace frontend\controllers;

use Yii;
use frontend\models\IgArticleArticle;
use frontend\models\IgArticleArticleSearch;
use frontend\models\IgUserRead;
use frontend\models\CommentForm;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\IgArticleComments;
use yii\data\ActiveDataProvider;

/**
 * ArticleController implements the CRUD actions for IgArticleArticle model.
 */
class ArticleController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public  $layout = "main_layout";
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all IgArticleArticle models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new IgArticleArticleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single IgArticleArticle model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model=new CommentForm();
        //记录浏览记录
        $model->increaseview($this->findModel($id));
        //显示输出评论
        $query=IgArticleComments::find()->where(['art_id'=>$this->findModel($id)->art_id]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $mm=$this->findModel($id);
        $mm->art_view_num=$mm->art_view_num+1;
        $mm->save();
        
        $session = Yii::$app->session;
        $session->open();
        if(!IgUserRead::find()->andWhere(['art_id'=>$this->findModel($id)->art_id, 'us_id'=>$session->get('us_id')])->count())
        {
            $read=new IgUserRead();
            $read->us_id=$session->get('us_id');
            $read->art_id=$this->findModel($id)->art_id;
            $read->save();
        }
        
        
        if ($model->load(Yii::$app->request->post()) && $model->leaveamessage($this->findModel($id)) ) {
            $model->com_content='';
       } else {
            return $this->render('view', [
                'model' => $this->findModel($id),
                'model1'=>$model,
                'dataProvider'=>$dataProvider,
            ]);
       }

       return $this->render('view', [
        'model' => $this->findModel($id),
        'model1'=>$model,
        'dataProvider'=>$dataProvider,
    ]);

        
    }

    /**
     * Creates a new IgArticleArticle model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new IgArticleArticle();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->art_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing IgArticleArticle model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $session = Yii::$app->session;
        $session->open();
        if(IgArticleArticle::find()->where(['art_id'=>$id ])->one()->us_id==$session->get('us_id'))
        {
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->art_id]);
            }
            return $this->render('update', [
                'model' => $model,
            ]);
        }
        return $this->redirect(['view', 'id' => $model->art_id]);
    }

    /**
     * Deletes an existing IgArticleArticle model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {

        $session = Yii::$app->session;
        $session->open();
        if(IgArticleArticle::find()->where(['art_id'=>$id ])->one()->us_id==$session->get('us_id'))
        {
            $connection = Yii::$app->db;
            //创建事务
            $transaction = $connection->beginTransaction();
            $connection ->createCommand()
            ->delete('ig_article_viparticle', "art_id ='$id'")
            ->execute();
            $connection ->createCommand()
            ->delete('ig_article_article', "art_id ='$id'")
            ->execute();
            $transaction->commit();
            
        }
        return $this->redirect(['index']);
    }

    /**
     * Finds the IgArticleArticle model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return IgArticleArticle the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = IgArticleArticle::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
