<?php include 'header.php';
if (isset($_SESSION['id']))
	$id = $_SESSION['id'];
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
		<h2>CHỈNH SỬA THÔNG TIN ĐỀ TÀI</h2>
	</div>	
	<form id="form1" name="form1" method="post" action="../../Controllers/admin/C_admin.php?action=topic_edit_submit">
		<div class="form-group row">
			<label for="id" class="col-sm-2 col-form-label col-form-label-sm">Mã đề tài: </label>
			<div class="col-sm-10">
				<input type="text" class="form-control form-control-sm" id="id" name="id" value="<?php if (count($_SESSION) > 0) echo $_SESSION['id'] ?>"
				placeholder="Vd: Nghiên cứu ..." readonly="true" style="background:#CCCCCC">
			</div>
		</div>
		<div class="form-group row">
			<label for="name" class="col-sm-2 col-form-label col-form-label-sm">Tên đề tài: </label>
			<div class="col-sm-10">
				<input type="text" class="form-control form-control-sm" id="name" name="name" value="<?php if (count($_SESSION) > 0) echo $_SESSION['name'] ?>"
				placeholder="Vd: Bùi văn mạnh" >
			</div>
		</div>
		<div class="form-group row">
			<label for="name" class="col-sm-2 col-form-label col-form-label-sm">Tác giả: </label>
			<div class="col-sm-10">
				<input type="text" class="form-control form-control-sm" id="authors" name="authors" value="<?php if (count($_SESSION) > 0) echo $_SESSION['authors'] ?>"
				placeholder="Vd: Bùi văn mạnh" >
			</div>
		</div>
		<div class="form-group row">
			<label for="name" class="col-sm-2 col-form-label col-form-label-sm">GV hướng dẫn: </label>
			<div class="col-sm-10">
				<input type="text" class="form-control form-control-sm" id="teacher" name="teacher" value="<?php if (count($_SESSION) > 0) echo $_SESSION['teacher'] ?>"
				placeholder="Vd: Bùi văn mạnh" >
			</div>
		</div>
		<div class="form-group row">
			<label for="name" class="col-sm-2 col-form-label col-form-label-sm">Ngày bắt đầu: </label>
			<div class="col-sm-10">
				<input type="text" class="form-control form-control-sm" id="start" name="start" value="<?php if (count($_SESSION) > 0) echo $_SESSION['start'] ?>"
				placeholder="Vd: Bùi văn mạnh" >
			</div>
		</div>
		<div class="form-group row">
			<label for="name" class="col-sm-2 col-form-label col-form-label-sm">Ngày kết thúc: </label>
			<div class="col-sm-10">
				<input type="text" class="form-control form-control-sm" id="deadline" name="deadline" value="<?php if (count($_SESSION) > 0) echo $_SESSION['deadline'] ?>"
				placeholder="Vd: Bùi văn mạnh" >
			</div>
		</div>

		<div class="form-group row">
			<label for="username" class="col-sm-2 col-form-label col-form-label-sm">Trạng thái: </label>
			<div class="col-sm-10">
				<select class="browser-default custom-select" id='state' name='state' >
					<option value="0" <?php if (count($_SESSION) > 0){ if ($_SESSION['state'] == 0) echo 'selected'; }?>>Chưa hoàn thành</option>
					<option value="1" <?php if (count($_SESSION) > 0){ if($_SESSION['state'] == 1) echo 'selected'; }?>>Đã hoàn thành</option>
				</select>	
			</div>
		</div>
		<div class="form-group row">
			<label for="password" class="col-sm-2 col-form-label col-form-label-sm">Điểm: </label>
			<div class="col-sm-10">
				<input type="text" class="form-control form-control-sm" id="point" name="point" value="<?php if (count($_SESSION) > 0) echo $_SESSION['point'] ?>"
				placeholder="Vd: admin, ... ">
			</div>
		</div>
		<div class="form-group row">
			<label for="usertype" class="col-sm-2 col-form-label col-form-label-sm">Ngày báo cáo: </label>
			<div class="col-sm-10">
				<input type="text" class="form-control form-control-sm" id="reportdate" name="reportdate" value="<?php if (count($_SESSION) > 0) echo $_SESSION['reportdate'] ?>"
				placeholder="Vd: admin@gmail.com">	
			</div>
		</div>
		<div class="form-group">
			<button type="submit" class="form-control btn btn-primary submit px-3">CẬP NHẬT THÔNG TIN</button>
		</div>
		<div align="left" style="margin-top:40px"><a href='/QLDTKH/Controllers/admin/C_admin.php?action=topic_delete&id=<?php echo $id ?>' >Xóa đề tài này</a> | 
				  <a href='/QLDTKH/Controllers/admin/C_admin.php?action=topic_add'>Thêm đề tài</a> | 
				  <a href='/QLDTKH/Views/admin/topic.php'>Trở lại danh sách</a>
		</div>	
	</form>
</div>
<?php include 'footer.php';
 ?>