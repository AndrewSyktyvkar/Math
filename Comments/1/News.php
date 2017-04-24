<!DOCTYPE html>
<html>
<style>
table {
    table-layout: fixed;
    width:450px
}
td {
    word-wrap:break-word;
}
</style>
<?php		
    $per_page=10;
    if (isset($_GET['page'])) $page=($_GET['page']-1); else $page=0;
    $start=abs($page*$per_page);








	$query = "SELECT * FROM `comments` WHERE comment_to = $N_test  Limit 0,5";
	$result = $mysqli->query($query); $reg=0; $st=0;
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
        <i><?php echo $st; $st=$st+1; ?></i>
        
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


$q="SELECT count(*) FROM `comments`";
$res=mysql_query($q);
$row=mysql_fetch_row($res);
$total_rows=$row[0];

$num_pages=ceil($total_rows/$per_page);

/*
for($i=1;$i<=$num_pages;$i++) {
  if ($i-1 == $page) {
    echo $i." ";
  } else {
    echo '<a href="'.$_SERVER['PHP_SELF'].'?page='.$i.'">'.$i."</a> ";
  }
}
*/











?>
</html>