<?php 
	if (!isset($_SESSION)) {
		session_start();
	}
	if(isset($_SESSION["role"])){		
		if($_SESSION["role"] == 'employee')
			echo '<script>window.location = "dashboardemployee.php";</script>';
		else if($_SESSION["role"] == 'manager')
			echo '<script>window.location = "dashboardmanager.php";</script>';
		else if($_SESSION["role"] == 'admin')
			echo '<script>window.location = "dashboardadmin.php";</script>';
	}	
 	require "inc.koneksi.php";		
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Company 165</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">		
	<link href="css/style.css" rel="stylesheet">	
	
</head>
<body>

<div class="example3">
  <nav class="navbar navbar-inverse navbar-static-top blue">
    <div class="container">      
      <div id="navbar3" class="navbar-collapse collapse">
	    <ul class="nav navbar-nav"> 
			<li><a href="index.php">Home</a></li>		
			<li><a href="index.php?p=login">Login</a></li>		  
			<li><a href="index.php?p=register">Register</a></li>			
        </ul>
      </div>      
    </div>    
  </nav>
</div>
	<div class="container">		
		<?php
				$pages_dir = 'pages';
				if(!empty($_GET['p'])){
					$pages = scandir($pages_dir, 0);
					unset($pages[0], $pages[1]);
					
					$p = $_GET['p'];
					if(in_array($p.'.php', $pages)){
						include($pages_dir.'/'.$p.'.php');
					} else {
						echo 'Halaman tidak ditemukan! :(';
					}
				} else {
					include($pages_dir.'/login.php');
				}
		?>
	</div>		
		<footer class="page-footer blue center-on-small-only col-md-6 container">       
            <div class="footer-copyright text-center rgba-black-light">                
                © 2020 Copyright: <a href="https://www.esqbs.ac.id"> ESQ Business School </a>                
            </div>
        </footer>	
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>		
</body>
</html>

