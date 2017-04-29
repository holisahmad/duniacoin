<?PHP

if(isset( $_SESSION['user_session']))

  {

?>
<script type="text/javascript">
<!--
function confirmation(mid, page, action) {
	var answer = confirm("Are You sure to " + action +  " this Member: " + mid + " ?")
	if (answer){
		//alert("Bye bye!")
		window.location = "?e=member&page=" + page + "&mid=" + mid + "&action=" + action;
		
	}
	
}
//-->
</script>
<h2 align="center"><img src="../admin/images/icon-48-user.png" width="48" height="48" align="absmiddle" /> Member Manager</h2>
<div id="menu_button2">
  <ul>
    <li><a href="?e=member">All Member</a></li>
  </ul>
</div>

<?
switch($page) {
	default :
?>	
<?
//---pagination----------------
$limit = '250'; // How many results should be shown at a time
$scroll = '0'; // Do you want the scroll function to be on (1 = YES, 2 = NO)
$scrollnumber = '250'; // How many elements to the record bar are shown at a time when the scroll function is on
//-------------pagination--------------
if (!isset ($_GET['show'])) {

	$display = 1;
	
} else {

	$display = $_GET['show'];
	
}
$start = (($display * $limit) - $limit);


//if($uidm == 001) {

//$db->select("*", "member", $kat);
if($Submit == "CARI") {
	$filter = "nama like '%$keywrd%' or username like '%$keywrd%'";
	$where = "nama like '%$keywrd%' or username like '%$keywrd%'";
} else {
	
	$filter = "paket=1";
	$where = "paket=1";
}

$order = "id desc";
//---
		
if($kat == "") {
	$numrows = $db->count_records("member", "paket=1");
	$db->select("id, username, nama, hp, sponsor, tgl_daftar, upline, kota, paket_daftar, status, blokir", "member", "paket=1", $order, "", "", "$start, $limit");
	
} else {
	$numrows = $db->count_records("member", "status=$kat and paket=1");	
	$db->select("id, username, nama,  hp, sponsor, tgl_daftar, upline, kota, paket_daftar,status, blokir", "member", $where, $order, "", "", "$start, $limit");
}

if($kat == 1) {
	$sql0 = $db->count_records("member", "negara='Indonesia' and  status=1");
	$sql = $db->select("*", "member", "negara='Indonesia' status=1","id desc", "", "", "$start, $limit");
	//mysql_close();
} else if($kat == 2) {
	$sql0 = $db->count_records("member", "username like '%$keywrd%' or username like '%$keywrd%'");
	$sql = $db->select("*", "member", "username like '%$keywrd%' or username like '%$keywrd%'", "id desc", "", "", "$start, $limit");
} else if($kat == "0") {
	$sql0 = $db->count_records("member", "negara='Malaysia' $aktif");
	$sql = $db->select("*", "member", "negara='Malaysia' status=1", "id desc", "", "", "$start, $limit");
} else {
	$sql0 = $db->count_records("member", status=0);
	$sql = $db->select("*", "member", status=0, "id asc", "", "", "$start, $limit");
}					
	$numrows = $sql0;
	$sel = "selected";



?>
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td colspan="12" align="center" style="padding:0"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding:0; margin:0">
      <tr>
	  <td width="34%"><form action="" method="post" name="form1" id="form1" style="margin:0; padding:0">
          <label> Katagori Negara:
            <select name="select" onChange="location =  this.options[this.selectedIndex].value" class="form">
            <option value="?e=member" selected="selected" <? echo $pilih; ?>>Semua negara</option>
            <option value="?e=member&amp;kat=1&amp;sel3=<?= $sel; ?>" <? echo $sel3; ?>>Member Indonesia</option>
            <option value="?e=member&amp;kat=0&amp;sel2=<?= $sel; ?>" <? echo $sel2; ?>>Member Malaysia</option>
          </select>
          </label>&nbsp;&nbsp;
        Total: <b><?= $numrows; ?></b> orang
        </form></td>
	  
        <td width="35%"><form action="" method="post" name="form1" id="form1" style="margin:0; padding:0">
        </form></td>
        <td width="31%"><form id="form2" name="form2" method="post" action="?e=member&amp;kat=2" style="margin:0; padding:0">
          <label>
            Cari Member : 
            <input name="keywrd" type="text" id="keywrd" />
            </label>
          <label>
          <input type="submit" name="Submit" value="CARI" />
          </label>
        </form>        </td>
      </tr>
    </table></td>
  </tr>
  <tr bgcolor="#FF0000" class="tbl_header">
    <td width="3%" align="center">#</td>
    <td width="8%" align="center">Username</td>
    <td width="10%" align="center">Nama Lengkap</td>
    <td width="10%" align="center">Sponsor</td>
    <td width="10%" align="center">Upline</td>
	<td width="10%" align="center">Paket</td>
    <td width="13%" align="center">Kota</td>
    <td width="13%" align="center">Tgl Join</td>
    <td width="6%" align="center">Status</td>
    <td width="8%" align="center">Blokir</td>
    <td width="9%" align="center">Hapus</td>
  </tr>
<?


$j=$db->num_rows();
for($i=0;$i<$j;$i++) {
$nom = $i + 1 + $start;
	$lid = $i - 1;
	
	if($db->result($i, "status") > 0) {
		$aktif = "<a href='#' ', 'activation', 'Disable')\" style='cursor:hand'><img src='../admin/images/icon-16-checkin.png' title='Change to Disable' border=0 /></a>";
	} else {
		$aktif = "<a href='#' ', 'activation', 'Activated')\" style='cursor:hand'><img src='../admin/images/publish_x.png' title='Change to Active Member' border=0 /></a>";
	}
	
	if($db->result($i, "blokir") > 0) {
		$blokir = "<a href='#' onclick=\"confirmation('".$db->result($i, "username")."', 'blokir', 'UnBlocked')\" style='cursor:hand'><img src='../admin/images/icon-16-checkin.png' title='Change to Enable/UnBlocked' border=0 /></a>";
	} else {
		$blokir = "<a href='#' onclick=\"confirmation('".$db->result($i, "username")."', 'blokir', 'Blocked')\" style='cursor:hand'><img src='../admin/images/publish_x.png' title='Click here to Blocked this Member' border=0 /></a>";
	}
?>
 
  <tr class="<?= $class; ?>">
    <td width="3%"><?= $nom; ?> </td>
    <td width="8%" align="center"><?= $db->result($i, "username"); ?></td>
    <td align="center"><a href=""><?= $db->result($i, "nama"); ?></a></td>
    
    <td align="center"><?= $db->result($i, "sponsor"); ?></td>
    <td align="center"><?= $db->result($i, "upline"); ?></td>
	<td align="center"><?= $db->result($i, "paket_daftar"); ?></td>
    <td align="center"><?= $db->result($i, "kota"); ?></td>
    <td align="center"><?= date("d-m-Y", strtotime($db->result($i, "tgl_daftar"))); ?></td>
    <td align="center"><?= $aktif; ?></td>
    <td align="center"><?= $blokir; ?></td>
    <td align="center"><img src="../admin/images/icon-32-delete_resize.png" width="17" height="22" border="0" title="Untuk Menghapus Member" /></td>
  </tr>
<?
	}
?>	  
</table>
<br />

<table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td align="center"><?php

//}
//

$paging = ceil ($numrows / $limit);

// Display the navigation
if ($display > 1) {
	
	$previous = $display - 1;
	
?>
        <a href="?e=member&amp;kat=<?= $kat; ?>&amp;show=1" style="font-size:10px; color:#0000CC">&lt;&lt; Awal </a> | <a href="?e=member&amp;kat=<?= $kat; ?>&amp;show=<?= $previous; ?>" style="font-size:10px; color:#0000CC">&lt; Sebelumnya </a> |
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
      [ <a href="?e=member&amp;kat=<?= $kat; ?>&amp;show=<?= $i; ?>" style="font-size:10px; color:#0000CC">
        <?= $i; ?>
        </a> ]
      <?php
		
		}
	
	}

}

if ($display < $paging) {

	$next = $display + 1;
	
?>
      | <a href="?e=member&amp;kat=<?= $kat; ?>&amp;show=<?= $next; ?>" style="font-size:10px; color:#0000CC">Selanjutnya &gt;</a> | <a href="?e=member&amp;kat=<?= $kat; ?>&amp;show=<?= $paging; ?>" style="font-size:10px; color:#0000CC">Terakhir &gt;&gt;</a>
      <?php

}
//
?>
    </td>
  </tr>
</table>
<p>&nbsp;</p>
<p>
  <?
	break;
	case addnew :
	
?>
</p>
<p>&nbsp; </p>
<form action="?e=member&amp;page=submit" method="post">

  <div align="left">
    <table width="70%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#EDEDE9" id="AutoNumber1" style="border-collapse: collapse">
      <tr bgcolor="#FF0000" class="tbl_header">
        <td width="100%" align="center"><?
		  if($act == 1 or $act) {
?>
  <div id="notice"><img src="../admin/images/notice-info.png" width="29" height="29" align="absmiddle" />Data telah berhasil diupdate ! </div>
	  <?
	}
	?>
              
              
          <b><font face="Arial">UPDATE 
        DATA MEMBER DI SINI</font></b></td>
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
                      
                    <input name="mid" type="hidden" id="mid" value="<?= $mid; ?>" size="20" />                  </td>
                </tr>
                <tr>
                  <td width="43%">&nbsp;Password</td>
                  <td width="57%">:
                    <input name="password" type="text" value="<?= $db->dataku("pass", $mid); ?>" size="15" maxlength="20" />                    
                    &nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;Token Transaksi </td>
                  <td>:
                    <input name="pin" type="text" value="<?= $db->dataku("pin", $mid); ?>" size="15" maxlength="20" />
                    &nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;Sponsor&nbsp;</td>
                  <td>:   <input name="sponsor" type="text" value="<?= $db->dataku("sponsor", $mid); ?>" size="15" maxlength="20" />                </td>
                </tr>
                <tr>
                  <td>&nbsp;Upline&nbsp;</td>
                  <td>: <?= "<a href='?e=member&page=addnew&edit=1&mid=".$db->dataku("upline", $mid)."'>".$db->dataku("upline", $mid)." (".$db->dataku("nama", $db->dataku("upline", $mid)).")"; ?>                  </td>
                </tr>
                <tr>
                  <td>&nbsp;Email</td>
                  <td>:
                    <input maxlength="30" name="email" size="20" value="<?= $db->dataku("email", $mid); ?>" />
                  </td>
                </tr>
                <tr>
                  <td width="43%">&nbsp;Nama 
                  Lengkap</td>
                  <td width="57%">:
                  <input maxlength="30" name="nama" size="20" value="<?= $db->dataku("nama", $mid); ?>" />                  </td>
                </tr>
                <tr>
                  <td width="43%">&nbsp;Kota</td>
                  <td width="57%">:
                  <input maxlength="30" name="kota" size="20" value="<?= $db->dataku("kota", $mid); ?>" />                  </td>
                </tr>
                <tr>
                  <td width="43%">&nbsp;Hand 
                  Phone &nbsp;</td>
                  <td width="57%">:
                  <input maxlength="15" name="hp" size="20" value="<?= $db->dataku("hp", $mid); ?>" />                  </td>
                </tr>
                <tr>
                  <td>&nbsp;Nama Bank &nbsp;</td>
                  <td>:
                    <input name="bank" size="20" value="<?= $db->dataku("bank", $mid); ?>" />                  </td>
                </tr>
                <tr>
                  <td>&nbsp;Nomor Rekening &nbsp;</td>
                  <td>:
                    <input name="norek" size="30" value="<?= $db->dataku("norek", $mid); ?>" />                  </td>
                </tr>
                <tr>
                  <td>&nbsp;Rek Atas Nama&nbsp;</td>
                  <td>:
                    <input name="an" size="25" value="<?= $db->dataku("an", $mid); ?>" />                  </td>
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
				$db->update("member", "nama='$nama', pass='$pass', sponsor='$sponsor', pin='$pin', email='$email', kota='$kota', hp='$hp', bank='$bank', norek='$norek', an='$an'", "username='$mid'");
				
				$db->update("upline", "sponsor='$sponsor'",  "username='$mid'");
				
				
			} else{
				$db->update("member", "nama='$nama', pin='$pin', kota='$kota', email='$email', hp='$hp', bank='$bank', norek='$norek', an='$an'", "username='$mid'");
			}	
	echo "<meta http-equiv='refresh' content='0;URL=?e=member&page=addnew&act=1&mid=$mid&edit=1'>";
		
			
	} else {
		echo "<meta http-equiv='refresh' content='0;URL=?e=member'>";
	}		
			
	break;
	
	
	case delete :
		$up = $db->dataupline("upline0", $mid);
		$upli = $db->dataupline("upline0", $mid);
		$posisimid = $db->dataupline("posisi", $mid);
		$spon = $db->dataupline("sponsor", $mid);
		
		$db->update("upline", "$posisimid=''", "username='$upli'");
		
		$db->hapusjaringan($mid);
		$db->hapusreward($mid);
		
		for($i=0;$i<200;$i++) {
					$uplie = $db->dataupline("upline$i", $mid);
					$db->hapusjaringan($uplie);
					$db->hapusreward($uplie);
		}

				$db->delete("member", "username='$mid'");
				$db->delete("transaksi", "username='$mid'");
				$db->delete("komisi", "username='$mid'");
				$db->delete("komisi", "dari='$mid'");
				$db->delete("upline", "username='$mid'");
				
			
				
		echo "<meta http-equiv='refresh' content='0;URL=?e=member'>";
	break;	
	
	case activation :
		$domain=$db->config("domain");
		$rp = $db->dataku("adminrp", $mid);
		$spon = $db->dataupline("sponsor", $mid);
		$up = $db->dataupline("upline0", $mid);
		$posisie = $db->dataupline("posisi", $mid);
		$posisijr = $db->dataupline("posisi", $up);
		if($action == "Disable") {
				$db->update("member", "status=0", "username='$mid'");
		} else { 
			$db->aktivasi($mid);

			$db->insert("transaksi", "", "'', '$kode', '$mid', '$rp', '$clientdate', 'Aktivasi Member: $mid', 1");	
				//-----------email------------
		$subject2 ="Aktivasi Member Baru $domain";
		$subject3 ="Aktivasi Downline Anda di $domain";
		$subjectweb ="Tembusan Aktivasi Member Baru di $domain";
		$headers2="From: Admin $domain<".$db->config("email").">\nX-Sender: ".$db->config("email")."\n";
		$sponsor = $db->dataku("sponsor", $mid);
		$email = $db->dataku("email", $mid);
		$domain = $db->config("domain");
		$s_isimail="Selamat, Anda telah mendapatkan member baru yang telah diaktivasi keanggotannya.\n"
					."Berikut data member tersebut :\n"
					."User ID : $mid\n"
					."Nama : ".$db->dataku("nama", $mid)."\n"
					."Email : $email\n"
					."Tanggal Aktivasi : $clientdate\n"	
					."Web duplikasi : http://$domain/?id=$mid\n"
					."Member tersebut telah melakukan pembayaran dan resmi menjadi member $domain.\n\n"
					."Silahkan lakukan pengecekan ke member area.\n"
					."Klik disini untuk login: http://$domain/?id=$sponsor&m=login\n\n"
					."Salam Sukses Selalu\n\nAdmin $domain\n(".$db->config("name").")";
					
		$web_isimail="Ada member baru di $domain yang telah diaktivasi keanggotannya.\n"
					."Berikut data member tersebut :\n"
					."User ID : $mid\n"
					."Passw : ".$db->dataku("pass", $mid)."\n"
					."Nama : ".$db->dataku("nama", $mid)."\n"
					."Email : $email\n"
					."Tanggal Aktivasi : $clientdate\n"	
					."Web duplikasi : http://$domain/?id=$mid\n"
					."Member tersebut telah melakukan pembayaran dan resmi menjadi member $domain.\n\n"
					."Silahkan lakukan pengecekan ke member area.\n"
					."Klik disini untuk login: http://$domain/?id=$sponsor&m=login\n\n"
					."Salam Sukses Selalu\n\nAdmin $domain\n(".$db->config("name").")";
		
		
		$mailtombr="Transfer Anda telah kami terima dan keanggotaan Anda telah diaktivasi.\n"
				."Kini Anda telah menjadi Active Member sehingga Anda bisa memanfaatkan semua fasilitas yang kami sediakan."	
				."Berikut data keanggotaan anda :\n\n"
				."Username : $mid\n"
				."Nama : ".$db->dataku("nama", $mid)."\n"
				."Alamat : ".$db->dataku("alamat", $mid)."\n"
				."Kota : ".$db->dataku("kota", $mid)."\n"
				."Telepon : ".$db->dataku("nama", $mid)."\n"
				."HP : ".$db->dataku("hp", $mid)."\n"
				."E-mail : $email\n"
				."Sponsor : ".$db->dataku("sponsor", $mid)." (".$db->dataku("nama", $sponsor).")\n\n"	
				."Bank : ".$db->dataku("bank", $mid)."\n"	
				."Tanggal Aktivasi : $clientdate\n\n"
				."Web duplikasi : http://$domain/?id=$mid\n\n" 
				."Harap segera melengkapi data BANK ANDA agar dapat digunakan untuk mentransfer penghasilan anda. Segera login ke member area: http://$domain/?id=$mid&m=login\n\n"
				."Terima kasih dan Salam Sukses Selalu.\n\n"
				."Pengelola $domain";		
					
		//$emailsp = $db->dataku("email", $sponsor);
		//@mail($email, $subject2, $mailtombr, $headers2); //---email to mbr ybs
		//@mail($emailsp, $subject3, $s_isimail, $headers2); //---email to sponsor
		//@mail($emailweb, $subjectweb, $web_isimail, $header2); //---email to sponsor
	//-------input ke tabel komisi------
				
			
	
}
		echo "<meta http-equiv='refresh' content='0;URL=?e=member'>";
	break;
	
	case blokir :
		if($action == "Blocked") {
			$blocked = 1;
		} else {
			$blocked = 0;
		}		
		$db->update("member", "blokir='$blocked'", "username='$mid'");
		
		echo "<meta http-equiv='refresh' content='0;URL=?e=member'>";
	break;	
	//----komisi--
	case komisi :
	//---pagination----------------
$limit = '100'; // How many results should be shown at a time
$scroll = '0'; // Do you want the scroll function to be on (1 = YES, 2 = NO)
$scrollnumber = '100'; // How many elements to the record bar are shown at a time when the scroll function is on
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
//$db->select("*", "member", $kat);
	$numrows = $db->count_records("member", "status=1");	
	$db->select("a.username, a.nama, a.bank, a.norek, a.an, a.sponsor, a.kota, a.tglaktif, b.paket", "member as a inner join upline as b on a.username=b.username", "a.status=1 and a.paket=1 $where", "a.nama", "", "", "$start, $limit");

?>
<fieldset>
<legend>KOMISI MEMBER</legend>
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
    <td width="42%" align="right"><form id="form4" name="form2" method="post" action="?e=member&amp;page=komisi" style="margin:0; padding:0">
      <label> Cari Member :
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
    <td width="21%" align="center">Data Rekening Member </td>
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
	
	$totalbayar = $db->bayarkomisi($username, "");
	//$totkom = $db->totalkomisi($username, "AND status=1 AND (tglbayar BETWEEN '$dtfrom' AND '$dtto')");
	if($totalbayar > 0) {
		$link_hi = "<a href='?e=withdrawl&mid=$username&bulan=$bulan&tahun=$tahun'>".rupiah($totalbayar)."</a>";
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
		$totsaldo = $db->totalkomisi($username, "AND status=0") - $totalbayar;
	}		
	
	
	if($totsaldo > 0) {
		$link_bayar = "<a href='?e=withdrawl&page=proses&mid=$username&jumlah=$totsaldo&w=0'>".rupiah($totsaldo)."</a>";
	} else {
		$link_bayar = 0;
	}		
?>
 
  <tr class="<?= $class; ?>">
    <td width="4%"><?= $nom; ?> </td>
    <td width="18%"><a href="?e=member&page=detilkomisi&mid=<?= $username; ?>&bulan=<?= $bulan; ?>&tahun=<?= $tahun; ?>"><?= $username; ?></a></td>
    <td align="right"><div align="left">
        <?= $db->result($i, "bank"); ?> - <?= $db->result($i, "norek"); ?> - <?= $db->result($i, "an"); ?>
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
  <a href="?e=member&page=komisi&bulan=<?= $bulan; ?>&tahun=<?= $tahun; ?>&show=1" style="font-size:10px; color:#0000CC"><< Awal </a> | <a href="?e=member&page=komisi&bulan=<?= $bulan; ?>&tahun=<?= $tahun; ?>&show=<?= $previous; ?>" style="font-size:10px; color:#0000CC">< Sebelumnya </a> |
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
[ <a href="?e=member&page=komisi&bulan=<?= $bulan; ?>&tahun=<?= $tahun; ?>&show=<?= $i; ?>" style="font-size:10px; color:#0000CC">
<?= $i; ?>
</a> ]
<?php
		
		}
	
	}

}

if ($display < $paging) {

	$next = $display + 1;
	
?>
| <a href="?e=member&page=komisi&bulan=<?= $bulan; ?>&tahun=<?= $tahun; ?>&show=<?= $next; ?>" style="font-size:10px; color:#0000CC">Selanjutnya ></a> | <a href="?e=member&page=komisi&bulan=<?= $bulan; ?>&tahun=<?= $tahun; ?>&show=<?= $paging; ?>" style="font-size:10px; color:#0000CC">Terakhir >></a>
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
	//----komisi--
	case komisibulanan :
	//---pagination----------------
$limit = '1000'; // How many results should be shown at a time
$scroll = '0'; // Do you want the scroll function to be on (1 = YES, 2 = NO)
$scrollnumber = '1000'; // How many elements to the record bar are shown at a time when the scroll function is on


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
//$db->select("*", "member", $kat);
	$numrows = $db->count_records("member", "status=1");	
	$db->select("a.username, a.nama, a.bank, a.norek, a.an, a.sponsor, a.kota, a.tglaktif, b.paket", "member as a inner join upline as b on a.username=b.username", "a.status=1 and a.paket=1 $where", "a.nama", "", "", "$start, $limit");

?>
<fieldset>
<legend>KOMISI BULANAN MEMBER REPEATE ORDER </legend>
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
    <td width="42%" align="right"><form id="form4" name="form2" method="post" action="?e=member&amp;page=komisibulanan" style="margin:0; padding:0">
      <label> Cari Member :
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
    <td width="21%" align="center">Data Rekening Member </td>
    <td width="36%" align="center">Dibayarkan</td>
    <td width="21%" align="center">SALDO</td>
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
	
	
	$sql=mysql_query("select tglbayar from komisi_planb where username='$mid' order by tglbayar asc");
	$row=mysql_fetch_row($sql);	
	$dtfrom0 = $row[0]; 
	$dtto0 = "$tahun-$bl0-31 23:59:59";
	$dtfrom = "$tahun-$bulan-01 00:00:00";
	$dtto = "$clientdate";
	
	$totalbayarb = $db->bayarkomisibulanan($username, "");
	//$totkom = $db->totalkomisi($username, "AND status=1 AND (tglbayar BETWEEN '$dtfrom' AND '$dtto')");
	if($totalbayarb > 0) {
		$link_hib = "<a href='?e=withdrawlbulanan&mid=$username&bulan=$bulan&tahun=$tahun'>".rupiah($totalbayarb)."</a>";
	} else {
		$link_hib = 0;
	}	
	
	
	//if($db->totalkomisi($username, "AND status=0 AND (tglbayar BETWEEN '$dtfrom' AND '$dtto')") > 0) {
	if($paket > 1) {
			
	} else {
		$totsaldob = $db->totalkomisibulanan($username, "") - $totalbayarb;
	}		
	
	
	if($totsaldob > 55000) {
		$link_bayarb = "<a href='?e=withdrawlbulanan&page=proses&mid=$username&jumlah=$totsaldob&w=0'>".rupiah($totsaldob)."</a>";
	} else {
		$link_bayarb = 0;
	}		
?>
 
  <tr class="<?= $class; ?>">
    <td width="4%"><?= $nom; ?> </td>
    <td width="18%"><?= $username; ?></td>
    <td align="right"><div align="left">
        <?= $db->result($i, "bank"); ?> - <?= $db->result($i, "norek"); ?> - <?= $db->result($i, "an"); ?>
</div>    </td>
    <td align="right"><?= $link_hib; ?></td>
    <td align="right"><?= $link_bayarb; ?></td>
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
  <a href="?e=member&page=komisibulanan&bulan=<?= $bulan; ?>&tahun=<?= $tahun; ?>&show=1" style="font-size:10px; color:#0000CC"><< Awal </a> | <a href="?e=member&page=komisibulanan&bulan=<?= $bulan; ?>&tahun=<?= $tahun; ?>&show=<?= $previous; ?>" style="font-size:10px; color:#0000CC">< Sebelumnya </a> |
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
[ <a href="?e=member&page=komisibulanan&bulan=<?= $bulan; ?>&tahun=<?= $tahun; ?>&show=<?= $i; ?>" style="font-size:10px; color:#0000CC">
<?= $i; ?>
</a> ]
<?php
		
		}
	
	}

}

if ($display < $paging) {

	$next = $display + 1;
	
?>
| <a href="?e=member&page=komisibulanan&bulan=<?= $bulan; ?>&tahun=<?= $tahun; ?>&show=<?= $next; ?>" style="font-size:10px; color:#0000CC">Selanjutnya ></a> | <a href="?e=member&page=komisibulanan&bulan=<?= $bulan; ?>&tahun=<?= $tahun; ?>&show=<?= $paging; ?>" style="font-size:10px; color:#0000CC">Terakhir >></a>
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
	$db->select("username, nama, sponsor, kota, tglaktif", "member", "username='$mid'");
	
	?>
	<table width="80%" border="0" align="center" cellpadding="5" cellspacing="0">
      <tr class="tbl_header">
        <td colspan="2" align="center" style="padding:0"><strong>DETAIL  KOMISI : 
        <?= $mid; ?>
        s/d tgl <?= date("d-m-Y"); ?></strong></td>
      </tr>
      <tr>
        <td width="52%" align="right">Nama Lengkap : </td>
        <td width="48%"><b><?= $db->dataku("nama", $mid); ?></b></td>
      </tr>
      <tr>
        <td align="right">Sponsor : </td>
        <td><?= $db->dataku("sponsor", $mid)." (".$db->dataku("nama", $db->dataku("sponsor", $mid)).")"; ?></td>
      </tr>
      <tr>
        <td align="right">Tanggal Aktivasi : </td>
        <td><?= $db->dataku("tglaktif", $mid); ?></td>
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



	$tgaktif = $db->dataku("tglaktif", $user_session); 



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
        <td bgcolor="#E7E5D9"><strong>(2) Komisi Pasangan </strong></td>
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
				
	$sbl=mysql_query("select * from komisi where jenis='kompasangan' and username='$mid' and bayar > 0 and (tglbayar between '$dtfrom' and '$dtto') order by tglbayar");
	$nom=1;
	$totpas = 0;
	while($row=mysql_fetch_row($sbl)) {
		echo "<tr>
          <td align=right bgcolor=#FCEFED>$nom.</td>
           <td bgcolor=#FCEFED>".date("d-m-Y",strtotime($row[3]))."</td>
          <td bgcolor=#FCEFED>$row[7]</td>
		  <td bgcolor=#FCEFED>Komisi Pasangan</td>
          <td bgcolor=#FCEFED align=right>".rupiah($row[2])."</td>
        </tr>";
		$totpas = $totpas + $row[2];
		$nom++;
	}
	
	?>
            <tr>
              <td colspan="4" align="right" bgcolor="#E8E8E8">TOTAL KOMISI </td>
              <td bgcolor="#E8E8E8" align="right"><strong>
                <?= rupiah($totpas); ?>
              </strong></td>
            </tr>
        </table></td>
      </tr>
    </table>
    <table width="80%" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#E7E5D9">
      <tr>
        <td bgcolor="#E7E5D9"><strong>(3) Komisi Stockist</strong></td>
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
				
	$sbl=mysql_query("select * from komisi where jenis='komsto' and username='$mid' and (tglbayar between '$dtfrom' and '$dtto') order by tglbayar");
	$nom=1;
	$totsto = 0;
	while($row=mysql_fetch_row($sbl)) {
		echo "<tr>
          <td align=right bgcolor=#FCEFED>$nom.</td>
           <td bgcolor=#FCEFED>".date("d-m-Y",strtotime($row[3]))."</td>
          <td bgcolor=#FCEFED>$row[7]</td>
		  <td bgcolor=#FCEFED>Komisi Stockist</td>
          <td bgcolor=#FCEFED align=right>".rupiah($row[2])."</td>
        </tr>";
		$totsto = $totsto + $row[2];
		$nom++;
	}
	
	?>
            <tr>
              <td colspan="4" align="right" bgcolor="#E8E8E8">TOTAL KOMISI </td>
              <td bgcolor="#E8E8E8" align="right"><strong>
                <?= rupiah($totsto); ?>
              </strong></td>
            </tr>
        </table></td>
      </tr>
    </table>
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
              <td>Komisi Pasangan </td>
              <td align="right"><?= rupiah($totpas); ?>
              </td>
            </tr>
            <tr>
              <td align="center">3</td>
              <td>Komisi Stockist</td>
              <td align="right"><?= rupiah($totsto); ?>              </td>
            </tr>
            <tr>
              <td colspan="2" align="right" bgcolor="#E8E8E8"><strong> TOTAL BULAN INI (
                <?= $bulan0[$bulan-1]." $tahun"; ?>
                ) </strong> </td>
              <td align="right" bgcolor="#E8E8E8"><strong>
                <?
			//$totbln = $totblev + $bon_star + $broyalti + $unilevel;
			$saldo = $totsponsor + $totpas + $totsto;
			echo rupiah($saldo); 
			//----------total downlline--------
			?>
              </strong></td>
            </tr>
        </table></td>
      </tr>
    </table>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
<p>&nbsp;</p>

<?
}
	break;
	
	case detilkomisibulanan :
	if($db->dataupline("paket", $mid) > 1) {
		include "komlev.php";
	} else {	
	$db->select("username, nama, sponsor, kota, tglaktif", "member", "username='$mid'");
	
	?>
	<table width="80%" border="0" align="center" cellpadding="5" cellspacing="0">
      <tr class="tbl_header">
        <td colspan="2" align="center" style="padding:0"><strong>DETAIL  KOMISI : 
        <?= $mid; ?>
        s/d tgl <?= date("d-m-Y"); ?></strong></td>
      </tr>
      <tr>
        <td width="52%" align="right">Nama Lengkap : </td>
        <td width="48%"><b><?= $db->dataku("nama", $mid); ?></b></td>
      </tr>
      <tr>
        <td align="right">Sponsor : </td>
        <td><?= $db->dataku("sponsor", $mid)." (".$db->dataku("nama", $db->dataku("sponsor", $mid)).")"; ?></td>
      </tr>
      <tr>
        <td align="right">Tanggal Aktivasi : </td>
        <td><?= $db->dataku("tglaktif", $mid); ?></td>
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



	$tgaktif = $db->dataku("tglaktif", $user_session); 



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
        <td bgcolor="#E7E5D9"><strong>(1) Komisi Generasi RO Plan B </strong></td>
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
				
	$sbl=mysql_query("select * from komisi_planb where jenis='planb' and username='$mid' and (tglbayar between '$dtfrom' and '$dtto') order by tglbayar");
	$nom=1;
	$totplanb = 0;
	while($row=mysql_fetch_row($sbl)) {
		echo "<tr>
          <td align=right bgcolor=#FCEFED>$nom.</td>
           <td bgcolor=#FCEFED>".date("d-m-Y",strtotime($row[3]))."</td>
          <td bgcolor=#FCEFED>$row[7]</td>
		  <td bgcolor=#FCEFED>Komisi RO Plan B</td>
          <td bgcolor=#FCEFED align=right>".rupiah($row[2])."</td>
        </tr>";
		$totplanb = $totplanb + $row[2];
		$nom++;
	}
	
	?>
            <tr>
              <td colspan="4" align="right" bgcolor="#E8E8E8">TOTAL KOMISI </td>
              <td bgcolor="#E8E8E8" align="right"><strong>
                <?= rupiah($totplanb); ?>
              </strong></td>
            </tr>
        </table></td>
      </tr>
</table>
    <table width="80%" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#E7E5D9">
      <tr>
        <td bgcolor="#E7E5D9"><strong>RINGKASAN</strong></td>
      </tr>
      <tr bgcolor="#FFFFFF">
        <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
            <tr>
              <td width="13%" align="center">1</td>
              <td width="63%">Komisi Generasi RO Plan B </td>
              <td width="24%" align="right"><?= rupiah($totplanb); ?>              </td>
            </tr>
            <tr>
              <td colspan="2" align="right" bgcolor="#E8E8E8"><strong> TOTAL BULAN INI (
                <?= $bulan0[$bulan-1]." $tahun"; ?>
                ) </strong> </td>
              <td align="right" bgcolor="#E8E8E8"><strong>
                <?
			//$totbln = $totblev + $bon_star + $broyalti + $unilevel;
			$saldo = $totplanb;
			echo rupiah($saldo); 
			//----------total downlline--------
			?>
              </strong></td>
            </tr>
        </table></td>
      </tr>
    </table>

  <?
  }
	break;
	
	case addmember :
?>

<?	
	break;
}
?>	
<?
} else {
echo "<meta http-equiv=\"refresh\" content=\"1; url=illegal.html\">";
}
?>