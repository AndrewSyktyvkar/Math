<!DOCTYPE html>
<html>
	<?php		
		if (isset($_POST['text']) && !empty($_POST['text']))
		{
			$text = htmlentities($_POST['text']);
			$query = "INSERT INTO `comments_to_tests` (comment_id, test_id, comment_text, comment_date, comment_author) VALUES (0,'$N_test', '$text', '$date', '$autor')";
			$mysqli->set_charset("utf8"); $result = $mysqli->query($query);		
		}
	?>
</html>