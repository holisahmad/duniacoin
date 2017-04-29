<?
	if($user_status > 0 ) {
?>
<style type="text/css">
body,td,th {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 12px;
}
.style1 {color: #0000FF}
</style>
<?
switch ($page) {
	default :
?><form name="form1" method="post" action="?e=total_bonus&page=update">
<table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="825" border="0" cellspacing="2" cellpadding="2">
      <tr>
        <td><strong>Fund Bonus </strong></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="121">Paket Anda</td>
        
        
        <td width="147">:          
          <?= rupiah ($db->dataku("paket_daftar", $user_session));?> <strong>(lock) </strong></td>
        <td width="446">&nbsp;</td>
        <td width="44">&nbsp;</td>
        <td width="10">&nbsp;</td>
      </tr>
	  <tr>
        <td><strong>Sisa  Kontrak </strong></td>
        <td>:          
          <? $db->dataku("paket_daftar", $user_session) ;    ?><strong> (Day) </strong></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
	  
      <tr>
        <td>  Bonus Sponsor </td>
        <td>: <strong>
          <?php
         $total0bonus = $db->totalkomisisponsor($user_session, "");
         
	
	$wajibsp= $jlhra * 2 ;
	
	
	if ($chkd_sp > $wajibsp  &&  $chkd_kanan!= ""  && $chkd_kiri!= "" ) {
	$total0bonusa = $total0bonus ; 
	} else {
	$total0bonusa = 0;
        }
      
	?>
          <a href='?e=bonus_statement'>
          <?= rupiah($total0bonusa); ?>
          </a></strong></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
<tr>
        <td>Bonus  Daily </td>
        <td>: <strong><?php
      $total0 = $db->totalkomisi($user_session, "and validasi='1'");
	$widrl = $db->bayarkomisi($user_session, "");
	$tarik = $total0;
	//$nilaipribadi = $db->totalkomisipribadi($user_session, "and validasi='1'");
	 $nilai2= $db->totalkomisipribadi($user_session, "");
	$saving = $nilai2 * 20/100 ;
	$totalbonus = $total0bonusa + $total0 - $widrl - $saving;
	
	?>
            <a href='?e=daily_deviden'>
            <?= rupiah($tarik); ?>
            </a></strong></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>      <tr>
        <td>Dibayar</td>
        <td><span class="style1">:<strong><a href='?e=take_fund_history'>
          <?= rupiah ($widrl) ; ?>
        </a></strong></span></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
	  <tr>
        <td>&nbsp;</td>
        <td><span class="style1">:<strong></a></strong></span></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
	  
	  <tr>
        <td>Total</td>
        <td><span class="style1">:<strong><strong><strong><strong>
          <?= rupiah ($totalbonus) ; ?>
        </strong></strong></strong></a></strong></span></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Bonus Bisa di WD</td>
        <td colspan="4">: 
          <?
		$paketku=$db->dataku("paket_daftar",$user_session);
		if($paketku=="Silver"){
		include "tf_bonus_bronze.php";
		} else if($paketku=="White Silver"){
		include "tf_bonus_silver.php";
		} else if($paketku=="Gold"){
		include "tf_bonus_gold.php";
		} else if($paketku=="Platinum"){
		include "tf_bonus_platinum.php";
		} else if($paketku=="Diamond"){
		include "tf_bonus_diamond.php";
		} else if($paketku=="Crown"){
		include "tf_bonus_crown.php";
		} 
		?></td>
        </tr>
      <tr>
        <td>Token</td>
        <td>:          
          <input name="token" type="password" id="token" size="6" maxlength="6" /></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input type="submit" name="Submit" id="button" value="AMBIL BONUS" /></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>
<p align="center"><strong>* Untuk Mendapatkan  Fund Bonus Anda harus Mensponsori 2 Member Dikali jumlah RA</strong></p>
</form>
<?
	break;
	
	case update :
        $total0bonus = $db->totalkomisisponsor($user_session, "");
        $nilai2= $db->totalkomisipribadi($user_session, "");
	$widrlbonus = $db->bayarkomisisponsor($user_session, "");
	$db->select("sponsor", "upline", "username='$user_session' and status='1'");
	$chkd_sp = $db->num_rows();
	
	$db->select("Kanan", "upline", "username='$user_session' and status='1'");
	$chkd_kanan = $db->num_rows();
	
	$db->select("kiri", "upline", "username='$user_session' and status='1'");
	$chkd_kiri = $db->num_rows();
	
	$jlhra =$db->count_records("transfer", "userid='$user_session'"); 
	$wajibsp= $jlhra * 2 ;
	if ($chkd_sp > 1 &&  $chkd_kanan!= ""  && $chkd_kiri!= "" ) {
	$total0bonusa = $total0bonus ; 
	} else {
	$total0bonusa = 0;
        }
	
	
	$tarikfix = $total0bonusa - $widrlbonus;
	
	$total0 = $db->totalkomisi($user_session, "and validasi='1'");
	$widrl = $db->bayarkomisi($user_session, "");
	$tarik = $total0 - $widrl;
	
	$paketku=$db->dataku("paket_daftar", $user_session);
		
		
		if($paketku=="Silver"){
		$nilai=150;
		}else if($paketku=="White Silver"){
		$nilai=300;
		}else if($paketku=="Gold"){
		$nilai=750;
		}else if($paketku=="Platinum"){
		$nilai=1500;
		} else if($paketku=="Diamond"){
		$nilai=3000;
		} else if($paketku=="Crown"){
		$nilai=7500;
		}
		$saving = $nilai2 * 20/100 ;
	$totalbonus = $tarik +  $tarikfix - $saving ;
	$mypin=$db->dataku("pin", $user_session);
	if($mypin<>$token){
		echo "<center><font color='#FF0000'><br>Maaf Token Anda Tidak Cocok !!</font></center>";
	} else {
	if($nominal>$totalbonus ){
		echo "<strong><center><font color='#FF0000'>Maaf Anda Tidak Bisa Melakukan RA  Melebihi Nominal yang Tersedia di Account Anda</font></center></strong>";
	
	} else {
	$db->select("username", "gh_start", "username='$user_session' and status='0'");
	$chkd_user = $db->num_rows();
	if ($chkd_user!= "") {
	echo "<H4><center><font color='#FF0000'>Anda Memiliki Proses RA  yang Masih Pending.</center></font>";
	}
	else {
	
	$db->select("username", "member", "username='$user_session' and kunci='1'");
	$chkd_userl = $db->num_rows();
	if ($chkd_userl!= "") {
	echo "<H4><center><font color='#FF0000'>Anda Masih Ada Proses PA yang belum Selesai </center></font>";
	}
	else {
	
		
$queryt="select * from komisi where username='$user_session' and jenis='Bantuan Anda' order by id desc limit 0,1" ;
$resuly=mysql_query($queryt);

while ($rowfx=mysql_fetch_array($resuly)) {
$tglbayar=$rowfx["tglbayar"];

}	
	

$hari_ini=date('Y-m-d');

$hari_bayar= $tglbayar ;
       
$explor=explode('-',$hari_bayar);
	
$tahun = $explor[0];
$bulan = $explor[1];
$tgl = $explor[2];

$tglbesok = $tgl+5 ;

$hari = "".$tahun."-".$bulan."-".$tglbesok."" ;


$day1=strtotime($hari_ini ); 
$day2=strtotime($hari ); 

if ( $day1 < $day2) {


echo " <H4><center><font color='#FF0000'><br>Maaf Proses RA Ditolak Batas minimal 5 Hari Dari PA !!</font></center></H4>";

} else { 
	
	
	
	
	$negara=$db->dataku("negara", $user_session);
	$kodetrx=rand(11111, 99999);
	$waktu=date("Y-m-d h:i");
	$newdate = date('Y-m-d', strtotime('+1 days', strtotime($waktu)));
	$batas_tgl=substr($newdate,8,2);
	$batas_bln=substr($newdate,5,2);
	$batas_thn=substr($newdate,0,4);
	$batas_jam=substr($newdate,11,2);
	$batas_menit=substr($newdate,14,2);
	
	
	$sql=mysql_query("select antrian from ra_start order by antrian desc");
	if(mysql_num_rows($sql) > 0) {
	$mbr = mysql_fetch_row($sql);
	$last_id = $mbr[0];
	} else {
	$last_id = 0;
	}		
	$new_id = ($last_id + 1);
	$new_id2 = $new_id;
	$antrian= $new_id2;
	
$db->select("username", "member", "lev=1 ", "rand()", 1);
$kepada2=$db->result(0, "username");
	
	
	$db->insert("gh_start", "", "'', 'RAWTC$kodetrx', '$user_session', '$clientdate', '$nominal', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '$nominal', '0', '0', '$negara'");
	
if ($saving > 0){	
// $db->insert("gh_start", "", "'', 'RAWTC$kodetrx', '$kepada2', '$clientdate', '$saving', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '$nominal', '0', '0', '$negara'");
	
}	
	//$db->insert("ra_start", "", "'', '$antrian', '$user_session', '$clientdate', '$nominal', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '$nominal', '0', '0', '$negara'");
	
	
	
//	$db->insert("transfer_sponsor", "", "'', '$user_session', '$clientdate', '$nominal', '1', 'TFB$kodetrx'");
	//$db->update("member", "kunci='0'", "username='$user_session'");
	$db->insert("transfer", "", "'', '$user_session', '$clientdate', '$nominal', '1', 'TFRA$kodetrx'");

	echo "<center><font color='#00F'><strong>RA Bonus Anda Sukses ..!!</strong></font></center>";
	echo "<meta http-equiv=\"refresh\" content=\"2; url=?e=total_bonus\">";
	
	}
	}
	}
	}
?>
<?
}
	break;


?>
<?
} 
}
else {
echo "<meta http-equiv=\"refresh\" content=\"1; url=illegal.html\">";
}
?>