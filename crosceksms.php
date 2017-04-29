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

$kodesms= anti_injection($_POST[kodesms]);
$hp = anti_injection($_POST[hp]);
if ( !ctype_alnum($kodesms) or !ctype_alnum($hp) ){

?>




<script>
	alert('Awass.... Dilarang Keras Injek!. ');
	window.location.href='index.php';
</script>

<?php


} else {


$db->select("username, pass, status, paket_daftar", "member", "pinbb='$kodesms' and pin='$hp'");
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
	
	
   } else {
  
 ?>
<script>
	alert('Kode atau Token yang anda masukkan salah');
	window.location.href='login.php';
</script>
<?php

}}

?>
  
  
  
  


