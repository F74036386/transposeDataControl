<html>
<head>
<title>DATA管理器</title>
<link rel=stylesheet type="text/css" href="logStyle.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script>
var nowpage="0";

function commentChange(area,id,col){
	//alert("dd");
    var oXHR=new XMLHttpRequest();
	para= "para=comment&id="+id+"&column="+col+"&comment="+area.value;   // encodeURIComponent(para); URL編碼
	oXHR.open("POST","savechange.php",true);
	oXHR.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	oXHR.onreadystatechange= function(){
		if(oXHR.readyState==4 &&(oXHR.status==200||oXHR.status==304)){
			//alert(oXHR.responseText);
			//alert("dd");

		}
	}
	oXHR.send(para);
}

function saveChange(){
    var oXHR=new XMLHttpRequest();
	para= "para=save";   // encodeURIComponent(para); URL編碼
	oXHR.open("POST","savechange.php",true);
	oXHR.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	oXHR.onreadystatechange= function(){
		if(oXHR.readyState==4 &&(oXHR.status==200||oXHR.status==304)){
            alert("您的變更已經儲存");
			//alert(oXHR.responseText);
			showChange(nowpage);
		}
	}
	oXHR.send(para);
}

function deleteData(id){
    var oXHR=new XMLHttpRequest();
	para= "para=delete&id="+id;   // encodeURIComponent(para); URL編碼
	oXHR.open("POST","deleteData.php",true);
	oXHR.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	oXHR.onreadystatechange= function(){
		if(oXHR.readyState==4 &&(oXHR.status==200||oXHR.status==304)){
            alert("您的變更已經儲存");
			//alert(oXHR.responseText);
			showChange(nowpage);
		}
	}
	oXHR.send(para);
}


function showChange(page){
    nowpage=page;
    var oXHR=new XMLHttpRequest();
	para= "page="+page;   // encodeURIComponent(para); URL編碼
	oXHR.open("POST","showchange.php",true);
	oXHR.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	oXHR.onreadystatechange= function(){
		if(oXHR.readyState==4 &&(oXHR.status==200||oXHR.status==304)){
			var r=document.getElementById("table");
			r.innerHTML=oXHR.responseText;
		}
	}
	oXHR.send(para);
}


</script>
</head>
<?php
session_start();
include_once "config.php";
?>
<style>
</style>
<p class="title">DATA controler</p>
<div id="table"><br>
<div style="display: flex">
<div style="width: 15vw">
<div class="buttonSection">
<input type="button" value="儲存變更" onclick="saveChange()" class="save">
</div>
</div>
<div>
<table border="1" style="width: 80vw; table-layout:fixed;">
<tr>
<th style="width: 10vw"></th>
<th style="width: 16vw">INDEX</th>
<th style="width: 24vw">REQUEST</th>
<th style="width: 24vw">RESPONSE</th>
</tr>
<?php

 echo "<tr>";
    echo "<td>填入此列新增資料</td>";
    echo "<td align='center'>"."<textarea onkeyup=\"commentChange(this,'newLine','index')\"></textarea></td>";
   
    echo "<td align='center'>"."<textarea onkeyup=\"commentChange(this,'newLine','request')\"></textarea></td>";
    
    echo "<td align='center'>"."<textarea onkeyup=\"commentChange(this,'newLine','response')\"></textarea></td>";
 
    echo "</tr>";
    




$query="SELECT `id`,`index`,`request`,`response` FROM `".$sqlDataTable."` ORDER BY `index`";
//echo $query;
$result=mysqli_query($link,$query);
//echo "<br>aaa".$result."bbb<br>";
//echo(gettype($result));
$rows=mysqli_fetch_array($result);

while($rows){
    echo "<tr>";
    $button="<input type=\"button\" style=\"background:rgba(70%,0%,0%,0.4)\" value=\"刪除此筆資料\" onclick=\"deleteData(".$rows[0].")\">";
    echo "<td>".$button."</td>";
    echo "<td align='center'>"."<textarea onkeyup=\"commentChange(this,".$rows[0].",'index')\">".$rows[1]."</textarea></td>";
   
    echo "<td align='center'>"."<textarea onkeyup=\"commentChange(this,".$rows[0].",'request')\">".$rows[2]."</textarea></td>";
    
    echo "<td align='center'>"."<textarea onkeyup=\"commentChange(this,".$rows[0].",'response')\">".$rows[3]."</textarea></td>";
 
    echo "</tr>";
    $rows=mysqli_fetch_array($result);
}
?>
</table>
</div>
</div>
</div>
</html>