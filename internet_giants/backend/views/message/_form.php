<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\IgUserMessage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ig-user-message-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'us1_id')->textInput(['readonly'=>true]) ?>

    <?= $form->field($model, 'us_id')->textInput(['maxlength' => true,'readonly'=>true]) ?>

    <?= $form->field($model, 'us1_name')->textInput(['maxlength' => true,'readonly'=>true]) ?>

    <?= $form->field($model, 'us1_content')->textarea(['rows' => 30]) ?>

    <?= $form->field($model, 'us1_date')->textInput(['readonly'=>true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
