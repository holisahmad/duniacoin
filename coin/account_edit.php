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
?><form name="form1" method="post" action="?e=account_edit&page=update">
<table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>
    
    <table width="721" border="0" cellspacing="2" cellpadding="2">
      <tr>
        <td width="168"><strong>Edit Profile</strong></td>
        <td width="250">&nbsp;</td>
        <td width="31">&nbsp;</td>
        <td width="38">&nbsp;</td>
        <td width="202">&nbsp;</td>
      </tr>
      <tr>
        <td>Username </td>
        <td>: 
          <input name="username" type="text" id="username" value="<?= $db->dataku("username", $user_session); ?>" size="25" disabled="disabled" /></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Full Name</td>
        <td>: 
          <input name="nama" type="text" id="nama" value="<?= $db->dataku("nama", $user_session); ?>" size="25"  /></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>E-mail</td>
        <td>: 
          <input name="email" type="text" id="email" value="<?= $db->dataku("email", $user_session); ?>" size="25" /></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Mobile phone</td>
        <td>: 
          <input name="hp" type="text" id="hp" value="<?= $db->dataku("hp", $user_session); ?>" size="25" /></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Office phone</td>
        <td>: 
          <input name="phone" type="text" id="phone" value="<?= $db->dataku("phone", $user_session); ?>" size="25" /></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Address</td>
        <td>: 
          <input name="alamat" type="text" id="alamat" value="<?= $db->dataku("alamat", $user_session); ?>" size="25" /></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>City</td>
        <td>: 
          <input name="kota" type="text" id="kota" value="<?= $db->dataku("kota", $user_session); ?>" size="25" /></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Country</td>
        <td>: 
          <input name="negara" type="text" id="negara" value="<?= $db->dataku("negara", $user_session); ?>" size="25" /></td>
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
        <td><strong>Network</strong></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        
          <p>&nbsp;</p></td>
      </tr>
      <tr>
        <td>Refferal Username</td>
        <td>: 
          <input name="sponsor" type="text" id="sponsor" value="<?= $db->dataku("sponsor", $user_session); ?>" size="25" disabled="disabled" /></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Upline Username</td>
        <td>: 
          <input name="upline" type="text" id="upline" value="<?= $db->dataku("upline", $user_session); ?>" size="25" disabled="disabled" /></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>

</td>
      </tr>
      <tr>
        <td>Position</td>
        <td>: 
          <input name="posisi" type="text" id="posisi" value="<?= $db->dataku("posisi", $user_session); ?>" size="25" disabled="disabled" /></td>
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
        <td><strong>Bank Account</strong></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Bank name</td>
        <td>:
          <input name="bank" type="text" id="bank" value="<?= $db->dataku("bank", $user_session); ?>" size="25" readonly  /></td>
		 
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Account Number</td>
        <td>:
          <input name="norek" type="text" id="norek" value="<?= $db->dataku("norek", $user_session); ?>" size="25" readonly /></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Account holder</td>
        <td>:
          <input name="an" type="text" id="an" value="<?= $db->dataku("an", $user_session); ?>" size="25" readonly /></td>
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
        <td>Token codes</td>
        <td>:
          <input name="pin" type="password" id="pin" value="" size="10" /></td>
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
        <td>&nbsp;</td>
        <td><input type="submit" name="button" id="button" value="EDIT MY ACCOUNT" /></td>
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
		echo "<meta http-equiv=\"refresh\" content=\"1; url=?e=account_edit\">";
	} else {
	$db->update("member", "email='$email', hp='$hp', phone='$phone', alamat='$alamat', bank='$bank' , norek='$norek', an='$an', kota='$kota', negara='$negara'", "username='$user_session'");
	echo "<center><font color='#00F'>Your Account Has Been Updated ..!!</font></center>";
	echo "<meta http-equiv=\"refresh\" content=\"1; url=?e=account_edit\">";
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