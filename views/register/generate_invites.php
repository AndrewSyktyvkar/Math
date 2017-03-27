<?php 
    // echo $_SERVER['DOCUMENT_ROOT']
	require_once($_SERVER['DOCUMENT_ROOT'] . '/math/config/system_inits.php');
	$query = "SELECT * FROM invites;";
	$result = $mysqli->query($query);
	if (!$result)
		die("Error message: ". $mysqli->error);
	for ($i = 0, $row = $result->fetch_array(); $row; $i++, $row = $result->fetch_array())
		$rows[$i] = $row;
	$invites = array();
	for ($i = 0; $i < 30; $i++) {
		$not_unique = false;
		$seed = rand();
		$hash = hash("md2", $seed);
		for ($j = 0; $j < $result->num_rows; $j++)
			if ($hash == $rows[$j]["invite"]) {
				$not_unique = true;
				break;
			}
		if ($not_unique) {
			$i--;
			continue;
		}
		for ($j = 0; $j < $i; $j++)
			if ($hash == $invites[$j]) {
				$not_unique = true;
				break;
			}
		if ($not_unique) {
			$i--;
			continue;
		}
		$query = sprintf('INSERT INTO invites VALUES("%s");', $hash);
		$result = $mysqli->query($query);
		if (!$result)
			die("Errormessage: ". $mysqli->error);	
		$invites[$i] = $hash;
	}
?>