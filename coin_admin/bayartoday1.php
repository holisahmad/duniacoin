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

<h2 align="center"><img src="images/edit_f2.png" width="32" height="32" align="absmiddle" /> Rekap Data Berdasarkan Bank</h2>

<div id="menu_button2"></div>



<?

switch($page) {

	default :

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

  <tr class="tbl_header">

    <td width="3%" align="center">#</td>

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
    <td align="center"><?= $aktif; ?></td>
    <td align="center"><a href="#" onClick="confirmation('<?= $db->result($i, "username"); ?>', 'delete', 'delete')" style='cursor:hand'><img src="images/icon-32-delete_resize.png" width="17" height="22" border="0" title="Delete this Member" /></a></td>
  </tr>

<?

	}

?>	  
</table>

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

	case addnew :

	

?>
<?	

	break;

	case submit :

		

		if($edit > 0) {

			

			if($password) {

				$pass = ($password);

				$db->update("bayartoday", "nama='$nama', pass='$pass', alamat='$alamat', kota='$kota',  email='$email',  hp='$hp'", "username='$mid'");

			} else{

				$db->update("bayartoday", "nama='$nama', alamat='$alamat', kota='$kota', email='$email', hp='$hp'", "username='$mid'");

			}	

	echo "<meta http-equiv='refresh' content='0;URL=?m=bayartoday&page=addnew&act=1&mid=$mid&edit=1'>";

		

			

	} else {

			$db->insert("bayartoday", "", "'', '$username', '$pass', '$nama', '$sponsor', '$email', '$tglahir', '$sex', '$alamat', '$kota', '$propinsi', '$kodepos', '$telepon', '$hp', '$bank', '$cabang', '$norek', '$anbank', '$rpadmin', '$clientdate', '','$status'"); 

		echo "<meta http-equiv='refresh' content='0;URL=?m=bayartoday'>";

	}		

			

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

$bayarx = rupiah($bonus);
$message="Sukses Transfer Bonus ".$userx." ".$bayarx." www.dct99.net. Terima kasih" ;

$db->smsnotifikasi ($hp , $message) ;


 
echo "<meta http-equiv='refresh' content='0;URL=?m=bayartoday'>";
		
		}
		
		
	break;
	case blokir :

		//echo "delete no $no";

		if($action == "Blocked") {

			$blocked = 1;

		} else {

			$blocked = 0;

		}		

		$db->update("bayartoday", "blokir='$blocked'", "username='$mid'");


		

		echo "<meta http-equiv='refresh' content='0;URL=?m=bayartoday'>";

	break;	

	//----komisi--

	case komisi :

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





if($keywrd) {

	$where = " and a.nama like '%$keywrd%' or a.username like '%$keywrd%' and a.status=1";

} else {

	$where = "";

}		

//$db->select("*", "bayartoday", $kat);

	$numrows = $db->count_records("bayartoday", "status=1");	

	$db->select("a.username, a.nama, a.bank, a.sponsor, a.email, a.kota, a.tglaktif, b.paket", "stockistord as a inner join upline as b on a.username=b.username", "a.status=1 and a.paket=1 $where", "a.nama", "", "", "$start, $limit");



?>


<?

	break;

	

	case detilkomisi :

	if($db->dataupline("paket", $mid) > 1) {

		include "komlev.php";

	} else {	

	$db->select("username, nama, sponsor, email, kota, tglaktif", "bayartoday", "username='$mid'");

	

	?>
<p>&nbsp;</p>

    <p>&nbsp;</p>

    <p>&nbsp;</p>

<p>&nbsp;</p>



  <?

  }

	break;

	

	case addstockistord :

?>

	<fieldset>

<legend>ADD NEW stockistord </legend> 

 <?

 if( isset($_POST['submit'])) {

 	$db->select("username", "bayartoday", "username='$sponsorid' and status=1");

	

	if($db->num_rows() > 0) {

 ?>

      <p>Sponsor Username : <strong><?= $sponsorid; ?></strong><br />

      Sponsor Name : <strong><?= $db->dataku("nama", $sponsorid); ?></strong></p>

      <p>Add New stockistord with this sponsor?</p>

      <p><a href="../admin/?m=join&amp;id=<?= $sponsorid; ?>&amp;off=1">YES</a> | <a href="../admin/?m=bayartoday&amp;page=addstockistord">NO</a></p>

      

  <?

  	} else {

	

		echo "<p align=center><b>There is no stockistord with username: $sponsorid<b><br>Please try again!</p>";

	}

}		

	?>      

        

         <form name="form1" method="post" action="">

         <table width="100%" border="0" cellspacing="1" cellpadding="2">

          <tr>

            <td width="50%" align="right"><label>Enter username SPONSOR  :</label>            </td>

            <td width="50%"><input name="sponsorid" type="text" id="sponsorid" size="20" class="form"></td>

          </tr>

          <tr>

            <td>&nbsp;</td>

            <td><input type="submit" name="submit" value="ADD NEW stockistord" class="tombol"></td>

          </tr>

        </table>

        <p>&nbsp;</p>

      </form>

      <p>&nbsp;</p>



	</fieldset>

<?	

	break;

}

?>	

<?

} else {

echo "<meta http-equiv=\"refresh\" content=\"1; url=illegal.html\">";

}


?>