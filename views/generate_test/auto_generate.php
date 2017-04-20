<?php 

# file is loading by post method with form from the auto_generate.html file
if (!is_uploaded_file($_FILES['templatefile']['tmp_name'])) {
	printf("Файл загружен некорретно<br>");
	exit(1);
}

if (!($template = file($_FILES['templatefile']['tmp_name']))) {
	printf("Невозможно открыть файл<br>");
	exit(1);
}

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

# adding new test into the table
# autoincrement isn't used, so we are figuring out it manually
$resp = $db->query("select test_id from tests order by test_id desc");
$test_id = ($row = $resp->fetch_row()) ? $row[0] + 1 : 0;

$query = sprintf("insert into tests values ('%d', 'Generated automatically',
	'%s', '0', '0')", $test_id, date("Y-m-d"));
if (!($db->query($query))) {
	printf("Невозможно добавить запись в базу данных");
	exit(1);
}

# loop for each string in a template file
$task_number = 1;
for ($i = 0; $i < count($template); $i++) {
	$str = trim($template[$i]);

	# string that begins from '#' is a comment and we should skip it
	if ($str[0] == '#')
		continue;
	
	# get ids of all tasks that belongs to
	# category listed in a current string
	$query = sprintf("select task_id
		from (tasks inner join 
		(categories inner join subcategories
		on categories.category_id = subcategories.category_id)
		on (tasks.subcategory_id = subcategories.subcategory_id))
		where (category_name = '%s')", $str);
	if (!($resp = $db->query($query))) {
		printf("Ошибка при поиске записи в базе данных");
		exit(1);
	}

	if ($resp->num_rows <= 0) {
		# if corresponding task isn't found, then set task_id to -1
		# and notify user about error. 
		printf("В базе данных не найдено ни одной
			задачи из категории '%s'. Необходимо дополнить эту
			категорию и исправить тест вручную", $str);
		$task_id = -1;
	}
	else {
		# pick random id from result
		unset($a);
		while($row = $resp->fetch_row())
			$a[] = $row[0];

		$task_id = $a[array_rand($a)];	
	}

	# put information about relation into tasks_in_test table
	$query = sprintf("insert into tasks_in_tests
		values ('%d', '%d', '%d')",
		$test_id, $task_id, $task_number++);
	if (!($db->query($query))) {
		printf("Невозможно добавить запись в базу данных");
		exit(1);
	}
}

printf("Тест успешно сгенерирован.");

?>
