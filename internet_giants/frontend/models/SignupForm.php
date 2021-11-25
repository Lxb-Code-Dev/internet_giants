<?php
namespace frontend\models;

/*

**author : Liuxubo 1911440
**Date : 2021/11/21

*/

use Yii;
use yii\base\Model;


/**
 * Signup form
 */
class SignupForm extends Model
{
    public $us_id;
    public $us_name;
    public $us_mail;
    public $us_password;
   

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['us_id', 'trim'],
            ['us_id','required'],
            ['us_id', 'unique', 'targetClass' => '\frontend\models\IgUserUser', 'message' => 'This username has already been taken.'],
            ['us_id', 'string',  'max' => 255],

            ['us_name', 'required'],
            ['us_name', 'string', 'min' => 2, 'max' => 255],
            
            ['us_mail', 'trim'],
            ['us_mail', 'required'],
            ['us_mail', 'email'],
            ['us_mail', 'string', 'max' => 255],
            ['us_mail', 'unique', 'targetClass' => '\frontend\models\IgUserUser', 'message' => 'This email address has already been taken.'],

            ['us_password', 'required'],
            ['us_password', 'string', 'min' => 3],

         
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new IgUserUser();
        $user->us_id = $this->us_id;
        $user->us_name = $this->us_name;
        $user->us_mail = $this->us_mail;
        $user->us_password=$this->us_password;
        $user->us_contribution=0;
        return $user->save();

    }

    
}
