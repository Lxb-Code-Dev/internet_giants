<?php

/**
 * Team:Internet-giants, NKU
 * Coding by liuxubo , 2021/11/21
 * This is the main controller
 */

namespace frontend\controllers;

use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\models\ArticleForm;
use frontend\models\MessageForm;
use  yii\web\Session;

/**
 * Site controller
 */
class SiteController extends Controller
{
    public $layout = "main_layout";
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup', 'hsz'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
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
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        $this->layout = "main";
        $session = Yii::$app->session;
        $session->open();
        
        if ($session->get('us_id')) {
            //echo $session->get('us_id');
            return $this->goBack();
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->us_password = '';
            $model->us_id=$session->get('us_id');
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionIglogout()
    {
        $this->layout = "main";
        $session = Yii::$app->session;
        $session->open();
        $session->removeAll();
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->us_password = '';
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionLeaveamessage()
    {
        $model = new MessageForm();
        if ($model->load(Yii::$app->request->post()) && $model->leavemessage()) {
             $this->goBack();
        } else {
            return $this->render('leaveamessage', [
                'model' => $model,
            ]);
        }
    }



    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $this->layout = "main";
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

   
    

    /**
     * display teamwork
     */
    public function actionWorkteam(){
        // return $this->render('workteam');
        $workteams = [
            ['name' => '作业压缩包链接', 'namecontent' => 'https://pan.baidu.com/s/1y4e3OyIbPOqMjf13IFKjlA'],
        ];
        return $this->render('workteam', ['workteams' => $workteams]);
    }
    /**
     * display lxb-work
     */
    public function actionWorklxb(){
        $singlework = [
            ['name' => '作业压缩包链接', 'namecontent' => 'https://pan.baidu.com/s/1y4e3OyIbPOqMjf13IFKjlA'],
        ];
        return $this->render('worklxb', ['singlework' => $singlework]);
    }
     
    /**
     * display zyl-work
     */
    public function actionWorkzyl(){
        $singlework = [
            ['name' => '作业压缩包链接', 'namecontent' => 'https://pan.baidu.com/s/1YzDEqgFUzMgWef76TdKLgQ'],
        ];
        return $this->render('workzyl', ['singlework' => $singlework]);
    }
    /**
     * display msy-work
     */
    public function actionWorkmsy(){
        $singlework = [
            ['name' => '作业压缩包链接', 'namecontent' => 'https://pan.baidu.com/s/15dwGwE7_ADMKwLbVeXV1tA'],
        ];
        return $this->render('workmsy', ['singlework' => $singlework]);
    }
    /**
     * display wwr-work
     */
    public function actionWorkwwr(){
        $singlework = [
            ['name' => '作业压缩包链接', 'namecontent' => 'https://pan.baidu.com/s/1X4sHfoaDjpLTXyqHZIAzRw'],
        ];
        return $this->render('workwwr', ['singlework' => $singlework]);
    }
    

    /**
     * display map
     */
   

    public function actionArticle()
    {
        
        $model = new ArticleForm();
    
        if ($model->load(Yii::$app->request->post()) && $model->publish()) {
            return $this->goBack();
        }
        
        return $this->render('article', [
            'model' => $model,
        ]);
    }


    public function actionViewarticle()
    {
        $model = new CommentForm();
    
        if ($model->load(Yii::$app->request->post()) && $model->getArticle()) {
            return $this->goBack();
        }
    
        return $this->render('article', [
            'model' => $model,
        ]);
    }

}

    
