<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/math/config/system_inits.php');

	$idt = $_GET['test_id'];
	
    $query = sprintf("SELECT * FROM tasks where task_id=%d", $_GET['task_id']);

	if (!($result = $mysqli->query($query))) {
		fprintf($stderr, "Error message: %s\n", $mysqli->error);
		exit(1);
	}	
	if ($result->num_rows == 0)
		echo "<H2>Нет такого задания!</H2>";
	else {
		while (($row = $result->fetch_array())) {
			//echo "Задача " . $row['task_name'] . ". " . $row['task_text'] . ".<br><br>";
			printf("<b>Задача %s.</b> <br/> %s", $row['task_name'], $row['task_text']);
		}
	}
?>
