<?php 
require_once('./class/class.WorksOn.php'); 		

$objWorksOn = new WorksOn(); 
$essn = $_GET['ssn'];
$projectList= $objWorksOn->SelectAllProjectNotWorkBySsn($essn);

if(isset($_POST['btnSubmit'])){	
    $objWorksOn->essn = $essn;	 	
	$objWorksOn->pno = $_POST['pno'];	 	
	$objWorksOn->hours = $_POST['hours'];	 	
	$objWorksOn->AddWorkson();			
	
	echo "<script> alert('$objWorksOn->message'); </script>";
	if($objWorksOn->hasil){
		echo '<script> window.location = "dashboardmanager.php?p=worksonlist&ssn='.$essn.'";</script>';
	}				
}
else if(isset($_GET['pno'])){	
	$objWorksOn->pno = $_GET['pno'];	
	$objWorksOn->SelectOneWorksOn();
}
?>
<div class="container">  
<div class="col-md-6">			
  <h4 class="title"><span class="text"><strong>Assign Project to Employee</strong></span></h4>
    <form action="" method="post">
	<table class="table" border="0">	
	<tr>
	<td>Project</td>
	<td>:</td>
	<td>
	   <select name="pno" class="form-control">
	   <option value="">--Please select project--</option>
		<?php		
			foreach ($projectList as $project){ 								
				if($objWorksOn->pno == $project->pnumber)				
					echo '<option selected="true" value='.$project->pnumber.'>'.$project->pname.'</option>';
				else
					echo '<option value='.$project->pnumber.'>'.$project->pname.'</option>';
			} 
		?>	
		</select>	
	</td>
	</tr>	
	<tr>
	<td>Hours</td>
	<td>:</td>
	<td><input type="number" class="form-control" name="hours" value="<?php echo $objWorksOn->hours; ?>"></td>
	</tr>	
	<tr>
	<td colspan="2"></td>	
	<td><input type="submit" class="btn btn-success" value="Save" name="btnSubmit">
	<?php
	   echo '<a href="dashboardmanager.php?p=worksonlist&ssn='.$essn.'" class="btn btn-warning">Cancel</a>';
	?>
	</td>
	</tr>	
	</table>    
</form>	
</div>  
</div>
</div>


