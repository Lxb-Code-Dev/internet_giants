<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ig_user_vipuser".
 *
 * @property string $us_id
 * @property string|null $us_name
 * @property string|null $us_mail
 * @property string|null $us_password
 * @property int|null $us_contribution
 * @property int|null $vs_level
 *
 * @property IgUserPublishvip[] $igUserPublishvips
 * @property IgArticleViparticle[] $arts
 * @property IgUserUser $us
 */
class IgUserVipuser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ig_user_vipuser';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['us_id'], 'required'],
            [['us_contribution', 'vs_level'], 'integer'],
            [['us_id', 'us_mail', 'us_password'], 'string', 'max' => 255],
            [['us_name'], 'string', 'max' => 20],
            [['us_id'], 'unique'],
            [['us_id'], 'exist', 'skipOnError' => true, 'targetClass' => IgUserUser::className(), 'targetAttribute' => ['us_id' => 'us_id']],
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
            'vs_level' => 'Vs Level',
        ];
    }

    /**
     * Gets query for [[IgUserPublishvips]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIgUserPublishvips()
    {
        return $this->hasMany(IgUserPublishvip::className(), ['us_id' => 'us_id']);
    }

    /**
     * Gets query for [[Arts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArts()
    {
        return $this->hasMany(IgArticleViparticle::className(), ['art_id' => 'art_id'])->viaTable('ig_user_publishvip', ['us_id' => 'us_id']);
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
