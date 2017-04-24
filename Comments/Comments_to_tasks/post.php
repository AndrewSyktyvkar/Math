<!DOCTYPE html>
<html>
<?php		
	if (isset($_POST['text']) && !empty($_POST['text']))
	{
	    $text = htmlentities($_POST['text']);
		$query = "INSERT INTO comments (comment_id, comment_to, comment_text, comment_date, comment_autor) VALUES (0,'$N_test', '$text', '$date', '$autor')";
		$mysqli->set_charset("utf8"); $result = $mysqli->query($query);		
	}
?>
</html>