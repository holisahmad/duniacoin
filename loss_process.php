<?php
session_start();
//require('php-captcha.inc.php');
include "geb_database.php";
include "geb_utama.php";
$db = new db_mysql($server_name, $userdb, $passdb, $databasename,"");
//include "plus_inc.php";


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
$datax=md5($pass1);
//$newtoken ="1234";
$newtoken=rand(1111, 9999);
$datay= md5($newtoken);

$pass=hash("sha512",$datax);
$tokenmd5=hash("sha512",$datay);
	
	    
$db->update("member", "pass='$pass', pin='$tokenmd5'", "username='$userlogin'");	
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
	alert('Username Tidak');
	window.location.href='index.php';
</script>
<?php

}
} 
?>