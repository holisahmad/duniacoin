<?
include "../configdb_inc.php"; 
include "mydb.php";
ini_set('memory_limit',-1);
ini_set('max_execution_time',-1);
?>

  <h3 align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
  
	<?
switch ($page) {
	default :
?>

  </font></h3>
  <font size="2" face="Verdana, Arial, Helvetica, sans-serif">  </font>
  <form name="form3" method="post" action="?m=updatesp&page=ordform">
    <p align="center"><font color="#000066" size="5" face="Verdana, Arial, Helvetica, sans-serif"><strong>Update Sponsor </strong></font></p>
    <table width="400"  border="0" align="center" cellpadding="4" cellspacing="0" class="bordertable">
      <tr class="formjoin">
        <td width="46%" height="33">&nbsp;</td>
        <td width="54%">&nbsp;</td>
      </tr>
      <tr class="formjoin">
        <td><div align="right"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Update Mulai ID </font></div></td>
        <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">:
              <input name="n1" type="text" id="n1" size="5" maxlength="5">
              <strong>Sampai  </strong>
              <input name="n2" type="text" id="n2" size="5" maxlength="5" />
        </font></td>
      </tr>
      <tr> 
        <td height="53" colspan="2"><div align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">&nbsp; 
            <input name="submit" type="submit" class="tombol" value="UPDATE SPONSOR MEMBER">
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
	$sql= "SELECT * FROM member WHERE id BETWEEN '$n1' AND '$n2'";
	$dt=mysql_query($sql);
	$tdata=mysql_num_rows($dt);
	for($v==0;$v<=$tdata-1;$v++) {
	$dtlogin=mysql_fetch_array($dt);
	$jsp = $db->jumlahsp($dtlogin[username]);
	
	$db->update("upline", "sp='$jsp'", "username='$dtlogin[username]'");
	}

?>
  </font>
    <div align="center">
      <p><font color="#000066" size="5" face="Verdana, Arial, Helvetica, sans-serif"><strong>Jaringan Member Sudah di Update </strong></font></p>
      <p>&nbsp;</p></div>
    <p align="center">&nbsp;</p>
    <?
	//echo "<meta http-equiv='refresh' content='0;URL=?m=updatejaringan'>";
	break;
}
?>
<p>&nbsp;</p>
  