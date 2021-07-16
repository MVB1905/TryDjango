
<?php
include('../../Models/M_Login.php');
include('../../Models/M_Queue.php');
include('../../Models/M_Topic.php');

session_start();

if(isset($_GET['action'])){
	$action = $_GET['action'];
	switch($action){	
	// Case: add_user
	case 'add_user':{
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
		header("location:../../Views/admin/account_add.php");
		break;
	}
	
	// Case: add_user_submit
	case 'add_user_submit':
	{
		if (isset($_POST['name']))
		{
			$name = $_POST['name'];
			$username = $_POST['username'];
			$password = $_POST['password'];
			$usertype = $_POST['usertype'];
			$email = $_POST['email'];
			$sql = "SELECT id FROM account WHERE username = N'$username'";
			$sqlEmail = "SELECT id FROM account WHERE email = N'$email'";

			if (getCheck($sql) > 0)
			{
				$_SESSION["error"] = "Error1";
				$_SESSION["name"] = $name;
				$_SESSION["username"] = $username;
				$_SESSION["password"] = $password;
				$_SESSION["usertype"] = $usertype;
				$_SESSION["email"] = $email;

				header("location:../../Views/admin/account_add.php");
			}
			else if (getCheck($sqlEmail) > 0)
			{
				echo 'Email';
				$_SESSION["error"] = "Error2";
				$_SESSION["name"] = $name;
				$_SESSION["username"] = $username;
				$_SESSION["password"] = $password;
				$_SESSION["usertype"] = $usertype;
				$_SESSION["email"] = $email;
				header("location:../../Views/admin/account_add.php");
			}
			else
			{
				if(InsertAccount($name, $username, $password, $usertype, $email))
				{
					$_SESSION["error"] = "";
					$_SESSION["name"] = "";
					$_SESSION["username"] = "";
					$_SESSION["password"] = "";
					$_SESSION["usertype"] = "";
					$_SESSION["email"] = "";
					header("location:../../Views/admin/account.php");
				}
				else
				{
					$error = "Error3";
					header("location:../../Views/admin/account_add.php");
				}
			}	
		 }
		break;
	}
	
	// Case: edit_user
	case 'edit_user':{
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
		if (isset($_GET['id']))
		{
			$id = $_GET['id'];
			$rs = getById($id);
			$_SESSION["id"] = $rs[0];
			$_SESSION["name"] = $rs[1];
			$_SESSION["username"] = $rs[2];
			$_SESSION["password"] = $rs[3];
			$_SESSION["usertype"] = $rs[4];
			$_SESSION["email"] = $rs[5];
			header("location:../../Views/admin/account_edit.php");
		}
		else
			header("location:../../Views/admin/account.php");
		break;
	}
	
	// Case: edit_user_submit
	case 'edit_user_submit' :{
	ini_set('display_errors',0);
		if (isset($_POST['name']))
		{
			$id = $_POST['id'];
			$name = $_POST['name'];
			$username = $_POST['username'];
			$password = $_POST['password'];
			$usertype = $_POST['usertype'];
			$email = $_POST['email'];
			$sql = "SELECT id FROM account WHERE username = N'$username' AND id != '$id'";
			$sqlEmail = "SELECT id FROM account WHERE email = N'$email' AND id != '$id'";

			if (getCheck($sql) > 0)
			{
				$_SESSION["error"] = "Error1";
				$_SESSION["id"] = $id;
				$_SESSION["name"] = $name;
				$_SESSION["username"] = $username;
				$_SESSION["password"] = $password;
				$_SESSION["usertype"] = $usertype;
				$_SESSION["email"] = $email;

				header("location:../../Views/admin/account_edit.php");
			}
			else if (getCheck($sqlEmail) > 0)
			{
				echo 'Email';
				$_SESSION["error"] = "Error2";
				$_SESSION["id"] = $id;
				$_SESSION["name"] = $name;
				$_SESSION["username"] = $username;
				$_SESSION["password"] = $password;
				$_SESSION["usertype"] = $usertype;
				$_SESSION["email"] = $email;
				header("location:../../Views/admin/account_edit.php");
			}
			else
			{
				if(UpdateAccount($name, $username, $password, $usertype, $email, $id))
				{
					$_SESSION["error"] = "";
					$_SESSION["id"] = "";
					$_SESSION["name"] = "";
					$_SESSION["username"] = "";
					$_SESSION["password"] = "";
					$_SESSION["usertype"] = "";
					$_SESSION["email"] = "";
					header("location:../../Views/admin/account.php");
				}
				else
				{
					$error = "Error3";
					header("location:../../Views/admin/account_edit.php");
				}
			}	
		 }
		break;
	}
	
	// Case: detail_user
	case 'detail_user':{
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
	
		if (isset($_GET['id']))
		{
			$id = $_GET['id'];
			$rs = getById($id);
			$_SESSION["id"] = $rs[0];
			$_SESSION["name"] = $rs[1];
			$_SESSION["username"] = $rs[2];
			$_SESSION["password"] = $rs[3];
			$_SESSION["usertype"] = $rs[4];
			$_SESSION["email"] = $rs[5];
			header("location:../../Views/admin/account_detail.php");
		}
		else
			header("location:../../Views/admin/account.php");
		break;
	}
	
	// Case: getid_user
	case 'delete_user':{
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
	
		if (isset($_GET['id']))
		{
			$id = $_GET['id'];
			$rs = getById($id);
			$_SESSION["id"] = $rs[0];
			$_SESSION["name"] = $rs[1];
			$_SESSION["username"] = $rs[2];
			$_SESSION["password"] = $rs[3];
			$_SESSION["usertype"] = $rs[4];
			$_SESSION["email"] = $rs[5];
			header("location:../../Views/admin/account_delete.php");
		}
	}
	
	// Case: delete_user_submit
	case 'delete_user_submit':{
		if (isset($_POST['id'])){
			$id = $_POST['id'];
			echo $id;
			if(DeleteAccount($id))
			{
				DeleteQueue($id);
				header("location:../../Views/admin/account.php");
			}
			else
			{
				header("location:../../Views/admin/account_delete.php");
			}
		}
		break;
	}
	case 'topic_add':{
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
		header("location:../../Views/admin/topic_add.php");
		break;
	}
	// Case: topic_add_submit
	case 'topic_add_submit':
	{
		if (isset($_POST['name']))
		{
			$name = $_POST['name'];
			$authors = $_POST['authors'];
			$start = $_POST['start'];
			$deadline = $_POST['deadline'];
			$submitted = $_POST['submitted'];
			$state = $_POST['state'];
			$point = $_POST['point'];
			$reportdate = $_POST['reportdate'];
			$teacher = $_POST['teacher'];
			if(InsertTopic($name, $authors, $start, $deadline, $submitted, $state, $point, $reportdate, $teacher))
			{
				header("location:../../Views/admin/topic.php");
			}
			else
			{
				$error = "Error3";
				header("location:../../Views/admin/account_add.php");
			}
		 }
		break;
	}
	
	// Case: topic_edit
	case 'topic_edit':{
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
	
		$id = $_GET['id'];
		$rs = getTopicById($id);
		
		$_SESSION["id"] = $rs[0];
		$_SESSION["name"] = $rs[1];
		$_SESSION["authors"] = $rs[2];
		$_SESSION["teacher"] = $rs[3];
		$_SESSION["start"] = ChangeDate($rs[4]);
		$_SESSION["deadline"] = ChangeDate($rs[5]);
		$_SESSION["submitted"] = $rs[6];
		$_SESSION["state"] = $rs[7];
		$_SESSION["point"] = $rs[8];
		$_SESSION["reportdate"] = ChangeDate($rs[9]);
		header("location:../../Views/admin/topic_edit.php");
		break;
	}
	
	// Case: topic_edit_submit
	case 'topic_edit_submit' :{
		if (isset($_POST['name']))
		{
			$id = $_POST['id'];
			$name = $_POST['name'];
			$authors = $_POST['authors'];
			$start = $_POST['start'];
			$deadline = $_POST['deadline'];
			$submitted = $_POST['submitted'];
			$state = $_POST['state'];
			$point = $_POST['point'];
			$reportdate = $_POST['reportdate'];
			$teacher = $_POST['teacher'];
			if(UpdateTopic($name, $authors, $start, $deadline, $submitted, $state, $point, $reportdate, $teacher, $id))
			{
				header("location:../../Views/admin/topic.php");
			}
			else
			{
				$error = "Error3";
				header("location:../../Views/admin/topic_edit.php");
			}
		 }
		break;
	}
	
	// Case: topic_delete
	case 'topic_delete':{
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
		$_SESSION["point"] = "";
		if (isset($_GET['id']))
		{
			$id = $_GET['id'];
			$rs = getTopicById($id);
			
			$_SESSION["id"] = $rs[0];
			$_SESSION["name"] = $rs[1];
			$_SESSION["authors"] = $rs[2];
			$_SESSION["teacher"] = $rs[3];
			$_SESSION["start"] = $rs[4];
			$_SESSION["deadline"] = $rs[5];
			$_SESSION["submitted"] = $rs[6];
			$_SESSION["state"] = $rs[7];
			$_SESSION["point"] = $rs[8];
			$_SESSION["reportdate"] = $rs[9];
			header("location:../../Views/admin/topic_delete.php");
		}
		break;
	}
	
	// Case: delete_topic_submit
	case 'topic_delete_submit':{
		if (isset($_POST['id'])){
			$id = $_POST['id'];
			echo $id;
			if(DeleteTopic($id))
			{
				header("location:../../Views/admin/topic.php");
			}
			else
			{
				header("location:../../Views/admin/account_delete.php");
			}
		}
		break;
	}
	
	// Case: topic_detail
	case 'topic_detail':{
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
			$_SESSION["point"] = "";
		if (isset($_GET['id']))
		{
			$id = $_GET['id'];
			$rs = getTopicById($id);
			
			$_SESSION["id"] = $rs[0];
			$_SESSION["name"] = $rs[1];
			$_SESSION["authors"] = $rs[2];
			$_SESSION["teacher"] = $rs[3];
			$_SESSION["start"] = $rs[4];
			$_SESSION["deadline"] = $rs[5];
			$_SESSION["submitted"] = $rs[6];
			$_SESSION["state"] = $rs[7];
			$_SESSION["point"] = $rs[8];
			$_SESSION["reportdate"] = $rs[9];
			header("location:../../Views/admin/topic_detail.php");
		}
		break;
	}
	
	// Case: queue_approved
	case 'queue_approved':{
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
		$_SESSION["point"] = "";
		$_SESSION["id_user"] = "";
		$_SESSION["maketime"] = "";
		if (isset($_GET['id']))
		{
			$id = $_GET['id'];
			$rs = getQueueById($id);
			$_SESSION["id"] = $rs[0];
			$_SESSION["id_user"] = $rs[1];
			$_SESSION["name"] = $rs[2];
			$_SESSION["authors"] = $rs[3];
			$_SESSION["teacher"] = $rs[4];
			$_SESSION["maketime"] = $rs[5];

			header("location:../../Views/admin/queue_approved.php");
			break;

		}
		break;
	}
	
	// Case: delete_topic_submit
	case 'queue_approved_submit':{
		if (isset($_POST['id'])){
			$id = $_POST['id'];
			$name = $_POST['name'];
			$authors = $_POST['authors'];
			$maketime = $_POST['maketime'];
			$teacher = $_POST['teacher'];
			$tmp;
			if(UpdateQueue($id, 'Approved'))
			{
				if ($maketime == "1")
				{
					$tmp = "30 days";
				}
				else if ($maketime == "3")
				{
					$tmp = "3 months";
				}
				else if ($maketime == "6")
				{
					$tmp = "6 months";
				}
				else if ($maketime == "12")
				{
					$tmp = "1 year";
				}
				$getdate = date('Y/m/d');
				$adddate = date_add(date_create($getdate),date_interval_create_from_date_string($tmp));
				$start = date('d/m/Y');
				$deadline = date_format($adddate,'d/m/Y');
				// Insert to Topic
				// `name`, `authors`, `start`, `deadline`, `submitted`, `state`, `point`, `reportdate`, `teacher`
				if(InsertTopic($name, $authors, $start, $deadline, '', 0, 0, $deadline, $teacher))
				{
					header("location:../../Views/admin/queue.php");
				}
				else
					echo 'Error';
			}
			else
			{
				header("location:../../Views/admin/queue_approved.php");
			}
		}
		break;
	}
	
	// Case: queue_unapproved
	case 'queue_unapproved':{
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
		$_SESSION["point"] = "";
		$_SESSION["id_user"] = "";
		$_SESSION["maketime"] = "";
		if (isset($_GET['id']))
		{
			$id = $_GET['id'];
			
			$rs = getQueueById($id);
			$_SESSION["id"] = $rs[0];
			$_SESSION["id_user"] = $rs[1];
			$_SESSION["name"] = $rs[2];
			$_SESSION["authors"] = $rs[3];
			$_SESSION["teacher"] = $rs[4];
			$_SESSION["maketime"] = $rs[5];

			header("location:../../Views/admin/queue_unapproved.php");
		}
		break;
	}
	// Case: delete_topic_submit
	case 'queue_unapproved_submit':{
		if (isset($_POST['id'])){
			$id = $_POST['id'];
			echo $id;
			if(UpdateQueue($id, 'Unapproved'))
			{
				header("location:../../Views/admin/queue.php");
			}
			else
			{
				header("location:../../Views/admin/queue_unapproved.php");
			}
		}
		break;
	}
	case 'logout':
	{	
		session_destroy();
		header("location:../../Views/login.php");
	}
	default:{
		$row = $db->getAllData();
		require_once('../View/php/LoadDsNV.php');
		break;
	
		}
	}
}
function ChangeDate($date)
{
	$components = explode("-", $date);
	$tmp = $components[2] ."/" .$components[1]. "/" .$components[0];
	return $tmp;
}
?>