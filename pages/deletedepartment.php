<?php
require_once('./class/class.Department.php'); 		

if(isset($_GET['dnumber'])){	
	$objDepartment = new Department(); 
	$objDepartment->dnumber = $_GET['dnumber'];	
	$objDepartment->DeleteDepartment();
	echo "<script> alert('$objDepartment->message'); </script>";
	echo "<script>window.location = 'dashboardadmin.php?p=departmentlist'</script>";					
}
else{		
	echo '<script>window.history.back()</script>';	
}
?>

