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

# adding new test into the table
# autoincrement isn't used, so we are figuring out it manually
$resp = $db->query("select test_id, test_description, test_date from tests
	order by test_id asc");

printf("<html>
\t<body>
\t\t<form action=\"edit_test.php\" method=\"post\">
\t\t\t<select size=\"3\" name=\"choose_test\">\n");

while ($row = $resp->fetch_row())
	printf("\t\t\t\t<option value=\"%d\">%d | %s | %s</option>\n",
		$row[0], $row[0], $row[1], $row[2]);

printf("\t\t\t</select>
\t\t\t<input type=\"submit\" value=\"Выбрать\">
\t\t</form>
\t<body>	
<html>\n");

?>
