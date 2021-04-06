<?php 
require_once('./class/class.Dependent.php'); 		
$objDependent = new Dependent(); 


if(isset($_POST['btnSubmit'])){	
    $objDependent->essn = $_GET['essn'];	 
	$objDependent->dependent_name = $_POST['dependent_name'];		
	$objDependent->bdate = $_POST['bdate'];	
    $objDependent->relationship = $_POST['relationship'];
	$objDependent->sex = $_POST['sex'];
	
	if(isset($_GET['essn']) && isset($_GET['dependent_name'])){	
		$objDependent->essn = $_GET['essn'];
		$objDependent->dependent_name = $_GET['dependent_name'];	
		$objDependent->UpdateDependent();
	}
	else{	
		$objDependent->AddDependent();
	}			
	
	echo "<script> alert('$objDependent->message'); </script>";
	if($objDependent->hasil){
		echo '<script> window.location = "dashboardadmin.php?p=employee&ssn='.$_GET['essn'].'";</script>';
	}
				
}
else if(isset($_GET['essn']) && isset($_GET['dependent_name'])){	
	$objDependent->essn = $_GET['essn'];	
	$objDependent->dependent_name = $_GET['dependent_name'];	
	$objDependent->SelectOneDependent();
}	
?>
<div class="container">  
<h4 class="title"><span class="text"><strong>Dependent</strong></span></h4>  
    <form action="" method="post">
	<div class="col-md-6">		
	<table class="table" border="0">	
	<tr>
	<td>Dependent Name</td>
	<td>:</td>
	<td><input type="text" class="form-control" name="dependent_name" value="<?php echo $objDependent->dependent_name; ?>"></td>
	</tr>		
	<tr>
	<td>Birth Date</td>
	<td>:</td>
	<td><input type="date" class="form-control" name="bdate" value="<?php echo $objDependent->bdate; ?>"></td>
	</tr>				
	<tr>	
	<tr>
	<td>Sex</td>
	<td>:</td>
	<td>
	<?php
	$gender = array("F"=>"Female", "M"=>"Male");
	foreach($gender as $key => $value) {	
		if($objDependent->sex == $key)					
			echo '<label class="radio-inline"><input type="radio" name="sex" checked value="'.$key.'"> '.$value.'</label>';
		else
			echo '<label class="radio-inline"><input type="radio" name="sex" value="'.$key.'"> '.$value.'</label>';
	}	
	?>	   
	</td>
	</tr>	
	<tr>
	<td>Relationship</td>
	<td>:</td>
	<td><input type="text" class="form-control" name="relationship" value="<?php echo $objDependent->relationship; ?>"></td>
	</tr>
	<tr>
	<td colspan="2"></td>	
	<td><input type="submit" class="btn btn-success" value="Save" name="btnSubmit">
	<?php
		echo '<a href="dashboardadmin.php?p=employee&ssn='.$_GET['essn'].'" class="btn btn-warning">Cancel</a></td>';
	?>
	    
	</tr>	
	</table>
	</div>	
</form>	  
</div>
<br>


