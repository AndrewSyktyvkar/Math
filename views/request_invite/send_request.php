<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/math/config/system_inits.php');  
	$email = $_POST['email'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $message = $_POST['message'];
    $error = false;
    if (!$email) {
		echo "Email is required<br>";
		$error = true;
	} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		echo "Please input correct email<br>";
		$error = true;
	} else {
		$query = "SELECT author_name from authors where author_name='" . $email . "';"; 
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
    if (!$name) {
        echo "Field name is empty.";
        $error = true;
    }
    if (!surname) {
        echo "Field surname is empty.";
        $error = true;
    }
    if (!message) {
        echo "Field message is empty.";
        $error = true;
    }
?>