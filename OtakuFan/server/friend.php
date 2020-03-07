<?php
session_start();
header("Content-Type: application/json");
header("Cache-Control: no-cache");
header("Pragma: no-cache");

$ty=$_POST["type"];
$dt=$_POST["data"];
$da=array();
if(isset($_SESSION["uid"])&& !empty($_SESSION["uid"]))
{
	$db_link=mysql_connect('localhost','root','');
	if(!$db_link){
			$da[0]="error";
			$da[1]="无法连接到数据库，请重新尝试";}
	else{
			mysql_select_db('test',$db_link);
			
			 if($ty=="setl"){
					$sql="insert into friend (uid,fuid) values(".$_SESSION["uid"].",(select uid from account where uname='".$dt."'))";
					
					$result=mysql_query("select uid from account where uname='".$dt."'");
					$da=mysql_fetch_array($result);
					if($da[0]==$_SESSION["uid"]){
						$da[0]="error";
						$da[1]="不需要添加自己为自己的好友。";}
					else if(mysql_num_rows($result)==0){
									$da[0]="error";
									$da[1]="用户名不存在";}
					else{
					$result=mysql_query("select uid from friend where uid='".$_SESSION["uid"]."' and fuid=(select uid from account where uname='".$dt."')");
						 if(mysql_num_rows($result)==0){
								$result=mysql_query($sql);
								if($result){	
										$da[0]="success";
										$da[1]="添加好友成功";}
								else{
										$da[0]="error";
										$da[1]="数据库写入失败";}}
						 else{
								$da[0]="yet";
								$da[1]="对方已经是您的好友，无需重复添加";}
					}
						
				}
			else if($ty=="getl"){
				
				$sql="select fuid,nick,portrait from friend,userinfo where friend.fuid=userinfo.uid and friend.uid=".$_SESSION["uid"];
				
				$result=mysql_query($sql);
					if($result)
					{	
						$i=0;
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
				}
			else if($ty=="dell")
			{
				$sql="delete from friend where uid=".$_SESSION["uid"]." and fuid=".$dt;
				$result=mysql_query($sql);
				if($result)
				{	
					$da[0]="success";
					$da[1]="删除好友成功";
				}
				else{
					$da[0]="error";
					$da[1]="数据库写入失败";
				}
			}
			
	
	
		}
}
else
{
	$da[0]="error";
	$da[1]="您需要重新进行登录验证！";
}
echo json_encode($da,JSON_UNESCAPED_UNICODE);
?>