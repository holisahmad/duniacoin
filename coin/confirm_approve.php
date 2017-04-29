<?
      $sbl=mysql_query("select * from konfirmasi where penerima='$user_session' and status=0 order by id");
	  while($row=mysql_fetch_row($sbl)) {
	  
	  ?>

<table width="800" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="302" height="200" background="images/acept-reject.png"><table width="779" border="0" align="left" cellpadding="2" cellspacing="2">
      <tr>
        <td width="170">&nbsp;</td>
        <td colspan="2"><strong>Konfirmasi Transfer
            
        </strong></td>
        <td width="179">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>Dari :
          <?= $row[3]; ?></td>
        <td><div align="center" class="style3">Kode Transaksi</div></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td width="189"><strong>
        <?= rupiah($row[4]); ?>
        </strong></td>
        <td width="215" rowspan="3"><div align="center" class="style1">
            <h2 class="style2">
              <?= $row[1]; ?>
              </h2>
          </div></td>
        <td><div align="center"><strong><a href="?e=approve&amp;trx=<?= $row[1]; ?>&amp;mid=<?= $row[3]; ?>&amp;penerima=<?= $row[5]; ?>&amp;nominal=<?= $row[4]; ?>&amp;newtrx=<?= $row[10]; ?>">Approve</a></strong></div></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>Tgl  :
          <?= date("d-M-Y h:i:s", strtotime($row[6])); ?></td>
        <td><div align="right"><strong></strong></div></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>Note : <?= $row[7]; ?></td>
        <td><div align="center"><strong></strong></div></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td><div align="center"><strong><a href="?e=reject&amp;trx=<?= $row[1]; ?>&amp;mid=<?= $row[3]; ?>&amp;penerima=<?= $row[5]; ?>&amp;nominal=<?= $row[4]; ?>&amp;newtrx=<?= $row[10]; ?>">Reject</a></strong></div></td>
      </tr>
    </table>
      <p>&nbsp;</p>
      </td>
  </tr>
</table>
<?
}
?>
