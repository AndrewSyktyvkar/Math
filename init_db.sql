DROP DATABASE math;
CREATE DATABASE math CHARACTER SET utf8 COLLATE utf8_general_ci;
USE math;

create table users ( 
    user_id int, 
    user_name text, 
    user_passwort_hash text,
    access_token text
);

create table invites (
    invite_hash text
);

create table subjects (
	subject_id int,
	subject_name text
);
	
create table categories (
	category_id int,
	category_name text,
	subject_id int
);

create table subcategories (
	subcategory_id int,
	subcategory_name text,
	category_id int	
);
	
create table tasks (
	task_id int,
	task_name text,
	task_text text,
	task_rate int,
	subcategory_id int,
	is_real bool
);

create table tests (
	test_id int,
	test_description text,
	test_date date,
	test_rate int,
	is_real bool
);
	
create table tasks_in_tests (
	test_id int,
	task_id int,
	task_number int
);
	
create table articles (
	article_id int,
	article_text text,
	article_date date,
	subcategory_id int
);
	
create table solutions (
	solution_id int,
	solution text,
	answer text,
	task_id int
);
	
create table comments (
	comment_id int,
	comment_to text,
	comment_text text,
	comment_date date,
	comment_author int
);
