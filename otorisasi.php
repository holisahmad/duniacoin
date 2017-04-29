<?php
include "geb_database.php";
include "geb_utama.php";
include "plus_inc.php";

$db = new db_mysql($server_name, $userdb, $passdb, $databasename,"");


 function randomPassword($length) {
$allow = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
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


$tgl2  = date('Y-m-d' );


// hapus order tiket yg status 0 lewat limite //


$qt="select * from order_aktivasi where status = 0 and limite < '$clientdate' order by id" ;
$rs=mysql_query($qt);

while ($fxx=mysql_fetch_array($rs)) {
$userxx=$fxx["username"];
$bank=$fxx["bank"];
$jenis=$fxx["jenis"];
$total=$fxx["total"];
$jumlah=$fxx["jumlah"];


$hpx  = $fxx["hp"];

$messagex="".$usery." Username anda kami Hapus Karna belum melakukan Aktivasi di www.solutionprofit.comTerimakasih " ;

//$db->smsnotifikasi ($hpx , $messagex) ;


//$db->delete("member", "username='$userxx'");//
//$db->delete("upline", "username='$userxx'");
//$db->delete("order_aktivasi", "username='$userxx'");

//echo $username ;

}


// cari order_aktivasi  yg statusnya Nol croscek ke mutasi //



$qtxa="select * from mutasi where type='CR' and date='$tgl2' order by id" ;
$rsxa=mysql_query($qtxa);
while ($fxtq=mysql_fetch_array($rsxa)) {
$id= $fxtq["id"];
$totalm= $fxtq["total"];
$bankm= $fxtq["bank"];

//echo $userxt ;

$qtx="select * from order_aktivasi where total='$totalm' and status='0' order by id" ;
$rsx=mysql_query($qtx);

while ($fxt=mysql_fetch_array($rsx)) {
$idxt= $fxt["id"];
$userxt = $fxt["username"];
$bankxt= $fxt["bank"];
$jenisxt = $fxt["jenis"];
$totalxt= $fxt["total"];
$jumlahxt= $fxt["jumlah"];
$namaxt= $fxt["nama"];
$hpx  = $fxx["hp"];


		if ($jenisxt == Paket ) {
		
		//aktivasi
		$db->aktivasi($userxt);
		$db->update("order_aktivasi", "status=1", "id='$idxt'");
		
		} else if ($jenisxt == TiketA ) {
		
		// cetak sn tiket 
$snpin = randomPassword(5);

for($i=0;$i<$jumlahxt;$i++) {
$db->insert("sn_card", "", "NULL, '$namaxt', '$hpx', '".$snpin."', '0', '$clientdate','$clientdate'");

$message= "".$namaxt." Berikut Pin Registrasi Anda ".$snpin." " ; 
$db->smsnotifikasi ($hpx, $message) ;

$db->update("order_aktivasi", "status=1", "id='$idxt'");

}
	
} else if ($jenisx == Re-invest ) {
		
		$db->aktivasi($userxt);
		$db->update("order_aktivasi", "status=1", "id='$idxt'");
		} 
		
		




}

}

$hpxk = "085760525722";

$messagex="Proses Mutasi " ;

//$db->smsnotifikasi ($hpxk , $messagex) ;

//echo $tgl2  ;

?>
