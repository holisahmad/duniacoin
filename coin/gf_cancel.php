<?php
$tglgf=date("d-m-Y", strtotime($tgl));
$today=date("d-m-Y");
if($tglgf<>$today){
echo "<h3><center>Anda Tidak Bisa Membatalkan Transaksi PH</center></h3>";
echo "<meta http-equiv=\"refresh\" content=\"0; url=?e=assignment\">";
} else {
$db->delete("gf_start", "trx='$trx'");
$db->update("member", "kunci='0'", "username='$mid'");
$db->delete("hitung_hari", "username='$mid'");
$db->delete("komisi_sponsor", "dari='$mid' and validasi='0' and trx='$trx'");
$db->delete("komisi", "username='$mid' and validasi='0'");
echo "<center><font color='#FF0000'><h3>PH Anda Di Batalkan ..!. </h3><br></center></font></h4>";
echo "<meta http-equiv=\"refresh\" content=\"0; url=?e=give_fund\">";
}
?>