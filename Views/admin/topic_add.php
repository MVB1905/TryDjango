<?php include 'header.php';
if (isset($_SESSION['error']))
	{
		$errorContent;
		if ($_SESSION['error'] == "Error1")
			$errorContent = "Tên tài khoản đã tồn tại, vui lòng thử lại!";
		else if ($_SESSION['error'] == "Error2")
			$errorContent = "Email đã tồn tại, vui lòng thử lại!";
	}
?>

<div class="container-fluid">
	<div class="text-center" style="margin-bottom:30px; margin-top:40px">
		<h2>THÊM ĐỀ TÀI MỚI</h2>
	</div>	
	<form id="form1" name="form1" method="post" action="../../Controllers/admin/C_admin.php?action=topic_add_submit">
		<div class="form-group row">
			<label for="name" class="col-sm-2 col-form-label col-form-label-sm">Tên đề tài: </label>
			<div class="col-sm-10">
				<input type="text" class="form-control form-control-sm" id="name" name="name" placeholder="Vd: Bùi văn mạnh" value="<?php if (count($_SESSION) > 0) echo $_SESSION['name'] ?>">
			</div>

		</div>
		
		<div class="form-group row">
			<label for="name" class="col-sm-2 col-form-label col-form-label-sm">Tác giả: </label>
			<div class="col-sm-10">
				<input type="text" class="form-control form-control-sm" id="authors" name="authors" placeholder="Vd: Bùi văn mạnh" value="<?php if (count($_SESSION) > 0) echo $_SESSION['name'] ?>">
			</div>

		</div>
		
		<div class="form-group row">
			<label for="name" class="col-sm-2 col-form-label col-form-label-sm">GV hướng dẫn: </label>
			<div class="col-sm-10">
				<input type="text" class="form-control form-control-sm" id="teacher" name="teacher" placeholder="Vd: Bùi văn mạnh" value="<?php if (count($_SESSION) > 0) echo $_SESSION['name'] ?>">
			</div>

		</div>
		
		<div class="form-group row">
			<label for="name" class="col-sm-2 col-form-label col-form-label-sm">Ngày bắt đầu: </label>
			<div class="col-sm-10">
				<input type="text" class="form-control form-control-sm" id="start" name="start" placeholder="Vd: Bùi văn mạnh" value="<?php if (count($_SESSION) > 0) echo $_SESSION['name'] ?>">
			</div>

		</div>
		
		<div class="form-group row">
			<label for="name" class="col-sm-2 col-form-label col-form-label-sm">Ngày kết thúc: </label>
			<div class="col-sm-10">
				<input type="text" class="form-control form-control-sm" id="deadline" name="deadline" placeholder="Vd: Bùi văn mạnh" value="<?php if (count($_SESSION) > 0) echo $_SESSION['name'] ?>">
			</div>

		</div>
		
		<div class="form-group row">
			<label for="username" class="col-sm-2 col-form-label col-form-label-sm">Giấy tờ đã nộp: </label>
			<div class="col-sm-10">
				<input type="text" class="form-control form-control-sm" id="submitted" name="submitted" placeholder="Vd: admin, ... " value="<?php if (count($_SESSION) > 0) echo $_SESSION['username'] ?>">
			</div>

		</div>

		<div class="form-group row">
			<label for="usertype" class="col-sm-2 col-form-label col-form-label-sm">Trạng thái: </label>
			<div class="col-sm-10">
				<select class="browser-default custom-select" id='state' name='state' readonly="true" >
					<option value="0" selected="selected">Chưa hoàn thành</option>
					<option value="1" >Đã hoàn thành</option>
				</select>			
			</div>
		</div>
		<div class="form-group row">
			<label for="email" class="col-sm-2 col-form-label col-form-label-sm">Điểm: </label>
			<div class="col-sm-10">
				<input type="text" class="form-control form-control-sm" id="point" name="point" placeholder="Vd: admin@gmail.com" value="<?php  if (count($_SESSION) > 0) echo $_SESSION['email'] ?>">
			</div>
		</div>
		<div class="form-group row">
			<label for="password" class="col-sm-2 col-form-label col-form-label-sm">Ngày báo cáo: </label>
			<div class="col-sm-10">
				<input type="text" class="form-control form-control-sm" id="reportdate" name="reportdate" placeholder="Vd: admin, ... " value="<?php if (count($_SESSION) > 0) echo $_SESSION['password'] ?>">
			</div>
		</div>
		<div class="form-group">
			<button type="submit" class="form-control btn btn-primary submit px-3">THÊM ĐỀ TÀI</button>
		</div>
		<div align="left" style="margin-top:40px"><a href='/QLDTKH/Views/admin/topic.php'>Trở lại danh sách</a>
		</div>	
	</form>
</div>

<?php include 'footer.php';
 ?>