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

printf("<html>
\t<body>
\t\t<form action=\"check_test.php\" method=\"post\">
\t\t\tИдентификатор теста: %d<br>
\t\t\t<input type=\"hidden\" name=\"test_id\" value=\"%d\">
\t\t\t<p>Описание теста:
\t\t\t<input name=\"test_description\"></p>\n",
$_POST["choose_test"], $_POST["choose_test"]);

$query = sprintf("select task_id, task_number from tasks_in_tests
	where (test_id = %d) order by task_number asc", $_POST["choose_test"]);
$task_nums= $db->query($query);

$query = sprintf("select task_id from tasks order by task_id asc");
$task_ids = $db->query($query);
while($num = $task_nums->fetch_row()) {
	$query = sprintf("select tasks.task_id, subcategories.category_id from
		(tasks inner join subcategories
		on (tasks.subcategory_id = subcategories.subcategory_id))
		where (tasks.task_id = '%d')", $num[0]);
	$category_id = $db->query($query);
	$category_id = $category_id->fetch_row();
	$category_id = $category_id[1];

	printf("\t\t\t<p>Задача %d: <select size=\"1\" name=\"task_%d\">\n",
		$num[1], $num[1]);

	$query = sprintf("select tasks.task_id, subcategories.category_id from
		(tasks inner join subcategories
		on (tasks.subcategory_id = subcategories.subcategory_id))
		where (subcategories.category_id = '%d')", $category_id);
	if (!($task_ids = $db->query($query))) {
		printf("Ошибка при выполнении запроса.<br>");
		exit(1);
	}

	$task_ids->data_seek(0);
	while ($row = $task_ids->fetch_row())
		printf("\t\t\t\t<option %s value=\"%d\">%d</option>\n",
			($row[0] == $num[0] ? "selected" : ""),
			$row[0], $row[0]);
	printf("\t\t\t</select>
	\t\t</p>
	\t\t\n");
}

printf("\t\t\t<p><input type=\"submit\"></p>
\t\t</form>
\t</body>
<html>", $_POST["choose_test"]);

?>
