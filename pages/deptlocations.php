<?php 
require_once('./class/class.DeptLocations.php'); 		
$objDeptLocations = new DeptLocations(); 


if(isset($_POST['btnSubmit'])){	
    $objDeptLocations->dnumber = $_GET['dnumber'];	 
	$objDeptLocations->dlocation = $_POST['dlocation'];		
	
	if(isset($_GET['dnumber']) && isset($_GET['dlocation'])){	
		$objDeptLocations->dnumber = $_GET['dnumber'];
		$objDeptLocations->dlocation = $_GET['dlocation'];	
		$objDeptLocations->UpdateDeptLocations();
	}
	else{	
		$objDeptLocations->AddDeptLocations();
	}			
	
	echo "<script> alert('$objDeptLocations->message'); </script>";
	if($objDeptLocations->hasil){
		echo '<script> window.location = "dashboardadmin.php?p=department&dnumber='.$_GET['dnumber'].'";</script>';
	}
				
}
else if(isset($_GET['dnumber']) && isset($_GET['dlocation'])){	
	$objDeptLocations->dnumber = $_GET['dnumber'];	
	$objDeptLocations->dlocation = $_GET['dlocation'];	
	$objDeptLocations->SelectOneDeptLocations();
}	
?>
<div class="container">  
<h4 class="title"><span class="text"><strong>Dept Locations</strong></span></h4>  
    <form action="" method="post">
	<div class="col-md-6">		
	<table class="table" border="0">	
	<tr>
	<td>Location</td>
	<td>:</td>
	<td><input type="text" class="form-control" name="dlocation" value="<?php echo $objDeptLocations->dlocation; ?>"></td>
	</tr>			
	<td colspan="2"></td>	
	<td><input type="submit" class="btn btn-success" value="Save" name="btnSubmit">
	<?php
		echo '<a href="dashboardadmin.php?p=department&dnumber='.$_GET['dnumber'].'" class="btn btn-warning">Cancel</a></td>';
	?>
	    
	</tr>	
	</table>
	</div>	
</form>	  
</div>
<br>


