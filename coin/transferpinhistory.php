<?
	if($user_status > 0 ) {
?>
<style type="text/css">
.dddd {	color: #F00;
}
</style>

<div id="module">
  <table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td height="35" colspan="3"><div align="center"><font color="#FFFFFF"><strong><font color="#000066" size="2" face="Verdana, Arial, Helvetica, sans-serif">TRANSFER TICKET HISTORY</font></strong></font></div></td>
    </tr>
    <tr>
      <td width="10">&nbsp;</td>
      <td align="center" valign="top"><p align="left">&nbsp;</p>
        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#E7E5D9">
          <tr>
            <td height="25" bgcolor="#000033"><div align="center"></div></td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="1" cellspacing="1" bgcolor="#CCCCCC">
                <tr>
                  <td width="7%" height="25" align="center" bgcolor="#F2F1EC"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">No.</font></td>
                  <td width="19%" align="center" bgcolor="#F2F1EC"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Date</font></td>
                  <td width="19%" align="center" bgcolor="#F2F1EC"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">In</font></td>
                  <td width="17%" align="center" bgcolor="#F2F1EC"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Out</font></td>
                  <td width="38%" align="center" bgcolor="#F2F1EC"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Description</font></td>
                </tr>
                <?
	$sbl=mysql_query("select * from history_card where username='$user_session'");
	$nom=1;
	$totpintrf = 0;
	while($row=mysql_fetch_row($sbl)) {
		echo "<tr bgcolor=#FFFFFF>
          <td align=center height=25>$nom.</td>
           <td align=center height=25>".date("d-m-Y",strtotime($row[5]))."</td>
          <td align=center height=25>$row[2]</td>
		  <td align=center height=25>$row[3] </td>
          <td align=center height=25>$row[4]</td>
        </tr>";
		$totpintrf = $totpintrf + $row[3];
		$nom++;
	}
	?>

            </table></td>
          </tr>
        </table>
        <p align="center">&nbsp;</p>
      <p align="center">&nbsp;</p></td>
      <td width="10">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3">&nbsp;</td>
    </tr>
  </table>
  <h3 align="center">&nbsp;</h3>
  <h3 align="center">&nbsp;</h3>
  <font size="2" face="Verdana, Arial, Helvetica, sans-serif">  </font>
  <font size="2" face="Verdana, Arial, Helvetica, sans-serif">  </font>
<div id="notice"> 
    <div align="center"></div>
  </div>
  <font size="2" face="Verdana, Arial, Helvetica, sans-serif"></font></div>
<?
} else {
echo "<meta http-equiv=\"refresh\" content=\"1; url=illegal.html\">";
}
?>