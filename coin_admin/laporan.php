<?PHP

if(isset( $_SESSION['valid_admin']))

  {

?>

<script type="text/javascript">
<!--
function confirmation(noid) {
	var answer = confirm("Are You sure to delete this Article?")
	if (answer){
		//alert("Bye bye!")
		window.location = "?m=content&page=delete&no=" + noid;
		
	}
	
}
//-->
</script>
<h2 align="center"><img src="images/icon-48-article.png" width="48" height="48" align="absmiddle"> Laporan Keuangan </h2>
<?
switch($page) {
	default :
	//---tgl mbr pertama aktif--
	$db->select("tgl_daftar", "member", "status=1", "tgl_daftar asc");
	$data = $db->fetch_row();
	$dtfrom = $data[0];
	$dtto = date("Y-m-d ");
?>
<table width="90%" border="0" align="center" cellpadding="5" cellspacing="0">
				
				<tr>
				  
				</table>
    </p>
    <table width="90%" border="0" align="center" cellpadding="3" cellspacing="0">
      <tr>
        <td colspan="8" align="center" style="padding:0"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding:0; margin:0">
            <tr>
              <td width="65%"><form action="" method="post" name="form1" id="form1" style="margin:0; padding:0">
              <label> Laporan  Bulan : 
              <? 



		//tglbl(); 



		$thn=substr($clientdate, 0, 4);



	$bln=substr($clientdate, 5, 2);



	$tgl=substr($clientdate, 8, 2);



	if(!$bulan && !$tahun) {



		$bulan = $bln;



		$tahun = $thn;



	}	



		echo "<select name=bulan size=1 class=form>";



	$bulan0=array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");



	$jbln=count($bulan0);



	if($bulan =="") {



		$bulan2 = $bln;



	} else {



		$bulan2 = $bulan;



	}



	for($b=0;$b<$jbln;$b++) {



		if($bulan2-1 == $b) {



			$pil="selected";



			} else {



			$pil="";



			}



			if($b+1 < 10) {



			$k2=$b+1;



			$k="0$k2";



			} else {



				$k=$b+1;



			}



		echo "<option value=$k $pil>$bulan0[$b]</option>";



	}



	echo "</select>";



	echo "<select name=tahun size=1 class=form>";



//$bulan=array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");



	$jthn=15;



	for($t=8;$t<$jthn;$t++) {



		$thn2 = (2002 + $t);	



		if($tahun == $thn2) {



			$pil="selected";



			} else {



			$pil="";



			}



		



		echo "<option value='$thn2' $pil>$thn2</option>";



	}



	echo "</select>";



	$tgaktif = $db->dataku("tgl_daftar", $user_session); 



	//$dtfrom0 = $tgaktif; 



	//$dtto0 = "$tahun-$bl0-31 23:59:59";



	$dtfrom = "$tahun-$bulan-01 00:00:00";
	$dtfromx = "$tahun-$bulan-01";



	$dtto = "$tahun-$bulan-31 23:59:00";
	$dttox = "$tahun-$bulan-31";



		



		?>
              </label>
              <input type="submit" name="Submit" value="LIHAT TRANSAKSI" class="tombol">
              </form></td>
              <td width="35%">
            </tr>
        </table></td>
      </tr>
     <?php
	 
	 		  $db-> select("*", "member", "status='1' and paket='1' and (tgl_daftar between '$dtfrom' and '$dtto')");
			  $hemat = $db->num_rows();
			   
			   $db-> select("*", "member", "status='1' and paket='2' and (tgl_daftar between '$dtfrom' and '$dtto')");
			   $vip = $db->num_rows();
			   
			   $db-> select("*", "member", "status='1' and paket='3' and (tgl_daftar between '$dtfrom' and '$dtto')");
			   $vvip = $db->num_rows();
			   
			   $db-> select("*", "member", "status='1' and paket='4' and (tgl_daftar between '$dtfrom' and '$dtto')");
			   $supervvip = $db->num_rows();
			   
			   
			   
	 
	 ?>
     
</table>
<table width="90%" border="0" align="center" cellpadding="2" cellspacing="0"><tr>
  <td align="center"><p>&nbsp;</p>
    <table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#E7E5D9">
      <tr>
        <td bgcolor="#E7E5D9"><strong>RINGKASAN AKTIVASI </strong></td>
      </tr>
      <tr bgcolor="#FFFFFF">
        <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
            <tr>
              <td width="13%" align="center">1</td>
              <td width="63%">Aktivasi Paket Hemat </td>
              <td width="24%" align="right"><?= $hemat; ?>              </td>
            </tr>
            <tr>
              <td align="center">2</td>
              <td>Aktivasi Paket VIP </td>
              <td align="right"><?= $vip; ?>              </td>
            </tr>
            <tr>
              <td align="center">3</td>
              <td>Aktivasi Paket VVIP </td>
              <td align="right"><?= $vvip; ?></td>
            </tr>
			
			<tr>
              <td align="center">4</td>
              <td>Aktivasi Paket Super VVIP </td>
              <td align="right"><?= $supervvip ; ?>              </td>
            </tr>
			
            <tr>
              <td colspan="2" align="right" bgcolor="#E8E8E8"><strong> TOTAL BULAN INI (
                <?= $bulan0[$bulan-1]." $tahun"; ?>
                ) </strong> </td>
              <td align="right" bgcolor="#E8E8E8"><strong>
                <?
	
			$totalaktivasi = $hemat + $vip + $vvip + $supervvip ;
			$it = $totalaktivasi * 5000 ;
			echo $totalaktivasi; 
			
			?>
              </strong></td>
            </tr>
        </table></td>
      </tr>
    </table>
	
	
	<?php

	
$keluar=mysql_query("select * from automaintain where status=1 and (tanggal between '$dtfrom' and '$dtto') ") ;
$komi = 0;
while($row=mysql_fetch_row($keluar)) {
$komi = $komi + $row[3];
}

$ddg=mysql_query("select * from transfer where status=1 and (tglbayar between '$dtfrom' and '$dtto') ") ;
$komjar = 0;
while($rowg=mysql_fetch_row($ddg)) {
$komjar = $komjar + $rowg[6];
}



	?>
    <p>&nbsp;</p>
    <table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#E7E5D9">
      <tr>
        <td bgcolor="#E7E5D9"><strong>RINGKASAN PEMBAYARAN BONUS &amp; PAJAK </strong></td>
      </tr>
      <tr bgcolor="#FFFFFF">
        <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
            <tr>
              <td width="13%" align="center">1</td>
              <td width="63%">Total Bonus BSN </td>
              <td width="24%" align="right"><?= rupiah($komi); ?> </td>
            </tr>
            <tr>
              <td align="center">3</td>
              <td>Total Bonus </td>
              <td align="right">
                <?php
				
				
				echo rupiah ($komjar);
				
				?>				</td>
            </tr>
			<?php
	
$dd=mysql_query("select * from transfer where valid=1 and (tglbayar between '$dtfrom' and '$dtto') ") ;
$bonus = 0;
while($rowd=mysql_fetch_row($dd)) {
$bonus = $bonus + $rowd[6];
}

$ddx=mysql_query("select * from transfer  where  valid=0  and (tglbayar between '$dtfrom' and '$dtto') ") ;
$bonusbelum = 0;
while($rowe=mysql_fetch_row($ddx)) {
$bonusbelum = $bonusbelum + $rowe[6];
}	

$pjk=mysql_query("select * from transfer  where status=1 and (tglbayar between '$dtfrom' and '$dtto') ") ;
$pajak = 0;
while($rowf=mysql_fetch_row($pjk)) {
$pajak = $pajak + $rowf[8];
}	
			?>
			
			
			
			
			<tr>
              <td align="center">4</td>
              <td>Total Pajak</td>
              <td align="right"><?= rupiah ($pajak) ; ?></td>
            </tr>
			
			<tr>
              <td align="center">5</td>
              <td>Total Sisa PSN </td>
              <td align="right">
			
<?php			  
			  
$keluar=mysql_query("select * from automaintain where username='sisa' and (tanggal between '$dtfrom' and '$dtto') ") ;
$sisax = 0;
while($row=mysql_fetch_row($keluar)) {
$sisax = $sisax + $row[3];
}

echo rupiah($sisax);

?>			  </td>
            </tr>
			
		<tr>
              <td align="center">6</td>
              <td>Royalti IT </td>
              <td align="right"><?= rupiah ($it) ; ?></td>
            </tr>	
			
			<tr>
              <td align="center">7</td>
              <td>Bonus  Terbayar </td>
              <td align="right"><?= rupiah ($bonus) ; ?></td>
            </tr>
			
			<tr>
              <td align="center">8</td>
              <td>Bonus Belum Terbayar </td>
              <td align="right"><?= rupiah ($bonusbelum) ; ?></td>
            </tr>
			
            <tr>
              <td colspan="2" align="right" bgcolor="#E8E8E8"><strong> TOTAL BULAN INI (
                <?= $bulan0[$bulan-1]." $tahun"; ?>
                ) </strong> </td>
              <td align="right" bgcolor="#E8E8E8">&nbsp;</td>
            </tr>
        </table></td>
      </tr>
    </table>
    <p>&nbsp;</p>
   </tr>
</table>
    <p>&nbsp;    </p>
<?
 	break;
}
?>
<?
} else {
echo "<meta http-equiv=\"refresh\" content=\"1; url=illegal.html\">";
}
?>