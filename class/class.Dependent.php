<?php 
	
	class Dependent extends Connection
	{
		private $essn='';
		private $dependent_name = '';
		private $relationship = '';
		private $bdate = '';
		private $sex = '';		
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
		
		
		public function AddDependent(){
			$sql = "INSERT INTO dependent (essn, dependent_name, relationship, bdate, sex)
				   VALUES ('$this->essn', '$this->dependent_name', '$this->relationship', '$this->bdate', '$this->sex')";
			$this->hasil = mysqli_query($this->connection, $sql);
			
			echo $sql;
			if($this->hasil)
			   $this->message ='Data berhasil ditambahkan!';					
		    else
			   $this->message ='Data gagal ditambahkan!';	
		}
		
		public function UpdateDependent(){
			$sql = "UPDATE dependent 
			        SET relationship = '$this->relationship',
					bdate = '$this->bdate',
					sex = '$this->sex'					
					WHERE essn = '$this->essn' and dependent_name ='$this->dependent_name'";
					
					
			$this->hasil = mysqli_query($this->connection, $sql);			
			
			if($this->hasil)
				$this->message ='Data berhasil diubah!';								
			else
				$this->message ='Data gagal diubah!';								
		}
		
		public function DeleteDependent(){
			$sql = "DELETE FROM dependent WHERE essn = '$this->essn' and dependent_name ='$this->dependent_name'";
			$this->hasil = mysqli_query($this->connection, $sql);
			if($this->hasil)
				$this->message ='Data berhasil dihapus!';								
			else
				$this->message ='Data gagal dihapus!';
		}
		
		public function SelectAllDependent(){					
			$sql = "SELECT * FROM dependent";			
			$result = mysqli_query($this->connection, $sql);	
			
			$arrResult = Array();
			$cnt=0;
			if(mysqli_num_rows($result) > 0){				
				while ($data = mysqli_fetch_array($result))
				{
					$objDependent = new Dependent(); 
					$objDependent->essn=$data['essn'];
					$objDependent->dependent_name=$data['dependent_name'];					
					$objDependent->bdate=$data['bdate'];
					$objDependent->relationship=$data['relationship'];
					$objDependent->sex=$data['sex'];					
					$arrResult[$cnt] = $objDependent;
					$cnt++;
				}
			}
			return $arrResult;			
		}
		
		public function SelectAllDependentByEssn($essn){					
			$sql = "SELECT * FROM dependent where essn='$essn'";			
			$result = mysqli_query($this->connection, $sql);	
			
			$arrResult = Array();
			$cnt=0;
			if(mysqli_num_rows($result) > 0){				
				while ($data = mysqli_fetch_array($result))
				{
					$objDependent = new Dependent(); 
					$objDependent->essn=$data['essn'];
					$objDependent->dependent_name=$data['dependent_name'];					
					$objDependent->bdate=$data['bdate'];
					$objDependent->relationship=$data['relationship'];
					$objDependent->sex=$data['sex'];					
					$arrResult[$cnt] = $objDependent;
					$cnt++;
				}
			}
			return $arrResult;			
		}
		
		public function SelectOneDependent(){
			$sql = "SELECT * FROM dependent WHERE essn = '$this->essn' and dependent_name ='$this->dependent_name'";
			$resultOne = mysqli_query($this->connection, $sql) or die(mysqli_error($this->connection));	
			if(mysqli_num_rows($resultOne) == 1){
				$this->hasil = true;
				$data = mysqli_fetch_assoc($resultOne);
				$this->dependent_name = $data['dependent_name'];								
				$this->bdate = $data['bdate'];				
				$this->relationship=$data['relationship'];
				$this->sex=$data['sex'];				
			}							
		}
		
		
 	}	 
?>
