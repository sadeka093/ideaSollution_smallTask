<?php
$file = 'wap.txt';
//$searchfor = '|01';

$contents = file_get_contents($file);
?>
<table class="table table-bordered table-striped">
 <tr>
   <!-- <td>id</td> -->
   <td>Phone_Num</td>

</tr>

<tr>
<?php  
/*echo "</tr>";*/
if(preg_match_all('/(\d+|\-|\+|\(|\)|\ ){0,}(01)(\d+|\ |\-){8,14}/',$contents,$matches)){
   echo "Found matches:\n";
   

?>


    <?php  echo "<td>".implode("\n", $matches[0]). "</td>";?> 
  </tr>
  <?php  

}
else{
   echo "No matches found";
}
?>


</table>