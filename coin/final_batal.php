<?
      $sbl=mysql_query("select * from gf_final where penerima='$user_session' and status='2' order by id");
	  while($row=mysql_fetch_row($sbl)) {
	  ?>
<table width="800" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="302" height="200" background="images/trx-batal.png"><table width="700" border="0" align="left" cellpadding="2" cellspacing="2">
      <tr>
        <td width="179">&nbsp;</td>
        <td width="287"><strong>Transaksi Batal</strong></td>
        <td width="234">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><strong>
          Transfer Kepada 
          <?= $row[4];
				?>
        </strong>&nbsp;</td>
        <td><div align="center">Kode Transaksi</div></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><strong>  Dari
            <?= $row[2];
				?> (Batal)
        </strong></td>
        <td rowspan="4"><div align="center">
          <h2><font color="#0000FF"><strong>
            <?= $row[1];
				?>
            </strong></font></h2>
        </div></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><strong><font color="#FF0000">
          <?= rupiah($row[5]); ?>
        </font></strong></td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td><strong> Tanggal :
            <?= date("d-m-Y", strtotime($row[3]));
				?>
        </strong>&nbsp;</td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td><strong>Di Reject Oleh 
          <?= $row[4];
				?>
        </strong></td>
        </tr>
    </table>      
    <p>&nbsp;</p>
    </td>
  </tr>
</table>
<?
	  }
	  ?>