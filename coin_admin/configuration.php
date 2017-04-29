<?
if(isset( $_SESSION['valid_admin'])) {
$valid_admin=$_SESSION['valid_admin'];
?>


<script type="text/javascript">
<!--
function confirmation(noid) {
	var answer = confirm("Are You sure to delete this Article?")
	if (answer){
		//alert("Bye bye!")
		window.location = "?m=content&page=delete&no=" + noid;
		
	}
	
}
//-->
</script>
<h2><img src="images/icon-48-article.png" width="48" height="48" align="absmiddle"> Konfigurasi Sistem </h2>
<?
switch($page) {
	default :
	$db->select("name, email, domain, alamat, hpsms, bank, bank1, bank2, bank3, minwd, biaya, biaya2, biaya3,  komisi_sponsor, komisi_sponsorw, komisi_sponsorb, kom_sponexc, kom_pasangan,kom_pasanganb, kom_pasanganc, kom_pasangexc,  matching, matching2, matching3, matching4, automaintain, setauto, reward1, reward2, reward3, reward4, reward5, reward6, reward7, kir1, kir2, kir3, kir4, kir5, kir6, kir7, kar1, kar2, kar3, kar4, kar5, kar6, kar7, komlev, kedalaman, komgen ,kedalaman2, flushout, flushoutb, flushoutc, flushoutd,  ym ,  ro_kir1, ro_kir2, ro_kir3, ro_kir4, ro_kir5, ro_kir6, ro_kir7, ro_kar1, ro_kar2, ro_kar3, ro_kar4, ro_kar5, ro_kar6, ro_kar7, ro_reward1, ro_reward2,ro_reward3, ro_reward4, ro_reward5, ro_reward6, ro_reward7", "configuration", "id=1");
	

		if($act == 1 or $act) {
?>
<div id="notice"><img src="images/notice-info.png" width="29" height="29" align="absmiddle" />Data telah berhasil diupdate ! </div>
	<?
	}
	?>
<form id="form2" name="form2" method="post" action="?m=configuration&amp;page=submit">
  <table width="80%" border="0" align="center" cellpadding="4" cellspacing="1">
    <tr class="tbl_header"> 
      <td colspan="2"><div align="center">PENGATURAN PEMILIK WEBSITE </div></td>
    </tr>
    <tr> 
      <td width="43%" align="right">Nama :</td>
      <td width="57%"><input name="name" type="text" id="name" value="<?= $db->result(0, "name"); ?>" size="40" />
      <input name="no" type="hidden" id="no" value="1" size="10" /></td>
    </tr>
    <tr> 
      <td align="right">E-mail :</td>
      <td><input name="email" type="text" id="email" value="<?= $db->result(0, "email"); ?>" size="40" /></td>
    </tr>
    <tr>
      <td align="right">Nama Domain :</td>
      <td><input name="domain" type="text" id="domain" value="<?= $db->result(0, "domain"); ?>" size="40" /></td>
    </tr>
    <tr> 
      <td align="right" valign="top">Alamat Lengkap :</td>
      <td><textarea name="alamat" cols="40" rows="4" id="email3"><?= $db->result(0, "alamat"); ?></textarea></td>
    </tr>
    <tr> 
      <td align="right">Telepon/HP/SMS :</td>
      <td><input name="telepon" type="text" id="telepon" value="<?= $db->result(0, "hpsms"); ?>" size="40" /></td>
    </tr>
    <tr> 
      <td align="right">YM :</td>
      <td><input name="ym" type="text" id="ym" value="<?= $db->result(0, "ym"); ?>" size="40" />        </td>
    </tr>
    <tr> 
      <td align="right" valign="top">Data Bank 1 :<br />
        (ditulis lengkap dengan nama bank, no. rekening &amp; nama pemilik rekening)      </td>
      <td><textarea name="bank" cols="40" rows="3" id="bank"><?= $db->result(0, "bank"); ?></textarea></td>
    </tr>
    <tr> 
      <td align="right" valign="top">Data Bank 2 :<br />
        (ditulis lengkap dengan nama bank, no. rekening &amp; nama pemilik rekening)      </td>
      <td><textarea name="bank1" cols="40" rows="3" id="bank1"><?= $db->result(0, "bank1"); ?></textarea></td>
    </tr>
    <tr> 
      <td align="right" valign="top">Data Bank 3 :<br />
        (ditulis lengkap dengan nama bank, no. rekening &amp; nama pemilik rekening)      </td>
      <td><textarea name="bank2" cols="40" rows="3" id="bank2"><?= $db->result(0, "bank2"); ?></textarea></td>
    </tr>
    <tr>
      <td align="right" valign="top">Data Bank 4 :<br />
        (ditulis lengkap dengan nama bank, no. rekening &amp; nama pemilik rekening) </td>
      <td><textarea name="bank3" cols="40" rows="3" id="bank3"><?= $db->result(0, "bank3"); ?>
    </textarea></td>
    </tr>
    <tr class="tbl_header"> 
      <td colspan="2"><div align="center">PENGATURAN  KOMISI SPONSOR</div></td>
    </tr>
    <tr>
      <td align="right">Harga Paket I:</td>
      <td><input name="biaya" type="text" id="biaya" value="<?= $db->result(0, "biaya"); ?>" size="10" />
        (ditulis tanpa tanda baca) </td>
    </tr>
	
	<tr>
      <td align="right">Harga Paket II:</td>
      <td><input name="biaya2" type="text" id="biaya2" value="<?= $db->result(0, "biaya2"); ?>" size="10" />
        (ditulis tanpa tanda baca) </td>
    </tr>
	<tr>
      <td align="right">Harga Paket III:</td>
      <td><input name="biaya3" type="text" id="biaya3" value="<?= $db->result(0, "biaya3"); ?>" size="10" />
        (ditulis tanpa tanda baca) </td>
    </tr>
	
    <tr>
      <td align="right">Komisi Sponsor Paket I:</td>
      <td><input name="k_sponsor" type="text" id="k_sponsor" value="<?= $db->result(0, "komisi_sponsor"); ?>" size="10" />
        (ditulis tanpa tanda baca) </td>
    </tr>
	
	<tr>
      <td align="right">Komisi Sponsor Paket II:</td>
      <td><input name="k_sponsorw" type="text" id="k_sponsorw" value="<?= $db->result(0, "komisi_sponsorw"); ?>" size="10" />
        (ditulis tanpa tanda baca) </td>
    </tr>
	
	<tr>
      <td align="right">Komisi Sponsor Paket III:</td>
      <td><input name="kom_sponexc" type="text" id="kom_sponexc" value="<?= $db->result(0, "kom_sponexc"); ?>" size="10" />
        (ditulis tanpa tanda baca) </td>
    </tr>
	
	
	 <tr>
      <td align="right">Komisi Sponsor RO:</td>
      <td><input name="k_sponsorb" type="text" id="k_sponsorb" value="<?= $db->result(0, "komisi_sponsorb"); ?>" size="10" />
        (ditulis tanpa tanda baca) </td>
    </tr>
	<tr class="tbl_header"> 
      <td colspan="2"><div align="center">PENGATURAN  KOMISI GENERASI </div></td>
    </tr>
 <tr>
     

        <select name="kedalaman" id="kedalaman" onChange="location =  this.options[this.selectedIndex].value">
		<?
		$lv = 15;
		$kdlm = explode("|", $db->result(0, "kedalaman"));
		$kd = $kdlm[0];
		for($i=1;$i<=$lv;$i++) {
			if($kd == $d or !$d) {
				$kd = $kd;
			} else {
				$kd = $d;
			}
			if($d == $i or $kd == $i) {
				$sel = "selected=selected";
			} else {
				$sel = "";

			}		

			
		}
		?>	

        </select>

      </label></td>

    </tr>

   <?

   $klev = $db->result(0, "komlev");
	if($kd == $d or !$d) {
		$kd = $kd;

	} else {
		$kd = $d;
	}

 //  if($pg == "komlev");

   	for($i=0;$i<$kd;$i++) {
		$komlev = explode("|", $klev); 
		$x = $i+1;

?>	



    <tr>



      <td align="right">Komisi Level <?= $x; ?> :</td>



      <td colspan="3"><input name="<?= "komlev$i"; ?>" type="text" value="<?= $komlev[$i]; ?>" size="10" />      </td>

    </tr>



<?



	}



//	}



?>		

<tr class="tbl_header"> 
      <td colspan="2"><div align="center">PENGATURAN  KOMISI TITIK GENERASI </div></td>
    </tr>

 <tr>
      

        <select name="kedalaman2" id="kedalaman2" onChange="location =  this.options[this.selectedIndex].value">
		<?
		$lv = 10;
		$kdlm2 = explode("|", $db->result(0, "kedalaman2"));
		$kd = $kdlm2 [0];
		for($i=1;$i<=$lv;$i++) {
			if($kd == $d or !$d) {
				$kd = $kd;
			} else {
				$kd = $d;
			}
			if($d == $i or $kd == $i) {
				$sel = "selected=selected";
			} else {
				$sel = "";

			}		

			
		}
		?>	

        </select>

     </td>

    </tr>

   <?

   $klevg = $db->result(0, "komgen");
	if($kd == $d or !$d) {
		$kd = $kd;

	} else {
		$kd = $d;
	}

 //  if($pg == "komlev");

   	for($i=0;$i<$kd;$i++) {
		$komgen= explode("|", $klevg ); 
		$x = $i+1;

?>	



    <tr>



      <td align="right">Komisi Level <?= $x; ?> :</td>



      <td colspan="3"><input name="<?= "komgen$i"; ?>" type="text" value="<?= $komgen[$i]; ?>" size="10" />      </td>

    </tr>



<?



	}



//	}



?>		


    <tr class="tbl_header">
      <td colspan="2"><div align="center">PENGATURAN BONUS PASANGAN DAN FLUSHOUT </div></td>
    </tr>
    <tr>
      <td align="right">Bonus Pasangan I :</td>
      <td><input name="kom_pasangan" type="text" id="kom_pasangan" value="<?= $db->result(0, "kom_pasangan"); ?>" size="10" />
        (ditulis tanpa tanda baca) </td>
    </tr>
    <tr>
      <td align="right">Flushout  :</td>
      <td><input name="flushout" type="text" id="flushout" value="<?= $db->result(0, "flushout"); ?>" size="10" />
        (ditulis tanpa tanda baca) </td>
    </tr>
	 <tr>
      <td align="right">Bonus Pasangan II :</td>
      <td><input name="kom_pasanganb" type="text" id="kom_pasanganb" value="<?= $db->result(0, "kom_pasanganb"); ?>" size="10" />
        (ditulis tanpa tanda baca) </td>
    </tr>
    <tr>
      <td align="right">Flushout  :</td>
      <td><input name="flushoutb" type="text" id="flushoutb" value="<?= $db->result(0, "flushoutb"); ?>" size="10" />
        (ditulis tanpa tanda baca) </td>
    </tr>
	
	
	<tr>
      <td align="right">Bonus Pasangan III :</td>
      <td><input name="kom_pasangexc" type="text" id="kom_pasangexc" value="<?= $db->result(0, "kom_pasangexc"); ?>" size="10" />
        (ditulis tanpa tanda baca) </td>
    </tr>
    <tr>
      <td align="right">Flushout  :</td>
      <td><input name="flushoutd" type="text" id="flushoutd" value="<?= $db->result(0, "flushoutd"); ?>" size="10" />
        (ditulis tanpa tanda baca) </td>
    </tr>


	 <tr>
      <td align="right">Bonus Pasangan RO :</td>
      <td><input name="kom_pasanganc" type="text" id="kom_pasanganc" value="<?= $db->result(0, "kom_pasanganc"); ?>" size="10" />
        (ditulis tanpa tanda baca) </td>
    </tr>
    <tr>
      <td align="right">Flushout RO :</td>
      <td><input name="flushoutc" type="text" id="flushoutc" value="<?= $db->result(0, "flushoutc"); ?>" size="10" />
        (ditulis tanpa tanda baca) </td>
    </tr>

    <tr>
      <td align="right">Minimal Withdrawl Member :</td>
      <td><input name="minwd" type="text" id="minwd" value="<?= $db->result(0, "minwd"); ?>" size="10" />
        Batas Minimal Withdrawl Member </td>
    </tr>
    <tr>
      <td align="right">Bonus Matching Level-1 :</td>
      <td><input name="matching" type="text" id="matching" value="<?= $db->result(0, "matching"); ?>" size="10" />
        (ditulis tanpa tanda baca) </td>
    </tr>
	<tr>
      <td align="right">Bonus Matching Level-2 :</td>
      <td><input name="matching2" type="text" id="matching2" value="<?= $db->result(0, "matching2"); ?>" size="10" />
        (ditulis tanpa tanda baca) </td>
    </tr>
	
	<tr>
      <td align="right">Bonus Matching Level-3 :</td>
      <td><input name="matching3" type="text" id="matching3" value="<?= $db->result(0, "matching3"); ?>" size="10" />
        (ditulis tanpa tanda baca) </td>
    </tr>
	  <td align="right">Bonus Matching Level-4 :</td>
        <td><input name="matching4" type="text" id="matching4" value="<?= $db->result(0, "matching4"); ?>" size="10" />
        (ditulis tanpa tanda baca) </td>
    </tr>
    <tr>
      <td align="right">Potongan Automaintain  :</td>
      <td><input name="automaintain" type="text" id="automaintain" value="<?= $db->result(0, "automaintain"); ?>" size="10" />
        %</td>
    </tr>
    <tr>
      <td align="right">Batas Potongan Automaintain / Bulan  :</td>
      <td><input name="setauto" type="text" id="setauto" value="<?= $db->result(0, "setauto"); ?>" size="10" />
        (ditulis tanpa tanda baca) </td>
    </tr>
    <tr class="tbl_header">
      <td colspan="2"><div align="center">PENGATURAN REWARD MEMBER </div></td>
    </tr>
    <tr>
      <td align="right">Reward 1 :</td>
      <td><input name="reward1" type="text" id="reward1" value="<?= $db->result(0, "reward1"); ?>" size="20" />
        Syarat 
        
        Kiri
        <input name="kir1" type="text" id="kir1" value="<?= $db->result(0, "kir1"); ?>" size="5" />
        dan Kanan
        <input name="kar1" type="text" id="kar1" value="<?= $db->result(0, "kar1"); ?>" size="5" /></td>
    </tr>
    <tr>
      <td align="right">Reward 2 :</td>
      <td><input name="reward2" type="text" id="reward2" value="<?= $db->result(0, "reward2"); ?>" size="20" />
        Syarat 
        
        Kiri
        <input name="kir2" type="text" id="kir2" value="<?= $db->result(0, "kir2"); ?>" size="5" />
        dan Kanan
        <input name="kar2" type="text" id="kar2" value="<?= $db->result(0, "kar2"); ?>" size="5" /></td>
    </tr>
    <tr>
      <td align="right">Reward 3  :</td>
      <td><input name="reward3" type="text" id="reward3" value="<?= $db->result(0, "reward3"); ?>" size="20" />
        Syarat 
        
        Kiri
        <input name="kir3" type="text" id="kir3" value="<?= $db->result(0, "kir3"); ?>" size="5" />
        dan Kanan
        <input name="kar3" type="text" id="kar3" value="<?= $db->result(0, "kar3"); ?>" size="5" /></td>
    </tr>
    <tr>
      <td align="right">Reward 4  :</td>
      <td><input name="reward4" type="text" id="reward4" value="<?= $db->result(0, "reward4"); ?>" size="20" />
        Syarat 
        
        Kiri
        <input name="kir4" type="text" id="kir4" value="<?= $db->result(0, "kir4"); ?>" size="5" />
        dan Kanan
        <input name="kar4" type="text" id="kar4" value="<?= $db->result(0, "kar4"); ?>" size="5" /></td>
    </tr>
    <tr>
      <td align="right">Reward 5  :</td>
      <td><input name="reward5" type="text" id="reward5" value="<?= $db->result(0, "reward5"); ?>" size="20" />
        Syarat 

        
        Kiri
        <input name="kir5" type="text" id="kir5" value="<?= $db->result(0, "kir5"); ?>" size="5" />
        dan Kanan
        <input name="kar5" type="text" id="kar5" value="<?= $db->result(0, "kar5"); ?>" size="5" /></td>
    </tr>
    <tr>
      <td align="right">Reward 6   :</td>
      <td><input name="reward6" type="text" id="reward6" value="<?= $db->result(0, "reward6"); ?>" size="20" />
        Syarat 
        
        Kiri
        <input name="kir6" type="text" id="kir6" value="<?= $db->result(0, "kir6"); ?>" size="5" />
        dan Kanan
        <input name="kar6" type="text" id="kar6" value="<?= $db->result(0, "kar6"); ?>" size="5" /></td>
    </tr>
	
	<tr>
      <td align="right">Reward 7   :</td>
      <td><input name="reward7" type="text" id="reward7" value="<?= $db->result(0, "reward7"); ?>" size="20" />
        Syarat 
        
        Kiri
        <input name="kir7" type="text" id="kir7" value="<?= $db->result(0, "kir7"); ?>" size="5" />
        dan Kanan
        <input name="kar7" type="text" id="kar7" value="<?= $db->result(0, "kar7"); ?>" size="5" /></td>
    </tr>
    
	 <tr class="tbl_header">
      <td colspan="2"><div align="center"> PENGATURAN REWARD AM/RO  MEMBER </div></td>
    </tr>
    <tr>
      <td align="right">Reward 1 :</td>
      <td><input name="ro_reward1" type="text" id="ro_reward1" value="<?= $db->result(0, "ro_reward1"); ?>" size="20" />
        Syarat 
        
        Kiri
        <input name="ro_kir1" type="text" id="ro_kir1" value="<?= $db->result(0, "ro_kir1"); ?>" size="5" />
        dan Kanan
        <input name="ro_kar1" type="text" id="ro_kar1" value="<?= $db->result(0, "ro_kar1"); ?>" size="5" /></td>
    </tr>
    <tr>
      <td align="right">Reward 2 :</td>
      <td><input name="ro_reward2" type="text" id="ro_reward2" value="<?= $db->result(0, "ro_reward2"); ?>" size="20" />
        Syarat 
        
        Kiri
        <input name="ro_kir2" type="text" id="ro_kir2" value="<?= $db->result(0, "ro_kir2"); ?>" size="5" />
        dan Kanan
        <input name="ro_kar2" type="text" id="ro_kar2" value="<?= $db->result(0, "ro_kar2"); ?>" size="5" /></td>
    </tr>
    <tr>
      <td align="right">Reward 3  :</td>
      <td><input name="ro_reward3" type="text" id="ro_reward3" value="<?= $db->result(0, "ro_reward3"); ?>" size="20" />
        Syarat 
        
        Kiri
        <input name="ro_kir3" type="text" id="ro_kir3" value="<?= $db->result(0, "ro_kir3"); ?>" size="5" />
        dan Kanan
        <input name="ro_kar3" type="text" id="ro_kar3" value="<?= $db->result(0, "ro_kar3"); ?>" size="5" /></td>
    </tr>
    <tr>
      <td align="right">Reward 4  :</td>
      <td><input name="ro_reward4" type="text" id="ro_reward4" value="<?= $db->result(0, "ro_reward4"); ?>" size="20" />
        Syarat 
        
        Kiri
        <input name="ro_kir4" type="text" id="ro_kir4" value="<?= $db->result(0, "ro_kir4"); ?>" size="5" />
        dan Kanan
        <input name="ro_kar4" type="text" id="ro_kar4" value="<?= $db->result(0, "ro_kar4"); ?>" size="5" /></td>
    </tr>
    <tr>
      <td align="right">Reward 5  :</td>
      <td><input name="ro_reward5" type="text" id="ro_reward5" value="<?= $db->result(0, "ro_reward5"); ?>" size="20" />
        Syarat 
        
        Kiri
        <input name="ro_kir5" type="text" id="ro_kir5" value="<?= $db->result(0, "ro_kir5"); ?>" size="5" />
        dan Kanan
        <input name="ro_kar5" type="text" id="ro_kar5" value="<?= $db->result(0, "ro_kar5"); ?>" size="5" /></td>
    </tr>
    <tr>
      <td align="right">Reward 6   :</td>
      <td><input name="ro_reward6" type="text" id="ro_reward6" value="<?= $db->result(0, "ro_reward6"); ?>" size="20" />
        Syarat 
        
        Kiri
        <input name="ro_kir6" type="text" id="ro_kir6" value="<?= $db->result(0, "ro_kir6"); ?>" size="5" />
        dan Kanan
        <input name="ro_kar6" type="text" id="ro_kar6" value="<?= $db->result(0, "ro_kar6"); ?>" size="5" /></td>
    </tr>
	
	<tr>
      <td align="right">Reward 7   :</td>
      <td><input name="ro_reward7" type="text" id="ro_reward7" value="<?= $db->result(0, "ro_reward7"); ?>" size="20" />
        Syarat 
        
        Kiri
        <input name="ro_kir7" type="text" id="ro_kir7" value="<?= $db->result(0, "ro_kir7"); ?>" size="5" />
        dan Kanan
        <input name="ro_kar7" type="text" id="ro_kar7" value="<?= $db->result(0, "ro_kar7"); ?>" size="5" /></td>
    </tr>
    
	
    <tr> 
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="2"><input name="level" type="hidden" value="<?= $kd; ?>" size="10" /> 
        <input name="levelewalet" type="hidden" value="<?= $kd1; ?>" size="10" /> <label> 
        <input type="submit"  value="SAVE" class="button">
        </label> <label> 
        <input type="button" name="cancel" id="cancel" value="CANCEL" onClick="javascript:history.go(-1)" class="cancelbutton">
        </label></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
<?
	break;
	
	case submit :
		
			$komlev = "$komlev0|$komlev1|$komlev2|$komlev3|$komlev4|$komlev5|$komlev6|$komlev7|$komlev8|$komlev9|$komlev10|$komlev11|$komlev12|$komlev13|$komlev14|$komlev15|$komlev16|$komlev17|$komlev18|$komlev19";
			
			$komgen= "$komgen0|$komgen1|$komgen2|$komgen3|$komgen4|$komgen5|$komgen6|$komgen7|$komgen8|$komgen9|$komgen10|$komgen11|$komgen12|$komgen13|$komgen14|$komgen15|$komgen16|$komgen17|$komgen18|$komgen19";
			$kdlman = "$level";
			
			$db->update("configuration", "name='$name', email='$email', domain='$domain', alamat='$alamat', hpsms='$telepon', bank='$bank', bank1='$bank1', bank2='$bank2', bank3='$bank3',  biaya='$biaya', biaya2='$biaya2', komisi_sponsor='$k_sponsor',  komisi_sponsorw='$k_sponsorw', komisi_sponsorb='$k_sponsorb', kom_sponexc='$kom_sponexc',  kom_pasangan='$kom_pasangan', kom_pasanganb='$kom_pasanganb', kom_pasanganc='$kom_pasanganc', kom_pasangexc='$kom_pasangexc', matching='$matching', matching2='$matching2', matching3='$matching3', matching4='$matching4', automaintain='$automaintain', setauto='$setauto', reward1='$reward1', reward2='$reward2', reward3='$reward3', reward4='$reward4', reward5='$reward5', reward6='$reward6', reward7='$reward7', kir1='$kir1', kir2='$kir2', kir3='$kir3', kir4='$kir4', kir5='$kir5', kir6='$kir6', kir7='$kir7', kar1='$kar1', kar2='$kar2', kar3='$kar3', kar4='$kar4', kar5='$kar5', kar6='$kar6', kar7='$kar7', komlev='$komlev',komgen='$komgen', flushout='$flushout', flushoutb='$flushoutb', flushoutc='$flushoutc', flushoutd='$flushoutd',  minwd='$minwd', ym='$ym',ro_kir1='$ro_kir1', ro_kir2='$ro_kir2', ro_kir3='$ro_kir3', ro_kir4='$ro_kir4', ro_kir5='$ro_kir5', ro_kir6='$ro_kir6', ro_kir7='$ro_kir7', ro_kar1='$ro_kar1', ro_kar2='$ro_kar2', ro_kar3='$ro_kar3', ro_kar4='$ro_kar4', ro_kar5='$ro_kar5', ro_kar6='$ro_kar6', ro_kar7='$ro_kar7', ro_reward1='$ro_reward1', ro_reward2='$ro_reward2', ro_reward3='$ro_reward3', ro_reward4='$ro_reward4', ro_reward5='$ro_reward5', ro_reward6='$ro_reward6', ro_reward7='$ro_reward7' ", "id='$no'");
	//echo $komlev;
			echo "<meta http-equiv='refresh' content='0;URL=?m=configuration&act=1'>";
	break;
	
	case publish :
		$db->update("content", "published='$pub'", "id='$no'");
		echo "<meta http-equiv='refresh' content='0;URL=?m=content'>";
	break;
	case delete :
		//echo "delete no $no";
		$db->delete("content", "id=$no");
		echo "<meta http-equiv='refresh' content='0;URL=?m=content'>";
	break;	
	
	case frontpage :
		$db->update("content", "frontpage='$pub'", "id='$no'");
		echo "<meta http-equiv='refresh' content='0;URL=?m=content'>";
	break;
}
?>	
<?
} else {
echo "<meta http-equiv=\"refresh\" content=\"1; url=illegal.html\">";
}
?>