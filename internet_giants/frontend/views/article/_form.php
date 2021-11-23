<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\IgArticleArticle */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ig-article-article-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'art_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'us_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'art_view_num')->textInput() ?>

    <?= $form->field($model, 'art_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'art_content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'art_like')->textInput() ?>

    <?= $form->field($model, 'art_com_num')->textInput() ?>

    <?= $form->field($model, 'art_rev_date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
