<?php include 'header.php';
$idSelected;
?>
<div class="container-fluid">
<?php
	$conn = mysqli_connect("localhost","root","","qldtkh");
	if(!$conn)
		{
			echo"khong ket noi csdl";
				exit;
		}
		//Thực thi truy vấn
	$result = mysqli_query($conn,"SELECT `id`, `id_user`, `name`, `authors`, `teacher` FROM `queues` WHERE state = 'wait'");
	echo"<div class='text-center' style='margin-bottom:30px; margin-top:40px'>
		<h2>DANH SÁCH ĐANG CHỜ DUYỆT</h2>
	</div>";
	if(mysqli_num_rows($result)<>0)
	{

		echo "<table class='table'>";
		echo"<tr align ='center' class='style'>";
		echo"<th>STT</th>";
		echo"<th>Mã người đăng ký</th>";
		echo"<th>Tên đề tài đăng ký</th>";
		echo"<th>Tác giả đăng ký</th>";
		echo"<th>GV hướng dẫn</th>";
		while($row = mysqli_fetch_row($result))//duyệt từ đầu đến cuối 
		{
			$id = $row[0];
			$id_user = $row[1];
			$name  = $row[2];
			$authors = $row[3];
			$teacher = $row[4];
	
			echo"<tr>";
			echo"<td>$id</td>";
			echo"<td>$id_user | <a href='/QLDTKH/Controllers/admin/C_admin.php?action=detail_user&id=$id_user'>Xem thông tin</a></td>";
			echo"<td>$name</td>";
			echo"<td>$authors</td>";
			echo"<td>$teacher</td>";
			echo"<td><a href='/QLDTKH/Controllers/admin/C_admin.php?action=queue_approved&id=".$row['0']."'>Xác nhận</a> | 	
					<a href='/QLDTKH/Controllers/admin/C_admin.php?action=queue_unapproved&id=".$row['0']."'>Không xác nhận</a>";
			echo "</td>";
			echo"</tr>";
		}
		echo"</table>";
	}
	
?></div>

<!-- INSERT INTO `account`(`name`, `username`, `password`, `usertype`, `email`) 
VALUES (N'Trần Thị Thảo',N'staff', '1', 'STAFF', 'demo@gmail.com') -->
<?php include 'footer.php' ?>