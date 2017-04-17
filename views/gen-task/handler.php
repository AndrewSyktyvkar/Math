<?php 	
	require_once($_SERVER['DOCUMENT_ROOT'] . '/math/config/system_inits.php');
	
	$task_val = $_POST['tasks'];
	
	
	$N = count($task_val);

	
	for($i=0; $i < $N; $i++)
    {
      
    

		$query = "SELECT task_id, task_name, task_text, task_rate, subcategory_id, is_real"
				." from tasks where subcategory_id = " . $task_val[$i] . ";"; 
				
		
		$result = $mysqli->query($query);
		if (!$result) {
			fprintf($stderr, "Error message: %s\n", $mysqli->error);
			exit(1);
		}
		
		
		$row = $result->fetch_array();
			printf ("%s %s\n (%s)\n (%s)\n", $row['task_name'], $row['task_text'],
			$row['task_rate'], $row['is_real']); 
		echo '<br>';
			
	}
	mysqli_free_result($result);
		
	
		

