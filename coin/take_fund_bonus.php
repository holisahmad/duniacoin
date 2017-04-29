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
?><form name="form1" method="post" action="?e=take_fund_bonus&page=update">
<table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="800" border="0" cellspacing="2" cellpadding="2">
      <tr>
        <td><strong>RA Bonus</strong></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="144">Paket Anda</td>
        <td width="219">:          
          <?
		$paketku=$db->dataku("paket_daftar", $user_session);
		echo $paketku;
		?></td>
        <td width="48">&nbsp;</td>
        <td width="137">&nbsp;</td>
        <td width="220">&nbsp;</td>
      </tr>
      <tr>
        <td>Total Available</td>
        <td>: <strong><?php
    $total0bonus = $db->totalkomisisponsor($user_session, "");
	$widrlbonus = $db->bayarkomisisponsor($user_session, "");
	$tarikfix = $total0bonus - $widrlbonus;
	?><a href='?e=bonus_statement'><?= rupiah($tarikfix); ?></a></strong></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Avaliable </td>
        <td>: <strong><? 
		$paketku=$db->dataku("paket_daftar", $user_session);
		if($paketku=="Bronze"){
		$batasambil=5000000;
		} else if($paketku=="Silver"){
		$batasambil=10000000;
		} else if($paketku=="Gold"){
		$batasambil=15000000;
		} else if($paketku=="Platinum"){
		$batasambil=25000000;
		} else if($paketku=="Diamond"){
		$batasambil=25000000;
		} else {
		}
		
		if($tarixfix>$batasambil){
		$batas_bonus=$batasambil;
		} else {
		$batas_bonus=$tarikfix;
		}
		echo rupiah($batas_bonus);
		?>
		</strong>		</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Batas Penarikan </td>
        <td>: <strong>
          <? 
		$paketku=$db->dataku("paket_daftar", $user_session);
		if($paketku=="Bronze"){
		$batasambil=5000000;
		} else if($paketku=="Silver"){
		$batasambil=10000000;
		} else if($paketku=="Gold"){
		$batasambil=15000000;
		} else if($paketku=="Platinum"){
		$batasambil=25000000;
		} else if($paketku=="Diamond"){
		$batasambil=25000000;
		} else {
		}
		
		echo rupiah($batasambil);
		?>
        </strong> / Minggu</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Amount (IDR)</td>
        <td colspan="4">: <?
		$paketku=$db->dataku("paket_daftar", $user_session);
		if($paketku=="Bronze"){
		include "tf_bonus_bronze.php";
		} else if($paketku=="Silver"){
		include "tf_bonus_silver.php";
		} else if($paketku=="Gold"){
		include "tf_bonus_gold.php";
		} else if($paketku=="Platinum"){
		include "tf_bonus_platinum.php";
		} else if($paketku=="Diamond"){
		include "tf_bonus_diamond.php";
		} else {
		}
		?>          </td>
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
        <td><input type="submit" name="Submit" id="button" value="AMBIL BONUS" /></td>
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
	$total0bonus = $db->totalkomisisponsor($user_session, "and status=0");
	$widrlbonus = $db->bayarkomisisponsor($user_session, "");
	$tarikbonus = $total0bonus - $widrlbonus;
	
	$paketku=$db->dataku("paket_daftar", $user_session);
		if($paketku=="Bronze"){
		$batasambil=1000000;
		} else if($paketku=="Silver"){
		$batasambil=2000000;
		} else if($paketku=="Gold"){
		$batasambil=5000000;
		} else if($paketku=="Platinum"){
		$batasambil=10000000;
		} else if($paketku=="Diamond"){
		$batasambil=25000000;
		} else if($paketku=="Crown"){
		$batasambil=60000000;
		} else {
		}
		
		if($tarikbonus>$batasambil){
		$batas_bonus=$batasambil;
		} else {
		$batas_bonus=$tarikbonus;
		}
	
	$mypin=$db->dataku("pin", $user_session);
	if($mypin<>$token){
		echo "<center><font color='#FF0000'><br>Maaf Token Anda Tidak Cocok !!</font></center>";
	} else {
	if($nominal>$batas_bonus){
		echo "<strong><center><font color='#FF0000'>Maaf Anda Tidak Bisa Meminta Bantuan Melebihi Nominal yang Tersedia di Account Anda</font></center></strong>";
	} else {
	
	$kodetrx=rand(11111, 99999);
	$waktu=date("Y-m-d h:i");
	$newdate = date('Y-m-d', strtotime('+1 days', strtotime($waktu)));
	$batas_tgl=substr($newdate,8,2);
	$batas_bln=substr($newdate,5,2);
	$batas_thn=substr($newdate,0,4);
	$batas_jam=substr($newdate,11,2);
	$batas_menit=substr($newdate,14,2);
	$db->insert("gh_start", "", "'', 'TFB$kodetrx', '$user_session', '$clientdate', '$nominal', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '$nominal', '0', '0'");
	$db->insert("transfer_sponsor", "", "'', '$user_session', '$clientdate', '$nominal', '1', 'TFB$kodetrx'");
	

$hp=$db->dataku("hp", $user_session);
$message= "".$user_session." Permintaan RA fund Bonus anda Sudah Masuk ke database ";
$db->smsnotifikasi ($hp, $message) 
	
	echo "<center><font color='#00F'><strong>RA fund Bonus Sukses ..!!</strong></font></center>";
	echo "<meta http-equiv=\"refresh\" content=\"2; url=?e=take_fund_bonus\">";
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