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
	$result = mysqli_query($conn,"SELECT `id`, `name`, `username`, `password`, `usertype`, `email` FROM `account`");
	if(mysqli_num_rows($result)<>0)
	{
		echo"<div class='text-center' style='margin-bottom:30px; margin-top:40px'>
				<h2>DANH SÁCH NGƯỜI DÙNG TRONG HỆ THỐNG</h2>
			</div>";
		echo"<p><a href='/QLDTKH/Controllers/admin/C_admin.php?action=add_user'>Thêm người dùng</a></p>";
		echo "<table class='table'>";
		echo"<tr align ='center' class='style'>";
		echo"<th>Mã tài khoản</th>";
		echo"<th>Tên người dùng</th>";
		echo"<th>Tên tài khoản</th>";
		echo"<th>Mật khẩu</th>";
		echo"<th>Phân quyền</th>";
		echo"<th>Thư điện tử</th>";
		while($row = mysqli_fetch_row($result))//duyệt từ đầu đến cuối 
		{
			$id= $row[0];
			$name = $row[1];
			$username  = $row[2];
			$password = $row[3];
			$usertype = $row[4];
			$email = $row[5];
	
			echo"<tr>";
			echo"<td>$id</td>";
			echo"<td>$name</td>";
			echo"<td>$username</td>";
			echo"<td>$password</td>";
			echo"<td>$usertype</td>";
			echo"<td>$email</td>";
			echo"<td><a href='/QLDTKH/Controllers/admin/C_admin.php?action=detail_user&id=".$row['0']."'>Chi tiết</a> | 	
					<a href='/QLDTKH/Controllers/admin/C_admin.php?action=edit_user&id=".$row['0']."'> Sửa </a> |
					<a href='/QLDTKH/Controllers/admin/C_admin.php?action=delete_user&id=".$row['0']."'> Xóa</a>";
			echo "</td>";
			echo"</tr>";
		}
		echo"</table>";
	}
	
?></div>

<!-- INSERT INTO `account`(`name`, `username`, `password`, `usertype`, `email`) 
VALUES (N'Trần Thị Thảo',N'staff', '1', 'STAFF', 'demo@gmail.com') -->
<?php include 'footer.php' ?>