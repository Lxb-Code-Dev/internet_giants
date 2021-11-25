<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\IgUserMessage */

$this->title = 'Update Ig User Message: ' . $model->us1_id;
$this->params['breadcrumbs'][] = ['label' => 'Ig User Messages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->us1_id, 'url' => ['view', 'id' => $model->us1_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ig-user-message-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
