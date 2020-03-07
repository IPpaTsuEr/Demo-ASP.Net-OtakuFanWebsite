<?php
session_start();
function login_check()
{
	if(!isset($_SESSION["uid"])){
	echo "<script>window.top.location='../default.php';</script>";
    //return ture;
    }
}
?>