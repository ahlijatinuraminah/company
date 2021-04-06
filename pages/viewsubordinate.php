<div class="container">  
  <h4 class="title"><span class="text"><strong>Subordinate List</strong></span></h4>  
<div class="row">
<div class="navbar-collapse gallery">
<ul>
<?php
	require_once('./class/class.Employee.php'); 	
		$superssn = $_SESSION['ssn'];		
		$objEmployee = new Employee(); 
		$arrayResult = $objEmployee->SelectAllEmployeeBySuperssn($superssn);
		if(count($arrayResult) == 0){
			echo '<tr><td colspan="5">Tidak ada data!</td></tr>';			
		}else{	
			$no = 1;	
			foreach ($arrayResult as $dataEmployee) {							
				if($dataEmployee->photo != null)
					echo '<li><img class="images img-rounded" src="upload/'.$dataEmployee->photo.'" width="180" height="180">';
				else
					echo '<li><img class="images img-rounded" src="upload/default.png" width="180" height="180">';				
				
				echo'<center><a class="btn btn-info btn-sm" href="dashboardmanager.php?p=subordinate&ssn='.$dataEmployee->ssn.'">
				<span">'.$dataEmployee->fname.' '.$dataEmployee->minit.' '.$dataEmployee->lname.'</span></a></center>';
				echo '</li>';	
				
    		}
		}

?>
</ul>
</div>
</div>
</div>


