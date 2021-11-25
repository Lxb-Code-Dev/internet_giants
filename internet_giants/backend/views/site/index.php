<?php
/*

**author : Liuxubo 1911440
**Date : 2021/11/21
**descrption :
*/
use yii\db\Query;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;
use app\models\IgUserUser;
use app\models\IgArticleArticle;
use app\models\IgArticleComments;
use app\models\IgUserMessage;


$this->title = '后台管理';
$this->params['breadcrumbs'][] = $this->title;
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="renderer" content="webkit">
  		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>后台管理</title>
		<link rel="stylesheet" type="text/css" href="../static/admin/layui/css/layui.css"/>
		<link rel="stylesheet" type="text/css" href="../static/admin/css/admin.css"/>
	</head>
	<body>
		<div class="wrap-container welcome-container">
			<div class="row">
				<div class="welcome-left-container col-lg-9">
					<div class="data-show">
						<ul class="clearfix">
							<li class="col-sm-12 col-md-4 col-xs-12">
								<a href="javascript:;" class="clearfix">
									<div class="icon-bg bg-org f-l">
										<span class="iconfont">&#xe606;</span>
									</div>
									<div class="right-text-con">
										<p class="name">用户数</p>
										<p><span class="color-org">
										<?php
										$posts = IgUserUser::find()->count(); 
										echo $posts[0];
										?>
										</span></p>
									</div>
								</a>
							</li>
							<li class="col-sm-12 col-md-4 col-xs-12">
								<a href="javascript:;" class="clearfix">
									<div class="icon-bg bg-blue f-l">
										<span class="iconfont">&#xe602;</span>
									</div>
									<div class="right-text-con">
										<p class="name">文章数</p>
										<p><span class="color-blue">
										<?php
										$posts = IgArticleArticle::find()->count(); 
										echo $posts[0];
										?>
										</span></p>
									</div>
								</a>
							</li>
							<li class="col-sm-12 col-md-4 col-xs-12">
								<a href="javascript:;" class="clearfix">
									<div class="icon-bg bg-green f-l">
										<span class="iconfont">&#xe605;</span>
									</div>
									<div class="right-text-con">
										<p class="name">评论数</p>
										<p><span class="color-green">
											<?php
											
											$sql='SELECT SUM(art_com_num) AS num FROM ig_article_article';
											$posts =Yii::$app->db->createCommand($sql)->queryAll(); ; 
											echo $posts[0]['num'];
											?>
										</span></p>
									</div>
								</a>
							</li>
						</ul>
					</div>
					<!--图表-->
					<div class="chart-panel panel panel-default">
						<div class="panel-body" id="chart" style="height: 376px;">
						</div>
					</div>
					<!--服务器信息-->
					<div class="server-panel panel panel-default">
						<div class="panel-header">服务器信息</div>
						<div class="panel-body clearfix">
							<div class="col-md-2">
								<p class="title">服务器环境</p>
								<span class="info">Apache/2.4.51 (Win64) PHP/8.0.12</span>
							</div>
							<div class="col-md-2">
								<p class="title">服务器IP地址</p>
								<span class="info">127.0.0.1   </span>
							</div>
							<div class="col-md-2">
								<p class="title">服务器域名</p>
								<span class="info">localhost </span>
							</div>
							<div class="col-md-2">
								<p class="title"> PHP版本</p>
								<span class="info">8.0.12</span>
							</div>
							<div class="col-md-2">
								<p class="title">数据库信息</p>
								<span class="info">8.0.23 </span>
							</div>
							<div class="col-md-2">
								<p class="title">服务器当前时间</p>
								<span class="info">
								<?php
									$datetime = new \DateTime;
            						echo $datetime->format('Y-m-d');
								?>
								</span>
							</div>
						</div>
					</div>
				</div>
				<div class="welcome-edge col-lg-3">
					<!--最新留言-->
					<div class="panel panel-default comment-panel">
						<div class="panel-header">最新留言</div>
						<div class="panel-body">
							<div class="commentbox">
								<ul class="commentList">
								  <li class="item cl"> <a href="#"><i class="avatar size-L radius"><img alt="" src="http://static.h-ui.net/h-ui/images/ucnter/avatar-default.jpg"></i></a>
								    <div class="comment-main">
								      <header class="comment-header">
								        <div class="comment-meta"><a class="comment-author" href="#">
											<?php
												$a= IgUserMessage::find()->orderBy('us1_id DESC')->all();
												echo $a[0]['us1_name']; 
											?>
											
										</a> 评论于
										<?php
												echo $a[0]['us1_date']; 
										?>
								        
								        </div>
								      </header>
								      <div class="comment-body">
								        <p><a href="#"></a> 
										<?php
												echo $a[0]['us1_content']; 
										?>
									</p>
								      </div>
								    </div>
								  </li>
								  <li class="item cl"> <a href="#"><i class="avatar size-L radius"><img alt="" src="http://static.h-ui.net/h-ui/images/ucnter/avatar-default.jpg"></i></a>
								    <div class="comment-main">
								      <header class="comment-header">
								        <div class="comment-meta"><a class="comment-author" href="#"><?php
												echo $a[1]['us1_name']; 
											?>
											
										</a> 评论于
										<?php
												echo $a[1]['us1_date']; 
										?>
								        
								        </div>
								      </header>
								      <div class="comment-body">
								        <p><a href="#"></a> 
										<?php
												echo $a[1]['us1_content']; 
										?>
									</p>
								      </div>
								    </div>
								  </li>
								   <li class="item cl"> <a href="#"><i class="avatar size-L radius"><img alt="" src="http://static.h-ui.net/h-ui/images/ucnter/avatar-default.jpg"></i></a>
								    <div class="comment-main">
								      <header class="comment-header">
								        <div class="comment-meta"><a class="comment-author" href="#"><?php
												echo $a[2]['us1_name']; 
											?>
											
										</a> 评论于
										<?php
												echo $a[2]['us1_date']; 
										?>
								        
								        </div>
								      </header>
								      <div class="comment-body">
								        <p><a href="#"></a> 
										<?php
												echo $a[2]['us1_content']; 
										?>
									</p>
								      </div>
								    </div>
								  </li>
								  <li class="item cl"> <a href="#"><i class="avatar size-L radius"><img alt="" src="http://static.h-ui.net/h-ui/images/ucnter/avatar-default.jpg"></i></a>
								    <div class="comment-main">
								      <header class="comment-header">
								        <div class="comment-meta"><a class="comment-author" href="#"><?php
												echo $a[3]['us1_name']; 
											?>
											
										</a> 评论于
										<?php
												echo $a[3]['us1_date']; 
										?>
								        
								        </div>
								      </header>
								      <div class="comment-body">
								        <p><a href="#"></a> 
										<?php
												echo $a[3]['us1_content']; 
										?>
									</p>
								      </div>
								    </div>
								  </li>
								</ul>
							</div>
							<div id="pagesbox" style="text-align: center;padding-top: 5px;">
								
							</div>
						</div>
					</div>
					<!--联系-->
					
				</div>
			</div>
		</div>

		<script>
			<?php
				$datetime = new \DateTime;
				$datetime1 = new \DateTime;
				$datetime2 = new \DateTime;
				$datetime3 = new \DateTime;
				$datetime4 = new \DateTime;
				$datetime5 = new \DateTime;
				$datetime6 = new \DateTime;
				$interval1 = new \DateInterval('P1D');
				$interval2 = new \DateInterval('P2D');
				$interval3 = new \DateInterval('P3D');
				$interval4 = new \DateInterval('P4D');
				$interval5 = new \DateInterval('P5D');
				$interval6 = new \DateInterval('P6D');

				
				$date11=$datetime1->sub($interval6)->format('Y-m-d');
				$date12=$datetime2->sub($interval5)->format('Y-m-d');
				$date13=$datetime3->sub($interval4)->format('Y-m-d');
				$date14=$datetime4->sub($interval3)->format('Y-m-d');
				$date15=$datetime5->sub($interval2)->format('Y-m-d');
				$date16=$datetime6->sub($interval1)->format('Y-m-d');
				$date17=$datetime->format('Y-m-d');
				
			?>
				var date1="<?php echo $date11;?>"
				var date2="<?php echo $date12;?>"
				var date3="<?php echo $date13;?>"
				var date4="<?php echo $date14;?>"
				var date5="<?php echo $date15;?>"
				var date6="<?php echo $date16;?>"
				var date7="<?php echo $date17;?>"
				var art1="<?php echo Yii::$app->db->createCommand("SELECT COUNT(*) AS num FROM ig_article_article WHERE art_rev_date<='$date11' ")->queryAll()[0]['num'];?>"
				var art2="<?php echo Yii::$app->db->createCommand("SELECT COUNT(*) AS num FROM ig_article_article WHERE art_rev_date<='$date12'")->queryAll()[0]['num'];?>"
				var art3="<?php echo Yii::$app->db->createCommand("SELECT COUNT(*) AS num FROM ig_article_article WHERE art_rev_date<='$date13'")->queryAll()[0]['num'];?>"
				var art4="<?php echo Yii::$app->db->createCommand("SELECT COUNT(*) AS num FROM ig_article_article WHERE art_rev_date<='$date14'")->queryAll()[0]['num']?>"
				var art5="<?php echo Yii::$app->db->createCommand("SELECT COUNT(*) AS num FROM ig_article_article WHERE art_rev_date<='$date15'")->queryAll()[0]['num']?>"
				var art6="<?php echo Yii::$app->db->createCommand("SELECT COUNT(*) AS num FROM ig_article_article WHERE art_rev_date<='$date16'")->queryAll()[0]['num']?>"
				var art7="<?php echo Yii::$app->db->createCommand("SELECT COUNT(*) AS num FROM ig_article_article WHERE art_rev_date<='$date17'")->queryAll()[0]['num']?>"
				var com1="<?php echo Yii::$app->db->createCommand("SELECT COUNT(*) AS num FROM ig_article_comments WHERE com_date<='$date11'")->queryAll()[0]['num']?>"
				var com2="<?php echo Yii::$app->db->createCommand("SELECT COUNT(*) AS num FROM ig_article_comments WHERE com_date<='$date12'")->queryAll()[0]['num']?>"
				var com3="<?php echo Yii::$app->db->createCommand("SELECT COUNT(*) AS num FROM ig_article_comments WHERE com_date<='$date13'")->queryAll()[0]['num']?>"
				var com4="<?php echo Yii::$app->db->createCommand("SELECT COUNT(*) AS num FROM ig_article_comments WHERE com_date<='$date14'")->queryAll()[0]['num']?>"
				var com5="<?php echo Yii::$app->db->createCommand("SELECT COUNT(*) AS num FROM ig_article_comments WHERE com_date<='$date15'")->queryAll()[0]['num']?>"
				var com6="<?php echo Yii::$app->db->createCommand("SELECT COUNT(*) AS num FROM ig_article_comments WHERE com_date<='$date16'")->queryAll()[0]['num']?>"
				var com7="<?php echo Yii::$app->db->createCommand("SELECT COUNT(*) AS num FROM ig_article_comments WHERE com_date<='$date17'")->queryAll()[0]['num']?>"
				var mes1="<?php echo Yii::$app->db->createCommand("SELECT COUNT(*) AS num FROM ig_user_message WHERE us1_date<='$date11'")->queryAll()[0]['num']?>"
				var mes2="<?php echo Yii::$app->db->createCommand("SELECT COUNT(*) AS num FROM ig_user_message WHERE us1_date<='$date12'")->queryAll()[0]['num']?>"
				var mes3="<?php echo Yii::$app->db->createCommand("SELECT COUNT(*) AS num FROM ig_user_message WHERE us1_date<='$date13'")->queryAll()[0]['num']?>"
				var mes4="<?php echo Yii::$app->db->createCommand("SELECT COUNT(*) AS num FROM ig_user_message WHERE us1_date<='$date14'")->queryAll()[0]['num']?>"
				var mes5="<?php echo Yii::$app->db->createCommand("SELECT COUNT(*) AS num FROM ig_user_message WHERE us1_date<='$date15'")->queryAll()[0]['num']?>"
				var mes6="<?php echo Yii::$app->db->createCommand("SELECT COUNT(*) AS num FROM ig_user_message WHERE us1_date<='$date16'")->queryAll()[0]['num']?>"
				var mes7="<?php echo Yii::$app->db->createCommand("SELECT COUNT(*) AS num FROM ig_user_message WHERE us1_date<='$date17'")->queryAll()[0]['num']?>"
			</script>  


		<script src="../static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
		<script src="../static/admin/lib/echarts/echarts.js"></script>
		<script type="text/javascript">
			
			
			layui.use(['layer','jquery'], function(){
				var layer 	= layui.layer;
				var $=layui.jquery;
				//图表
				var myChart;
				require.config({
				    paths: {
				        echarts: '../static/admin/lib/echarts'
				    }
				});
				require(
				    [
				        'echarts',
				        'echarts/chart/bar',
				        'echarts/chart/line',
				        'echarts/chart/map'
				    ],
				    function (ec) {
				        //--- 折柱 ---
				        myChart = ec.init(document.getElementById('chart'));
				        myChart.setOption(
				        	{
						     title: {
						        text: "数据统计",
						        textStyle: {
						            color: "rgb(85, 85, 85)",
						            fontSize: 18,
						            fontStyle: "normal",
						            fontWeight: "normal"
						        }
						    },
						    tooltip: {
						        trigger: "axis"
						    },
						    legend: {
						        data: ["文章", "评论","留言"],
						        selectedMode: false,
						    },
						    toolbox: {
						        show: true,
						        feature: {
						            dataView: {
						                show: false,
						                readOnly: true
						            },
						            magicType: {
						                show: false,
						                type: ["line", "bar", "stack", "tiled"]
						            },
						            restore: {
						                show: true
						            },
						            saveAsImage: {
						                show: true
						            },
						            mark: {
						                show: false
						            }
						        }
						    },
						    calculable: false,
						    xAxis: [
						        {
						            type: "category",
						            boundaryGap: false,
						            data: [date1, date2, date3, date4, date5, date6, date7]
									
						        }
						    ],
						    yAxis: [
						        {
						            type: "value"
						        }
						    ],
						     grid: {
						        x2: 30,
						        x: 50
						    },
						    series: [
						       
						        {
						            name: "文章",
						            type: "line",
						            smooth: true,
						            itemStyle: {
						                normal: {
						                    areaStyle: {
						                        type: "default"
						                    }
						                }
						            },
						            data: [art1, art2, art3, art4, art5, art6, art7]
						        },
						        {
						            name: "评论",
						            type: "line",
						            smooth: true,
						            itemStyle: {
						                normal: {
						                    areaStyle: {
						                        type: "default"
						                    },
						                    color: "rgb(110, 211, 199)"
						                }
						            },
						            data: [com1, com2, com3, com4, com5, com6, com7]
						        },
								{
						            name: "留言",
						            type: "line",
						            smooth: true,
						            itemStyle: {
						                normal: {
						                    areaStyle: {
						                        type: "default"
						                    }
						                }
						            },
						            data: [mes1, mes2, mes3, mes4, mes5, mes6, mes7]
						        },
						    ]
						}
				        );
					}
				);
				$(window).resize(function(){
					myChart.resize();
				})
			});
		</script>
	</body>
</html>
