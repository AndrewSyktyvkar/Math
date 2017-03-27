<?php
	session_start();
	$mysqli = new mysqli("localhost", "root", "1", "math");
	if ($mysqli->connect_error)
		die('Ошибка подключения (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
	$mysqli->query( "SET CHARSET utf8" );
	$stderr = fopen('php://stderr', 'rw');
?>