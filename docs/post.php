<?php
	include ("bd.php");
	if (isset($_POST['text']))
	{
		echo "text otpravlen";
	}
	$text = $_POST['text'];
	echo '<br>'.$text;
		
	$query = "INSERT INTO text (text_area) VALUES ('$text')";
	mysql_query($query);
	
	
	 if ($query) {
        echo "<p>Успешно добавлено в базу</p>";
    }
	else {
         echo "<p>0</p>";
    }
?>
	