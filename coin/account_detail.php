<?

	if($user_status > 0 ) {

?>

<style type="text/css">

body,td,th {

	font-family: Verdana, Geneva, sans-serif;

	font-size: 12px;

}

</style>



<table width="700" border="0" align="center" cellpadding="3" cellspacing="3">

  <tr>

    <td width="166"><strong>Profile</strong></td>

    <td width="513">&nbsp;</td>

  </tr>

  <tr>

    <td>Username </td>

    <td>: <strong>

      <?= $user_session; ?>

    </strong></td>

  </tr>

  <tr>

    <td>Full name</td>

    <td>: <strong>

      <?= $db->dataku("nama", $user_session); ?>

    </strong></td>

  </tr>

  <tr>

    <td>E-mail</td>

    <td>: <strong>

      <?= $db->dataku("email", $user_session); ?>

    </strong></td>

  </tr>

  <tr>

    <td>Phone number</td>

    <td>: <strong>

      <?= $db->dataku("hp", $user_session); ?>

    </strong></td>

  </tr>

  <tr>

    <td>Office phone</td>

    <td>: <strong>

      <?= $db->dataku("phone", $user_session); ?>

    </strong></td>

  </tr>

  <tr>

    <td>Address</td>

    <td>: <strong>

      <?= $db->dataku("alamat", $user_session); ?>

    </strong></td>

  </tr>

  <tr>

    <td>City</td>

    <td>: <strong>

      <?= $db->dataku("kota", $user_session); ?>

    </strong></td>

  </tr>

  <tr>

    <td>Country</td>

    <td>: <strong>

      <?= $db->dataku("negara", $user_session); ?>

    </strong></td>

  </tr>

  <tr>

    <td>&nbsp;</td>

    <td>&nbsp;</td>

  </tr>

  <tr>

    <td><strong>Bank account</strong></td>

    <td>&nbsp;</td>

  </tr>

  <tr>

    <td>Bank</td>

    <td>: <strong>

      <?= $db->dataku("bank", $user_session); ?>

    </strong></td>

  </tr>

  <tr>

    <td>Acoount number</td>

    <td>: <strong>

      <?= $db->dataku("norek", $user_session); ?>

    </strong></td>

  </tr>

  <tr>

    <td>Holder</td>

    <td>: <strong>

      <?= $db->dataku("an", $user_session); ?>

    </strong></td>

  </tr>

  <tr>

    <td>&nbsp;</td>

    <td>&nbsp;</td>

  </tr>

  <tr>

    <td><strong>Network</strong></td>

    <td>&nbsp;</td>

  </tr>

  <tr>

    <td>Refferal Username</td>

    <td>: <strong>

      <?= $db->dataku("sponsor", $user_session); ?>

    </strong></td>

  </tr>

  <tr>

    <td>Upline Username</td>

    <td>: <strong>

      <?= $db->dataku("upline", $user_session); ?>

    </strong></td>

  </tr>

  <tr>

    <td>Position</td>

    <td>: <strong>

      <?= $db->dataupline("posisi", $user_session); ?>

    </strong></td>

  </tr>

  <tr>

    <td>&nbsp;</td>

    <td>&nbsp;</td>

  </tr>

  <tr>

    <td>&nbsp;</td>

    <td><a href="?e=account_edit">Edit My Account</a></td>

  </tr>

  <tr>

    <td>&nbsp;</td>

    <td>&nbsp;</td>

  </tr>

</table>

<p>&nbsp;</p>

<?

} else {

echo "<meta http-equiv=\"refresh\" content=\"1; url=illegal.html\">";

}

?>

