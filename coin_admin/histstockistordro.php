<?PHP

if(isset( $_SESSION['valid_admin'])) {
$valid_admin=$_SESSION['valid_admin'];

 function randomPassword($length) {
$allow = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
$i = 1;

while ($i <= $length) {

$max = strlen($allow)-1;

$num = rand(0, $max);

$temp = substr($allow, $num, 1);

$ret = $ret . $temp;

$i++;

}

return $ret;

}

?>

<script type="text/javascript">

<!--

function confirmation(kode, page, action) {

	var answer = confirm("Are You sure to " + action +  " this order: " + kode + " ?")

	if (answer){

		//alert("Bye bye!")

		window.location = "?m=stockistordro&page=" + page + "&kode=" + kode + "&action=" + action;

		

	}

	

}

//-->

</script>

<h2 align="center"><img src="images/icon-48-user.png" width="48" height="48" align="absmiddle" /> History Order Paket  </h2>

<div id="menu_button2"></div>



<?

switch($page) {

	default :

?>	

<?

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





//if($uidm == 001) {



//$db->select("*", "stockistord", $kat);

if($Submit == "CARI") {

	$filter = "nama like '%$keywrd%' or username like '%$keywrd%'";

	$where = "nama like '%$keywrd%' or username like '%$keywrd%'";

} else {

	

	$filter = "status=$kat";

	$where = "status=$kat";

}

//---

if($kat > 0 or !$kat) {

	$order = "id";

} else {

	$order = "id asc";

}		

if($kat == "") {

	$numrows = $db->count_records("order_aktivasi", "status=1");

	$db->select("id, username, nama, hp, jumlah, tgl, limite, bank, total, jenis, status", "order_aktivasi", "status=1", "id DESC", "", "", "$start, $limit");

	

} else {

	$numrows = $db->count_records("order_aktivasi", "status=$kat");	

$db->select("id, username, nama, hp, jumlah, tgl, limite, bank, total, jenis, status", "order_aktivasi", "status=1", "id DESC", "", "", "$start, $limit");

}

$sel = "selected";

?>

<table width="100%" border="0" cellspacing="0" cellpadding="5">

  <tr>

    <td colspan="12" align="center" style="padding:0"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding:0; margin:0">

      <tr>

        <td><form action="" method="post" name="form1" id="form1" style="margin:0; padding:0">

          <label> Katagori Order :

            <select name="select" onChange="location =  this.options[this.selectedIndex].value" class="form">

            <option value="?m=stockistordro" selected="selected" <? echo $pilih; ?>>Semua Order</option>

            <option value="?m=stockistordro&amp;kat=0&amp;sel2=<?= $sel; ?>" <? echo $sel2; ?>>Pending Order</option>

            <option value="?m=stockistordro&amp;kat=1&amp;sel3=<?= $sel; ?>" <? echo $sel3; ?>>Sukses Order</option>
          </select>
          </label>

          &nbsp;&nbsp;

        Total: <b><?= $numrows; ?></b> Order

        </form></td>

        <td><form id="form2" name="form2" method="post" action="?m=stockistordro&amp;kat=2" style="margin:0; padding:0">

          <label>

            Cari Order : 

            <input name="keywrd" type="text" id="keywrd" />
            </label>

          <label>

          <input type="submit" name="Submit" value="CARI" />
          </label>

        </form>        </td>
      </tr>

    </table></td>
  </tr>

  <tr class="tbl_header">

    <td width="3%" align="center">#</td>

   

    <td width="9%" align="center">Username</td>

    <td width="10%" align="center">Nama  </td>

    <td width="9%" align="center"> Jenis </td>
	
	<td width="9%" align="center"> Jumlah </td>

    <td width="13%" align="center">Biaya</td>
	 <td width="13%" align="center">Bank</td>

    <td width="10%" align="center"> HP </td>

   
   

    <td width="9%" align="center">Tgl Order </td>
	<td width="9%" align="center">Tgl Limite </td>

    <td width="5%" align="center">Proses</td>

    <td width="4%" align="center">Delete</td>
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

		$aktif = "<a href='#' onclick=\"confirmation('".$db->result($i, "id")."', 'activation', 'Disable')\" style='cursor:hand'><img src='images/icon-16-checkin.png' title='Batalkan' border=0 /></a>";

	} else {

		$aktif = "<a href='#' onclick=\"confirmation('".$db->result($i, "id")."', 'activation', 'Activated')\" style='cursor:hand'><img src='images/publish_x.png' title='Proses Order Kartu AKtivasi' border=0 /></a>";

	}

	
?>

 

  <tr class="<?= $class; ?>">

    <td width="3%"><?= $nom; ?> </td>

   

    <td><?= $db->result($i, "username"); ?></td>

    <td><?= $db->result($i, "nama"); ?></td>

    <td><div align="center">

      <?= $db->result($i, "jenis"); ?>

    </div></td>
	
	 <td><div align="center">

      <?= $db->result($i, "jumlah"); ?>

    </div></td>

    <td><div align="right"></div>      <div align="right">
        <?= rupiah($db->result($i, "total")); ?>
      </div></td>

    <td align="center"><?= $db->result($i, "bank"); ?></td>
	 <td align="center"><?= $db->result($i, "hp"); ?></td>

   

  

    <td align="center"><?= date("d-m-Y", strtotime($db->result($i, "tgl"))); ?></td>
	 <td align="center"><?= date("d-m-Y", strtotime($db->result($i, "limite"))); ?></td>

    <td align="center"><?= $aktif; ?></td>

    <td align="center"><a href="#" onClick="confirmation('<?= $db->result($i, "id"); ?>', 'delete', 'delete')" style='cursor:hand'><img src="images/icon-32-delete_resize.png" width="17" height="22" border="0" title="Hapus Order ini" /></a></td>
  </tr>

<?

	}

?>	  
</table>

<br />

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

  <a href="?m=stockistordro&kat=<?= $kat; ?>&show=1" style="font-size:10px; color:#0000CC"><< Awal </a> | <a href="?m=stockistordro&kat=<?= $kat; ?>&show=<?= $previous; ?>" style="font-size:10px; color:#0000CC">< Sebelumnya </a> |

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

[ <a href="?m=stockistordro&kat=<?= $kat; ?>&show=<?= $i; ?>" style="font-size:10px; color:#0000CC">

<?= $i; ?>

</a> ]

<?php

		

		}

	

	}



}



if ($display < $paging) {



	$next = $display + 1;

	

?>

| <a href="?m=stockistordro&kat=<?= $kat; ?>&show=<?= $next; ?>" style="font-size:10px; color:#0000CC">Selanjutnya ></a> | <a href="?m=stockistordro&kat=<?= $kat; ?>&show=<?= $paging; ?>" style="font-size:10px; color:#0000CC">Terakhir >></a>

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

<form action="?m=stockistordro&amp;page=submit" method="post">



  <div align="left">

    <table width="70%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#EDEDE9" id="AutoNumber1" style="border-collapse: collapse">

      <tr class="tbl_header">

        <td width="100%" align="center"><?

		  if($act == 1 or $act) {

?>

  <div id="notice"><img src="images/notice-info.png" width="29" height="29" align="absmiddle" />Data telah berhasil diupdate ! </div>

	  <?

	}

	?>

              

              

          <b><font face="Arial">UPDATE 

          DATA stockistordro DI SINI</font></b></td>

      </tr>

      <tr>

        <td width="100%" style="border-style: none; border-width: medium"><div align="left">

            <table height="50" cellspacing="0" cellpadding="0" width="100%" border="0" style="border-collapse: collapse">

              <tbody>

                <tr>

                  <td width="43%" height="1">&nbsp;Username</td>

                  <td width="57%" height="1">: <b>

                    <? 

					if($edit > 0) {

						echo $mid;

					} else {

					?>	

                      <input name="username" id="username" size="20" maxlength="30" />

                    <?

					 }

					 ?>

                    </b>

                    <input name="edit" type="hidden" id="edit" value="<?= $edit; ?>" size="20" />

                      

                    <input name="mid" type="hidden" id="mid" value="<?= $mid; ?>" size="20" />

                  </p></td>

                </tr>

                <tr>

                  <td width="43%">&nbsp;Password</td>

                  <td width="57%">:

                    <input name="password" type="text" value="<?= $db->datakuro("pass", $mid); ?>" size="15" maxlength="20" />                    

                    &nbsp;</td>

                </tr>

                <tr>

                  <td width="43%">&nbsp;Nama 

                  Lengkap</td>

                  <td width="57%">:

                  <input maxlength="30" name="nama" size="20" value="<?= $db->datakuro("nama", $mid); ?>" />                  </td>

                </tr>

                <tr>

                  <td width="43%">&nbsp;eMail 

                  u/ Kontak</td>

                  <td width="57%">:

                  <input maxlength="30" name="email" size="30" value="<?= $db->datakuro("email", $mid); ?>" />                  </td>

                </tr>

                <tr>

                  <td width="43%">&nbsp;Alamat</td>

                  <td width="57%">:

                  <input maxlength="50" size="30" name="alamat" value="<?= $db->datakuro("alamat", $mid); ?>" />                  </td>

                </tr>

                <tr>

                  <td width="43%">&nbsp;Kota</td>

                  <td width="57%">:

                  <input maxlength="30" name="kota" size="20" value="<?= $db->datakuro("kota", $mid); ?>" />                  </td>

                </tr>

                <tr>

                  <td width="43%">&nbsp;Hand 

                  Phone &nbsp;</td>

                  <td width="57%">:

                  <input maxlength="15" name="hp" size="20" value="<?= $db->datakuro("hp", $mid); ?>" />                  </td>

                </tr>

                <tr>

                  <td height="36" colspan="2" align="center"><label>

                    <input type="submit"  value="SAVE" class="button">

                      

                    </label><label><input type="button" name="cancel" id="cancel" value="CANCEL" onClick="javascript:history.go(-1)" class="cancelbutton">

                  </label></td>

                </tr>

              </tbody>

            </table>

        </div></td>

      </tr>

    </table>

  </div>

</form>

<?	

	break;

	case submit :

		

		if($edit > 0) {

			

			if($password) {

				$pass = ($password);

				$db->update("produkro", "nama='$nama', pass='$pass', alamat='$alamat', kota='$kota',  email='$email',  hp='$hp'", "username='$mid'");

			} else{

				$db->update("produkro", "nama='$nama', alamat='$alamat', kota='$kota', email='$email', hp='$hp'", "username='$mid'");

			}	

	echo "<meta http-equiv='refresh' content='0;URL=?m=stockistordro&page=addnew&act=1&mid=$mid&edit=1'>";

		

			

	} else {

			$db->insert("produkro", "", "'', '$username', '$pass', '$nama', '$sponsor', '$email', '$tglahir', '$sex', '$alamat', '$kota', '$propinsi', '$kodepos', '$telepon', '$hp', '$bank', '$cabang', '$norek', '$anbank', '$rpadmin', '$clientdate', '','$status'"); 

		echo "<meta http-equiv='refresh' content='0;URL=?m=stockistordro'>";

	}		

			

	break;

	

	

	case delete :

		$db->delete("produkro", "kodeord='$kode'");

		echo "<meta http-equiv='refresh' content='0;URL=?m=stockistordro'>";

		

	break;	

	

	case activation :

		if($action == "Disable") {

		//$db->update("produkro", "status=0", "kodeord='$kode'");

		} else { 

		
		//ss$db->update("produkro", "status=1", "kodeord='$kode'");
		
		$sql = mysql_query("select id, username, nama, hp, jumlah, tgl, limite, bank, total, jenis, status from order_aktivasi where id='$kode'");
		
		$dta = mysql_fetch_row($sql);
		$userid= $dta[0];
		$userx= $dta[1];
		$usernama = $dta[2];
		$hpx = $dta[3];
		$jlhx = $dta[4];
		$jenisx = $dta[9];
		
		if ($jenisx == Paket ) {
		
		//aktivasi
		$db->aktivasidct($userx);
		$db->update("order_aktivasi", "status=1", "id='$kode'");
		
		} else if ($jenisx == TiketA ) {
		
		// cetak sn tiket 
$snpin = randomPassword(5);

for($i=0;$i<$jlhx;$i++) {
$db->insert("sn_card", "", "NULL, '$usernama', '$hpx', '".$snpin."', '0', '$clientdate','$clientdate'");

$message= "".$usernama." Berikut Pin Registrasi Anda ".$snpin." " ; 
$db->smsnotifikasi ($hpx, $message) ;

$db->update("order_aktivasi", "status=1", "id='$kode'");

}
	
} else if ($jenisx == PaketB ) {
		
		// cetak tiket dimember area
		} 
		
		
	}	
		
		

		echo "<meta http-equiv='refresh' content='0;URL=?m=stockistordro'>";

	break;

	

	case blokir :

		//echo "delete no $no";

		if($action == "Blocked") {

			$blocked = 1;

		} else {

			$blocked = 0;

		}		

		$db->update("produkro", "blokir='$blocked'", "username='$mid'");

		$db->aktivasioke($mid);

		

		echo "<meta http-equiv='refresh' content='0;URL=?m=stockistordro'>";

	break;	

	//----komisi--

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





if($keywrd) {

	$where = " and a.nama like '%$keywrd%' or a.username like '%$keywrd%' and a.status=1";

} else {

	$where = "";

}		

//$db->select("*", "stockistord", $kat);

	$numrows = $db->count_records("produkro", "status=1");	


	$db->select("a.username, a.nama, a.bank, a.sponsor, a.email, a.kota, a.tglaktif, b.paket", "produkro as a inner join upline as b on a.username=b.username", "a.status=1 and a.paket=1 $where", "a.nama", "", "", "$start, $limit");



?>

<fieldset>

<legend>KOMISI stockistord</legend>

<table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>

    <td width="58%"><form action="" method="post" name="form1" id="form3">

      <table width="100%" border="0" cellpadding="0" cellspacing="0">

        <tr>

          <td width="33%" align="right"><strong>Komisi  Bulan</strong> </td>

          <td width="67%"><label>

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

	echo " <select name=tahun size=1 class=form>";

//$bulan=array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

	$jthn=13;

	for($t=8;$t<$jthn;$t++) {

		$thn2 = 2002 + $t;	

		if($thn == $thn2) {

			$pil="selected";

			} else {

			$pil="";

			}

		

		echo "<option value='200$t' $pil>$thn2</option>";

	}

	echo "</select>";

		

		?>

            <input type="submit" name="Submit3" value="LIHAT KOMISI" class="tombol" />

          </label></td>

        </tr>

      </table>

    </form></td>

    <td width="42%" align="right"><form id="form4" name="form2" method="post" action="?m=stockistordro&amp;page=komisi" style="margin:0; padding:0">

      <label> Cari stockistord :

      <input name="keywrd" type="text" id="keywrd" />

</label>

      <label>

      <input name="bulan" type="hidden" id="bulan" value="<?= $bulan; ?>" />

      <input name="tahun" type="hidden" id="tahun" value="<?= $tahun; ?>" />

      <input type="submit" name="Submit4" value="CARI" />

      </label>

                    </form></td>

  </tr>

</table>

<table width="100%" border="0" align="center" cellpadding="5" cellspacing="0">

  <tr class="tbl_header">

    <td width="4%" align="center">#</td>

    <td width="18%" align="center">Username</td>

    <td width="21%" align="center">Data Rekening stockistord </td>

    <td width="13%" align="center">Bulan Ini  </td>

    <td width="14%" align="center">Dibayarkan</td>

    <td width="12%" align="center">SALDO</td>

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

	$nama = $db->result($i, "nama");

	$paket = $db->result($i, "paket");

	$bl0 = $bulan - 1;

	$jam = date("H:i:s");

	//$tgaktif = $db->result($i, "tglaktif"); 

	//$db->select("tglbayar", "komisi", "username='$user_session'", "tglbayar asc");

	$sql=mysql_query("select tglbayar from komisi where username='$mid' order by tglbayar asc");

	$row=mysql_fetch_row($sql);	

	$dtfrom0 = $row[0]; 

	$dtto0 = "$tahun-$bl0-31 23:59:59";

	$dtfrom = "$tahun-$bulan-01 00:00:00";

	$dtto = "$clientdate";

	

	$totalbayar = $db->bayarkomisi($username, "AND (tglbayar BETWEEN '$dtfrom0' AND '$dtto')");

	//$totkom = $db->totalkomisi($username, "AND status=1 AND (tglbayar BETWEEN '$dtfrom' AND '$dtto')");

	if($totalbayar > 0) {

		$link_hi = "<a href='?m=withdrawl&mid=$username&bulan=$bulan&tahun=$tahun'>".rupiah($totalbayar)."</a>";

	} else {

		$link_hi = 0;

	}	

	

	

	//if($db->totalkomisi($username, "AND status=0 AND (tglbayar BETWEEN '$dtfrom' AND '$dtto')") > 0) {

	if($paket > 1) {

		$totkom = $db->komisipaket($username, "AND (tglbayar BETWEEN '$dtfrom' AND '$dtto')");

		$totlalu = $db->komisipaket($username, "AND (tglbayar BETWEEN '$dtfrom0' AND '$dtto0')");

		$totsaldo = $db->komisipaket($username, "AND status=0 AND (tglbayar BETWEEN '$dtfrom0' AND '$dtto')") - $totalbayar;

			

	} else {

		$totkom = $db->totalkomisi($username, "AND (tglbayar BETWEEN '$dtfrom' AND '$dtto')");	

		$totlalu = $db->totalkomisi($username, "AND (tglbayar BETWEEN '$dtfrom0' AND '$dtto0')");

		$totsaldo = $db->totalkomisi($username, "AND status=0 AND (tglbayar BETWEEN '$dtfrom0' AND '$dtto')") - $totalbayar;

	}		

	

	

	if($totsaldo > 0) {

		$link_bayar = "<a href='?m=withdrawl&page=proses&mid=$username&jumlah=$totsaldo&w=0'>".rupiah($totsaldo)."</a>";

	} else {

		$link_bayar = 0;

	}		

?>

 

  <tr class="<?= $class; ?>">

    <td width="4%"><?= $nom; ?> </td>

    <td width="18%"><a href="?m=stockistordro&page=detilkomisi&mid=<?= $username; ?>&bulan=<?= $bulan; ?>&tahun=<?= $tahun; ?>"><?= $username; ?></a></td>

    <td align="right"><div align="left"></div>

      <div align="left">

       // <?= $db->result($i, "bank"); ?>

</div>

    </td>

    <td align="right"><?= rupiah($totkom); ?></td>

    <td align="right"><?= $link_hi; ?></td>

    <td align="right"><?= $link_bayar; ?></td>

  </tr>

  

<?

	//}

	}

?>	  

</table>

</fieldset>

<br />

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

  <a href="?m=stockistordro&page=komisi&bulan=<?= $bulan; ?>&tahun=<?= $tahun; ?>&show=1" style="font-size:10px; color:#0000CC"><< Awal </a> | <a href="?m=stockistordro&page=komisi&bulan=<?= $bulan; ?>&tahun=<?= $tahun; ?>&show=<?= $previous; ?>" style="font-size:10px; color:#0000CC">< Sebelumnya </a> |

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

[ <a href="?m=stockistordro&page=komisi&bulan=<?= $bulan; ?>&tahun=<?= $tahun; ?>&show=<?= $i; ?>" style="font-size:10px; color:#0000CC">

<?= $i; ?>

</a> ]

<?php

		

		}

	

	}



}



if ($display < $paging) {



	$next = $display + 1;

	

?>

| <a href="?m=stockistordro&page=komisi&bulan=<?= $bulan; ?>&tahun=<?= $tahun; ?>&show=<?= $next; ?>" style="font-size:10px; color:#0000CC">Selanjutnya ></a> | <a href="?m=stockistordro&page=komisi&bulan=<?= $bulan; ?>&tahun=<?= $tahun; ?>&show=<?= $paging; ?>" style="font-size:10px; color:#0000CC">Terakhir >></a>

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

	

	case detilkomisi :

	if($db->dataupline("paket", $mid) > 1) {

		include "komlev.php";

	} else {	

	$db->select("username, nama, sponsor, email, kota, tglaktif", "stockistord", "username='$mid'");

	

	?>

	<table width="80%" border="0" align="center" cellpadding="5" cellspacing="0">

      <tr class="tbl_header">

        <td colspan="2" align="center" style="padding:0"><strong>DETAIL  KOMISI : 

        <?= $mid; ?>

        s/d tgl <?= date("d-m-Y"); ?></strong></td>

      </tr>

      <tr>

        <td width="52%" align="right">Nama Lengkap : </td>

        <td width="48%"><b><?= $db->datakuro("nama", $mid); ?></b></td>

      </tr>

      <tr>

        <td align="right">Sponsor : </td>

        <td><?= $db->datakuro("sponsor", $mid)." (".$db->datakuro("nama", $db->datakuro("sponsor", $mid)).")"; ?></td>

      </tr>

      <tr>

        <td align="right">Tanggal Aktivasi : </td>

        <td><?= $db->datakuro("tglaktif", $mid); ?></td>

      </tr>

      <?







?>

    </table>

    <form action="" method="post" name="form1" id="form1">

      <table width="80%" border="0" align="center" cellpadding="2" cellspacing="0">

        <tr>

          <td width="45%"><div align="right">Komisi Bulan :<font color="#FFFFFF">_</font> 

        </div></td>

          <td width="55%"><label> 

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







	$tgaktif = $db->datakuro("tglaktif", $user_session); 







	//$dtfrom0 = $tgaktif; 







	//$dtto0 = "$tahun-$bl0-31 23:59:59";







	$dtfrom = "$tahun-$bulan-01 00:00:00";







	$dtto = "$tahun-$bulan-31 23:59:59";







		







		?>

        <input type="submit" name="Submit2" value="LIHAT KOMISI" class="tombol" />

        </label></td>

        </tr>

      </table>

    </form>

    <table width="80%" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#E7E5D9">

      <tr>

        <td bgcolor="#E7E5D9"><strong>(1) Komisi Sponsor </strong></td>

      </tr>

      <tr>

        <td bgcolor="#FCEFED"><table width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">

            <tr>

              <td width="4%" align="center" bgcolor="#F2F1EC"><strong>No.</strong></td>

              <td width="14%" align="center" bgcolor="#F2F1EC"><strong>Tanggal</strong></td>

              <td width="30%" align="center" bgcolor="#F2F1EC"><strong>Dari Username</strong></td>

              <td width="30%" align="center" bgcolor="#F2F1EC"><strong>Jenis Komisi </strong></td>

              <td width="22%" align="center" bgcolor="#F2F1EC"><strong>Komisi</strong></td>

            </tr>

            <?

				

	$sbl=mysql_query("select * from komisi where jenis='komsponsor' and username='$mid' and (tglbayar between '$dtfrom' and '$dtto') order by tglbayar");

	$nom=1;

	$totsponsor = 0;

	while($row=mysql_fetch_row($sbl)) {

		echo "<tr>

          <td align=right bgcolor=#FCEFED>$nom.</td>

           <td bgcolor=#FCEFED>".date("d-m-Y",strtotime($row[3]))."</td>

          <td bgcolor=#FCEFED>$row[7]</td>

		  <td bgcolor=#FCEFED>Komisi Sponsor</td>

          <td bgcolor=#FCEFED align=right>".rupiah($row[2])."</td>

        </tr>";

		$totsponsor = $totsponsor + $row[2];

		$nom++;

	}

	

	?>

            <tr>

              <td colspan="4" align="right" bgcolor="#E8E8E8">TOTAL KOMISI </td>

              <td bgcolor="#E8E8E8" align="right"><strong>

                <?= rupiah($totsponsor); ?>

              </strong></td>

            </tr>

        </table></td>

      </tr>

    </table>

    <table width="80%" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#E7E5D9">

      <tr>

        <td bgcolor="#E7E5D9"><strong>(2) Komisi Level </strong></td>

      </tr>

      <tr>

        <td bgcolor="#FCEFED"><table width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">

            <tr>

              <td width="4%" align="center" bgcolor="#F2F1EC"><strong>No.</strong></td>

              <td width="14%" align="center" bgcolor="#F2F1EC"><strong>Tanggal</strong></td>

              <td width="30%" align="center" bgcolor="#F2F1EC"><strong>Dari Username</strong></td>

              <td width="30%" align="center" bgcolor="#F2F1EC"><strong>Jenis Komisi </strong></td>

              <td width="22%" align="center" bgcolor="#F2F1EC"><strong>Komisi</strong></td>

            </tr>

            <?

			

	$sbl=mysql_query("select * from komisi where username='$mid' and (tglbayar between '$dtfrom' and '$dtto') order by tglbayar");

	$nom=1;

	$totlevel = 0;

	while($row=mysql_fetch_row($sbl)) {

		if(substr($row[6],0,6) == "komlev") {

		echo "<tr>

          <td align=right bgcolor=#FCEFED>$nom.</td>

          <td bgcolor=#FCEFED>".date("d-m-Y",strtotime($row[3]))."</td>

          <td bgcolor=#FCEFED>$row[7]</td>

		  <td bgcolor=#FCEFED>$row[6]</td>

          <td bgcolor=#FCEFED align=right>".rupiah($row[2])."</td>

        </tr>";

		$totlevel = $totlevel + $row[2];

		$nom++;

		}

	}

	

	

		$dtto2 = $dtfrom;

	$total0 = $db->totalkomisi($mid, "AND (tglbayar BETWEEN '$dtfrom2' AND '$dtto2')");

	?>

            <tr>

              <td colspan="4" align="right" bgcolor="#E8E8E8">TOTAL KOMISI </td>

              <td bgcolor="#E8E8E8" align="right"><strong>

                <?= rupiah($totlevel); ?>

              </strong></td>

            </tr>

        </table></td>

      </tr>

    </table>

    <p>&nbsp;</p>

    <p>&nbsp;</p>

    <table width="80%" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#E7E5D9">

      <tr>

        <td bgcolor="#E7E5D9"><strong>RINGKASAN</strong></td>

      </tr>

      <tr bgcolor="#FFFFFF">

        <td><table width="100%" border="0" cellspacing="0" cellpadding="2">

            <tr>

              <td width="13%" align="center">1</td>

              <td width="63%">Komisi Sponsor</td>

              <td width="24%" align="right"><?= rupiah($totsponsor); ?>              </td>

            </tr>

            <tr>

              <td align="center">2</td>

              <td>Komisi Level </td>

              <td align="right"><?= rupiah($totlevel); ?>              </td>

            </tr>

            <tr>

              <td colspan="2" align="right" bgcolor="#E8E8E8"><strong> TOTAL BULAN INI (

                    <?= $bulan0[$bulan-1]." $tahun"; ?>

            ) </strong> </td>

              <td align="right" bgcolor="#E8E8E8"><strong>

                <?

			//$totbln = $totblev + $bon_star + $broyalti + $unilevel;

			$saldo = $totsponsor + $totlevel;

			echo rupiah($saldo); 

			//----------total downlline--------

			$tki = stockistordkiri($user_session, "and status=1");

			$ttg = stockistordtengah($user_session, "and status=1");

			$tka = stockistordkanan($user_session, "and status=1");

			$tdl = $tki + $ttg + $tka;

			?>

              </strong></td>

            </tr>

        </table></td>

      </tr>

    </table>

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

 	$db->select("username", "stockistord", "username='$sponsorid' and status=1");

	

	if($db->num_rows() > 0) {

 ?>

      <p>Sponsor Username : <strong><?= $sponsorid; ?></strong><br />

      Sponsor Name : <strong><?= $db->datakuro("nama", $sponsorid); ?></strong></p>

      <p>Add New stockistord with this sponsor?</p>

      <p><a href="?m=join&amp;id=<?= $sponsorid; ?>&off=1">YES</a> | <a href="?m=stockistordro&page=addstockistord">NO</a></p>

      

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