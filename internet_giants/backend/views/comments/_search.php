<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\IgArticleCommentsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ig-article-comments-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'com_id') ?>

    <?= $form->field($model, 'art_id') ?>

    <?= $form->field($model, 'us_id') ?>

    <?= $form->field($model, 'com_content') ?>

    <?= $form->field($model, 'com_username') ?>

    <?php // echo $form->field($model, 'com_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
