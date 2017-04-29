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
?><form name="form1" method="post" action="?e=change_pass&page=update">
<table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="800" border="0" cellspacing="2" cellpadding="2">
      <tr>
        <td width="155"><p><strong>Change Password</strong></p>
          <p>&nbsp;</p></td>
        <td width="208">&nbsp;</td>
        <td width="48">&nbsp;</td>
        <td width="137">&nbsp;</td>
        <td width="220">&nbsp;</td>
      </tr>
      <tr>
        <td>Old Password </td>
        <td><input name="oldpass" type="password" id="oldpass" value="" size="25" /></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>New Password</td>
        <td><input name="newpass" type="password" id="newpass" value="" size="25" /></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Confirm</td>
        <td><input name="newpassconfirm" type="password" id="newpassconfirm" value="" size="25" /></td>
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
        <td><input name="pin" type="password" id="pin" value="" size="10" /></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input type="submit" name="button" id="button" value="CHANGE PASSWORD" /></td>
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
	if($mypin<>$pin){
		echo "<center><font color='#FF0000'><br>Your Token Do Not Match !!</font></center>";
		echo "<meta http-equiv=\"refresh\" content=\"2; url=?e=change_pass\">";
	} else {
	$myoldpass=$db->dataku("pass", $user_session);
	$oldpassmd5 = md5($oldpass);
	
	if($myoldpass<>$oldpassmd5){
		echo "<center><font color='#FF0000'><br>Maaf Password Lama Anda Tidak Sesuai</font></center>";
		echo "<meta http-equiv=\"refresh\" content=\"2; url=?e=change_pass\">";
	} else {
		if($newpass==""){
		echo "<center><font color='#FF0000'><br>Maaf Isian Password Baru Tidak Boleh Kosong</font></center>";
		echo "<meta http-equiv=\"refresh\" content=\"2; url=?e=change_pass\">";
	} else {
		if($newpassconfirm==""){
		echo "<center><font color='#FF0000'><br>Maaf Isian Confirm Password Baru Tidak Boleh Kosong</font></center>";
		echo "<meta http-equiv=\"refresh\" content=\"2; url=?e=change_pass\">";
	} else {
	if($newpass<>$newpassconfirm){
		echo "<center><font color='#FF0000'><br>Maaf Password Baru Anda Dengan Confirm Password Baru Tidak Sama</font></center>";
		echo "<meta http-equiv=\"refresh\" content=\"2; url=?e=change_pass\">";
	} else {
	
	$newpassmd5 = md5($newpass);
	$db->update("member", "pass='$newpassmd5'", "username='$user_session'");
	echo "<center><font color='#00F'>Your Password Account Has Been Updated ..!!</font></center>";
	echo "<meta http-equiv=\"refresh\" content=\"2; url=?e=change_pass\">";
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
