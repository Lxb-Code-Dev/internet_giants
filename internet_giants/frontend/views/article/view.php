<?php
/**
 * author: Liuxubo 1911440
 * date: 2021/11/24
 * description: 文章查看页面
 */
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $model app\models\IgArticleArticle */

$this->title = $model->art_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ig Article Articles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="ig-article-article-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <!-- <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->art_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->art_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p> -->

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'art_id',
            'us_id',
            'art_view_num',
            'art_title',
            'art_content:ntext',
            'art_com_num',
            'art_rev_date',
        ],
        'options'=>[ //设置整个table属性,样式
            'class'=>'table table-striped table-border detail-view'
        ]
    ]) ?>
    




    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'com_username',
            'com_content',
            'com_date',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>



<div class="site-comment">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model1, 'com_content')->textarea(['rows'=>6]) ?>
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', '评论'), ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-article -->

</div>

