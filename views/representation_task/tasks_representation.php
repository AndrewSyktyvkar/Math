<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/math/config/system_inits.php');
	
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
			printf("%s <br/> %s<br/>", $row['task_name'], $row['task_text']);
		}
		
		$query = sprintf("SELECT * FROM solutions where task_id=%d", $_GET['task_id']);
		if (!($result = $mysqli->query($query))) {
			fprintf($stderr, "Error message: %s\n", $mysqli->error);
			exit(1);
		}
		if ($result->num_rows == 0) {	
			echo "<span><b>Нет решений и ответов, но Вы можете предложить своё в комментариях.</b></span>";
		} else {
			$row = $result->fetch_array();
			$solution = $row['solution'];
			$answer = $row['answer'];
			
			if ($solution != null && $solution != "")
				printf("<b>Ответ: </b>%s<br/>", $solution);
			else 
				echo "<span><b>Нет ответа, но Вы можете предложить своё в комментариях.</b></span>";
			
				
			if ($answer != null && $answer != "")
				printf("<b>Решение: </b>%s", $answer);
			else 
				echo "<span><b>Нет решения, но Вы можете предложить своё в комментариях.</b></span>";
		}
	}
?>
