<?php include 'header.php';
 if (count($_SESSION) > 0)
	 $id = $_SESSION['id']
?>
<div class="container-fluid">
	<div class="text-center" style="margin-bottom:30px; margin-top:40px">
		<h2>THÔNG TIN CHI TIẾT ĐỀ TÀI</h2>
	</div>
	<form id="form1" name="form1" method="post" action="../../Controllers/admin/C_admin.php?action=topic_delete_submit">
		<div class="form-group row">
			<label for="name" class="col-sm-2 col-form-label col-form-label-sm">Mã đề tài: </label>
				<div class="col-sm-10">
					<input type="text" style="border-width:0px; background:#f8f9fc; color:#858796" class="text-muted" id="id" name="id" value="<?php if (count($_SESSION) > 0) echo $_SESSION['id'] ?>"
					readonly="true">
				</div>
		</div>
		<div class="form-group row">
			<label for="name" class="col-sm-2 col-form-label col-form-label-sm">Tên đề tài: </label>
			<div class="col-sm-10">
				<label for="usertype" class="text-muted"><?php if (count($_SESSION) > 0) echo $_SESSION['name'] ?></label>
			</div>
		</div>
		<div class="form-group row">
			<label for="name" class="col-sm-2 col-form-label col-form-label-sm">Tác giả: </label>
			<div class="col-sm-10">
				<label for="usertype" class="text-muted"><?php if (count($_SESSION) > 0) echo $_SESSION['authors'] ?></label>
			</div>
		</div>
		<div class="form-group row">
			<label for="name" class="col-sm-2 col-form-label col-form-label-sm">GV hướng dẫn: </label>
			<div class="col-sm-10">
				<label for="usertype" class="text-muted"><?php if (count($_SESSION) > 0) echo $_SESSION['teacher'] ?></label>
			</div>
		</div>
		<div class="form-group row">
			<label for="name" class="col-sm-2 col-form-label col-form-label-sm">Ngày bắt đầu: </label>
			<div class="col-sm-10">
				<label for="usertype" class="text-muted"><?php if (count($_SESSION) > 0) echo $_SESSION['start'] ?></label>
			</div>
		</div>
		<div class="form-group row">
			<label for="name" class="col-sm-2 col-form-label col-form-label-sm">Ngày kết thúc: </label>
			<div class="col-sm-10">
				<label for="usertype" class="text-muted"><?php if (count($_SESSION) > 0) echo $_SESSION['deadline'] ?></label>
			</div>
	
		</div>
		<div class="form-group row">
			<label for="username" class="col-sm-2 col-form-label col-form-label-sm">Tài liệu đã nộp: </label>
			<div class="col-sm-10">
				<label for="usertype" class="text-muted"><?php if (count($_SESSION) > 0) echo $_SESSION['submitted'] ?></label>
			</div>
		</div>
		<div class="form-group row">
			<label for="password" class="col-sm-2 col-form-label col-form-label-sm">Trạng thái: </label>
			<div class="col-sm-10">
				<label for="usertype" class="text-muted"><?php if (count($_SESSION) > 0) if ($_SESSION['state'] == 0) echo 'Chưa hoàn thành'; else echo 'Đã hoàn thành';?></label>
			</div>
		</div>
		<div class="form-group row">
			<label for="usertype" class="col-sm-2 col-form-label col-form-label-sm">Điểm: </label>
			<div class="col-sm-10">
				<label for="usertype" class="text-muted"><?php if (count($_SESSION) > 0) echo $_SESSION['point'] ?></label>		
			</div>
		</div>
		<div class="form-group row">
			<label for="email" class="col-sm-2 col-form-label col-form-label-sm">Ngày báo cáo: </label>
			<div class="col-sm-10">
				<label for="email" class="text-muted"><?php  if (count($_SESSION) > 0) echo $_SESSION['reportdate'] ?></label>
			</div>
		</div>
		<div class="form-group">
				<button type="submit" class="form-control btn btn-primary submit px-3">XÁC NHẬN XÓA</button>
			</div>
		<div align="left" style="margin-top:40px"><a href='/QLDTKH/Controllers/admin/C_admin.php?action=topic_edit&id=<?php echo $id ?>' >Sửa đề tài này</a> | 
						  <a href='/QLDTKH/Controllers/admin/C_admin.php?action=topic_delete&id=<?php echo $id ?>'>Xóa đề tài này</a> | 
						  <a href='/QLDTKH/Views/admin/topic.php'> Trở lại danh sách</a>
						  </div>
		</form>
</div>
<?php include 'footer.php';
 ?>