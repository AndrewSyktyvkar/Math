<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<?php	
	include ("bd.php");	
	if (isset($_POST['text']))
	{
		echo "Добавляемый текст";
		if(preg_match_all('/^(.+?)$/m', $_POST['text'], $lines)) {
			$NSTR=sizeof($lines[1]);
		}else $NSTR=0;
		$str = explode("\n",$_POST['text']);
		$x=0; 
		while ($x<$NSTR)
		{   
			$str[$x]=substr($str[$x],3);
			$str[$x]=substr($str[$x],0,-4);
			$x++;
		}
		$text= implode($str); $text = html_entity_decode(quotemeta($text)); echo $text;
		$query = "INSERT INTO wisiwig_test VALUES (0,'$text')"; 
		$mysqli->set_charset("utf8"); $result = $mysqli->query($query);
		if (!$result) {
			echo("Error"); exit(1);
		}
		if ($query) {
			echo "<p>Успешно добавлено в базу</p>";
		}
		else {
			 echo "<p></p>";
		}
	}
	else echo "Текст не принят";
?>

<form name="MyForm" method="post">
    <button type="submit" formaction="index.php" class="button_1">Назад</button>
</form>
</html>