<?php require_once ("personal/function/check.php");
login_check();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">

<title>mypage</title>
<link href="../css/desktop.css" rel="stylesheet" type="text/css">
<link  rel="stylesheet" href="../eff/css/effeckt.css">
<script src="../eff/js/jquery-2.0.3.min.js"></script>
<script src="../js/bubbler.jquery.js"></script>
<script>

$(document).ready(function() {$("#bubbles").bubbler();});

</script>
<style>
nav>ul>li{ width:100%;height:45px; display:block; line-height:45px;padding-left:20px;border-bottom: 1px solid rgb(68, 68, 68); background-color:rgba(221,221,221,0.7); line-height:45px; }
nav>ul>li:hover{background-image:linear-gradient(to bottom, rgba(255,255,255,0.9),rgba(221,221,221,0.6) );}
nav>h4{
	color: rgb(0,0,0);
	background: none repeat scroll 0% 0%;
	background-image:linear-gradient(to bottom, rgba(255,255,255,0.9),rgba(221,221,221,0.7) );
	border-bottom: 1px solid rgb(112, 112, 112);
	border-radius:5px;
	padding: 5px 5px 5px 0px;
	font-size:18px;
	line-height:35px;
	position: relative;
	height:32px;
	}
nav>h4>a{
	text-decoration: none;
	position: absolute;
	right: 5px;
	font-size: 140%;
	}
#maintp{transform:translateY(-23px);-webkit-transform:translateY(-23px);}
#maintp:hover{transform:translateY(0px);-webkit-transform:translateY(0px);}
</style>

</head>
<body style=" background-image:url(../pageFile/img/desktop_bg_bu.jpg); background-attachment:fixed; background-repeat:no-repeat; background-size:cover;">

<div id="cans" style="background-color:rgba(86%,92%,92%,0.8); height:100%; width:100%; display:block;">
	<div class="loader" style="height:120px; width:500px; position:absolute; left:50%; top:50%; margin-left:-250px; margin-top:-60px; border-radius:5px; box-shadow:rgba(190,234,234,0.4) 1px 1px 15px 5px; text-align:center; line-height:120px; background-color:rgba(179,198,198,0.8);"> 载入中请稍后</div>
</div>

  <div data-effeckt-page="page-1" style="margin:0px 0px 0px 0px; padding:0px 0px 0px 0px; overflow:hidden;">
  
 	 <div id="bubbles" style="height:100%; width:100%; margin:0px 0px 0px 0px; padding:0px 0px 0px 0px; top:0px;left:0px; opacity:0.2;"></div> 
     
      <div id="maintp" style="margin-left:-180px; padding:0px;position:fixed;top:0px;left:50%; width:360px; height:30px; background-color:rgba(254,254,254,0.8); z-index:5555; border-radius:0px 0px 5px 5px; line-height:30px; text-align:center;box-shadow:rgba(0,0,0,0.5) 1px 1px 10px 1px;">
	<a href="javascript:void(0);" onClick="frmana()" style="text-decoration:none;">好友管理</a>
</div>

<div id="fpanel" style="display:none;background-color:rgba(51,51,51,0.8); position:fixed; top:0px; left:0px; z-index:9999; width:100%; height:100%;">
 
    <div id="cp" style="position:absolute;height:200px;width:500px;background-color:rgba(254,254,254,0.7);border-radius:5px;margin-top:-100px;top:50%;left:50%;margin-left:-250px; vertical-align:middle; box-shadow: rgba(0,0,0,0.7) 1px 1px 15px 3px;" >
    <a style="float:right; margin-right:15px; margin-top:5px; cursor:pointer;background-image:url(../pageFile/img/close.png); background-position:left center; background-repeat:no-repeat; background-size:24px 24px; height:24px; width:24px;" onClick="closfpane()"></a>

    
    <div align="center" style="line-height:32px;background-color:rgba(254,254,254,0.5); height:32px; width:100%; margin:0px; position:absolute;border-radius:5px;cursor:pointer; top:25%;">
    <input type="search" placeholder="输入账户名加为好友" style=" width:300px;" id="fdname"><input type="button" value="搜索并添加好友 " style=" text-align:center;width:100px;" onClick="addfr()">
    </div>

   <div align="center" style="line-height:32px;background-color:rgba(254,254,254,0.5); height:32px; width:100%;margin:0px; position:absolute;border-radius:5px;cursor:pointer; top:50%;">
        <input type="button" value="查看我的好友" style=" width:400px; margin-left:50px; margin-right:50px; " onClick="frlist()">
    </div> 

   </div>
   
<nav id="navl" style="padding:0px; display:none; position:relative; bottom:0px; background-color:rgba(221,221,221,0.6); border-radius:5px 5px 0px 0px; z-index:9999; width:600px; height:400px; top:50%; left:50%; margin-left:-300px; margin-top:-200px;">
<h4 style="position:relative;text-indent: 15px;">我的好友<a onClick="closeli()" style="cursor:pointer;background-image:url(../pageFile/img/close.png); background-position:left center; background-repeat:no-repeat; background-size:24px 24px; height:24px; width:24px;"></a></h4>
	<ul id="polist" style=" margin-left:0px;padding:0px;overflow-x:hidden; overflow-y:auto;min-height:333px; max-height:333px;">
		<!--li name="00000005">
        	<div>
            	<img src="../userdata/portrait/default.png" style="height:32px;width:32px;margin-top: 6px;">
                测试账号1
                <input type="button" value="删除好友关系" style="float: right; margin-top: 8px; margin-right: 25px;">
            </div>
            
        </li-->
    
    </ul>
</nav>  
</div>

     
      <div class="bli">
            <div>
            <dl title="聊天室"  draggable="true" id="liaotian" style="background-image:url(../pageFile/personal/8.png);" class="effeckt-page-transition-button squre" data-effeckt-needs-perspective="true" data-effeckt-transition-page="page-2" data-effeckt-transition-in="slide-from-left" data-effeckt-transition-out="slide-to-right" onClick="istartajax();" ></dl>
            </div>
            
            <div>
            <dl title="相册" draggable="true" id="xiangche"  style="background-image:url(../pageFile/personal/26.png)" class="effeckt-page-transition-button squre" data-effeckt-needs-perspective="true" data-effeckt-transition-page="page-3" data-effeckt-transition-in="slide-from-right" data-effeckt-transition-out="slide-to-left" ></dl>
            </div>
            
            <div>
            <dl title="留言板" draggable="true" id="liuyanban"  style="background-image:url(../pageFile/personal/28.png)" class="effeckt-page-transition-button squre" data-effeckt-needs-perspective="true" data-effeckt-transition-page="page-4" data-effeckt-transition-out="flip-to-right-back" data-effeckt-transition-in="flip-to-right-front" ></dl>
            </div>
            
            <div>
            <dl title="短消息" draggable="true" id="duanxiaoxi" style="background-image:url(../pageFile/personal/9.png)" class="effeckt-page-transition-button squre" data-effeckt-needs-perspective="true" data-effeckt-transition-page="page-5" data-effeckt-transition-out="flip-to-top-back" data-effeckt-transition-in="flip-to-top-front"></dl>
            </div>
            
            <div>
            <dl title="个人信息" draggable="true" id="shezhi" style="background-image:url(../pageFile/personal/27.png)" class="effeckt-page-transition-button squre" data-effeckt-needs-perspective="true" data-effeckt-transition-page="page-6" data-effeckt-transition-in="scale-up-from-behind" data-effeckt-transition-out="scale-up-to-front" ></dl>
            </div>
            
            <div>
            <dl title="退出" onClick='out()' style="background-image:url(../pageFile/personal/99.png);" draggable="true" id="tuchu" class="squre"></dl>
            </div>
            
       </div>
</div>



  <div data-effeckt-page="page-2" style=" margin:0px; padding:0px;" id="page-2">
      <iframe src="personal/discussroom.html"  frameborder="0" align="middle" width="100%" height="100%" name="discuss" id="discuss" ></iframe>
      <br><button class="effeckt-page-transition-button" data-effeckt-transition-in="slide-from-right"  data-effeckt-transition-out="slide-to-left" data-effeckt-transition-page="page-1" style="display:none;">返回</button>
    </div>

  
   <div data-effeckt-page="page-3" style=" margin:0px; padding:0px;" id="page-3">
	     <iframe src="personal/photolist.html"  frameborder="0" align="middle" width="100%" height="100%" ></iframe>
         <br><button class="effeckt-page-transition-button" data-effeckt-transition-in="slide-from-left"  data-effeckt-transition-out="slide-to-right" data-effeckt-transition-page="page-1" style="display:none;">返回</button>
  </div> 
  
    <div data-effeckt-page="page-4" style="margin:0px; padding:0px;" id="page-4">
      <iframe src="personal/leavemess.html"  frameborder="0" align="middle" width="100%" height="100%"></iframe>
      <br><button class="effeckt-page-transition-button"  data-effeckt-transition-out="flip-to-top-back" data-effeckt-transition-in="flip-to-top-front" data-effeckt-transition-page="page-1"  style="display:none;">返回</button>
    </div>
  </div>
  
  
    <div data-effeckt-page="page-5"  style="margin:0px; padding:0px;" id="page-5">
      <iframe src="personal/shortmess.html"  frameborder="0" align="middle" width="100%" height="100%"></iframe>
      <br><button class="effeckt-page-transition-button" data-effeckt-transition-in="flip-to-left-front"  data-effeckt-transition-out="flip-to-left-back" data-effeckt-transition-page="page-1" style="display:none;">返回</button>
    </div>
  </div>
  
  <div data-effeckt-page="page-6" style="margin:0px; padding:0px;" id="page-6">
     <iframe src="personal/perinfo.html"  frameborder="0" align="middle" width="100%" height="100%"></iframe>
    <br><button class="effeckt-page-transition-button" data-effeckt-transition-out="scale-down-to-behind" data-effeckt-transition-in="scale-down-from-front"  data-effeckt-transition-page="page-1" style="display:none;">返回</button>
    </div>
  </div>
 <!--///////////////////////////////////////////////////////////////////////////////////////////--> 
<script src="../js/jquery.cookie.js"></script>
<script>
function frmana()
{
	$("#fpanel").css("display","block");
	
	
}
function closfpane(){
	$("#fpanel").css("display","none");
	}

function addfr()
		{
			var fn=$("#fdname").val().trim();
			$.ajax({
				type:"POST",
				data:{'type':'setl','data':fn},
				url:"friend.php",
				dataType:"json",
				success: function(data)
				{
					alert(data[1]);
					if(data[1]!="error")$("#fdname").text("");
				},
				error:function(){
					alert("执行错误");
					}
				});
			
		}
function delet(did){
	$.ajax({
		 type:"POST",
		 data:{'type':'dell','data':did},
		 url:"friend.php",
		 dataType:"json",
		 success: function(data){
			 alert(data[1]);
			 $("#polist").text("");
			 frlist();
			 },
		 error:function(){
			 alert("执行错误");
			 }
	});
			
		}
function frlist(){
	 $("#navl").css("display","block");
	 $("#cp").css("display","none");
	 $.ajax({
		 type:"POST",
		 data:{'type':'getl','data':" "},
		 url:"friend.php",
		 dataType:"json",
		 success: function(data){
			 if(data[0]!="error"){
			 var po=$("#polist");
			 $.each(data,function(ind,obj){
				 po.append('<li name="'+data[ind].fuid+'">'+
        				   '<div>'+
            				'<img src="../userdata/portrait/'+data[ind].portrait+'" style="height:32px;width:32px;margin-top: 6px;">'+
                			data[ind].nick+
                			'<input type="button" id="'+data[ind].fuid+'" value="删除好友关系"  style="float: right; margin-top: 8px; margin-right: 25px;">'+
            				'</div>'+
            				'</li>');
				 });
			 }
			 },
		 error:function(){
			 alert("执行错误");
			 },
		complete: function(){
				
				$("#polist li div input").on("click",function(){
					delet(this.id);
					})
			}
		 });
	}
function closeli(){
	$("#navl").css("display","none");
	$("#cp").css("display","block");
	$("#polist").text("");
	}

function istartajax(){
	document.getElementById("discuss").contentWindow.statajax();
	}
function reback(disid){
	$("#"+disid+" button").trigger("click");
	}
window.onload=function()
	{$("#cans").css("display","none");}
var fid=0;
var elsr;

window.onchange=function (){
				//document.getElementById("bac").style.height=window.innerHeight+"px";
				//document.getElementById("bac").style.width =window.innerWidth+"px";
				}
function out()
{
	$.cookie('uid',null);
	$.cookie('nick',null);
	$.cookie('portrait',null);
	window.top.location="personal/function/quit.php";}
function discus()
{window.top.location="personal/discussroom.html";}

var dis=document.querySelectorAll(".bli div");
[].forEach.call(dis,function(er){
	er.addEventListener('dragstart', hdragstart, false);
	er.addEventListener('drop', hdrop, false);
	er.addEventListener('dragover', hdragover, false);
	er.addEventListener('dragend', hdragend, false);
	});

function hdragstart(e)
{
	
	this.style.opacity = '0.4';
  	elsr = this;
  	e.dataTransfer.effectAllowed = 'move';
  	e.dataTransfer.setData('text/html', this.innerHTML);
	return false;
}
function hdrop(e){
	e.preventDefault();
	if (elsr != this) {
   		 elsr.innerHTML = this.innerHTML;
   		 this.innerHTML = e.dataTransfer.getData('text/html'); 
		[].forEach.call(dis, function (er) {
   			er.style.opacity = '1';
  		});
		}
	return false;
}

function hdragover(e) {
		e.preventDefault();
		//dim.style.backgroundImage=this.style.backgroundImage;
		//dim.style.opacity = '1';
		//e.dataTransfer.setDragImage(dim,1,1);
		e.dataTransfer.dropEffect = 'move';
        return false;
}
function hdragend(e)
{
	e.preventDefault();
	this.style.opacity = '1';
	
	[].forEach.call(dis,function(er){
	er.removeEventListener('dragstart', hdragstart, false);
	er.removeEventListener('drop', hdrop, false);
	er.removeEventListener('dragover', hdragover, false);
	er.removeEventListener('dragend', hdragend, false);
	});
    return false;
}

</script>
  <script src="../eff/js/modernizr.min.js"></script>
  <script src="../eff/js/Effeckt.js"></script>
  <script src="../eff/js/page-transitions.js"></script>
</body>
</html>
