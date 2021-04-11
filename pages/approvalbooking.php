<?php
require_once('./class/class.Mail.php'); 		

if(isset($_POST['btnSetuju']) || isset($_POST['btnTolak'])){
	$email=$_POST["email"];		
	$name=$_POST["name"];	
	$ruang=$_POST["ruang"];	
	$waktu=$_POST["waktu"];	
	$keperluan=$_POST["keperluan"];	
	
	$subject = "Persetujuan Booking Ruangan";					 
	$message =  file_get_contents('templateemail.html');  		
	
	
	if(isset($_POST['btnSetuju'])){				
		$header = "Booking Ruangan Disetujui";
		$body = '<span style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; color: #57697e;">
				  Selamat <b>' .$name.'</b>, booking Anda telah disetujui.<br>
				  Berikut ini informasi booking Anda:<br>
				 </span>
				 <span style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; color: #57697e;">
					Nama  : '.$name.'<br>
					Ruang : '.$ruang.'<br>
					Waktu : '.$waktu.'<br>
					Keperluan : '.$keperluan.'<br>
				</span>';
		$footer ='Silakan login untuk melihat history booking Anda';
				
	} else if(isset($_POST['btnTolak'])){	
		$header = "Booking Ruangan Ditolak";
		$body = '<span style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; color: #57697e;">
				  Mohon maaf <b>' .$name.'</b>, booking Anda ditolak.<br>
				  Berikut ini informasi booking Anda:<br>
				 </span>
				 <span style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; color: #57697e;">
					Nama  : '.$name.'<br>
					Ruang : '.$ruang.'<br>
					Waktu : '.$waktu.'<br>
					Keperluan : '.$keperluan.'<br>
				</span>';
		$footer ='Silakan booking ruangan lain yang available';
	}	
	
	
										
	$message = str_replace("#header#",$header, $message);
	$message = str_replace("#body#",$body, $message);
	$message = str_replace("#footer#",$footer, $message);					 									
	Mail::SendMail($email, $name, $subject, $message);	
	
	echo "Email berhasil dikirim";	
}
?>

<div class="container">  
<div class="col-md-6">			
  <h4 class="title"><span class="text"><strong>Persetujuan Booking Ruangan</strong></span></h4>
    <form action="" method="post">
	<table class="table" border="0">		
	<tr>
	<td>Nama</td><td>:</td>	
	<td><input type="text" name="name" class="form-control" value="Ahlijati Nuraminah"></td>
	</tr>	
	<tr>
	<td>Email</td><td>:</td>	
	<td><input type="text" name="email" class="form-control" value="ahlijati.nuraminah@esqbs.ac.id"></td>	
	</tr>	
	<tr>
	<td>Ruangan yang dibooking</td><td>:</td>
	<td><input type="text" name="ruang" class="form-control" value="R. Auditorium"></td>	
	</tr>	
	<tr>	
	<td>Waktu</td><td>:</td>
	<td><input type="text" name="waktu" class="form-control" value="Selasa, 21 April 2021. Jam 16.00-18.00"></td>	
	</tr>	
	<tr>
	<td>Keperluan</td><td>:</td>	
	<td><input type="text" name="keperluan" class="form-control" value="Seminar Hari Kartini"></td>	
	</tr>	
	<tr>
	<td></td>
	<td></td>
	<td><input type="submit" class="btn btn-primary" value="Setuju" name="btnSetuju">
	    <input type="submit" class="btn btn-danger" value="Tolak" name="btnTolak"></td>
	</tr>	
	</table>    
</form>	
</div>  
</div>




