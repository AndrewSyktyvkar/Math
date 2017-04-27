<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/math/config/system_inits.php');

	$idt = $_GET['test_id'];
	
    $query = "SELECT tests.test_id FROM tests WHERE tests.test_id = '" . $idt . "';";
	
	if (!($result = $mysqli->query($query))) {
		fprintf($stderr, "Error message: %s\n", $mysqli->error);
		exit(1);
	}
	
	if ($result->num_rows == 0)
		echo "NO STATIONS";
	else {
		$row = $result->fetch_assoc();
		echo "Вариант № " . $row['test_id'] . ".";
	}
?>
