<?php include 'header.php';
if (isset($_SESSION['error']))
	{
		$errorContent;
		if ($_SESSION['error'] == "Error1")
			$errorContent = "Tên tài khoản đã tồn tại, vui lòng thử lại!";
		else if ($_SESSION['error'] == "Error2")
			$errorContent = "Email đã tồn tại, vui lòng thử lại!";
	}
if (isset($_SESSION['id']))	
	$id = $_SESSION['id'];
?>
<div class="container-fluid">
	<div class="text-center" style="margin-bottom:30px; margin-top:40px">
		<h2>CHỈNH SỬA THÔNG TIN NGƯỜI DÙNG</h2>
	</div>	
	<form id="form1" name="form1" method="post" action="../../Controllers/admin/C_admin.php?action=edit_user_submit">
		<div class="form-group row">
			<label for="id" class="col-sm-2 col-form-label col-form-label-sm">Mã đề tài: </label>
			<div class="col-sm-10">
				<input type="text" class="form-control form-control-sm" id="id" name="id" value="<?php if (count($_SESSION) > 0) echo $_SESSION['id'] ?>"
				placeholder="Vd: Nghiên cứu ..." readonly="true" style="background:#CCCCCC">
			</div>
		</div>
		<div class="form-group row">
			<label for="name" class="col-sm-2 col-form-label col-form-label-sm">Tên người dùng: </label>
			<div class="col-sm-10">
				<input type="text" class="form-control form-control-sm" id="name" name="name" value="<?php if (count($_SESSION) > 0) echo $_SESSION['name'] ?>"
				placeholder="Vd: Bùi văn mạnh" >
			</div>
		</div>
		<div class="form-group row">
			<label for="username" class="col-sm-2 col-form-label col-form-label-sm">Tên tài khoản: </label>
			<div class="col-sm-10">
				<input type="text" class="form-control form-control-sm" id="username" name="username" value="<?php if (count($_SESSION) > 0) echo $_SESSION['username'] ?>"
				placeholder="Vd: admin, ... " >
				<?php 
					if (isset($_SESSION['error']))
					{
						if ($_SESSION['error'] == "Error1")
						{
							echo "<div class='alert alert-danger' role='alert'>";
							echo $errorContent;
							echo "</div>";
						}
					}
				?>
			</div>
		</div>
		<div class="form-group row">
			<label for="password" class="col-sm-2 col-form-label col-form-label-sm">Mật khẩu: </label>
			<div class="col-sm-10">
				<input type="text" class="form-control form-control-sm" id="password" name="password" value="<?php if (count($_SESSION) > 0) echo $_SESSION['password'] ?>"
				placeholder="Vd: admin, ... ">
			</div>
		</div>
		<div class="form-group row">
			<label for="usertype" class="col-sm-2 col-form-label col-form-label-sm">Phân quyền: </label>
			<div class="col-sm-10">
				<select class="browser-default custom-select" id='usertype' name='usertype' >
					<option value="USER" <?php if (count($_SESSION) > 0){ if ($_SESSION['usertype'] == 'USER') echo 'selected'; }?>>Người dùng</option>
					<option value="ADMIN" <?php if (count($_SESSION) > 0){ if ($_SESSION['usertype'] == 'STAFF') echo 'selected'; }?>>Quản trị viên</option>
					<option value="ADMIN" <?php if (count($_SESSION) > 0){ if ($_SESSION['usertype'] == 'ADMIN') echo 'selected'; }?>>Three</option>
				</select>	
			</div>
		</div>
		<div class="form-group row">
			<label for="email" class="col-sm-2 col-form-label col-form-label-sm">Thư điện tử: </label>
			<div class="col-sm-10">
				<input type="text" class="form-control form-control-sm" id="email" name="email" value="<?php if (count($_SESSION) > 0) echo $_SESSION['email'] ?>"
				placeholder="Vd: admin@gmail.com">
				<?php 
					if (isset($_SESSION['error']))
					{
						if ($_SESSION['error'] == "Error2")
						{
							echo "<div class='alert alert-danger' role='alert'>";
							echo $errorContent;
							echo "</div>";
						}
					}
				?>
			</div>
		</div>
		<div class="form-group">
			<button type="submit" class="form-control btn btn-primary submit px-3">CẬP NHẬT THÔNG TIN</button>
		</div>
		<div align="left" style="margin-top:40px"><a href='/QLDTKH/Controllers/admin/C_admin.php?action=delete_user&id=<?php echo $id ?>' >Xóa người dùng này</a> | 
				  <a href='/QLDTKH/Controllers/admin/C_admin.php?action=add_user'>Thêm người dùng</a> | 
				  <a href='/QLDTKH/Views/admin/account.php'>Trở lại danh sách</a>
		</div>	
	</form>
</div>
<?php include 'footer.php';
 ?>