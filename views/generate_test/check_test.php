<?php

$has_error = FALSE;

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

printf("<html>
\t<body>
\t\t<pre>
Идентификатор теста: %d\n
Описание теста: %s\n\n", $_POST["test_id"], $_POST["test_description"]);

$query = sprintf("select task_number from tasks_in_tests
	where (test_id = '%d')", $_POST["test_id"]);

$task_numbers = $db->query($query);

while (($num = $task_numbers->fetch_row())) {
	$query = sprintf("select * from tasks where (task_id = '%d')",
		$_POST["task_" . $num[0]]);
	
	$task = $db->query($query);
	$task = $task->fetch_row();

	printf("Задача %d:\n", $num[0]);
	if (!($task)) {
		printf("	Задача не выбрана.\n");
		$has_error = TRUE;
		continue;
	}

	printf("	Идентификатор: %d\n", $task[0]);
	printf("	Название задачи: %s\n", $task[1]);
	printf("	Рейтинг задачи: %d\n", $task[3]);
	printf("	Подкатегория: %d\n", $task[4]);

	if ($task[5] == 1)
		printf("	Задача из реального теста\n");

	printf("%s\n\n", $task[2]);
}

printf("\t\t</pre>\n");

printf("\t\t<form action=\"apply_test.php\" method=\"post\">
\t\t\t<input type=\"hidden\" name=\"test_id\" value=\"%d\">
\t\t\t<input type=\"hidden\" name=\"test_description\" value=\"%s\">,
\t\t\t<input type=\"hidden\" name=\"test_date\" value=\"%s\">\n",
$_POST["test_id"], $_POST["test_description"], date("Y-m-d"));

$task_numbers->data_seek(0);
while (($num = $task_numbers->fetch_row()))
	printf("\t\t\t<input type=\"hidden\" name=\"task_%d\" value=\"%d\">\n",
		$num[0], $_POST["task_" . $num[0]]);

printf("\t\t\t<input type=\"submit\" %s>
\t\t</form>
\t</body>
</html>
", $has_error ? "disabled" : "");

?>
