<script type="text/javascript">
<!--
function confirmation(noid, kat, page) {
	var answer = confirm("Yakin akan " + page +  " kode aktivasi ini?")
	if (answer){
		//alert("Bye bye!")
		window.location = "?m=cardcenter&page=" + kat + "&no=" + noid;
		
	}
	
}
//-->
</script>
<h2><img src="images/icon-48-menumgr.png" width="48" height="48" align="absmiddle" /> Kode Aktivasi</h2>
<?
//-------------password recovery & pin-------------
function randString ($pass_len) 
{ 
$allchars = '0123456789'; 
//$allchars = array ($a, "a", "b", "c", "5", "8");
$string = ''; 

mt_srand ((double) microtime() * 1000000); 

for ($i = 0; $i < $pass_len; $i++) { 

$string .= $allchars{mt_rand (0,strlen($allchars))}; 
} 

return $string; 
}
function randomPassword($length) {
$allow = "0123456789";
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
	if($status == 2){
		$statuse = 0;
	} else {
		$statuse = 1;
	}
	$aktif = "and pasif='$statuse'";
	$pasif = "pasif='$statuse'";
}
if($kat == 1) {
	$sql0 = $db->count_records("card", "status=1 $aktif");
	$sql = $db->select("*", "card", "status=1 $aktif", "", "", "", "$start, $limit");
	//mysql_close();
} else if($kat == 2) {
	$sql0 = $db->count_records("card", "kode like '%$keywrd%' or username like '%$keywrd%'");
	$sql = $db->select("*", "card", "username like '%$keywrd%'", "id desc", "", "", "$start, $limit");
} else if($kat == "0") {
	$sql0 = $db->count_records("card", "status=0 $aktif");
	$sql = $db->select("*", "card", "status=0 $aktif", "id desc", "", "", "$start, $limit");
} else {
	$sql0 = $db->count_records("card", $pasif);
	$sql = $db->select("*", "card", $pasif, "id desc", "", "", "$start, $limit");
}					
	$numrows = $sql0;
	
?>
<p align="center"><strong>DAFTAR KODE AKTIVASI</strong></p>
<table width="90%" border="0" align="center" cellpadding="5" cellspacing="1" style="border:solid #CCCCCC 1px">
  <tr class="tbl_header">
    <td colspan="3">Total :      <?= $numrows; ?></td>
    <td colspan="2"><form id="form2" name="form2" method="post" action="?m=cardcenter&amp;kat=2" style="margin:0; padding:0">
      <label> Cari kode/username :
        <input name="keywrd" type="text" id="keywrd" />
      </label>
      <label>
      <input type="submit" name="Submit" value="CARI" />
      </label>
    </form></td>
  </tr>
  <tr class="tbl_header">
    <td width="4%" align="center">NO</td>
    <td width="15%" align="center">Username</td>
    <td width="13%" align="center">Jumlah Tiket </td>
	    <td width="22%" align="center">Edit Jumlah PIN</td>
  </tr>
<?


$nom = 1 + $start;
while($row=$db->fetch_row($sql)) {
	$lid = $nom - 1;
?>  
  <tr class="<?= $class; ?>">
    <td align="center"><?= $nom; ?>.</td>
    <td align="center"><?= $row[1]; ?></td>
    <td align="center"><?= $row[2]; ?></td>
	
    <td align="center">&nbsp;&nbsp;<a href="?m=cardcenter&amp;page=edit&noid=<?= $row[0]; ?>"><img src="images/edit_f2.png" title="Edit Card" width="17" height="22" border="0" /></a> &nbsp;</td>
  </tr>
<?
	$nom++;
}
?>	  
</table>
<br>
<p>&nbsp;</p>
<p>&nbsp;</p>
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
  <a href="?m=cardcenter&kat=<?= $kat; ?>&show=1" style="font-size:10px; color:#0000CC"><< First </a> | <a href="?m=cardcenter&kat=<?= $kat; ?>&show=<?= $previous; ?>" style="font-size:10px; color:#0000CC">< Previous </a> |
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
[ <a href="?m=cardcenter&kat=<?= $kat; ?>&show=<?= $i; ?>" style="font-size:10px; color:#0000CC">
<?= $i; ?>
</a> ]
<?php
		
		}
	
	}

}

if ($display < $paging) {

	$next = $display + 1;
	
?>
| <a href="?m=cardcenter&kat=<?= $kat; ?>&show=<?= $next; ?>" style="font-size:10px; color:#0000CC">Next ></a> | <a href="?m=cardcenter&kat=<?= $kat; ?>&show=<?= $paging; ?>" style="font-size:10px; color:#0000CC">Last >></a>
<?php

}
//
?>
    </td>
  </tr>
</table>
<p align="center"><a href="printkode.php?kat=<?= $kat; ?>" target="_blank"></a></p>
<?
	break;
	
	case generate ;
	if(isset($_POST['submit'])){	
	
	if($jumlahpin1 <= 0 && $jumlahpin2 <= 0 && $jumlahpin3 <= 0  && $jumlahpin4 <= 0) {
		echo "<p align=center><b>Masukan jumlah PIN yang Akan Di Kirim!</b></p>";
	} else {
	$sql = mysql_query("select username from member where username='$dealer'");
				$cekuser = mysql_num_rows($sql);
				if ($cekuser>0) {
		
			
				$sql = mysql_query("select username from card where username='$dealer'");
				$cek = mysql_num_rows($sql);
				if ($cek>0) {
				//$sql = mysql_query("select jumlahpin1, jumlahpin2, jumlahpin3, jumlahpin4 from card where username='$dealer'");
				$sql = mysql_query("select jumlahpin from card where username='$dealer'");
				$dta = mysql_fetch_row($sql);
				$jpin = $dta[0];
				$newpin=$jpin+$jumlahpin1;
				
				/*$jpinb = $dta[1];
				$newpinb=$jpinb+$jumlahpin2;
				
				$jpinc = $dta[2];
				$newpinc=$jpinc+$jumlahpin3;
				
				$jpind = $dta[3];
				$newpind=$jpind+$jumlahpin4;*/
				
				
				if ($jumlahpin1 >0) {
				
				$jenisx = "Paket Hemat";
				$jumlah = $jumlahpin1 ;
				} else if ($jumlahpin2 >0) {
				
				$jenisx = "Paket VIP";
				$jumlah = $jumlahpin2 ;
					
				} else if ($jumlahpin3 >0) {
				
				$jenisx = "Paket VVIP";
				$jumlah = $jumlahpin3 ;
					
				} else if ($jumlahpin4 >0) {
				
				$jenisx = "Paket Super VVIP";
				$jumlah = $jumlahpin4 ;
					
				}
				
		
				//$db->update("card", "jumlahpin1='$newpin', jumlahpin2='$newpinb' ,jumlahpin3='$newpinc',jumlahpin4='$newpind'", "username='$dealer'");
				$db->update("card", "jumlahpin='$newpin'", "username='$dealer'");
				
				$db->insert("history_card", "", "'', '$dealer', '$jumlah', '0', 'Terima Tiket $jenisx dari admin', '$clientdate' ");
				//$db->insert("history_card", "", "'', '$user_session', '0', '$jumlah', Transfer tiket ke $usertujuan', '$clientdate' ");
				
				$hpx = $db->dataku("hp", $dealer); 
				$message= "".$dealer." Tiket Aktivasi (".$jumlah.")  sudah di kirim ke member area anda Terimakasih";
				$db->smsnotifikasi($hpx, $message) ;
				
				
				
				} else {
						
	$db->insert("card", "", "'', '$dealer', '$jumlahpin1', '$clientdate'" );
	$db->insert("history_card", "", "'', '$dealer', '$jumlah', '', 'Terima Tiket $jenisx dari admin', '$clientdate' ");
	$hpx = $db->dataku("hp", $dealer); 
	$message= "".$dealer." Tiket Pesanan Anda sudah di kirim ke member area anda Terimakasih";
	$db->smsnotifikasi($hpx, $message) ;
	
			}
		

			
					
			

?>
<div id="notice"><img src="images/notice-info.png" width="29" height="29" align="absmiddle" />Kirim  PIN  Aktivasi Sukses ! </div>
<? 
} else {
echo "<h3><center>Maaf Username ".$dealer." Tidak Terdaftar</center></h3>";
}
 echo"<meta http-equiv=\"refresh\" content=\"2; url=./?m=cardcenter\">";
} 
}
?>
<form name="form1" method="post" action="">
  <table width="80%" border="0" align="center" cellpadding="5" cellspacing="1" style="border:solid #CCCCCC 1px">
    <tr class="tbl_header">
      <td colspan="2" align="center">KIRIM TIKET AKTIVASI</td>
    </tr>
    <tr>
      <td width="48%" align="right">Jumlah Tiket:</td>
      <td width="52%"><label>
        <input name="jumlahpin1" type="text" id="jumlahpin1" size="10" />
		
      </label></td>
    </tr>
	
	<!-- <tr>
      <td width="48%" align="right">Jumlah Tiket Paket VIP:</td>
      <td width="52%"><label>
        <input name="jumlahpin2" type="text" id="jumlahpin2" size="10" />
	
      </label></td>
    </tr>
	<tr>
      <td width="48%" align="right">Jumlah Tiket Paket VVIP</td>
      <td width="52%"><label>
        <input name="jumlahpin3" type="text" id="jumlahpin3" size="10" />
      </label></td>
    </tr>
	
	<tr>
      <td width="48%" align="right">Jumlah Tiket Paket Super VVIP</td>
      <td width="52%"><label>
        <input name="jumlahpin4" type="text" id="jumlahpin4" size="10" />
      </label></td>
    </tr>-->
    <tr>
      <td align="right">Username Penerima :</td>
      <td><label>
        <input name="dealer" type="text" id="dealer" size="15" />
      </label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label>
        <input type="submit" name="submit" id="submit" value="KIRIM PIN AKTIVASI">
      </label></td>
    </tr>
  </table>
</form>
<script language="JavaScript" type="text/javascript">
 var frmvalidator = new Validator("form1");
 frmvalidator.addValidation("jumlahpin1","req","Masukkan jumlah Kode Aktivasi yang akan digenerate!");
 frmvalidator.addValidation("idmbr","req","Masukkan 3 digit ID Member!"); 
 frmvalidator.addValidation("dealer","req","Masukkan Username!");


</script>
<?
	break;
	case delete :
		//echo "delete no $no";
		//myquery("delete from member where username='$mid'");
		
		$db->delete("card", "id='$no'");
		//$up = dataupline("upline0", $mid);
		//$pos = dataupline("posisi", $mid);
		//update("upline", "$pos=''", "username='$up'");
		//myquery("delete from upline where username='$mid'");
		//mysql_close();
		echo "<meta http-equiv='refresh' content='0;URL=?m=cardcenter'>";
	break;	
	
	case edit :
	
if( isset($_POST['submit'])) {



	$db->update("card", "jumlahpin1='$jumlahpin1' ,jumlahpin2='$jumlahpin2' , jumlahpin3='$jumlahpin3', jumlahpin4='$jumlahpin4'", "id='$noid'");
	echo "<p align=center><b>Kartu berhasil diupdate!</b></p>";
}

	$db->select("*", "card", "id='$noid'");	
?>

<form id="form2" name="form1" method="post" action="">
  <table width="80%" border="0" align="center" cellpadding="4" cellspacing="0">
    <tr>
      <td width="44%" align="right"> Member :</td>
      <td width="56%"><input name="username" type="text" id="idmlm" value="<?= $db->result(0, "username");  ?>" />
      <input name="noid" type="hidden" id="id" value="<?= $db->result(0, "id");  ?>" /></td>
    </tr>
    <tr>
      <td align="right">Jumlah Tiket Paket Hemat:</td>
      <td><input name="jumlahpin1" type="text" id="jumlahpin1" value="<?= $db->result(0, "jumlahpin1");  ?>" /></td>
    </tr>
	<!--<tr>
      <td align="right">Jumlah Tiket Paket VIP:</td>
      <td><input name="jumlahpin2" type="text" id="jumlahpin2" value="<?= $db->result(0, "jumlahpin2");  ?>" /></td>
    </tr>
	
	<tr>
      <td align="right">Jumlah Tiket Paket VVIP:</td>
      <td><input name="jumlahpin3" type="text" id="jumlahpin3" value="<?= $db->result(0, "jumlahpin3");  ?>" /></td>
    </tr>
	
	<tr>
      <td align="right">Jumlah Tiket Paket Super VVIP:</td>
      <td><input name="jumlahpin4" type="text" id="jumlahpin4" value="<?= $db->result(0, "jumlahpin4");  ?>" /></td>
	</tr>-->
    <tr>
      <td colspan="2" align="center"><label>
        <input type="submit" name="submit" id="submit" value="UPDATE  JUMLAH TIKET" />
      </label></td>
    </tr>
  </table>
</form>
<?
	break;
	case activation :
	$db->update("card", "pasif=1", "id='$no'");
	echo "<meta http-equiv='refresh' content='0;URL=?m=cardcenter'>";
	break;
	
	case pasifkan :
	$db->update("card", "pasif=0", "id='$no'");
	echo "<meta http-equiv='refresh' content='0;URL=?m=cardcenter'>";
	break;
}
?>	