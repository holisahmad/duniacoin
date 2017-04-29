<style type="text/css">
<!--
.style11111 {
	color: #FF0000;
	font-weight: bold;
	font-size: 24px;
	font-family: Georgia, "Times New Roman", Times, serif;
}
.style1 {font-size: 16}
.style2 {font-size: 14px}
-->
</style><br /><br />

  <?php 
  			 $db->select("*", "konfirmasi", "username='$user_session'");
 			 $chkd_user = $db->num_rows();
			
			if ($chkd_user == 0 ) {
  
  ?>


<div align="center" class="style11111">
  <p class="style1">Maaf Account Anda Belum Aktif</p>
  <p class="style1">Untuk Aktivasi Silahkan Transfer Ke Rekening </p>
  
  <p class="style1"><span class="style2">
    <?= $db->config("Bank") ;?>
  </span></p>
   <p class="style2"><?= $db->config("Bank1"); ?></p>
  <p class="style2"><?= $db->config("Bank2") ;?></p>
    <p class="style2"><?= $db->config("Bank3"); ?></p>
    <span class="style2">
    <?php 
  }
 ?>
</span><span class="style2">    </span></div>
