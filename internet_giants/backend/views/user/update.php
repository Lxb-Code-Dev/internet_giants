<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\IgUserUser */

$this->title = 'Update Ig User User: ' . $model->us_id;
$this->params['breadcrumbs'][] = ['label' => 'Ig User Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->us_id, 'url' => ['view', 'id' => $model->us_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ig-user-user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
