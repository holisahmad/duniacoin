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
?><form name="form1" method="post" action="?e=change_pin&page=update">
<table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="800" border="0" cellspacing="2" cellpadding="2">
      <tr>
        <td width="155"><strong>Change Token </strong></td>
        <td width="208">&nbsp;</td>
        <td width="48">&nbsp;</td>
        <td width="137">&nbsp;</td>
        <td width="220">&nbsp;</td>
      </tr>
      <tr>
        <td>Old Token </td>
        <td>: 
          <input name="oldpin" type="password" id="oldpin" value="" size="25" /></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>New Token </td>
        <td>: 
          <input name="newpin" type="password" id="newpin" value="" size="25" /></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Confirm</td>
        <td>: 
          <input name="newpinconfirm" type="password" id="newpinconfirm" value="" size="25" /></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;&nbsp;
          <input type="submit" name="button" id="button" value="CHANGE TOKEN" /></td>
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
	if($mypin<>$oldpin){
		echo "<center><font color='#FF0000'><br>Maaf PIN Lama yang Anda Masukan Tidak Sesuai</font></center>";
		echo "<meta http-equiv=\"refresh\" content=\"2; url=?e=change_pin\">";
	} else {
		if($newpin==""){
		echo "<center><font color='#FF0000'><br>Maaf Isian PIN Baru Tidak Boleh Kosong</font></center>";
		echo "<meta http-equiv=\"refresh\" content=\"2; url=?e=change_pin\">";
	} else {
		if($newpinconfirm==""){
		echo "<center><font color='#FF0000'><br>Maaf Isian Confirm PIN Baru Tidak Boleh Kosong</font></center>";
		echo "<meta http-equiv=\"refresh\" content=\"2; url=?e=change_pin\">";
	} else {
	if($newpin<>$newpinconfirm){
		echo "<center><font color='#FF0000'><br>Maaf PIN Baru Anda Dengan Confirm PIN Baru Tidak Sama</font></center>";
		echo "<meta http-equiv=\"refresh\" content=\"2; url=?e=change_pin\">";
	} else {
	$db->update("member", "pin='$newpin'", "username='$user_session'");
	echo "<center><font color='#00F'>Data PIN Account Anda berhasil Di Ganti ..!!</font></center>";
	echo "<meta http-equiv=\"refresh\" content=\"2; url=?e=change_pin\">";
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
