<?
	if($user_status > 0 ) {
?>
<style type="text/css">
body,td,th {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 12px;
}
.style1 {
	color: #FF0000;
	font-weight: bold;
}
</style>
<?
switch ($page) {
	default :
?>
<form name="form1" method="post" action="?e=give_fund&page=update">
<table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="800" border="0" cellspacing="2" cellpadding="2">
      <tr>
        <td width="136"><strong>PA Fund</strong></td>
        <td width="16">&nbsp;</td>
        <td width="364">&nbsp;</td>
        <td width="72">&nbsp;</td>
        <td width="180">&nbsp;</td>
      </tr>
      <tr>
        <td>Paket Join</td>
        <td>: </td>
        <td><?
		$paketku=$db->dataku("paket_daftar", $user_session);
		echo $paketku;
		?><?
		if($paketku=="Silver"){
		$gfku=150;
		} else if($paketku=="White Silver"){
		$gfku=300;
		} else if($paketku=="Gold"){
		$gfku=750;
		} else if($paketku=="Platinum"){
		$gfku=1500;
		} else if($paketku=="Diamond"){
		$gfku=3000;
		} else if($paketku=="Crown"){
		$gfku=7500;
		} else {
		}
		
		?></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Amount (MYR)</td>
        <td>:          </td>
        <td colspan="2"><?
		$paketku=$db->dataku("paket_daftar", $user_session);
		if($paketku=="Silver"){
		include "give_fund_bronze.php";
		} else if($paketku=="White Silver"){
		include "give_fund_silver.php";
		} else if($paketku=="Gold"){
		include "give_fund_gold.php";
		} else if($paketku=="Platinum"){
		include "give_fund_platinum.php";
		} else if($paketku=="Diamond"){
		include "give_fund_diamond.php";
		} else if($paketku=="Crown"){
		include "give_fund_crown.php";
		} 
		?></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Jumlah PA </td>
        <td>: </td>
        <td><? $jlhpa =$db->count_records("komisi", "jenis='Bantuan Anda' and username='$user_session' and validasi='1'");    ?>
		<?= $jlhpa ?> Kali</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
	  
	  <tr>
        <td>Saving</td>
        <td>: </td>
        <td> RM <?  
		   if ( $jlhpa < 20 &&  $jlhpa > 0 ) {
				$saving = $gfku * 20/100 ; 
				} else {
				$saving = 0 ; } ?> 
				<?= $saving ;?> 
				
		 </td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
	  
	  <tr>
        <td>Total PA </td>
        <td>: </td>
        <td> RM <?  
		   if ( $jlhpa < 20 &&  $jlhpa > 0 ) {
				$sav = $gfku * 80/100 ; 
				} else {
				$sav = $gfku ; } 
				echo $sav ;
				?> 
		 </td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
	  <tr>
        <td>Lock Deviden</td>
        <td>: </td>
        <td><select name="hari" id="hari">
          <option value="5">5</option>
          
                        </select> 
        Hari</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="3">&nbsp;</td>
        </tr>
      <tr>
        <td>Aggrement</td>
        <td>:          </td>
        <td><select name="setuju" id="setuju">
          <option value="yes" selected="selected">I Agree</option>
          <option value="no">I Dont Agree</option>
        </select></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="3" align="left"><table width="95%" border="1" align="left" cellpadding="0" cellspacing="0">
          <tr>
            <td height="81" bgcolor="#FFFF99"><blockquote>
              <p>Dengan ini saya menyatakan bahwa dana bantuan   yang saya berikan kepada partisipan wtc saya berikan dengan kesadaran penuh   dan secara tulus/ikhlas tanpa ada paksaan dari pihak manapun dan tanpa   mengharapkan imbalan dalam bentuk apapun.</p>
              </blockquote></td>
            </tr>
        </table></td>
        </tr>
      <tr>
        <td>Your Token </td>
        <td>:          </td>
        <td><input name="pin" type="password" id="pin" value="" size="5" maxlength="4" /></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><input type="submit" name="button" id="button" value="PA Fund" /></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>
</form>
<?
	break;
	
	case update :
	$mypin=$db->dataku("pin", $user_session);
	if($mypin<>$pin){
		echo "<center><font color='#FF0000'><br>Token Anda Tidak Cocok !</font></center>";
		echo "<meta http-equiv=\"refresh\" content=\"2; url=?e=give_fund\">";
	} else {
	if($setuju<>"yes"){
		echo "<center><font color='#FF0000'><br>Anda Harus Setuju Pada Ketentuan yang Di Tentukan<br>Pilih Setuju Sebagai Tanda Anda Mengerti dan Tunduk Pada Peraturan yang Kami Terapkan</font></center>";
		echo "<meta http-equiv=\"refresh\" content=\"3; url=?e=give_fund\">";
	} else {
	

   $hari_ini2=date('Y-m-d');
        
     $explor=explode('-',$hari_ini2);
	
$tahun2 = $explor[0];
$bulan2 = $explor[1];
$tgl2 = $explor[2];

$tglbesok = $tgl-2 ;

$hari2 = "".$tahun."-".$bulan."-".$tglbesok."" ;

$batas_tgl2 = $tgl2 + 1 ;
$batas_bln2 = $bulan2 ;
$batas_thn2 = $tahun2 ;

$db->select("username", "timer", "username='$user_session'");
	$chkd_timer = $db->num_rows();
	if ($chkd_timer!= "") {
	$db->delete("timer", "username='$user_session'");
	}
$db->insert("timer", "", "'', '$user_session', '$batas_tgl2', '$batas_bln2', '$batas_thn2', '12', '00'");

	
	
	
	
	
	$trx=rand(111, 999);
	$kodetrx="PAWTC$trx";
	$tglph=$tgl2+8;
	$waktu=date("Y-m-d");
	$negara=$db->dataku("negara", $user_session);
	$newdate = date('Y-m-d h:i', strtotime('+1 days', strtotime($waktu)));
	$batas_tgl=substr($newdate,8,2);
	$batas_bln=substr($newdate,5,2);
	$batas_thn=substr($newdate,0,4);
	$batas_jam=substr($newdate,11,2);
	$batas_menit=substr($newdate,14,2);
	
	
	$sql=mysql_query("select antrian from pa_start order by antrian desc");
	if(mysql_num_rows($sql) > 0) {
	$mbr = mysql_fetch_row($sql);
	$last_id = $mbr[0];
	} else {
	$last_id = 0;
	}		
	$antrian= ($last_id + 1);
	

$db->select("username", "member", "lev=1 ", "rand()", 1);
$kepada2=$db->result(0, "username");

$jlhpa =$db->count_records("komisi", "jenis='Bantuan Anda' and username='$user_session' and validasi='1'"); 		 
		   if ( $jlhpa < 20 &&  $jlhpa > 0 ) {
				$sav = $jmlgf * 80/100 ; 
				$jmlg= $sav ;
				$arah = 0 ;
				} else {
				$arah = 1 ;
				$sav = $jmlgf ;
				 } 
				 
if ( $jlhpa == 0 ) {				

$jmlg = $sav *80/100  ;
$jml = $sav *20/100 ; 

	
$db->insert("gf_proses", "", "'', '$kodetrx', '$user_session', '$clientdate', '$kepada2', '$jml', '', '', 'Splite'");

}


$db->insert("gf_start", "", "'', '$kodetrx', '$user_session', '$clientdate', '$jmlg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '0', '$arah', '$newdate','$batas_tgl','$batas_bln','$batas_thn','$batas_jam','$batas_menit','5','0', '$negara'");
	$db->update("member", "kunci='1'", "username='$user_session'");
	
	
//	$db->insert("pa_start", "", "'', '$antrian', '$user_session', '$clientdate', '$jmlgf', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '0', '0', '$newdate','$batas_tgl','$batas_bln','$batas_thn','$batas_jam','$batas_menit','$hari','0', '$negara'");
//	$db->update("member", "kunci='1'", "username='$user_session'");
	
	
//$db->insert("gf_proses", "", "'', '$kodetrx', '$user_session', '$clientdate', '$kepada2', '$jml', '', '', 'Splite'");

	
	

	echo "<center><font color='#00F'><h3>PA Fund Anda  sebesar ".$jmlgf." Success ..!</h3></font></center>";
	
	$sp=$db->dataku("sponsor", $user_session);
	
	$komsp=$jmlgf*10/100;
	
	$db->insert("komisi_sponsor", "", "'', '$kodetrx', '$sp', '$komsp', '$clientdate', '0', 'Komisi Sponsor', '$user_session'");
	
		$besok0 = mktime (0,0,0, date("m"), date("d")+0,date("Y"));
		$besok1 = mktime (0,0,0, date("m"), date("d")+1,date("Y"));
		$besok2 = mktime (0,0,0, date("m"), date("d")+2,date("Y"));
		$besok3 = mktime (0,0,0, date("m"), date("d")+3,date("Y"));
		$besok4 = mktime (0,0,0, date("m"), date("d")+4,date("Y"));
		$besok5 = mktime (0,0,0, date("m"), date("d")+5,date("Y"));
		$besok6 = mktime (0,0,0, date("m"), date("d")+6,date("Y"));
		$besok7 = mktime (0,0,0, date("m"), date("d")+7,date("Y"));
		$besok8 = mktime (0,0,0, date("m"), date("d")+8,date("Y"));
		$besok9 = mktime (0,0,0, date("m"), date("d")+9,date("Y"));
		$besok10 = mktime (0,0,0, date("m"), date("d")+10,date("Y"));
		$besok11 = mktime (0,0,0, date("m"), date("d")+11,date("Y"));
		$besok12 = mktime (0,0,0, date("m"), date("d")+12,date("Y"));
		$besok13 = mktime (0,0,0, date("m"), date("d")+13,date("Y"));
		$besok14 = mktime (0,0,0, date("m"), date("d")+14,date("Y"));
		$besok15 = mktime (0,0,0, date("m"), date("d")+15,date("Y"));
		$besok16 = mktime (0,0,0, date("m"), date("d")+16,date("Y"));
		$besok17 = mktime (0,0,0, date("m"), date("d")+17,date("Y"));
		$besok18 = mktime (0,0,0, date("m"), date("d")+18,date("Y"));
		$besok19 = mktime (0,0,0, date("m"), date("d")+19,date("Y"));
		$besok20 = mktime (0,0,0, date("m"), date("d")+20,date("Y"));

		$besok21 = mktime (0,0,0, date("m"), date("d")+21,date("Y"));
		$besok22 = mktime (0,0,0, date("m"), date("d")+22,date("Y"));
		$besok23 = mktime (0,0,0, date("m"), date("d")+23,date("Y"));
		$besok24 = mktime (0,0,0, date("m"), date("d")+24,date("Y"));
		$besok25 = mktime (0,0,0, date("m"), date("d")+25,date("Y"));
		$besok26 = mktime (0,0,0, date("m"), date("d")+26,date("Y"));
		$besok27 = mktime (0,0,0, date("m"), date("d")+27,date("Y"));
		$besok28 = mktime (0,0,0, date("m"), date("d")+28,date("Y"));
		$besok29 = mktime (0,0,0, date("m"), date("d")+29,date("Y"));
		$besok30 = mktime (0,0,0, date("m"), date("d")+30,date("Y"));
		$besok31 = mktime (0,0,0, date("m"), date("d")+31,date("Y"));
		$besok32 = mktime (0,0,0, date("m"), date("d")+32,date("Y"));
		$besok33 = mktime (0,0,0, date("m"), date("d")+33,date("Y"));
		$besok34 = mktime (0,0,0, date("m"), date("d")+34,date("Y"));
		$besok35 = mktime (0,0,0, date("m"), date("d")+35,date("Y"));
		$besok36 = mktime (0,0,0, date("m"), date("d")+36,date("Y"));
		$besok37 = mktime (0,0,0, date("m"), date("d")+37,date("Y"));
		$besok38 = mktime (0,0,0, date("m"), date("d")+38,date("Y"));
		$besok39 = mktime (0,0,0, date("m"), date("d")+39,date("Y"));
		$besok40 = mktime (0,0,0, date("m"), date("d")+40,date("Y"));
		$besok41 = mktime (0,0,0, date("m"), date("d")+41,date("Y"));
		$besok42 = mktime (0,0,0, date("m"), date("d")+42,date("Y"));
		$besok43 = mktime (0,0,0, date("m"), date("d")+43,date("Y"));
		$besok44 = mktime (0,0,0, date("m"), date("d")+44,date("Y"));
		$besok45 = mktime (0,0,0, date("m"), date("d")+45,date("Y"));
		$besok46 = mktime (0,0,0, date("m"), date("d")+46,date("Y"));
		$besok47 = mktime (0,0,0, date("m"), date("d")+47,date("Y"));
		$besok48 = mktime (0,0,0, date("m"), date("d")+48,date("Y"));
		$besok49 = mktime (0,0,0, date("m"), date("d")+49,date("Y"));
		$besok50 = mktime (0,0,0, date("m"), date("d")+50,date("Y"));
		$besok51 = mktime (0,0,0, date("m"), date("d")+51,date("Y"));
		$besok52 = mktime (0,0,0, date("m"), date("d")+52,date("Y"));
		$besok53 = mktime (0,0,0, date("m"), date("d")+53,date("Y"));
		$besok54 = mktime (0,0,0, date("m"), date("d")+54,date("Y"));
		$besok55 = mktime (0,0,0, date("m"), date("d")+55,date("Y"));
		$besok56 = mktime (0,0,0, date("m"), date("d")+56,date("Y"));
		$besok57 = mktime (0,0,0, date("m"), date("d")+57,date("Y"));
		$besok58 = mktime (0,0,0, date("m"), date("d")+58,date("Y"));
		$besok59 = mktime (0,0,0, date("m"), date("d")+59,date("Y"));
		$besok60 = mktime (0,0,0, date("m"), date("d")+60,date("Y"));
		
		$hari_ini=date('Y-m-d');
		$deviden1=date('Y-m-d', $besok1);
		$deviden2=date('Y-m-d', $besok2);
		$deviden3=date('Y-m-d', $besok3);
		$deviden4=date('Y-m-d', $besok4);
		$deviden5=date('Y-m-d', $besok5);
		$deviden6=date('Y-m-d', $besok6);
		$deviden7=date('Y-m-d', $besok7);
		$deviden8=date('Y-m-d', $besok8);
		$deviden9=date('Y-m-d', $besok9);
		$deviden10=date('Y-m-d', $besok10);
		$deviden11=date('Y-m-d', $besok11);
		$deviden12=date('Y-m-d', $besok12);
		$deviden13=date('Y-m-d', $besok13);
		$deviden14=date('Y-m-d', $besok14);
		$deviden15=date('Y-m-d', $besok15);
		$deviden16=date('Y-m-d', $besok16);
		$deviden17=date('Y-m-d', $besok17);
		$deviden18=date('Y-m-d', $besok18);
		$deviden19=date('Y-m-d', $besok19);
		$deviden20=date('Y-m-d', $besok20);
		$deviden21=date('Y-m-d', $besok21);
		$deviden22=date('Y-m-d', $besok22);
		$deviden23=date('Y-m-d', $besok23);
		$deviden24=date('Y-m-d', $besok24);
		$deviden25=date('Y-m-d', $besok25);
		$deviden26=date('Y-m-d', $besok26);
		$deviden27=date('Y-m-d', $besok27);
		$deviden28=date('Y-m-d', $besok28);
		$deviden29=date('Y-m-d', $besok29);
		$deviden30=date('Y-m-d', $besok30);
		$deviden31=date('Y-m-d', $besok31);
		$deviden32=date('Y-m-d', $besok32);
		$deviden33=date('Y-m-d', $besok33);
		$deviden34=date('Y-m-d', $besok34);
		$deviden35=date('Y-m-d', $besok35);
		$deviden36=date('Y-m-d', $besok36);
		$deviden37=date('Y-m-d', $besok37);
		$deviden38=date('Y-m-d', $besok38);

		$deviden39=date('Y-m-d', $besok39);
		$deviden40=date('Y-m-d', $besok40);
		$deviden41=date('Y-m-d', $besok41);
		$deviden42=date('Y-m-d', $besok42);
		$deviden43=date('Y-m-d', $besok43);
		$deviden44=date('Y-m-d', $besok44);
		$deviden45=date('Y-m-d', $besok45);
		$deviden46=date('Y-m-d', $besok46);
		$deviden47=date('Y-m-d', $besok47);
		$deviden48=date('Y-m-d', $besok48);
		$deviden49=date('Y-m-d', $besok49);
		$deviden50=date('Y-m-d', $besok50);
		$deviden51=date('Y-m-d', $besok51);
		$deviden52=date('Y-m-d', $besok52);
		$deviden53=date('Y-m-d', $besok53);
		$deviden54=date('Y-m-d', $besok54);
		$deviden55=date('Y-m-d', $besok55);
		$deviden56=date('Y-m-d', $besok56);
		$deviden57=date('Y-m-d', $besok57);
		$deviden58=date('Y-m-d', $besok58);
		$deviden59=date('Y-m-d', $besok59);
		$deviden60=date('Y-m-d', $besok60);
		
		$username=$user_session;
		$paketku=$db->dataku("paket_daftar", $user_session);
		if($paketku=="Silver"){
		$persennya=2;
		} else if($paketku=="White Silver"){
		$persennya=2;
		} else if($paketku=="Gold"){
		$persennya=2;
		} else if($paketku=="Platinum"){
		$persennya=2;
		} else if($paketku=="Diamond"){
		$persennya=2;
		} else if($paketku=="Crown"){
		$persennya=2;
		} else {
		}
		
		if($hari=="5"){
		$welcome=0;
		} else if($hari=="30"){
		$welcome=20*$jmlgf/100;
		} else if($hari=="60"){
		$welcome=50*$jmlgf/100;
		} else {
		}
		
		$deviden5hari=($jmlgf*$persennya)/100;
		$deviden30hari=($jmlgf*$persennya)/100;
		$deviden60hari=($jmlgf*$persennya)/100;

		if($hari=="5"){
		$depo=$deviden5hari;
		} else if($hari=="30"){
		$depo=$deviden30hari;
		} else if($hari=="60"){
		$depo=$deviden60hari;
		} else {
		$depo=0;
		}
		
		
		
		$db->delete("hitung_hari", "username='$user_session'");
		$username = $user_session ;
		if($hari=="5"){
		
		$db->insert("komisi", "", "'', '$username', '$jmlgf', '$hari_ini', '1',  'Bantuan Anda', '$kodetrx'");
	//	$db->insert("komisi", "", "'', '$username', '$welcome', '$hari_ini', '1',  'Welcome Bonus', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden1', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden2', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden3', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden4', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden5', '0',  'Deviden', '$kodetrx'");
	//	$db->insert("komisi", "", "'', '$username', '$depo', '$deviden6', '0',  'Deviden', '$kodetrx'");
	//	$db->insert("komisi", "", "'', '$username', '$depo', '$deviden7', '0',  'Deviden', '$kodetrx'");
	//	$db->insert("komisi", "", "'', '$username', '$depo', '$deviden8', '0',  'Deviden', '$kodetrx'");
	//	$db->insert("komisi", "", "'', '$username', '$depo', '$deviden9', '0',  'Deviden', '$kodetrx'");
	//	$db->insert("komisi", "", "'', '$username', '$depo', '$deviden10', '0',  'Deviden', '$kodetrx'");
	//	$db->insert("komisi", "", "'', '$username', '$depo', '$deviden11', '0',  'Deviden', '$kodetrx'");
	//	$db->insert("komisi", "", "'', '$username', '$depo', '$deviden12', '0',  'Deviden', '$kodetrx'");
	//	$db->insert("komisi", "", "'', '$username', '$depo', '$deviden13', '0',  'Deviden', '$kodetrx'");
	//	$db->insert("komisi", "", "'', '$username', '$depo', '$deviden14', '0',  'Deviden', '$kodetrx'");
	//	$db->insert("komisi", "", "'', '$username', '$depo', '$deviden15', '0',  'Deviden', '$kodetrx'");

		
		
		$db->insert("hitung_hari", "", "'', '$username', '$deviden1', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden2', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden3', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden4', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden5', '0'");
	//	$db->insert("hitung_hari", "", "'', '$username', '$deviden6', '0'");
	//	$db->insert("hitung_hari", "", "'', '$username', '$deviden7', '0'");
	//	$db->insert("hitung_hari", "", "'', '$username', '$deviden8', '0'");
	//	$db->insert("hitung_hari", "", "'', '$username', '$deviden9', '0'");
	//	$db->insert("hitung_hari", "", "'', '$username', '$deviden10', '0'");
	//	$db->insert("hitung_hari", "", "'', '$username', '$deviden11', '0'");
	//	$db->insert("hitung_hari", "", "'', '$username', '$deviden12', '0'");
	//	$db->insert("hitung_hari", "", "'', '$username', '$deviden13', '0'");
	//	$db->insert("hitung_hari", "", "'', '$username', '$deviden14', '0'");
	//	$db->insert("hitung_hari", "", "'', '$username', '$deviden15', '0'");
		
		} else if($hari=="30"){
		$db->insert("komisi", "", "'', '$username', '$jmlgf', '$hari_ini', '1',  'Bantuan Anda', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$welcome', '$hari_ini', '1',  'Welcome Bonus', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden1', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden2', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden3', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden4', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden5', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden6', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden7', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden8', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden9', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden10', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden11', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden12', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden13', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden14', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden15', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden16', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden17', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden18', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden19', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden20', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden21', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden22', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden23', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden24', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden25', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden26', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden27', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden28', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden29', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden30', '0',  'Deviden', '$kodetrx'");
		
		$db->insert("hitung_hari", "", "'', '$username', '$deviden1', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden2', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden3', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden4', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden5', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden6', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden7', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden8', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden9', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden10', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden11', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden12', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden13', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden14', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden15', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden16', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden17', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden18', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden19', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden20', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden21', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden22', '0'");

		$db->insert("hitung_hari", "", "'', '$username', '$deviden23', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden24', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden25', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden26', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden27', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden28', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden29', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden30', '0'");
		
		
		} else if($hari=="60"){
		$db->insert("komisi", "", "'', '$username', '$jmlgf', '$hari_ini', '1',  'Bantuan Anda', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$welcome', '$hari_ini', '1',  'Welcome Bonus', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden1', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden2', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden3', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden4', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden5', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden6', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden7', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden8', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden9', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden10', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden11', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden12', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden13', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden14', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden15', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden16', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden17', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden18', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden19', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden20', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden21', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden22', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden23', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden24', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden25', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden26', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden27', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden28', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden29', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden30', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden31', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden32', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden33', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden34', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden35', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden36', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden37', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden38', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden39', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden40', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden41', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden42', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden43', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden44', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden45', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden46', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden47', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden48', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden49', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden50', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden51', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden52', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden53', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden54', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden55', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden56', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden57', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden58', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden59', '0',  'Deviden', '$kodetrx'");
		$db->insert("komisi", "", "'', '$username', '$depo', '$deviden60', '0',  'Deviden', '$kodetrx'");
		
		$db->insert("hitung_hari", "", "'', '$username', '$deviden1', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden2', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden3', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden4', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden5', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden6', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden7', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden8', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden9', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden10', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden11', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden12', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden13', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden14', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden15', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden16', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden17', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden18', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden19', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden20', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden21', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden22', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden23', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden24', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden25', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden26', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden27', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden28', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden29', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden30', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden31', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden32', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden33', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden34', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden35', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden36', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden37', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden38', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden39', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden40', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden41', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden42', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden43', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden44', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden45', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden46', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden47', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden48', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden49', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden50', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden51', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden52', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden53', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden54', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden55', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden56', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden57', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden58', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden59', '0'");
		$db->insert("hitung_hari", "", "'', '$username', '$deviden60', '0'");
		} else {
		
		}
		
	echo "<meta http-equiv=\"refresh\" content=\"2; url=?e=assignment\">";
	}

	}
	
?>
<?
	break;
}
?>
<?
} else {
echo "<meta http-equiv=\"refresh\" content=\"1; url=illegal.html\">";
}
?>