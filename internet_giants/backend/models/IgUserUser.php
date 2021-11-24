<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ig_user_user".
 *
 * @property string $us_id
 * @property string|null $us_name
 * @property string|null $us_mail
 * @property string|null $us_password
 * @property int|null $us_contribution
 *
 * @property IgArticleArticle[] $igArticleArticles
 * @property IgArticleComments[] $igArticleComments
 * @property IgUserMessage[] $igUserMessages
 * @property IgUserRead[] $igUserReads
 * @property IgArticleArticle[] $arts
 * @property IgUserVipuser $igUserVipuser
 */
class IgUserUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ig_user_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['us_id'], 'required'],
            [['us_contribution'], 'integer'],
            [['us_id', 'us_mail', 'us_password'], 'string', 'max' => 255],
            [['us_name'], 'string', 'max' => 20],
            [['us_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'us_id' => 'Us ID',
            'us_name' => 'Us Name',
            'us_mail' => 'Us Mail',
            'us_password' => 'Us Password',
            'us_contribution' => 'Us Contribution',
        ];
    }

    /**
     * Gets query for [[IgArticleArticles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIgArticleArticles()
    {
        return $this->hasMany(IgArticleArticle::className(), ['us_id' => 'us_id']);
    }

    /**
     * Gets query for [[IgArticleComments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIgArticleComments()
    {
        return $this->hasMany(IgArticleComments::className(), ['us_id' => 'us_id']);
    }

    /**
     * Gets query for [[IgUserMessages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIgUserMessages()
    {
        return $this->hasMany(IgUserMessage::className(), ['us_id' => 'us_id']);
    }

    /**
     * Gets query for [[IgUserReads]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIgUserReads()
    {
        return $this->hasMany(IgUserRead::className(), ['us_id' => 'us_id']);
    }

    /**
     * Gets query for [[Arts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArts()
    {
        return $this->hasMany(IgArticleArticle::className(), ['art_id' => 'art_id'])->viaTable('ig_user_read', ['us_id' => 'us_id']);
    }

    /**
     * Gets query for [[IgUserVipuser]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIgUserVipuser()
    {
        return $this->hasOne(IgUserVipuser::className(), ['us_id' => 'us_id']);
    }
}
