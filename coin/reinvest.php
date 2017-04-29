<?
	if($user_status > 0 ) {
?>
<style type="text/css">
body,td,th {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 12px;
}
.merah {	color: #F00;
}
</style>
<?
switch ($page) {
	default :
?><form name="form1" method="post" action="?e=reinvest&page=update">
<table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="800" border="0" cellspacing="2" cellpadding="2">
      <tr>
        <td width="155"><p><strong>Re-Invest</strong></p>          </td>
        <td width="208">&nbsp;</td>
        <td width="48">&nbsp;</td>
        <td width="137">&nbsp;</td>
        <td width="220">&nbsp;</td>
      </tr>
      <tr>
        <td>Paket Daftar </td>
        <td><select name="paket_daftar" id="paket_daftar">
          <option value="<?= $db->dataku("paket_daftar", $user_session); ?>">
          <?= potong ($db->dataku("paket_daftar", $user_session)); ?>
          </option>
          <option value="500000">Rp.500 rb</option>
          <option value="1000000">Rp.1 Jt</option>
          <option value="5000000">Rp.5 Jt</option>
          <option value="10000000">Rp.10 Jt</option>
        </select></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Paket Hari</td>
        <td><select name="jlh_hari" id="jlh_hari">
          <option value="<?= $db->dataku("jlh_hari", $user_session); ?>">
            <?= $db->dataku("jlh_hari", $user_session); ?>
            </option>
          <option value="5">5</option>
          <option value="10">10</option>
          <option value="20">20</option>
          <option value="30">30</option>
        </select></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Tiket Aktivasi </td>
        <td><select name="pin" id="pin">
            <?php
			  $sbl=mysql_query("select jumlahpin from card where username='$user_session' order by id");
			  $row=mysql_fetch_row($sbl);
				echo "<option value='$row[0]'>$row[0]</option>";
		?>
          </select></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Withdrawal <span class="merah">*</span></td>
        <td><select name="wd" id="wd">
          <option value="Manual" selected="selected">Manual</option>
          <option value="Auto" selected="selected">Auto</option>
        </select></td>
        
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
        <td>Your Token</td>
        <td><input name="token" type="password" id="token" value="" size="10" /></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input type="submit" name="button" id="button" value="Proses" /></td>
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
	$mypin=$db->dataku("pin", $user_session);
	$hp = $db->dataku("hp", $user_session);
	
if ($pin<1) {
	echo "<H2><center><Font color=$warna>Maaf. Anda Tidak memiliki Tiket Aktivasi.</center></font></h2>";
} else {
	
	if($mypin<>$token){
		echo "<center><font color='#FF0000'><br>token Tidak cocok !!</font></center>";
		echo "<meta http-equiv=\"refresh\" content=\"2; url=?e=change_pass\">";
	} else {
	
	$oldpaket = $db->dataku("paket_daftar", $user_session);
	if ( $oldpaket > 0 )
	{ 
	
	$db->update("member", "jlh_hari='$jlh_hari' , payment='$wd'", "username='$user_session'");
	
	
echo "<center><font color='#00F'><strong>Proses Re-Invest sudah Aktif</strong></font></center>";

$db->aktivasi($user_session) ;
	
	 } else {
		
	$db->update("member", "paket_daftar='$paket_daftar , payment='$wd'', jlh_hari='$jlh_hari'", "username='$user_session'");
	 
	 
$rande=rand(000, 999);
$rp = $paket_daftar + $rande;
$rpx = rupiah($rp);
$norekx = $db->config("bank1");
$limite = date('Y-m-d H:i:s', strtotime('+1 days', strtotime($clientdate)));



 
$db->insert("order_aktivasi", "", "'', '$user_session', '$nama', '$hp', '$jlh', '$clientdate','$limite', '$bank' ,'$rp', 'Re-invest','0'");

$message = "Re-Inves disetujui segera lakukan Transfer Ke Rekening ".$norekx ." ".$rpx." Waktu 1 x 24 jam Terima Kasih.";

$db->smsnotifikasi($hp, $message) ;

echo "<center><font color='#00F'><strong>Proses Re-Invest Sudah Kami terima Silahkan Transfer</strong></font></center>";
echo "<center><font color='#00F'><strong> Ke Bank ".$bank." Nomilal ".rupiah($rp)." Waktu 1 x 24 jam Terima Kasih. </strong></font></center>";

	
	}
	}}
	
$mypin = $db->pinku("jumlahpin", $user_session);
$newpin=$mypin-1;
$db->update("card", "jumlahpin='$newpin'", "username='$user_session'");
$db->insert("history_card", "", "'', '$user_session', '',  '1', 'Re-invest   $user_session', '$clientdate'");
 	
	
	
	
	
	
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
