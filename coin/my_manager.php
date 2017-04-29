<?
	if($user_status > 0 ) {
?>
<style type="text/css">
body,td,th {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 12px;
}
.putih {
	font-weight: bold;
}
.putih {
	color: #FFF;
}
</style>

<table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="800" border="0" cellspacing="2" cellpadding="2">
      <tr>
        <td colspan="5" align="center"><strong>MY SPONSOR  IN  WTC-INT</strong></td>
      </tr>
      <tr>
        <td colspan="5" align="center">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="left"><table width="500" border="0" cellspacing="2" cellpadding="2">
          <tr>
            <td width="138" rowspan="7" align="center"><strong>Your Sponsor :<br /><br /><?
            $mysp=$db->dataku("sponsor", $user_session);
			$fotosp=$db->dataku("foto", $mysp);
			if($fotosp<>""){
				$fotone="<img src='../foto_profile/$fotosp' width='100' height='120' border='0' />";
			} else {
				$fotone="<img src='../foto_profile/no_photo.jpg' width='100' height='120' border='0' />";
			}
			echo $fotone;
			?>
            </strong></td>
            <td width="108" bgcolor="#666666" class="putih">Username</td>
            <td width="226">: <?= $mysp; ?></td>
          </tr>
          <tr>
            <td bgcolor="#666666" class="putih">Name</td>
            <td>: <?= $db->dataku("nama", $mysp); ?></td>
          </tr>
          <tr>
            <td bgcolor="#666666" class="putih">City</td>
            <td>: <?= $db->dataku("kota", $mysp); ?></td>
          </tr>
          <tr>
            <td bgcolor="#666666" class="putih">Country</td>
            <td>: <?= $db->dataku("negara", $mysp); ?></td>
          </tr>
          <tr>
            <td bgcolor="#666666" class="putih">Phone</td>
            <td>: <?= $db->dataku("phone", $mysp); ?></td>
          </tr>
          <tr>
            <td bgcolor="#666666" class="putih">Mobile</td>
            <td>: <?= $db->dataku("hp", $mysp); ?> </td>
          </tr>
          <tr>
            <td bgcolor="#666666" class="putih">e-mail</td>
            <td>: <?= $db->dataku("email", $mysp); ?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td colspan="5" align="center">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="center">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>
<?
} else {
echo "<meta http-equiv=\"refresh\" content=\"1; url=illegal.html\">";
}
?>
