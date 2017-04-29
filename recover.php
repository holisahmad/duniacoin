<?
session_start();


include "geb_database.php";
include "geb_utama_coin.php";
$db= new db_mysql($server_name, $userdb, $passdb, $databasename,"");
include "plus_inc.php";



?>
<!doctype html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> 	<html lang="en"> <!--<![endif]-->
<head>

	<!-- General Metas -->
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">	<!-- Force Latest IE rendering engine -->
	<title>Partisipan Area</title> 
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
<br>
<center>
 <img src="http://duniacoin.com/assets/img/bitcoinlogo2.png" width="200">
</center>a
	<div class="form-bg">

<form action="recover.php" method="post">
			
	
<?php

if($_POST)
{


function anti_injection($data){
$filter = mysql_real_escape_string(stripslashes(htmlspecialchars($data,ENT_QUOTES)));
return $filter;
}
//$userlogin = $_POST[username];
$userlogin = anti_injection($_POST[username]);



$datax= anti_injection(md5($_POST[password]));
$passlogin=hash("sha512",$datax);



if ( !ctype_alnum($userlogin )) {

?>
<script>
	alert('Gagal Riset');
	window.location.href='loss_pasword.php';
</script>

<?php
}else{



$db->select("username, pass, status, blokir, tgl_daftar", "member", "username='$userlogin'");
if ($db->num_rows() > 0)
  {
	
$hp= $db->dataku("hp",$userlogin);

$pass1=rand(222222, 888888);

$newtoken=rand(1111, 9999);

$pass=md5($pass1);
	
	    
$db->update("member", "pass='$pass', pin='$newtoken'", "username='$userlogin'");	
$message= "".$userlogin.", Password baru anda : ".$pass1."  Token : ".$newtoken." Terima Kasih.";

$db->smsnotifikasi ($hp , $message) ;   
    
?>
 
<script>
	alert('Password berhasil Riset  dan dikirim ke no HP');
	window.location.href='login.php';
</script>
<?php    	
	
  } else {
  
 ?>
<script>
	alert('Username Tidak ditemukan ');
	window.location.href='index.php';
</script>
<?php

}
} 

}

?>

		
			<h2>Lupa Password</h2>
				<p><input type="text" name="username" id="username" placeholder="Username Anda"></p>
				

				<button type="submit"></button>
			<form>
		</div>

	<p class="forgot">Login Member Area? <a href="login.php">Klik Disini.</a>

	
	</div><!-- container -->

	<!-- JS  -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.js"></script>
	<script>window.jQuery || document.write("<script src='js/jquery-1.5.1.min.js'>\x3C/script>")</script>
	<script src="js/app.js"></script>
	
<!-- End Document -->
</body>
</html>