<?php 
	
	class DeptLocations extends Connection
	{
		private $dnumber='';
		private $dlocation = '';
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
		
		
		public function AddDeptLocations(){
			$sql = "INSERT INTO dept_locations (dnumber, dlocation)
				   VALUES ($this->dnumber, '$this->dlocation')";
			$this->hasil = mysqli_query($this->connection, $sql);
			
			
			if($this->hasil)
			   $this->message ='Data berhasil ditambahkan!';					
		    else
			   $this->message ='Data gagal ditambahkan!';	
		}
		
		public function UpdateDeptLocations(){
			$sql = "UPDATE dept_locations 
			        SET dlocation = '$this->dlocation'
					WHERE dnumber = '$this->dnumber' and dlocation ='$this->dlocation'";					
					
			$this->hasil = mysqli_query($this->connection, $sql);			
			
			if($this->hasil)
				$this->message ='Data berhasil diubah!';								
			else
				$this->message ='Data gagal diubah!';								
		}
		
		public function DeleteDeptLocations(){
			$sql = "DELETE FROM dept_locations WHERE dnumber = '$this->dnumber' and dlocation ='$this->dlocation'";
			$this->hasil = mysqli_query($this->connection, $sql);
			if($this->hasil)
				$this->message ='Data berhasil dihapus!';								
			else
				$this->message ='Data gagal dihapus!';
		}
		
		public function SelectAllDeptLocations(){					
			$sql = "SELECT * FROM dept_locations";			
			$result = mysqli_query($this->connection, $sql);	
			
			$arrResult = Array();
			$cnt=0;
			if(mysqli_num_rows($result) > 0){				
				while ($data = mysqli_fetch_array($result))
				{
					$objDeptLocations = new DeptLocations(); 
					$objDeptLocations->dnumber=$data['dnumber'];
					$objDeptLocations->dlocation=$data['dlocation'];					
					$arrResult[$cnt] = $objDeptLocations;
					$cnt++;
				}
			}
			return $arrResult;			
		}
		
		public function SelectAllDeptLocationsByDnumber($dnumber){					
			$sql = "SELECT * FROM dept_locations where dnumber='$dnumber'";			
			$result = mysqli_query($this->connection, $sql);	
			
			$arrResult = Array();
			$cnt=0;
			if(mysqli_num_rows($result) > 0){				
				while ($data = mysqli_fetch_array($result))
				{
					$objDeptLocations = new DeptLocations(); 
					$objDeptLocations->dnumber=$data['dnumber'];
					$objDeptLocations->dlocation=$data['dlocation'];					
					$arrResult[$cnt] = $objDeptLocations;
					$cnt++;
				}
			}
			return $arrResult;			
		}
		
		public function SelectOneDeptLocations(){
			$sql = "SELECT * FROM dept_locations WHERE dnumber = '$this->dnumber' and dlocation ='$this->dlocation'";
			$resultOne = mysqli_query($this->connection, $sql) or die(mysqli_error($this->connection));	
			if(mysqli_num_rows($resultOne) == 1){
				$this->hasil = true;
				$data = mysqli_fetch_assoc($resultOne);
				$this->dnumber = $data['dnumber'];								
				$this->dlocation = $data['dlocation'];												
							
			}							
		}
		
		
 	}	 
?>
