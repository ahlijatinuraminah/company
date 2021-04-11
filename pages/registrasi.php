<?php
require_once('./class/class.Mail.php'); 		

if(isset($_POST['btnSubmit'])){
	$email=$_POST["email"];	
	$password = $_POST['password'];
	$name=$_POST["name"];	
	
	$subject = "Informasi Registrasi";
	$message =  file_get_contents('templateemail.html');  					 
	$header = "Registrasi berhasil";
	$body = '<span style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; color: #57697e;">
			  Selamat <b>' .$name.'</b>, berhasil registrasi pada sistem kami.<br>
			  Berikut ini informasi account Anda:<br>
			 </span>
			 <span style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; color: #57697e;">
				Email : '.$email.'<br>
				Password : <b>'.$password.'<b>
			</span>';
	
	$footer ='Silakan login untuk mengakses sistem';
										
	$message = str_replace("#header#",$header, $message);
	$message = str_replace("#body#",$body, $message);
	$message = str_replace("#footer#",$footer, $message);					 									
	Mail::SendMail($email, $name, $subject, $message);	
	
	echo "Email berhasil dikirim";	
}
?>

<div class="container">  
<div class="col-md-6">			
  <h4 class="title"><span class="text"><strong>Registrasi</strong></span></h4>
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



