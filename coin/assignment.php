<?
      $sbl=mysql_query("select * from gf_proses where username='$user_session' and status=0 order by id");
	  while($row=mysql_fetch_row($sbl)) {
?>
<table width="800" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="302" height="200" background="images/gf-proses.png"><table width="779" border="0" align="left" cellpadding="2" cellspacing="2">
      <tr>
        <td width="164">&nbsp;</td>
        <td width="197"><font color="#FFFFFF"><strong>Transfer PA Fund
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
          <?= date("d-M-Y h:i:s",strtotime($row[3])); ?>
          &nbsp;</font></td>
        <td><font color="#FFFF00"><?= $row[4]; ?></font></td>
        <td><font color="#FFFF00"><?= $db->dataku("bank", $row[4]); ?></font></td>
      </tr>
      <tr>
        <td rowspan="3" valign="bottom"><div align="center"><strong><font color="#CCFF00" size="5">
              <?= $row[1]; ?>
        </font></strong></div>          <div align="center"></div></td>
        <td><strong><font color="#FF0000">
          <?= rupiah($row[5]); ?>
        </font></strong></td>
        <td><font color="#FFFF00">
          HP : <?= $db->dataku("hp", $row[4]); ?>
        </font></td>
        <td><font color="#FFFF00">
          <?= $db->dataku("norek", $row[4]); ?>
        </font></td>
      </tr>
      <tr>
        <td colspan="2"><div align="center"><a href="?e=konfirmasibb&amp;trx=<?= $row[1]; ?>&amp;mid=<?= $row[4]; ?>&amp;nominal=<?= $row[5]; ?>"><strong>Konfirmasi Transfer</strong></a></div></td>
        <td><font color="#FFFF00">
          <?= $db->dataku("an", $row[4]); ?>
        </font></td>
      </tr>
      <tr>
        <td colspan="3"><div align="center"><strong><font color="#FFFFFF">
          <?php
$tgl=$db->timer("tgl", $user_session);
$bln=$db->timer("bln", $user_session);
$thn=$db->timer("thn", $user_session);
$jam=$db->timer("jam", $user_session);
$menit=$db->timer("menit", $user_session);
$target = mktime($jam, $menit, 0, $bln, $tgl, $thn) ;
$today = time () ;
$difference =($target-$today) ;
$days =(int) ($difference/3600) ;
print "Batas Waktu Transfer Tersisa : $days Jam Lagi";
if($days<1){
$db->update("gf_proses", "status='2'", "username='$user_session' and status='0'");
$db->update("gf_start", "status='2'", "username='$user_session' and trx='$row[1]'");
$db->update("member", "blokir='1'", "username='$user_session'");
} else {
}
?>
        </font></strong></div></td>
        </tr>
    </table></td>
  </tr>
</table><center></center>
<?
	  }
	  ?>
	  
      