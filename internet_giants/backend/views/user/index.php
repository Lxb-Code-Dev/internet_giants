<?php
/**
 *  author: Liuxubo 1911440
 *  date: 2021/11/24
 * 
 *  */
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\IgUserUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ig User Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ig-user-user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    

    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'us_id',
            'us_name',
            'us_mail',
           

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
