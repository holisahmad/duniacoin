<?PHP

if(isset( $_SESSION['user_session']))

  {

?>

  <h3 align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
  
	<?
switch ($page) {
	default :
?>

  </font></h3>
  <font size="2" face="Verdana, Arial, Helvetica, sans-serif">  </font>
  <form name="form3" method="post" action="?e=input_tf_admin&page=ordform">
    <p align="center"><font color="#000066" size="5" face="Verdana, Arial, Helvetica, sans-serif"><strong>Input username Prioritas </strong></font></p>
    <table width="400"  border="0" align="center" cellpadding="4" cellspacing="0" class="bordertable">
      <tr class="formjoin">
        <td width="46%" height="33">&nbsp;</td>
        <td width="54%">&nbsp;</td>
      </tr>
      <tr class="formjoin">
        <td><div align="right"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Username</font></div></td>
        <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">:
          <input name="username" type="text" id="username" size="20" />
        </font></td>
      </tr>
      <tr class="formjoin">
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr> 
        <td height="53" colspan="2"><div align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">&nbsp; 
            <input name="submit" type="submit" class="tombol" value="INPUT USER PRIORITAS">
        </font></div></td>
      </tr>
      <tr> 
        <td colspan="2">&nbsp;</td>
      </tr>
    </table>
    <p>&nbsp;</p>
  </form>
  <font size="2" face="Verdana, Arial, Helvetica, sans-serif">
  <?
	break;
	case ordform :
	$db->update("member", "lev=1", "username='$username'");

?>
  </font>
    <div align="center">
      <p><strong><font color="#000066" size="5" face="Verdana, Arial, Helvetica, sans-serif">Username Prioritas  Berhasil Di Input</font></strong></p>
      <p>&nbsp;</p></div>
    <p align="center">&nbsp;</p>
    <?
	//echo "<meta http-equiv='refresh' content='0;URL=?m=updatejaringan'>";
	break;
}
?>
<p>&nbsp;</p>

<?
} else {
echo "<meta http-equiv=\"refresh\" content=\"1; url=illegal.html\">";
}
?>
  