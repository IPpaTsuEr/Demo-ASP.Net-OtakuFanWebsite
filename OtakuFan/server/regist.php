<?php session_start() ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>register.....</title>
</head>

<body>
<?php
$uname=$_POST["user_name"];
$upas=$_POST["pas_word"];
//$urepas=$_POST["repas_word"];
$umail=$_POST["ue_mail"];

//$db_link=mysql_connect("localhost","root","","test");
$db_link=mysql_connect('localhost','root','');
if(!$db_link)
	{
		echo ('连接数据库出现问题');
		echo "<a href='../default.php' target='_top'>返回首页</a>";
	}
mysql_select_db('test',$db_link);
$sql="select uid from account where uname='".$uname;
$result=mysql_query($sql);
if(!$result||mysql_num_rows($result)==0){
		//开启事务
		mysql_query("BEGIN");
		
		$insert="insert into account(uname,upassword) values('".$uname."','".$upas."')";
		$insert2="insert into userinfo(nick,email,uid) values('".$uname."','".$umail."',(select uid from account where uname='".$uname."'))";
		
		$result=mysql_query($insert);
		$result2=mysql_query($insert2);
		
		if($result&&$result2)
		{
			mysql_query("COMMIT");
			$sql="select account.uid,nick,portrait from account,userinfo where account.uid=userinfo.uid and uname='".$uname."' and upassword='".$upas."'";
			$result=mysql_query($sql);
			$row=mysql_fetch_row($result);
			
			$_SESSION["uid"]=$row[0];
			//$_SESSION["nick"]=$row[1];
			//$_SESSION["portrait"]=$row[2];
			
			$sql="update `account` SET `logined`=true WHERE `uid`=".$_SESSION["uid"];
			$result=mysql_query($sql);
			
			echo "<script>document.cookie='uid=".$_SESSION["uid"]."';document.cookie='portrait=".$row[2]."';document.cookie='nick=".$row[1]."';window.parent.location='desktop.php';</script>";
			exit;
		}
		else
		{
			mysql_query("ROLLBACK");
			echo "数据库注入数据出现错误";
			
			echo "<a href='../default.php' target='_top'>返回首页</script>";
		}
		//结束事务
		mysql_query("END");
		//mysql_close($db_link);
}
else {
	 echo "该账户已经存在，请更换用户名。";
	 echo "<a href='../default.php' target='_top'>返回首页</script>";
}
?>
</body>
</html>