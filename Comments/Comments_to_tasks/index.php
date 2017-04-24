<!DOCTYPE html>
<html>
	<meta charset="utf-8">
	<?php if (isset($_POST['text']) && !empty($_POST['text'])){?>
	<meta http-equiv="refresh" content="0; URL=test.php"> <?php //Название шаблона ?>
	<?php }?>
	<H2 align="center">Комментарии</H2>
	<?php
		include ("bd.php");	
		include ("post.php");
		include ("News.php");
	?>
</html>

