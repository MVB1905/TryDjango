<?php
	include('../Models/M_Login.php');

	$controller = '';
	
	if(isset($_GET['controller']))
		$controller = $_GET['controller'];
		
	switch($controller){
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
	}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Trường đại học lâm nghiệp</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/img/Logo_vnuf.jpg" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- Third party plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">Trang chủ</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#login">Đăng nhập</a></li>
						<li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Liên hệ</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-10 align-self-end">
                        <h1 class="text-uppercase text-white font-weight-bold">Chào Mừng Bạn Đến Với Trường Đại Học Lâm Nghiệp Việt Nam.</h1>
                        <hr class="divider my-4" />
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <p class="text-white-75 font-weight-light mb-5">Website này được tạo ra để giúp các bạn đăng ký đề tài nghiên cứu khoa học một cách dễ dàng và đơn giản hơn, chúc các bạn một ngày vui vẻ và tốt lành!</p>
                        <a class="btn btn-primary btn-xl js-scroll-trigger" href="#login">Đăng ký đề tài</a>
                    </div>
                </div>
            </div>
        </header>
		<!-- About-->
        <section class="page-section bg-primary" id="login">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="text-white mt-0">Vui lòng đăng nhập để đăng ký đề tài khoa học!</h2>
                        <hr class="divider light my-4" />
                        <p class="text-white-50 mb-4">Nghiên cứu khoa học là một họat động tìm kiếm, xem xét, điều tra, hoặc thử
nghiệm. Dựa trên những số liệu, tài liệu, kiến thức,… đạt được từ các thí nghiệm NCKH để phát hiện ra những cái mới về bản chất sự vật, về thế giới tự nhiên và xã hội, và để sáng tạo phương pháp và phương tiện kỹ thuật mới cao hơn, giá trị hơn. Con người muốn làm NCKH phải có kiến thức nhất định về lãnh vực nghiên cứu vàcái chính là phải rèn luyện cách làm việc tự lực, có phương pháp từ lúc ngồi trên ghế nhà trường. </p>
                        <?php echo "<a class='btn btn-light btn-xl js-scroll-trigger' href='index.php?controller=login'>Đăng nhập</a>" ?>
                    </div>
                </div>
            </div>
        </section>
		<!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="mt-0">Liên hệ với chúng tôi</h2>
                        <hr class="divider my-4" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
                        <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
                        <div>+84 965 890 179</div>
                    </div>
                    <div class="col-lg-4 mr-auto text-center">
                        <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
                        <!-- Make sure to change the email address in BOTH the anchor text and the link target below!-->
                        <a class="d-block" href="mailto:contact@yourwebsite.com">jsbuivanmanh1905@gmail.com</a>
                    </div>
                </div>
            </div>
        </section>
        <footer class="bg-light py-5">
            <div class="container"><div class="small text-center text-muted">Bùi Văn Mạnh 2021 - Trường đại học lâm nghiệp (VNUF)</div></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
