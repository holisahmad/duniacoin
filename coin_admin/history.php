<h2 align="center"><img src="images/icon-48-article.png" width="48" height="48" align="absmiddle"> History</h2>

<?
if(!$tahun && !$bulan) {
	$tahun = $thn;
	$bulan = $bln;
}

$dtto = "$tahun-$bulan-31";
$dtfrom = "$tahun-$bulan-01";
$dtgl = "(tglbayar between '$dtfrom' and '$dtto')";
switch($page) {
	default :
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
	$numrows = $db->count_records("transfer", $dtgl);	
	$db->select("id, userid, tglbayar, rp", "transfer", $dtgl, "id desc", "", "", "$start, $limit");

?>
<h3 align="center">Catatan Transfer Komisi</h3>
<form action="" method="post" name="form1" id="form1">
  <table width="80%" border="0" align="center" cellpadding="2" cellspacing="0">
    <tr>
      <td width="8%">  Bulan </td>
      <td width="92%"><label>
        <? 
		//tglbl(); 
		$thn=substr($clientdate, 0, 4);
	$bln=substr($clientdate, 5, 2);
	$tgl=substr($clientdate, 8, 2);
	
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
	$jthn=10;
	for($t=2007;$t<=$thn;$t++) {
		$thn2 = $t;	
		if($thn == $thn2) {
			$pil="selected";
			} else {
			$pil="";
			}
		
		echo "<option value='$t' $pil>$thn2</option>";
	}
	echo "</select>";
		
		?>
        <input type="submit" name="Submit2" value="LIHAT HISTORY" class="tombol" />
      </label></td>
    </tr>
  </table>
</form>
<table width="100%" border="0" align="center" cellpadding="5" cellspacing="0">
  <tr class="tbl_header">
    <td width="6%" align="center">No.</td>
    <td width="25%" align="center">Tanggal Transfer</td>
    
    <td width="23%" align="center"> Transfer Di Tujukan Kepada </td>
    <td width="19%" align="center">Jumlah Uang </td>
  </tr>
  <?


$j=$db->num_rows();
for($i=0;$i<$j;$i++) {
	$nom = $i + 1 + $start;
	$lid = $i - 1;
	if(is_odd($i) == 0) {
		$class = "tblrow_ganjil";
	} else {
		$class = "tblrow_genap";
	} 	
	$username = $db->result($i, "userid");
	//$nama = $db->result($i, "nama");
	$bl0 = $bulan - 1;
	$jam = date("H:i:s");
	
	
	
?>
  <tr class="<?= $class; ?>">
    <td width="6%" align="center"><?= $nom; ?>    </td>
    <td width="25%" align="center"><?= date("d-m-Y", strtotime($db->result($i, "tglbayar"))); ?></td>
    
    <td align="center"><?= $username; ?></td>
    <td align="right"><?= rupiah($db->result($i, "rp")); ?></td>
  </tr>
  <?
	
	}
?>
</table>
<br />
<table width="80%" border="0" align="center" cellpadding="2" cellspacing="0">
  <tr>
    <td align="center">
     <?php

//}
//

$paging = ceil ($numrows / $limit);

// Display the navigation
if ($display > 1) {
	
	$previous = $display - 1;
	
?>
  <a href="?m=history&kat=<?= $kat; ?>&show=1" style="font-size:10px; color:#0000CC"><< Awal </a> | <a href="?m=history&kat=<?= $kat; ?>&show=<?= $previous; ?>" style="font-size:10px; color:#0000CC">< Sebelumnya </a> |
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
[ <a href="?m=history&kat=<?= $kat; ?>&show=<?= $i; ?>" style="font-size:10px; color:#0000CC">
<?= $i; ?>
</a> ]
<?php
		
		}
	
	}

}

if ($display < $paging) {

	$next = $display + 1;
	
?>
| <a href="?m=history&kat=<?= $kat; ?>&show=<?= $next; ?>" style="font-size:10px; color:#0000CC">Selanjutnya ></a> | <a href="?m=history&kat=<?= $kat; ?>&show=<?= $paging; ?>" style="font-size:10px; color:#0000CC">Terakhir >></a>
<?php

}
//
?>
    </td>
  </tr>
</table>
<?
	break;
	
	case komisi :
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
	$numrows = $db->count_records("komisi", $dtgl);	
	$db->select("id, username, jumlah, tglbayar, jenis, dari", "komisi", $dtgl, "id desc", "", "", "$start, $limit");

?>
<h3 align="center">Perolehan Komisi Member</h3>

<form action="" method="post" name="form1" id="form1">
  <table width="80%" border="0" align="center" cellpadding="2" cellspacing="0">
    <tr>
      <td width="8%">  Bulan </td>
      <td width="92%"><label>
        <? 
		//tglbl(); 
		$thn=substr($clientdate, 0, 4);
	$bln=substr($clientdate, 5, 2);
	$tgl=substr($clientdate, 8, 2);
	
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
	$jthn=10;
	for($t=2007;$t<=$thn;$t++) {
		$thn2 = $t;	
		if($thn == $thn2) {
			$pil="selected";
			} else {
			$pil="";
			}
		
		echo "<option value='$t' $pil>$thn2</option>";
	}
	echo "</select>";
		
		?>
        <input type="submit" name="Submit2" value="LIHAT HISTORY" class="tombol" />
      </label></td>
    </tr>
  </table>
</form>
<form action="?m=history&amp;page=konfirm" method="post"  name="komisi">
  <table width="100%" border="0" align="center" cellpadding="5" cellspacing="0">
  <tr class="tbl_header">
    <td width="5%" align="center">&nbsp;</td>
    <td width="5%" align="center">No.</td>
    <td width="18%" align="center">Username</td>
    <td width="11%" align="center">Tanggal </td>
    <td width="20%" align="center">Jenis Komisi</td>
    <td width="12%" align="center">Dari</td>
    <td width="13%" align="center">Jumlah Bayar </td>
    </tr>
  <?


$j=$db->num_rows();
for($i=0;$i<$j;$i++) {
	$nom = $i + 1 + $start;
	$lid = $i - 1;
	if(is_odd($i) == 0) {
		$class = "tblrow_ganjil";
	} else {
		$class = "tblrow_genap";
	} 	
	$username = $db->result($i, "username");
	//$nama = $db->result($i, "nama");
	$bl0 = $bulan - 1;
	$jam = date("H:i:s");
	
	
	
?>
  <tr class="<?= $class; ?>">
    <td width="5%" align="center">
      <input name="pilih[]" type="checkbox" id="pilih[]" value="<?= $db->result($i, "id"); ?>" />    </td>
    <td width="5%" align="center"><?= $nom; ?>    </td>
    <td width="18%" align="center"><?= $username; ?></td>
    <td width="11%" align="center"><?= date("d-m-Y", strtotime($db->result($i, "tglbayar"))); ?></td>
    <td  align="center"><?= $db->result($i, "jenis"); ?></td>
    <td align="center"><?= $db->result($i, "dari"); ?></td>
    <td align="right"><?= rupiah($db->result($i, "jumlah")); ?></td>
  </tr>
 
  <?
	
	}
?>
 <tr>
    <td colspan="4">
      <input name="submit2" type="submit" id="submit2" value="HAPUS YANG DIPILIH" class="tombol" />
  </td>
    <td  align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    </tr>
</table>
</form>
<br />
<table width="80%" border="0" align="center" cellpadding="2" cellspacing="0">
  <tr>
    <td align="center">
     <?php

//}
//

$paging = ceil ($numrows / $limit);

// Display the navigation
if ($display > 1) {
	
	$previous = $display - 1;
	
?>
  <a href="?m=history&page=komisi&show=1" style="font-size:10px; color:#0000CC"><< Awal </a> | <a href="?m=history&page=komisi&show=<?= $previous; ?>" style="font-size:10px; color:#0000CC">< Sebelumnya </a> |
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
[ <a href="?m=history&page=komisi&show=<?= $i; ?>" style="font-size:10px; color:#0000CC">
<?= $i; ?>
</a> ]
<?php
		
		}
	
	}

}

if ($display < $paging) {

	$next = $display + 1;
	
?>
| <a href="?m=history&page=komisi&show=<?= $next; ?>" style="font-size:10px; color:#0000CC">Selanjutnya ></a> | <a href="?m=history&page=komisi&show=<?= $paging; ?>" style="font-size:10px; color:#0000CC">Terakhir >></a>
<?php

}
//
?>
    </td>
  </tr>
</table>
<?
	break;
	
	case transaksi :
	?>
    <h3 align="center">Transaksi Member</h3>
<form action="" method="post" name="form1" id="form2">
  <table width="80%" border="0" align="center" cellpadding="2" cellspacing="0">
    <tr>
      <td width="8%"> Bulan </td>
      <td width="92%"><label>
        <? 
		//tglbl(); 
		$thn=substr($clientdate, 0, 4);
	$bln=substr($clientdate, 5, 2);
	$tgl=substr($clientdate, 8, 2);
	
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
	$jthn=10;
	for($t=2007;$t<=$thn;$t++) {
		$thn2 = $t;	
		if($thn == $thn2) {
			$pil="selected";
			} else {
			$pil="";
			}
		
		echo "<option value='$t' $pil>$thn2</option>";
	}
	echo "</select>";
		
		?>
        <input type="submit" name="Submit" value="LIHAT HISTORY" class="tombol" />
      </label></td>
    </tr>
  </table>
</form>
<table width="100%" border="0" align="center" cellpadding="5" cellspacing="0">
  <tr class="tbl_header">
    <td width="6%" align="center">No.</td>
    <td width="18%" align="center">Username</td>
    <td width="12%" align="center">Tanggal </td>
    <td width="33%" align="center">Nama Produk</td>
    <td width="14%" align="center">Password Download</td>
    <td width="17%" align="center">Password Expire</td>
  </tr>
  <?
$db->select("a.username, a.title, a.password, a.tgl, a.tglexpire, b.nama, b.harga", "download as a inner join product as b on a.title=b.id", "(a.tgl between '$dtfrom' and '$dtto')", "a.tgl desc");


$j=$db->num_rows();
//for($i=0;$i<$j;$i++) {
$nom = $i + 1 + $start;
while($row=$db->fetch_row()) {
	
	$lid = $i - 1;
	if(is_odd($nom) > 0) {
		$class = "tblrow_ganjil";
	} else {
		$class = "tblrow_genap";
	} 	
	$username = $row[0];
	//$nama = $db->result($i, "nama");
	$bl0 = $bulan - 1;
	$jam = date("H:i:s");
	
	
	
?>
  <tr class="<?= $class; ?>">
    <td width="6%" align="center"><?= $nom; ?>
    </td>
    <td width="18%" align="center"><a href="?m=member&page=addnew&amp;edit=1&amp;mid=<?= $username; ?>">
      <?= $username; ?></a></td>
    <td width="12%" align="center"><?= date("d-m-Y", strtotime($row[3])); ?></td>
    <td  align="center"><?= $row[5]; ?></td>
    <td align="center"><?= $row[2]; ?></td>
    <td align="center"><?= date("d-m-Y", strtotime($row[4])); ?></td>
  </tr>
  <?
	$nom++;
	}
?>
</table>
<p>&nbsp;</p>
<p>
  <? 
  break;
  
  case konfirm :
  	if( isset($_POST['submit'])) {
		$id[] = array();
  		for($i=0;$i<$j;$i++) {
			$db->delete("komisi", "id='$id[$i]'");
			echo "<meta http-equiv='refresh' content='0;URL=?m=history&page=komisi'>";
			//echo "$id[$i] id ";
		}
	} else {		
	?>
<form action="" method="post" enctype="?m=history&amp;page=konfirm" name="komisi" id="komisi">
      <table width="100%" border="0" align="center" cellpadding="5" cellspacing="0">
        <tr class="tbl_header">
          <td colspan="6" align="center">KONFIRMASI PENGHAPUSAN DATA </td>
        </tr>
        <tr>
          <td colspan="6" align="center" style="color:#FF0000"><strong>PERINGATAN! Menghapus data berikut akan berpengaruh pada perolehan komisi member dan juga saldo Admin.</strong> </td>
        </tr>
        <tr class="tbl_header">
         
          <td width="20%" align="center">Username</td>
          <td width="13%" align="center">Tanggal </td>
          <td width="28%" align="center">Jenis Komisi</td>
          <td width="16%" align="center">Dari</td>
          <td width="17%" align="center">Jumlah</td>
        </tr>
        <?


$j=count($pilih);
for($i=0;$i<$j;$i++) {
	$db->select("id, username, bayar, tglbayar, jenis, dari", "komisi", "id=$pilih[$i]");
	
	while($row=$db->fetch_row()) {
	
?>
        <tr>
          
          <td width="20%" align="center"><?= $row[1]; ?></td>
          <td width="13%" align="center"><?= date("d-m-Y", strtotime($row[3])); ?>
           
            <input name="id[]" type="hidden" id="id[]" value="<?= $row[0]; ?>" />
          </td>
          <td  align="center"><input name="j" type="hidden" id="j" value="<?= $j; ?>" />
          <?= $row[4]; ?></td>
          <td align="center"><?= $row[5]; ?></td>
          <td align="right"><?= rupiah($row[2]); ?></td>
        </tr>
        <?
		}
	
}
?>
        <tr>
          <td colspan="6" align="center"><input name="submit" type="submit" id="submit" value="HAPUS" class="tombol" />
          &nbsp;<input name="submit22" type="button" id="submit22" value="BATAL" class="tombol" onClick="javascript:history.go(-1)" /></td>
        </tr>
  </table>
</form>
	<p>&nbsp;</p>
	
	<?  
	}
	break;
}	
?>	
</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
