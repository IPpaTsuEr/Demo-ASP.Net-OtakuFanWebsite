<?php
session_start();
require ("../../DBclass.php");   //连接数据库的类文件
if(isset($_SESSION['uid']))      //检查需要清除的对象是否存在
{ 
$logindb=new DBclass();
$logindb->selectTBL("test");
$logindb->setSQL("update `account` SET `logined`=false WHERE `uid`=".$_SESSION["uid"]);
$result=$logindb->run();		//修改数据库中对应的登录状态

unset($_SESSION['uid']);       //清除session
}      
header('Location:../../../default.php');
								//跳到首页
?>