<?php
include_once "config.php";
session_start();
if($_POST["para"]=="comment"){
    $_SESSION["comment"][$_POST["id"]][$_POST["column"]]=$_POST["comment"];
    echo "kk";
}
else if($_POST["para"]=="save"){
    if(!isset($_SESSION["comment"] )){ return;}
    else if(isset($_SESSION["comment"]["newLine"])){
        $request;$response;$index;
        if(!isset($_SESSION["comment"]["newLine"]["request"])){$request="";}
        else{$request=$_SESSION["comment"]["newLine"]["request"];}
        
        if(!isset($_SESSION["comment"]["newLine"]["response"])){$response="";}
        else{$response=$_SESSION["comment"]["newLine"]["response"];}
        
        if(!isset($_SESSION["comment"]["newLine"]["index"])){$index="";}
        else{$index=$_SESSION["comment"]["newLine"]["index"];}
        
        $query="INSERT INTO `".$sqlDataTable."` (`index`,`request`,`response`) VALUES ( '$index' ,'$request','$response')"; 
        echo $query;
        mysqli_query($link,$query);
        unset($_SESSION["comment"]["newLine"]);
    }
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
