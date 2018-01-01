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
	var kk=encodeURIComponent(area.value);
	para= "para=comment&id="+id+"&column="+col+"&comment="+kk;
	//para=encodeURIComponent(para); URL編碼
	//para=htmlspecialchars(para);
	oXHR.open("POST","savechange.php",true);
	oXHR.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	oXHR.onreadystatechange= function(){
		if(oXHR.readyState==4 &&(oXHR.status==200||oXHR.status==304)){
			//alert(oXHR.responseText);
			//alert("dd");
			if(id!="newLine")saveChange();
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
          
            //alert("您的新增已經儲存");
        	
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
            alert("您的資料已刪除");
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
include_once "config.php";
?>
<style>
</style>
<p class="title">DATA controller</p>
<div id="table">

<?php
include_once "showchange.php";
?>

</table>
</div>
</div>
</div>
</html>