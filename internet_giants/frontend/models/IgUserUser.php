<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%ig_user_user}}".
 *
 * @property string $us_id
 * @property string|null $us_name
 * @property string|null $us_mail
 * @property string|null $us_password
 * @property int|null $us_fan_num
 * @property int|null $us_sub_num
 * @property int|null $us_contribution
 *
 * @property IgArticleArticle[] $igArticleArticles
 * @property IgArticleComment[] $igArticleComments
 * @property IgUserRead[] $igUserReads
 * @property IgArticleArticle[] $arts
 * @property IgUserSubscribe[] $igUserSubscribes
 * @property IgUserSubscribe[] $igUserSubscribes0
 * @property IgUserUser[] $iGUses
 * @property IgUserUser[] $uses
 * @property IgUserVipuser $igUserVipuser
 */
class IgUserUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%ig_user_user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['us_id'], 'required'],
            [['us_fan_num', 'us_sub_num', 'us_contribution'], 'integer'],
            [['us_id', 'us_name', 'us_mail', 'us_password'], 'string', 'max' => 255],
            [['us_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'us_id' => Yii::t('app', 'Us ID'),
            'us_name' => Yii::t('app', 'Us Name'),
            'us_mail' => Yii::t('app', 'Us Mail'),
            'us_password' => Yii::t('app', 'Us Password'),
            'us_fan_num' => Yii::t('app', 'Us Fan Num'),
            'us_sub_num' => Yii::t('app', 'Us Sub Num'),
            'us_contribution' => Yii::t('app', 'Us Contribution'),
        ];
    }

    /**
     * Gets query for [[IgArticleArticles]].
     *
     * @return \yii\db\ActiveQuery|IgArticleArticleQuery
     */
    public function getIgArticleArticles()
    {
        return $this->hasMany(IgArticleArticle::className(), ['us_id' => 'us_id']);
    }

    /**
     * Gets query for [[IgArticleComments]].
     *
     * @return \yii\db\ActiveQuery|IgArticleCommentQuery
     */
    public function getIgArticleComments()
    {
        return $this->hasMany(IgArticleComment::className(), ['us_id' => 'us_id']);
    }

    /**
     * Gets query for [[IgUserReads]].
     *
     * @return \yii\db\ActiveQuery|IgUserReadQuery
     */
    public function getIgUserReads()
    {
        return $this->hasMany(IgUserRead::className(), ['us_id' => 'us_id']);
    }

    /**
     * Gets query for [[Arts]].
     *
     * @return \yii\db\ActiveQuery|IgArticleArticleQuery
     */
    public function getArts()
    {
        return $this->hasMany(IgArticleArticle::className(), ['art_id' => 'art_id'])->viaTable('{{%ig_user_read}}', ['us_id' => 'us_id']);
    }

    /**
     * Gets query for [[IgUserSubscribes]].
     *
     * @return \yii\db\ActiveQuery|IgUserSubscribeQuery
     */
    public function getIgUserSubscribes()
    {
        return $this->hasMany(IgUserSubscribe::className(), ['us_id' => 'us_id']);
    }

    /**
     * Gets query for [[IgUserSubscribes0]].
     *
     * @return \yii\db\ActiveQuery|IgUserSubscribeQuery
     */
    public function getIgUserSubscribes0()
    {
        return $this->hasMany(IgUserSubscribe::className(), ['IG__us_id' => 'us_id']);
    }

    /**
     * Gets query for [[IGUses]].
     *
     * @return \yii\db\ActiveQuery|IgUserUserQuery
     */
    public function getIGUses()
    {
        return $this->hasMany(IgUserUser::className(), ['us_id' => 'IG__us_id'])->viaTable('{{%ig_user_subscribe}}', ['us_id' => 'us_id']);
    }

    /**
     * Gets query for [[Uses]].
     *
     * @return \yii\db\ActiveQuery|IgUserUserQuery
     */
    public function getUses()
    {
        return $this->hasMany(IgUserUser::className(), ['us_id' => 'us_id'])->viaTable('{{%ig_user_subscribe}}', ['IG__us_id' => 'us_id']);
    }

    /**
     * Gets query for [[IgUserVipuser]].
     *
     * @return \yii\db\ActiveQuery|IgUserVipuserQuery
     */
    public function getIgUserVipuser()
    {
        return $this->hasOne(IgUserVipuser::className(), ['us_id' => 'us_id']);
    }

    /**
     * {@inheritdoc}
     * @return IgUserUserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new IgUserUserQuery(get_called_class());
    }
}
