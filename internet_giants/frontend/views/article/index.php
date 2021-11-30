<?php
/**
 * author: Liuxubo 1911440
 * date: 2021/11/24
 * description: 已发布文章表单
 */
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\IgArticleArticleQuery */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Ig Article Articles');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ig-article-article-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(); ?>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'art_id',
            'us_id',
            'art_view_num',
            'art_title',
            'art_content:ntext',
            //'art_com_num',
            //'art_rev_date',
            ['class' => 'yii\grid\ActionColumn'],
        ],
        

        'pager' => [//自定义分页样式以及显示内容
            'prevPageLabel'=>'上一页',
            'nextPageLabel'=>'下一页',
            'firstPageLabel' => '第一页',
            'lastPageLabel' => '最后一页',
            'options'=>['style'=>'margin-left:200px;','class'=>"pagination",],
            ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
