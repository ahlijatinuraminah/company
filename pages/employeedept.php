<div class="container">  
<div>			
  <h4 class="title"><span class="text"><strong>Employee in Department</strong></span></h4>    
<table class="table table-bordered">
	<tr>
	<th>No.</th>
	<th>SSN</th>
	<th>Name</th>
	<th>Birth Date</th>
	<th>Address</th>
	<th>Sex</th>
	<th>Salary</th>	
	<th>Department</th>
	<th>Action</th>
	
	</tr>	
	<?php
		require_once('./class/class.Employee.php'); 	
		$dnumber = $_GET['dnumber'];		
		$objEmployee = new Employee(); 
		$arrayResult = $objEmployee->SelectAllEmployeeInDepartment($dnumber);	

		if(count($arrayResult) == 0){
			echo '<tr><td colspan="5">Tidak ada data!</td></tr>';			
		}else{	
			$no = 1;	
			foreach ($arrayResult as $dataEmployee) {
				echo '<tr>';
					echo '<td>'.$no.'</td>';	
					echo '<td>'.$dataEmployee->ssn.'</td>';	
					echo '<td>'.$dataEmployee->fname.' '.$dataEmployee->minit.' '.$dataEmployee->lname.'</td>';
					echo '<td>'.$dataEmployee->bdate.'</td>';
					echo '<td>'.$dataEmployee->address.'</td>';
					echo '<td>'.$dataEmployee->sex.'</td>';
					echo '<td>'.$dataEmployee->salary.'</td>';					
					echo '<td>'.$dataEmployee->dname.'</td>';
					
					
				echo '</tr>';				
				$no++;	
			}
		}
		?>
</table>
<a href="dashboardadmin.php?p=departmentlist" class="btn btn-warning">Back</a></td>
</div>
</div>

