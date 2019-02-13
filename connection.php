<?php 
$host='localhost';
$usr='root';
$pass='';
$db='smile_studio';
session_start();
if (!mysql_connect($host,$usr,$pass) || !mysql_select_db($db)) 
{
	die(mysql_error());
}

 ?>