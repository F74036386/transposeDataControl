<?php
include_once "config.php";
session_start();
if($_POST["para"]=="comment"){
    $_SESSION["comment"][$_POST["id"]][$_POST["column"]]=$_POST["comment"];
    echo $_POST["comment"];
}
else if($_POST["para"]=="save"){
    if(!isset($_SESSION["comment"] )){ return;}
    else if(isset($_SESSION["comment"]["newLine"])){
        $state;$subject;$userNeed;$botResponse;$nextMatch;$isFirstMatch;
        
        if(!isset($_SESSION["comment"]["newLine"]["state"])){$state="";}
        else{$state=$_SESSION["comment"]["newLine"]["state"];}
        
        if(!isset($_SESSION["comment"]["newLine"]["subject"])){$subject="";}
        else{$subject=$_SESSION["comment"]["newLine"]["subject"];}
        
        if(!isset($_SESSION["comment"]["newLine"]["userNeed"])){$userNeed="";}
        else{$userNeed=$_SESSION["comment"]["newLine"]["userNeed"];}
        
        if(!isset($_SESSION["comment"]["newLine"]["botResponse"])){$botResponse="";}
        else{$botResponse=$_SESSION["comment"]["newLine"]["botResponse"];}
        
        if(!isset($_SESSION["comment"]["newLine"]["nextMatch"])){$nextMatch="";}
        else{$nextMatch=$_SESSION["comment"]["newLine"]["nextMatch"];}

        if(!isset($_SESSION["comment"]["newLine"]["isFirstMatch"])){$isFirstMatch="";}
        else{$isFirstMatch=$_SESSION["comment"]["newLine"]["isFirstMatch"];}
        
        
        $query="INSERT INTO `".$sqlDataTable."` (`state`,`subject`,`userNeed`,`botResponse`,`nextMatch`,`isFirstMatch`) VALUES (  '$state','$subject','$userNeed','$botResponse','$nextMatch','$isFirstMatch')"; 
        echo $query;
        mysqli_query($link,$query);
        unset($_SESSION["comment"]["newLine"]);
    }



    foreach($_SESSION["comment"] as $key=>$value){

        if(isset($value["state"])){
            $rr=$value["state"];

            $query="UPDATE `".$sqlDataTable."` SET `state`='$rr' WHERE `id`='$key'";
         // echo $query;
            mysqli_query($link,$query);
           // echo $key."  ".$value["request"];
        }

        if(isset($value["subject"])){
            $rr=$value["subject"];
            $query="UPDATE `".$sqlDataTable."` SET `subject`='$rr' WHERE `id`='$key'";
      //  echo $query;
            mysqli_query($link,$query);
           // echo $key."  ".$value["index"];
        }

        if(isset($value["userNeed"])){
            $rr=$value["userNeed"];
            $query="UPDATE `".$sqlDataTable."` SET `userNeed`='$rr' WHERE `id`='$key'";
       // echo $query;
            mysqli_query($link,$query);
            //echo $key."  ".$value["response"];
        }

        if(isset($value["botResponse"])){
            $rr=$value["botResponse"];

            $query="UPDATE `".$sqlDataTable."` SET `botResponse`='$rr' WHERE `id`='$key'";
         // echo $query;
            mysqli_query($link,$query);
           // echo $key."  ".$value["request"];
        }

        if(isset($value["nextMatch"])){
            $rr=$value["nextMatch"];

            $query="UPDATE `".$sqlDataTable."` SET `nextMatch`='$rr' WHERE `id`='$key'";
         // echo $query;
            mysqli_query($link,$query);
           // echo $key."  ".$value["request"];
        }

        if(isset($value["isFirstMatch"])){
            $rr=$value["isFirstMatch"];

            $query="UPDATE `".$sqlDataTable."` SET `isFirstMatch`='$rr' WHERE `id`='$key'";
         // echo $query;
            mysqli_query($link,$query);
           // echo $key."  ".$value["request"];
        }
    }
    
    unset($_SESSION["comment"]);
}
?>
