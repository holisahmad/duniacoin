<?
	if($user_status > 0 ) {
?>
<style type="text/css">
.dddd {	color: #F00;
}
</style>

<div id="module">
  <table width="575" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td height="35" colspan="3"><div align="center"><font color="#FFFFFF"><strong><font color="#000066" size="2" face="Verdana, Arial, Helvetica, sans-serif">TRANSFER TICKET AKTIVASI</font></strong></font></div></td>
    </tr>
    <tr>
      <td width="10">&nbsp;</td>
      <td align="center" valign="top"><p align="left"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
        <?
switch ($page) {
	default :
?>
      </font></p>
        <p align="center"> Transfer Ticket Aktivasi </p>
        <form name="form1" method="post" action="?e=transferpin&page=transfer">
          <table width="90%"  border="0" align="center" cellpadding="4" cellspacing="0" class="bordertable">
            <tr>
              <td width="49%"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Jlh Ticket</font></td>
              <td width="51%"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>
              <? 
			  $mypin = $db->pinku("jumlahpin", $user_session);
			  echo $mypin; echo " Ticket Aktif";
			  ?></strong></font></td>
            </tr>
            <tr>
              <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Jlh Ticket  Di Transfer</font></td>
              <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>
                <input name="jmlpin" type="text" class="form" id="jmlpin"  size="6" maxlength="6" />
                Ticket</strong></font></td>
            </tr>
            <tr>
              <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> Penerima </font></td>
              <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>
                <input name="midtujuan" type="text" class="form" id="midtujuan"  size="25" maxlength="25" />
              </strong></font></td>
            </tr>
            <tr>
              <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Token  Anda</font></td>
              <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>
                <input name="token" type="password" class="form" id="token"  size="6" maxlength="6" />
              </strong></font></td>
            </tr>
            <tr valign="top">
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="2" align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;
                <input name="submit" type="submit" class="tombol" value="TRANSFER TICKET SEKARANG">
              </font></td>
            </tr>
            <tr>
              <td colspan="2">&nbsp;</td>
            </tr>
          </table>
          <p>&nbsp;</p>
        </form>        <p align="left"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
        <?
	break;
	
	case transfer :
	$mytoken=$db->dataku("pin", $user_session);
	if($mytoken<>$token){
		echo "<center><font color='#FF0000'>Maaf Token Salah</font></center>";
	} else {
	$mypin = $db->pinku("jumlahpin", $user_session);
	if($jmlpin>$mypin){
	echo "<center><font color='#FF0000'>Jumlah Ticket Tidak Cukup Untuk Di Transfer</font></center>";
	} else {
	$db->select("username", "member", "username='$midtujuan'");
	$chkd_user = $db->num_rows();
	if ($chkd_user<1) {
	echo "<center><font color='#FF0000'>Maaf Username Tujuan yang Anda Tulis Tidak Terdaftar</font></center>";
	} else {
	
	$mylev = $db->dataupline("level", $user_session);
			$lev_uid = $db->dataupline("level", $midtujuan);
			for($i=0;$i<$lev_uid;$i++) {
				$jd = $db->count_records("upline", "username='$midtujuan' and upline$i='$user_session'");
				$ad = $ad + $jd;
			}
		if($mylev>$lev_uid or $ad<1){
		echo "<center><font color='#FF0000'>Maaf Username Tujuan Tidak Dalam Jalur Bisnis Anda</font></center>";
	} else {
	
	$newpin=$mypin-$jmlpin;
	$db->update("card", "jumlahpin='$newpin'", "username='$user_session'");
	$sql = mysql_query("select username from card where username='$midtujuan'");
				$cek = mysql_num_rows($sql);
				if ($cek>0) {
	$pinbaru0 = $db->pinku("jumlahpin", $midtujuan);
	$pinbaru=$pinbaru0+$jmlpin;
	$db->update("card", "jumlahpin='$pinbaru'", "username='$midtujuan'");
	} else {
	$db->insert("card", "", "'', '$midtujuan', '$jmlpin', '$clientdate'");
	}
	//$db->insert("history_card", "", "'', '$user_session', '$jmlpin', 'Transfer Ticket Kepada : $midtujuan', '$clientdate'");
	$db->insert("history_card", "", "'', '$user_session', '',  '$jmlpin', 'Transfer Ticket Kepada : $midtujuan', '$clientdate'");
	$db->insert("history_card", "", "'', '$midtujuan', '$jmlpin',  '', 'Terima Ticket dari: $user_session', '$clientdate'");
	

?>
        </font>
        </p>
        <p><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Transfer <strong><?= $jmlpin; ?></strong> Buah Ticket Kepada <strong><?= $midtujuan; ?></strong> Telah Sukses ..!!
          <?
		  
	}
	}
	} }
	break;
}

?>
        </font></p>
      <p align="center">&nbsp;</p></td>
      <td width="10">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3">&nbsp;</td>
    </tr>
  </table>
  <h3 align="center">&nbsp;</h3>
  <h3 align="center">&nbsp;</h3>
  <font size="2" face="Verdana, Arial, Helvetica, sans-serif">  </font>
  <font size="2" face="Verdana, Arial, Helvetica, sans-serif">  </font>
<div id="notice"> 
    <div align="center"></div>
  </div>
  <font size="2" face="Verdana, Arial, Helvetica, sans-serif"></font></div>
<?
} else {
echo "<meta http-equiv=\"refresh\" content=\"1; url=illegal.html\">";
}
?>