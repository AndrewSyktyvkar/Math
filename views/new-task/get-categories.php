<?php 
	require_once($_SERVER['DOCUMENT_ROOT'] . '/math/config/system_inits.php');  
	$subject_id = $_GET['subject_id'];
	$query=sprintf("SELECT * FROM categories where subject_id=%d;", $subject_id);
	$result = $mysqli->query($query);
	
	if (!$result) {
		echo 'ERR';
		fprintf($stderr, "Error message: %s\n", $mysqli->error);
		exit(1);
	}
	
	while (($row = $result->fetch_array()))
		printf ('<li><a href="#" onclick="change_category(this, %d)"> %s </a></li>', $row['category_id'], $row['category_name']);
?>	
