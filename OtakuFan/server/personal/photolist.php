<?php session_start();
$alt=$_POST["altr"];
//用户对图片的描述
$access=$_POST["access"];
//用户是否共享该图的标志位
$da=array();
//信息数组
$loaddir="../../userdata/upload/";
//上传文件保存路径
$ftype=array("jpg","png","bmp","gif","jpeg","tiff");
//允许上传的文件格式
$maxfsize=1000*1000*8;//8mb文件上传大小限制
clearstatcache();//清空文件缓存
$da[0]="error";//设置初始信息
function getftype($fname){//获取文件后缀名
		return substr(strrchr($fname,'.'),1);}
$ta=strtolower(getftype($_FILES['filec']['name']));
//获取文件后缀名小写格式字符
$udir=$loaddir.$_SESSION["uid"]."/";
	if(!opendir($udir)){
		//检测用户目录是否存在
		mkdir($udir);
		if(opendir($udir)){
			closedir($udir);}
			//判断创建用户目录是否成功
		else {
			$da[1]="无法创建目录";
			echo("<div id='inf' name='".$da[0]."'>".$da[1]."</div>");
			exit;}}
			//无法创建用户目录就给出错误信息并退出执行
	$loaddir=$udir;//将新地址作为存放文件的路径
	if(!in_array($ta,$ftype)){
		$da[1]="上传文件类型错误";
		echo("<div id='inf' name='".$da[0]."'>".$da[1]."</div>");
		exit;}
	else if($_FILES['filec']['size']>$maxfsize){
		$da[1]="文件大小超出限定值";
		echo("<div id='inf' name='".$da[0]."'>".$da[1]."</div>");
		exit;}
	else if(!is_uploaded_file($_FILES['filec']['tmp_name'])){
		$da[1]="上传过程出现错误";
		echo("<div id='inf' name='".$da[0]."'>".$da[1]."</div>");
		exit;}
	else if(!move_uploaded_file($_FILES['filec']['tmp_name'],
			$loaddir.iconv("UTF-8","gb2312",$_FILES['filec']['name']))){
				//将gb2312编码的文件名字符转化为utf-8格式
		$da[1]="找不到指定存放路径";
		echo("<div id='inf' name='".$da[0]."'>".$da[1]."</div>");
		exit;}
	else {
		//更新数据库相关数据
		if(!empty($_SESSION["uid"])){
				$shar="false";
				if($access==1)$shar="true";
				$sql="insert into photo(`uid`,`pic`,`alt`,`access`) values(".$_SESSION["uid"].",'".$_SESSION["uid"]."/".$_FILES['filec']['name']."','".$alt."',".$shar.")";
				$db_link=mysql_connect('localhost','root','');
				if(!$db_link){
						$da[0]="error";
						$da[1]="无法连接到数据库，写入信息失败";}
				mysql_select_db('test',$db_link);
				$result=mysql_query($sql);
				if($result){	
						$da[0]="success";
						$da[1]="已保存";}
				else{
						$da[0]="error";
						$da[1]="数据库写入失败";}}
			else{
				$da[0]="error";
				$da[1]="登录验证出现问题，需要重新登录";}
		
		if($da[0]="success"){
			$da[1]=iconv("UTF-8","gb2312",$_FILES['filec']['name']);}
		echo("<div id='inf' name='".$da[0]."'>".$da[1]."</div>");
}
?>