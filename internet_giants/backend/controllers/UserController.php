<?php
/*

**author : Liuxubo 1911440
**Date : 2021/11/21
**descrption :
*/
namespace backend\controllers;

use Yii;
use app\models\IgUserUser;
use app\models\IgUserUserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for IgUserUser model.
 */
class UserController extends Controller
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
     * Lists all IgUserUser models.
     * @return mixed
     */
    public function actionIndex()
    {
        $session=Yii::$app->session;
        if(!$session->get('us_id'))
        {
            return $this->goBack();
        }
        $searchModel = new IgUserUserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single IgUserUser model.
     * @param string $id
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
     * Creates a new IgUserUser model.
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
        $model = new IgUserUser();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->us_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing IgUserUser model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->us_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing IgUserUser model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
       
        $connection = Yii::$app->db;
        //创建事务
        $transaction = $connection->beginTransaction();
        $connection ->createCommand()
        ->delete('ig_user_publishvip', "us_id ='$id'")
        ->execute();
        $connection ->createCommand()
        ->delete('ig_article_viparticle', "us_id ='$id'")
        ->execute();
        $connection ->createCommand()
        ->delete('ig_user_vipuser', "us_id ='$id'")
        ->execute();
        $connection ->createCommand()
        ->delete('ig_user_user', "us_id ='$id'")
        ->execute();
        $transaction->commit();
    
    return $this->redirect(['index']);
    }

    /**
     * Finds the IgUserUser model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return IgUserUser the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = IgUserUser::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
