<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\IgArticleCommentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ig Article Comments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ig-article-comments-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'com_id',
            'art_id',
            'us_id',
            'com_content:ntext',
            'com_username',
            //'com_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
