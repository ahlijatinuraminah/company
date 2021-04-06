<div class="container">  
<div class="col-md-12">			
  <h4 class="title"><span class="text"><strong>Department List</strong></span></h4>
  <a class="btn btn-primary" href="dashboardadmin.php?p=department">Add</a>
  <br>
  <br>
<table class="table table-bordered">
<thead>
	<tr>
	<th>No.</th>
	<th>Department Number</th>
	<th>Department Name</th>
	<th>Manager Name</th>
	<th>Manager Start Date</th>
	<th>Action</th>
	</tr>	
</thead>
<tbody>
	<?php
		require_once('./class/class.Department.php'); 		
		$objDepartment = new Department(); 		
		$arrayResult = $objDepartment->SelectAllDepartment();

		if(count($arrayResult) == 0){
			echo '<tr><td colspan="6">Tidak ada data!</td></tr>';			
		}else{	
			$no = 1;	
			foreach ($arrayResult as $dataDepartment) {
				echo '<tr>';
					echo '<td>'.$no.'</td>';	
					echo '<td>'.$dataDepartment->dnumber.'</td>';	
					echo '<td>'.$dataDepartment->dname.'</td>';
					echo '<td>'.$dataDepartment->mgr->fname.'</td>';
					echo '<td>'.$dataDepartment->mgr_start_date.'</td>';
					echo '<td width="30%"><a class="btn btn-warning btn-sm"  href="dashboardadmin.php?p=department&dnumber='.$dataDepartment->dnumber.'">Edit</a> |
							  <a class="btn btn-success btn-sm"  href="dashboardadmin.php?p=employeedept&dnumber='.$dataDepartment->dnumber.'">View Dept Member</a>
   					          <a class="btn btn-danger btn-sm"  href="dashboardadmin.php?p=deletedepartment&dnumber='.$dataDepartment->dnumber.'" 
							  onclick="return confirm(\'Apakah anda yakin ingin menghapus?\')">Delete</a>';							  
				echo '</tr>';
				
				$no++;	
			}
		}
		?>
		</tbody>
</table>

</div>
</div>


