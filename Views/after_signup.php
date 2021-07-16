<?php
	include('../Models/M_Login.php');
	session_start();
	if (isset($_POST['code']) && isset($_SESSION['forgotCode']))
	{
		if ($_POST['code'] == $_SESSION['forgotCode'])
			header("location: ../../QLDTKH/Views/createAccount.php");
		else 
			echo 'Your code is false';
		
	}
	
?>
<!doctype html>
<html lang="en">
  <head>
  	<title>Nhập mật mã</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
	<body class="img js-fullheight" style="background-image: url(images/bg.jpg);">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Nhập mật mã</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
							<div class="form-group">
							</div>
						<form action="after_signup.php" class="signin-form" method="post">
							<div class="form-group">
								<input type="text" name='code' id='code' class="form-control" placeholder="Nhập mật mã đã gửi tới email!" required />
							</div>
							<div class="form-group">
								<button type="submit" class="form-control btn btn-primary submit px-3">Xác Nhận</button>
							</div>
							<div class="form-group d-md-flex">
								<div class="w-50">
									<?php echo "<a href='login.php?controller=login' class='checkbox-wrap checkbox-primary' style='color: #fff'>Đăng nhập</a>" ?>
								</div>
								<div class="w-50 text-md-right">
									<?php echo "<a href='login.php?controller=signup' class='checkbox-wrap checkbox-primary' style='color: #fff'>Đăng ký</a>" ?>
								</div>
							</div>
					  </form>
		      		</div>
				</div>
				<p class="w-100 text-center" style="color:#CCCCCC">
					<?php echo "<a href='forgot.php?controller=home' class='w-100 text-center' style='color: #CCCCCC'>Trở lại trang chủ</a>" ?>
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