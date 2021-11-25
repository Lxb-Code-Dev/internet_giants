<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\IgArticleComments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ig-article-comments-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'com_id')->textInput(['readonly'=>true]) ?>

    <?= $form->field($model, 'art_id')->textInput(['readonly'=>true]) ?>

    <?= $form->field($model, 'us_id')->textInput(['maxlength' => true,'readonly'=>true]) ?>

    <?= $form->field($model, 'com_content')->textarea(['rows' => 10,'readonly'=>true]) ?>

    <?= $form->field($model, 'com_username')->textInput(['maxlength' => true,'readonly'=>true]) ?>

    <?= $form->field($model, 'com_date')->textInput(['readonly'=>true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
