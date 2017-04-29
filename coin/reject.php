<?php
$db->select("trx", "gf_final", "trx='$trx'");
$chkd_final = $db->num_rows();
if ($chkd_final!= "") {
} else {
$db->insert("gf_final", "", "'', '$trx', '$mid', '$clientdate', '$penerima', '$nominal', '2', '$newtrx'");
}
$db->update("konfirmasi", "status='2'", "trx='$trx' and username='$mid' and penerima='$penerima'");
$db->update("gf_proses", "bayar='2'", "username='$mid'");
$db->update("gf_start", "status='2'", "username='$mid' and trx='$trx'");
$db->update("gf_start", "sukses='2'", "username='$mid' and trx='$trx'");
$db->update("komisi_sponsor", "validasi='2'", "dari='$mid'");
$db->update("member", "blokir='1'", "username='$mid'");

echo "<center><font color='#FF0000'>Transaksi Di Batalkan ..!. <br></center></font></h4>";
echo "<meta http-equiv=\"refresh\" content=\"2; url=?e=home\">";
?>