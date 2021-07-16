<?php
 class  Topic
 {
 	private $hostname = 'localhost';
	private $username = 'root';
	private $pass = '';
	private $dbname = 'qlkh';
	private $table = 'topic';
	
	private  $conn =NULL;
	private $result =NULL;
	
	public function connect()
	{
		$this -> conn = new mysqli($this -> hostname, $this -> username, $this -> pass,$this -> dbname);
		if(!$this -> conn)
		{
			echo("Không thể kết nối đến DB, Vui lòng kiểm tra lại!");
		}
		else 
		{
			 mysqli_set_charset($this->conn,'utf8');
		}
		return ($this-> conn);
	}
	//truy van?
	public function excute($sql)
	{
		$this -> result = $this-> conn -> query($sql);
 		return $this-> result;
	}
	//lay du lieu
	public function getData($id)
	{
		$sql="SELECT * FROM $table";
		
		$this->excute($sql);
		if($this->result)
			$rs = mysqli_fetch_array($this->result);
		else
			$rs=0;
		return($rs);
	}
	
 	public function Insert($name, $authors, $start, $end, $submitted, $point, $teacher, $reportdate, $state)
	{
		$sql = "INSERT INTO `topic`(`Name`, `Authors`, `Start`, `End`, `Submitted`, `Point`, `Teacher`, `ReportDate`, `State`)
				VALUES (N'$name',
				N'$authors',
				'$start', 
				'$end', 
				N'$submitted', 
				$point, 
				N'$teacher', 
				'$reportdate', 
				$state)";
		return $this->excute($sql);
	}
	
	public function Update($name, $authors, $start, $end, $submitted, $point, $teacher, $reportdate, $state, $id)
	{
		$sql = "UPDATE `topic` SET 	
				`Name`= N'$name',
				`Authors`= N'$authors',
				`Start`= '$start',
				`End`= '$end',
				`Submitted`= N'$submitted',
				`Point`= $point,
				`Teacher`= N'$teacher',
				`ReportDate`= '$reportdate',
				`State`=$state WHERE id = '$id'";
		return $this->excute($sql);
	 }
	 
	 public function Delete($id){
		$sql = "DELETE FROM $table WHERE id='$id'";
		return $this->excute($sql);
	 }
 }
?>