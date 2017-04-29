<?
	if($user_status > 0 ) {
?>
<center>
  <h2>Jabatan Saya Sampai Saat Ini : <strong>
    <? $jabatan=$db->dataku("jabatan", $user_session); echo $jabatan;
	if($jabatan=="Reguler"){
		$pesan="Anda Belum Menjadi Manager Untuk Jaringan Anda";
	} else {
		$pesan="Anda Sudah Berhak Mendapatkan Komisi 5% dari Setiap Uang yang Masuk Dari Front Line Anda";
	}
	echo "<br>";
	echo $pesan; 
	 ?>
  </strong></h2>
</center>
  <?
} else {
echo "<meta http-equiv=\"refresh\" content=\"1; url=illegal.html\">";
}
?>
