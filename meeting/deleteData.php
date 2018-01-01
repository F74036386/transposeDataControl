<?php
include_once "config.php";
session_start();

$id=$_POST["id"];

$query="DELETE FROM `".$sqlDataTable."` WHERE `id`=".$id;

mysqli_query($link,$query);
?>
