<?
      $sbl=mysql_query("select * from gf_final where username='$user_session' and status='1' order by id");
	  while($row=mysql_fetch_row($sbl)) {
	  ?>
<table width="800" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="302" height="200" background="images/trx-sukses.png"><table width="700" border="0" align="left" cellpadding="2" cellspacing="2">
      <tr>
        <td width="195">&nbsp;</td>
        <td width="258"><strong>Transaksi Sukses</strong></td>
        <td width="227">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><strong>
          Transfer Kepada 
          <?= $row[4];
				?>
        </strong>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><strong> Transfer Dari
            <?= $row[2];
				?>
        </strong>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="23">&nbsp;</td>
        <td><strong><font color="#FF0000">
          <?= rupiah($row[5]); ?>
        </font></strong></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td rowspan="2"><div align="center"><strong>
          <h2><?= $row[1]; ?></h2>
        </strong></div></td>
        <td><strong> Tanggal :
            <?= date("d-m-Y", strtotime($row[3]));
				?>
        </strong>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>      
    <p>&nbsp;</p>
    </td>
  </tr>
</table>
<?
	  }
	  ?>