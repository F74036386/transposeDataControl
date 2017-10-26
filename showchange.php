<div style="display: flex">
<div style="width: 15vw">
<div class="buttonSection">
<?php

?>
<input type="button" value="儲存變更" onclick="saveChange()" class="save">
</div>
</div>
<div>
<table border="1" style="width: 80vw; table-layout:fixed;">
<tr>
<th style="width: 4vw"></th>
<th style="width: 16vw">INDEX</th>
<th style="width: 24vw">REQUEST</th>
<th style="width: 24vw">RESPONSE</th>
</tr>
<?php
include_once "config.php";
session_start();
echo "<br>";

echo "<tr>";
    echo "<td>填入此列新增資料</td>";
    echo "<td align='center'>"."<textarea onkeyup=\"commentChange(this',newLine','index')\"></textarea></td>";
   
    echo "<td align='center'>"."<textarea onkeyup=\"commentChange(this,'newLine','request')\"></textarea></td>";
    
    echo "<td align='center'>"."<textarea onkeyup=\"commentChange(this,'newLine','response')\"></textarea></td>";
 
    echo "</tr>";

$query="SELECT `id`,`index`,`request`,`response` FROM `".$sqlDataTable."` ORDER BY `index`";

$result=mysqli_query($link,$query);
$rows=mysqli_fetch_array($result);
while($rows){
    echo "<tr>";
    echo "<td></td>";
    echo "<td align='center'>"."<textarea onkeyup=\"commentChange(this,".$rows[0].",'index')\">".$rows[1]."</textarea></td>";
   
    echo "<td align='center'>"."<textarea onkeyup=\"commentChange(this,".$rows[0].",'request')\">".$rows[2]."</textarea></td>";
    
    echo "<td align='center'>"."<textarea onkeyup=\"commentChange(this,".$rows[0].",'response')\">".$rows[3]."</textarea></td>";
 
    echo "</tr>";
    $rows=mysqli_fetch_array($result);
}
?>
</table>