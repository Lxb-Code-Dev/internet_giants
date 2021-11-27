<?php
/**
 *  author: Liuxubo 1911440
 *  date: 2021/11/24
 * 
 *  */
/* @var $this \yii\web\View */
/* @var $content string */

use frontend\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="renderer" content="webkit">
  		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>论坛后台</title>
		
	</head>
	<body>
		<div class="main-layout" id='main-layout'>
			<!--侧边栏-->
			<div class="main-layout-side">
				<div class="m-logo">
				</div>
				<ul class="layui-nav layui-nav-tree" lay-filter="leftNav">
				  <li class="layui-nav-item layui-nav-itemed">
				    <a href="javascript:;"><i class="iconfont">&#xe607;</i>管理</a>
				    <dl class="layui-nav-child">
					<dd><a href="javascript:;"  data-id='1' data-text="后台菜单"><span class="l-line"></span>首页</a></dd>
				      <dd><a href="index.php?r=user"  data-id='2' data-text="后台菜单"><span class="l-line"></span>用户菜单</a></dd>
				      <dd><a href="index.php?r=article"  data-id='3' data-text="前台菜单"><span class="l-line"></span>文章管理</a></dd>
					  <dd><a href="index.php?r=comments"  data-id='4' data-text="前台菜单"><span class="l-line"></span>评论管理</a></dd>
					  <dd><a href="index.php?r=message"  data-id='5' data-text="前台菜单"><span class="l-line"></span>留言管理</a></dd>
				    </dl>
				  </li>
				</ul>
			</div>
			<!--右侧内容-->
			<div class="main-layout-container">
				<!--头部-->
				<div class="main-layout-header">
					<div class="menu-btn" id="hideBtn">
						<a href="javascript:;">
							<span class="iconfont">&#xe60e;</span>
						</a>
					</div>
					<ul class="layui-nav" lay-filter="rightNav">
					  
					  <li class="layui-nav-item">
					  <a href="<?php echo Url::to(['site/iglogout']) ?>" data-method="post"> 登出 </a>
					  </li>
					  <!-- <li class="layui-nav-item"><a href="javascript:;">退出</a></li> -->
					 
					</ul>
				</div>
				<!--主体内容-->
				<div class="main-layout-body">
					<!--tab 切换-->
					<div class="layui-tab layui-tab-brief main-layout-tab" lay-filter="tab" lay-allowClose="true">
					  <ul class="layui-tab-title">
					    <li class="layui-this welcome">后台主页</li>
					  </ul>
					  <div class="layui-tab-content">
					    <div class="layui-tab-item layui-show" style="background: #f5f5f5;">
					    	<!--1-->
					    	<!-- <iframe src="welcome.html" width="100%" height="100%" name="iframe" scrolling="auto" class="iframe" framborder="0"></iframe> -->
		
							<?= $content ?>
							<!--1end-->
					    </div>
					  </div>
					</div>
				</div>
			</div>
			<!--遮罩-->
			<div class="main-mask">
				
			</div>
		</div>
		<script type="text/javascript">
			var scope={
				link:'./welcome.html'
			}
		</script>
		
		
	</body>
</html>

<?php $this->endPage() ?>
