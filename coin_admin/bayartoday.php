<?PHP

if(isset( $_SESSION['valid_admin']))

  {

?>

<script type="text/javascript">

<!--

function confirmation(mid, page, action) {

	var answer = confirm("Yakin Akan memproses bonus ini " + action +  " this order: " + mid + " ?")

	if (answer){

		//alert("Bye bye!")

		window.location = "?m=bayartoday&page=" + page + "&mid=" + mid + "&action=" + action;

		

	}

	

}

//-->

</script>

<h2 align="center"><img src="images/edit_f2.png" width="32" height="32" align="absmiddle" /> Rekap Pembayaran Harian</h2>

<div id="menu_button2"></div>



<?

switch($page) {

	default :

?>	

<?

//---pagination----------------

$limit = '1000'; // How many results should be shown at a time

$scroll = '1'; // Do you want the scroll function to be on (1 = YES, 2 = NO)

$scrollnumber = '1000'; // How many elements to the record bar are shown at a time when the scroll function is on

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

	

	$filter = "status=$kat ";

	$where = "status=$kat ";

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

    <td colspan="12" align="center" style="padding:0"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding:0; margin:0">

      <tr>

        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>

    </table></td>
  </tr>
  
<form action="?m=bayartoday&amp;page=konfirm" method="post"  name="bayar">

  <tr class="tbl_header">
	<td width="6%" align="center">&nbsp;</td>
    <td width="3%" align="center">NO</td>

    <td width="10%" align="center">Tanggal</td>
    <td width="11%" align="center">Username</td>

    <td width="13%" align="center">Nama Lengkap </td>

    <td width="10%" align="center"> Bank </td>

    <td width="8%" align="center">Nomor Rekening </td>

    <td width="11%" align="center">Atas Nama </td>
    <td width="7%" align="center">Bonus</td>
    <td width="9%" align="center">Admin</td>
   
	 <td width="10%" align="center">Total</td>
    <td width="4%" align="center">Proses</td>
    <td width="4%" align="center">Hapus</td>
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
	if($db->result($i, "status") > 0) {
		$aktif = "<a href='#' onclick=\"confirmation('".$db->result($i, "id")."', 'activation', 'Disable')\" style='cursor:hand'><img src='images/icon-16-checkin.png' title='Change to Disable' border=0 /></a>";
	} else {
		$aktif = "<a href='#' onclick=\"confirmation('".$db->result($i, "id")."', 'activation', 'Activated')\" style='cursor:hand'><img src='images/publish_x.png' title='Change to Active Transfer' border=0 /></a>";
	}

?>

 

  <tr class="<?= $class; ?>">
  <td width="6%" align="center"><input name="pilih[]" type="checkbox" id="pilih[]" value="<?= $db->result($i, "id"); ?>" /></td>

    <td><?= $nom; ?></td>

    <td><?= $db->result($i, "tanggal"); ?></td>
    <td><?= $db->result($i, "username"); ?></td>

    <td><?= $db->result($i, "nama"); ?></td>

    <td><?= $db->result($i, "bank"); ?></td>
    <td><?= $db->result($i, "norek"); ?></td>
    <td align="center"><div align="left"><?= $db->result($i, "an"); ?></div></td>
    <td align="center"><?= rupiah($db->result($i, "saldo")); ?></td>
    <td align="center"><?= rupiah($db->result($i, "adm")); ?></td>
	 
    <td align="center"><div align="right">
      <?= rupiah2($db->result($i, "bonus")); ?>
    </div></td>
    <td align="center"><?= $aktif; ?></td>
    <td align="center"><a href="#" onClick="confirmation('<?= $db->result($i, "username"); ?>', 'delete', 'delete')" style='cursor:hand'><img src="images/icon-32-delete_resize.png" width="17" height="22" border="0" title="Delete this Member" /></a></td>
  </tr>

<?

	}

?>	  

 <tr>
    <td colspan="4"><input name="submit2" type="submit" id="submit2" value="Pilih Yang Sudah dibayar" class="tombol" /></td>
	</tr>
</table>
</form>
<p align="center"><a href="printbayartoday.php" target="_blank"><img src="images/fileprint.png" alt="Cetak bayar Today" width="22" height="22" border="0" /></a></p>
  
</p>
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

  <a href="../admin/?m=bayartoday&amp;kat=<?= $kat; ?>&amp;show=1" style="font-size:10px; color:#0000CC"><< Awal </a> | <a href="../admin/?m=bayartoday&amp;kat=<?= $kat; ?>&amp;show=<?= $previous; ?>" style="font-size:10px; color:#0000CC">< Sebelumnya </a> |

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

[ <a href="../admin/?m=bayartoday&amp;kat=<?= $kat; ?>&amp;show=<?= $i; ?>" style="font-size:10px; color:#0000CC">

<?= $i; ?>

</a> ]

<?php

		

		}

	

	}



}



if ($display < $paging) {



	$next = $display + 1;

	

?>

| <a href="../admin/?m=bayartoday&amp;kat=<?= $kat; ?>&amp;show=<?= $next; ?>" style="font-size:10px; color:#0000CC">Selanjutnya ></a> | <a href="../admin/?m=bayartoday&amp;kat=<?= $kat; ?>&amp;show=<?= $paging; ?>" style="font-size:10px; color:#0000CC">Terakhir >></a>

<?php



}

//

?>

    </td>

  </tr>

</table>

<p>&nbsp;</p>
<?
			

	break;

	case delete :

		$db->delete("bayartoday", "username='$mid'");

		echo "<meta http-equiv='refresh' content='0;URL=?m=bayartoday'>";

		

	break;	

	

	case activation :
		if($action == "Disable") {
		$db->update("bayartoday", "status=0", "id='$mid'");
		echo "<meta http-equiv='refresh' content='0;URL=?m=bayartoday'>";
		} else { 
		$db->update("bayartoday", "status=1", "id='$mid'");
		
		$sql = mysql_query("select id, username, saldo , bonus from bayartoday where id='$mid'");
		$dta = mysql_fetch_row($sql);
		$userx= $dta[1];
		$bayar0 = $dta[2];
		$bonus = $dta[3];
		
		
		$sqlx = mysql_query("select id, userid from transfer where bonus='$bayar0' and userid ='$userx' and valid=0");
		$dtax = mysql_fetch_row($sqlx);
		$idx = $dtax[0];
		
		
		$db->update("transfer", "valid=1", "id='$idx'");
		
		
		//$bonustrf=rupiah($db->databayar("bayar", $mid));
		//$bank=$db->databayar("bank", $mid);
		//$norek=$db->databayar("norek", $mid);
		//$an=$db->databayar("an", $mid);
		$hp=$db->dataku("hp", $userx);
		$nama=$db->dataku("nama", $userx);
		
// sms notifikasi 	

$hariini = formatgl($clientdate);
$bayarx = rupiah2($bonus);
$message="Management Dunia Coin Mengucapkan Selamat Hari ini ".$hariini." Sebesar ".$bayarx." Sukses Untuk Kita Bersama" ;
$db->smsnotifikasi ($hp , $message) ;


 
echo "<meta http-equiv='refresh' content='0;URL=?m=bayartoday'>";
		
		}
		
		
	
?>
<?

	break;

	

case konfirm :
	
if( isset($_POST['submit'])) {
	$id[] = array();
  		for($i=0;$i<$j;$i++) {
		$db->update("bayartoday", "status=1" , "id='$id[$i]'");
		//	$db->delete("komisi", "id='$id[$i]'");
		//echo "$id[$i] id ";
		
		$sql = mysql_query("select id, username, saldo , bonus from bayartoday where id='$id[$i]'");
		$dta = mysql_fetch_row($sql);
		$userx= $dta[1];
		$bayar0 = $dta[2];
		$bonus = $dta[3];
		
		
		$sqlx = mysql_query("select id, userid from transfer where bonus='$bayar0' and userid ='$userx' and valid=0");
		$dtax = mysql_fetch_row($sqlx);
		$idx = $dtax[0];
		
		
		$db->update("transfer", "valid=1", "id='$idx'");
		

		$hp=$db->dataku("hp", $userx);
		//$hp="085760525722";
		$nama=$db->dataku("nama", $userx);
		
// sms notifikasi 	
$hariini = formatgl($clientdate);
$bayarx = rupiah2($bonus);

$message="Management Dunia Coin Mengucapkan Selamat Hari ini ".$hariini." Sebesar ".$bayarx." Sukses Untuk Kita Bersama" ;

$db->smsnotifikasi ($hp , $message) ;
	
		
		
		
			echo "<meta http-equiv='refresh' content='0;URL=?m=bayartoday'>";

	
  		
		 
		

//$db->smsnotifikasi ($hp , $message) ;
		
			//echo "<meta http-equiv='refresh' content='0;URL=?m=bayartoday'>";
		}
	} else {	
	?>
<form action="" method="post" enctype="?m=bayartoday&amp;page=konfirm" name="bayar" id="bayar">
<form action="" method="post" enctype="?m=history&amp;page=konfirm" name="komisi" id="komisi">

  <table width="100%" border="0" align="center" cellpadding="5" cellspacing="0">
    <tr class="tbl_header">
      <td colspan="12" align="center">KONFIRMASI PROSES BAYAR BONUS</td>
    </tr>
    <tr>
      <td colspan="12" align="center" style="color:#FF0000"><strong>PASTIKAN DATA YANG DI PILIH SUDAH DI TRANSFER BONUS </strong></td>
    </tr>
    <tr class="tbl_header">
      <td width="6%" align="center">NO</td>
      <td width="8%" align="center">Tanggal</td>
      <td width="12%" align="center">Username</td>
      <td width="14%" align="center">Nama Lengkap </td>
      <td width="8%" align="center"> Bank </td>
      <td width="11%" align="center">Nomor Rekening </td>
      <td width="5%" align="center">Atas Nama </td>
      <td width="6%" align="center">Bonus</td>
      <td width="6%" align="center">Admin</td>
     
      <td width="8%" align="center">Total</td>
    </tr>
    <?


$j=count($pilih);
for($i=0;$i<$j;$i++) {
//	$db->select("id, username, bayar, tglbayar, jenis, dari", "komisi", "id=$pilih[$i]");
	$db->select("id, username, tanggal, nama, bank, norek, an, saldo, adm, pajak, bonus, status", "bayartoday", "id=$pilih[$i]");
	
	while($row=$db->fetch_row()) {
	$nom = $i + 1 ;
	
?>
    <tr>
     <td><?= $nom; ?>      </td>
     <td><?= date("d-m-Y", strtotime($row[2])); ?>
	 
	  <input name="id[]" type="hidden" id="id[]" value="<?= $row[0]; ?>" />
	  </td>
     <td  align="center"><input name="j" type="hidden" id="j" value="<?= $j; ?>" />
	<?= $row[1]; ?>	  </td>

    <td><?= $row[3]; ?></td>

    <td><?= $row[4]; ?></td>
    <td><?= $row[5]; ?></td>
	<td><?= $row[6]; ?></td>
	<td><?= rupiah ($row[7]); ?></td>
	<td><?= rupiah ($row[8]); ?></td>
	
	<td><?= rupiah2 ($row[10]); ?></td>
    </tr>
    <?
		}
	
}
?>
    <tr>
      <td colspan="6" align="center"><input name="submit" type="submit" id="submit" value="PROSES" class="tombol" />
        &nbsp;
        <input name="submit22" type="button" id="submit22" value="BATAL" class="tombol" onclick="javascript:history.go(-1)" /></td>
    </tr>
  </table>
</form>
	<p>&nbsp;</p>
	
	<?  
	}
	break;
}	}
?>	
</p>
<p>&nbsp;</p>
<p>&nbsp;</p>


 