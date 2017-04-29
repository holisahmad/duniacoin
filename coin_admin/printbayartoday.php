<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body onLoad="javascript:print()">

<?php

include "../configdb_inc.php";
include "../utama_inc.php";
include "../plus_inc.php";
$db = new db_mysql($server_name, $userdb, $passdb, $databasename,"");

$sql = $db->select("*", "bayartoday", "", "id desc");

?>
<h2 align="center"><img src="images/edit_f2.png" width="32" height="32" align="absmiddle" /> Rekap Bonus Bank Harian </h2>

<div id="menu_button2"></div>



<?


?>	

<?

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



//$db->select("*", "bayartoday", $kat);

if($Submit == "CARI") {

	$filter = "nama like '%$keywrd%' or username like '%$keywrd%'";

	$where = "a.nama like '%$keywrd%' or a.username like '%$keywrd%'";

} else {

	

	$filter = "status=$kat and paket=1";

	$where = "status=$kat and paket=1";

}

//---

if($kat > 0 or !$kat) {

	$order = "id desc";

} else {

	$order = "id desc";

}		

if($kat == "") {

	$numrows = $db->count_records("bayartoday", "status=$kat");	

	$db->select("id, username, tanggal, nama, bank, norek, an, saldo, adm, pajak, bonus, status", "bayartoday", "status=0", $order, "", "", "$start, $limit");

	

} else {

	$numrows = $db->count_records("bayartoday", "status=$kat");	

	$db->select("id, username, tanggal, nama, bank, norek, an, saldo, adm, pajak, bonus, status", "bayartoday", "status=0", $order, "", "", "$start, $limit");

	
}

$sel = "selected";

?>

<table width="100%" border="0" cellspacing="0" cellpadding="5">

  <tr>

    <td colspan="11" align="center" style="padding:0"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding:0; margin:0">

      <tr>

        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>

    </table></td>
  </tr>

  <tr class="tbl_header">

    <td width="4%" align="center">No</td>

    <td width="10%" align="center">Tanggal</td>
    <td width="11%" align="center">Username</td>

    <td width="13%" align="center">Nama Lengkap </td>

    <td width="10%" align="center"> Bank </td>

    <td width="8%" align="center">Nomor Rekening </td>

    <td width="11%" align="center">Atas Nama </td>
    <td width="7%" align="center">Bonus</td>
    <td width="9%" align="center">Admin</td>
    <td width="10%" align="center">Pajak</td>
	 <td width="10%" align="center">Total</td>
    
  </tr>

<?





$j=$db->num_rows();

for($i=0;$i<$j;$i++) {

	$nom = $i + 1 + $start;

	$lid = $i - 1;

	
	if($db->result($i, "status") > 0) {
		$aktif = "<a href='#' onclick=\"confirmation('".$db->result($i, "username")."', 'activation', 'Disable')\" style='cursor:hand'><img src='images/icon-16-checkin.png' title='Change to Disable' border=0 /></a>";
	} else {
		$aktif = "<a href='#' onclick=\"confirmation('".$db->result($i, "username")."', 'activation', 'Activated')\" style='cursor:hand'><img src='images/publish_x.png' title='Change to Active Transfer' border=0 /></a>";
	}

?>

 

  <tr class="<?= $class; ?>">

    <td><?= $nom; ?> </td>

      <td><?= $db->result($i, "tanggal"); ?></td>
    <td><?= $db->result($i, "username"); ?></td>

    <td><?= $db->result($i, "nama"); ?></td>

    <td><?= $db->result($i, "bank"); ?></td>
    <td><?= $db->result($i, "norek"); ?></td>
    <td align="center"><div align="left"><?= $db->result($i, "an"); ?></div></td>
    <td align="center"><?= rupiah($db->result($i, "saldo")); ?></td>
    <td align="center"><?= rupiah($db->result($i, "adm")); ?></td>
	 <td align="center"><?= rupiah($db->result($i, "pajak")); ?></td>
    <td align="center"><div align="right">
      <?= rupiah($db->result($i, "bonus")); ?>
    </div></td>
    
  </tr>

<?

	}

?>	  
</table>

<br />

<table width="100%" border="0" cellspacing="0" cellpadding="2">

  <tr>

    <td align="center">&nbsp;</td>

  </tr>

</table>
