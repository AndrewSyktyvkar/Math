<?
require_once($_SERVER['DOCUMENT_ROOT'] . '/math/config/system_inits.php'); 
$query_for_tasks="SELECT * FROM comments_to_tasks ORDER BY comment_date DESC LIMIT 4;";
$query_for_tests="SELECT * FROM comments_to_tests ORDER BY comment_date DESC LIMIT 4;";
$result_for_tasks=$mysqli->query($query_for_tasks);
$result_array_tasks=array();#{ comment_id:{date, user_name, topic_name, user_id, topic_id} }
$result_array_tests=array();#{ comment_id:{date, user_name, topic_name, user_id, topic_id} }
while($row=$result_for_tasks->fetch_assoc())
{
	$user=$mysqli->query("SELECT user_name FROM users WHERE user_id=$row['comment_author'];");
	$userName=$user->fetch_assoc()['user_name'];
	$task=$mysqli->query("SELECT task_name FROM tasks WHERE task_id=$row['task_id'];");
	$taskName=$task->fetch_assoc()['task_name'];
	$result_array_tasks[$row['comment_id']]=array(
		'date'=>$row['comment_date'],
		'user_name'=>$userName,
		'topic_name'=>$taskName,
		'user_id'=>$row['comment_author'],
		'topic_id'=>$row['task_id']
		);
}

$result_for_tests=$mysqli->query($query_for_tests);
while($row=$result_for_tests->fetch_assoc())
{
	$user=$mysqli->query("SELECT user_name FROM users WHERE user_id=$row['comment_author'];");
	$userName=$user->fetch_assoc()['user_name'];
	$test=$mysqli->query("SELECT test_description FROM tests WHERE test_id=$row['test_id'];");
	$testName=$test->fetch_assoc()['test_name'];
	$result_array_tests[$row['comment_id']]=array(
		'date'=>$row['comment_date'],
		'user_name'=>$userName,
		'topic_name'=>$testName,
		'user_id'=>$row['comment_author'],
		'topic_id'=>$row['test_id']
		);
}

?>