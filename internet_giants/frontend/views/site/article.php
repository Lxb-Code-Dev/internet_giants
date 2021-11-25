<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\IgArticleArticle */
/* @var $form ActiveForm */
?>
<div class="site-article">

    <?php $form = ActiveForm::begin(); ?>

    
        <?= $form->field($model, 'art_title')->textInput() ?>
        <?= $form->field($model, 'cate_name')->textInput() ?>
        <?= $form->field($model, 'art_content')->textarea(['rows'=>30]) ?>
        
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', '发布'), ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-article -->
