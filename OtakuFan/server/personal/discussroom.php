<?php session_start();
header("Content-Type: application/json");
header("Cache-Control: no-cache");
header("Pragma: no-cache");
$da=array();
if(!empty($_SESSION["uid"]))
{
	$sql="select distinct discuss.uid,nick,portrait from userinfo,discuss,account where userinfo.uid=discuss.uid and account.uid=userinfo.uid  and logined=true order by uid";

	
	$i=0;
	
	$db_link=mysql_connect('localhost','root','');
	if(!$db_link)
		{
			$da[0]="error";
			$da[1]="无法连接到数据库，可能由于网络异常导致";
			$da[2]="<a href='default.php'>请重新尝试</a>";
		}
	mysql_select_db('test',$db_link);
	//mysql_query("set names utf8");
	$result=mysql_query($sql);
	//$row=mysql_fetch_row($result);
	if($result)
	{	
		while($row=mysql_fetch_array($result,MYSQL_ASSOC))
		{
		$da[$i]=$row;
		$i++;
		}
	}
	else {
			$da[0]="error";
			$da[1]="没有获取到结果";
		}

	//arsort($da);
	echo json_encode($da,JSON_UNESCAPED_UNICODE);
	//JSON_UNESCAPED_UNICODE实现中文不编码
	//iconv("UTF-8", "GB2312",$XXXX); 转换编码
}
else
{
	$da[0]="error";
	$da[1]="登录验证出现问题，需要重新登录";
	$da[2]="<a href='../../login.html'>点我登录</a>";
	
	echo json_encode($da,JSON_UNESCAPED_UNICODE);
}
//mysql_free_result($result);

?>
