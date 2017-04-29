<?
	if($user_status > 0) {
?>
<div id="module">
  <table width="574" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="9">&nbsp;</td>
      <td width="561"><p align="left"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
        <?
		  
switch ($page) {
	default :	
			
?>
      </font></p>
        <form action="?e=konfirmasibb&page=submit" method="post" enctype="multipart/form-data" name="form1">
          <table width="93%" border="0" align="center" cellpadding="2" cellspacing="1">
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
              <td align="right" valign="top"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Bank  : </font></td>
              <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
                <input name="bank" type="text" class="form" id="bank" value="<?= $db->dataku("bank" , $mid);	 ?>" size="25" />
              </font></td>
            </tr>
			
			<tr>
              <td align="right" valign="top"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">No rekening  : </font></td>
              <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
                <input name="norek" type="text" class="form" id="norek" value="<?= $db->dataku("norek" , $mid);	 ?>" size="25" />
              </font></td>
            </tr>
			<tr>
              <td align="right" valign="top"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Nama direkening   : </font></td>
              <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
                <input name="an" type="text" class="form" id="an" value="<?= $db->dataku("an" , $mid);	 ?>" size="25" />
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
              <td align="Center" valign="top"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Note  </td>
              <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
                <label></label>
                <textarea name="note" cols="50" class="form" id="note"></textarea>
              </font></td>
            </tr>
			
            <tr>
              <td align="right">&nbsp;</td>
              <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
                <label></label>
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
 
$newtrx=rand(11111, 99999);
	 	
$hp = $db->dataku("hp" , $mid);	 	

		if($edit > 0) {
			$db->insert("konfirmasi", "", "'', '$trx', '$user_session', '$user_session', '$nominal', '$mid', '$clientdate', '$note', '0', '1', '$newtrx'");
			$db->update("gf_proses", "status=1", "trx='$trx' and kepada='$mid'");
			
		$message ="".$mid." anda mendapat Transfer  dari partisipan ".$user_session."  lakukan konfirmasi dimember area anda ";	
		$db->smsnotifikasi ($hp , $message) ;
			
		} else {	
			$db->insert("konfirmasi", "", "'', '$trx', '$user_session', '$user_session', '$nominal', '$mid', '$clientdate', '$note', '0', '1', '$newtrx'");
			$db->update("gf_proses", "status=1", "trx='$trx' and kepada='$mid'");
			
		$message ="".$mid." anda mendapat Transfer dari partisipan ".$user_session." no trx ".$trx."  dengan Note ".$note." lakukan konfirmasi dimember area anda ";	
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