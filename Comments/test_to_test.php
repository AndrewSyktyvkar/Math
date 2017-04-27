<!DOCTYPE html>
<html>
	<meta charset="utf-8">

	<?php		
			$autor=12323;
			$date = date('o-m-d');
			$N_test=113;
	?>

	<?php include("Comments_to_tests/index.php"); ?>

	<form name="MyForm" method="post">					
				<textarea class="form-control" name="text" cols="70" wrap="soft | hard"  rows="10" id="content"></textarea><br>	
				<button class="btn btn-success" type="submit" formaction="/math/views/representation_test/test.php" class="button_1">Отправить</button>
	</form>
<html>
