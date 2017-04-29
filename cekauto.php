<?php


include "geb_database.php";
include "geb_utama_coin.php";
$db= new db_mysql($server_name, $userdb, $passdb, $databasename,"");
include "plus_inc.php";





$qd="select * from member where status='1'order by id ASC ";
$rs=mysql_query($qd);
while ($rr=mysql_fetch_array($rs)) {


$username =$rr["username"];
$bank =$rr["bank"];
$an =$rr["an"];
$norek=$rr["norek"];
$nama=$rr["nama"];
 
	        
$totkom = $db->totalkomisi($username, "AND status=0") ;
$totalbayar = $db->bayarkomisi($username, "");
$saldo = $totkom - $totalbayar ;
$uraian = "transfer komisi untuk $username via bank";
$adm = 10 ;
//$pajak = $saldo * 5 /100 ;

$total = $saldo - $adm ;

$rp = $total * 1000 ;
$kode = kwitansi();

if ($total > 50) {
		
		
$db->insert("transfer", "", "'', '$username', '$clientdate', '$bank', '$an', '$norek', '$saldo', '$adm', '0','$rp', '1' , '0', '$uraian', '$kode'");

$db->insert("bayartoday", "", "'', '$username', '$clientdate', '$nama', '$bank', '$norek', '$an', '$saldo', '$adm', '0','$rp', '0'");

	
}
}


?>