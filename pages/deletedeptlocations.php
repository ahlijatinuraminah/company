<?php
require_once('./class/class.DeptLocations.php'); 		

if(isset($_GET['dnumber']) && isset($_GET['dlocation'])){	
	$objDeptLocations = new DeptLocations(); 
	$objDeptLocations->dnumber = $_GET['dnumber'];	
	$objDeptLocations->dlocation = $_GET['dlocation'];	
	$objDeptLocations->DeleteDeptLocations();
	echo "<script> alert('$objDeptLocations->message'); </script>";
	echo '<script> window.location = "dashboardadmin.php?p=department&dnumber='.$_GET['dnumber'].'";</script>';
}
else{		
	echo '<script>window.history.back()</script>';	
}
?>

