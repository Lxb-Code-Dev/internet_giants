<?php
/*
**author : Liuxubo 1911440
**Date : 2021/11/21
**descrption :
*/
namespace backend\controllers;

use Yii;
use app\models\IgUserMessage;
use app\models\IgUserUser;
use app\models\IgUserMessageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MessageController implements the CRUD actions for IgUserMessage model.
 */
class MessageController extends Controller
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
     * Lists all IgUserMessage models.
     * @return mixed
     */
    public function actionIndex()
    {
        $session=Yii::$app->session;
        if(!$session->get('us_id'))
        {
            return $this->goBack();
        }
        $searchModel = new IgUserMessageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single IgUserMessage model.
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
     * Creates a new IgUserMessage model.
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
        $model = new IgUserMessage();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->us1_id]);
        }
        $model->us_id=$session->get('us_id');
        $model->us1_name=IgUserUser::find()->where(['us_id'=>$model->us_id])->one()->us_name;
        if(IgUserMessage::find()->count()!=0)
        {
            $model->us1_id=IgUserMessage::findBySql('SELECT us1_id FROM ig_user_message order by us1_id desc')->one()->us1_id+1;
        }
        else
        {
            $model->us1_id=1;
        }
        $datetime = new \DateTime;
        $model->us1_date=$datetime->format('Y-m-d');
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing IgUserMessage model.
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
            return $this->redirect(['view', 'id' => $model->us1_id]);
        }
        

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->us1_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing IgUserMessage model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the IgUserMessage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return IgUserMessage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = IgUserMessage::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
