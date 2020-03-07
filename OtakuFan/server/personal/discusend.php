<?php
session_start();
header("Content-Type: application/json");
header("Cache-Control: no-cache");
header("Pragma: no-cache");

$da=array();
$type=$_POST["type"];
$mesdata=$_POST["mess"];

if(!empty($_SESSION["uid"]))
{
	if($mesdata!="")
	{
			$sql="insert into discuss(`uid`,`mess`) values(".$_SESSION["uid"].",'".$mesdata."')";
			
			$db_link=mysql_connect('localhost','root','');
			if(!$db_link)
				{
					$da[0]="error";
					$da[1]="无法连接到数据库，可能由于网络异请重新尝试常导致";
					$da[2]="error";
				}
			else{
					mysql_select_db('test',$db_link);
					$result=mysql_query($sql);
					if(!$result)
					{
							$da[0]="error";
							$da[1]="插入数据时出现错误,请重新尝试";
							$da[2]="error";
					}
					else
					{
							$da[0]="success";
							$da[1]="发送消息成功";
							$da[2]="success";
					}
				}

		}
		else
		{
				$da[0]="error";
				$da[1]="错误~";
				$da[2]="你什么都没写呢~";
		}
}
else
{
	$da[0]="error";
	$da[1]="登录验证出现问题，需要重新登录";
	$da[2]="error";
}
	
echo json_encode($da,JSON_UNESCAPED_UNICODE);
?>