<div class="container">  
<div>			
  <h4 class="title"><span class="text"><strong>Employee List</strong></span></h4>
  <a class="btn btn-primary" href="dashboardadmin.php?p=employee">Add</a>
  <br>
  <br>
<table class="table table-bordered">
<thead>
	<tr>
	<th>No.</th>
	<th>Photo</th>
	<th>SSN</th>
	<th>Name</th>
	<th>Birth Date</th>
	<th>Address</th>
	<th>Sex</th>
	<th>Salary</th>
	<th>Manager</th>
	<th>Department</th>
	<th>Action</th>
	</tr>	
	</thead>
	<tbody>
	<?php
		require_once('./class/class.Employee.php'); 		
		$objEmployee = new Employee(); 
		$arrayResult = $objEmployee->SelectAllEmployee();
		

		if(count($arrayResult) == 0){
			echo '<tr><td colspan="5">Tidak ada data!</td></tr>';			
		}else{	
			$no = 1;	
			foreach ($arrayResult as $dataEmployee) {
				echo '<tr>';
					echo '<td>'.$no.'</td>';	
					if($dataEmployee->photo != null)
						echo '<td><img class="img-responsive" src="upload/'.$dataEmployee->photo.'" width="20" height="30"></td>';
					else
						echo '<td><img class="img-responsive" src="upload/default.png" width="20" height="30"></td>';				
				
					echo '<td>'.$dataEmployee->ssn.'</td>';	
					echo '<td>'.$dataEmployee->fname.' '.$dataEmployee->minit.' '.$dataEmployee->lname.'</td>';
					echo '<td>'.$dataEmployee->bdate.'</td>';
					echo '<td>'.$dataEmployee->address.'</td>';
					echo '<td>'.$dataEmployee->sex.'</td>';
					echo '<td>'.$dataEmployee->salary.'</td>';
					echo '<td>'.$dataEmployee->super_name.'</td>';
					echo '<td>'.$dataEmployee->dname.'</td>';
					echo '<td width="10%"><a class="btn btn-warning btn-sm"  href="dashboardadmin.php?p=employee&ssn='.$dataEmployee->ssn.'"><span class="glyphicon glyphicon-edit"></span></a>
   					          <a class="btn btn-danger btn-sm"  href="dashboardadmin.php?p=deleteemployee&ssn='.$dataEmployee->ssn.'" 
							  onclick="return confirm(\'Apakah anda yakin ingin menghapus?\')"> <span class="glyphicon glyphicon-remove"></span></a>
							  </td>';	
				echo '</tr>';				
				$no++;	
			}
		}
		?>
		</tbody>
</table>

</div>
</div>

