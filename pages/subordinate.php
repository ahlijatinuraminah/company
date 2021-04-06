<?php
require_once('./class/class.Employee.php'); 		
if(isset($_GET['ssn'])){	
	$objEmployee = new Employee();
	$objEmployee->ssn = $_GET['ssn'];	
	$objEmployee->SelectOneEmployee();
}	
?>
<div class="container">  
<h4 class="title"><span class="text"><strong>Profile</strong></span></h4>  
    <form action="" method="post" enctype="multipart/form-data">
	<div class="row">
	<div class="col-md-2">		
	<?php
		if($objEmployee->photo != null)
			echo '<img class="images img-rounded" src="upload/'.$objEmployee->photo.'" width="180" height="180">';	
		else
			echo '<img class="images img-rounded" src="upload/default.png" width="180" height="180">';	
		?>
		
	</div>
	<div class="col-md-5">		
	<table class="table" border="0">
	<tr>
	<td>SSN</td>
	<td>:</td>
	<td><input type="text" class="form-control" name="ssn" readonly value="<?php echo $objEmployee->ssn; ?>"></td>
	</tr>	
	<tr>
	<td>First Name</td>
	<td>:</td>
	<td><input type="text" class="form-control" name="fname" readonly value="<?php echo $objEmployee->fname; ?>"></td>
	</tr>	
	<tr>
	<tr>
	<td>Minit</td>
	<td>:</td>
	<td><input type="text" class="form-control" name="minit" readonly value="<?php echo $objEmployee->minit; ?>"></td>
	</tr>	
	<tr>
	<td>Last Name</td>
	<td>:</td>
	<td><input type="text" class="form-control" name="lname" readonly value="<?php echo $objEmployee->lname; ?>"></td>
	</tr>
	<tr>
	<td>Birth Date</td>
	<td>:</td>
	<td><input type="date" class="form-control" name="bdate" readonly value="<?php echo $objEmployee->bdate; ?>"></td>
	</tr>	
	</table>
	</div>
	<div class="col-md-5">			
	<table class="table" border="0">
	<tr>
	<tr>
	<td>Address</td>
	<td>:</td>
	<td>
	<textarea class="form-control" readonly name="address" rows="2"  cols="12"><?php echo $objEmployee->address; ?></textarea></td>
	</tr>	
	<tr>
	<td>Sex</td>
	<td>:</td>
	<td>
	<input type="text" class="form-control" name="sex" readonly value="<?php echo $objEmployee->sex; ?>">   
	</td>
	</tr>	
	<tr>
	<td>Salary</td>
	<td>:</td>
	<td><input type="number" class="form-control" readonly name="salary" value="<?php echo $objEmployee->salary; ?>"></td>
	</tr>
	<tr>
	<tr>
	<td>Supervisor Name</td>
	<td>:</td>
	<td>
	 <input type="text" class="form-control" readonly value="<?php echo $objEmployee->super_name; ?>">
	 <input type="hidden" name="super_ssn" value="<?php echo $objEmployee->super_ssn; ?>">
	</tr>
	<tr>
	<td>Department</td>
	<td>:</td>
	<td>
	<input type="text" class="form-control" readonly value="<?php echo $objEmployee->dname; ?>">
	<input type="hidden" name="dno" value="<?php echo $objEmployee->dno; ?>">
	</td>
	</tr>
	</table>    
	</div>
	
	</div>
	<a href="dashboardmanager.php?p=viewsubordinate" class="btn btn-warning">Back</a></td>
</form>	  
</div>
<br>




