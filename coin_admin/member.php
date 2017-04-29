 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script>
  $(function() {
  
  $( "#datepicker" ).datepicker({dateFormat: "dd-mm-yy"});
   
  });
  </script>

<?PHP

if(isset( $_SESSION['valid_admin']))

  {

?>
<script type="text/javascript">
<!--
function confirmation(mid, page, action) {
	var answer = confirm("Are You sure to " + action +  " this Member: " + mid + " ?")
	if (answer){
		//alert("Bye bye!")
		window.location = "?m=member&page=" + page + "&mid=" + mid + "&action=" + action;
		
	}
	
}
//-->
</script>
<h2 align="center"><img src="images/icon-48-user.png" width="48" height="48" align="absmiddle" /> Member Manager</h2>
<div id="menu_button2">
  <ul>
    <li><a href="?m=member">All Member</a></li>
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
	
	$filter = "jlh_hari > 0";
	$where = "jlh_hari > 0";
}

$order = "id desc";
//---
		
if($kat == "") {
	$numrows = $db->count_records("member", "paket_daftar > 0");
	$db->select("id, username, nama, hp,kunci, sponsor, tgl_daftar, upline, kota, paket_daftar, jlh_hari, tgl_reinves, payment, status, blokir", "member", "jlh_hari > 0", $order, "", "", "$start, $limit");
	
} else {
	$numrows = $db->count_records("member", "status=$kat and paket > 0");	
	$db->select("id, username, nama,  hp, kunci, sponsor, tgl_daftar, upline, kota, paket_daftar , jlh_hari, tgl_reinves, payment, status, blokir", "member", $where, $order, "", "", "$start, $limit");
}
?>
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td colspan="12" align="center" style="padding:0"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding:0; margin:0">
      <tr>
        <td width="63%"><form action="" method="post" name="form1" id="form1" style="margin:0; padding:0">
        </form></td>
        <td width="37%"><form id="form2" name="form2" method="post" action="?m=member&amp;kat=2" style="margin:0; padding:0">
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
  <tr class="tbl_header">
    <td width="2%" align="center">#</td>
    <td width="7%" align="center">Username</td>
    <td width="9%" align="center">Nama Lengkap</td>
    <td width="6%" align="center">Jaringan</td>
    <td width="9%" align="center">ROI</td>
    <td width="8%" align="center">Sponsor</td>
    <td width="9%" align="center">Jlh Hari </td>
	<td width="9%" align="center">Paket</td>
    <td width="6%" align="center">Kota</td>
    <td width="8%" align="center">Tgl Join</td>
    <td width="7%" align="center">Tgl Reinvest</td>
    <td width="6%" align="center">Status</td>
	 <td width="6%" align="center">Wd</td>
    <td width="14%" align="center">Hapus</td>
  </tr>
<?


$j=$db->num_rows();
for($i=0;$i<$j;$i++) {
$nom = $i + 1 + $start;
	$lid = $i - 1;
	
	if($db->result($i, "status") > 0) {
	
		$aktif = "<a href='#' onclick=\"confirmation('".$db->result($i, "username")."', 'activation', 'Disable')\" style='cursor:hand'><img src='images/icon-16-checkin.png' title='Change to Disable' border=0 /></a>";
		
	} else {
		$aktif = "<a href='#'onclick=\"confirmation('".$db->result($i, "username")."', 'activation', 'Activated')\" style='cursor:hand'><img src='images/publish_x.png' title='Change to Disable' border=0 /></a>"; 
		
	}
	
	if($db->result($i, "blokir") > 0) {
		$blokir = "<a href='#' onclick=\"confirmation('".$db->result($i, "username")."', 'blokir', 'UnBlocked')\" style='cursor:hand'><img src='images/icon-16-checkin.png' title='Change to Enable/UnBlocked' border=0 /></a>";
	} else {
		$blokir = "<a href='#' onclick=\"confirmation('".$db->result($i, "username")."', 'blokir', 'Blocked')\" style='cursor:hand'><img src='images/publish_x.png' title='Click here to Blocked this Member' border=0 /></a>";
	}
?>
 
  <tr class="<?= $class; ?>">
    <td width="2%"><?= $nom; ?> </td>
    <td width="7%" align="center"><?= $db->result($i, "username"); ?></td>
    <td align="center"><a href="?m=member&page=addnew&edit=1&mid=<?= $db->result($i, "username"); ?>"><?= $db->result($i, "nama"); ?></a></td>
    <td><div align="center"><a href="#null" onclick="newWindow('jaringan.php?page=tree2&amp;mid=<?= $db->result($i, "username"); ?>','','750','650','resizable,scrollbars,status')"><img src="images/group.png" width="16" height="16" border="0" title="Jaringan Di Bawah Anda" /></a> | <a href="#null" onclick="newWindow('newgenealogy.php?mid=<?= $db->result($i, "username"); ?>','','750','650','resizable,scrollbars,status')"><img src="images/sitemap_color.png" width="16" height="16" border="0" title="Diagram Jaringan" /></a></div></td>
    <td align="center"><?= ($db->result($i, "kunci")==1)?"Free":"Active"; ?></td>
    <td align="center"><?= $db->result($i, "sponsor"); ?></td>
    <td align="center"><?= $db->result($i, "jlh_hari"); ?></td>
	<td align="center"><?= potong($db->result($i, "paket_daftar")); ?></td>
    <td align="center"><?= $db->result($i, "kota"); ?></td>
    <td align="center"><?= date("d-m-Y", strtotime($db->result($i, "tgl_daftar"))); ?></td>
    <td align="center"><?= date("d-m-Y", strtotime($db->result($i, "tgl_reinves"))); ?></td>
    <td align="center"><?= $aktif; ?></td>
    <td align="center"><?= $db->result($i, "payment"); ?></td>
	 <td align="center"><img src="images/icon-32-delete_resize.png" width="17" height="22" border="0" title="Untuk Menghapus Member" /></td>
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
        <a href="?m=member&amp;kat=<?= $kat; ?>&amp;show=1" style="font-size:10px; color:#0000CC">&lt;&lt; Awal </a> | <a href="?m=member&amp;kat=<?= $kat; ?>&amp;show=<?= $previous; ?>" style="font-size:10px; color:#0000CC">&lt; Sebelumnya </a> |
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
      [ <a href="?m=member&amp;kat=<?= $kat; ?>&amp;show=<?= $i; ?>" style="font-size:10px; color:#0000CC">
        <?= $i; ?>
        </a> ]
      <?php
		
		}
	
	}

}

if ($display < $paging) {

	$next = $display + 1;
	
?>
      | <a href="?m=member&amp;kat=<?= $kat; ?>&amp;show=<?= $next; ?>" style="font-size:10px; color:#0000CC">Selanjutnya &gt;</a> | <a href="?m=member&amp;kat=<?= $kat; ?>&amp;show=<?= $paging; ?>" style="font-size:10px; color:#0000CC">Terakhir &gt;&gt;</a>
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
<form action="?m=member&amp;page=submit" method="post">

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
                  <td>&nbsp;Sponsor&nbsp;</td>
                  <td>:   <input name="sponsor" type="text" value="<?= $db->dataku("sponsor", $mid); ?>" size="15" maxlength="20" />                </td>
                </tr>
                <tr>
                  <td>&nbsp;Upline&nbsp;</td>
                  <td>:                    
                  <?= "<a href='?m=member&page=addnew&edit=1&mid=".$db->dataku("upline", $mid)."'>".$db->dataku("upline", $mid)." (".$db->dataku("nama", $db->dataku("upline", $mid)).")"; ?></td>
                </tr>
				 <tr>
                  <td>&nbsp;Lock Roi </td>
                  <td>: <?
		$jk = $db->dataku("kunci", $mid);
		if($jk == "1") {
			$check = "checked";
		} else {
			$check2 = "checked";
		}
	?>                 <input name="kunci" type="radio" value="1" <?= $check; ?>>
                    <font color="#000000">ROI Free &nbsp;&nbsp;
                    <input name="kunci" type="radio" value="0" <?= $check2; ?>>
                    ROI Active</font></font></td>
                </tr>
				<tr>
                  <td>&nbsp;Paket Daftar </td>
                  <td>:   <input maxlength="30" name="paket_daftar" size="20" value="<?= $db->dataku("paket_daftar", $mid); ?>" />            </td>
                </tr>
				
				<tr>
                  <td width="43%">&nbsp;Tanggal Daftar </td>
                  <td width="57%">: 
                    <input maxlength="30" name="tgl_daftar" size="20"  value="<?= date("d-m-Y", strtotime( $db->dataku("tgl_daftar", $mid))); ?>" id="datepicker"></td>
                </tr>
				
				 <tr>
                  <td>&nbsp;Jumlah Transferan ROI  </td>
                  <td>:  <input maxlength="30" name="jlh_hari" size="20" value="<?= $db->dataku("jlh_hari", $mid); ?>" />   
                     x Sisanya . </td>
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
                  <input name="bank" size="20" value="<?= $db->dataku("bank", $mid); ?>" /></td>
                </tr>
                <tr>
                  <td>&nbsp;Nomor Rekening &nbsp;</td>
                  <td>:
                    <input name="norek" size="30" value="<?= $db->dataku("norek", $mid); ?>" />                  </td>
                </tr>
                <tr>
                  <td>&nbsp;Rek Atas Nama&nbsp;</td>
                  <td>:                    
                  <input name="an" size="25" value="<?= $db->dataku("an", $mid); ?>" /></td>
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
		
		$tgl_masuk  = date("Y-m-d", strtotime($tgl_daftar) );
		if($edit > 0) {
			
			if($password) {
				$pass = ($password);
				
				
				$db->update("member", "nama='$nama', sponsor='$sponsor' , kunci='$kunci', paket_daftar='$paket_daftar', tgl_daftar='$tgl_masuk' , jlh_hari='$jlh_hari',  kota='$kota', hp='$hp', bank='$bank', norek='$norek', an='$an'", "username='$mid'");
				
				//$db->update("upline", "sponsor='$sponsor'",  "username='$mid'");
				
				
			} else{
				$db->update("member", "nama='$nama', kota='$kota', kunci='$kunci', paket_daftar='$paket_daftar',  jlh_hari='$jlh_hari', tgl_daftar='$tgl_masuk', hp='$hp', bank='$bank', norek='$norek', an='$an'", "username='$mid'");
			}	
	echo "<meta http-equiv='refresh' content='0;URL=?m=member&page=addnew&act=1&mid=$mid&edit=1'>";
		
			
	} else {
		echo "<meta http-equiv='refresh' content='0;URL=?m=member'>";
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
				
			
				
		echo "<meta http-equiv='refresh' content='0;URL=?m=member'>";
	break;	
	
	case activation :
		$domain=$db->config("domain");
	//	$rp = $db->dataku("adminrp", $mid);
		$spon = $db->dataupline("sponsor", $mid);
		$up = $db->dataupline("upline0", $mid);
		$posisie = $db->dataupline("posisi", $mid);
		$posisijr = $db->dataupline("posisi", $up);
		
		if($action == "Activated") {
		
		$db->select("username", "member", "username='$mid' and status='0'");
		$chk_st = $db->num_rows();
		if ($chk_st == 1 ) {
		
		$db->aktivasiduncoin($mid);
		$db->update("order_aktivasi", "status=1", "username='$mid'");
		}
		} else {
		$db->update("member", "status=0", "username='$mid'");
		}
			

			//$db->insert("transaksi", "", "'', '$kode', '$mid', '$rp', '$clientdate', 'Aktivasi Member: $mid', 1");	
				//-----------email------------
		
	
		echo "<meta http-equiv='refresh' content='0;URL=?m=member'>";
	break;
	
	case blokir :
		if($action == "Blocked") {
			$blocked = 1;
		} else {
			$blocked = 0;
		}		
		$db->update("member", "blokir='$blocked'", "username='$mid'");
		
		echo "<meta http-equiv='refresh' content='0;URL=?m=member'>";
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
	$db->select("a.username, a.nama, a.bank, a.norek, a.an, a.sponsor, a.kota, a.tgl_daftar, a.paket_daftar", "member as a inner join upline as b on a.username=b.username", "a.status=1  $where", "a.nama", "", "", "$start, $limit");

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
    <td width="42%" align="right"><form id="form4" name="form2" method="post" action="?m=member&amp;page=komisi" style="margin:0; padding:0">
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
	$paket = $db->result($i, "paket_daftar");
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
		$link_hi = "<a href='?m=withdrawl&mid=$username&bulan=$bulan&tahun=$tahun'>".rupiah($totalbayar)."</a>";
	} else {
		$link_hi = 0;
	}	
	
	
	$totkom = $db->totalkomisi($username, "AND (tglbayar BETWEEN '$dtfrom' AND '$dtto')");
	   $totalpsb = $db->totalpsb($username, "AND (tanggal BETWEEN '$dtfrom' AND '$dtto')");
		$totlalu = $db->totalkomisi($username, "AND (tglbayar BETWEEN '$dtfrom0' AND '$dtto0')");
	   $totsaldo = $db->totalkomisi($username, "AND status=0 AND (tglbayar BETWEEN '$dtfrom0' AND '$dtto')") + $totalpsb - $totalbayar;
	
	
	if($totsaldo > 0) {
		$link_bayar = "<a href='?m=withdrawl&page=proses&mid=$username&jumlah=$totsaldo&w=0'>".rupiah($totsaldo)."</a>";
	} else {
		$link_bayar = 0;
	}		
?>
 
  <tr class="<?= $class; ?>">
    <td width="4%"><?= $nom; ?> </td>
    <td width="18%"><a href="?m=member&page=detilkomisi&mid=<?= $username; ?>&bulan=<?= $bulan; ?>&tahun=<?= $tahun; ?>"><?= $username; ?></a></td>
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
  <a href="?m=member&page=komisi&bulan=<?= $bulan; ?>&tahun=<?= $tahun; ?>&show=1" style="font-size:10px; color:#0000CC"><< Awal </a> | <a href="?m=member&page=komisi&bulan=<?= $bulan; ?>&tahun=<?= $tahun; ?>&show=<?= $previous; ?>" style="font-size:10px; color:#0000CC">< Sebelumnya </a> |
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
[ <a href="?m=member&page=komisi&bulan=<?= $bulan; ?>&tahun=<?= $tahun; ?>&show=<?= $i; ?>" style="font-size:10px; color:#0000CC">
<?= $i; ?>
</a> ]
<?php
		
		}
	
	}

}

if ($display < $paging) {

	$next = $display + 1;
	
?>
| <a href="?m=member&page=komisi&bulan=<?= $bulan; ?>&tahun=<?= $tahun; ?>&show=<?= $next; ?>" style="font-size:10px; color:#0000CC">Selanjutnya ></a> | <a href="?m=member&page=komisi&bulan=<?= $bulan; ?>&tahun=<?= $tahun; ?>&show=<?= $paging; ?>" style="font-size:10px; color:#0000CC">Terakhir >></a>
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
    <td width="42%" align="right"><form id="form4" name="form2" method="post" action="?m=member&amp;page=komisibulanan" style="margin:0; padding:0">
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
		$link_hib = "<a href='?m=withdrawlbulanan&mid=$username&bulan=$bulan&tahun=$tahun'>".rupiah($totalbayarb)."</a>";
	} else {
		$link_hib = 0;
	}	
	
	
	//if($db->totalkomisi($username, "AND status=0 AND (tglbayar BETWEEN '$dtfrom' AND '$dtto')") > 0) {
	if($paket > 1) {
			
	} else {
		$totsaldob = $db->totalkomisibulanan($username, "") - $totalbayarb;
	}		
	
	
	if($totsaldob > 55000) {
		$link_bayarb = "<a href='?m=withdrawlbulanan&page=proses&mid=$username&jumlah=$totsaldob&w=0'>".rupiah($totsaldob)."</a>";
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
  <a href="?m=member&page=komisibulanan&bulan=<?= $bulan; ?>&tahun=<?= $tahun; ?>&show=1" style="font-size:10px; color:#0000CC"><< Awal </a> | <a href="?m=member&page=komisibulanan&bulan=<?= $bulan; ?>&tahun=<?= $tahun; ?>&show=<?= $previous; ?>" style="font-size:10px; color:#0000CC">< Sebelumnya </a> |
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
[ <a href="?m=member&page=komisibulanan&bulan=<?= $bulan; ?>&tahun=<?= $tahun; ?>&show=<?= $i; ?>" style="font-size:10px; color:#0000CC">
<?= $i; ?>
</a> ]
<?php
		
		}
	
	}

}

if ($display < $paging) {

	$next = $display + 1;
	
?>
| <a href="?m=member&page=komisibulanan&bulan=<?= $bulan; ?>&tahun=<?= $tahun; ?>&show=<?= $next; ?>" style="font-size:10px; color:#0000CC">Selanjutnya ></a> | <a href="?m=member&page=komisibulanan&bulan=<?= $bulan; ?>&tahun=<?= $tahun; ?>&show=<?= $paging; ?>" style="font-size:10px; color:#0000CC">Terakhir >></a>
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
	

	$db->select("username, nama, sponsor, kota, tgl_daftar", "member", "username='$mid'");
	
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
        <td><?= $db->dataku("tgl_daftar", $mid); ?></td>
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



	$tgaktif = $db->dataku("tgl_daftar", $user_session); 



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
    <p>&nbsp;</p>
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
				
	$sbl=mysql_query("select * from komisi where jenis='KomisiSponsor' and username='$mid' and (tglbayar between '$dtfrom' and '$dtto') order by tglbayar");
	$nom=1;
	$totsponsor = 0;
	while($row=mysql_fetch_row($sbl)) {
		echo "<tr>
          <td align=right bgcolor=#FCEFED>$nom.</td>
           <td bgcolor=#FCEFED>".date("d-m-Y",strtotime($row[3]))."</td>
          <td bgcolor=#FCEFED>$row[6]</td>
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
    <p>&nbsp;</p>
	
	&nbsp;</p>
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
				
	$sblx=mysql_query("select * from komisi where jenis='kompasangan' and username='$mid' and (tglbayar between '$dtfrom' and '$dtto') order by tglbayar");
	$nomx=1;
	$totsponsorx = 0;
	while($rowx=mysql_fetch_row($sblx)) {
		echo "<tr>
          <td align=right bgcolor=#FCEFED>$nomx.</td>
           <td bgcolor=#FCEFED>".date("d-m-Y",strtotime($rowx[3]))."</td>
          <td bgcolor=#FCEFED>$rowx[6]</td>
		  <td bgcolor=#FCEFED>Komisi Pasangan</td>
          <td bgcolor=#FCEFED align=right>".rupiah($rowx[2])."</td>
        </tr>";
		$totsponsorx = $totsponsorx + $rowx[2];
		$nomx++;
	}
	
	?>
            <tr>
              <td colspan="4" align="right" bgcolor="#E8E8E8">TOTAL KOMISI </td>
              <td bgcolor="#E8E8E8" align="right"><strong>
                <?= rupiah($totsponsorx); ?>
              </strong></td>
            </tr>
        </table></td>
      </tr>
    </table>
 
    <p>&nbsp;</p>
	<table width="80%" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#E7E5D9">
      <tr>
        <td bgcolor="#E7E5D9"><strong>(3) Komisi Enterten </strong></td>
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
				
	$sbly=mysql_query("select * from komisi where jenis='KomisiEnterten' and username='$mid' and (tglbayar between '$dtfrom' and '$dtto') order by tglbayar");
	$nomy=1;
	$totsponsory = 0;
	while($rowy=mysql_fetch_row($sbly)) {
		echo "<tr>
          <td align=right bgcolor=#FCEFED>$nomy.</td>
           <td bgcolor=#FCEFED>".date("d-m-Y",strtotime($rowy[3]))."</td>
          <td bgcolor=#FCEFED>$rowy[6]</td>
		  <td bgcolor=#FCEFED>Komisi Enterten</td>
          <td bgcolor=#FCEFED align=right>".rupiah($rowy[2])."</td>
        </tr>";
		$totsponsory = $totsponsory + $rowy[2];
		$nomy++;
	}
	
	?>
            <tr>
              <td colspan="4" align="right" bgcolor="#E8E8E8">TOTAL KOMISI </td>
              <td bgcolor="#E8E8E8" align="right"><strong>
                <?= rupiah($totsponsory); ?>
              </strong></td>
            </tr>
        </table></td>
      </tr>
    </table>
 
    <p>
    <tr>
        <td bgcolor="#E7E5D9">&nbsp;</td>
</tr>
      
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
              <td>Komisi Roi </td>
              <td align="right"><?= rupiah($totpas); ?>              </td>
            </tr>
            <tr>
              <td align="center">&nbsp;</td>
              <td>&nbsp;</td>
              <td align="right">&nbsp;</td>
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