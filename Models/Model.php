<?php
 	$hostname = 'localhost';
	$username = 'root';
	$pass = '';
	$dbname = 'php';
	
	$conn =NULL;
	$result =NULL;
	
	// Câu lệnh kết nối DB
	public function connect()
	{
		$conn = new mysqli($hostname, $username, $pass, $dbname);
		if($conn)
			echo("Không thể kết nối đến DB, Vui lòng kiểm tra lại!");
		else 
			 mysqli_set_charset($conn,'utf8');
		return ($conn);
	}
	
	// Câu lệnh thực thi
	public function excute($sql)
	{
		$result = $conn -> query($sql);
 		return $result;
	}
	
	// Lấy toàn bộ danh sách topic
	public function getALLTopic($id)
	{
		$sql="SELECT * FROM topic";
 		excute($sql);
		if($result)
	 		$rs=mysqli_fetch_array($result);
		else
 			$rs=0;
		return($rs);
	}
	
	// Lấy toàn bộ danh sách chờ
	public function getAllData(){
 	if(!$this->result){
	 	$rs=0;
 	}
	else{
 		while($datas=$this->getData()){
			$rs=$datas;
		}
	
 	}
 		return $rs;
	}
	
 	public function themnv($Ten,$GioiTinh,$NgaySinh,$NgayVaoLam,$SoCon,$LoaiNhanVien,$MaNV){
		$sql="INSERT INTO `nhanvien`(`Ten`, `GioiTinh`, `NgaySinh`, `NgayVaoLam`, `SoCon`, `LoaiNhanVien`, `MaNV`) 
			  VALUES (N'$Ten',$GioiTinh,'$NgaySinh','$NgayVaoLam','$SoCon',$LoaiNhanVien,N'$MaNV')";
		return $this->excute($sql);
	}
	
	public function suaNV($Ten,$GioiTinh,$NgaySinh,$NgayVaoLam,$SoCon,$LoaiNhanVien,$MaNV){
		$sql =$sql= "UPDATE `nhanvien` SET
			 `Ten`=N'$Ten',
			`GioiTinh`=$GioiTinh,
			`NgaySinh`='$NgaySinh',
			`NgayVaoLam`='$NgayVaoLam',
			`SoCon`='$SoCon',
			`LoaiNhanVien`=$LoaiNhanVien,
			`MaNV`=N'$MaNV' 
			 WHERE MaNV = N'$MaNV'";
		 return $this->excute($sql);
	 }
	 public function xoanv($id){
		$sql="delete from nhanvien where MaNV='$id'";
		return $this->excute($sql);
	 }
?>
