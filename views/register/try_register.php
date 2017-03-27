<?php
	require_once($_SERVER['DOCUMENT_ROOT'] . '/math/config/system_inits.php');  
	$email = $_POST['email'];
	$passwd = $_POST['passwd'];
	$invite = $_POST['invite'];
	$error = false;
	if (!$email) {
		echo "Email is required<br>";
		$error = true;
	} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		echo "Please input correct email<br>";
		$error = true;
	} else {
		$query = "SELECT email from users where email='" . $email . "';"; 
		$result = $mysqli->query($query);
		if (!$result) {
			fprintf($stderr, "Error message: %s\n", $mysqli->error);
			exit(1);
		}
		if ($result->num_rows > 0) {
			echo "This email is already used<br>";
			$error = true;
		}
	}
	if (!$passwd)
		echo "Password is required<br>";
	else {
		$short = strlen($passwd) < 7;
		
		$nolower = $noupper = $nodigits = true;
		for ($i = 0; $i < strlen($passwd); $i++) {
			if (ctype_lower($passwd[$i]))
				$nolower = false;
			if (ctype_upper($passwd[$i]))
				$noupper = false;
			if (ctype_digit($passwd[$i]))
				$nodigits = false;
		}
		if ($short || $nolower || $noupper || $nodigits) {
			echo "Your password is too weak<br>";
		}
	}	
	if (!$invite) {
		echo "Invite is required";
		$error = true;
	} else {
		$query = "SELECT * FROM invites where invite='" . $invite . "';";
		$result = $mysqli->query($query);
		if (!$result) {
			fprintf($stderr, "Error message: %s\n", $mysqli->error);
			exit(1);
		}
		if ($result->num_rows == 0) {
			echo "Incorrect invite<br>";
			$error = true;
		}
		$row = $result->fetch_array();
		$is_used = $row['is_used'];
		if ($is_used) {
			echo "Invite is already used<br>";
			$error = true;
		}
	}
	if (!$error) {
		$passwd_hash = hash("whirlpool", $passwd);
		
		//$mysqli->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);
		$mysqli->autocommit(FALSE);
		$query = "INSERT INTO users VALUES(0, '" . $email . "', '" . $passwd_hash . "');";
		//echo $query . " ";
		$result_insert = $mysqli->query($query);
		$query = "UPDATE invites SET is_used=true where invite='". $invite . "'";
		$result_update = $mysqli->query($query);
		if (!$result_insert || !$result_update) {
			$mysqli->rollback();
			fprintf($stderr, "Error on transaction: %s",  $mysqli->error);
		} else {
			$mysqli->commit();
			echo "OK";
		}
	}
	//printf("email %s : passwd %s : invite %s\n", $email, $passwd, $invite)
?>