<!DOCTYPE html>
<html>
<?php
	include ("bd.php");	
	$autor=534535;
	$date = date('o-m-d');
	$N_test=111;
?>
<H1 align="center">Тест № <?php echo $N_test ?></H1>
<?php
	include ("post.php");
	include ("News.php");
	if (isset($_POST['text'])){ header("Location: index.php"); }
?>
<form name="MyForm" method="post">	
	<div align="center" >	
	<textarea name="text" cols="70" wrap="soft | hard"  rows="10" id="content"></textarea><br>	
	<button type="submit" formaction="index.php" class="button_1">Отправить</button>
	</div>
</form>
</html>

