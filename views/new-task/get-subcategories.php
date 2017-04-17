<?php 
	require_once($_SERVER['DOCUMENT_ROOT'] . '/math/config/system_inits.php');  
	$category_id = $_GET['category_id'];
	$query=sprintf("SELECT * FROM subcategories where category_id=%d;", $category_id);
	$result = $mysqli->query($query);
	
	if (!$result) {
		echo 'ERR';
		fprintf($stderr, "Error message: %s\n", $mysqli->error);
		exit(1);
	}
	
	while (($row = $result->fetch_array()))
		printf ('<li><a href="#" onclick="change_subcategory(this, %d)"> %s </a></li>', $row['subcategory_id'], $row['subcategory_name']);
?>	
