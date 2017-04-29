<script type="text/javascript">
<!--
function confirmation(noid, kat, page) {
	var answer = confirm("Yakin akan " + page +  " Data ini?")
	if (answer){
		//alert("Bye bye!")
		window.location = "?m=data_gh&page=" + kat + "&no=" + noid;
	}
}
</script>
<?
//--------
switch ($page) {
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
//if(!$kat) $kat=2;
if($status) {
	$aktif = "and pasif='$statuse'";
	$pasif = "pasif='$statuse'";
}
if($kat == 1) {
	$sql0 = $db->count_records("gh_start", "status=0 $aktif");
	$sql = $db->select("*", "gh_start", "status=0 $aktif", "", "", "", "$start, $limit");
	//mysql_close();
} else if($kat == 2) {
	$sql0 = $db->count_records("gh_start", "username like '%$keywrd%' or username like '%$keywrd%'");
	$sql = $db->select("*", "gh_start", "username like '%$keywrd%' or username like '%$keywrd%'", "id desc", "", "", "$start, $limit");
} else if($kat == "0") {
	$sql0 = $db->count_records("gh_start", "status=0 $aktif");
	$sql = $db->select("*", "gh_start", "status=0 $aktif", "id desc", "", "", "$start, $limit");
} else {
	$sql0 = $db->count_records("gh_start", $pasif);
	$sql = $db->select("*", "gh_start", $pasif, "id desc", "", "", "$start, $limit");
}					
	$numrows = $sql0;
	
?>
<p align="center"><strong>DATA TAKE FUN UMUM  (TF)</strong></p>
<table width="98%" border="1" align="center" cellpadding="5" cellspacing="1" style="border:solid #CCCCCC 1px">
  <tr class="tbl_header">
    <td colspan="2">&nbsp;</td>
    <td colspan="11"><form id="form2" name="form2" method="post" action="?m=data_gh&amp;kat=2" style="margin:0; padding:0">
          <label>
            Cari Berdasar Username : 
              <input name="keywrd" type="text" id="keywrd" />
        </label>
          <label>
          <input type="submit" name="Submit" value="CARI" />
          </label>
        </form>  </td>
  </tr>
  <tr class="tbl_header">
    <td width="3%" align="center" bgcolor="#CCCCCC">NO</td>
    <td width="9%" align="center" bgcolor="#CCCCCC">USERNAME</td>
    <td width="10%" align="center" bgcolor="#CCCCCC">TANGGAL</td>
    <td width="7%" align="center" bgcolor="#CCCCCC">KODE TF</td>
    <td width="8%" align="center" bgcolor="#CCCCCC">NOMINAL TF</td>
    <td width="7%" align="center" bgcolor="#CCCCCC">DONATUR-1</td>
    <td width="8%" align="center" bgcolor="#CCCCCC">JUMLAH  1</td>
    <td width="12%" align="center" bgcolor="#CCCCCC">DONATUR-2</td>
    <td width="8%" align="center" bgcolor="#CCCCCC">JUMLAH  2</td>
    <td width="7%" align="center" bgcolor="#CCCCCC">TERBAYAR</td>
    <td width="10%" align="center" bgcolor="#CCCCCC">KEKURANGAN</td>
    <td width="5%" align="center" bgcolor="#CCCCCC">VIEW DETAIL</td>
    <td width="6%" align="center" bgcolor="#CCCCCC">STATUS</td>
  </tr>
<?

$nom = 1 + $start;
while($row=$db->fetch_row($sql)) {
$hari_ini=date("Y-m-d");
	$lid = $nom - 1;
	if($row[47] > 0) {
		$aktif = "<img src='images/icon-16-checkin.png' title='BB Aktif' border=0 />";
	} else {
		$aktif = "<img src='images/publish_x.png' title='BB Pasif' border=0 />";
	}
	if($row[29] == $hari_ini and $row[28]<1) {
		$pasangkan = "<strong><blink><font color='#FF0000'>Harus Di Pasangkan</font></blink></strong>";
	} else {
		$pasangkan = "-";
	}

?>  
  <tr class="<?= $class; ?>">
    <td align="center"><?= $nom; ?>.</td>
    <td align="center"><?= $row[2]; ?></td>
    <td align="center"><?= $row[3]; ?></td>
    <td align="center"><?= $row[1]; ?></td>
    <td align="center"><?= rupiah2($row[4]); ?></td>
    <td align="center"><?= $row[5]; ?></td>
    <td align="center"><?= rupiah2($row[6]); ?></td>
    <td align="center"><?= $row[7]; ?></td>
    <td align="center"><?= rupiah2($row[8]); ?></td>
    <td align="center"><?= rupiah2($row[45]); ?></td>
    <td align="center"><?= rupiah2($row[46]); ?>      &nbsp;</td>
    <td align="center"><a href="?m=data_gh&amp;page=edit&noid=<?= $row[0]; ?>"><img src="images/edit_f2.png" title="Edit GH" width="17" height="22" border="0" /></a></td>
    <td align="center"><?= $aktif; ?></td>
  </tr>
<?
	$nom++;
}
?>	  
</table>
<br>
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
  <a href="?m=data_gh&kat=<?= $kat; ?>&show=1" style="font-size:10px; color:#0000CC"><< First </a> | <a href="?m=data_gh&kat=<?= $kat; ?>&show=<?= $previous; ?>" style="font-size:10px; color:#0000CC">< Previous </a> |
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
[ <a href="?m=data_gh&kat=<?= $kat; ?>&show=<?= $i; ?>" style="font-size:10px; color:#0000CC">
<?= $i; ?>
</a> ]
<?php
		
		}
	
	}

}

if ($display < $paging) {

	$next = $display + 1;
	
?>
| <a href="?m=data_gh&kat=<?= $kat; ?>&show=<?= $next; ?>" style="font-size:10px; color:#0000CC">Next ></a> | <a href="?m=data_gh&kat=<?= $kat; ?>&show=<?= $paging; ?>" style="font-size:10px; color:#0000CC">Last >></a>
<?php

}
//
?>
    </td>
  </tr>
</table>
<p>
  <? 
?>
  <?
	break;
	case delete :
		$db->delete("gh_start", "id='$no'");
		echo "<meta http-equiv='refresh' content='0;URL=?m=data_gh'>";
	break;
	
	case pasangkanotomatis :
		echo "Sedang Di Pasangkan Otomatis";
		echo "<meta http-equiv='refresh' content='0;URL=?m=data_gh'>";
	break;	
	
	case edit :
	
if( isset($_POST['submit'])) {
	$db->update("gh_start", "terbayar='$terbayar', kekurangan='$kekurangan'", "id='$noid'");
	echo "<p align=center><b>Data GF Berhasil Diupdate!</b></p>";
	echo "<meta http-equiv=\"refresh\" content=\"2; url=?m=data_gh\">";
}
	$db->select("*", "gh_start", "id='$noid'");	
?>
</p>
<p>&nbsp;</p>
<p></p>
<form id="form2" name="form1" method="post" action="">
  <p></p>
  <table width="80%" border="1" align="center" cellpadding="4" cellspacing="0">
    <tr>
      <td align="right"> Nominal Permintaan Bantuan :</td>
      <td><b>
        <input name="jmlgf" type="text" id="jmlgf" value="<?= rupiah($db->result(0, "nominal")); ?>"  disabled="disabled"/>
        <input name="trx" type="hidden" id="trx" value="<?= $db->result(0, "trx");  ?>" />
        <input name="jmlgf" type="hidden" id="jmlgf" value="<?= $db->result(0, "nominal");  ?>" />
      </b></td>
    </tr>
    <tr>
      <td align="right"> Username Peminta Bantuan :</td>
      <td><input name="username" type="text" id="username" value="<?= $db->result(0, "username");  ?>" disabled="disabled" />
      <input name="username" type="hidden" id="username" value="<?= $db->result(0, "username");  ?>" />
      <b>
      <input name="noid" type="hidden" id="noid" value="<?= $db->result(0, "id");  ?>" />
      </b></td>
    </tr>
    <tr>
      <td width="44%" align="right"> Username Pemberi Bantuan-1 :</td>
      <td width="56%"><b>
        <input name="donatur1" type="text" id="donatur1" value="<?= $db->result(0, "donatur1"); ?>" />
      </b></td>
    </tr>
    <tr>
      <td align="right">Nominal Bantuan-1 :</td>
      <td><input name="jumlahgh1" type="text" id="jumlahgh1" value="<?= $db->result(0, "jumlahgh1");  ?>" /></td>
    </tr>
    <tr>
      <td align="right"> Username Pemberi Bantuan-2 :</td>
      <td><input name="donatur2" type="text" id="donatur2" value="<?= $db->result(0, "donatur2");  ?>" /></td>
    </tr>
    <tr>
      <td align="right">Nominal Bantuan-2 :</td>
      <td><input name="jumlahgh2" type="text" id="jumlahgh2" value="<?= $db->result(0, "jumlahgh2");  ?>" /></td>
    </tr>
    <tr>
      <td align="right"> Username Pemberi Bantuan-3 :</td>
      <td><input name="donatur3" type="text" id="donatur3" value="<?= $db->result(0, "donatur3");  ?>" /></td>
    </tr>
    <tr>
      <td align="right">Nominal Bantuan-3 :</td>
      <td><input name="jumlahgh3" type="text" id="jumlahgh3" value="<?= $db->result(0, "jumlahgh3");  ?>" /></td>
    </tr>
    <tr>
      <td align="right"> Username Pemberi Bantuan-4 :</td>
      <td><input name="donatur4" type="text" id="donatur4" value="<?= $db->result(0, "donatur4");  ?>" /></td>
    </tr>
    <tr>
      <td align="right">Nominal Bantuan-4 :</td>
      <td><input name="jumlahgh4" type="text" id="jumlahgh4" value="<?= $db->result(0, "jumlahgh4");  ?>" /></td>
    </tr>
    <tr>
      <td align="right"> Username Pemberi Bantuan-5 :</td>
      <td><input name="donatur5" type="text" id="donatur5" value="<?= $db->result(0, "donatur5");  ?>" /></td>
    </tr>
    <tr>
      <td align="right">Nominal Bantuan-5 :</td>
      <td><input name="jumlahgh5" type="text" id="jumlahgh5" value="<?= $db->result(0, "jumlahgh5");  ?>" /></td>
    </tr>
    <tr>
      <td align="right"> Username Pemberi Bantuan-6 :</td>
      <td><input name="donatur6" type="text" id="donatur6" value="<?= $db->result(0, "donatur6");  ?>" /></td>
    </tr>
    <tr>
      <td align="right">Nominal Bantuan-6 :</td>
      <td><input name="jumlahgh6" type="text" id="jumlahgh6" value="<?= $db->result(0, "jumlahgh6");  ?>" /></td>
    </tr>
    <tr>
      <td align="right"> Username Pemberi Bantuan-7 :</td>
      <td><input name="donatur7" type="text" id="donatur7" value="<?= $db->result(0, "donatur7");  ?>" /></td>
    </tr>
    <tr>
      <td align="right">Nominal Bantuan-7 :</td>
      <td><input name="jumlahgh7" type="text" id="jumlahgh7" value="<?= $db->result(0, "jumlahgh7");  ?>" /></td>
    </tr>
    <tr>
      <td align="right"> Username Pemberi Bantuan-8 :</td>
      <td><input name="donatur8" type="text" id="donatur8" value="<?= $db->result(0, "donatur8");  ?>" /></td>
    </tr>
    <tr>
      <td align="right">Nominal Bantuan-8 :</td>
      <td><input name="jumlahgh8" type="text" id="jumlahgh8" value="<?= $db->result(0, "jumlahgh8");  ?>" /></td>
    </tr>
    <tr>
      <td align="right"> Username Pemberi Bantuan-9 :</td>
      <td><input name="donatur9" type="text" id="donatur9" value="<?= $db->result(0, "donatur9");  ?>" /></td>
    </tr>
    <tr>
      <td align="right">Nominal Bantuan-9 :</td>
      <td><input name="jumlahgh9" type="text" id="jumlahgh9" value="<?= $db->result(0, "jumlahgh9");  ?>" /></td>
    </tr>
    <tr>
      <td align="right"> Username Pemberi Bantuan-10 :</td>
      <td><input name="donatur10" type="text" id="donatur10" value="<?= $db->result(0, "donatur10");  ?>" /></td>
    </tr>
    <tr>
      <td align="right">Nominal Bantuan-10 :</td>
      <td><input name="jumlahgh10" type="text" id="jumlahgh10" value="<?= $db->result(0, "jumlahgh10");  ?>" /></td>
    </tr>
    <tr>
      <td align="right">Nominal Terbayar Oleh Partisipan :</td>
      <td><input name="terbayar" type="text" id="terbayar" value="<?= $db->result(0, "terbayar");  ?>" /></td>
    </tr>
    <tr>
      <td align="right">Nominal Kekurangan  :</td>
      <td><input name="kekurangan" type="text" id="kekurangan" value="<?= $db->result(0, "kekurangan");  ?>" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" align="center"><label></label></td>
    </tr>
  </table>
</form>
<?
	break;
	}
?>	