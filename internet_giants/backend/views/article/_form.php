<?php
/**
 *  author: Liuxubo 1911440
 *  date: 2021/11/24
 * 
 *  */
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\IgArticleArticle */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ig-article-article-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'art_id')->textInput(['readonly'=>true]) ?>

    <?= $form->field($model, 'us_id')->textInput(['maxlength' => true,'readonly'=>true]) ?>

    <?= $form->field($model, 'art_view_num')->textInput(['readonly'=>true]) ?>

    <?= $form->field($model, 'art_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'art_content')->textarea(['rows' => 10]) ?>

    <?= $form->field($model, 'art_com_num')->textInput(['readonly'=>true]) ?>

    <?= $form->field($model, 'art_rev_date')->textInput(['readonly'=>true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
