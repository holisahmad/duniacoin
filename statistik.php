<?php 
error_reporting(0);
include"get_database.php";
$ip      = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
  $tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
  $waktu   = time(); // 
  $browser = getenv("HTTP_USER_AGENT");

  // Mencek berdasarkan IPnya, apakah user sudah pernah mengakses hari ini 
  $s = mysql_query("SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal'");
  // Kalau belum ada, simpan data user tersebut ke database
  if(mysql_num_rows($s) == 0){
    mysql_query("INSERT INTO statistik(ip, tanggal, hits, online) VALUES('$ip','$tanggal','1','$waktu')");
  } 
  else{
    mysql_query("UPDATE statistik SET hits=hits+1, online='$waktu' WHERE ip='$ip' AND tanggal='$tanggal'");
  }

  $pengunjung       = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE tanggal='$tanggal' GROUP BY ip"));
  $totalpengunjung  = mysql_result(mysql_query("SELECT COUNT(hits) FROM statistik"), 0); 
  $hits             = mysql_fetch_assoc(mysql_query("SELECT SUM(hits) as hitstoday FROM statistik WHERE tanggal='$tanggal' GROUP BY tanggal")); 
  $totalhits        = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0); 
  $tothitsgbr       = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0); 
  $bataswaktu       = time() - 300;
  $pengunjungonline = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE online > '$bataswaktu'"));

  $path = "counter/";
  $ext = ".png";

  $tothitsgbr = sprintf("%06d", $tothitsgbr);
  for ( $i = 0; $i <= 9; $i++ ){
	   $tothitsgbr = str_replace($i, "<img src='$path$i$ext' alt='$i'>", $tothitsgbr);
  }
session_start();
$browser = $_SERVER['HTTP_USER_AGENT'];
$sesi 	 = session_id();
$tanggal = date('Y-m-d');

$cek = mysql_query("select * from online where browser='$browser'");
$d = mysql_fetch_array($cek);
$jml = mysql_num_rows($cek);
$jumlah = $d['jumlah']+1;
if ($jml > 0) {
	
	$update = mysql_query("update online set  jumlah='$jumlah', online='$waktu' where browser='$sesi' AND tanggal='$tanggal'");

}else{
	$input = mysql_query("insert into online set browser='$browser',
													jumlah=1 ,
													sesi='$sesi',
													tanggal='$tanggal',
													online='$waktu'
													");	

}


$data = mysql_query("SELECT SUM(jumlah) as total FROM online WHERE tanggal='$tanggal'");
$j = mysql_fetch_array($data);


  echo "
  <table class='table table-responsive'>
  <thead>
  	<tr>
		<td colspan='2'><b><p align=center>$tothitsgbr </b></p></td>
	</tr>
</thead>
	<tr>
		<td align='left'><b><img src=counter/hariini.png class='img-responsive'>Visitor Today :</b></td>
		<td><b>$pengunjung</b></td>
	</tr>
	<tr>
		<td align='left'><b><img src=counter/total.png class='img-responsive'> Total pengunjung    :</b></td>
		<td><b>$totalpengunjung</b></td>
	</tr>
	<tr>
		<td align='left'><b><img src=counter/hariini.png class='img-responsive'> Hits hari ini    :</b></td>
		<td><b>$hits[hitstoday] </b></td>
	</tr>
	<tr>
		<td align='left'><b><img src=counter/total.png class='img-responsive'> Total Hits       :</b></td>
		<td><b>$totalhits</b></td>
	</tr>
	<tr>
		<td align='left'><b> <img src=counter/online.png class='img-responsive'>User Online:</b></td>
		<td><b>$j[total] </b></td>
	</tr>

</table>";
			?>