<?php session_start();
header("Content-Type: application/json");
header("Cache-Control: no-cache");
header("Pragma: no-cache");

$type=$_POST['type'];
$portrait=$_POST['portrait'];
$mail=$_POST['mail'];
$nick=$_POST['nick'];
$sql='';
$da=array();

if(isset($_SESSION["uid"])&&(!empty($_SESSION["uid"])))
{
	if($type=="select"){
		$sql="select nick,portrait,email from userinfo where uid=".$_SESSION["uid"];
		}
	else if($type=="update")
	{
		$sql="update userinfo set nick='".$nick."',portrait='".$portrait."',email='".$mail."' where uid=".$_SESSION["uid"];
		}
	else return;
	

	
	$db_link=mysql_connect('localhost','root','');
	if(!$db_link)
		{
			$da[0]='error';
			$da[1]='数据库连接出现问题';
			$da[2]="<script>window.parent.location='default.php';</script>";
		}
	mysql_select_db('test',$db_link);
	$result=mysql_query($sql);
	if($type=="update" && mysql_affected_rows()){
			$sql="select nick,portrait,email from userinfo where uid=".$_SESSION["uid"];
			$result=mysql_query($sql);
		}
    if(!$result||mysql_num_rows($result)==0){
		$da[0]='error';
		$da[1]= "查询不到相关数据";
		//$da[2]=$type;
		//$da[3]=$portrait;
		//$da[4]=$mail;
		//$da[5]=$nick;
		//$da[6]=$sql;
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