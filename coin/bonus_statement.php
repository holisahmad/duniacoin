<?
	if($user_status > 0 ) {
?>
<style type="text/css">
body,td,th {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 12px;
}
</style>
<?
switch ($page) {
	default :
?><form name="form1" method="post" action="?e=bonus_statement&page=update">
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
        <td width="124">My  Package </td>
         <?php		
        $date1= (date("Y-m-d"));
  $date2=  $db->dataku("tgl_reinves", $user_session);
  $datetime1 = new DateTime($date1);
  $datetime2 = new DateTime($date2);
  $difference = $datetime1->diff($datetime2);
    
  
  if ( $difference->days > 0 ) {
   $sts = "Lock";
   }else {
   $sts ="Open" ;
   }
  
  ?> 
        
        <td width="246">:    
		
		      
          <?= $db->dataku("paket_daftar", $user_session);?></td>
        <td width="123">&nbsp;</td>
        <td width="287">&nbsp;</td>
        <td width="13">&nbsp;</td>
      </tr>
	  <tr>
        <td><strong>  Kontrak </strong></td>
        <td>:		<strong>( 
           <?= date("d-m-Y", strtotime($db->dataku("tgl_reinves", $user_session))); ?>
          ) Sisa ( <?= $db->dataku("jlh_hari", $user_session);?> ) Kali  </strong></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
	  
      <tr>
        <td>  Total Bonus  </td>
        <td>: <strong>
          <?= rupiah($db->totalkomisi($user_session, "")); ?>
          </strong></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
<tr>
        <td>Bonus Terbayar </td>
        <td>: <strong>
          <?= rupiah ($db->bayarkomisi($user_session, "")); ?>
          <a href='?e=daily_deviden'>            </a></strong></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>      <tr>
        <td>Saldo</td>
        <td><strong>:
          <?php
		  $totalbonus = $db->totalkomisi($user_session, "") ;
		  $bayar      = $db->bayarkomisi($user_session, "") ;
		  
		   $saldo = $totalbonus - $bayar ;
		   echo rupiah($saldo) ;
		   
		  ?>          
          </a></strong></span></td>
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
	  
	  <?php  
	  $widh =  $db->dataku("payment", $user_session);
	  
	  if ($widh == Manual ) {
	  ?>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
	  <?php
	
	}
	?>
      
    </table></td>
  </tr>
</table>
<p><strong>Note </strong></p>
<p>1. Proses Minimum Minimal of <strong>Withdrawal</strong> is  50 BV.</p>
<p>2. <strong>Withdrawal fee</strong> fee 10 BV  </p>
<p>3.<strong> 1 BV = </strong> IDR 1.000 </p>
<p>&nbsp;</p>
</form>

<strong><center>
  <p>&nbsp;</p>
  </center></strong>
<table width="800" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#E7E5D9">
          <tr>
            <td height="25" bordercolor="#FFFFFF" bgcolor="#B5BE41"><div align="center"><strong>Report All Withdrawal </strong></div></td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="1" cellspacing="1" bgcolor="#CCCCCC">
              <tr>
                <td width="4%" height="25" align="center" bgcolor="#F2F1EC"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">No.</font></td>
                <td width="15%" align="center" bgcolor="#F2F1EC"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Date</font></td>
                 <td width="15%" align="center" bgcolor="#F2F1EC"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Kode</font></td>
                <td width="21%" align="center" bgcolor="#F2F1EC">Withdrawal </td>
                <td width="21%" align="center" bgcolor="#F2F1EC"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Fee </font></td>
                <td width="21%" align="center" bgcolor="#F2F1EC"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Paid</font></td>
                <td width="19%" align="center" bgcolor="#F2F1EC"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Status</font></td>
              </tr>
              <?php
	$sbl=mysql_query("select * from transfer where userid='$user_session' order by id");
	$nom=1;
	$tot = 0;
	while($row=mysql_fetch_row($sbl)) {
	  if($row[11] > 0) {
	$valid= "<b>Sukses</b>";
	} else {
		$valid= "Pending";
	}	
	
		echo "<tr bgcolor=#FFFFFF>
          <td align=center height=25>$nom.</td>
           <td align=center height=25>".date("d-m-Y",strtotime($row[2]))."</td>
            <td align=center height=25>".$row[13]."</td>
		   <td align=center height=25>".rupiah($row[6])."</td>
		   
		   <td align=center height=25>".rupiah($row[7])."</td>
		   <td align=center height=25>".rupiah2($row[9])."</td>
		   <td align=center height=25>$valid</td>
		   

	
		  
          
        </tr>";
		$tot = $tot + $row[9];
		$nom++;
	}
	?>
              <tr>
                <td height="25" colspan="5" align="right" bgcolor="#E8E8E8"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">TOTAL</font></strong></td>
                <td bgcolor="#E8E8E8" align="center"> <?= rupiah2($tot); ?></td>
				 <td bgcolor="#E8E8E8" align="right"></td>
              </tr>
            </table></td>
          </tr>
</table>
   
<?
	break;
	
	case update :
		$aktif = $db->totalkomisi($user_session, ""); 
		  $pasif = $db->totalpsb($user_session, ""); 
		  
		  $bayar = $db->bayarkomisi($user_session, ""); 
		  
  $date1= (date("Y-m-d"));
  $date2=  $db->dataku("tgl_reinves", $user_session);
  $datetime1 = new DateTime($date1);
  $datetime2 = new DateTime($date2);
  $difference = $datetime1->diff($datetime2);
     if ( $difference->days > 0 ) {
   			$stt = 0;
			 }else {
  				$stt = $db->dataku("paket_daftar", $user_session);
  			  }
		  
		  
		  $saldo = $aktif + $pasif + $stt - $bayar ;
		  
		  
	
		
	$bank=$db->dataku("bank", $user_session);
	$an=$db->dataku("an", $user_session);
	$norek=$db->dataku("norek", $user_session);
	
	$mypin=$db->dataku("pin", $user_session);
	
	$adm = $wd * 5/100 ;
	$rp = $wd - $adm ;
	
	if($mypin<>$token){
		echo "<center><font color='#FF0000'><br>Maaf Token Anda Tidak Cocok !!</font></center>";
	} else {
	
	if($wd < 100000 ){
	
	echo "<strong><center><font color='#FF0000'>Maaf Withdrawal Minimal IDR. 100.000 </font></center></strong>";
		
	} else {
	
	if($wd>$saldo){
		echo "<strong><center><font color='#FF0000'>Maaf Withdrawal Melebihi Saldo di Account Anda</font></center></strong>";
		
	} else {
	
		$db->insert("transfer", "", "'', '$user_session', '$clientdate', '$bank', '$an', '$norek', '$wd', '$adm', '0', '$rp', '1','0','Bank', '', ''");
		
		if ( $difference->days < 1 && $wd == $saldo ) {
		
		 $db->update("member", "paket_daftar=0", "username='$user_session'");
		}
	
	echo "<center><font color='#00F'><strong>Withdrawal Bonus Sukses Sudah Kami Terima Dan Akan segera di Proses </strong></font></center>";
	
	}
	}}
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