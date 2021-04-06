<?php 
require_once('./class/class.Employee.php'); 		
$objEmployee = new Employee(); 
$managerList = $objEmployee->SelectAllManager();
$deptList = $objEmployee->SelectDepartment();

if(isset($_POST['btnSubmit'])){	
    $objEmployee->ssn = $_POST['ssn'];	 
	$objEmployee->fname = $_POST['fname'];	
	$objEmployee->minit = $_POST['minit'];	
	$objEmployee->lname = $_POST['lname'];	
	$objEmployee->bdate = $_POST['bdate'];	
    $objEmployee->address = $_POST['address'];
	$objEmployee->sex = $_POST['sex'];
	$objEmployee->salary = $_POST['salary'];
	$objEmployee->super_ssn = $_POST['super_ssn'];
	$objEmployee->dno = $_POST['dno'];
	$objEmployee->photo = $_POST['photo'];	 
	
	if(isset($_GET['ssn'])){		
		$objEmployee->ssn = $_GET['ssn'];
		$objEmployee->UpdateEmployee();
	}
	else{	
		$objEmployee->AddEmployee();
	}			
	
	echo "<script> alert('$objEmployee->message'); </script>";
	if($objEmployee->hasil){
		echo '<script> window.location = "dashboardadmin.php?p=employeelist";</script>';
	}
				
}
else if(isset($_GET['ssn'])){	
	$objEmployee->ssn = $_GET['ssn'];	
	$objEmployee->SelectOneEmployee();
}	
?>
<div class="container">  
<h4 class="title"><span class="text"><strong>Employee</strong></span></h4>  
    <form action="" method="post">
	<div class="row">
	<div class="col-md-2">		
	<?php
		if($objEmployee->photo != null)
			echo '<img class="img-rounded img-responsive" src="upload/'.$objEmployee->photo.'">';	
		else
			echo '<img class="img-rounded img-responsive" src="upload/default.png">';	
		?>
		<input type="hidden" name="photo" value="<?php echo $objEmployee->photo; ?>">
	</div>
	<div class="col-md-5">		
	<table class="table" border="0">
	<tr>
	<td>SSN</td>
	<td>:</td>
	<td><input type="text" class="form-control" name="ssn" value="<?php echo $objEmployee->ssn; ?>"></td>
	</tr>	
	<tr>
	<td>First Name</td>
	<td>:</td>
	<td><input type="text" class="form-control" name="fname" value="<?php echo $objEmployee->fname; ?>"></td>
	</tr>	
	<tr>
	<tr>
	<td>Minit</td>
	<td>:</td>
	<td><input type="text" class="form-control" name="minit" value="<?php echo $objEmployee->minit; ?>"></td>
	</tr>	
	<tr>
	<td>Last Name</td>
	<td>:</td>
	<td><input type="text" class="form-control" name="lname" value="<?php echo $objEmployee->lname; ?>"></td>
	</tr>
	<tr>
	<td>Birth Date</td>
	<td>:</td>
	<td><input type="date" class="form-control" name="bdate" value="<?php echo $objEmployee->bdate; ?>"></td>
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
	<textarea class="form-control" name="address" rows="2" cols="12"><?php echo $objEmployee->address; ?></textarea></td>
	</tr>	
	<tr>
	<td>Sex</td>
	<td>:</td>
	<td>
	<?php
	$gender = array("F"=>"Female", "M"=>"Male");
	foreach($gender as $key => $value) {	
		if($objEmployee->sex == $key)					
			echo '<label class="radio-inline"><input type="radio" name="sex" checked value="'.$key.'"> '.$value.'</label>';
		else
			echo '<label class="radio-inline"><input type="radio" name="sex" value="'.$key.'"> '.$value.'</label>';
	}	
	?>
	   
	</td>
	</tr>	
	<tr>
	<td>Salary</td>
	<td>:</td>
	<td><input type="number" class="form-control" name="salary" value="<?php echo $objEmployee->salary; ?>"></td>
	</tr>
	<tr>
	<tr>
	<td>Supervisor Name</td>
	<td>:</td>
	<td>
	 <select name="super_ssn" class="form-control">
	 <option value="">--Please select supervisor--</option>
		<?php		
			foreach ($managerList as $emp){ 								
				if($objEmployee->super_ssn == $emp->super_ssn)				
					echo '<option selected="true" value='.$emp->super_ssn.'>'.$emp->super_name.'</option>';
				else
					echo '<option value='.$emp->super_ssn.'>'.$emp->super_name.'</option>';
			} 
		?>	
	</select>	
	</tr>
	<tr>
	<td>Department</td>
	<td>:</td>
	<td>
	<select name="dno" class="form-control">
	 <option value="">--Please select department--</option>
		<?php		
			foreach ($deptList as $dept){ 								
				if($objEmployee->dno == $dept->dno)				
					echo '<option selected="true" value='.$dept->dno.'>'.$dept->dname.'</option>';
				else
					echo '<option value='.$dept->dno.'>'.$dept->dname.'</option>';
			} 
		?>	
		</select>
	</td>
	</tr>
	</table>    
	</div>
	<input type="submit" class="btn btn-success" value="Save" name="btnSubmit">
	<a href="dashboardadmin.php?p=employeelist" class="btn btn-warning">Cancel</a></td>
</form>	  
</div>
<br>
	<?php 
	  if(isset($_GET['ssn'])){	
		 include('dependentlist.php'); 		
	  }
	?>



