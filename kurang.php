<?php


include "geb_database.php";
include "geb_utama_coin.php";
$db= new db_mysql($server_name, $userdb, $passdb, $databasename,"");
include "plus_inc.php";


 	function hapusjaringanbinary($username) {
			$upline = $db->dataku("upline", $username);
			$posisi = $db->dataupline("posisi", $username);
			$sql=mysql_query("select kiri, kanan from jaringan where username='$upline'");
			$data=mysql_fetch_row($sql);
			if($posisi == "KIRI") {
				$nk = $data[0] - 1 ;
				$pos = "kiri";
			} else {
				$nk = $data[1] - 1;
				$pos = "kanan";
			}
			$db->update("jaringan", "$pos='$nk'", "username='$upline'");		
		}


$user= "ASIH";


$db->hapusjaringanbinary($user);

for($i=0;$i<500;$i++) {
	
	$upli = $db->dataupline("upline$i", $user);
	$db->hapusjaringanbinary($upli);

}


?>