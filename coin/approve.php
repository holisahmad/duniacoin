<?
	if($user_status > 0 ) {
?>

<?php
$db->select("trx", "gf_final", "trx='$trx' and penerima='$penerima' and newtrx='$newtrx'");
$chkd_final = $db->num_rows();
if ($chkd_final!= "") {
} else {
if($trx<>"" and $mid<>"" and penerima<>"" and $nominal<>"" and $newtrx<>""){
$db->insert("gf_final", "", "'', '$trx', '$mid', '$clientdate', '$penerima', '$nominal', '1', '$newtrx'");
} else {
}
}

$db->update("konfirmasi", "status='1'", "trx='$trx' and username='$mid' and penerima='$penerima'");
$db->update("member", "kunci='0'", "username='$mid'");
$db->select("username", "gf_proses", "username='$mid' and bayar='0' and kepada='$penerima'");
	$chkd_user = $db->num_rows();
	if ($chkd_user!= "") {
		$db->update("gf_proses", "bayar='1'", "username='$mid' and trx='$trx' and kepada='$penerima'");
	} else {
	}

$db->select("username", "gf_proses", "username='$mid' and bayar='0'");
	$chkd_user = $db->num_rows();
	if ($chkd_user!= "") {
	} else {
		$db->update("gf_start", "sukses='1'", "username='$mid' and trx='$trx'");
	}
			
		$db->update("komisi_sponsor", "validasi='1'", "jenis='Komisi Sponsor' and dari='$mid'");
		//$db->update("komisi_sponsor", "validasi='1'", "jenis='PIN' and username='$mid'");

	
	$sbl=mysql_query("select * from gh_start where username='$penerima' and status='2' order by id");
	$row=mysql_fetch_row($sbl);
	if($row[5]=="" and $row[7]=="" and $row[9]=="" and $row[11]=="" and $row[13]=="" and $row[15]=="" and $row[17]=="" and $row[19]=="" and $row[21]=="" and $row[23]=="" and $row[25]=="" and $row[27]=="" and $row[29]=="" and $row[31]=="" and $row[33]=="" and $row[35]=="" and $row[37]=="" and $row[39]=="" and $row[41]=="" and $row[43]==""){
	$db->update("gh_start", "donatur1='$mid', jumlahgh1='$nominal'", "username='$penerima' and status='2'");
	} else if($row[5]<>"" and $row[7]=="" and $row[9]=="" and $row[11]=="" and $row[13]=="" and $row[15]=="" and $row[17]=="" and $row[19]=="" and $row[21]=="" and $row[23]=="" and $row[25]=="" and $row[27]=="" and $row[29]=="" and $row[31]=="" and $row[33]=="" and $row[35]=="" and $row[37]=="" and $row[39]=="" and $row[41]=="" and $row[43]==""){
	$db->update("gh_start", "donatur2='$mid', jumlahgh2='$nominal'", "username='$penerima' and status='2'");
	} else if($row[5]<>"" and $row[7]<>"" and $row[9]=="" and $row[11]=="" and $row[13]=="" and $row[15]=="" and $row[17]=="" and $row[19]=="" and $row[21]=="" and $row[23]=="" and $row[25]=="" and $row[27]=="" and $row[29]=="" and $row[31]=="" and $row[33]=="" and $row[35]=="" and $row[37]=="" and $row[39]=="" and $row[41]=="" and $row[43]==""){
	$db->update("gh_start", "donatur3='$mid', jumlahgh3='$nominal'", "username='$penerima' and status='2'");
	} else if($row[5]<>"" and $row[7]<>"" and $row[9]<>"" and $row[11]=="" and $row[13]=="" and $row[15]=="" and $row[17]=="" and $row[19]=="" and $row[21]=="" and $row[23]=="" and $row[25]=="" and $row[27]=="" and $row[29]=="" and $row[31]=="" and $row[33]=="" and $row[35]=="" and $row[37]=="" and $row[39]=="" and $row[41]=="" and $row[43]==""){
	$db->update("gh_start", "donatur4='$mid', jumlahgh4='$nominal'", "username='$penerima' and status='2'");
	} else if($row[5]<>"" and $row[7]<>"" and $row[9]<>"" and $row[11]<>"" and $row[13]=="" and $row[15]=="" and $row[17]=="" and $row[19]=="" and $row[21]=="" and $row[23]=="" and $row[25]=="" and $row[27]=="" and $row[29]=="" and $row[31]=="" and $row[33]=="" and $row[35]=="" and $row[37]=="" and $row[39]=="" and $row[41]=="" and $row[43]==""){
	$db->update("gh_start", "donatur5='$mid' jumlahgh5='$nominal'", "username='$penerima' and status='2'");
	} else if($row[5]<>"" and $row[7]<>"" and $row[9]<>"" and $row[11]<>"" and $row[13]<>"" and $row[15]=="" and $row[17]=="" and $row[19]=="" and $row[21]=="" and $row[23]=="" and $row[25]=="" and $row[27]=="" and $row[29]=="" and $row[31]=="" and $row[33]=="" and $row[35]=="" and $row[37]=="" and $row[39]=="" and $row[41]=="" and $row[43]==""){
	$db->update("gh_start", "donatur6='$mid', jumlahgh6='$nominal'", "username='$penerima' and status='2'");
	} else if($row[5]<>"" and $row[7]<>"" and $row[9]<>"" and $row[11]<>"" and $row[13]<>"" and $row[15]<>"" and $row[17]=="" and $row[19]=="" and $row[21]=="" and $row[23]=="" and $row[25]=="" and $row[27]=="" and $row[29]=="" and $row[31]=="" and $row[33]=="" and $row[35]=="" and $row[37]=="" and $row[39]=="" and $row[41]=="" and $row[43]==""){
	$db->update("gh_start", "donatur7='$mid', jumlahgh7='$nominal'", "username='$penerima' and status='2'");
	} else if($row[5]<>"" and $row[7]<>"" and $row[9]<>"" and $row[11]<>"" and $row[13]<>"" and $row[15]<>"" and $row[17]<>"" and $row[19]=="" and $row[21]=="" and $row[23]=="" and $row[25]=="" and $row[27]=="" and $row[29]=="" and $row[31]=="" and $row[33]=="" and $row[35]=="" and $row[37]=="" and $row[39]=="" and $row[41]=="" and $row[43]==""){
	$db->update("gh_start", "donatur8='$mid', jumlahgh8='$nominal'", "username='$penerima' and status='2'");
	} else if($row[5]<>"" and $row[7]<>"" and $row[9]<>"" and $row[11]<>"" and $row[13]<>"" and $row[15]<>"" and $row[17]<>"" and $row[19]<>"" and $row[21]=="" and $row[23]=="" and $row[25]=="" and $row[27]=="" and $row[29]=="" and $row[31]=="" and $row[33]=="" and $row[35]=="" and $row[37]=="" and $row[39]=="" and $row[41]=="" and $row[43]==""){
	$db->update("gh_start", "donatur9='$mid', jumlahgh9='$nominal'", "username='$penerima' and status='2'");
	} else if($row[5]<>"" and $row[7]<>"" and $row[9]<>"" and $row[11]<>"" and $row[13]<>"" and $row[15]<>"" and $row[17]<>"" and $row[19]<>"" and $row[21]<>"" and $row[23]=="" and $row[25]=="" and $row[27]=="" and $row[29]=="" and $row[31]=="" and $row[33]=="" and $row[35]=="" and $row[37]=="" and $row[39]=="" and $row[41]=="" and $row[43]==""){
	$db->update("gh_start", "donatur10='$mid', jumlahgh10='$nominal'", "username='$penerima' and status='2'");
	} else if($row[5]<>"" and $row[7]<>"" and $row[9]<>"" and $row[11]<>"" and $row[13]<>"" and $row[15]<>"" and $row[17]<>"" and $row[19]<>"" and $row[21]<>"" and $row[23]<>"" and $row[25]=="" and $row[27]=="" and $row[29]=="" and $row[31]=="" and $row[33]=="" and $row[35]=="" and $row[37]=="" and $row[39]=="" and $row[41]=="" and $row[43]==""){
	$db->update("gh_start", "donatur11='$mid', jumlahgh11='$nominal'", "username='$penerima' and status='2'");
	} else if($row[5]<>"" and $row[7]<>"" and $row[9]<>"" and $row[11]<>"" and $row[13]<>"" and $row[15]<>"" and $row[17]<>"" and $row[19]<>"" and $row[21]<>"" and $row[23]<>"" and $row[25]<>"" and $row[27]=="" and $row[29]=="" and $row[31]=="" and $row[33]=="" and $row[35]=="" and $row[37]=="" and $row[39]=="" and $row[41]=="" and $row[43]==""){
	$db->update("gh_start", "donatur12='$mid', jumlahgh12='$nominal'", "username='$penerima' and status='2'");
	} else if($row[5]<>"" and $row[7]<>"" and $row[9]<>"" and $row[11]<>"" and $row[13]<>"" and $row[15]<>"" and $row[17]<>"" and $row[19]<>"" and $row[21]<>"" and $row[23]<>"" and $row[25]<>"" and $row[27]<>"" and $row[29]=="" and $row[31]=="" and $row[33]=="" and $row[35]=="" and $row[37]=="" and $row[39]=="" and $row[41]=="" and $row[43]==""){
	$db->update("gh_start", "donatur13='$mid', jumlahgh13='$nominal'", "username='$penerima' and status='2'");
	} else if($row[5]<>"" and $row[7]<>"" and $row[9]<>"" and $row[11]<>"" and $row[13]<>"" and $row[15]<>"" and $row[17]<>"" and $row[19]<>"" and $row[21]<>"" and $row[23]<>"" and $row[25]<>"" and $row[27]<>"" and $row[29]<>"" and $row[31]=="" and $row[33]=="" and $row[35]=="" and $row[37]=="" and $row[39]=="" and $row[41]=="" and $row[43]==""){
	$db->update("gh_start", "donatur14='$mid', jumlahgh14='$nominal'", "username='$penerima' and status='2'");
	} else if($row[5]<>"" and $row[7]<>"" and $row[9]<>"" and $row[11]<>"" and $row[13]<>"" and $row[15]<>"" and $row[17]<>"" and $row[19]<>"" and $row[21]<>"" and $row[23]<>"" and $row[25]<>"" and $row[27]<>"" and $row[29]<>"" and $row[31]<>"" and $row[33]=="" and $row[35]=="" and $row[37]=="" and $row[39]=="" and $row[41]=="" and $row[43]==""){
	$db->update("gh_start", "donatur15='$mid', jumlahgh15='$nominal'", "username='$penerima' and status='2'");
	} else if($row[5]<>"" and $row[7]<>"" and $row[9]<>"" and $row[11]<>"" and $row[13]<>"" and $row[15]<>"" and $row[17]<>"" and $row[19]<>"" and $row[21]<>"" and $row[23]<>"" and $row[25]<>"" and $row[27]<>"" and $row[29]<>"" and $row[31]<>"" and $row[33]<>"" and $row[35]=="" and $row[37]=="" and $row[39]=="" and $row[41]=="" and $row[43]==""){
	$db->update("gh_start", "donatur16='$mid', jumlahgh16='$nominal'", "username='$penerima' and status='2'");
	} else if($row[5]<>"" and $row[7]<>"" and $row[9]<>"" and $row[11]<>"" and $row[13]<>"" and $row[15]<>"" and $row[17]<>"" and $row[19]<>"" and $row[21]<>"" and $row[23]<>"" and $row[25]<>"" and $row[27]<>"" and $row[29]<>"" and $row[31]<>"" and $row[33]<>"" and $row[35]<>"" and $row[37]=="" and $row[39]=="" and $row[41]=="" and $row[43]==""){
	$db->update("gh_start", "donatur17='$mid', jumlahgh17='$nominal'", "username='$penerima' and status='2'");
	} else if($row[5]<>"" and $row[7]<>"" and $row[9]<>"" and $row[11]<>"" and $row[13]<>"" and $row[15]<>"" and $row[17]<>"" and $row[19]<>"" and $row[21]<>"" and $row[23]<>"" and $row[25]<>"" and $row[27]<>"" and $row[29]<>"" and $row[31]<>"" and $row[33]<>"" and $row[35]<>"" and $row[37]<>"" and $row[39]=="" and $row[41]=="" and $row[43]==""){
	$db->update("gh_start", "donatur18='$mid', jumlahgh18='$nominal'", "username='$penerima' and status='2'");
	} else if($row[5]<>"" and $row[7]<>"" and $row[9]<>"" and $row[11]<>"" and $row[13]<>"" and $row[15]<>"" and $row[17]<>"" and $row[19]<>"" and $row[21]<>"" and $row[23]<>"" and $row[25]<>"" and $row[27]<>"" and $row[29]<>"" and $row[31]<>"" and $row[33]<>"" and $row[35]<>"" and $row[37]<>"" and $row[39]<>"" and $row[41]=="" and $row[43]==""){
	$db->update("gh_start", "donatur19='$mid', jumlahgh19='$nominal'", "username='$penerima' and status='2'");
	} else if($row[5]<>"" and $row[7]<>"" and $row[9]<>"" and $row[11]<>"" and $row[13]<>"" and $row[15]<>"" and $row[17]<>"" and $row[19]<>"" and $row[21]<>"" and $row[23]<>"" and $row[25]<>"" and $row[27]<>"" and $row[29]<>"" and $row[31]<>"" and $row[33]<>"" and $row[35]<>"" and $row[37]<>"" and $row[39]<>"" and $row[41]<>"" and $row[43]==""){
	$db->update("gh_start", "donatur20='$mid', jumlahgh20='$nominal'", "username='$penerima' and status='2'");
	
	} else {
	}
	
	$sbl=mysql_query("select * from gh_start where username='$penerima' order by id");
	$row=mysql_fetch_row($sbl);
	$newbayar = $row[45]+$nominal;
	$db->update("gh_start", "terbayar='$newbayar'", "username='$penerima' and status='2'");
	$kekurangan=$row[4]-$newbayar;
	$db->update("gh_start", "kekurangan='$kekurangan'", "username='$penerima' and status='2'");
	if($kekurangan<=0){
	$db->update("gh_start", "status='1'", "username='$penerima'");
	} else {
	}
	
	$db->aktivasi($mid, $nominal);
			
echo "<center><font color='#FF0000'>Data Sukses Di Approve ..!. <br></center></font></h4>";
?>
<?
} else {
}

echo "<meta http-equiv=\"refresh\" content=\"2; url=?e=home\">";
?>