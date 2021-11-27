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
class MessageForm extends Model
{
    public $us1_content;
   
   

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['us1_content', 'required'],
            ['us1_content', 'string'],

         
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function leavemessage()
    {
        if (!$this->validate()) {
            return null;
        }
         //保留登录信息
         $session = Yii::$app->session;
         $session->open();
         if(!$session->get('us_id'))
         {
             return false;
         }
        $mes = new IgUserMessage();
        $mes->us_id = $session->get('us_id');
        $mes->us1_name =IgUserUser::find()->where(['us_id'=>$mes->us_id])->one()->us_name;
        $mes->us1_content=$this->us1_content;
        $datetime = new \DateTime;
        $mes->us1_date=$datetime->format('Y-m-d');
        if(IgUserMessage::find()->count()!=0)
        {
            $mes->us1_id=IgUserMessage::findBySql('SELECT us1_id FROM ig_user_message order by us1_id desc')->one()->us1_id+1;
        }
        else
        {
            $mes->us1_id=1;
        }
        $mes->save();
        
        return true;

    }

    
}
