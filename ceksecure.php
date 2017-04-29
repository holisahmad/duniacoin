<?php
session_start();
require('php-captcha.inc.php');
include "geb_database.php";
include "geb_utama.php";
$db = new db_mysql($server_name, $userdb, $passdb, $databasename,"");



function anti_injection($data){
$filter = mysql_real_escape_string(stripslashes(htmlspecialchars($data,ENT_QUOTES)));
return $filter;
}
$userlogin = $_POST[userlogin];
$passlogin = anti_injection(md5($_POST[passlogin]));
if ( !ctype_alnum($passlogin )){

?>
<script>
	alert('Awass.... Dilarang Keras Injek!. ');
	window.location.href='index.php';
</script>

<?php
}else{

if( $_SESSION['php_captcha'] == $_POST['php_captcha'] && !empty($_SESSION['php_captcha'] ) ) {
unset($_SESSION['php_captcha']);


$db->select("username, pass, status, paket_daftar", "member", "username='$userlogin' and pass='$passlogin'");
if ($db->num_rows() > 0)
  {
	session_start();
	$_SESSION['user_session'] = $db->result(0, "username");
	$_SESSION['user_status'] = $db->result(0, "status");
	$_SESSION['paket_daftar'] = $db->result(0, "paket_daftar");
	
	$user_nama=$db->dataku (nama, $_SESSION['user_session'] );
	$user_hp=$db->dataku (hp, $_SESSION['user_session'] );
	
	session_write_close();
	header("Location: apps/");

//sms notifikasi 
	

$message="".$user_nama." anda Sedang Login di www.solutionprofit.com , terimakasih " ;
//$db->smsnotifikasi ($user_hp , $message) ;

	
  } else {
  
 ?>
<script>
	alert('Password anda Salah');
	window.location.href='index.php';
</script>
<?php

}
} else {
?>
<script>
	alert('Kode Chaptcha yang anda masukkan salah');
	window.location.href='index.php';
</script>
<?php

}
}
?>