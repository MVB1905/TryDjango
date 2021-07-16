<?php
	session_start();
	include('../Models/M_Login.php');
	if (isset($_POST['username']))
	{
		$usertype = "";
		$username = $_POST['username'];
		$password = $_POST['password'];
		$sql = "SELECT id, usertype FROM account WHERE username = '$username' AND password = '$password'";
		if (getCheck($sql))
		{
			// True
			$rs = getUsertype($username, $password);
			$_SESSION['id_user_login'] = $rs[0];
			$usertype = $rs[1];
			if (strtoupper($usertype) == "ADMIN")
			{
				header('location: /QLDTKH/Views/admin/index.php');
			}
			else if (strtoupper($usertype) == "USER")
			{
				header('location: /QLDTKH/Views/user/index.php');			
			}
		}
		else
		{
			// False
			// Show error: Username or password is not correct!
			$_SESSION['error'] = 'Tên tài khoản hoặc mật khẩu không chính xác!';
		}
	}
	
	if(isset($_GET['usertype']))
	{
		$usertype = $_GET['usertype'];
			
		switch($usertype){
			case 'user':
				{
					header("location:user/index.php");
					break;
				}
			case 'admin':
				{
					header("location:admin/index.php");
					break;
				}
			case 'login':
				{
					header("location: login.php");
					break;
				}
			case 'sginup':
				{
					header("location: signup.php");
					break;
				}
			case 'forgot':
				{
					header("location: forgot.php");
					break;
				}
			case 'home':
				{
					header("location: index.php");
					break;
				}
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
		<title>Đăng nhập</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
		<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		
		<link rel="stylesheet" href="css/style.css">

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	</head>
	<body class="img js-fullheight" style="background-image: url(images/bg.jpg);">
		<section class="ftco-section">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-6 text-center mb-5">
						<h2 class="heading-section">ĐĂNG NHẬP</h2>
					</div>
				</div>
				<div class="row justify-content-center">
					<div class="col-md-6 col-lg-4">
						<div class="login-wrap p-0">
							<form action="login.php" class="signin-form" method="post" action="login.php">
								<div class="form-check form-check-inline" style="margin-bottom:15px">
									<label class="text-danger"><?php if (isset($_POST['username'])) { if (isset($_SESSION['error'])) echo $_SESSION['error']; }?></label>
								</div>
								<div class="form-group">
									<input type="text" class="form-control" name="username" placeholder="Username" required>
								</div>
								<div class="form-group">
									<input id="password-field" type="password" class="form-control" id="password" name="password" placeholder="Password" required>
									<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>	            

								</div>
								<div class="form-group">
									<button type="submit" class="form-control btn btn-primary submit px-3">Đăng nhập</button>
								</div>
								
								<div class="form-group d-md-flex">
									<div class="w-50">
										<?php echo "<a href='login.php?usertype=sginup' class='checkbox-wrap checkbox-primary' style='color: #ff9999'>Đăng ký ngay!</a>" ?></p>
									</div>
									<div class="w-50 text-md-right">
										<?php echo "<a href='login.php?usertype=forgot' style='color: #fff'>Quên mật khẩu</a>" ?></p>
									</div>
								</div>
						  </form>
						</div>
					</div>
					<p class="w-100 text-center" style="color:#CCCCCC">
						<?php echo "<a href='login.php?usertype=home' class='w-100 text-center' style='color: #CCCCCC'>Trở lại trang chủ</a>" ?>
					</p>
				</div>
			</div>
		</section>
		<script src="js/jquery.min.js"></script>
		<script src="js/popper.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/main.js"></script>
	</body>
</html>