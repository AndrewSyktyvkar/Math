<?php
	require_once($_SERVER['DOCUMENT_ROOT'] . '/math/config/system_inits.php');  
	$subject_id = $_POST['subject_id'];
	$category_id = $_POST['category_id'];
	$subcategory_id = $_POST['subcategory_id'];
	$task_text = $_POST['task_text'];
	$is_real = $_POST['is_real'];
	$task_name =  $_POST['task_name'];
	
	
	$task_text = str_replace("\\", "\\\\", $task_text);
	$query = sprintf("INSERT INTO tasks VALUES(0, '%s', '%s', 0, %d, %b)", $task_name, $task_text, $subcategory_id, $is_real);
	if (!$mysqli->query($query)) { 
		echo "ERR";
		fprintf($stderr, "Error message: %s\n", $mysqli->error);
		exit(1);
	}
?>
