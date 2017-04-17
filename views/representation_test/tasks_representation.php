<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/math/config/system_inits.php');

	$idt = $_GET['test_id'];
	
    $query = "SELECT tests.test_id, test_description, task_number, task_text FROM tasks, tests, tasks_in_tests 
        WHERE tasks_in_tests.test_id = tests.test_id AND tasks_in_tests.task_id = tasks.task_id AND tests.test_id = '" . $idt . "';";
	
	$res = $mysqli->query($query);
	
	$row = $res->fetch_assoc();
	
	echo $row['test_description'] . "." . "<br>";
	
	if (!($result = $mysqli->query($query))) {
		fprintf($stderr, "Error message: %s\n", $mysqli->error);
		exit(1);
	}
	
	if ($result->num_rows == 0)
		echo "NO STATIONS";
	else {
		while (($row = $result->fetch_array())) {
			echo "Задача " . $row['task_number'] . ". " . $row['task_text'] . ".<br><br>";
		}
	}
?>
