<?

      $sbl=mysql_query("select * from gf_final where penerima='$user_session' and status='1' order by id");
	  while($row=mysql_fetch_row($sbl)) {
	  ?>
<table width="800" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="302" height="200" background="images/data_menerima_bantuan.png"><table width="700" border="0" align="left" cellpadding="2" cellspacing="2">
      <tr>
        <td width="179">&nbsp;</td>
        <td width="287">&nbsp;</td>
        <td width="234">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><strong>
          Transfer Kepada Anda 
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
        <td><strong>Note : </strong></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><strong><font color="#FF0000">
          <?= rupiah($row[5]); ?>
          
        

        </font></strong></td>
        <td><strong><?= $db->datatransfer("foto", $row[1]); ?>
	 
	  </a></strong></td>
      </tr>
      <tr>
        <td><div align="center"><font size="4"><strong>
          <?= $row[1]; ?>
        </strong></font></div></td>
        <td><strong> Tanggal :
            <?= date("d-m-Y", strtotime($row[3]));
				?>
        </strong>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>      <p>&nbsp;</p>
    </td>
  </tr>
</table>
<?
	  }
	  ?>