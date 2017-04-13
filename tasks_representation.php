<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/math/config/system_inits.php');
    
    /*$parser = xml_parser_create();

    xml_set_element_handler($parser, "starts");

    $fp = fopen("tasks.xml", "r");

    while ($data = fread($fp, 4096)) {
        xml_parse($parser, $data, feop($fp));
    }

    xml_parser_free($parser);

    function starts($parser, $data) {
        
    }*/

	$idt = $GET['test_id'];

	$query1 = "SELECT tests.test_id, test_description FROM tests WHERE tests.test_id ='" . $idt . "';";
	
    $query = "SELECT tests.test_id, test_description, task_number, task_text FROM tasks, tests, tasks_in_tests 
        WHERE tasks_in_tests.test_id = tests.test_id AND tasks_in_tests.task_id = tasks.task_id";
	
	$res = $mysqli->query($query1);
	
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
    /*$stmt = $pdo->prepare('SELECT test_id, test_description, task_number, task_text FROM tasks, tests, tasks_in_tests 
        WHERE tasks_in_tests.text_id = tests.test_id AND tasks_in_tests.task_id = tasks.task_id');
    
    $stmt->execute(array('task_number' => $task_number, 'task_text' => $task_text));

    while ($row = $stmt->fetch(PDO::FETCH_LAZY))
    {
        echo $row['task_number'] . "\n";
        echo $row->task_number . "\n";
    }*/
?>
