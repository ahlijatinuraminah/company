<?php
require_once('./class/class.WorksOn.php'); 		

if(isset($_GET['pno']) && isset($_GET['essn']) ){	
	$objWorksOn = new WorksOn(); 
	$objWorksOn->pno = $_GET['pno'];	
	$objWorksOn->essn = $_GET['essn'];	
	$objWorksOn->DeleteWorksOn();
	echo "<script> alert('$objWorksOn->message'); </script>";
	echo '<script> window.location = "dashboardmanager.php?p=worksonlist&ssn='.$objWorksOn->essn .'";</script>';
}
else{		
//	echo '<script>window.history.back()</script>';	
}
?>

