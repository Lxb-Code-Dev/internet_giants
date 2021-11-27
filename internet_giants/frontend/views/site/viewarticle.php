<?php
/**
 *  author: Liuxubo 1911440
 *  date: 2021/11/24
 * 弃用了
 *  */
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\IgArticleArticle */
/* @var $form ActiveForm */
?>
<div class="site-article">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'art_id')->textInput() ?>
        <?= $form->field($model, 'art_title')->textInput([ 'readonly' => true]) ?>
        <?= $form->field($model, 'cate_name')->textInput([ 'readonly' => true]) ?>
        <?= $form->field($model, 'art_content')->textarea(['rows'=>30,'readonly' => true]) ?>

        
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', '发布'), ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-article -->
