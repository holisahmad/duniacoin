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
<h2 align="center"><img src="images/icon-48-article.png" width="48" height="48" align="absmiddle"> Saldo Admin </h2>
<?
switch($page) {
	default :
	//---tgl mbr pertama aktif--
	$db->select("tgl_daftar", "member", "status=1", "tgl_daftar asc");
	$data = $db->fetch_row();
	$dtfrom = $data[0];
	$dtto = date("Y-m-d H:i:s");
?>
<table width="90%" border="0" align="center" cellpadding="5" cellspacing="0">
				
				<tr>
				  <td><div class="ewalet">
				    <p><strong>Saldo Admin sampai dengan saat ini</strong>                    
				    : 
				    <p>Saldo admin : <span>
				    <? $adm = $db->saldoadmin("('$dtfrom')");
		             $ta = $db->count_records("member", "status=1");
		             $it= $ta * 5000; 
					 $bersihadm = $adm - $it ;
					?>
					
					<?= rupiah ( $bersihadm ) ; ?>
					
					
				    </span>
				    <p></div></td>
				
				
</table>
    </p>
    <table width="90%" border="0" align="center" cellpadding="3" cellspacing="0">
      <tr>
        <td colspan="8" align="center" style="padding:0"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding:0; margin:0">
            <tr>
              <td width="65%"><form action="" method="post" name="form1" id="form1" style="margin:0; padding:0">
              <label> History Transaksi Bulan : 
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



	$dtto = "$tahun-$bulan-31 23:59:59";



		



		?>
              </label>
              <input type="submit" name="Submit" value="LIHAT TRANSAKSI" class="tombol">
              </form></td>
              <td width="35%">Total Keuntungan Bulan ini : <strong>
              <?= rupiah($db->saldoadmin("(tgl between '$dtfrom' and '$dtto')")); ?></strong></td>
            </tr>
        </table></td>
      </tr>
      <tr class="tbl_header">
        <td width="4%" align="center">#</td>
        <td width="22%" align="center">Tanggal</td>
        <td width="52%" align="center">Uraian</td>
        <td width="22%" align="center">Jumlah</td>
      </tr>
      <?
	//---pagination----------------
$limit = '50'; // How many results should be shown at a time
$scroll = '0'; // Do you want the scroll function to be on (1 = YES, 2 = NO)
$scrollnumber = '50'; // How many elements to the record bar are shown at a time when the scroll function is on
//-------------pagination--------------
if (!isset ($_GET['show'])) {

	$display = 1;
	
} else {

	$display = $_GET['show'];
	
}
$start = (($display * $limit) - $limit);


//if($uidm == 001) {

//$db->select("*", "member", $kat);
	//$numrows = $db->count_records("member", "status=1 and (tglaktif between '$dtfrom' and '$dtto') and paket=1");	
	//$db->select("a.username, a.paket, a.adminrp, a.tglaktif, b.paket", "member as a inner join upline as b on a.username=b.username", "a.status=1 and (a.tglaktif between '$dtfrom' and '$dtto') and a.paket=1", "a.tglaktif desc", "", "", "$start, $limit");
	$numrows = $db->count_records("transaksi", "(tgl between '$dtfrom' and '$dtto')");
	$db->select("kode, username, jumlah, tgl, uraian, status", "transaksi", "(tgl between '$dtfrom' and '$dtto')", "tgl desc");
//$j=$db->num_rows();

$nom =1 + $start;
while($row = $db->fetch_row()) {

	//$user = $db->result($i, "a.userid");
	if(is_odd($nom) > 0) {
		$class = "tblrow_ganjil";
	} else {
		$class = "tblrow_genap";
	} 	
	if($row[5] > 0) {
		$rp = rupiah($row[2]);
	} else {
		$rp = "<span  style='color:#FF0000'>(".rupiah($row[2]).")";
	}	

?>
      <tr class="<?= $class; ?>">
        <td width="4%" align="center"><?= $nom; ?>        </td>
        <td width="22%"><?= date("d-m-Y H:i:s", strtotime( $row[3])); ?></td>
        <td><?= $row[4]; ?></td>
        <td align="right"><?= $rp; ?></td>
      </tr>
      <?
	$nom++;
	}
?>
</table>
<table width="90%" border="0" align="center" cellpadding="2" cellspacing="0"><tr><td align="center"><table width="100%" border="0" cellspacing="0" cellpadding="2">
      <tr>
        <td align="center"><?php

//}
//

$paging = ceil ($numrows / $limit);

// Display the navigation
if ($display > 1) {
	
	$previous = $display - 1;
	
?>
            <a href="?m=saldo&show=1" style="font-size:10px; color:#0000CC"><< Awal </a> | <a href="?m=saldo&show=<?= $previous; ?>" style="font-size:10px; color:#0000CC">< Sebelumnya </a> |
          <?php

}

if ($numrows != $limit) {
	
	if ($scroll == 1) {
	
		if ($paging > $scrollnumber) {
			
			$first = $display;
			
			$last = ($scrollnumber - 1) + $display;
			
		}
	
	} else {
	
		$first = 1;
			
		$last = $paging;
			
	}
	
	if ($last > $paging ) {
			
		$first = $paging - ($scrollnumber - 1);
			
		$last = $paging;
			
	}
	
	for ($i = $first;$i <= $last;$i++){
		
		if ($display == $i) {
			
?>
          [ <b>
            <?= $i ?>
            </b> ]
          <?php
			
		} else {
			
?>
          [ <a href="?m=saldo&show=<?= $i; ?>" style="font-size:10px; color:#0000CC">
            <?= $i; ?>
            </a> ]
          <?php
		
		}
	
	}

}

if ($display < $paging) {

	$next = $display + 1;
	
?>
          | <a href="?m=saldo&show=<?= $next; ?>" style="font-size:10px; color:#0000CC">Selanjutnya ></a> | <a href="?m=saldo&show=<?= $paging; ?>" style="font-size:10px; color:#0000CC">Terakhir >></a>
          <?php

}
//
?>        </td>
      </tr>
    </table></td>
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