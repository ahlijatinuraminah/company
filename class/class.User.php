<?php

include 'class.Employee.php';

class User extends Connection{
	private $userid=0;
	private $email='';
	private $password='';	
	private $role='';		
	private $emp;
	
	private $hasil= false;
	private $message ='';
	
	public function __get($atribute) {
	if (property_exists($this, $atribute)) {
    	return $this->$atribute;
		}
	}

	public function __set($atribut, $value){
		if (property_exists($this, $atribut)) {
					$this->$atribut = $value;
		}
	}
	
	function __construct() {						
		$this->emp = new Employee();
	}

	public function AddUser(){
		$this->connect();
		
		
		$sql = "INSERT INTO user(email, password, role)
				values ('$this->email', '$this->password', '$this->role')";				
		$this->hasil = mysqli_query($this->connection, $sql);
		
		$userid = $this->connection->insert_id;
		$sql ="UPDATE employee set userid = $userid where ssn = '".$this->emp->ssn."'";		
		$this->hasil = mysqli_query($this->connection, $sql);
				
		if($this->hasil)
			   $this->message ='Data berhasil ditambahkan!';					
		    else
			   $this->message ='Data gagal ditambahkan!';	
	}
	
		public function UpdateUser(){
			$this->connect();
			$sql = "UPDATE user 
			        SET email = '$this->email',
                    password='$this->password',
					role='$this->role'
					WHERE userid = $this->userid";					
			
			$this->hasil = mysqli_query($this->connection, $sql);			
			
			if($this->hasil)
				$this->message ='Data berhasil diubah!';								
			else
				$this->message ='Data gagal diubah!';								
		}
		
		
		public function DeleteUser(){
			$this->connect();
			$sql = "DELETE FROM user WHERE userid=$this->userid";
			$this->hasil = mysqli_query($this->connection, $sql);
			if($this->hasil)
				$this->message ='Data berhasil dihapus!';								
			else
				$this->message ='Data gagal dihapus!';
		}

	public function ValidateEmail($inputemail){
		$this->connect();
		$sql = "SELECT * FROM v_user
				WHERE email = '$inputemail'";
		$result = mysqli_query($this->connection, $sql);	
		if (mysqli_num_rows ($result) == 1){
			$this->hasil = true;			
			$data = mysqli_fetch_assoc($result);
			$this->userid = $data['userid'];				
			$this->password = $data['password'];				
			$this->emp->fname = $data['fname'];				
			$this->emp->minit = $data['minit'];				
			$this->emp->lname = $data['lname'];				
			$this->email=$data['email'];
			$this->role=$data['role'];
			$this->emp->ssn = $data['ssn'];
		}
	}	
	
	
	public function SelectOneUser(){
		$this->connect();
		$sql = "SELECT * FROM v_user
				WHERE userid = $this->userid";
				
		$resultOne = mysqli_query($this->connection, $sql) or die(mysqli_error($this->connection));	
		
		if(mysqli_num_rows($resultOne) == 1){
			$this->hasil = true;
			$data = mysqli_fetch_assoc($resultOne);
			$this->userid = $data['userid'];				
			$this->emp->fname = $data['fname'];				
			$this->emp->minit = $data['minit'];				
			$this->emp->lname = $data['lname'];
			$this->password = $data['password'];				
			$this->email=$data['email'];
			$this->role=$data['role'];
			$this->emp->ssn = $data['ssn'];
		}		
	}
	
	public function SelectAllUser(){
		$this->connect();
		$sql = "SELECT * FROM v_user order by userid";
		$result = mysqli_query($this->connection, $sql) or die(mysqli_error($this->connection));	
		
		$arrResult = Array();
		$i=0;
		if(mysqli_num_rows($result)>0){
			while($data = mysqli_fetch_array($result))
			{
				$objUser = new User();
				$objUser->userid=$data['userid'];
				$objUser->emp->fname=$data['fname'];
				$objUser->emp->minit=$data['minit'];
				$objUser->emp->lname=$data['lname'];
				$objUser->email=$data['email'];
				$objUser->password=$data['password'];
				$objUser->role=$data['role'];
				$arrResult[$i] = $objUser;
				$i++;
			}
		}
		return $arrResult;
	}
	
	public function SelectAllUserByUserid($currentuserid){
		$this->connect();
			if ($currentuserid == NULL)
				$sql = "SELECT * FROM v_user WHERE userid IS NULL";
			else
				$sql = "SELECT * FROM v_user WHERE userid = $currentuserid";
						
			$result = mysqli_query($this->connection, $sql);	
			
			$arrResult = Array();
			$cnt=0;
			if(mysqli_num_rows($result) > 0){				
				while ($data = mysqli_fetch_array($result))
				{
					$objUser = new User(); 
					$objUser->emp->ssn=$data['ssn'];
					$objUser->emp->fname=$data['fname'];
					$objUser->emp->minit=$data['minit'];
					$objUser->emp->lname=$data['lname'];
					$arrResult[$cnt] = $objUser;
					$cnt++;
				}
			}
			return $arrResult;			
		}
}
?>