<?php
 class  Queue
 {
 	private $hostname = 'localhost';
	private $username = 'root';
	private $pass = '';
	private $dbname = 'qlkh';
	private $table = 'queue';
	
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
	
 	public function Insert($name, $authors, $teacher, $maketime, $state, $id)
	{
		$sql = "INSERT INTO `$table`(`Name`, `Authors`, `Teacher`, `MakeTime`, `State`)
				VALUES (N'$name',
				N'$authors',
				N'$teacher',
				'$maketime',
				$state)";
		return $this->excute($sql);
	}
	
	public function Update($name, $authors, $teacher, $maketime, $state, $id)
	{
		$sql = "UPDATE `$table` SET 
				`Name` = N'$name',
				`Authors`= N'$authors',
				`Teacher`= N'$teacher',
				`MakeTime`='$maketime',
				`State` = $state WHERE id = '$id'";
		return $this->excute($sql);
	 }
	 
	 public function Delete($id){
		$sql = "DELETE FROM $table WHERE id='$id'";
		return $this->excute($sql);
	 }
 }
?>