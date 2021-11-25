<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\IgUserMessage */

$this->title = $model->us1_id;
$this->params['breadcrumbs'][] = ['label' => 'Ig User Messages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="ig-user-message-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        
        <?= Html::a('Delete', ['delete', 'id' => $model->us1_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'us1_id',
            'us_id',
            'us1_name',
            'us1_content:ntext',
            'us1_date',
        ],
    ]) ?>

</div>
