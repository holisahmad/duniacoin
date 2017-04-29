<?
	if($user_status > 0 ) {
?>
<style type="text/css">
body,td,th {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 12px;
}
</style>
<?
switch ($page) {
	default :
?><form name="form1" method="post" action="?e=take_fund&page=update">
<table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="800" border="0" cellspacing="2" cellpadding="2">
      <tr>
        <td width="144"><strong>RA Deviden</strong></td>
        <td width="219">&nbsp;</td>
        <td width="48">&nbsp;</td>
        <td width="137">&nbsp;</td>
        <td width="220">&nbsp;</td>
      </tr>
      <tr>
        <td>Total Available</td>
        <td>: <strong><?php
    $total0 = $db->totalkomisi($user_session, "and validasi='1'");
	$widrl = $db->bayarkomisi($user_session, "");
	$tarik = $total0 - $widrl;
	?><a href='?e=bonus_statement'><?= rupiah($tarik); ?></a></strong></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Amount (IDR)</td>
        <td colspan="4">:
          <input name="nominal" type="text" id="nominal" value="<?= $tarik; ?>" size="20" /> 
          Jangan Pakai Titik Atau Koma ex <?= $tarik; ?></td>
        </tr>
      <tr>
        <td>Token</td>
        <td>:
          <input name="token" type="password" id="token" size="6" maxlength="6" /></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input type="submit" name="button" id="button" value="GET RA NOW" /></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>
</form>
<?
	break;
	
	case update :
	$total0 = $db->totalkomisi($user_session, "and status=0");
	$widrl = $db->bayarkomisi($user_session, "");
	$tarik = $total0 - $widrl;
	
	$mypin=$db->dataku("pin", $user_session);
	if($mypin<>$token){
		echo "<center><font color='#FF0000'><br>Maaf Token Anda Tidak Cocok !!</font></center>";
	} else {
	if($nominal>$tarik){
		echo "<strong><center><font color='#FF0000'>Maaf Anda Tidak Bisa Meminta RA Melebihi Nominal yang Tersedia di Account Anda</font></center></strong>";
	} else {
	if($nominal<$tarik){
		echo "<strong><center><font color='#FF0000'>Maaf Anda Tidak Bisa Meminta RA Kurang Dari Nominal yang Tersedia di Account Anda</font></center></strong>";
	} else {
	$db->select("username", "gh_start", "username='$user_session' and status='0'");
	$chkd_user = $db->num_rows();
	if ($chkd_user!= "") {
	echo "<H4><center><font color='#FF0000'>Anda Memiliki Proses PA  yang Masih Pending.</center></font>";
	} else {
	
	$sb1=mysql_query("select * from gf_start where username='$user_session' order by id");
	$row=mysql_fetch_row($sb1);
	$jhari=$row[34];
	
	$sb2=mysql_query("select * from hitung_hari where username='$user_session' order by tgl");
	$batas_tarik = 0;
	while($row=mysql_fetch_row($sb2)) {
		$batas_tarik = $batas_tarik + $row[3];
	}
	if($batas_tarik<$jhari) {
	echo "<strong><center><font color='#FF0000'>Maaf Waktu Anda Belum Cukup Untuk RA Fun</font></center></strong>";
	} else {
	$kodetrx=rand(11111, 99999);
	$waktu=date("Y-m-d h:i");
	$newdate = date('Y-m-d', strtotime('+1 days', strtotime($waktu)));
	$batas_tgl=substr($waktu,8,2);
	$batas_bln=substr($waktu,5,2);
	$batas_thn=substr($waktu,0,4);
	$batas_jam=substr($waktu,11,2);
	$batas_menit=substr($waktu,14,2);
	$db->insert("gh_start", "", "'', 'GH$kodetrx', '$user_session', '$clientdate', '$nominal', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '$nominal', '0', '0'");
	
	
	$db->insert("transfer", "", "'', '$user_session', '$clientdate', '$nominal', '1', 'GH$kodetrx'");
	$db->update("member", "kunci='0'", "username='$user_session'");
	
$hp=$db->dataku("hp", $user_session);
$message= "".$user_session." Permintaan RA fund  anda Sudah Masuk ke database ";
$db->smsnotifikasi ($hp, $message) 
	
	
	echo "<center><font color='#00F'><strong>RA Fund Daily Sukses ..!!</strong></font></center>";
	echo "<meta http-equiv=\"refresh\" content=\"2; url=?e=take_fund\">";
	}
	}
	}
	}
	}
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