<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\IgUserUser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ig-user-user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'us_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'us_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'us_mail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'us_password')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'us_contribution')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
