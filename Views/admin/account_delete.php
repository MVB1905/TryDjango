<?php include 'header.php';
 if (count($_SESSION) > 0)
	 $id = $_SESSION['id']
?>

<div class="container-fluid">
	<div class="text-center" style="margin-bottom:30px; margin-top:40px">
		<h2>XÓA NGƯỜI DÙNG</h2>
	</div>	
	<form id="form1" name="form1" method="post" action="../../Controllers/admin/C_admin.php?action=delete_user_submit">
		<div class="form-group row">
			<label for="name" class="col-sm-2 col-form-label col-form-label-sm">Mã người dùng: </label>
			<div class="col-sm-10">
				<input type="text" style="border-width:0px; background:#f8f9fc; color:#858796" class="col-sm-2 col-form-label col-form-label-sm" id="id" name="id" value="<?php if (count($_SESSION) > 0) echo $_SESSION['id'] ?>"
				readonly="true">
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
		<div class="form-group">
			<button type="submit" class="form-control btn btn-primary submit px-3">XÁC NHẬN XÓA</button>
		</div>
		<div align="left" style="margin-top:40px"><a href='/QLDTKH/Controllers/admin/C_admin.php?action=edit_user&id=<?php echo $id ?>' >Sửa thông tin người dùng</a> | 
				  <a href='/QLDTKH/Controllers/admin/C_admin.php?action=add_user'>Thêm người dùng</a> | 
				  <a href='/QLDTKH/Views/admin/account.php'>Trở lại danh sách</a>
		</div>
	</form>

</div>

<?php include 'footer.php' ?>