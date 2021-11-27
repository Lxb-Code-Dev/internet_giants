<?php
/**
 *  author: Liuxubo 1911440
 *  date: 2021/11/23
 * 
 *  */
namespace frontend\models;

/**
 * This is the ActiveQuery class for [[IgArticleArticle]].
 *
 * @see IgArticleArticle
 */
class IgArticleArticleQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return IgArticleArticle[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return IgArticleArticle|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
