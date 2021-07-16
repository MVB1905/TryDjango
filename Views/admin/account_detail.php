<?php include 'header.php';
 if (count($_SESSION) > 0)
	 $id = $_SESSION['id']
?>

<div class="container-fluid">
	<div class="text-center" style="margin-bottom:30px; margin-top:40px">
		<h2>THÔNG TIN CHI TIẾT</h2>
	</div>	
	<div class="form-group row">
		<label for="name" class="col-sm-2 col-form-label col-form-label-sm">Mã người dùng: </label>
		<div class="col-sm-10">
			<label for="usertype" class="col-sm-2 col-form-label col-form-label-sm"><?php if (count($_SESSION) > 0) echo $_SESSION['id'] ?></label>
		</div>
	</div>
	<div class="form-group row">
		<label for="name" class="col-sm-2 col-form-label col-form-label-sm">Tên người dùng: </label>
		<div class="col-sm-10">
			<label for="usertype" class="col-sm-2 col-form-label col-form-label-sm"><?php if (count($_SESSION) > 0) echo $_SESSION['name'] ?></label>
		</div>

	</div>
	<div class="form-group row">
		<label for="username" class="col-sm-2 col-form-label col-form-label-sm">Tên tài khoản: </label>
		<div class="col-sm-10">
			<label for="usertype" class="col-sm-2 col-form-label col-form-label-sm"><?php if (count($_SESSION) > 0) echo $_SESSION['username'] ?></label>
		</div>
	</div>
	<div class="form-group row">
		<label for="password" class="col-sm-2 col-form-label col-form-label-sm">Mật khẩu: </label>
		<div class="col-sm-10">
			<label for="usertype" class="col-sm-2 col-form-label col-form-label-sm"><?php if (count($_SESSION) > 0) echo $_SESSION['password'] ?></label>
		</div>
	</div>
	<div class="form-group row">
		<label for="usertype" class="col-sm-2 col-form-label col-form-label-sm">Phân quyền: </label>
		<div class="col-sm-10">
			<label for="usertype" class="col-sm-2 col-form-label col-form-label-sm"><?php if (count($_SESSION) > 0) echo $_SESSION['password'] ?></label>		
		</div>
	</div>
	<div class="form-group row">
		<label for="email" class="col-sm-2 col-form-label col-form-label-sm">Thư điện tử: </label>
		<div class="col-sm-10">
			<label for="email" class="col-sm-2 col-form-label col-form-label-sm"><?php  if (count($_SESSION) > 0) echo $_SESSION['email'] ?></label>
		</div>
	</div>
	<div align="left" style="margin-top:40px"><a href='/QLDTKH/Controllers/admin/C_admin.php?action=edit_user&id=<?php echo $id ?>' >Sửa thông tin người dùng</a> | 
					  <a href='/QLDTKH/Controllers/admin/C_admin.php?action=delete_user&id=<?php echo $id ?>'> Xóa người dùng </a> | 
					  <a href='/QLDTKH/Views/admin/account.php'> Trở lại danh sách</a>
					  </div>
</div>

<?php include 'footer.php' ?>