<?php
class DBclass
{
	private $host="localhost",$dbname="root",$dbpas="",$dbtable,$sql;
	public function setSQL($sql){$this->sql=$sql;}
	public function selectTBL($dbtable){$this->dbtable=$dbtable;}
	public function setDBinfo($host,$dbname,$dbpas){$this->host=$host;$this->dbname=$dbname;$this->dbpas=$dbpas;}
	public function run(){
		try{
			$db_connect=mysql_connect($this->host,$this->dbname,$this->dbpas);// or die("无法连接到数据库，请重试或联系网络管理员!")
			mysql_select_db($this->dbtable,$db_connect);
			$result=mysql_query($this->sql);
			return $result;
			}
		catch(Exception $err){echo '<script>alert "'.$err.'"</script>' ;}
		}
}
?>