<?php
/**
 * author: Masiyuan  Wangwenrui
 * date:2021/11/25
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\IgUserMessage;
/* @var $this yii\web\View */
/* @var $model app\models\IgArticleArticle */
/* @var $form yii\widgets\ActiveForm */
?>

<head>
<meta charset="UTF-8">
<script src="js/jquery.js" type="text/javascript"></script>
<link href="js/swiper.min.css" rel="stylesheet" type="text/css"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0">
<script src="js/swiper.min.js" type="text/javascript"></script>
<style>

	#audio_btn{
		position:absolute;
		top:0px;
		left:0px;
		z-index:999999;
	}
	input {
		display: block;
		width: 100%;
		border: none;
		font-size: 1em;
		line-height: 1.5em;
		margin: 0;
		padding: 0.5em;
		resize: none;
		font-family: inherit;
		color: inherit;
		box-sizing: border-box;
	}
	.send-btn {
		float: left;
	}
	ul{padding:0px;
	   margin:0px;}
	li{list-style:none;
	   padding:0px;
	   margin:0px;
	   width:100%;
	}
	#conts p{
		width:100%;
		word-break:break-all;
		padding:3px 0px 3px 0px;
		margin:0px;

	}

	.dm .d_screen 
	.d_del{width:38px;height:38px;background:#600;display:block;text-align:center;line-height:38px;
		   text-decoration:none;font-size:20px;color:#fff;border-radius:19px;border:1px solid #fff;position:absolute;top:10px;right:20px;z-index:3;display:none;}
	.dm .d_screen .d_del:hover{background:#f00;}
	.dm .d_screen .d_mask{width: 1000px;;height: 1000px;;position:absolute;top:0;left:0;opacity:0.5;
						  filter:alpha(opacity=50) ;z-index:1;}
	.dm .d_screen .d_show{position: relative;z-index:2;}
	.dm .d_screen .d_show div{font-weight:500;color:#fff;position:absolute;left:0;top:0;}
	#showmeg p{
		font-weight:bold;
		text-align:center;
	}
	.d_show div{
		width:230px;
		heigth:50px;				
	}
	.d_show p{
		heigth:50px;
		text-overflow:ellipsis	;
	}
#audio_btn{
		position:absolute;
		top:0px;
		left:0px;
		z-index:999999;
	}

</style>
</head>
<body style="padding:0px;margin:0px;background:#efefef;;background-size:100% 100%;" onLoad="scrollBy(0, document.body.scrollHeight-100)"> 
<audio id="music" src="BeTheBest.mp3" autoplay="autoplay" loop="loop"></audio>         
<div class="" >
	<div  id="conts" style="color:#fff000;margin:0 auto ;padding-bottom:130px;padding-left:2%;padding-right:2%;padding-bottom:230px;height:100px;"> 
		<div style="position:absolute;height:160px;background:#efefef;z-index:99999;width:260px;top:20%;left:30%;display:none;" id="showmeg" class="swing">
			<p style="color:#4BACC6;">
			<?php 
			$num=IgUserMessage::find()->count();
			$model=IgUserMessage::find()->all();
        	echo $model[$num-1]->us1_content;
			?>
			</p>
			<p style="color:#6F81BD;"><?php 
        	echo $model[$num-2]->us1_content;
										?></p>
			<p style="color:#8064A2;"><?php 
			
        	echo $model[$num-3]->us1_content;
										?></p>
			<p style="color:#C0504D;"><?php 
			
        	echo $model[$num-4]->us1_content;
										?></p>
			<p style="color:#9BBB59;"><?php 
			
        	echo $model[$num-5]->us1_content;
										?></p>
		</div>    	
		<div class="dm">
			<!--d_screen start-->
			<div class="d_screen">
				<a href="#" class="d_del">X</a>
				<div class="d_mask"></div>
				<div class="d_show">
				<div style="color:#C0504D;font-size:19px;"><?php 
			echo $model[$num-1]->us1_content;
										?></div>
				<div style="color:#4BACC6;font-size:26px;"><?php 
			echo $model[$num-2]->us1_content;
										?></div>
				<div style="color:#C0504D;font-size:16px;"><?php 
			echo $model[$num-3]->us1_content;
										?></div>
				<div style="color:#8064A2;font-size:20px;"><?php 
			echo $model[$num-4]->us1_content;
										?></div>
				<div style="color:#C0504D;font-size:21px;"><?php 
			echo $model[$num-5]->us1_content;
										?></div>
				<div style="color:#4BACC6;font-size:26px;"><?php 
			echo $model[$num-6]->us1_content;
										?></div>
				<div style="color:#C0504D;font-size:36px;"><?php 
			echo $model[$num-7]->us1_content;
										?></div>
				<div style="color:#8064A2;font-size:46px;"><?php 
			echo $model[$num-8]->us1_content;
										?></div>
				<div style="color:#C0504D;font-size:86px;"><?php 
			echo $model[$num-9]->us1_content;
										?></div>
				<div style="color:#8064A2;font-size:44px;"><?php 
			echo $model[$num-10]->us1_content;
										?></div>
				<div style="color:#4BACC6;font-size:22px;"><?php 
			echo $model[$num-1]->us1_content;
										?></div>
				<div style="color:#C0504D;font-size:33px;"><?php 
			echo $model[$num-2]->us1_content;
										?></div>
				<div style="color:#8064A2;font-size:14px;"><?php 
			echo $model[$num-3]->us1_content;
										?></div>
				<div style="color:#C0504D;font-size:18px;"><?php 
			echo $model[$num-4]->us1_content;
										?></div>
				<div style="color:#8064A2;font-size:28px;"><?php 
			echo $model[$num-5]->us1_content;
										?></div>
				<div style="color:#C0504D;font-size:26px;"><?php 
			echo $model[$num-6]->us1_content;
										?></div>
				<div style="color:#4BACC6;font-size:16px;"><?php 
			echo $model[$num-3]->us1_content;
										?></div>
				<div style="color:#C0504D;font-size:25px;"><?php 
			echo $model[$num-7]->us1_content;
										?></div>
				</div>
			</div>
		</div>
	</div> 
</div> 
<!-- <div style="position:fixed;left:0%;bottom:0px;height:100px;width:100%;border-top:solid 1px #a58e78;background-color:#000;z-index:99999; ">
		<p style="color:#fff;padding:0px;text-align:left;margin:0px;padding:0px;padding: 3px 0px 3px 5%;">????????????????????????????????????~</p>
		<form id="reply-form2" action="tanmu.php" method="post" style="padding-top:8px;padding-bottom:30px;">
			<div class="input" style="width:65%;float:left;margin-left:5%;">
				<input id="reply-write" name="content" type="text" value="" placeholder="????????????" >
			</div>
			<div class="send-btn" >
				<a style="background-color:#6731D2;color:#fff;width: 4em;height: 2.5em;display: inline-block;text-align: center;line-height: 2.5em;cursor:pointer" onClick="send_reply2()">??????</a>
			</div>
		</form>
	</div>		 -->
<script>
$(function () {
		$("#audio_btn").click(function () {
			var music = document.getElementById("music");
			if (music.paused) {
				music.play();
				$("#music_btn").attr("src", "play.png");
			} else {
				music.pause();
				$("#music_btn").attr("src", "pause.png");
			}
		});
		[]
		a = $("span [class='swiper-pagination-bullet swiper-pagination-bullet-active']").index();
		//alert(a);

	})

function send_reply2() {
var content = $("#reply-write").val();
if ($.trim(content) == "") {
	alert("????????????????????????????????????");
	return false;
}

	  var text=$("#reply-write").val();
		var div="<div style='font-size:25px;color:#fff;'><p>"+text+"</p></div>";
		$("#reply-write").val("");
   $(".d_show").append(div);
   init_screen();  

}

//??????????????????????????????
window.onload = function () {
	setTimeout(show, 10000);  
}
//??????
function show() {
	document.getElementById('showmeg').style.display = "block";
	 $("#showmeg").animate({top:'40%'},1800);
	 $("#showmeg").animate({top:'20%'},1800);
	 $("#showmeg").animate({left:'10%'},1800);
	setTimeout(hide, 5000);
}
//??????
function hide() {
	document.getElementById('showmeg').style.display = "none";
	setTimeout(show, 10000);
}

$(function () {
init_screen();
});


//???????????????????????????????????????????????????
$(document).ready(function () {
  setInterval("startRequest()",10000);
   });
  
function startRequest()
{
 // id= $(".d_show").find("div:last").attr("id");
// $.ajax({
// type: 'post',
// url: 'demo.php?act=getdata',
// data: "id=" +id,
// dataType: 'json',
// success: function (data) {
html="<div style='color:#ff0000;font-size:30px;'><?php 
			echo $model[$num-5]->us1_content;
										?></div>";
html+="<div style='color:#F39F1F;font-size:30px;'><?php 
			echo $model[$num-1]->us1_content;
										?></div>";
html+="<div style='color:#BF8DFF;font-size:35px;'><?php 
			echo $model[$num-2]->us1_content;
										?></div>";
html+="<div style='color:#000067;font-size:45px;'><?php 
			echo $model[$num-3]->us1_content;
										?></div>";
html+="<div style='color:#C0504D;font-size:33px;'><?php 
			echo $model[$num-4]->us1_content;
										?></div>";
html+="<div style='color:#F39F1F;font-size:30px;'><?php 
			echo $model[$num-5]->us1_content;
										?></div>";
html+="<div style='color:#BF8DFF;font-size:35px;'><?php 
			echo $model[$num-5]->us1_content;
										?></div>";
html+="<div style='color:#000067;font-size:45px;'><?php 
			echo $model[$num-4]->us1_content;
										?></div>";
html+="<div style='color:#F39F1F;font-size:30px;'><?php 
			echo $model[$num-3]->us1_content;
										?></div>";
html+="<div style='color:#BF8DFF;font-size:35px;'><?php 
			echo $model[$num-2]->us1_content;
										?></div>";
html+="<div style='color:#000067;font-size:45px;'><?php 
			echo $model[$num-1]->us1_content;
										?></div>";
// for (var i = 0; i < data.length; i++) {
//  html+= "<div id="+data[i].id+" style='font-size:" +data[i].size+ ";color:"+data[i].color+"'><p>"+data[i].username+":"+data[i].content+"</p></div>";
// }
// //$(".d_show").children().remove();
$(".d_show").append(html);
init_screen();

// num=$(".d_show").find("div").length;
// if(num>30){
// $(".d_show").find("div:lt(20)").remove();  
//}      
// },
// });
// //init_screen();
}

function init_screen() {
var _top = 0;
$(".d_show").find("div").show().each(function () {
	var _left = $(window).width() - $(this).width()+220;
	var _height = $(window).height()+100;

	_top = _top + 36;
	if (_top >= _height - 120) { 
		_top = 40;
	}
	$(this).css({left: _left, top: _top});
	var time = 10000;
	if ($(this).index() % 2 == 0) {
		time = 12000;
	}
	 if ($(this).index() % 3 == 0) {
		time = 14000;
	}
	if ($(this).index() % 4 == 0) {
		time = 16000;
	}
	if ($(this).index() % 5 == 0) {
		time = 18000;
	}
	if ($(this).index() % 7 == 0) {
		time = 20000;
	}
	if ($(this).index() % 8 == 0) {
		time = 23000;
	}
	$(this).animate({left: "-" + _left + "px"}, time, function () {
	});
});
}

//?????????????????????
function getReandomColor() {
return '#' + (function (h) {
	return new Array(7 - h.length).join("0") + h
})((Math.random() * 0x1000000 << 0).toString(16))
}
</script>
<div style="text-align:center;">
</div>
</body>






















<!-- <section id="content" class="table-layout">
        <div class="ig-article-article-view">

    



</div>

      
      </section> -->