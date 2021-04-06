<div class="container">  
<div class="col-md-10">			
  <h4 class="title"><span class="text"><strong>View Assigned Project</strong></span></h4>    
<table class="table table-bordered">
	<tr>	
	
	<th>Employee SSN</th>
	<th>Employee Name</th>
	<th>Project Number</th>
	<th>Project Name</th>
	<th>Project Location</th>
	<th>Department Name</th>	
	<th>Hours</th>
	
	</tr>	
	<?php
		
		require_once('./class/class.WorksOn.php'); 		
		$essn = $_SESSION['ssn'];
		$objWorksOn = new WorksOn(); 
		$arrayResult = $objWorksOn->SelectAllProjectByEssn($essn);

		if(count($arrayResult) == 0){
			echo '<tr><td colspan="5">Tidak ada data!</td></tr>';			
		}else{	
			$no = 1;	
			foreach ($arrayResult as $dataWorksOn) {
				echo '<tr>';
				    echo '<td>'.$dataWorksOn->essn.'</td>';		
					echo '<td>'.$dataWorksOn->fname.' '.$dataWorksOn->minit.' '.$dataWorksOn->lname.'</td>';
					echo '<td>'.$dataWorksOn->pno.'</td>';	
					echo '<td>'.$dataWorksOn->pname.'</td>';
					echo '<td>'.$dataWorksOn->plocation.'</td>';
					echo '<td>'.$dataWorksOn->dname.'</td>';					
					echo '<td>'.$dataWorksOn->hours.'</td>';	
				echo '</tr>';				
				$no++;	
			}
		}
		?>
</table>

</div>
</div>

