<div class="container">  
<div class="col-md-10">			
  <h4 class="title"><span class="text"><strong>View Project Member</strong></span></h4>    
 
<table class="table table-bordered">
	<tr>	
	<th>Employee SSN</th>
	<th>Employee Name</th>	
	<th>Hours</th>	
	
	</tr>	
	<?php
		require_once('./class/class.WorksOn.php'); 		
		
		$objWorksOn = new WorksOn(); 
		$pnumber = $_GET['pnumber'];
		$arrayResult = $objWorksOn->SelectAllEmployeeByPnumber($pnumber);

		if(count($arrayResult) == 0){
			echo '<tr><td colspan="5">Tidak ada data!</td></tr>';			
		}else{	
			$no = 1;	
			foreach ($arrayResult as $dataWorksOn) {
				echo '<tr>';
				    echo '<td>'.$dataWorksOn->essn.'</td>';		
					echo '<td>'.$dataWorksOn->fname.' '.$dataWorksOn->minit.' '.$dataWorksOn->lname.'</td>';
					echo '<td>'.$dataWorksOn->hours.'</td>';						
				echo '</tr>';				
				$no++;	
			}
		}
		?>
</table>
<a href="dashboardadmin.php?p=projectlist" class="btn btn-warning">Back</a></td>
</div>
</div>


