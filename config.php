<?php
//$host="140.116.245.148";
//$user="f74036386";
//$upwd="00000AAA";
$db="f74036386";

$host="127.0.0.1";
$user="root";
$upwd="";
$sqlDataTable="transposedata";

$link=mysqli_connect($host,$user,$upwd) or die("Unable to connect".mysql_error());
mysqli_query($link,"SET NAMES UTF8");
mysqli_select_db($link,$db) or die("Unable to select database");
?>
