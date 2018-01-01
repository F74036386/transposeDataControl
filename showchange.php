<div style="display: flex">

<div>
<table border="1" style="width: 80vw; table-layout:fixed;">
<tr>
<th style="width: 8vw"></th>
<th style="width: 8vw">state</th>
<th style="width: 10vw">使用者想要......</th>
<th style="width: 25vw">使用者會說......</th>
<th style="width: 25vw">機器人回應</th>
<th style="width: 10vw">有哪些<br>延伸問題</th>
<th style="width: 8vw">是否為<br>初始問題</th>

</tr>
<?php

include_once "config.php";
session_start();
echo "<br>";

 echo "<tr>";
     $button="<input type=\"button\" style=\"background:rgba(0%,50%,80%,0.6)\" value=\"新增此筆資料\" onclick=\"saveChange()\">";
    echo "<td>".$button."</td>";
    echo "<td align='center'>"."<textarea onchange=\"commentChange(this,'newLine','state')\"></textarea></td>";
   
    echo "<td align='center'>"."<textarea onchange=\"commentChange(this,'newLine','subject')\"></textarea></td>";
    
    echo "<td align='center'>"."<textarea onchange=\"commentChange(this,'newLine','userNeed')\"></textarea></td>";
    echo "<td align='center'>"."<textarea onchange=\"commentChange(this,'newLine','botResponse')\"></textarea></td>";
 
    echo "<td align='center'>"."<textarea onchange=\"commentChange(this,'newLine','nextMatch')\"></textarea></td>";

    echo "<td align='center'>"."<textarea onchange=\"commentChange(this,'newLine','isFirstMatch')\"></textarea></td>";
  
 
    echo "</tr>";

$query="SELECT `id`,`state`,`subject`,`userNeed`,`botResponse`,`nextMatch`,`isFirstMatch` FROM `".$sqlDataTable."` ORDER BY `state`";

$result=mysqli_query($link,$query);
$rows=mysqli_fetch_array($result);
while($rows){
    echo "<tr>";
       $button="<input type=\"button\" style=\"background:rgba(80%,50%,0%,0.6)\" value=\"刪除此筆資料\" onchange=\"deleteData(".$rows[0].")\">";
    echo "<td>".$button."</td>";
    echo "<td align='center'>"."<textarea onchange=\"commentChange(this,".$rows[0].",'state')\">".$rows[1]."</textarea></td>";
   
    echo "<td align='center'>"."<textarea onchange=\"commentChange(this,".$rows[0].",'subject')\">".$rows[2]."</textarea></td>";
    
    echo "<td align='center'>"."<textarea onchange=\"commentChange(this,".$rows[0].",'userNeed')\">".$rows[3]."</textarea></td>";
     echo "<td align='center'>"."<textarea onchange=\"commentChange(this,".$rows[0].",'botResponse')\">".$rows[4]."</textarea></td>";
   
    echo "<td align='center'>"."<textarea onchange=\"commentChange(this,".$rows[0].",'nextMatch')\">".$rows[5]."</textarea></td>";
    
    echo "<td align='center'>"."<textarea onchange=\"commentChange(this,".$rows[0].",'isFirstMatch')\">".$rows[6]."</textarea></td>";
 
    echo "</tr>";
    $rows=mysqli_fetch_array($result);
}
?>
</table>