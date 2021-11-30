<?php
/**
 *  author: Liuxubo 1911440
 *  date: 2021/11/24
 * 
 *  */
namespace backend\controllers;

use Yii;
use app\models\IgArticleArticle;
use app\models\IgArticleArticleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ArticleController implements the CRUD actions for IgArticleArticle model.
 */
class ArticleController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public  $layout = "new_layout";
    
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
        $session=Yii::$app->session;
        if(!$session->get('us_id'))
        {
            return $this->goBack();
        }
        $searchModel = new IgArticleArticleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single IgArticleArticle model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $session=Yii::$app->session;
        if(!$session->get('us_id'))
        {
            return $this->goBack();
        }
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new IgArticleArticle model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $session=Yii::$app->session;
        if(!$session->get('us_id'))
        {
            return $this->goBack();
        }
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
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $session=Yii::$app->session;
        if(!$session->get('us_id'))
        {
            return $this->goBack();
        }
        $model = $this->findModel($id);
        if($session->get('us_id')!=$this->findModel($id)->us_id)
        {
            return $this->redirect(['view', 'id' => $model->art_id]);
        }
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->art_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing IgArticleArticle model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $session=Yii::$app->session;
        if(!$session->get('us_id'))
        {
            return $this->goBack();
        }
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
        
        return $this->redirect(['index']);
    }

    /**
     * Finds the IgArticleArticle model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return IgArticleArticle the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = IgArticleArticle::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
