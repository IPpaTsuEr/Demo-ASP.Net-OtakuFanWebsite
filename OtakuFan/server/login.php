<?php session_start();
require ("DBclass.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login...</title>
</head>

<body>
<?php
$logindb=new DBclass();
$una=$_POST['user_id'];
$ups=$_POST['pas_word'];

$logindb->selectTBL("test");
$logindb->setSQL("SELECT account.uid,nick,portrait from account,userinfo where account.uid=userinfo.uid and uname='".$una."' and upassword='".$ups."'");
$result=$logindb->run();
$row=mysql_fetch_row($result);

if(!empty($row))
{
	$_SESSION["uid"]=$row[0];
			//更新在线状态
			$logindb->setSQL("update `account` SET `logined`=true WHERE `uid`=".$_SESSION["uid"]);
			$logindb->run();
	//$_SESSION["nick"]=$row[0];
	//$_SESSION["portrait"]=$row[0];
	echo "<script>document.cookie='uid=".$_SESSION["uid"]."';document.cookie='portrait=".$row[2]."';document.cookie='nick=".$row[1]."';window.top.location='desktop.php'</script>";
	exit;//确保重定向后，后续代码不会被执行
}
else 
{
	$frstr='<div style="margin-left:-180px; margin-top:-60px; padding:0px; position:fixed; top:50%; left:50%; width:360px; height:120px; background-color:rgba(254,254,254,0.8); z-index:5555; border-radius:5px; line-height:120px; text-align:center;box-shadow:rgba(0,0,0,0.4) 1px 1px 10px 1px;">密码或用户名错误！<a href="../default.php">点我返回</a></div>';
	echo ($frstr);
	
}
//脚本一结束，就会关闭连接。如需提前关闭连接，使用 mysql_close() 函数
?>
</body>
</html>