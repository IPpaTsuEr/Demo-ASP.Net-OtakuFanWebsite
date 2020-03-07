<?php session_start();
header("Content-Type: application/json");
header("Cache-Control: no-cache");
header("Pragma: no-cache");

$type=$_POST['type'];
$sql='';
$sd;
$dat;
$da=array();
if(isset($_POST['select'])){$sd=$_POST['select'];}
if(isset($_POST['data'])){$dat=$_POST['data'];}
if(isset($_SESSION["uid"])&&(!empty($_SESSION["uid"])))
{
	if($type=="list"){
		$sql="select distinct friend.fuid,nick,portrait from friend,userinfo where friend.fuid=userinfo.uid and friend.uid=".$_SESSION["uid"];
		}
	else if($type=="mess")
	{
		
		$sql="select  shortmess.uid,nick,portrait,sendtime,mess from userinfo,shortmess where userinfo.uid=shortmess.uid and ((toid=".$sd." and userinfo.uid=".$_SESSION["uid"].") or (userinfo.uid=".$sd." and toid=".$_SESSION["uid"]."))";
	}
	else if($type=="inser")
	{
		$sql="insert into shortmess(`uid`,`toid`,`mess`) values(".$_SESSION["uid"].",".$sd.",'".$dat."')";
	}
	

	
	$db_link=mysql_connect('localhost','root','');
	if(!$db_link)
		{
			$da[0]='error';
			$da[1]='数据库连接出现问题';
		}
		
	mysql_select_db('test',$db_link);
	
	$result=mysql_query($sql);
	
    if(!$result)
	{
		$da[0]='error';
		$da[1]= "查询不到相关数据";
		$da[2]=$sd;
		$da[3]=$_SESSION["uid"];
		$da[5]=$sql;
		}
	else if($type=="inser")
	{
		$da[0]="success";
		$da[1]="发送成功";
		
	}
	else 
	{
		if(mysql_num_rows($result)==0)
		{
				$da[0]="nodata";
				$da[1]="内有数据";
		}
		else{
		$i=0;
		while($row=mysql_fetch_array($result,MYSQL_ASSOC))
			{
				$da[$i]=$row;
				$i++;
			}}
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
//mysql_free_result($result);

?>