<?php
$db->delete("gf_proses", "trx='$trx' and kepada='$user_session'");
$db->update("gf_start", "pembatalan='1'", "username='$mid'");
$db->update("member", "kunci='0'", "username='$mid'");
echo "<center><font color='#FF0000'>Transaksi Di Batalkan ..!. <br></center></font></h4>";
echo "<meta http-equiv=\"refresh\" content=\"2; url=?e=home\">";
?>