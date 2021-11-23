<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\IgArticleArticleQuery */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ig-article-article-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'art_id') ?>

    <?= $form->field($model, 'us_id') ?>

    <?= $form->field($model, 'art_view_num') ?>

    <?= $form->field($model, 'art_title') ?>

    <?= $form->field($model, 'art_content') ?>

    <?php // echo $form->field($model, 'art_like') ?>

    <?php // echo $form->field($model, 'art_com_num') ?>

    <?php // echo $form->field($model, 'art_rev_date') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
