<?php session_start();
header("Content-Type: application/json");
header("Cache-Control: no-cache");
header("Pragma: no-cache");

class infosql 
{
	private  $sql,$uid,$starttime,$endtime;
	private  $data=array();
	public   function setuid($uid){$this->uid=$uid;}
	public   function setendtime($nw){$this->endtime=$nw;}
	public   function getsql(){return $this->sql;}
	public   function tojson(){echo json_encode($this->data,JSON_UNESCAPED_UNICODE);}
	public   function setsqltype($type){
			switch($type)
			{
				case "dis"://聊天 discuss uid sendtime mess; shortmess uid toid sendtime mess ; userinfo uid nick portrait email
						$this->sql="select discuss.uid,portrait,nick,sendtime,mess from discuss,userinfo where discuss.uid=userinfo.uid and UNIX_TIMESTAMP(sendtime)>=(UNIX_TIMESTAMP()-".$this->endtime.") order by sendtime";
						break;
						
				case "mes"://短信
						$this->sql="select shortmess.uid,portrait,nick,sendtime,mess from shortmess,userinfo where shortmess.uid=userinfo.uid and (userinfo.uid=".$this->uid." or toid=".$this->uid.") and sendtime>=UNIX_TIMESTAMP(".$this->endtime.") order by sendtime";
						break;
						
				case "lms"://留言 sendtime between ".$this->starttime."and ".$this->endtime."
						$this->sql="select shortmess.uid,portrait,nick,sendtime,mess from shortmess,userinfo where shortmess.uid=userinfo.uid and (shortmess.uid=".$this->uid." or toid=".$this->uid." ) and sendtime>=UNIX_TIMESTAMP(".$this->endtime.")  order by sendtime";
						break;
				
				default:
						break;
				}
		}
	
	public  function run(){
				$db_link=mysql_connect('localhost','root','');
				if(!$db_link)
					{
						$this->data[0]='error';
						$this->data[1]='出现问题:数据库连接失败';
					}
				else {
						$i=0;
						mysql_select_db('test',$db_link);
						$result=mysql_query($this->sql);
						if(!$result||mysql_num_rows($result)==0)
						{
							$this->data[0]='error';
							$this->data[1]='没有数据';
							
						}
						//echo $result;
						else	
							while($row=mysql_fetch_array($result,MYSQL_ASSOC))
							{
								$this->data[$i]=$row;
								$i++;
							}
					}
				$this->tojson();
		}
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$info=new infosql();

if(!empty($_SESSION["uid"])){
	$info->setuid($_SESSION["uid"]);
	$info->setendtime($_POST["ftime"]);
	$info->setsqltype($_POST["type"]);
	$info->run();
	}
else{
	$info->data[0]="error";
	$info->data[1]="账号登陆已过期，请重新登陆后重试";
	$info->tojson();
	}
?>