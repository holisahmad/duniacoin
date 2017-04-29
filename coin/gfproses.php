<?
      $sbl=mysql_query("select * from gf_proses where username='$user_session' and status=0 order by id");
	  while($row=mysql_fetch_row($sbl)) {
?>
<table width="800" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="302" height="200" align="left" valign="middle" background="images/gf-proses.png"><table width="764" border="0" align="left" cellpadding="2" cellspacing="2">
      <tr>
        <td width="186">&nbsp;</td>
        <td width="205"><strong>PA Transfer Now </strong></td>
        <td width="289" rowspan="6">
		<style>
.green{color:green;}
 
h1{
font-size:3em;
font-weight:bold;
font-family:Arial, Helvetica, sans-serif;
}
 
</style>
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
print "Batas Transfer Anda Tersisa : $days Jam";
if($days<1){
$db->update("gf_proses", "status='2'", "username='$user_session' and status='0'");
$db->update("gf_start", "status='2'", "username='$user_session' and trx='$row[1]'");
$db->update("member", "blokir='1'", "username='$user_session'");
} else {
}
?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><strong>
        <?= $row[4];
				?>
        </strong>&nbsp;</td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td><a href="?e=datarek&amp;mid=<?= $row[4]; ?>" target="_blank">Data Rekening Penerima
          &nbsp;</a></td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td><strong><font color="#FF0000">
        <?= rupiah($row[5]); ?>
        </font></strong></td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td><strong><a href="?e=konfirmasibb&amp;trx=<?= $row[1]; ?>&amp;mid=<?= $row[4]; ?>&amp;nominal=<?= $row[5]; ?>">Konfirmasi Transfer</a></strong></td>
        </tr>
    </table>
    </td>
  </tr>

  <?
	  }
	  ?>
