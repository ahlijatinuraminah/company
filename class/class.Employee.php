<?php 
	
	class Employee extends Connection
	{
		private $ssn='';
		private $fname = '';
		private $minit = '';
		private $lname = '';
		private $address = '';
		private $bdate = '';
		private $sex = '';
		private $salary = 0;
		private $super_ssn = '';
		private $super_name = '';
		private $dno=0;
		private $dname = '';
		private $userid=0;
		private $photo='';
		private $hasil = false;
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
		
		
		public function AddEmployee(){
			$sql = "INSERT INTO employee (ssn,  fname, minit, lname, address, bdate, sex, salary, super_ssn, dno)
				   VALUES ('$this->ssn', '$this->fname', '$this->minit', '$this->lname', '$this->address', '$this->bdate', '$this->sex', $this->salary, '$this->super_ssn', $this->dno)";
			$this->hasil = mysqli_query($this->connection, $sql);
			
			
			if($this->hasil)
			   $this->message ='Data berhasil ditambahkan!';					
		    else
			   $this->message ='Data gagal ditambahkan!';	
		}
		
		public function UpdateEmployee(){
			$sql = "UPDATE employee 
			        SET fname ='$this->fname',
					minit = '$this->minit',
					lname = '$this->lname',					
					address = '$this->address',
					bdate = '$this->bdate',
					sex = '$this->sex',
					salary = $this->salary,
					super_ssn = '$this->super_ssn',
					dno = $this->dno,
					photo = '$this->photo'
					WHERE ssn = '$this->ssn'";
					
					
			$this->hasil = mysqli_query($this->connection, $sql);			
			
			if($this->hasil)
				$this->message ='Data berhasil diubah!';								
			else
				$this->message ='Data gagal diubah!';								
		}

		
		
		   
		  
		
		public function DeleteEmployee(){
			$sql = "DELETE FROM employee WHERE ssn='$this->ssn'";
			$this->hasil = mysqli_query($this->connection, $sql);
			if($this->hasil)
				$this->message ='Data berhasil dihapus!';								
			else
				$this->message ='Data gagal dihapus!';
		}
		
		public function SelectAllEmployee(){					
			$sql = "SELECT * FROM v_employee";			
			$result = mysqli_query($this->connection, $sql);	
			
			$arrResult = Array();
			$cnt=0;
			if(mysqli_num_rows($result) > 0){				
				while ($data = mysqli_fetch_array($result))
				{
					$objEmployee = new Employee(); 
					$objEmployee->ssn=$data['ssn'];
					$objEmployee->fname=$data['fname'];
					$objEmployee->minit=$data['minit'];
					$objEmployee->lname=$data['lname'];
					$objEmployee->bdate=$data['bdate'];
					$objEmployee->address=$data['address'];
					$objEmployee->sex=$data['sex'];
					$objEmployee->salary=$data['salary'];
					$objEmployee->super_ssn=$data['super_ssn'];
					$objEmployee->super_name=$data['super_name'];
					$objEmployee->dno=$data['dno'];
					$objEmployee->dname=$data['dname'];
					$objEmployee->photo=$data['photo'];
					$arrResult[$cnt] = $objEmployee;
					$cnt++;
				}
			}
			return $arrResult;			
		}
		
		public function SelectAllEmployeeBySuperssn($superssn){					
			$sql = "SELECT * FROM v_employee where super_ssn = $superssn order by fname";			
			$result = mysqli_query($this->connection, $sql);	
			
			$arrResult = Array();
			$cnt=0;
			if(mysqli_num_rows($result) > 0){				
				while ($data = mysqli_fetch_array($result))
				{
					$objEmployee = new Employee(); 
					$objEmployee->ssn=$data['ssn'];
					$objEmployee->fname=$data['fname'];
					$objEmployee->minit=$data['minit'];
					$objEmployee->lname=$data['lname'];
					$objEmployee->bdate=$data['bdate'];
					$objEmployee->address=$data['address'];
					$objEmployee->sex=$data['sex'];
					$objEmployee->salary=$data['salary'];
					$objEmployee->super_ssn=$data['super_ssn'];
					$objEmployee->super_name=$data['super_name'];
					$objEmployee->dno=$data['dno'];
					$objEmployee->dname=$data['dname'];
					$objEmployee->photo=$data['photo'];
					$arrResult[$cnt] = $objEmployee;
					$cnt++;
				}
			}
			return $arrResult;			
		}
		
		public function SelectAllEmployeeInDepartment($dnumber){					
			$sql = "SELECT * FROM v_employee where dno = $dnumber order by fname";			
			$result = mysqli_query($this->connection, $sql);	
			
			$arrResult = Array();
			$cnt=0;
			if(mysqli_num_rows($result) > 0){				
				while ($data = mysqli_fetch_array($result))
				{
					$objEmployee = new Employee(); 
					$objEmployee->ssn=$data['ssn'];
					$objEmployee->fname=$data['fname'];
					$objEmployee->minit=$data['minit'];
					$objEmployee->lname=$data['lname'];
					$objEmployee->bdate=$data['bdate'];
					$objEmployee->address=$data['address'];
					$objEmployee->sex=$data['sex'];
					$objEmployee->salary=$data['salary'];
					$objEmployee->super_ssn=$data['super_ssn'];
					$objEmployee->super_name=$data['super_name'];
					$objEmployee->dno=$data['dno'];
					$objEmployee->dname=$data['dname'];
					$objEmployee->photo=$data['photo'];
					$arrResult[$cnt] = $objEmployee;
					$cnt++;
				}
			}
			return $arrResult;			
		}

		
		
		public function SelectOneEmployee(){
			$sql = "SELECT * FROM v_employee WHERE ssn='$this->ssn'";
			
			$resultOne = mysqli_query($this->connection, $sql) or die(mysqli_error($this->connection));	
			if(mysqli_num_rows($resultOne) == 1){
				$this->hasil = true;
				$data = mysqli_fetch_assoc($resultOne);
				$this->ssn = $data['ssn'];				
				$this->fname = $data['fname'];				
				$this->minit = $data['minit'];				
				$this->lname = $data['lname'];				
				$this->bdate = $data['bdate'];				
				$this->address=$data['address'];
				$this->sex=$data['sex'];
				$this->salary=$data['salary'];
				$this->super_ssn=$data['super_ssn'];
				$this->super_name=$data['super_name'];
				$this->dno=$data['dno'];
				$this->dname=$data['dname'];
				$this->userid=$data['userid'];
				$this->photo=$data['photo'];
			}							
		}
		
		public function SelectAllManager(){					
			$sql = "SELECT distinct super_ssn, super_name FROM v_employee where super_ssn is not null";			
			$result = mysqli_query($this->connection, $sql);	
			
			$arrResult = Array();
			$cnt=0;
			if(mysqli_num_rows($result) > 0){				
				while ($data = mysqli_fetch_array($result))
				{
					$objEmployee = new Employee(); 
					$objEmployee->super_ssn=$data['super_ssn'];
					$objEmployee->super_name=$data['super_name'];					
					$arrResult[$cnt] = $objEmployee;
					$cnt++;
				}
			}
			return $arrResult;			
		}
		
		public function SelectDepartment(){					
			$sql = "SELECT dnumber, dname FROM department";			
			$result = mysqli_query($this->connection, $sql);	
			
			$arrResult = Array();
			$cnt=0;
			if(mysqli_num_rows($result) > 0){				
				while ($data = mysqli_fetch_array($result))
				{
					$objEmployee = new Employee(); 
					$objEmployee->dno=$data['dnumber'];
					$objEmployee->dname=$data['dname'];					
					$arrResult[$cnt] = $objEmployee;
					$cnt++;
				}
			}
			return $arrResult;			
		}
 	}	 
?>
