<?php
$essn = $objEmployee->ssn;
?>

<div class="container">  
<div class="col-md-8">			
  <h4 class="title"><span class="text"><strong>Dependent List</strong></span></h4>
  <?php
	echo '<a class="btn btn-primary" href="dashboardadmin.php?p=dependent&essn='.$essn.'">Add</a>';
  ?>
  
  <br>
  <br>
<table class="table table-bordered">
	<tr>
	<th>No.</th>	
	<th>Dependent Name</th>
	<th>Birth Date</th>	
	<th>Sex</th>	
	<th>Relationship</th>
	<th>Action</th>
	</tr>	
	<?php
		require_once('./class/class.Dependent.php'); 	
		
		$objDependent = new Dependent(); 		
		$arrayResult = $objDependent->SelectAllDependentByEssn($essn);

		if(count($arrayResult) == 0){
			echo '<tr><td colspan="6">Tidak ada data!</td></tr>';			
		}else{	
			$no = 1;	
			foreach ($arrayResult as $dataDependent) {
				echo '<tr>';
					echo '<td>'.$no.'</td>';						
					echo '<td>'.$dataDependent->dependent_name.'</td>';
					echo '<td>'.$dataDependent->bdate.'</td>';					
					echo '<td>'.$dataDependent->sex.'</td>';
					echo '<td>'.$dataDependent->relationship.'</td>';					
					echo '<td>
   					          <a class="btn btn-danger"  href="dashboardadmin.php?p=deletedependent&essn='.$dataDependent->essn.'&dependent_name='.$dataDependent->dependent_name.'" onclick="return confirm(\'Apakah anda yakin ingin menghapus?\')">Delete</a>
							  </td>';	
				echo '</tr>';				
				$no++;	
			}
		}
		?>
</table>

</div>
</div>

