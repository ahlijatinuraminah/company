<?php
$dnumber = $objDepartment->dnumber;
?>

<div class="container">  
<div class="col-md-6">			
  <h4 class="title"><span class="text"><strong>Dept Locations</strong></span></h4>
  <?php
	echo '<a class="btn btn-primary" href="dashboardadmin.php?p=deptlocations&dnumber='.$dnumber.'">Add</a>';
  ?>
  
  <br>
  <br>
<table class="table table-bordered">
	<tr>
	<th>No.</th>	
	<th>Dept Location</th>
	<th>Action</th>
	</tr>	
	<?php
		require_once('./class/class.DeptLocations.php'); 	
		
		$objDeptLocations = new DeptLocations(); 		
		$arrayResult = $objDeptLocations->SelectAllDeptLocationsByDnumber($dnumber);

		if(count($arrayResult) == 0){
			echo '<tr><td colspan="6">Tidak ada data!</td></tr>';			
		}else{	
			$no = 1;	
			foreach ($arrayResult as $dataDeptLocations) {
				echo '<tr>';
					echo '<td>'.$no.'</td>';						
					echo '<td>'.$dataDeptLocations->dlocation.'</td>';
					echo '<td>
   					          <a class="btn btn-danger btn-sm"  href="dashboardadmin.php?p=deletedeptlocations&dnumber='.$dataDeptLocations->dnumber.'&dlocation='.$dataDeptLocations->dlocation.'" onclick="return confirm(\'Apakah anda yakin ingin menghapus?\')">Delete</a>
							  </td>';	
				echo '</tr>';				
				$no++;	
			}
		}
		?>
</table>

</div>
</div>

