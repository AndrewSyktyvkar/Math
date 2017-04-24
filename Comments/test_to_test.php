<!DOCTYPE html>
<html>
	<meta charset="utf-8">

	<?php		
			$autor=12323;
			$date = date('o-m-d');
			$N_test=113;
	?>

	<div class="content">
		<H1 align="center"> Контент</H1>
	</div>

	<div class="footer">
		<?php include("Comments_to_tests/index.php"); ?>

		<form name="MyForm" method="post">	
				<div align="center" >	
					<textarea name="text" cols="70" wrap="soft | hard"  rows="10" id="content"></textarea><br>	
					<button type="submit" formaction="test_to_test.php" class="button_1">Отправить</button>
				</div>
		</form>
	</div>

	<style>
		.content{
			position: static;
		}
		.footer {
			height: 80px;
			margin-top: 100px;
		}
	</style>
<html>