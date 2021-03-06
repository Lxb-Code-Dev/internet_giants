<?php
namespace backend\controllers;
/*
**author : Liuxubo 1911440
**Date : 2021/11/21
**descrption :
*/
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\models\LoginForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    public $layout="main";
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['iglogout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'iglogout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
       
            $this->layout="main_layout";
            return $this->render('index');
        
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        
        $session = Yii::$app->session;
        if($session->get('us_id'))
        {
            $session->removeAll();
            $this->layout="main_layout";
            return $this->render('index');
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $this->layout="main_layout";
            return $this->render('index');
        } else {
            $model->us_password = '';
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionIglogout()
    {
        $session = Yii::$app->session;
        $session->removeAll();
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $this->layout="main_layout";
            return $this->render('index');
        } else {
            $model->us_password = '';
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }


   


}
