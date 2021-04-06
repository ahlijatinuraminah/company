<?php 
require_once('./class/class.Department.php'); 		
require_once('./class/class.Employee.php'); 		
$objDepartment = new Department(); 
$objEmp = new Employee();
$empList = $objEmp->SelectAllEmployee();

if(isset($_POST['btnSubmit'])){	
    $objDepartment->dnumber = $_POST['dnumber'];	 
	$objDepartment->dname = $_POST['dname'];	
    $objDepartment->mgr_start_date = $_POST['mgr_start_date'];
	$objDepartment->mgr->ssn = $_POST['mgr_ssn'];	 
				
	if(isset($_GET['dnumber'])){		
		$objDepartment->dnumber = $_GET['dnumber'];
		$objDepartment->UpdateDepartment();
	}
	else{	
		$objDepartment->AddDepartment();	
	}	
	
	echo "<script> alert('$objDepartment->message'); </script>";
	if($objDepartment->hasil){
		echo '<script> window.location = "dashboardadmin.php?p=departmentlist";</script>';
	}				
}
else if(isset($_GET['dnumber'])){	
	$objDepartment->dnumber = $_GET['dnumber'];	
	$objDepartment->SelectOneDepartment();

}
?>
<div class="container">  
<div class="col-md-6">			
  <h4 class="title"><span class="text"><strong>Department</strong></span></h4>
    <form action="" method="post">
	<table class="table" border="0">
	<tr>
	<td>Department Number</td>
	<td>:</td>
	<td><input type="text" class="form-control" name="dnumber" value="<?php echo $objDepartment->dnumber; ?>"></td>
	</tr>	
	<tr>
	<td>Department Name</td>
	<td>:</td>
	<td><input type="text" class="form-control" name="dname" value="<?php echo $objDepartment->dname; ?>"></td>
	</tr>	
	<tr>
	<td>Manager</td>
	<td>:</td>
	<td>
	   <select name="mgr_ssn" class="form-control">
	    <option value="">--Please select manager--</option>
		<?php		
			foreach ($empList as $emp){ 								
				if($objDepartment->mgr->ssn == $emp->ssn)				
					echo '<option selected="true" value='.$emp->ssn.'>'.$emp->fname.' '.$emp->minit.' '.$emp->lname.'</option>';
				else
					echo '<option value='.$emp->ssn.'>'.$emp->fname.' '.$emp->minit.' '.$emp->lname.'</option>';
			} 
		?>	
		</select>	
	</td>
	</tr>	
	<tr>
	<td>Manager Start Date</td>
	<td>:</td>
	<td><input type="date" class="form-control" name="mgr_start_date" value="<?php echo $objDepartment->mgr_start_date; ?>"></td>
	</tr>	
	
	<tr>
	<td colspan="2"></td>	
	<td><input type="submit" class="btn btn-success" value="Save" name="btnSubmit">
	    <a href="dashboardadmin.php?p=departmentlist" class="btn btn-warning">Cancel</a></td>
	</tr>	
	</table>    
</form>	
</div>  
</div>
</div>
<br>
	<?php 
	  if(isset($_GET['dnumber'])){	
		 include('deptlocationslist.php'); 		
	  }
	?>


