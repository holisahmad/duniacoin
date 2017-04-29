<?php
$server_name ="localhost";
$userdb ="duniacoi_geb"; 
$passdb ="";
//*$passdb ="hartati241078";*//

$databasename = "duniacoi_geb";

date_default_timezone_set('Asia/Jakarta');

$clientdate = (date ("Y-m-d H:i:s"));
$thn=substr($clientdate, 0, 4);
$bln=substr($clientdate, 5, 2);
$tgl2=substr($clientdate, 8, 2);
$clientbrowser = getenv("HTTP_USER_AGENT");
$clientip = getenv("HTTP_CLIENT_IP");
$clienturl = getenv("HTTP_REFERER");



?>