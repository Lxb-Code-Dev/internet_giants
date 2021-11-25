<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "ig_user_read".
 *
 * @property string $us_id
 * @property int $art_id
 *
 * @property IgUserUser $us
 * @property IgArticleArticle $art
 */
class IgUserRead extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ig_user_read';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['us_id', 'art_id'], 'required'],
            [['art_id'], 'integer'],
            [['us_id'], 'string', 'max' => 255],
            [['us_id', 'art_id'], 'unique', 'targetAttribute' => ['us_id', 'art_id']],
            [['us_id'], 'exist', 'skipOnError' => true, 'targetClass' => IgUserUser::className(), 'targetAttribute' => ['us_id' => 'us_id']],
            [['art_id'], 'exist', 'skipOnError' => true, 'targetClass' => IgArticleArticle::className(), 'targetAttribute' => ['art_id' => 'art_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'us_id' => 'Us ID',
            'art_id' => 'Art ID',
        ];
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

    /**
     * Gets query for [[Art]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArt()
    {
        return $this->hasOne(IgArticleArticle::className(), ['art_id' => 'art_id']);
    }
}
