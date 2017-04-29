<?php


include "geb_database.php";
include "geb_utama_coin.php";
$db= new db_mysql($server_name, $userdb, $passdb, $databasename,"");
include "plus_inc.php";


	//$username = "DUNIACOIN";
	//$db->aktivasiduncoin($username);
	
	//echo formatgl($clientdate) ;

$qd="select * from member where status='1' and kunci='0' order by id asc";
$rs=mysql_query($qd);
while ($rr=mysql_fetch_array($rs)) {
$id=$rr["id"];
$username =$rr["username"];
$tglskr =$rr["tgl_daftar"];

$sponsor = $rr["sponsor"];
$paket_daftar = $rr["paket_daftar"];

$bank =$rr["bank"];
$an =$rr["an"];
$norek=$rr["norek"];
$nama=$rr["nama"];
 



if ($paket_daftar == Silver) {
$jlh_hari = 35 ;
$rp_paket = 1350000 ;
$saldo = 50000 ;
} else if  ($paket_daftar == Gold) {
$jlh_hari = 50 ;
$rp_paket = 6750000 ;
$saldo = 250000 ;

} else if  ($paket_daftar == Platinum) {
$jlh_hari = 50 ;
$rp_paket = 13500000 ;
$saldo = 500000 ;
} else if ($paket_daftar == Titanium) {
$jlh_hari = 60 ;
$rp_paket = 40500000 ;
$saldo = 1500000 ;
}


$kode = kwitansi2(); 

$date1 = $tglskr  ;

$date2 =  (date("Y-m-d"));

$selisih = IntervalDays ($date1, $date2 );


$hasil = $selisih / 10 ;

$uraian = "Pembayaran Roi Ke ".$hasil." Untuk Paket ".$paket_daftar." " ;

for($i=1;$i< 60;$i++)
{
if ($hasil == $i ) {

	
$db->insert("transferroi", "", "'', '$username', '$clientdate', '$bank', '$an', '$norek', '$saldo', '0', '0','$saldo', '1' , '0', '$uraian', '$kode'");

$db->insert("bayartodayroi", "", "'', '$username', '$clientdate', '$nama', '$bank', '$norek', '$an', '$saldo', '0', '0','$saldo', '$uraian', '0'");

$db->update("member", "jlh_hari=(jlh_hari-1)", "username='$username'");

}
}

}	


?>