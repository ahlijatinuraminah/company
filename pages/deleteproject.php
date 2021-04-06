<?php
require_once('./class/class.Project.php'); 		

if(isset($_GET['pnumber'])){	
	$objProject = new Project(); 
	$objProject->pnumber = $_GET['pnumber'];	
	$objProject->DeleteProject();
	echo "<script> alert('$objProject->message'); </script>";
	echo "<script>window.location = 'dashboardadmin.php?p=projectlist'</script>";					
}
else{		
	echo '<script>window.history.back()</script>';	
}
?>

