<?
	if($user_status > 0 ) {
?>
<style type="text/css">
body,td,th {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 12px;
}
.style1 {
	color: #FFFF00;
	font-weight: bold;
}
</style>


<?php

$thn=substr($clientdate, 0, 4);
	$bln=substr($clientdate, 5, 2);
	$tgl=substr($clientdate, 8, 2);
	if(!$bulan && !$tahun) {
		$bulan = $bln;
		$tahun = $thn;
	}	
	
?>

<strong><center>
  <p>Detail Bonus </p>
  <p>&nbsp;  </p>
</center></strong>
<table width="800" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#E7E5D9">
          <tr>
            <td height="25" bgcolor="#B5BE41"><div align="center"><font color="#FFFF00" size="2" face="Verdana, Arial, Helvetica, sans-serif">(1) sponsored bonus</font></div></td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="1" cellspacing="1" bgcolor="#CCCCCC">
                <tr>
                  <td width="4%" height="25" align="center" bgcolor="#F2F1EC"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">No.</font></td>
                  <td width="15%" align="center" bgcolor="#F2F1EC"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Date</font></td>
                  <td width="21%" align="center" bgcolor="#F2F1EC"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">From</font></td>
				  <td width="21%" align="center" bgcolor="#F2F1EC"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Package</font></td>
                
                  <td width="21%" align="center" bgcolor="#F2F1EC"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Type</font></td>
                  <td width="19%" align="center" bgcolor="#F2F1EC"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Total</font></td>
                </tr>
                <?
	$sbl=mysql_query("select * from komisi where username='$user_session' and jenis='KomisiSponsor' order by id");
	$nom=1;
	$totsponsor = 0;
	while($row=mysql_fetch_row($sbl)) {
		echo "<tr bgcolor=#FFFFFF>
          <td align=center height=25>$nom.</td>
           <td align=center height=25>".date("d-m-Y",strtotime($row[3]))."</td>
		   <td align=center height=25>$row[6]</td>
		 <td align=center height=25>". $db->dataku("paket_daftar", $row[6])."</td>
		 <td align=center height=25>Bonus Sponsor</td>
          <td align=right>".rupiah($row[2])."</td>
        </tr>";
		$totsponsor = $totsponsor + $row[2];
		$nom++;
	}
	?>
                <tr>
                  <td height="25" colspan="5" align="right" bgcolor="#E8E8E8"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">TOTAL </font></strong></td>
                  <td bgcolor="#E8E8E8" align="right"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
                    <?= rupiah($totsponsor); ?>
                  </font></strong></td>
                </tr>
            </table></td>
          </tr>
</table>
   
   
   <p>&nbsp;</p>
   <table width="800" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#E7E5D9">
     <tr>
       <td height="25" bgcolor="#B5BE41"><div align="center"><font color="#FFFF00" size="2" face="Verdana, Arial, Helvetica, sans-serif">(2) Pairing bonus</font></div></td>
     </tr>
     <tr>
       <td bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="1" cellspacing="1" bgcolor="#CCCCCC">
           <tr>
             <td width="4%" height="25" align="center" bgcolor="#F2F1EC"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">No.</font></td>
             <td width="15%" align="center" bgcolor="#F2F1EC"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Date</font></td>
             <td width="21%" align="center" bgcolor="#F2F1EC"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">From</font></td>
             <td width="21%" align="center" bgcolor="#F2F1EC"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Package</font></td>
             <td width="21%" align="center" bgcolor="#F2F1EC"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Type</font></td>
             <td width="19%" align="center" bgcolor="#F2F1EC"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Total</font></td>
           </tr>
            <?
	$sblx=mysql_query("select * from komisi where username='$user_session' and jenis='kompasangan' order by id");
	$nomx=1;
	$totsponsorx = 0;
	while($rowx=mysql_fetch_row($sblx)) {
		echo "<tr bgcolor=#FFFFFF>
          <td align=center height=25>$nom.</td>
           <td align=center height=25>".date("d-m-Y",strtotime($rowx[3]))."</td>
		   <td align=center height=25>$rowx[6]</td>
		 <td align=center height=25>". $db->dataku("paket_daftar", $rowx[6])."</td>
		 <td align=center height=25>Pairing</td>
          <td align=right>".rupiah($rowx[2])."</td>
        </tr>";
		$totsponsorx = $totsponsorx + $rowx[2];
		$nomx++;
	}
	?>
           <tr>
             <td height="25" colspan="5" align="right" bgcolor="#E8E8E8"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">TOTAL </font></strong></td>
             <td bgcolor="#E8E8E8" align="right"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
               <?= rupiah($totsponsorx); ?>
             </font></strong></td>
           </tr>
       </table></td>
     </tr>
   </table>
   <p>
     <?php 
   
   if ( $db->dataku("paket_daftar", $user_session) == "Titanium") {
   
   ?>
   </p>
   
   <table width="800" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#E7E5D9">
     <tr>
       <td height="25" bgcolor="#B5BE41"><div align="center"><font color="#FFFF00" size="2" face="Verdana, Arial, Helvetica, sans-serif">(3) Entertain bonus</font></div></td>
     </tr>
     <tr>
       <td bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="1" cellspacing="1" bgcolor="#CCCCCC">
           <tr>
             <td width="4%" height="25" align="center" bgcolor="#F2F1EC"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">No.</font></td>
             <td width="15%" align="center" bgcolor="#F2F1EC"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Date</font></td>
             <td width="21%" align="center" bgcolor="#F2F1EC"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">From</font></td>
             <td width="21%" align="center" bgcolor="#F2F1EC"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Package</font></td>
             <td width="21%" align="center" bgcolor="#F2F1EC"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Type</font></td>
             <td width="19%" align="center" bgcolor="#F2F1EC"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Total</font></td>
           </tr>
           <?
	$sbly=mysql_query("select * from komisi where username='$user_session' and jenis='KomisiEnterten' order by id");
	$nomy=1;
	$totsponsory = 0;
	while($rowy=mysql_fetch_row($sbly)) {
		echo "<tr bgcolor=#FFFFFF>
          <td align=center height=25>$nomy.</td>
           <td align=center height=25>".date("d-m-Y",strtotime($rowy[3]))."</td>
		   <td align=center height=25>$rowy[6]</td>
		 <td align=center height=25>". $db->dataku("paket_daftar", $rowy[6])."</td>
		 <td align=center height=25>KomisiEnterten</td>
          <td align=right>".rupiah($rowy[2])."</td>
        </tr>";
		$totsponsory = $totsponsory + $rowy[2];
		$nomy++;
	}
	?>
           <tr>
             <td height="25" colspan="5" align="right" bgcolor="#E8E8E8"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">TOTAL </font></strong></td>
             <td bgcolor="#E8E8E8" align="right"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
               <?= rupiah($totsponsory); ?>
             </font></strong></td>
           </tr>
       </table></td>
     </tr>
   </table>
   <p></p>
   
<?php
}
?>
<table width="800" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#E7E5D9">
     <tr>
       <td height="27" bgcolor="#B5BE41"><div align="center" class="style1"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Total commisions</font></div></td>
     </tr>
     <tr>
       <td bgcolor="#FCEFED"><table width="800" border="0" cellspacing="1" cellpadding="1">
           <tr>
             <td width="8%" height="25" align="center" bgcolor="#FFFFFF"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">1</font></td>
             <td width="57%" bgcolor="#FFFFFF"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> sponsore bonus </font></td>
             <td width="35%" align="right" bgcolor="#FFFFFF"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
               <?= rupiah($totsponsor); ?>
             </font></strong></td>
           </tr>
           <tr>
             <td height="25" align="center" bgcolor="#FFFFFF"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">2</font></td>
             <td bgcolor="#FFFFFF">Pairing Bonus </td>
             <td align="right" bgcolor="#FFFFFF"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
               <?= rupiah($totsponsorx); ?>
             </font></strong></td>
           </tr>

 <?php 
   
   if ( $db->dataku("paket_daftar", $user_session) == "Titanium") {
   
   ?>
           <tr>
             <td height="25" align="center" bgcolor="#FFFFFF"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">3</font></td>
             <td bgcolor="#FFFFFF">Entertain Bonus </td>
             <td align="right" bgcolor="#FFFFFF"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
               <?= rupiah($totsponsory); ?>
             </font></strong></td>
           </tr>
<?php } ?>

           <tr>
             <td height="25" colspan="2" align="right" bgcolor="#E8E8E8"><div align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> This Month Total (
               <?= $bulan0[$bulan-1]." $tahun"; ?>
               ) </font></div></td>
             <td align="right" bgcolor="#E8E8E8"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
               <?
			//$totbln = $totblev + $bon_star + $broyalti + $unilevel;
			$saldo = $totsponsor + $totsponsorx + $totsponsory ;
			echo rupiah($saldo); 
			//----------total downlline--------
			//$tki = memberkiri($user_session, "and status=1");
			//$tka = memberkanan($user_session, "and status=1");
			//$tdl = $tki + $tka;
			?>
             </font></strong></td>
           </tr>
       </table></td>
     </tr>
</table>
   <p><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">

     <?
} else {
echo "<meta http-equiv=\"refresh\" content=\"1; url=illegal.html\">";
}
?>
</p>
   <p>&nbsp;</p>
   
