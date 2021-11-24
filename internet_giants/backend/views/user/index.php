<?php

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

    <p>
        <?= Html::a('Create Ig User User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'us_id',
            'us_name',
            'us_mail',
            'us_password',
            'us_contribution',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
