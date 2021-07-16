
<?php
include('../../Models/M_Login.php');

session_start();

if(isset($_GET['action']))
{
	$action = $_GET['action'];
	switch($action)
	{	
		// Case: add_user_submit
		case 'forgot_submit':
		{
			$_SESSION['forgotCode'] = "";
			if (isset($_POST['email']))
			{
				$email = $_POST['email'];
				// Select sql to check this email is exist
				$sql = "SELECT * FROM account WHERE email = '$email'";
				if (getCheck($sql) > 0)
				{
					$rs = GetIdForgot($email);
					$_SESSION['idForgot'] = $rs[0];
					$random = rand(100000,999999);
					$_SESSION['forgotCode'] = $random;
					$to = $email;
					$subject = 'VietNam Naltional University Of Forestry (Forgot Password)';
					$message = 'Your code is: ' .$random;
					$header = 'From: threewolves082000@gmail.com';
					if (mail($to, $subject, $message, $header) == true)
					{
						header("location: ../../Views/after_forgot.php");
						
					}
					
				}
				else
				{
					$_SESSION["forgotError"] = "Error1";
					//$_SESSION['forgotEmail'] = $email;
					header("location: ../../Views/forgot.php");
					// Email doesnt exist
				}
				
			}		
			break;
		}
		case 'signup_submit':
		{
			if (isset($_POST['email']))
			{
				$email = $_POST['email'];
				$sql = "SELECT * FROM account WHERE email = '$email'";
				if (getCheck($sql) <= 0)
				{

					$random = rand(100000,999999);
					$_SESSION['forgotEmail'] = $email;
	
					$_SESSION['forgotCode'] = $random;
					$to = $email;
					$subject = 'VietNam Naltional University Of Forestry (Create New Account)';
					$message = 'Your code is: ' .$random;
					$header = 'From: threewolves082000@gmail.com';
					if (mail($to, $subject, $message, $header) == true)
					{
						header("location: ../../Views/after_signup.php");
					}
				}
				else
				{
					$_SESSION['errorCreate'] = 1;
					header("location: ../../Views/signup.php");					
				}
			}
		}
	}
}
?>