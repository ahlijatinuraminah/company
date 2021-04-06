<div class="container">  
<div class="col-md-12">			
  <h4 class="title"><span class="text"><strong>View Project by Employee</strong></span></h4>    
  <?php
	$essn = $_GET['ssn'];
	echo '<a class="btn btn-primary" href="dashboardmanager.php?p=workson&ssn='.$essn.'">Assign</a>';
  ?>
  
  <br><br>
 
<table class="table table-bordered">
<thead>
	<tr>	
	<th>Employee SSN</th>
	<th>Employee Name</th>
	<th>Project Number</th>
	<th>Project Name</th>
	<th>Project Location</th>
	<th>Department Name</th>	
	<th>Hours</th>	
	<th>Action</th>	
	</tr>	
	</thead>
	<tbody>
	<?php
		require_once('./class/class.WorksOn.php'); 		
		
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
					echo '<td><a class="btn btn-danger btn-sm"  href="dashboardmanager.php?p=deleteworkson&essn='.$dataWorksOn->essn.'&pno='.$dataWorksOn->pno.'">Remove from Project</a>
							  </td>';	
				echo '</tr>';				
				$no++;	
			}
		}
		?>
		</tbody>
</table>
<a href="dashboardmanager.php?p=assignproject" class="btn btn-warning">Back</a></td>
</div>
</div>


