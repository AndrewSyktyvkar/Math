<!DOCTYPE html>
<html>



<?php
	$query = "SELECT * FROM `comments_to_tests` WHERE test_id = 113";
	$result = $mysqli->query($query); $reg=0; 
	while ($row = $result->fetch_assoc())
    {
	if ($row['comment_id']!=null) $reg=1;	
?>	  
<table align="center" >
    <tr>
        <th align="left" style="font-size: 15pt; text-decoration: underline;"><?php echo $row['comment_autor']; ?></th>
    </tr>
    <tr>
        <td cellpadding="15px"><?php echo $row['comment_text']; ?></td>
    </tr>
    <tr>
        <td align="left" style="font-size: 8pt;" >
        <i><?php echo $row['comment_date']; ?></i>

        
        </td>
    </tr>
	    <tr>
        <td align="left">-----------------------------------------------------------------------------------</td>
    </tr>
</table>

<?php	   
   }
   if ($reg==0){
   ?>
    <p align="center"> В данный момент комментариев нет, но вы можете быть первым. </p>
   <?php
   }
?>
</html>