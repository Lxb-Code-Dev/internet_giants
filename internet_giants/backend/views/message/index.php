<?php
/**
 *  author: Liuxubo 1911440
 *  date: 2021/11/24
 * 
 *  */
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\IgUserMessageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ig User Messages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ig-user-message-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Ig User Message', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'us1_id',
            'us_id',
            'us1_name',
            'us1_content:ntext',
            'us1_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
