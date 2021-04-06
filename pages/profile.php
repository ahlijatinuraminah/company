<?php
require_once('./class/class.Employee.php'); 		
	
$objEmployee = new Employee();
if(isset($_POST['btnUpdate'])){
		$objEmployee->ssn = $_POST['ssn'];	 
		$objEmployee->photo = $_POST['photo'];	 
		$isSuccessUpload = false;		
		
		if(file_exists($_FILES['photo']['tmp_name']) || is_uploaded_file($_FILES['photo']['tmp_name'])){			
			$lokasifile = $_FILES['photo']['tmp_name'];
			$nama_file =  $_FILES['photo']['name'];
			$extension  = pathinfo( $_FILES["photo"]["name"], PATHINFO_EXTENSION ); 
			$objEmployee->photo   = $objEmployee->ssn . '.' . $extension; 
			$folder = './upload/';
			$isSuccessUpload = move_uploaded_file($lokasifile, $folder.$objEmployee->photo);
		}
		else
			$isSuccessUpload = true;
		
		
		if($isSuccessUpload){	
			$objEmployee->userid=$_SESSION["userid"];			
			$objEmployee->fname = $_POST['fname'];	
			$objEmployee->minit = $_POST['minit'];	
			$objEmployee->lname = $_POST['lname'];	
			$objEmployee->bdate = $_POST['bdate'];	
			$objEmployee->address = $_POST['address'];
			$objEmployee->sex = $_POST['sex'];
			$objEmployee->salary = $_POST['salary'];
			$objEmployee->super_ssn = $_POST['super_ssn'];
			$objEmployee->dno = $_POST['dno'];	
			
			$objEmployee->UpdateEmployee();		
	
			echo "<script> alert('$objEmployee->message'); </script>";	
			echo '<script> window.location = "'.$_SERVER['REQUEST_URI'].'";</script>';
		}
}
else if(isset($_SESSION['ssn'])){	
	$objEmployee->ssn = $_SESSION['ssn'];	
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
			echo '<img class="img-rounded img-responsive" src="upload/'.$objEmployee->photo.'">';	
		else
			echo '<img class="img-rounded img-responsive" src="upload/default.png">';	
		?>
		<input type="hidden" name="photo" value="<?php echo $objEmployee->photo; ?>">
	<br>
	<span>Browse Picture</span>
	<input type="file" name="photo"></input>
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
	<input type="submit" class="btn btn-success" value="Update Profile" name="btnUpdate">	
</form>	  
</div>
<br>




