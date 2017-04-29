<?
	if($user_status > 0 ) {
?>
<style type="text/css">
.dddd {	color: #F00;
}
</style>

<div id="module">
  <table width="575" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td height="35" colspan="3"><div align="center"><font color="#FFFFFF"><strong><font color="#000066" size="2" face="Verdana, Arial, Helvetica, sans-serif"> Your activation ticket </font></strong></font></div></td>
    </tr>
    <tr>
      <td width="10">&nbsp;</td>
      <td align="center" valign="top"><p align="left"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
      </font></p>
        <h2 align="center">Hello,  <?= $db->dataku("nama", $user_session); ?>.
          You have <?= $db->pinku("jumlahpin", $user_session); ?> Tickets <font size="2" face="Verdana, Arial, Helvetica, sans-serif"></font></h2>
        </p>
        <p><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
        </font></p>
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