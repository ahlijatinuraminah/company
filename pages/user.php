<?php 
require_once('./class/class.User.php'); 	
require_once('./class/class.Mail.php'); 		

$objUser = new User(); 

if(isset($_POST['btnSubmit'])){	
	$objUser->email = $_POST['email'];	
	$password = $_POST['password'];	
	$currentpassword = $_POST['currentpassword'];	
	$passworddefault = '12345678';
	
	if($password == ''){ //jika password dikosongkan
    	if(isset($_GET['userid'])) //jika sedang diedit, passwordnya adalah current password
			$password = $currentpassword; 
		else //jika sedang ditambah, password adalah password default
			$password = $passworddefault;		
	}
	$objUser->password = password_hash($password, PASSWORD_DEFAULT);	
	$objUser->role = $_POST['role'];
	$objUser->emp->ssn = $_POST['ssn'];
	
	if(isset($_GET['userid'])){		
		$objUser->userid = $_GET['userid'];
		$objUser->UpdateUser();
	}
	else{	
		$objUser->AddUser();
	}			
	echo "<script> alert('$objUser->message'); </script>";
	if($objUser->hasil){
		if(!isset($_GET['userid'])){ //jika user ditambahkan, maka kirim email
			$message =  file_get_contents('templateemail.html');  	
			$subject = "Anda ditambahkan sebagai user sistem Company 165";				 
			$header = "Anda ditambahkan sebagai user sistem Company 165";
			$body = '<span style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; color: #57697e;">
					Selamat <b>' .$objUser->name.'</b>, anda telah didaftarkan pada sistem company online ESQ Business School.<br>
					Berikut ini informasi account anda:<br>
					</span>
					<span style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; color: #57697e;">
						Username : '.$objUser->email.'<br>
						Password : '.$password.'
					</span>';
			$footer ='Silakan login untuk mengakses sistem';
										
			$message = str_replace("#header#",$header,$message);
			$message = str_replace("#body#",$body,$message);
			$message = str_replace("#footer#",$footer,$message);
			
			Mail::SendMail($objUser->email, $objUser->name, $subject, $message);	
		}
		echo '<script> window.location="dashboardadmin.php?p=userlist"; </script>';		
	}
}
else if(isset($_GET['userid'])){	
	$objUser->userid = $_GET['userid'];	
	$objUser->SelectOneUser();
	
}
$userList = $objUser->SelectAllUserByUserid($objUser->userid);
?>
<div class="container">  
<div class="col-md-6">			
  <h4 class="title"><span class="text"><strong>User</strong></span></h4>
    <form action="" method="post">
	<table class="table" border="0">
	<tr>
	<td>Employee Name</td>
	<td>:</td>
	<td>
	<select name="ssn" class="form-control" required>
	 <option value="">--Please select employee--</option>
		<?php		
		
			foreach ($userList as $user){ 								
				if($objUser->emp->ssn == $user->emp->ssn)				
					echo '<option selected="true" value='.$user->emp->ssn.'>'.$user->emp->fname.' '.$user->emp->minit.' '.$user->emp->lname.'</option>';
				else
					echo '<option value='.$user->emp->ssn.'>'.$user->emp->fname.' '.$user->emp->minit.' '.$user->emp->lname.'</option>';
			} 
		?>	
	</select>	
	</td>
	</tr>		
	<tr>
	<td>Email</td>
	<td>:</td>
	<td>
	<input type="text" class="form-control" id="email" name="email" value="<?php echo $objUser->email; ?>" required></td>
	</tr>	
	<tr>
	<td>Password</td>
	<td>:</td>
	<td>
	<input type="password" class="form-control" id="password" name="password">
	<input type="hidden" name="currentpassword" value="<?php echo $objUser->password; ?>">
	<span><i>Enter a new password or leave blank to keep current password</i> </span>
	</td>
	</tr>	
	<tr>
	<td>Role</td>
	<td>:</td>
	<td>
	<select name="role" class="form-control" required>
	<?php
	$arrayRole = Array("employee", "manager", "admin");
	foreach($arrayRole as $selectedRole)	{
		if($objUser->role == $selectedRole)
			echo '<option selected="true" value="'.$selectedRole.'">'.$selectedRole.'</option>';
		else
			echo '<option value="'.$selectedRole.'">'.$selectedRole.'</option>';
	}
	?>	
	</select>	
	</td>
	</tr>	
	<tr>
	<td></td>
	<td></td>
	<td><input type="submit" class="btn btn-success" value="Save" name="btnSubmit">
	    <a href="dashboardadmin.php?p=userlist" class="btn btn-danger">Cancel</a></td>
	</tr>	
	</table>    
</form>	
</div>  
</div>


