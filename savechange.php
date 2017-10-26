<?php
include_once "config.php";
session_start();
if($_POST["para"]=="comment"){
    $_SESSION["comment"][$_POST["id"]][$_POST["column"]]=$_POST["comment"];
    //echo "kk";
}
else if($_POST["para"]=="save"){
    if(!isset($_SESSION["comment"] )) return;
    foreach($_SESSION["comment"] as $key=>$value){
      
        if(isset($value["request"])){
            $rr=$value["request"];

        $query="UPDATE `".$sqlDataTable."` SET `request`='$rr' WHERE `id`='$key'";
         // echo $query;
        mysqli_query($link,$query);
           // echo $key."  ".$value["request"];
        }
        
        if(isset($value["index"])){
            $rr=$value["index"];
        $query="UPDATE `".$sqlDataTable."` SET `index`='$rr' WHERE `id`='$key'";
      //  echo $query;
        mysqli_query($link,$query);
           // echo $key."  ".$value["index"];
        }

        if(isset($value["response"])){
            $rr=$value["response"];
        $query="UPDATE `".$sqlDataTable."` SET `response`='$rr' WHERE `id`='$key'";
       // echo $query;
        mysqli_query($link,$query);
            //echo $key."  ".$value["response"];
        }
    }
    unset($_SESSION["comment"]);
}
?>
