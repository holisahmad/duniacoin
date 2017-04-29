<?
      $sbl=mysql_query("select * from konfirmasi where username='$user_session' and status='0' order by id");
	  while($row=mysql_fetch_row($sbl)) {
	  ?>
<table width="800" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="302" height="200" background="images/menunggu_confirm.png"><table width="779" border="0" align="left" cellpadding="2" cellspacing="2">
      <tr>
        <td width="176">&nbsp;</td>
        <td width="185"><font color="#FFFFFF"><strong>Menunggu Di Approve
          <?
      $sbl=mysql_query("select * from konfirmasi where username='$user_session' and status=0 order by id");
	  $row=mysql_fetch_row($sbl);
	  ?>
        </strong></font></td>
        <td width="195">&nbsp;</td>
        <td width="197">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><strong>
          <?= $db->dataku("nama", $user_session); ?>
        </strong>&nbsp;</td>
        <td><strong><font color="#FFFFFF">Transfer Kepada</font></strong></td>
        <td><font color="#FFFFFF">Rekening Penerima</font></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><font color="#FFCC00">
          <?= date("d-M-Y h:i:s",strtotime($row[6])); ?>
          &nbsp;</font></td>
        <td><font color="#FFFF00">
          <?= $row[5]; ?>
        </font></td>
        <td><font color="#FFFF00">
          <?= $db->dataku("bank", $row[5]); ?>
        </font></td>
      </tr>
      <tr>
        <td rowspan="3" valign="bottom"><div align="center"><strong><font color="#CCFF00" size="5">
            <?= $row[1]; ?>
          </font></strong></div>
            <div align="center"></div></td>
        <td><strong><font color="#FF0000">
          <?= rupiah($row[4]); ?>
        </font></strong></td>
        <td><font color="#FFFF00"> HP :
          <?= $db->dataku("hp", $row[5]); ?>
        </font></td>
        <td><font color="#FFFF00">
          <?= $db->dataku("norek", $row[5]); ?>
        </font></td>
      </tr>
      <tr>
        <td colspan="2"><div align="center"><font color="#FFFFFF"><strong>Menunggu Di Approve Penerima Transfer</strong></font></div></td>
        <td><font color="#FFFF00">
          <?= $db->dataku("an", $row[5]); ?>
        </font></td>
      </tr>
      <tr>
        <td colspan="3"><div align="center"><strong><font color="#FFFFFF">
            
        </font></strong></div></td>
      </tr>
    </table>    <p>&nbsp;</p>
    </td>
  </tr>
</table>
<p>
  <?
	  }
	  ?>
</p>
<p>&nbsp; </p>
