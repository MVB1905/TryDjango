<?php include 'header.php';
session_start();
 ?>
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
				<a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">Đăng ký đề tài</a>
			</div>
		</div>
	</div>
</header>
<!-- About-->
<section class="page-section bg-light" id="about">
	<div class="container">
		<h1 align="center" style="margin-bottom:40px">ĐĂNG KÝ ĐỀ TÀI</h1>
		<form method="post" action="../../Controllers/user/C_user.php?action=add_queue">
			<div class="form-group row">
				<label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-sm">Tên đề tài</label>
				<div class="col-sm-10">
					<input type="text" class="form-control form-control-sm" id="name" name="name" placeholder="Vd: Nghiên cứu ..." required>
				</div>
			</div>
			<div class="form-group row">
				<label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-sm">Tác giả:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control form-control-sm" id="authors" name="authors" placeholder="Vd: Bùi văn mạnh, ..." required>
				</div>
			</div>
			<div class="form-group row">
				<label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-sm">GV hướng dẫn:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control form-control-sm" id="teacher" name="teacher" placeholder="Vd: Vũ Minh Cường" required>
				</div>
			</div>
			<div class="form-group row">
				<label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-sm">Thời gian thực hiện (mong muốn):</label>
				<div class="col-sm-10">
					<select id="time" name="time" class="form-control">
						<option value="1" selected>1 tháng</option>
						<option value="3">3 tháng</option>
						<option value="6">6 tháng</option>
						<option value="12">1 năm</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<!--INSERT THIS SUBMIT TO DB-->					
				<button type="submit" class="form-control btn bg-primary submit px-3">XÁC NHẬN ĐĂNG KÝ ĐỀ TÀI</button>
			</div>
		</form>
		     <div class="text-center" style="margin-bottom:30px; margin-top:70px">
                <h1>CÁC ĐỀ TÀI ĐANG CHỜ DUYỆT CỦA BẠN</h1>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            Tên đề tài
                        </th>
                        <th>
                            Tác giả
                        </th>
                        <th>
                            GV hướng dẫn
                        </th>
                        <th>
                            Thời gian thực hiện dự kiến
                        </th>
                        <th>
                            Trạng thái
                        </th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
					<!--SELECT IN DB WITH WHERE IS QUEUE WITH THIS USER-->	
					<?php
						$conn = mysqli_connect("localhost","root","","qldtkh");
						if(!$conn)
							{
								echo"khong ket noi csdl";
									exit;
							}
							//Thực thi truy vấn
						$id = $_SESSION['id_user_login'];
						$result = mysqli_query($conn,"SELECT `id`, `name`, `authors`, `teacher`, `maketime`, `state` FROM `queues` WHERE id_user = $id");
						if(mysqli_num_rows($result)<>0)
						{
							while($row = mysqli_fetch_row($result))//duyệt từ đầu đến cuối 
							{
								$id = $row[0];
								$name = $row[1];
								$authors  = $row[2];
								$teacher = $row[3];
								$maketime = $row[4];
								$state = $row[5];
						
								echo"<tr>";
								echo"<td>$id</td>";
								echo"<td>$name</td>";
								echo"<td>$authors</td>";
								echo"<td>$teacher</td>";
								echo"<td>$maketime</td>";
								echo"<td>$state</td>";
								echo"<td><a href='/QLDTKH/Controllers/user/C_user.php?action=delete_queue&id=".$row['0']."'>Hủy</a>";
								echo "</td>";
								echo"</tr>";
							}
							echo"</table>";
						}
						
					?></div>				
                </tbody>
            </table>
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
<?php include 'footer.php' ?>
