<script type="text/javascript">
<!--
function confirmation(noid, kat, page) {
	var answer = confirm("Yakin akan " + page +  " kode aktivasi ini?")
	if (answer){
		//alert("Bye bye!")
		window.location = "?m=cardcenterb&page=" + kat + "&no=" + noid;
		
	}
	
}
//-->
</script>
<h2><img src="images/icon-48-menumgr.png" width="48" height="48" align="absmiddle" /> Kode Aktivasi RO</h2>
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
	$sql0 = $db->count_records("cardro", "status=1 $aktif");
	$sql = $db->select("*", "cardro", "status=1 $aktif", "", "", "", "$start, $limit");
	//mysql_close();
} else if($kat == 2) {
	$sql0 = $db->count_records("cardro", "kode like '%$keywrd%' or username like '%$keywrd%'");
	$sql = $db->select("*", "cardro", "serial like '%$keywrd%' or idmlm like '%$keywrd%'", "id desc", "", "", "$start, $limit");
} else if($kat == "0") {
	$sql0 = $db->count_records("cardro", "status=0 $aktif");
	$sql = $db->select("*", "cardro", "status=0 $aktif", "id desc", "", "", "$start, $limit");
} else {
	$sql0 = $db->count_records("cardro", $pasif);
	$sql = $db->select("*", "cardro", $pasif, "id desc", "", "", "$start, $limit");
}					
	$numrows = $sql0;
	
?>
<p align="center"><strong>DAFTAR KODE AKTIVASI RO</strong></p>
<table width="98%" border="0" align="center" cellpadding="5" cellspacing="1" style="border:solid #CCCCCC 1px">
  <tr class="tbl_header">
    <td colspan="3"> Daftar Kode Aktivasi Ro
      <select name="select" onchange="location =  this.options[this.selectedIndex].value" class="form">
           <option value="?m=cardcenterb&pilih0=selected" <? echo $pilih0; ?>>Semua</option>
            <option value="?m=cardcenterb&kat=1&pilih=selected" <? echo $pilih; ?>>Sudah Digunakan</option>
            <option value="?m=cardcenterb&kat=0&sel=selected" <? echo $sel; ?>>Belum Digunakan</option>
      </select> 
      Total : <?= $numrows; ?></td>
    <td colspan="2"><form id="form2" name="form2" method="post" action="?m=cardcenterb&amp;kat=2" style="margin:0; padding:0">
          <label>
            Cari kode/username : 
            <input name="keywrd" type="text" id="keywrd" />
        </label>
          <label>
          <input type="submit" name="Submit" value="CARI" />
          </label>
        </form>  </td>
  </tr>
  <tr class="tbl_header">
    <td width="3%" align="center">NO</td>
    <td width="21%" align="center">USERNAME</td>
    <td width="26%" align="center">JLH PIN I </td>
	<td width="26%" align="center">JLH PIN II </td>
    <td width="28%" align="center">TGL GENERATE</td>
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
	 <td align="center"><?= $row[4]; ?></td>
    <td align="center"><?= date("d-M-Y", strtotime($row[3])); ?></td>
    <td align="center">&nbsp;&nbsp;<a href="?m=cardcenterb&amp;page=edit&noid=<?= $row[0]; ?>"><img src="images/edit_f2.png" title="Edit Card" width="17" height="22" border="0" /></a> &nbsp;</td>
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
  <a href="?m=cardcenterb&kat=<?= $kat; ?>&show=1" style="font-size:10px; color:#0000CC"><< First </a> | <a href="?m=cardcenterb&kat=<?= $kat; ?>&show=<?= $previous; ?>" style="font-size:10px; color:#0000CC">< Previous </a> |
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
[ <a href="?m=cardcenterb&kat=<?= $kat; ?>&show=<?= $i; ?>" style="font-size:10px; color:#0000CC">
<?= $i; ?>
</a> ]
<?php
		
		}
	
	}

}

if ($display < $paging) {

	$next = $display + 1;
	
?>
| <a href="?m=cardcenterb&kat=<?= $kat; ?>&show=<?= $next; ?>" style="font-size:10px; color:#0000CC">Next ></a> | <a href="?m=cardcenterb&kat=<?= $kat; ?>&show=<?= $paging; ?>" style="font-size:10px; color:#0000CC">Last >></a>
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
	
	if($jumlahpin < 0 && $jumlahpinb < 0) {
		echo "<p align=center><b>Masukan jumlah PIN yang Akan Di Kirim!</b></p>";
	} else {
	$sql = mysql_query("select username from member where username='$dealer'");
				$cekuser = mysql_num_rows($sql);
				if ($cekuser>0) {
		
			//$rand_kode = randString ($pass_len = 6);
			//for($i=0;$i<$jumlahkode;$i++) {
				$sql = mysql_query("select username from cardro where username='$dealer'");
				$cek = mysql_num_rows($sql);
				if ($cek>0) {
				$sql = mysql_query("select jumlahpin, jumlahpinb from cardro where username='$dealer'");
				$dta = mysql_fetch_row($sql);
				$jpin = $dta[0];
				$newpin=$jpin+$jumlahpin;
				
				$jpinb = $dta[1];
				$newpinb=$jpinb+$jumlahpinb;
				$db->update("cardro", "jumlahpin='$newpin', jumlahpinb='$newpinb'", "username='$dealer'");
				$db->insert("history_cardro", "", "'', '$dealer', '$jumlahpin', 'Pembelian PIN Dari Admin', '$clientdate'");
				} else {
				$db->insert("cardro", "", "'', '$dealer', '$jumlahpin', '$clientdate', '$jumlahpinb'");
				$db->insert("history_cardro", "", "'', '$dealer', '$jumlahpin', 'Pembelian PIN Dari Admin', '$clientdate'");
			}
		

			
					
			

?>
<div id="notice"><img src="images/notice-info.png" width="29" height="29" align="absmiddle" />Kirim  PIN  Aktivasi Sukses ! </div>
<? 
} else {
echo "<h3><center>Maaf Username ".$dealer." Tidak Terdaftar</center></h3>";
}
 echo"<meta http-equiv=\"refresh\" content=\"2; url=./?m=cardcenterb\">";
} 
}
?>
<form name="form1" method="post" action="">
  <table width="80%" border="0" align="center" cellpadding="5" cellspacing="1" style="border:solid #CCCCCC 1px">
    <tr class="tbl_header">
      <td colspan="2" align="center">KIRIM PIN AKTIVASI RO (TIKET)</td>
    </tr>
    <tr>
      <td width="48%" align="right">Jumlah PIN RO I:</td>
      <td width="52%"><label>
        <input name="jumlahpin" type="text" id="jumlahpin" size="10" />
      </label></td>
    </tr>
	
	 <tr>
      <td width="48%" align="right">Jumlah PIN RO II:</td>
      <td width="52%"><label>
        <input name="jumlahpinb" type="text" id="jumlahpinb" size="10" />
      </label></td>
    </tr>
    <tr>
      <td align="right">Username Pemesan PIN :</td>
      <td><label>
        <input name="dealer" type="text" id="dealer" size="15" />
      </label></td>
    </tr>
    <tr>
      <td align="right">Harga Kartu :</td>
      <td><label>
        <input name="harga" type="text" id="harga" value="" size="15" disabled=disabled />
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
 frmvalidator.addValidation("jumlahkode","req","Masukkan jumlah Kode Aktivasi yang akan digenerate!");
 frmvalidator.addValidation("idmbr","req","Masukkan 3 digit ID Member!"); 
 frmvalidator.addValidation("dealer","req","Masukkan ID Dealer!");


</script>
<?
	break;
	case delete :
		//echo "delete no $no";
		//myquery("delete from member where username='$mid'");
		
		$db->delete("cardro", "id='$no'");
		//$up = dataupline("upline0", $mid);
		//$pos = dataupline("posisi", $mid);
		//update("upline", "$pos=''", "username='$up'");
		//myquery("delete from upline where username='$mid'");
		//mysql_close();
		echo "<meta http-equiv='refresh' content='0;URL=?m=cardcenterb'>";
	break;	
	
	case edit :
	
if( isset($_POST['submit'])) {
	$db->update("cardro", "jumlahpin='$jumlahpin', jumlahpinb='$jumlahpinb'", "id='$noid'");
	echo "<p align=center><b>Kartu berhasil diupdate!</b></p>";
}

	$db->select("*", "cardro", "id='$noid'");	
?>
<form id="form2" name="form1" method="post" action="">
  <table width="80%" border="0" align="center" cellpadding="4" cellspacing="0">
    <tr>
      <td width="44%" align="right"> Member :</td>
      <td width="56%"><input name="username" type="text" id="idmlm" value="<?= $db->result(0, "username");  ?>" />
      <input name="noid" type="hidden" id="id" value="<?= $db->result(0, "id");  ?>" /></td>
    </tr>
    <tr>
      <td align="right">Jumlah PIN I:</td>
      <td><input name="jumlahpin" type="text" id="jumlahpin" value="<?= $db->result(0, "jumlahpin");  ?>" /></td>
    </tr>
	
	<tr>
      <td align="right">Jumlah PIN II:</td>
      <td><input name="jumlahpinb" type="text" id="jumlahpinb" value="<?= $db->result(0, "jumlahpinb");  ?>" /></td>
    </tr>
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
	$db->update("cardro", "pasif=1", "id='$no'");
	echo "<meta http-equiv='refresh' content='0;URL=?m=cardcenterb'>";
	break;
	
	case pasifkan :
	$db->update("cardro", "pasif=0", "id='$no'");
	echo "<meta http-equiv='refresh' content='0;URL=?m=cardcenterb'>";
	break;
}
?>	