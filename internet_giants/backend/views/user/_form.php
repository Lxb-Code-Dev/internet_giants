<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\IgUserUser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ig-user-user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'us_id')->textInput(['maxlength' => true,'readonly'=>true]) ?>

    <?= $form->field($model, 'us_name')->textInput(['maxlength' => true,'readonly'=>true]) ?>

    <?= $form->field($model, 'us_mail')->textInput(['maxlength' => true,'readonly'=>true]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
