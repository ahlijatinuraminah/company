<?php 
    
	include 'class.Project.php';
	
	class WorksOn extends Connection
	{
		private $pno='';
		private $pname = '';
		private $plocation = '';		
		private $dnumber;
		private $dname;
		private $essn;
		private $fname;
		private $minit;
		private $lname;
		private $hours;
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
		
				
		public function AddWorksOn(){			
			$sql = "INSERT INTO works_on (essn, pno, hours) VALUES ('$this->essn', $this->pno, $this->hours)";
				   
			$this->hasil = mysqli_query($this->connection, $sql);
			
			if($this->hasil)
			   $this->message ='Data berhasil ditambahkan!';					
		    else
			   $this->message ='Data gagal ditambahkan!';	
		}
		
		public function DeleteWorksOn(){
			$sql = "DELETE FROM works_on WHERE essn=$this->essn and pno = $this->pno";
			$this->hasil = mysqli_query($this->connection, $sql);
			if($this->hasil)
				$this->message ='Data berhasil dihapus!';								
			else
				$this->message ='Data gagal dihapus!';
		}
		
		
		public function SelectAllProjectByEssn($essn){
			$sql = "SELECT * from v_projectworks where essn = $essn order by pnumber";						
			$result = mysqli_query($this->connection, $sql);	
						
			$arrResult = Array();
			$cnt=0;			
			if(mysqli_num_rows($result) > 0){	
				while ($data = mysqli_fetch_array($result)){
					$objWorksOn = new WorksOn(); 
					$objWorksOn->essn=$data['ssn'];
					$objWorksOn->fname=$data['fname'];
					$objWorksOn->minit=$data['minit'];
					$objWorksOn->lname=$data['lname'];
					$objWorksOn->pno=$data['pnumber'];
					$objWorksOn->pname=$data['pname'];
					$objWorksOn->plocation=$data['plocation'];
					$objWorksOn->hours=$data['hours'];
					$objWorksOn->dnumber =$data['dnum'];
					$objWorksOn->dname =$data['dname'];
					$arrResult[$cnt] = $objWorksOn;
					$cnt++;
				}   
			}
			return $arrResult;	
		}
		
		public function SelectAllEmployeeByPnumber($pnumber){
			$sql = "SELECT * from v_projectworks where pnumber = $pnumber order by pnumber";						
			$result = mysqli_query($this->connection, $sql);	
						
			$arrResult = Array();
			$cnt=0;			
			if(mysqli_num_rows($result) > 0){	
				while ($data = mysqli_fetch_array($result)){
					$objWorksOn = new WorksOn(); 
					$objWorksOn->essn=$data['ssn'];
					$objWorksOn->fname=$data['fname'];
					$objWorksOn->minit=$data['minit'];
					$objWorksOn->lname=$data['lname'];
					$objWorksOn->pno=$data['pnumber'];
					$objWorksOn->pname=$data['pname'];
					$objWorksOn->plocation=$data['plocation'];
					$objWorksOn->hours=$data['hours'];
					$objWorksOn->dnumber =$data['dnum'];
					$objWorksOn->dname =$data['dname'];
					$arrResult[$cnt] = $objWorksOn;
					$cnt++;
				}   
			}
			return $arrResult;	
		}
		
		public function SelectAllProjectNotWorkBySsn($essn){
			$sql = "SELECT pnumber, pname FROM project WHERE pnumber not in(SELECT pno from works_on WHERE essn = '$essn')";						
			$result = mysqli_query($this->connection, $sql);	
			
			$arrResult = Array();
			$cnt=0;			
			if(mysqli_num_rows($result) > 0){	
				while ($data = mysqli_fetch_array($result)){
					$objWorksOn = new Project(); 
					$objWorksOn->pnumber=$data['pnumber'];
					$objWorksOn->pname=$data['pname'];					
					$arrResult[$cnt] = $objWorksOn;
					$cnt++;
				}   
			}
			return $arrResult;	
		}
		
		
		
		
		
		

 	}	 
?>
