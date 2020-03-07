<?php
session_start();
header("Content-Type: application/json");
header("Cache-Control: no-cache");
header("Pragma: no-cache");
$sql;
$sid;
$mes;
$type=$_POST['type'];
if(isset($_SESSION["uid"])&&(!empty($_SESSION["uid"])))
{
if(isset($_POST["sele"]))$sid=$_POST["sele"];
if(isset($_POST["mess"]))$mes=$_POST["mess"];
if($type=="mess")
	$sql="select leavemess.uid,touid,sendtime,mess,nick,portrait from leavemess,userinfo where leavemess.uid=userinfo.uid and  leavemess.uid=".$sid." and leavemess.touid=".$_SESSION["uid"];
else if($type=="list")
	$sql="select distinct friend.fuid,nick,portrait from friend,userinfo where friend.fuid=userinfo.uid and friend.uid=".$_SESSION["uid"];
else if($type=="inser")
		$sql="insert into leavemess(`uid`,`touid`,`mess`) values(".$_SESSION["uid"].",".$sid.",'".$mes."')";
else {		
			$da[0]="error";
			$da[1]="未知操作";
			echo json_encode($da,JSON_UNESCAPED_UNICODE);
			return;	
	}



$db_link=mysql_connect('localhost','root','');
	if(!$db_link)
		{
			$da[0]='error';
			$da[1]='数据库连接出现问题';
			$da[2]="<script>window.parent.location='default.php';</script>";
		}
	mysql_select_db('test',$db_link);
	$result=mysql_query($sql);
	
    if($result==false)
	{
		$da[0]='error';
		$da[1]= "无返回结果";

		}
	else 
	{
	 if($type!="inser")
		{
			if(mysql_num_rows($result)==0)
			{
				$da[0]='nodata';
		    	$da[1]= "查询不到相关数据";
			}
			else
			{
				$i=0;
				while($row=mysql_fetch_array($result,MYSQL_ASSOC))
					{
						$da[$i]=$row;
						$i++;
					}
			}
		}
		else
		{       
				$da[0]="succes";
				$da[1]="留言成功!";
		}
	}

	echo json_encode($da,JSON_UNESCAPED_UNICODE);

}
else
{
	$da[0]='error';
	$da[1]="出现问题，需要重新登录";
	$da[2]="<a href='../../default.php'>点我登录</a>";
	echo json_encode($da,JSON_UNESCAPED_UNICODE);
}
?>