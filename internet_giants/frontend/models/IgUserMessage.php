<?php
/**
 *  author: Liuxubo 1911440
 *  date: 2021/11/24
 * 
 *  */
namespace frontend\models;

use Yii;

/**
 * This is the model class for table "ig_user_message".
 *
 * @property int $us1_id
 * @property string|null $us_id
 * @property string|null $us1_name
 * @property string|null $us1_content
 * @property string|null $us1_date
 *
 * @property IgUserUser $us
 */
class IgUserMessage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ig_user_message';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['us1_id'], 'required'],
            [['us1_id'], 'integer'],
            [['us1_content'], 'string'],
            [['us1_date'], 'safe'],
            [['us_id'], 'string', 'max' => 255],
            [['us1_name'], 'string', 'max' => 20],
            [['us1_id'], 'unique'],
            [['us_id'], 'exist', 'skipOnError' => true, 'targetClass' => IgUserUser::className(), 'targetAttribute' => ['us_id' => 'us_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'us1_id' => 'Us1 ID',
            'us_id' => 'Us ID',
            'us1_name' => 'Us1 Name',
            'us1_content' => 'Us1 Content',
            'us1_date' => 'Us1 Date',
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
}
