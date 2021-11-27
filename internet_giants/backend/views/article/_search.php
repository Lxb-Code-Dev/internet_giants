<?php
/**
 *  author: Liuxubo 1911440
 *  date: 2021/11/24
 * 
 *  */
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\IgArticleArticleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ig-article-article-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'art_id') ?>

    <?= $form->field($model, 'us_id') ?>

    <?= $form->field($model, 'art_view_num') ?>

    <?= $form->field($model, 'art_title') ?>

    <?= $form->field($model, 'art_content') ?>

    <?php // echo $form->field($model, 'art_com_num') ?>

    <?php // echo $form->field($model, 'art_rev_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
