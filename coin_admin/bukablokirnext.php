<script type="text/javascript">
<!--
function confirmation(noid, kat, page) {
	var answer = confirm("Yakin akan " + page +  " Data ini?")
	if (answer){
		//alert("Bye bye!")
		window.location = "?m=bukablokirnext&page=" + kat + "&no=" + noid;
	}
}
</script>
<?
//--------
switch ($page) {
default :
//---pagination----------------
$limit = '500'; // How many results should be shown at a time
$scroll = '0'; // Do you want the scroll function to be on (1 = YES, 2 = NO)
$scrollnumber = '500'; // How many elements to the record bar are shown at a time when the scroll function is on
//-------------pagination--------------
if (!isset ($_GET['show'])) {

	$display = 1;
	
} else {

	$display = $_GET['show'];
	
}
$start = (($display * $limit) - $limit);
if($kat == 1) {
	$sql0 = $db->count_records("gf_proses", "status=2");
	$sql = $db->select("*", "gf_proses", "status=2", "", "", "", "$start, $limit");
	//mysql_close();
} else if($kat == 2) {
	$sql0 = $db->count_records("gf_proses", "username like '%$keywrd%' or username like '%$keywrd%'");
	$sql = $db->select("*", "gf_proses", "username like '%$keywrd%' or username like '%$keywrd%'", "id desc", "", "", "$start, $limit");
} else if($kat == "0") {
	$sql0 = $db->count_records("gf_proses", "status=2");
	$sql = $db->select("*", "gf_proses", "status=2", "id desc", "", "", "$start, $limit");
} else {
	$sql0 = $db->count_records("gf_proses", "status=2");
	$sql = $db->select("*", "gf_proses", "status=2", "id desc", "", "", "$start, $limit");
}					
	$numrows = $sql0;
	
?>
<p align="center"><strong>PEMBUKAAN BLOKIR LANJUTAN</strong></p>
<table width="98%" border="0" align="center" cellpadding="5" cellspacing="1" style="border:solid #CCCCCC 1px">
  <tr class="tbl_header">
    <td colspan="2">&nbsp;</td>
    <td colspan="6"><form id="form2" name="form2" method="post" action="?m=bukablokirnext&amp;kat=2" style="margin:0; padding:0">
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
    <td width="13%" align="center" bgcolor="#CCCCCC">KODE TRANSAKSI</td>
    <td width="17%" align="center" bgcolor="#CCCCCC">USERNAME</td>
    <td width="14%" align="center" bgcolor="#CCCCCC">TANGGAL</td>
    <td width="17%" align="center" bgcolor="#CCCCCC">TRANSFER KEPADA</td>
    <td width="12%" align="center" bgcolor="#CCCCCC">NOMINAL</td>
    <td width="12%" align="center" bgcolor="#CCCCCC">STATUS</td>
    <td width="12%" align="center" bgcolor="#CCCCCC">EDIT </td>
  </tr>
<?

$nom = 1 + $start;
while($row=$db->fetch_row($sql)) {
$hari_ini=date("Y-m-d");
	$lid = $nom - 1;

?>  
  <tr class="<?= $class; ?>">
    <td align="center"><?= $nom; ?>.</td>
    <td align="center"><?= $row[1]; ?></td>
    <td align="center"><?= $row[2]; ?></td>
    <td align="center"><?= $row[3]; ?></td>
    <td align="center"><?= $row[4]; ?></td>
    <td align="center"><?= $row[5]; ?></td>
    <td align="center"><?= $row[6]; ?></td>
    <td align="center"><a href="?m=bukablokirnext&amp;page=edit&noid=<?= $row[0]; ?>"><img src="images/edit_f2.png" title="Edit Waktu Transfer" width="17" height="22" border="0" /></a></td>
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
  <a href="?m=bukablokirnext&kat=<?= $kat; ?>&show=1" style="font-size:10px; color:#0000CC"><< First </a> | <a href="?m=bukablokirnext&kat=<?= $kat; ?>&show=<?= $previous; ?>" style="font-size:10px; color:#0000CC">< Previous </a> |
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
[ <a href="?m=bukablokirnext&kat=<?= $kat; ?>&show=<?= $i; ?>" style="font-size:10px; color:#0000CC">
<?= $i; ?>
</a> ]
<?php
		
		}
	
	}

}

if ($display < $paging) {

	$next = $display + 1;
	
?>
| <a href="?m=bukablokirnext&kat=<?= $kat; ?>&show=<?= $next; ?>" style="font-size:10px; color:#0000CC">Next ></a> | <a href="?m=bukablokirnext&kat=<?= $kat; ?>&show=<?= $paging; ?>" style="font-size:10px; color:#0000CC">Last >></a>
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
		$db->delete("gf_proses", "id='$no'");
		echo "<meta http-equiv='refresh' content='0;URL=?m=bukablokirnext'>";
	break;
	
	case pasangkanotomatis :
		echo "Sedang Di Pasangkan Otomatis";
		echo "<meta http-equiv='refresh' content='0;URL=?m=bukablokirnext'>";
	break;	
	
	case edit :
	
if( isset($_POST['submit'])) {
	$db->update("gf_proses", "status='$status'", "trx='$trx'");
	echo "<p align=center><b>Data Pemblokiran Sudah DI Normalkan!</b></p>";
	echo "<meta http-equiv=\"refresh\" content=\"2; url=?m=bukablokirnext\">";
}
	$db->select("*", "gf_proses", "id='$noid'");	
?>
</p>
<p>&nbsp;</p>
<p></p>
<form id="form2" name="form1" method="post" action="">
  <p></p>
  <table width="80%" border="0" align="center" cellpadding="4" cellspacing="0">
    <tr>
      <td colspan="2" align="center">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" align="center">&nbsp;</td>
    </tr>
    <tr>
      <td width="44%" align="right"> Kode Transaksi :</td>
      <td width="56%"><input name="trx" type="text" id="trx" value="<?= $db->result(0, "trx");  ?>" disabled="disabled" />
        <b>
      <input name="noid" type="hidden" id="noid" value="<?= $db->result(0, "id");  ?>" />
      <input name="trx" type="hidden" id="trx" value="<?= $db->result(0, "trx");  ?>" /></b></td>
    </tr>
    <tr>
      <td align="right"> Username  :</td>
      <td><input name="username" type="text" id="username" value="<?= $db->result(0, "username");  ?>" disabled="disabled" />
      <input name="username" type="hidden" id="username" value="<?= $db->result(0, "username");  ?>" /></td>
    </tr>
    <tr>
      <td align="right">Status Blokir  :</td>
      <td><input name="status" type="text" id="status" value="<?= $db->result(0, "status");  ?>" size="3" /> 
        2 = Blokir 0 = Tidak Di Blok</td>
    </tr>
    <tr>
      <td colspan="2" align="center">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" align="center"><label>
        <input type="submit" name="submit" id="submit" value="UPDATE BATAS WAKTU TRANSFER" />
      </label></td>
    </tr>
  </table>
</form>
<?
	break;
	}
?>	