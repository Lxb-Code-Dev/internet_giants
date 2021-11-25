<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\IgUserMessage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ig-user-message-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'us1_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'us_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'us1_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'us1_content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'us1_date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
