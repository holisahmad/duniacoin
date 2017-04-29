<!doctype html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> 	<html lang="en"> <!--<![endif]-->
<head>

	<!-- General Metas -->
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">	<!-- Force Latest IE rendering engine -->
	
<title>DUNIACOIN | Komunitas Dunia Coin Indonesia</title> 
<link rel="shortcut icon" href="/duniacoin/image/favicon.ico">

<meta http-equiv="Content-Language" Content="id"/>
<meta name="robots" content="index, follow"/>
<meta name="keywords" content="komunitas duniacoin indonesia,"/>
<meta name="description" content="komunitas duniacoin indonesia"/>
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
	
	<!-- Stylesheets -->
	<link rel="stylesheet" href="login/css/base.css">
	<link rel="stylesheet" href="login/css/skeleton.css">
	<link rel="stylesheet" href="login/css/layout.css">
	
</head>
<body>

	
	<!-- Primary Page Layout -->

	<div class="container">
<br>
<center>
  <!--<img src="http://duniacoin.com/assets/img/bitcoinlogo2.png" width="200">-->
  <img src="/duniacoin/image/duniacoinlogo.png" width="200">
  
</center>
		<div class="form-bg">

			<form action="login_process.php" method="post">

<?
if(isset($_COOKIE["usNick"]) && isset($_COOKIE["usPass"]))
{
?>


<strong><a href="login.php" onclick="window.location.reload()"><center><br><br><br><br>Anda telah login, <br>Klik disini untuk ke Member Area. <br />
<br />
<a href="logout.php">Jika Anda telah login, klik disini utk keluar. </a></strong></center>

<?
exit();
}
?>


	
				<h2>Login</h2>
				<p><input type="text" name="userlogin" id="userlogin" placeholder="Username"></p>
				<p><input type="password" name="passlogin" id="passlogin" placeholder="Password"></p>
				
				
				<button type="submit"></button>
			<form>
		</div>

	
		<p class="forgot">Lupa Password / PIN? <a href="recover.php">Klik Disini.</a>

	</div><!-- container -->

	<!-- JS  -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.js"></script>
	<script>window.jQuery || document.write("<script src='js/jquery-1.5.1.min.js'>\x3C/script>")</script>
	<script src="js/app.js"></script>
	
<!-- End Document -->
</body>
</html>