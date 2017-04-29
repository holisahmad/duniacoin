<?
	if($user_status > 0 ) {
?>
<style type="text/css">
body,td,th {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 12px;
}
</style>

<table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="800" border="0" cellspacing="2" cellpadding="2">
      <tr>
        <td colspan="5" align="center"><p>Sponsored members</p>
          <?
$db->select("username, nama, tgl_daftar, hp, pin", "member", "sponsor='$user_session'");
		?><table width="800" border="0" cellpadding="2" cellspacing="1">
            <tr>
              <td width="7%" height="35" align="center" bgcolor="#FFCC00"><strong>#</strong></td>
              <td width="18%" align="center" bgcolor="#FFCC00"><strong>Username </strong></td>
              <td width="18%" align="center" bgcolor="#FFCC00"><strong>Name </strong></td>
              <td width="16%" align="center" bgcolor="#FFCC00"><strong>Register date</strong></td>
             
              <td width="27%" align="center" bgcolor="#FFCC00"><strong>Mobile</strong></td>
            </tr>
            <?
   		$n=1;
		while($row = $db->fetch_row()) {			
   ?>
            <tr>
              <td height="30" bgcolor="#ECECEC"><div align="center">
                <?= $n; ?>
              </div></td>
              <td bgcolor="#ECECEC"><div align="center">
                <?= $row[0]; ?>
              </div></td>
              <td bgcolor="#ECECEC"><div align="center">
                <?= $row[1]; ?>
              </div></td>
              <td bgcolor="#ECECEC"><div align="center">
                <?= date("d-m-Y", strtotime($row[2])); ?>
              </div></td>
             
              <td bgcolor="#ECECEC"><div align="center">
                <?= $row[3]; ?>
              </div></td>
            </tr>
            <?
	 	$n++;
		 }
	 ?>
          </table>
          <p>&nbsp;</p></td>
      </tr>
    </table></td>
  </tr>
</table>
<?
} else {
echo "<meta http-equiv=\"refresh\" content=\"1; url=illegal.html\">";
}
?>
