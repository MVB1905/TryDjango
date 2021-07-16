<?php include 'header.php' ?>
<div class="container-fluid">
<?php
	function ChangeDate($date)
	{
		$components = explode("-", $date);
		$tmp = $components[2] ." / " .$components[1]. " / " .$components[0];
		return $tmp;
	}

	$conn = mysqli_connect("localhost","root","","qldtkh");
	if(!$conn)
		{
			echo"khong ket noi csdl";
				exit;
		}
		//Thực thi truy vấn
	$result = mysqli_query($conn,"SELECT `id`, `name`, `authors`, `teacher`, `state` FROM `topics`");
	echo"<div class='text-center' style='margin-bottom:30px; margin-top:40px'>
				<h2>DANH SÁCH CÁC ĐỀ TÀI ĐANG ĐƯỢC THỰC HIỆN</h2>
			</div>";
	echo"<p><a href='/QLDTKH/Controllers/admin/C_admin.php?action=topic_add'>Thêm đề tài mới</a></p>";
	if(mysqli_num_rows($result)<>0)
	{
		echo "<table class='table'>";
		echo"<tr align ='center' class='style'>";
		echo"<th>Mã đề tài</th>";
		echo"<th>Tên đề tài</th>";
		echo"<th>Tác giả</th>";
		echo"<th>GV hướng dẫn</th>";
		echo"<th>Trạng thái</th>";
		while($row = mysqli_fetch_row($result))//duyệt từ đầu đến cuối 
		{
			$id= $row[0];
			$name = $row[1];
			$authors = $row[2];
			$teacher  = $row[3];
			$state = $row[4];
			if ($state == 0)
				$state = "Chưa hoàn thành";
			else 
				$state = "Đã hoàn thành";
	
			echo"<tr>";
			echo"<td>$id</td>";
			echo"<td>$name</td>";
			echo"<td>$authors</td>";
			echo"<td>$teacher</td>";
			echo"<td>$state</td>";
			echo"<td><a href='/QLDTKH/Controllers/admin/C_admin.php?action=topic_detail&id=".$row['0']."'>Chi tiết</a> | 	
					<a href='/QLDTKH/Controllers/admin/C_admin.php?action=topic_edit&id=".$row['0']."'> Sửa </a> |
					<a href='/QLDTKH/Controllers/admin/C_admin.php?action=topic_delete&id=".$row['0']."'> Xóa</a>";
			echo "</td>";
			echo"</tr>";
		}
		echo"</table>";
	}
	
?></div>

<?php include 'footer.php' ?>