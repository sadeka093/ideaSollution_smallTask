<?php
$file = 'wap.txt';
$contents = file_get_contents($file);
?>

<table>
 
  <tr>
   
    <th>phone numbers</th>
    
  </tr>
  <tr>
    <td>
    <?php  

if(preg_match_all('/(\d+|\-|\+|\(|\)|\ ){0,}(01)(\d+|\ |\-){8,14}/',$contents,$matches)){

  echo implode( "<tr> <td>", $matches[0]);
   }
   

?>
   
</table>