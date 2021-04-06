<?php
require_once('./class/class.Dependent.php'); 		

if(isset($_GET['essn']) && isset($_GET['dependent_name'])){	
	$objDependent = new Dependent(); 
	$objDependent->essn = $_GET['essn'];	
	$objDependent->dependent_name = $_GET['dependent_name'];	
	$objDependent->DeleteDependent();
	echo "<script> alert('$objDependent->message'); </script>";
	echo '<script> window.location = "dashboardadmin.php?p=employee&ssn='.$_GET['essn'].'";</script>';
}
else{		
	echo '<script>window.history.back()</script>';	
}
?>

