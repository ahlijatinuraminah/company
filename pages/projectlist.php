<div class="container">  
<div class="col-md-10">			
  <h4 class="title"><span class="text"><strong>Project List</strong></span></h4>
  <a class="btn btn-primary" href="dashboardadmin.php?p=project">Add</a>
  <br>
  <br>
<table class="table table-bordered">
<thead>
	<tr>	
	<th>Project Number</th>
	<th>Project Name</th>
	<th>Project Location</th>
	<th>Department Name</th>	
	<th>Action</th>	
	</tr>	
	</thead>
	<tbody>
	<?php
		require_once('./class/class.Project.php'); 		
		$objProject = new Project(); 
		$arrayResult = $objProject->SelectAllProject();

		if(count($arrayResult) == 0){
			echo '<tr><td colspan="5">Tidak ada data!</td></tr>';			
		}else{	
			$no = 1;	
			foreach ($arrayResult as $dataProject) {
				echo '<tr>';
					
					echo '<td>'.$dataProject->pnumber.'</td>';	
					echo '<td>'.$dataProject->pname.'</td>';
					echo '<td>'.$dataProject->plocation.'</td>';
					echo '<td>'.$dataProject->dept->dname.'</td>';
					echo '<td><a class="btn btn-warning btn-sm"  href="dashboardadmin.php?p=project&pnumber='.$dataProject->pnumber.'">Edit</a> |
							  <a class="btn btn-success btn-sm"  href="dashboardadmin.php?p=projectmember&pnumber='.$dataProject->pnumber.'">View Project Member</a> |
   					          <a class="btn btn-danger btn-sm"  href="dashboardadmin.php?p=deleteproject&pnumber='.$dataProject->pnumber.'" 
							  onclick="return confirm(\'Apakah anda yakin ingin menghapus?\')">Delete</a>
							  </td>';					
				echo '</tr>';				
				$no++;	
			}
		}
		?>
		</tbody>
</table>

<a class="btn btn-info" href="pages/report_projectlist.php">Download</a> 


</div>
</div>

