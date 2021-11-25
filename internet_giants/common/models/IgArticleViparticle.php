<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "ig_article_viparticle".
 *
 * @property int $art_id
 * @property string|null $us_id
 * @property int|null $art_view_num
 * @property string|null $art_title
 * @property string|null $art_content
 * @property int|null $art_com_num
 * @property string|null $art_rev_date
 * @property int|null $vart_contribution
 *
 * @property IgArticleArticle $art
 * @property IgUserPublishvip[] $igUserPublishvips
 * @property IgUserVipuser[] $uses
 */
class IgArticleViparticle extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ig_article_viparticle';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['art_id'], 'required'],
            [['art_id', 'art_view_num', 'art_com_num', 'vart_contribution'], 'integer'],
            [['art_content'], 'string'],
            [['art_rev_date'], 'safe'],
            [['us_id', 'art_title'], 'string', 'max' => 255],
            [['art_id'], 'unique'],
            [['art_id'], 'exist', 'skipOnError' => true, 'targetClass' => IgArticleArticle::className(), 'targetAttribute' => ['art_id' => 'art_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'art_id' => 'Art ID',
            'us_id' => 'Us ID',
            'art_view_num' => 'Art View Num',
            'art_title' => 'Art Title',
            'art_content' => 'Art Content',
            'art_com_num' => 'Art Com Num',
            'art_rev_date' => 'Art Rev Date',
            'vart_contribution' => 'Vart Contribution',
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
     * Gets query for [[IgUserPublishvips]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIgUserPublishvips()
    {
        return $this->hasMany(IgUserPublishvip::className(), ['art_id' => 'art_id']);
    }

    /**
     * Gets query for [[Uses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUses()
    {
        return $this->hasMany(IgUserVipuser::className(), ['us_id' => 'us_id'])->viaTable('ig_user_publishvip', ['art_id' => 'art_id']);
    }
}
