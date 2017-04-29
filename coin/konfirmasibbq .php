<?
	if($user_status > 0) {
?>
<div id="module">
  <table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="10">&nbsp;</td>
      <td><p align="left"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
        <?
		  
switch ($page) {
	default :	
			
?>
      </font></p>
        <form action="?e=konfirmasibb&page=submit" method="post" enctype="multipart/form-data" name="form1">
          <table width="90%" border="0" align="center" cellpadding="2" cellspacing="1">
            <tr>
              <td width="37%" align="right"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Username : </font></td>
              <td width="63%"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>
                <?= $user_session; ?>
              </b></font></td>
            </tr>
            <tr>
              <td align="right"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Nama : </font></td>
              <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>
                <?= $db->dataku("nama", $user_session); ?>
                <label>
                <input name="nama" type="hidden" id="nama" value="<?= $db->dataku("nama", $user_session); ?>">
                </label>
                <input name="kota" type="hidden" id="kota" value="<?= $db->dataku("kota", $user_session); ?>">
                <input name="edit" type="hidden" id="edit" value="<?= $edit; ?>" />
              </b></font></td>
            </tr>
            <tr>
              <td align="right" valign="top"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Kode Transaksi : </font></td>
              <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
                <input name="trx" type="text" class="form" id="trx" value="<?= $trx; ?>" size="25" />
              </font></td>
            </tr>
            <tr>
              <td align="right" valign="top"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Username Penerima  : </font></td>
              <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
                <input name="mid" type="text" class="form" id="mid" value="<?= $mid; ?>" size="25" />
              </font></td>
            </tr>
            <tr>
              <td align="right" valign="top"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Nominal Bantuan :</font></td>
              <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
                <input name="nominal" type="text" class="form" id="nominal" value="<?= $nominal; ?>" size="25" />
              </font></td>
            </tr>
            <tr>
              <td align="right" valign="top"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Tanggal Transfer :</font></td>
              <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
                <input name="clientdate" type="text" class="form" id="clientdate" value="<?= $clientdate; ?>" size="25" />
              </font></td>
            </tr>
            <tr>
              <td align="right"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Upload Bukti Transfer : </font></td>
              <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
                <label>
                <input name="file" type="file" id="file" size="25" class="form" />
                </label>
                <input name="bukti_gf" type="hidden" class="form" id="bukti_gf" value="<?= $bukti_gf; ?>" size="12" />
              </font></td>
            </tr>
            <tr>
              <td align="center" valign="top">&nbsp;</td>
              <td valign="top"><p><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
                  <input type="submit" name="Submit" value="KIRIM KONFIRMASI" class="tombol" />
                </font></p>
                  <p>&nbsp;</p></td>
            </tr>
          </table>
        </form>        <p align="left"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
        <?
	break;
	
case submit :
if($page == "submit") {
$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 20000000)
&& in_array($extension, $allowedExts))
  {
$img1_name=rand(1111111, 9999999);
move_uploaded_file($_FILES["file"]["tmp_name"], "../bukti_gf/$img1_name.$extension");
	  //$img1_name=$_FILES["file"]["name"];
	  
	 	$newtrx=rand(11111, 99999);
	 	
$hp = $db->dataku("hp" , $mid);	 	

		if($edit > 0) {
			$db->insert("konfirmasi", "", "'', '$trx', '$user_session', '$user_session', '$nominal', '$mid', '$clientdate', '$img1_name.$extension', '0', '1', '$newtrx'");
			$db->update("gf_proses", "status=1", "trx='$trx' and kepada='$mid'");
			
		$message ="".$mid." anda mendapat Transfer  dari partisipan ".$user_session."  lakukan konfirmasi dimember area anda ";	
		$db->smsnotifikasi ($hp , $message) ;
			
		} else {	
			$db->insert("konfirmasi", "", "'', '$trx', '$user_session', '$user_session', '$nominal', '$mid', '$clientdate', '$img1_name.$extension', '0', '1', '$newtrx'");
			$db->update("gf_proses", "status=1", "trx='$trx' and kepada='$mid'");
			
		$message ="".$mid." anda mendapat Transfer dari partisipan ".$user_session." no trx ".$trx." lakukan konfirmasi dimember area anda ";	
		$db->smsnotifikasi ($hp , $message) ;
		
		}
?>
        </font></p>
        <p align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Konfirmasi Transfer Anda berhasil di Kirimkan. </strong></font></p>
        <p align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>System Telah Mengirimkan Konfirmasi Transfer <br />
        Kepada Penerima Bantuan</strong></font></p>
        <p align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong><br>
          Terima kasih</strong></font></p>
<p align="left"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
          <?
	} else {
	?>
	<p align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Foto Bukti Transfer Tidak Di Terima </strong></font></p>
        <p align="left"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
          <?
		  }
	break;
	}
	}
?>
      </font> </p></td>
      <td width="10">&nbsp;</td>
    </tr>
  </table>
  <h3 align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
  </font></h3>
</div>
<?
} else {
echo "<meta http-equiv=\"refresh\" content=\"1; url=illegal.html\">";
}
?>