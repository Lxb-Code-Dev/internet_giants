<?php
namespace frontend\models;

/*

**author : Liuxubo 1911440
**Date : 2021/11/21

*/

use Yii;
use yii\base\Model;
use  yii\web\Session;

/**
 * Signup form
 */
class LoginForm extends Model
{
    public $us_id;
    public $us_password;
     

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['us_id', 'trim'],
            ['us_id','required'],
            ['us_id', 'string',  'max' => 255],

            ['us_password', 'required'],
            ['us_password', 'string', 'min' => 3,'max' => 18],

        ];
    }

    /**
     * login
     *
     * 
     */
    public function login()
    {
        if (!$this->validate()) {
            return null;
        }
        if(IgUserUser::find()->where(['us_id'=>$this->us_id , 'us_password'=>$this->us_password])->count()!=0)
        {
            //保留登录信息
            $session = Yii::$app->session;
            $session->open();
            $session->set('us_id', $this->us_id);
            return true;
        }
        return false;
    }

    
    
}
