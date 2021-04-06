<?php
require_once('./class/class.User.php'); 		
require_once('./class/class.Mail.php'); 		

if(isset($_POST['btnSubmit'])){
	$inputemail=$_POST["email"];	
	$objUser = new User();
	$objUser->ValidateEmail($inputemail);		
	$objUser->hasil = false;
	if($objUser->hasil){			
		echo "<script>alert('Email sudah terdaftar'); </script>";			
	}
	else
	{	
		$objUser->email=$_POST["email"];
		$password = $_POST['password'];	
		$objUser->password = password_hash($password, PASSWORD_DEFAULT);		
		$objUser->name=$_POST["name"];
		$objUser->role ='employee';
		$objUser->AddUser();		
		
		if($objUser->hasil){			
			$message =  file_get_contents('templateemail.html');  					 
			$header = "Registrasi berhasil";
			$body = '<span style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; color: #57697e;">
					Selamat <b>' .$objUser->name.'</b>, anda telah terdaftar pada sistem company online ESQ Business School.<br>
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
					 						
			$objMail = new Mail();
			$objMail->SendMail($objUser->email, $objUser->name, 'Registrasi berhasil', $message);	
			echo "<script> alert('Registrasi berhasil'); </script>";
			echo '<script> window.location="index.php?p=login"; </script>'; 				
		}					
	}	
}
?>

<div class="container">  
<div class="col-md-6">			
  <h4 class="title"><span class="text"><strong>Register</strong></span></h4>
    <form action="" method="post">
	<table class="table" border="0">	
	<tr>
	<td>Email</td>
	<td>:</td>
	<td>
	<input type="email" name="email" id="email" class="form-control" maxlength="30" required>
	</tr>	
	<tr>
	<td>Password</td>
	<td>:</td>
	<td>
	<input type="password" name="password" id="password" class="form-control" maxlength="30" required>
	</tr>	
	<tr>
	<td>Nama</td>
	<td>:</td>
	<td><input type="text" class="form-control" id="name" name="name" maxlength="30" required></td>
	</tr>	
	<tr>
	<td></td>
	<td></td>
	<td><input type="submit" class="btn btn-primary" value="Register" name="btnSubmit">
	    <a href="index.php" class="btn btn-danger">Cancel</a></td>
	</tr>	
	</table>    
</form>	
</div>  
</div>



