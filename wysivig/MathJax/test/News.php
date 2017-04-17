<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<script type="text/x-mathjax-config">
  MathJax.Hub.Config({
    extensions: ["tex2jax.js"],
    jax: ["input/TeX","output/HTML-CSS"],
    tex2jax: {inlineMath: [["$","$"],["\\(","\\)"]]}
  });
</script>
<script type="text/javascript" src="../MathJax.js"></script>

<?php	
	include ("bd.php");	
	$query = "SELECT * FROM `wisiwig_test`";
	$result = $mysqli->query($query); 
	while ($row = $result->fetch_assoc())
   {
       $row1=html_entity_decode($row['text']);
       echo 'id: '.$row['id'];  echo '  text: <br>'.$row1; echo '<br>'; 
   }
?>

<form name="MyForm" method="post">
    <button type="submit" formaction="index.php" class="button_1">Назад</button>
</form>
</html>