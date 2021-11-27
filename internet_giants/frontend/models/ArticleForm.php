<?php
namespace frontend\models;
/*

**author : Liuxubo 1911440
**Date : 2021/11/21
**descrption :实现文章发布与分类
*/

use Yii;
use yii\base\Model;
use  yii\web\Session;

/**
 * Signup form
 */
class ArticleForm extends Model
{
    
    public $art_title;
    public $cate_name;
    public $art_content;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            

            ['art_title', 'required'],
            ['art_title', 'string', 'max' => 255],

            ['cate_name', 'required'],
            ['cate_name', 'string', 'max' => 20],

            ['art_content', 'required'],
            ['art_content', 'string'],

            

        ];
    }

    /**
     * login
     *
     * 
     */
    public function publish()
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
        $this_id=null;
        if(IgUserVipuser::find()->where(['us_id'=>$session->get('us_id')])->count()==0)
        {
            $article=new IgArticleArticle();
            if(IgArticleArticle::find()->count()!=0)
            {
                $article->art_id=IgArticleArticle::findBySql('SELECT art_id FROM ig_article_article order by art_id desc')->one()->art_id+1;
            }
            else
            {
                $article->art_id=1;
            }
            $article->us_id=$session->get('us_id');
            $article->art_title=$this->art_title;
            $article->art_content=$this->art_content;
            $article->art_view_num=0;
            $article->art_com_num=0;
            $datetime = new \DateTime;
            $article->art_rev_date=$datetime->format('Y-m-d');
            $this_id=$article->art_id;
            $article->save();
        }
        else
        {
            
        
            $article=new IgArticleViparticle();
            if(IgArticleArticle::find()->count()!=0)
            {
                $article->art_id=IgArticleArticle::findBySql('SELECT art_id FROM ig_article_article order by art_id desc')->one()->art_id+1;
            }
            else
            {
                $article->art_id=1;
            }
            $article->us_id=$session->get('us_id');
            $article->art_title=$this->art_title;
            $article->art_content=$this->art_content;
            $article->art_view_num=0;
            $article->art_com_num=1;
            $datetime = new \DateTime;
            $article->art_rev_date=$datetime->format('Y-m-d');
            $article->vart_contribution=IgUserVipuser::find()->where(['us_id'=>$session->get('us_id')])->one()->vs_level;
            //$article->save();
            $sql = " INSERT INTO `ig_article_viparticle`  VALUES ($article->art_id, '$article->us_id', $article->art_view_num,'$article->art_title','$article->art_content',$article->art_com_num,'$article->art_rev_date', $article->vart_contribution) ";
            $connection = Yii::$app->db;
            //$command=$connection->createCommand($sql);

            $connection->createCommand($sql)->execute();


            $this_id=$article->art_id;

        }
        
        //生成初始评论
        $com=new IgArticleComments();
        $com->art_id=$this_id;
        if(IgArticleComments::find()->count()!=0)
        {$com->com_id=IgArticleComments::findBySql('SELECT com_id FROM ig_article_comments order by com_id desc')->one()->com_id+1;}
        else
        {$com->com_id=1;}
        $com->us_id=$session->get('us_id');
        $com->com_username=IgUserUser::find()->where(['us_id'=>$com->us_id])->one()->us_name;
        $com->com_content='感谢观看';
        $datetime = new \DateTime;
        $com->com_date=$datetime->format('Y-m-d');
        $com->save();

        
        if(IgArticleCategory::find()->andWhere(['cate_name'=>$this->cate_name])->count()!=0)
        {
            $IAC=new IgArticleClassify();
            $IAC->art_id=$this_id;
            $IAC->cate_id=IgArticleCategory::find()->andWhere(['cate_name'=>$this->cate_name])->one()->cate_id;
            $IAC->save();
            return true;
        }
        $cate=new IgArticleCategory();
        if(IgArticleCategory::find()->count()!=0)
        {
            $cate->cate_id=IgArticleCategory::findBySql('SELECT cate_id FROM ig_article_category order by cate_id desc')->one()->cate_id+1;
        }
        else
        {
            $cate->cate_id=1;
        }
        $cate->cate_name=$this->cate_name;
        $cate->save();
        $IAC=new IgArticleClassify();
        $IAC->art_id=$this_id;
        $IAC->cate_id=$cate->cate_id;
        $IAC->save();
        return true;

    }

    

    
}
