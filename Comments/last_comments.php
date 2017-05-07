<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/math/config/system_inits.php');
$query_for_tasks="SELECT * FROM comments_to_tasks ORDER BY comment_date DESC LIMIT 4;";
$query_for_tests="SELECT * FROM comments_to_tests ORDER BY comment_date DESC LIMIT 4;";
$result_for_tasks=$mysqli->query($query_for_tasks);
$result_array_tasks=array(); # { comment_id:{date, user_name, topic_name, user_id, topic_id} }
$result_array_tests=array();# { comment_id:{date, user_name, topic_name, user_id, topic_id} }

while($row=$result_for_tasks->fetch_assoc())
{
	$user=$mysqli->query("SELECT user_name FROM users WHERE user_id=".$row['comment_author']);
	$userName=$user->fetch_assoc();
	$task=$mysqli->query("SELECT task_name FROM tasks WHERE task_id=".$row['task_id']);
	$taskName=$task->fetch_assoc();
	$result_array_tasks[$row['comment_id']]=array(
		'date'=>$row['comment_date'],
		'user_name'=>$userName['user_name'],
		'topic_name'=>$taskName['task_name'],
		'user_id'=>$row['comment_author'],
		'topic_id'=>$row['task_id']
		);
}
$result_for_tests=$mysqli->query($query_for_tests);
while($row=$result_for_tests->fetch_assoc())
{
	$user=$mysqli->query("SELECT user_name FROM users WHERE user_id=".$row['comment_author']);
	$userName=$user->fetch_assoc();
	$test=$mysqli->query("SELECT test_description FROM tests WHERE test_id=".$row['test_id']);
	$testName=$test->fetch_assoc();
	$result_array_tests[$row['comment_id']]=array(
		'date'=>$row['comment_date'],
		'user_name'=>$userName['user_name'],
		'topic_name'=>$testName['test_description'],
		'user_id'=>$row['comment_author'],
		'topic_id'=>$row['test_id']
		);
}
?>
<div>
<h1>Последние комментарии</h1>
<?
foreach($result_array_tasks as $value)
{
	echo "<li>".$value['user_name']." оставил комментарий к ".$value['topic_name']."</li>";
}
foreach($result_array_tests as $value)
{
	echo "<li>".$value['user_name']." оставил комментарий к ".$value['topic_name']."</li>";
}
?>
</div>