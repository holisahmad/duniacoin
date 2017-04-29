<?
      $sbl=mysql_query("select * from gf_proses where kepada='$user_session' and status=2 order by id");
	  while($row=mysql_fetch_row($sbl)) {
?>
<style type="text/css">
<!--
.style3 {
	font-size: 20px;
	font-weight: bold;
}
.style3 {
	font-size: 20px;
	font-weight: bold;
	color: #FFFFFF;
}
.style4 {font-size: 14px}
-->
</style>

<table width="800" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="302" height="200" background="images/habis_waktu_transfer.png"><table width="800" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="199">&nbsp;</td>
        <td width="215">&nbsp;</td>
        <td width="246">&nbsp;</td>
        <td width="44">&nbsp;</td>
        <td width="96">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><?= $row[2]; ?></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><div align="center" class="style3">TRX BATAL </div></td>
        <td><?= $db->dataku("nama", $row[2]); ?></td>
        <td><span class="style3">
          <?= rupiah($row[5]); ?></span></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><?= $db->dataku("hp", $row[2]); ?></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><?= date("d-m-Y h:i:s",strtotime($row[3])); ?></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><div align="center" class="style3">
          <?= $row[1]; ?></div></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>
<center></center>
<?
	  }
	  ?>
	  
      