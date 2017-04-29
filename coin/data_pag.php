<script type="text/javascript">
<!--
function confirmation(noid, kat, page) {
	var answer = confirm("Yakin akan " + page +  " Data ini?")
	if (answer){
		//alert("Bye bye!")
		window.location = "?e=data_pag&page=" + kat + "&no=" + noid;
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
$scrollnumber = '500'; // How many elements to the record bar are shown at a time when the scroll function is on
//-------------pagination--------------
if (!isset ($_GET['show'])) {

	$display = 1;
	
} else {

	$display = $_GET['show'];
	
}
$start = (($display * $limit) - $limit);
//if(!$kat) $kat=2;
if($status) {
	$aktif = "status=2";
	$pasif = "pasif='$statuse'";
}
if($kat == 1) {
	$sql0 = $db->count_records("gf_start", "negara='Indonesia' $aktif");
	$sql = $db->select("*", "gf_start", "negara='Indonesia' $aktif","id desc", "", "", "$start, $limit");
	//mysql_close();
} else if($kat == 2) {
	$sql0 = $db->count_records("gf_start", "username like '%$keywrd%' or username like '%$keywrd%'");
	$sql = $db->select("*", "gf_start", "username like '%$keywrd%' or username like '%$keywrd%'", "id desc", "", "", "$start, $limit");
} else if($kat == "0") {
	$sql0 = $db->count_records("gf_start", "negara='Malaysia' $aktif");
	$sql = $db->select("*", "gf_start", "negara='Malaysia' $aktif", "id desc", "", "", "$start, $limit");
} else {
	$sql0 = $db->count_records("gf_start", "status=2");
	$sql = $db->select("*", "gf_start", "status=2", "id desc", "", "", "$start, $limit");
}					
	$numrows = $sql0;
	$sel = "selected";

	
?>
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td colspan="11" align="center" style="padding:0"><table width="107%" border="0" cellspacing="0" cellpadding="0" style="padding:0; margin:0">
      <tr>
        <td><form action="" method="post" name="form1" id="form1" style="margin:0; padding:0">
          <label> Katagori Negara:
            <select name="select" onChange="location =  this.options[this.selectedIndex].value" class="form">
            <option value="?e=data_pag" selected="selected" <? echo $pilih; ?>>Semua negara</option>
            <option value="?e=data_pag&amp;kat=1&amp;sel3=<?= $sel; ?>" <? echo $sel3; ?>>Member Indonesia</option>
            <option value="?e=data_pag&amp;kat=0&amp;sel2=<?= $sel; ?>" <? echo $sel2; ?>>Member Malaysia</option>
          </select>
          </label>&nbsp;&nbsp;
        Total: <b><?= $numrows; ?></b> orang
        </form></td>
        <td><form id="form2" name="form2" method="post" action="?e=data_pag&amp;kat=2" style="margin:0; padding:0">
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
    <td width="3%" align="center">NO</td>
    <td width="9%" align="center">USERNAME</td>
    <td width="13%" align="center">TANGGAL</td>
    <td width="10%" align="center">NOMINAL </td>
    <td width="10%" align="center">PENERIMA-1</td>
    <td width="11%" align="center">NOMINAL-1</td>
    <td width="9%" align="center">Deadline </td>
   
    <td width="5%" align="center">Admin Proses</td>
    
    <td width="5%" align="center">Status</td>
  </tr>
<?

$nom = 1 + $start;
while($row=$db->fetch_row($sql)) {
$hari_ini=date("Y-m-d");
	$lid = $nom - 1;
	if($row[28] > 0) {
		$aktif = "<img src='../admin/images/icon-16-checkin.png' title='BB Aktif' border=0 />";
	} else {
		$aktif = "<img src='../admin/images/publish_x.png' title='BB Pasif' border=0 />";
	}
	if($row[35] == 1) {
		$status_gf = "<img src='../admin/images/icon-16-checkin.png' title='GF Sukses' border=0 />";
	} else if($row[35] == 2) {
	$status_gf = "<img src='../admin/images/notice-alert-01.png' title='GF Batal' border=0 />";
	} else {
		$status_gf = "<img src='../admin/images/publish_x.png' title='GF Pending' border=0 />";
	}
	
	if($row[29] == $hari_ini and $row[28]<1) {
		$pasangkan = "<strong><blink><font color='#FF0000'>Harus Di Pasangkan</font></blink></strong>";
	} else {
		$pasangkan = "-";
	}
	
	if($row[25] == 7) {
		$gantiph = "<strong><blink><font color='#FF0000'><a href='?e=data_pag&amp;page=gantiphbaru&id=$row[0]'>PA Batal dan Harus Di Ganti PA Baru</a></font></blink></strong>";
	} else if($row[25]==5) {
		$gantiph = "<strong><blink><font color='#FF0000'>PA Batal Sudah Di Ganti Baru</font></blink></strong>";
		} else {
		$gantiph = "-";
	}

?>  
  <tr class="<?= $class; ?>">
    <td align="center"><?= $nom; ?>.</td>
    <td align="center"><?= $row[2]; ?></td>
    <td align="center"><?= $row[3]; ?></td>
    <td align="center"><?= rupiah($row[4]); ?></td>
    
    <td align="center"><?= $row[5]; ?></td>
    <td align="center"><?= rupiah($row[6]); ?></td>
    <td align="center"><?= $row[28]; ?></td>
  
    <td align="center"><?= $aktif; ?></td>
        <td align="center"><?= $status_gf; ?></td>
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
  <a href="?e=data_pag&kat=<?= $kat; ?>&show=1" style="font-size:10px; color:#0000CC"><< First </a> | <a href="?e=data_pag&kat=<?= $kat; ?>&show=<?= $previous; ?>" style="font-size:10px; color:#0000CC">< Previous </a> |
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
[ <a href="?e=data_pag&kat=<?= $kat; ?>&show=<?= $i; ?>" style="font-size:10px; color:#0000CC">
<?= $i; ?>
</a> ]
<?php
		
		}
	
	}

}

if ($display < $paging) {

	$next = $display + 1;
	
?>
| <a href="?e=data_pag&kat=<?= $kat; ?>&show=<?= $next; ?>" style="font-size:10px; color:#0000CC">Next ></a> | <a href="?e=data_pag&kat=<?= $kat; ?>&show=<?= $paging; ?>" style="font-size:10px; color:#0000CC">Last >></a>
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
		$db->delete("gf_start", "id='$no'");
		echo "<meta http-equiv='refresh' content='0;URL=?e=data_pag'>";
	break;
	
	case pasangkanotomatis :
		echo "Sedang Di Pasangkan Otomatis";
		echo "<meta http-equiv='refresh' content='0;URL=?e=data_pag'>";
	break;	
	
	case gantiphbaru :
	$db->update("gf_start", "status='3'", "id='$id'");
		echo "<meta http-equiv='refresh' content='0;URL=?e=data_pag'>";
	break;
	
	case edit :
	
if( isset($_POST['submit'])) {
$jnominal=$nominal1+$nominal2+$nominal3+$nominal4+$nominal5+$nominal6+$nominal7+$nominal8+$nominal9+$nominal10;
if($jnominal<$jmlgf or $jnominal>$jmlgf){
echo "<center><h2>Maaf Jumlah Pemberi Bantuan Tidak Sesuai Dengan Jumlah yang Anda Masukan</h2></center>";
} else {
	$db->update("gf_start", "kepada1='$kepada1', nominal1='$nominal1', kepada2='$kepada2', nominal2='$nominal2', kepada3='$kepada3', nominal3='$nominal3', kepada4='$kepada4', nominal4='$nominal4', kepada5='$kepada5', nominal5='$nominal5', kepada6='$kepada6', nominal6='$nominal6',kepada7='$kepada7', nominal7='$nominal7', kepada8='$kepada8', nominal8='$nominal8', kepada9='$kepada9', nominal9='$nominal9', kepada10='$kepada10', nominal10='$nominal10', arahkan_ph='1', batas_tgl='$batas_tgl', batas_bln='$batas_bln', batas_thn='$batas_thn', batas_jam='$batas_jam', batas_menit='$batas_menit'", "id='$noid'");
	echo "<p align=center><b>Data GF Berhasil Diupdate!</b></p>";
	
	$db->select("username", "gf_proses", "username='$username' and status=0");
	$chkd_user = $db->num_rows();
	if ($chkd_user!= "") {
	$db->delete("gf_proses", "username='$username' and status='0'");
	} else {
	}
	
	if($kepada1<>""){
	$db->insert("gf_proses", "", "'', '$trx', '$username', '$clientdate', '$kepada1', '$nominal1', '0', '0', 'Manual'");
	$db->update("gh_start", "status='2'", "username='$kepada1' and status='0'");
	
	$hp=$db->dataku("hp" , $username);
	$hpp=$db->dataku("hp" , $kepada1);
	$rpnomina1l = rupiah ($nominal1);
	$message ="".$username." anda mendapat Perintah PA ke partisipan ".$kepada1." No Hp ".$hpp."  silahkan cek dimember area anda ";
	$db->smsnotifikasi ($hp , $message) ;

	} else {
	}
	
	if($kepada2<>""){
	$db->insert("gf_proses", "", "'', '$trx', '$username', '$clientdate', '$kepada2', '$nominal2', '0', '0', 'Manual'");
	$db->update("gh_start", "status='2'", "username='$kepada2' and status='0'");
	
	$hp=$db->dataku("hp" , $username);
	$hpp2=$db->dataku("hp" , $kepada2);
	$rpnominal2 = rupiah ($nominal2);
	$message ="".$username." anda mendapat Perintah PA ke partisipan ".$kepada2." No Hp ".$hpp2."  silahkan cek dimember area anda ";
	$db->smsnotifikasi ($hp , $message) ;

	
	} else {
	}
	
	if($kepada3<>""){
	$db->insert("gf_proses", "", "'', '$trx', '$username', '$clientdate', '$kepada3', '$nominal3', '0', '0' , 'Manual'");
	$db->update("gh_start", "status='2'", "username='$kepada3' and status='0'");
	
	$hp=$db->dataku("hp" , $username);
	$hpp3=$db->dataku("hp" , $kepada3);
	$rpnominal3 = rupiah ($nominal23);
	$message ="".$username." anda mendapat Perintah PA ke partisipan ".$kepada3." No Hp ".$hpp3."  senilai ".$rpnominal3." silahkan cek dimember area anda ";
	$db->smsnotifikasi ($hp , $message) ;
	} else {
	}
	
	if($kepada4<>""){
	$db->insert("gf_proses", "", "'', '$trx', '$username', '$clientdate', '$kepada4', '$nominal4', '0', '0' , 'Manual'");
	$db->update("gh_start", "status='2'", "username='$kepada4' and status='0'");
	
	$hp=$db->dataku("hp" , $username);
	$hpp4=$db->dataku("hp" , $kepada4);
	$rpnominal4 = rupiah($nominal4);
	$message ="".$username." anda mendapat Perintah PA ke partisipan ".$kepada4." No Hp ".$hpp4." silahkan cek dimember area anda ";
	$db->smsnotifikasi ($hp , $message) ;
	
	} else {
	}
	
	if($kepada5<>""){
	$db->insert("gf_proses", "", "'', '$trx', '$username', '$clientdate', '$kepada5', '$nominal5', '0', '0', 'Manual'");
	$db->update("gh_start", "status='2'", "username='$kepada5' and status='0'");
	
	$hp=$db->dataku("hp" , $username);
	$hpp5=$db->dataku("hp" , $kepada5);
	$rpnominal5 = rupiah ($nominal5);
	$message ="".$username." anda mendapat Perintah PA ke partisipan ".$kepada5." No Hp ".$hpp5."  silahkan cek dimember area anda ";
	$db->smsnotifikasi ($hp , $message) ;
	
	} else {
	}
	
	if($kepada6<>""){
	$db->insert("gf_proses", "", "'', '$trx', '$username', '$clientdate', '$kepada6', '$nominal6', '0', '0', 'Manual'");
	$db->update("gh_start", "status='2'", "username='$kepada6' and status='0'");
	
	$hp=$db->dataku("hp" , $username);
	$hpp6=$db->dataku("hp" , $kepada6);
	$rpnominal6 = rupiah ($nominal6);
	$message ="".$username." anda mendapat Perintah PA ke partisipan ".$kepada6." No Hp ".$hpp6."  senilai ".$rpnominal6." silahkan cek dimember area anda ";
	$db->smsnotifikasi ($hp , $message) ;
	
	} else {
	}
	
	if($kepada7<>""){
	$db->insert("gf_proses", "", "'', '$trx', '$username', '$clientdate', '$kepada7', '$nominal7', '0', '0' , 'Manual'");
	$db->update("gh_start", "status='2'", "username='$kepada7' and status='0'");
	
	
	$hp=$db->dataku("hp" , $username);
	$hpp7=$db->dataku("hp" , $kepada7);
	$rpnominal7 = rupiah ($nominal7);
	$message ="".$username." anda mendapat Perintah PA ke partisipan ".$kepada7." No Hp ".$hpp7."  senilai ".$rpnominal7." silahkan cek dimember area anda ";
	$db->smsnotifikasi ($hp , $message) ;
	
	} else {
	}
	
	if($kepada8<>""){
	$db->insert("gf_proses", "", "'', '$trx', '$username', '$clientdate', '$kepada8', '$nominal8', '0', '0' , 'Manual'");
	$db->update("gh_start", "status='2'", "username='$kepada8' and status='0'");
	
	$hp=$db->dataku("hp" , $username);
	$hpp8=$db->dataku("hp" , $kepada8);
	$rpnominal8 = rupiah ($nominal8);
	$message ="".$username." anda mendapat Perintah PA ke partisipan ".$kepada8." No Hp ".$hpp8."  senilai ".$rpnominal8." silahkan cek dimember area anda ";
	$db->smsnotifikasi ($hp , $message) ;
	
	} else {
	}
	
	if($kepada9<>""){
	$db->insert("gf_proses", "", "'', '$trx', '$username', '$clientdate', '$kepada9', '$nominal9', '0', '0', 'Manual'");
	$db->update("gh_start", "status='2'", "username='$kepada9' and status='0'");

	$hp=$db->dataku("hp" , $username);
	$hpp9=$db->dataku("hp" , $kepada9);
	$rpnominal9 = rupiah ($nomina9);
	$message ="".$username." anda mendapat Perintah PA ke partisipan ".$kepada9." No Hp ".$hpp9."  senilai ".$rpnominal9." silahkan cek dimember area anda ";
	$db->smsnotifikasi ($hp , $message) ;
	
	} else {
	}
	
	if($kepada10<>""){
	$db->insert("gf_proses", "", "'', '$trx', '$username', '$clientdate', '$kepada10', '$nominal10', '0', '0', 'Manual' ");
	$db->update("gh_start", "status='2'", "username='$kepada10' and status='0'");
	
	
	$hp=$db->dataku("hp" , $username);
	$hpp10=$db->dataku("hp" , $kepa10a4);
	$rpnominal10 = rupiah ($nominal10);
	$message ="".$username." anda mendapat Perintah PA ke partisipan ".$kepada10." No Hp ".$hpp10."  senilai ".$rpnominal10." silahkan cek dimember area anda ";
	$db->smsnotifikasi ($hp , $message) ;
	} else {
	}
	
	$db->select("username", "timer", "username='$username'");
	$chkd_timer = $db->num_rows();
	if ($chkd_timer!= "") {
	$db->delete("timer", "username='$username'");
	} else {
	}
	
	$db->insert("timer", "", "'', '$username', '$batas_tgl', '$batas_bln', '$batas_thn', '$batas_jam', '$batas_menit'");
	
	

	echo "<meta http-equiv=\"refresh\" content=\"2; url=?e=data_pag\">";
}
}
	$db->select("*", "gf_start", "id='$noid'");	
?>
</p>
<p>&nbsp;</p>
<p></p>
<form id="form2" name="form1" method="post" action="">
  <p></p>
  <table width="80%" border="0" align="center" cellpadding="4" cellspacing="0">
    <tr>
      <td colspan="2" align="center"><p>Daftar RA (Peminta Bantuan)</p>
        <table width="700" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#E7E5D9">

              <tr>
                <td bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="1" cellspacing="1" bgcolor="#CCCCCC">
                  <tr>
                    <td width="6%" height="25" align="center" bgcolor="#F2F1EC"><span class="style2"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">No.</font></span></td>
                    <td width="21%" align="center" bgcolor="#F2F1EC"><span class="style2"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Tanggal RA </font></span></td>
                    <td width="19%" align="center" bgcolor="#F2F1EC"><span class="style2"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Username</font></span></td>
                    <td width="26%" align="center" bgcolor="#F2F1EC"><span class="style2"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Nominal RA </font></span></td>
                    <td width="28%" align="center" bgcolor="#F2F1EC"><span class="style2"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Terbayar</font></span></td>
                    <td width="28%" align="center" bgcolor="#F2F1EC"><span class="style2"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Kekurangan</font></span></td>
                  </tr>
                  <?php
        $sbl=mysql_query("select * from gh_start where penampungan='1' order by id");
	$nom=1;
	while($row=mysql_fetch_row($sbl)) {
		echo "<tr bgcolor=#FFFFFF>
          <td align=center>$nom.</td>
           <td align=center>".date("d-M-Y",strtotime($row[3]))."</td>
		   <td align=center>$row[2]</td>
          <td align=right>".rupiah2($row[4])."</td>
		  <td align=right>".rupiah2($row[45])."</td>
		  <td align=right>".rupiah2($row[46])."</td>
        </tr>";
		$nom++;
	}
	?>
                  <tr>                    </tr>
                </table></td>
              </tr>
            </table>
            </td>
          </tr>
        </table>        <p>&nbsp;</p></td>
    </tr>
    <tr>
      <td colspan="2" align="center">&nbsp;</td>
    </tr>
    <tr>
      <td align="right"> Nominal Kesanggupan Member Bantuan :</td>
      <td><b>
        <input name="jmlgf" type="text" id="jmlgf" value="<?= rupiah($db->result(0, "jmlgf")); ?>"  disabled="disabled"/>
        <input name="trx" type="hidden" id="trx" value="<?= $db->result(0, "trx");  ?>" />
        <input name="jmlgf" type="hidden" id="jmlgf" value="<?= $db->result(0, "jmlgf");  ?>" />
      </b></td>
    </tr>
    <tr>
      <td align="right"> Username Pemberi Bantuan :</td>
      <td><input name="username" type="text" id="username" value="<?= $db->result(0, "username");  ?>" disabled="disabled" />
      <input name="username" type="hidden" id="username" value="<?= $db->result(0, "username");  ?>" />
      <b>
      <input name="noid" type="hidden" id="noid" value="<?= $db->result(0, "id");  ?>" />
      </b></td>
    </tr>
    <tr>
      <td width="44%" align="right"> Username Penerima Bantuan-1 :</td>
      <td width="56%"><b>
        <input name="kepada1" type="text" id="kepada1" value="<?= $db->result(0, "kepada1"); ?>" />
      </b></td>
    </tr>
    <tr>
      <td align="right">Nominal Pecahan-1 :</td>
      <td><input name="nominal1" type="text" id="nominal1" value="<?= $db->result(0, "nominal1");  ?>" /></td>
    </tr>
    <tr>
      <td align="right"> Username Penerima Bantuan-2 :</td>
      <td><input name="kepada2" type="text" id="kepada2" value="<?= $db->result(0, "kepada2");  ?>" /></td>
    </tr>
    <tr>
      <td align="right">Nominal Pecahan-2 :</td>
      <td><input name="nominal2" type="text" id="nominal2" value="<?= $db->result(0, "nominal2");  ?>" /></td>
    </tr>
    <tr>
      <td align="right"> Username Penerima Bantuan-3 :</td>
      <td><input name="kepada3" type="text" id="kepada3" value="<?= $db->result(0, "kepada3");  ?>" /></td>
    </tr>
    <tr>
      <td align="right">Nominal Pecahan-3 :</td>
      <td><input name="nominal3" type="text" id="nominal3" value="<?= $db->result(0, "nominal3");  ?>" /></td>
    </tr>
    <tr>
      <td align="right"> Username Penerima Bantuan-4 :</td>
      <td><input name="kepada4" type="text" id="kepada4" value="<?= $db->result(0, "kepada4");  ?>" /></td>
    </tr>
    <tr>
      <td align="right">Nominal Pecahan-4 :</td>
      <td><input name="nominal4" type="text" id="nominal4" value="<?= $db->result(0, "nominal4");  ?>" /></td>
    </tr>
    <tr>
      <td align="right"> Username Penerima Bantuan-5 :</td>
      <td><input name="kepada5" type="text" id="kepada5" value="<?= $db->result(0, "kepada5");  ?>" /></td>
    </tr>
    <tr>
      <td align="right">Nominal Pecahan-5 :</td>
      <td><input name="nominal5" type="text" id="nominal5" value="<?= $db->result(0, "nominal5");  ?>" /></td>
    </tr>
    <tr>
      <td align="right"> Username Penerima Bantuan-6 :</td>
      <td><input name="kepada6" type="text" id="kepada6" value="<?= $db->result(0, "kepada6");  ?>" /></td>
    </tr>
    <tr>
      <td align="right">Nominal Pecahan-6 :</td>
      <td><input name="nominal6" type="text" id="nominal6" value="<?= $db->result(0, "nominal6");  ?>" /></td>
    </tr>
    <tr>
      <td align="right"> Username Penerima Bantuan-7 :</td>
      <td><input name="kepada7" type="text" id="kepada7" value="<?= $db->result(0, "kepada7");  ?>" /></td>
    </tr>
    <tr>
      <td align="right">Nominal Pecahan-7 :</td>
      <td><input name="nominal7" type="text" id="nominal7" value="<?= $db->result(0, "nominal7");  ?>" /></td>
    </tr>
    <tr>
      <td align="right"> Username Penerima Bantuan-8 :</td>
      <td><input name="kepada8" type="text" id="kepada8" value="<?= $db->result(0, "kepada8");  ?>" /></td>
    </tr>
    <tr>
      <td align="right">Nominal Pecahan-8 :</td>
      <td><input name="nominal8" type="text" id="nominal8" value="<?= $db->result(0, "nominal8");  ?>" /></td>
    </tr>
    <tr>
      <td align="right"> Username Penerima Bantuan-9 :</td>
      <td><input name="kepada9" type="text" id="kepada9" value="<?= $db->result(0, "kepada9");  ?>" /></td>
    </tr>
    <tr>
      <td align="right">Nominal Pecahan-9 :</td>
      <td><input name="nominal9" type="text" id="nominal9" value="<?= $db->result(0, "nominal9");  ?>" /></td>
    </tr>
    <tr>
      <td align="right"> Username Penerima Bantuan-10 :</td>
      <td><input name="kepada10" type="text" id="kepada10" value="<?= $db->result(0, "kepada10");  ?>" /></td>
    </tr>
    <tr>
      <td align="right">Nominal Pecahan-10 :</td>
      <td><input name="nominal10" type="text" id="nominal10" value="<?= $db->result(0, "nominal10");  ?>" /></td>
    </tr>
    <tr>
      <td align="right">Batas Waktu Transfer  :</td>
      <td>Tgl : 
        <input name="batas_tgl" type="text" id="batas_tgl" value="<?= $db->result(0, "batas_tgl");  ?>" size="3" />
        Bulan 
        <input name="batas_bln" type="text" id="bln" value="<?= $db->result(0, "batas_bln");  ?>" size="3" />
        Tahun
        <input name="batas_thn" type="text" id="thn" value="<?= $db->result(0, "batas_thn");  ?>" size="5" /> 
        Jam 
        <input name="batas_jam" type="text" id="jam" value="<?= $db->result(0, "batas_jam");  ?>" size="3" />
        Menit 
        <input name="batas_menit" type="text" id="menit" value="<?= $db->result(0, "batas_menit");  ?>" size="3" /> </td>
    </tr>
    <tr>
      <td colspan="2" align="center">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" align="center"><label>
        <input type="submit" name="submit" id="submit" value="UPDATE GIVE FUN" />
      </label></td>
    </tr>
  </table>
</form>
<?
	break;
	}
?>	