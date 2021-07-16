
<?php
include('../../Models/M_Login.php');

session_start();

if(isset($_GET['action']))
{
	$_SESSION["error"] = "";
	$_SESSION["username"] = "";
	$_SESSION["password"] = "";
	$_SESSION["usertype"] = "";
	$_SESSION["email"] = "";
	$_SESSION["id"] = "";
	$_SESSION["name"] = "";
	$_SESSION["authors"] = "";
	$_SESSION["teacher"] = "";
	$_SESSION["start"] = "";
	$_SESSION["deadline"] = "";
	$_SESSION["submitted"] = "";
	$_SESSION["state"] = "";
	$action = $_GET['action'];
	switch($action)
	{	
		// Case: add_user_submit
		case 'add_queue':
		{
			if (isset($_POST['name']))
			{
				$name = $_POST['name'];
				$authors = $_POST['authors'];
				$teacher = $_POST['teacher'];
				$time = $_POST['time'];
				$id_login = $_SESSION['id_user_login'];
				echo $id_login. 'Bùi văn mạnh';
	
				if (InsertQueue($name, $id_login, $authors, $teacher, $time))
				{
					header("location:../../Views/user/index.php");
				}
			 }
			break;
		}
		case 'delete_queue':
		{
			if (isset($_GET['id']))
			{
				$id = $_GET['id'];
				if (DeleteQueueById($id))
				{
					header("location:../../Views/user/index.php");
				}
			 }
			break;
		}
		case 'logout':
		{
			session_destroy();
			header("location:../../Views/login.php");
		}
	}
}
?>