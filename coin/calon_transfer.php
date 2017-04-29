<?
      $sbl=mysql_query("select * from gf_proses where kepada='$user_session' and status=0 order by id");
	  while($row=mysql_fetch_row($sbl)) {
?>
<table width="800" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="302" height="200" background="images/penerima-transfer.png"><table width="250" border="0" align="center" cellpadding="2" cellspacing="2">
      <tr>
        <td><strong>Calon Pemberi Transfer</strong></td>
      </tr>
      <tr>
        <td><?= $row[2]; ?></td>
      </tr>
      <tr>
        <td><?= $db->dataku("nama", $row[2]); ?></td>
      </tr>
      <tr>
        <td><?= $db->dataku("hp", $row[2]); ?></td>
      </tr>
      <tr>
        <td><strong>
          <?= rupiah($row[5]); ?>
        </strong></td>
      </tr>
      <tr>
        <td><?php
$tgl=$db->timer("tgl", $row[2]);
$bln=$db->timer("bln", $row[2]);
$thn=$db->timer("thn", $row[2]);
$jam=$db->timer("jam", $row[2]);
$menit=$db->timer("menit", $row[2]);
$target = mktime($jam, $menit, 0, $bln, $tgl, $thn) ;
$today = time () ;
$difference =($target-$today) ;
$days =(int) ($difference/3600) ;
print "Batas Transfer Anda Tersisa : $days Jam";
if($days<1){
$db->update("gf_proses", "status='2'", "username='$row[2]' and status='0'");
$db->update("gf_start", "status='2'", "username='$row[2]' and status='0'");
$db->update("member", "blokir='1'", "username='$row[2]'");
} else {
}
?></td>
      </tr>
    </table></td>
  </tr>
</table><center></center>
<?
	  }
	  ?>
	  
      