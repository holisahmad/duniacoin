<?
      $sbl=mysql_query("select * from gf_start where username='$user_session' and arahkan_ph=0 order by id");
	  while($row=mysql_fetch_row($sbl)) {
?>
<table width="800" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="302" height="200" background="images/gf_start.png"><table width="779" border="0" align="left" cellpadding="2" cellspacing="2">
      <tr>
        <td width="184">&nbsp;</td>
        <td width="180"><font color="#FFFFFF"><strong>PA Fund Menunggu
            <?
      $sbl=mysql_query("select * from gf_start where username='$user_session' and arahkan_ph=0 order by id");
	  $row=mysql_fetch_row($sbl);
	  ?>
        </strong></font></td>
        <td width="196">&nbsp;</td>
        <td width="197">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><strong>
        <?= $db->dataku("nama", $user_session);
				?>
        </strong>&nbsp;</td>
        <td><strong><font color="#FFFFFF">Transfer Kepada</font></strong></td>
        <td><font color="#FFFFFF">Rekening Penerima</font></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><font color="#FFCC00">
          <?= date("d-M-Y h:i:s",strtotime($row[3])); ?>
&nbsp;</font></td>
        <td><font color="#FFFF00">No HP Penerima</font></td>
        <td><font color="#FFFF00">Menunggu .....</font></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><strong><font color="#FF0000">
          <?= rupiah($row[4]); ?>
        </font></strong></td>
        <td><div align="left"><font color="#FFFF00">Menunggu .....</font></div></td>
        <td><font color="#FFFF00">&nbsp;</font></td>
      </tr>
      <tr>
        <td><div align="center"><strong><font color="#CCFF00" size="5">
          <?= $row[1]; ?></font></strong></div></td>
        <td>&nbsp;</td>
        <td><div align="left"><strong></strong></div></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><div align="left"></div></td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table><center></center>
<?
	  }
	  ?>
	  
      