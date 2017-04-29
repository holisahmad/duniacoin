<?php
session_start();
include("captcha/simple-php-captcha.php");
include "geb_database.php";
include "geb_utama.php";
$db = new db_mysql($server_name, $userdb, $passdb, $databasename,"");

function randomsms($length) {
$allow = "123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
$i = 1;

while ($i <= $length) {

$max = strlen($allow)-1;

$num = rand(0, $max);

$temp = substr($allow, $num, 1);

$ret = $ret . $temp;

$i++;

}

return $ret;

}


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
	window.location.href='login2.php';
</script>

<?php
}else{

$db->select("username, pass, hp, status, paket_daftar", "member", "username='$userlogin' and pass='$passlogin'");
if ($db->num_rows() > 0)
  {
  
    
   	$hp= $db->result(0, "hp");
   	$username= $db->result(0, "username");
   
	 $rande = randomsms(6);
	
	 $db->update("member", "pinbb='$rande'", "username='$username'");
	 
   	 $message= "Kode Login Anda ".$rande." Terima Kasih.";

   	$db->smsnotifikasi($hp, $message) ;
   	 
   	 setcookie("allowedName", "$username", time()+86400,"/");
	 setcookie("allowedPhone", "$hp", time()+86400,"/");
  	
         header("location: aktivasisms.php");
        
       
        
        
  }  else {
  
  
  ?>
<script>
	alert('Password anda Salah');
	window.location.href='index.php';
</script>
<?php 
  
  
  }}
  
  
 
 ?>
 
 


