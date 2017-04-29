<?php
foreach ($_REQUEST AS $key => $value) { ${$key} = $value; }
include "geb_database.php";
include "geb_utama.php";
$db = new db_mysql($server_name, $userdb, $passdb, $databasename,"");

?>


<?php

$user= $_POST["user"];
$email= $_POST["email"];

if(!$user){ 

?>

<script>
	alert('Enter your username correctly');
	window.location.href='index.php';
</script>
<?php

   }
   else {
   $db->select("username, email", "member", "username='$user'");
    if($db->num_rows() == 0){ 
  
?>
 
<script>
	alert("You entered wrong username!");
	window.location.href='index.php';
</script>
<?php
   
  
    } else {
    
   
    
	
$hp= $db->dataku("hp",$user);
$nama= $db->dataku("nama",$user);
$domain=$db->config("domain");
srand((double)microtime()*10); 
$seed = rand(1000,9999); 
srand((double)microtime()*$seed); 
$pass1 = rand (444444,999999); 
$pass2 = rand (1111,8888);  
    
$pass=md5($pass1);

    //$db_password = ($random_password);
    
$db->update("member", "pass='$pass', pin='$pass2'", "username='$user'");	
$message= "".$nama.", Password baru anda : ".$pass1."  Token : ".$pass2." Terima Kasih.";

//$db->insert("outbox", "", "'', '$hp', '$sms'");
$db->smsnotifikasi($hp , $message) ;  
//$db->smsnotifikasi2($hp , $message) ;   
    
    
?>
 
<script>
	alert('Password succesfuly changed and was sent to your mobile phone');
	window.location.href='index.php';
</script>
<?php    
    
 }   
  }  
 
?>   