<?php
	session_start();
header("Content-Type: application/json");
header("Cache-Control: no-cache");
header("Pragma: no-cache");

$did;
$type=$_POST['type'];
if(isset($_POST['phid']))$did=$_POST['phid'];
$da=array();
if(!empty($_SESSION["uid"]))
{	
	$i=0;$sql;
	$db_link=mysql_connect('localhost','root','');
	if(!$db_link)
		{
			$da[0]="error";
			$da[1]="无法连接到数据库，可能由于网络异常导致";
		}
	mysql_select_db('test',$db_link);
	
	if($type=="list") {$sql = "select pic,alt,uptime from photo where uid=".$_SESSION["uid"]." order by uptime";}
	else if($type=="del") {$sql ="delete from photo where uid=".$_SESSION["uid"]." and pic='".$did."'";}
	else if($type=="shar"){$sql = "select photo.uid,pic,alt,uptime,nick from photo,userinfo where photo.uid=userinfo.uid and photo.uid in (select fuid from friend  where uid=".$_SESSION["uid"].") and access=true  order by uptime ";}
	$result=mysql_query($sql);
	
	if($result)
	{	
		if($type=="list"||$type=="shar"){
			while($row=mysql_fetch_array($result,MYSQL_ASSOC))
			{
				$da[$i]=$row;
				$i++;
			}
		}
		else if($type=="del"){
				unlink("../../userdata/upload/".$did);
				$da[0]="success";
				$da[1]="删除成功";
			}
	}
	else {
			$da[0]="nosesult";
			$da[1]=$result;
			$da[2]=$sql;
			$da[3]=$type;
		}

	echo json_encode($da,JSON_UNESCAPED_UNICODE);

}
else
{
	$da[0]="error";
	$da[1]="登录验证出现问题，需要重新登录";
	echo json_encode($da,JSON_UNESCAPED_UNICODE);
}




?>