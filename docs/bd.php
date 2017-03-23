 <?php
	session_start();
	$mysqli = new mysqli('localhost', 'my_user', 'my_password', 'my_db');
	if ($mysqli->connect_error)
		die('Ошибка подключения (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
	$mysqli->query( "SET CHARSET utf8" );
	$stderr = fopen('php://stderr', 'rw');
?>


