<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%ig_article_article}}".
 *
 * @property string $art_id
 * @property string|null $us_id
 * @property int|null $art_view_num
 * @property string|null $art_title
 * @property string|null $art_content
 * @property int|null $art_like
 * @property int|null $art_com_num
 * @property string|null $art_rev_date
 *
 * @property IgUserUser $us
 * @property IgArticleClassify[] $igArticleClassifies
 * @property IgArticleCategory[] $cates
 * @property IgArticleComment[] $igArticleComments
 * @property IgArticleViparticle $igArticleViparticle
 * @property IgUserRead[] $igUserReads
 * @property IgUserUser[] $uses
 */
class IgArticleArticle extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%ig_article_article}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['art_id'], 'required'],
            [['art_view_num', 'art_like', 'art_com_num'], 'integer'],
            [['art_content'], 'string'],
            [['art_rev_date'], 'safe'],
            [['art_id', 'us_id', 'art_title'], 'string', 'max' => 255],
            [['art_id'], 'unique'],
            [['us_id'], 'exist', 'skipOnError' => true, 'targetClass' => IgUserUser::className(), 'targetAttribute' => ['us_id' => 'us_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'art_id' => Yii::t('app', 'Art ID'),
            'us_id' => Yii::t('app', 'Us ID'),
            'art_view_num' => Yii::t('app', 'Art View Num'),
            'art_title' => Yii::t('app', 'Art Title'),
            'art_content' => Yii::t('app', 'Art Content'),
            'art_like' => Yii::t('app', 'Art Like'),
            'art_com_num' => Yii::t('app', 'Art Com Num'),
            'art_rev_date' => Yii::t('app', 'Art Rev Date'),
        ];
    }

    /**
     * Gets query for [[Us]].
     *
     * @return \yii\db\ActiveQuery|IgUserUserQuery
     */
    public function getUs()
    {
        return $this->hasOne(IgUserUser::className(), ['us_id' => 'us_id']);
    }

    /**
     * Gets query for [[IgArticleClassifies]].
     *
     * @return \yii\db\ActiveQuery|IgArticleClassifyQuery
     */
    public function getIgArticleClassifies()
    {
        return $this->hasMany(IgArticleClassify::className(), ['art_id' => 'art_id']);
    }

    /**
     * Gets query for [[Cates]].
     *
     * @return \yii\db\ActiveQuery|IgArticleCategoryQuery
     */
    public function getCates()
    {
        return $this->hasMany(IgArticleCategory::className(), ['cate_id' => 'cate_id'])->viaTable('{{%ig_article_classify}}', ['art_id' => 'art_id']);
    }

    /**
     * Gets query for [[IgArticleComments]].
     *
     * @return \yii\db\ActiveQuery|IgArticleCommentQuery
     */
    public function getIgArticleComments()
    {
        return $this->hasMany(IgArticleComment::className(), ['art_id' => 'art_id']);
    }

    /**
     * Gets query for [[IgArticleViparticle]].
     *
     * @return \yii\db\ActiveQuery|IgArticleViparticleQuery
     */
    public function getIgArticleViparticle()
    {
        return $this->hasOne(IgArticleViparticle::className(), ['art_id' => 'art_id']);
    }

    /**
     * Gets query for [[IgUserReads]].
     *
     * @return \yii\db\ActiveQuery|IgUserReadQuery
     */
    public function getIgUserReads()
    {
        return $this->hasMany(IgUserRead::className(), ['art_id' => 'art_id']);
    }

    /**
     * Gets query for [[Uses]].
     *
     * @return \yii\db\ActiveQuery|IgUserUserQuery
     */
    public function getUses()
    {
        return $this->hasMany(IgUserUser::className(), ['us_id' => 'us_id'])->viaTable('{{%ig_user_read}}', ['art_id' => 'art_id']);
    }

    /**
     * {@inheritdoc}
     * @return IgArticleArticleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new IgArticleArticleQuery(get_called_class());
    }
}
