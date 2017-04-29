<?PHP

if(isset( $_SESSION['valid_admin']))

  {

?>

<script type="text/javascript">
<!--
function confirmation(mid, page, action) {
	var answer = confirm("Proses Withdrawl tgl : " + mid )
	if (answer){
		//alert("Bye bye!")
		window.location = "?m=withdrawl";
		
	}
	
}
//-->
</script>
<h2 align="center"><img src="images/icon-48-user.png" width="48" height="48" align="absmiddle" /> Pembayaran Komisi </h2>

<?
switch($page) {
	default :
//---pagination----------------
$limit = '1500'; // How many results should be shown at a time
$scroll = '0'; // Do you want the scroll function to be on (1 = YES, 2 = NO)
$scrollnumber = '1500'; // How many elements to the record bar are shown at a time when the scroll function is on
//-------------pagination--------------
if (!isset ($_GET['show'])) {

	$display = 1;
	
} else {

	$display = $_GET['show'];
	
}
$start = (($display * $limit) - $limit);


//if($uidm == 001) {

//$db->select("*", "member", $kat);
$where = "a.status='$kat'";
if($mid) {
	$wherekom = "userid='$mid'";
}	
if($kat == "") {
	//$numrows = $db->count_records("transfer", "");
	$db->select("a.id, a.userid, a.tglbayar, a.bank, a.an, a.norek, a.bonus, . a.adm, a.pajak, a.rp, a.status, a.valid, a.tujuan, b.nama", "transfer as a inner join member as b on a.userid=b.username", $wherekom, "a.id DESC", "", "", "$start, $limit");

} else {
	//$numrows = $db->count_records("transfer", $where);	
	$db->select("a.id, a.userid, a.tglbayar, a.bank, a.an, a.norek, a.bonus, . a.adm, a.pajak, a.rp, a.status, a.valid, a.tujuan, b.nama", "transfer as a inner join member as b on a.userid=b.username", $where, "a.id DESC", "", "", "$start, $limit");

}
$sel = "selected";
?>

<table width="95%" border="0" align="center" cellpadding="5" cellspacing="0">
  <tr>
    <td colspan="11" align="center" style="padding:0"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding:0; margin:0">
      <tr>
        <td width="100%"><form action="" method="post" name="form1" id="form1" style="margin:0; padding:0">
          <label> Status Withdrawl :
            <select name="select" onchange="location =  this.options[this.selectedIndex].value" class="form">
            <option value="?m=withdrawl" selected="selected" <? echo $pilih; ?>>Semua</option>
            <option value="?m=withdrawl&amp;kat=0&amp;sel2=<?= $sel; ?>" <? echo $sel2; ?>>Pending</option>
            <option value="?m=withdrawl&amp;kat=1&amp;sel3=<?= $sel; ?>" <? echo $sel3; ?>>Done</option>
          </select>
          </label>
          &nbsp;&nbsp;
        </form></td>
        <td width="0%">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr class="tbl_header">
    <td width="4%" align="center">#</td>
    <td width="8%" align="center">Tanggal</td>
    <td width="9%" align="center">ID Member </td>
    <td width="9%" align="center">Nama</td>
    <td width="9%" align="center">Data Rekening </td>
    
    <td width="8%" align="center">Bonus </td>
	<td width="8%" align="center">Adm</td>
    
    <td width="9%" align="center">Total </td>
    <td width="8%" align="center">Status</td>
	<td width="8%" align="center">Proses Transfer</td>
  </tr>
<?

$j=$db->num_rows();
$nom =1 + $start;
//while($row = $db->fetch_row()) {
for($i=0;$i<$j;$i++) {
	$user = $db->result($i, "a.userid");
	if(is_odd($i) > 0) {
		$class = "tblrow_ganjil";
	} else {
		$class = "tblrow_genap";
	} 	
	if( $db->result($i, "status") > 0) {
		$aktif = "<a href='#' onclick=\"confirmation('". $db->result($i, "tglbayar")."', 'activation', 'Disable')\" style='cursor:hand'>DONE</a>";
	} else {
		$aktif = "<form name='form3' method='post' action='?m=withdrawl&page=proses&tombol=konfirm'>"
				."<input name='uid' type='hidden' id='uid' value='".$db->result($i, "id")."' size='25' />"
				."<input name='mid' type='hidden' id='mid' value='".$db->result($i, "userid")."' size='25' />"
				."<input name='w' type='hidden' id='w' value='1' size='25' />"
				."<input name='tujuan' type='hidden' id='tujuan' value='".$db->result($i, "tujuan")."' size='25' />"
				."<input name='jumlah' type='hidden' id='jumlah' value='".$db->result($i, "rp")."' size='25' />"
				."<input type='submit' name='button' id='button' value='PROSES' /></form>";
	}
	
	if( $db->result($i, "valid") > 0) {
		$aktif2 = "<a href='#' style='cursor:hand'>Sukses </a>" ;
		} else {
		$aktif2 = "<a href='#' style='cursor:hand'>Wait</a>" ;
			
			
			
		}
		
$tglbayar = $db->result($i, "tglbayar");	

?>
 
  <tr class="<?= $class; ?>">
    <td><?= $nom; ?> </td>
    <td><?= date("d-m-Y", strtotime( $tglbayar)); ?></td>
    <td><a href=""><?=  $user; ?></a></td>
    <td><?= $db->result($i, "nama"); ?></td>
    <td><?= $db->result($i, "bank"); ?>-<?= $db->result($i, "norek"); ?>-<?= $db->result($i, "an"); ?></td>
    
   
    <td align="right">
      <div align="right">
        <?= rupiah($db->result($i, "bonus")); ?>
    </div></td>
    <td align="right"><?= rupiah($db->result($i, "adm")); ?></td>
	
    <td align="right"><?= rupiah2($db->result($i, "rp")); ?></td>
    <td align="center"><?= $aktif; ?></td>
	<td align="center"><?= $aktif2; ?></td>
  </tr>
<?
	$nom++;
	}
?>	  
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="2">
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
  <a href="?m=withdrawl&kat=<?= $kat; ?>&show=1" style="font-size:10px; color:#0000CC"><< Awal </a> | <a href="?m=withdrawl&kat=<?= $kat; ?>&show=<?= $previous; ?>" style="font-size:10px; color:#0000CC">< Sebelumnya </a> |
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
[ <a href="?m=withdrawl&kat=<?= $kat; ?>&show=<?= $i; ?>" style="font-size:10px; color:#0000CC">
<?= $i; ?>
</a> ]
<?php
		
		}
	
	}

}

if ($display < $paging) {

	$next = $display + 1;
	
?>
| <a href="?m=withdrawl&kat=<?= $kat; ?>&show=<?= $next; ?>" style="font-size:10px; color:#0000CC">Selanjutnya ></a> | <a href="?m=withdrawl&kat=<?= $kat; ?>&show=<?= $paging; ?>" style="font-size:10px; color:#0000CC">Terakhir >></a>
<?php

}
//
?>
    </td>
  </tr>
</table>
<?
	break;
	
	case proses :
?>
<h3>Proses Transfer Komisi</h3>
<? 
	//menghitung saldo auto
	$masuk=mysql_query("select * from automaintain where username='$mid' and status=0 order by id");
	$autoin = 0;
	while($row=mysql_fetch_row($masuk)) {
	$autoin = $autoin + $row[2];
	}
	
	$keluar=mysql_query("select * from automaintain where username='$mid' and status=1 order by id");
	$autoout = 0;
	while($row=mysql_fetch_row($keluar)) {
		$autoout = $autoout + $row[2];
	}
	
	$setauto=$db->config("setauto");
	
	$myauto=$autoout;
	$kekuranganauto=$setauto-$myauto;
	
	$autopersen=$db->config("automaintain");
	$bytrf=$db->config("adm");
	$bytrfok=$bytrf;
	
	$hasilauto=$jumlah*$autopersen/100;
	   if($hasilauto<$kekuranganauto){
	   $nilaiauto=$hasilauto;
	   } else {
	   $nilaiauto=$kekuranganauto;
	   }
	   
	 $jmltransfer=($jumlah-$nilaiauto-$bytrfok);
	
	
	?>
<?
if($tombol == "proses") {
	$kode = kwitansi();
	$tgbyr = date("Y-m-d", strtotime($theDate2));
	$time = (date("H:i:s"));
	$uraian = "transfer komisi untuk $mid via $tujuan";
	$adm=5000;
	$jmltrf=$jmltransfer;
	if($w == 0) {
			$db->insert("transfer", "", "'', '$mid', '$tgbyr $time', '$tgbyr $time', '$jumlah', $adm, '$nilaiauto', $jmltrf, 1, 0,'$tujuan', '$kode'");
			//----input ke data transaksi---
		if($tujuan == "bank") {	
		$db->insert("automaintain", "", "'', '$mid', '$nilaiauto', '$clientdate', '0', '1'");
		$db->insert("transaksi", "", "'', '$kode', '$mid', '$jumlah', '$clientdate', '$uraian', 0");
	
	$keluarx=mysql_query("select * from automaintain where username='$mid' and status=1 order by id");
	$autooutx = 0;
	while($row=mysql_fetch_row($keluarx)) {
		$autoouxt = $autooutx + $row[2];
	}		
	$setauto=$db->config("setauto");
	
	if( $autooutx == $setauto ) {
	$db->aktivasiro("$mid");
	$db->update("automaintain", "status=0", "username='$mid'");
	$db->insert("history_cardro", "", "'', '$mid', '1', 'Aktivasi Tiket RO Dari Automantent', '$clientdate'");
	}
		}
		
		$bank=$db->dataku("bank", $mid);
		$norek=$db->dataku("norek", $mid);
		$an=$db->dataku("an", $mid);
		$nama=$db->dataku("nama", $mid);

		
		$norek=$db->dataku("norek", $mid);
		$nama=$db->dataku("nama", $mid);
		$bank=$db->dataku("bank", $mid);
		$an=$db->dataku("an", $mid);
		$sql = mysql_query("select bayar, adm, automaintain from bayartoday where norek='$norek'");
		$dta = mysql_fetch_row($sql);
		$bayar0 = $dta[0];
		$adm0 = $dta[1];
		$jmlauto0 = $dta[2];
		if($bayar0>0){
		$jumlah1=$bayar0+$jmltrf;
		$adm1=5000+$adm0;
		$jmlauto=$jmlauto0+$nilaiauto;
		$db->update("bayartoday", "bayar='$jumlah1', adm='$adm1', automaintain='$jmlauto'", "norek='$norek'");
		} else {
		
		$admbank=5000;
		$jumlahe=$jmltrf;
		$db->insert("bayartoday", "", "'', '$mid', '$nama', '$bank', '$norek', '$an', '$nilaiauto', '$admbank', '$jumlahe',  '$clientdate', 1, 0");
		}
		
	} else {
		$db->update("transfer", "status=1, tglbayar='$tgbyr $time', kode='$kode'", "id='$uid'");
		
		}
		
	
				
?>
<div id="notice"><img src="images/notice-info.png" width="29" height="29" align="absmiddle" />Withdrawl member telah berhasil dicatat ke dalam database! </div>
    <p align="center"><a href="?m=withdrawl">Kembali ke daftar Withdrawl</a></p>

<?
	
	//echo $tgbyr;
	
}

if($tombol == "konfirm") {
	$sql=mysql_query("select tglbayar from komisi where username='$mid' order by tglbayar asc");
	$dt = mysql_fetch_row($sql);
	$tgaktif = $dt[0];	
	$dtfrom2 = $tgaktif;
	$dtto = date("Y-m-d H:i:s");
	$total0 = $db->totalkomisi( $mid, "and status=0");
	$widrl = $db->bayarkomisi($mid, "");
	$tarik = $total0 - $widrl;
?>    

<form id="form3" name="form2" method="post" action="?m=withdrawl&amp;page=proses">
  <table width="80%" border="0" align="center" cellpadding="3" cellspacing="0">
    <tr class="tbl_header">
      <td colspan="2" align="center">KONFIRMASI TRANSFER KOMISI</td>
    </tr>
    <tr>
      <td width="46%" align="right">ID Member:</td>
      <td width="54%"><strong>
        <?= $mid; ?>
      </strong></td>
    </tr>
    <tr>
      <td align="right">Nama member :</td>
      <td><strong>
        <?= $db->dataku("nama", $mid); ?>
      </strong></td>
    </tr>
    <tr>
      <td align="right" valign="top">Ditransfer ke :</td>
      <td><?= $db->dataku("bank", $mid); ?>
        -
          <?= $db->dataku("norek", $mid); ?>
        -
        <?= $db->dataku("an", $mid); ?>
          <input name="tujuan" type="hidden" id="tujuan" value="<?= $tujuan; ?>" size="10" /></td>
    </tr>
    <tr>
      <td align="right">Jumlah Bonus :</td>
      <td><?
	//  echo $tarik;
		if($jumlah > $tarik) {
			$jml = "<span  style='color:#FF0000'><b>Komisi yang ditransfer melebihi jumlah komisi yang diperoleh</b></span>";
			$dis = "disabled";
		} else {	
			$jml = rupiah($jumlah); 
		}	
	  echo $jml;
	  	
	  ?>
          <label>
          <input name="jumlah" type="hidden" id="jumlah" value="<?= $jumlah; ?>" size="10" />
          <input name="uid" type="hidden" id="uid" value="<?= $uid; ?>" size="10" />
          <input name="tombol" type="hidden" id="tombol" value="proses" size="10" />
          <input name="w" type="hidden" id="w" value="<?= $w; ?>" size="10" />
          <input name="mid" type="hidden" id="mid" value="<?= $mid; ?>" size="10" />
        </label></td>
    </tr>
    <tr>
      <td align="right">Saldo Automaintain Saat ini  :</td>
      <td><label>
        <?
	  echo rupiah($myauto);
	  ?>
      </label></td>
    </tr>
    <tr>
      <td align="right">Kekuranan Saldo Untuk Automaintain  :</td>
      <td><label>
        <?
	  
	  echo 	rupiah($kekuranganauto);
	  ?>
      </label></td>
    </tr>
    <tr>
      <td align="right"> Potongan Automaintain
        <?= $db->config("automaintain"); ?>
        % dari Bonus Adalah :</td>
      <td><label>
        <?
	   echo rupiah($nilaiauto);
	   ?>
      </label></td>
    </tr>
    <tr>
      <td align="right">Biaya Transfer  :</td>
      <td><?	
	  echo rupiah($bytrfok);
	  ?>
          <label></label></td>
    </tr>
    <tr>
      <td align="right">Jumlah Di Transfer  :</td>
      <td><?
	  echo rupiah($jmltransfer);
	  ?>
          <label> </label></td>
    </tr>
    <tr>
      <td align="right">Tanggal transfer :</td>
      <td><input name="dis" type="hidden" id="dis" value="disabled" size="12" readonly="readonly" />
          <input name="theDate2" type="text" id="theDate2" value="<?= date("d-m-Y"); ?>" size="12" readonly="readonly" />      </td>
    </tr>
    <tr>
      <td colspan="2" align="center"><label>
        <input type="submit" name="button2" id="button2" value="PROSES" <?= $dis; ?> />
      </label></td>
    </tr>
  </table>
</form>
<?
} else {
?>
<form id="form2" name="form2" method="post" action="?m=withdrawl&page=proses">
  <table width="80%" border="0" align="center" cellpadding="3" cellspacing="0">
    <tr>
      <td width="46%" align="right">ID Member :</td>
      <td width="54%"><strong>
        <?= $mid; ?>
      </strong></td>
    </tr>
    <tr>
      <td align="right">Nama member :</td>
      <td><strong>
        <?= $db->dataku("nama", $mid); ?>
      </strong></td>
    </tr>
    <tr>
      <td align="right" valign="top">Ditransfer ke :</td>
      <td><label>
        <select name="tujuan" id="tujuan">
          <option value="bank">
            <?= $db->dataku("bank", $mid); ?>
            -
            <?= $db->dataku("norek", $mid); ?>
            -
            <?= $db->dataku("an", $mid); ?>
          </option>
          <option value="E-walet">------</option>
        </select>
      </label></td>
    </tr>
    <tr>
      <td align="right">Jumlah Bonus :</td>
      <td><label>
        <input name="jumlah" type="text" id="jumlah" value="<?= $jumlah; ?>" size="10" />
        <input name="uid" type="hidden" id="uid" value="<?= $uid; ?>" size="10" />
        <input name="tombol" type="hidden" id="tombol" value="konfirm" size="10" />
        <input name="w" type="hidden" id="w" value="<?= $w; ?>" size="10" />
        <input name="mid" type="hidden" id="mid" value="<?= $mid; ?>" size="10" />
      </label></td>
    </tr>
    <tr>
      <td align="right">Saldo Automaintain Saat ini  :</td>
      <td><label>
        <?
	
		
	  echo rupiah($myauto);
	  ?>
      </label></td>
    </tr>
    <tr>
      <td align="right">Kekuranan Saldo Untuk Automaintain  :</td>
      <td><label>
        <?
	  echo 	rupiah($kekuranganauto);
	  ?>
      </label></td>
    </tr>
    <tr>
      <td align="right">Potongan Automaintain
        <?= $db->config("automaintain"); ?>
        % dari Bonus Adalah :</td>
      <td><label>
        <?
	   echo rupiah($nilaiauto);
	   ?>
      </label></td>
    </tr>
    <tr>
      <td align="right">Biaya Transfer  :</td>
      <td><label>
        <?
	  $bytrfok=$bytrfok;	
	  ?>
        <input name="bytrf" type="text" id="bytrf" value="<?= $bytrfok; ?>" size="10" />
      </label></td>
    </tr>
    <tr>
      <td align="right">Jumlah di Transfer  :</td>
      <td><?
	  $jmltransfer=($jumlah-$nilaiauto-$bytrfok);
	  ?>

          <label>
          <input name="jmltransfer" type="text" id="jmltransfer" value="<?= $jmltransfer; ?>" size="10" />
        </label></td>
    </tr>
    <tr>
      <td align="right">Tanggal transfer :</td>
      <td><input name="theDate2" type="text" value="<?= date("d-m-Y"); ?>" size="12" readonly="readonly" />      </td>
    </tr>
    <tr>
      <td colspan="2" align="center"><label>
        <input type="submit" name="button" id="button" value="PROSES" <?= $dis; ?> />
      </label></td>
    </tr>
  </table>
</form>
<?
	}
	break;
}
?>		
<?
} else {
echo "<meta http-equiv=\"refresh\" content=\"1; url=illegal.html\">";
}
?>