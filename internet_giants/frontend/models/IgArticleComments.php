<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "ig_article_comments".
 *
 * @property int $com_id
 * @property int|null $art_id
 * @property string|null $us_id
 * @property string|null $com_content
 * @property string|null $com_username
 * @property string|null $com_date
 *
 * @property IgArticleArticle $art
 * @property IgUserUser $us
 */
class IgArticleComments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ig_article_comments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['com_id'], 'required'],
            [['com_id', 'art_id'], 'integer'],
            [['com_content'], 'string'],
            [['com_date'], 'safe'],
            [['us_id', 'com_username'], 'string', 'max' => 255],
            [['com_id'], 'unique'],
            [['art_id'], 'exist', 'skipOnError' => true, 'targetClass' => IgArticleArticle::className(), 'targetAttribute' => ['art_id' => 'art_id']],
            [['us_id'], 'exist', 'skipOnError' => true, 'targetClass' => IgUserUser::className(), 'targetAttribute' => ['us_id' => 'us_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'com_id' => 'Com ID',
            'art_id' => 'Art ID',
            'us_id' => 'Us ID',
            'com_content' => 'Com Content',
            'com_username' => 'Com Username',
            'com_date' => 'Com Date',
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
     * Gets query for [[Us]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUs()
    {
        return $this->hasOne(IgUserUser::className(), ['us_id' => 'us_id']);
    }
}
