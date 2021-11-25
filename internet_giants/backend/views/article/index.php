<?php
/**
 *  author: Liuxubo 1911440
 *  date: 2021/11/24
 * 
 *  */
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\IgArticleArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ig Article Articles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ig-article-article-index">

    <h1><?= Html::encode($this->title) ?></h1>

    

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
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
    ]); ?>


</div>
