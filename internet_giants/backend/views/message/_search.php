<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\IgUserMessageSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ig-user-message-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'us1_id') ?>

    <?= $form->field($model, 'us_id') ?>

    <?= $form->field($model, 'us1_name') ?>

    <?= $form->field($model, 'us1_content') ?>

    <?= $form->field($model, 'us1_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
