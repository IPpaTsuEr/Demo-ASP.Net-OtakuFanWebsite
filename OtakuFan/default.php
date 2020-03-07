<?php session_start();

if(isset($_SESSION["uid"]))
{
	
	echo "<script>window.parent.location='server/desktop.php';</script>";
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title> </title>
<style>
.bgmp
{
	background-image:url(pageFile/img/login_bg.jpg);
	background-attachment:fixed;
	background-size:cover;
	background-repeat:no-repeat;
}
.panes
{
	background-image: linear-gradient(to bottom, rgba(255, 255, 255,1),rgba(255, 255, 255,0.88));
	border:2px solid;
	border-color:rgba(255,255,255,0);
	border-radius:25px;
	box-shadow: 10px 10px 5px rgba(5,5,5,0.4);
}
--hf
{
	background-image: linear-gradient(to bottom, rgba(255, 255, 255,0.5),rgba(255, 255, 255,0));
}
--hf:focus
{
	color:#CCC;
	box-shadow: 10px 10px 5px rgba(5,5,5,0.4);
	text-shadow:2px 2px 2px rgb(250, 167, 50);
	text-outline: 1px 1px rgb(250, 167, 50);
}


</style>
</head>

<body class="bgmp" id="bgmp"> 

<section style="width:680px; height:320px;display:block;margin-right: auto;margin-left: auto; margin-top:12%; margin-bottom:auto;">

<div class="hf" style=" text-align:center;float:left; color:#FFF; font-size:40px; position:relative; z-index:3">
<br/>

<div style="float:right;"><h style=" font-size:100px;">宅</h>饭</div>
<br/>
<div style="float:right">欢迎您的到来</div>
</div>

<div class="panes" id="panes"  name="panes" style="float:right; position:relative; height:290px; width:340px; z-index:2;">
<iframe src="client/login.html" height="100%" width="100%" scrolling="no" frameborder="0"></iframe>
</div>

</section>

<canvas  id="cav" style="position:absolute;top:0; bottom:0; left:0; right:0; height:100%; width:100%; z-index:1">
</canvas>
<video id="bgm" autoplay loop  height="10%" width="10%" src="pageFile/andnowisee.mp4" style=" visibility:hidden;z-index:0"/>
<script>
document.addEventListener("DOMContentLoaded",function ()
{
	w=window.innerWidth;
	h=window.innerHeight;
	
	var videof= document.getElementById("cav");
	var videor= document.getElementById("bgm");
	var videov= videof.getContext("2d");

	videof.height=h;
	videof.width=w;
	
	videor.addEventListener("play",function(){
		draw(this,videov,w,h);
		},false);
},false)
function draw(videos,canva,cw,ch)
{
	if(videos.endded)return false;
	canva.drawImage(videos,0,0,cw,ch);
	setTimeout(draw,16,videos,canva,cw,ch);
}
</script>

</body>
</html>
