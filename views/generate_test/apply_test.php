<?php

if (!($db = new mysqli('localhost', 'root', '1', 'math'))) {
	printf("Невозможно отктыть базу данных");
	exit(1);
}

# for correct work with cyrillic symbols
if (!($db->query("set names 'utf8'"))
	|| !($db->query("set character set 'utf8'"))) {
	printf("Невозможно установить кодировку");
	exit(1);
}

$query = sprintf("update tests set test_description='%s',
	test_date='%s' where test_id='%d'",
	$_POST["test_description"], $_POST["test_date"], $_POST["test_id"]);
if (!($resp = $db->query($query))) {
	printf("Не получилось обновить запись в базе данных.<br>");
	exit(1);
}

$query = sprintf("select task_number, task_id from tasks_in_tests
	where (test_id = '%d')", $_POST["test_id"]);
if (!($resp = $db->query($query))) {
	printf("Невозможно извлечь данные из базы данных.<br>");
	exit(1);
}

while (($row = $resp->fetch_row())) {
	$query = sprintf("update tasks_in_tests set task_id='%d'
		where task_number='%d' and test_id='%d'",
		$_POST["task_" . $row[0]],
		$row[0], $_POST["test_id"]);

	if (!($r = $db->query($query)))
		printf("Не получилось обновить запись в базе данных.<br>");
}

printf("Изменение теста завершено.");

?>
