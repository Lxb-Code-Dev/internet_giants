<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "ig_article_classify".
 *
 * @property int $art_id
 * @property int $cate_id
 *
 * @property IgArticleArticle $art
 * @property IgArticleCategory $cate
 */
class IgArticleClassify extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ig_article_classify';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['art_id', 'cate_id'], 'required'],
            [['art_id', 'cate_id'], 'integer'],
            [['art_id', 'cate_id'], 'unique', 'targetAttribute' => ['art_id', 'cate_id']],
            [['art_id'], 'exist', 'skipOnError' => true, 'targetClass' => IgArticleArticle::className(), 'targetAttribute' => ['art_id' => 'art_id']],
            [['cate_id'], 'exist', 'skipOnError' => true, 'targetClass' => IgArticleCategory::className(), 'targetAttribute' => ['cate_id' => 'cate_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'art_id' => 'Art ID',
            'cate_id' => 'Cate ID',
        ];
    }

    /**
     * Gets query for [[Art]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArt()
    {
        return $this->hasOne(IgArticleArticle::className(), ['art_id' => 'art_id']);
    }

    /**
     * Gets query for [[Cate]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCate()
    {
        return $this->hasOne(IgArticleCategory::className(), ['cate_id' => 'cate_id']);
    }
}
