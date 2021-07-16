<?php include 'header.php';
	if (count($_SESSION) > 0)
	{
		$id = $_SESSION['id'];
		$id_user = $_SESSION['id_user'];
	}
?>
<div class="container-fluid">
	<div class="text-center" style="margin-bottom:30px; margin-top:40px">
		<h2>XÁC NHẬN ĐỀ TÀI SINH VIÊN ĐĂNG KÝ</h2>
	</div>
	<form id="form1" name="form1" method="post" action="../../Controllers/admin/C_admin.php?action=queue_approved_submit">
		<div class="form-group row">
			<label for="name" class="col-sm-2 col-form-label col-form-label-sm">Mã: </label>
				<div class="col-sm-10">
					<input type="text" style="border-width:0px; background:#f8f9fc; color:#858796; width:1050px" class="text-muted" id="id" name="id" value="<?php if (count($_SESSION) > 0) echo $_SESSION['id'] ?>"
					readonly="true">
				</div>
		</div>
		<div class="form-group row">
			<label for="name" class="col-sm-2 col-form-label col-form-label-sm">SV đăng ký: </label>
				<div class="col-sm-10">
					<input type="text" style="border-width:0px; background:#f8f9fc; color:#858796; width:40px" class="text-muted" id="id_user" name="id_user" value="<?php if (count($_SESSION) > 0) echo $_SESSION['id_user']; 		?>"	readonly="true">
				</div>
		</div>
		<div class="form-group row">
			<label for="name" class="col-sm-2 col-form-label col-form-label-sm">Tên đề tài: </label>
			<div class="col-sm-10">
				<input type="text" style="border-width:0px; background:#f8f9fc; color:#858796; width:1050px" class="text-muted" id="name" name="name" value="<?php if (count($_SESSION) > 0) echo $_SESSION['name'] ?>"
				readonly="true">
			</div>
		</div>
		<div class="form-group row">
			<label for="name" class="col-sm-2 col-form-label col-form-label-sm">Tác giả: </label>
			<div class="col-sm-10">
				<input type="text" style="border-width:0px; background:#f8f9fc; color:#858796; width:1050px" class="text-muted" id="authors" name="authors" value="<?php if (count($_SESSION) > 0) echo $_SESSION['authors'] ?>"
				readonly="true">
			</div>
		</div>
		<div class="form-group row">
			<label for="name" class="col-sm-2 col-form-label col-form-label-sm">GV hướng dẫn: </label>
			<div class="col-sm-10">
				<input type="text" style="border-width:0px; background:#f8f9fc; color:#858796; width:1050px" class="text-muted" id="teacher" name="teacher" value="<?php if (count($_SESSION) > 0) echo $_SESSION['teacher'] ?>"
				readonly="true">
			</div>
		</div>
		<div class="form-group row">
			<label for="name" class="col-sm-2 col-form-label col-form-label-sm">Thời gian thực hiện (dự kiến): </label>
			<div class="col-sm-10">
				<input type="text" style="border-width:0px; background:#f8f9fc; color:#858796" class="text-muted" id="maketime" name="maketime" value="<?php if (count($_SESSION) > 0) echo $_SESSION['maketime'] ?>"
				readonly="true">
			</div>
		</div>
		<div class="form-group">
				<button type="submit" class="form-control btn btn-primary submit px-3">XÁC NHẬN ĐỀ TÀI</button>
			</div>
		<div align="left" style="margin-top:40px"><a href='/QLDTKH/Controllers/admin/C_admin.php?action=queue_unapproved&id=<?php echo $id ?>' >Không xác nhận đề tài này</a> | 
						  <a href='/QLDTKH/Views/admin/queue.php'> Trở lại danh sách</a>
						  </div>
		</form>
</div>
<?php include 'footer.php';
 ?>