<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "ig_article_category".
 *
 * @property int $cate_id
 * @property string|null $cate_name
 *
 * @property IgArticleClassify[] $igArticleClassifies
 * @property IgArticleArticle[] $arts
 */
class IgArticleCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ig_article_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cate_id'], 'required'],
            [['cate_id'], 'integer'],
            [['cate_name'], 'string', 'max' => 20],
            [['cate_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cate_id' => 'Cate ID',
            'cate_name' => 'Cate Name',
        ];
    }

    /**
     * Gets query for [[IgArticleClassifies]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIgArticleClassifies()
    {
        return $this->hasMany(IgArticleClassify::className(), ['cate_id' => 'cate_id']);
    }

    /**
     * Gets query for [[Arts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArts()
    {
        return $this->hasMany(IgArticleArticle::className(), ['art_id' => 'art_id'])->viaTable('ig_article_classify', ['cate_id' => 'cate_id']);
    }
}
