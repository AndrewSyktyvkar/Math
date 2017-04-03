<?php
	include ("bd.php");
	if (isset($_POST['text']))
	{
		echo "text otpravlen";
	}
	$text = $_POST['text'];
	echo '<br>'.$text;
		
	$query = "INSERT INTO wisiwig_test(test) VALUES ('$text')";
	mysql_query($query);
	
	
	 if ($query) {
        echo "<p>Успешно добавлено в базу</p>";
    }
	else {
         echo "<p>0</p>";
    }
?>
	