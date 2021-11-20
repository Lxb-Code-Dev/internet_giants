<?php
/**
*  Team: Internet_giants
*  Coding by Liuxubo 1911440, 2021/11/20
*/
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = '个人作业';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1>马思远 1911452</h1>

    
    <br/>
    <table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>作业名</th>
            <th>内容</th>
            <th>提取码</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($singlework as $v) :?>
        <tr>
            <td><?=$v['name']?></td>
            <td> <a href="https://pan.baidu.com/s/15dwGwE7_ADMKwLbVeXV1tA"><?php echo $v['namecontent']?></a></td>
            <td> 4l9s</td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>


</div>
