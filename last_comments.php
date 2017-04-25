<?

# Functions returns associated arrays from DB

# Input datatype - date
function last_comments_to_tasks_from_date($target_date)
{
	$query = "SELECT comment_date,user_name,task_name,comment_text FROM `comments_to_tasks`,`users`,`tasks` WHERE ((comments_to_tasks.comment_date>$target_date) AND (users.user_id=comments_to_tasks.comment_author) AND (tasks.task_id=comments_to_tasks.task_id))";
	
	$result = $mysqli->query($query);
	$row = $result->fetch_assoc();
	return $row;
}

function last_comments_to_tests_from_date($target_date)
{
	$query = "SELECT comment_date,user_name,test_description,comment_text FROM `comments_to_tests`,`users`,`tests` WHERE ((comments_to_tests.comment_date>$target_date) AND (users.user_id=comments_to_tests.comment_author) AND (tests.test_id=comments_to_tests.test_id))";
	$result = $mysqli->query($query);
	$row = $result->fetch_assoc();
	return $row;
}

# Input datatype - integer
function last_comments_to_tasks_at_days($num_days)
{
	$date = date_create();
	date_sub($date, date_interval_create_from_date_string("$num_days days"));
	return last_comments_to_tasks_from_date($date->format("Y-m-d"));
}

function last_comments_to_tests_at_days($num_days)
{
	$date = date_create();
	date_sub($date, date_interval_create_from_date_string("-$num_days days"));
	return last_comments_to_tests_from_date($date->format("Y-m-d"));
}

?>