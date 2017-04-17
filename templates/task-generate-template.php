<?php 
	
	require_once($_SERVER['DOCUMENT_ROOT'] . '/math/config/system_inits.php');
	
	$query = "SELECT subcategory_id, subcategory_name from subcategories"; 
		$result = $mysqli->query($query);
		if (!$result) {
			fprintf($stderr, "Error message: %s\n", $mysqli->error);
			exit(1);
		}
 ?>
 
<form action="/math/views/gen-task/handler.php" method = "post">
	<p><b>Выберите интересующие вас категории</b></p>

	<?php foreach ($result as $task): ?>
	<div class="checkbox">
		<label>
			<input type="checkbox" value="<?php echo $task['subcategory_id'] ?>"
			name="tasks[]">
				<?php echo $task['subcategory_id'] ?>
				<?php echo $task['subcategory_name'] ?> <Br>
		</label>
	</div>
	<?php endforeach; ?>	
	
	<button type="submit" name = "submit" class="btn btn-success btn-lg">Submit</button>
 </form> 


