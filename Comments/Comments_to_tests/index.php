<!DOCTYPE html>
<html>
	<meta charset="utf-8">

	<?php if (isset($_POST['text']) && empty($_POST['text'])){?>
		<meta http-equiv="refresh" content="0; URL=/math/views/representation_test/test.php"> <?php //Название шаблона ?>
	<?php }?>

	<H2 align="left">Комментарии</H2>
	
	<?php
		include ("bd.php");	
		include ("post.php");
		include ("News.php");
	?>
</html>

