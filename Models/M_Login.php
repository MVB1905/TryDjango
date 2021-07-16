<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'qldtkh';
$table = 'account';

$conn;
$result;
$count;


// Write
function write($sql)
{
	// Kết nối với DB
	$conn = mysqli_connect('localhost', 'root', '');
	if (!$conn) 
		return false;
	if (!mysqli_select_db($conn, 'qldtkh'))
		return false;
// error 'system cannot know $dbname'
	if (!mysqli_query($conn, $sql))
	{
		return false;
	}
	else
	{
		return true;
	}
}

// Read
function read($sql)
{
	// Kết nối với DB
	$conn = mysqli_connect('localhost', 'root', '');
	if (!$conn) 
		return false;
	if (!mysqli_select_db($conn, 'qldtkh'))
		return false;
// error 'system cannot know $dbname'
	$result = mysqli_query($conn, $sql);
	return $result;
}

// check
function check($sql)
{
	// Kết nối với DB
	$conn = mysqli_connect('localhost', 'root', '');
	if (!$conn) 
		return false;
	if (!mysqli_select_db($conn, 'qldtkh'))
		return false;
// error 'system cannot know $dbname'
	$result = mysqli_query($conn, $sql);
	$count = mysqli_num_rows($result);
	return $count;
}


//lay du lieu

function getCheck($sql)
{
	return check($sql);
}

function getById($codition)
{
	$sql = "SELECT * FROM account WHERE id = $codition";
	$row = mysqli_fetch_array(read($sql));
	return $row;
}
function getAll()
{
	$sql = "SELECT `id`, `name`, `username`, `password`, `usertype`, `email` FROM account";
	return excute($sql);
}

// Begin: Account -- SET
function InsertAccount($name, $username, $password, $usertype, $email)
{
	$sql = "INSERT INTO account (`name`, `username`, `password`, `usertype`, `email`) 
			VALUES (N'$name', N'$username', '$password', '$usertype', '$email')";
	return write($sql);
}

function UpdateAccount($name, $username, $password, $usertype, $email, $id)
{
	$sql = "UPDATE account SET `name`= N'$name',`username`= N'username',`password`= N'$password',`usertype`= '$usertype',`email`= '$email' WHERE id = $id";
	return write($sql);
 }
 
function DeleteAccount($id){
	$sql = "DELETE FROM account WHERE id='$id'";
	return write($sql);
 }
 
// END: Account -- SET

// BEGIN: Topic -- SET

function ChangDate($date)
{
	$components = explode("/", $date);
	$tmp = $components[2] ."/" .$components[1]. "/" .$components[0];
	return $tmp;
}

function getTopicById($id)
{
	$sql = "SELECT `id`, `name`, `authors`, `teacher`, `start`, `deadline`, `submitted`, `state`, `point`, `reportdate` FROM `topics` WHERE id = $id";
	$row = mysqli_fetch_array(read($sql));
	return $row;
}

function InsertTopic($name, $authors, $start, $deadline, $submitted, $state, $point, $reportdate, $teacher)
{
	$start = ChangDate($start);
	$deadline = ChangDate($deadline);
	$reportdate = ChangDate($reportdate);
	$sql = "INSERT INTO `topics`(`name`, `authors`, `start`, `deadline`, `submitted`, `state`, `point`, `reportdate`, `teacher`) 
	VALUES (N'$name', N'$authors',  '$start', '$deadline', N'$submitted', $state, '$point', '$reportdate', N'$teacher')";
	return write($sql);
}

function UpdateTopic($name, $authors, $start, $deadline, $submitted, $state, $point, $reportdate, $teacher, $id)
{
	$start = ChangDate($start);
	$deadline = ChangDate($deadline);
	$reportdate = ChangDate($reportdate);
	$sql = "UPDATE `topics` SET `name`=N'$name', `authors`=N'$authors', `start`='$start', `deadline`='$deadline', `submitted`='$submitted', `state`=$state, `point`='$point', `reportdate`='$reportdate', `teacher`=N'$teacher' WHERE id = $id";
	return write($sql);
}
 
function DeleteTopic($id){
	$sql = "DELETE FROM topics WHERE id='$id'";
	return write($sql); 
}
// END: TOPIC SET

// BEGIN: QUEUE SET
function getQueueById($id)
{
	$sql = "SELECT `id`, `id_user`, `name`, `authors`, `teacher`, `maketime` FROM `queues` WHERE id = $id";
	$row = mysqli_fetch_array(read($sql));
	return $row;
}

function InsertQueue($name, $id_user, $authors, $teacher, $maketime)
{
	$sql = "INSERT INTO `queues`(`name`, id_user, `authors`, `teacher`, `maketime`, `state`) 
	VALUES (N'$name', '$id_user', N'$authors', N'$teacher', '$maketime', 'wait')";
	return write($sql);
}

function UpdateQueue($id, $state)
{
	$sql = "UPDATE `queues` SET `state`=N'$state' WHERE id = $id";
	return write($sql);
}

function DeleteQueue($id){
	$sql = "DELETE FROM queues WHERE id_user='$id'";
	return write($sql); 
}

function DeleteQueueById($id){
	$sql = "DELETE FROM queues WHERE id='$id'";
	return write($sql); 
}

// END: QUEUE SET

// BEGIN: LOGIN SET

function getUsertype($username, $password)
{
	$sql = "SELECT id, usertype FROM account WHERE username = '$username' AND password = '$password'";
	$row = mysqli_fetch_array(read($sql));
	return $row;
}
// END: LOGIN SET


// Forgoet password
function GetIdForgot($codition)
{
	$sql = "SELECT * FROM account WHERE email = '$codition'";
	$row = mysqli_fetch_array(read($sql));
	return $row;
}

function UpdateForgot($password, $id)
{
	$sql = "UPDATE account SET `password`= N'$password' WHERE id = $id";
	return write($sql);
 }
 ?>