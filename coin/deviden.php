<?
include "../configdb_inc.php"; 
//include "../masterclass.php";
//$db = new db_mysql($server_name, $userdb, $passdb, $databasename,"");
//include "../function.php";
include "mydb.php";
?>

  <h3 align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
  
	<?
switch ($page) {
	default :
?>

  </font></h3>
  <font size="2" face="Verdana, Arial, Helvetica, sans-serif">  </font>
  <form name="form3" method="post" action="?m=deviden&page=ordform">
    <p align="center"><strong><font color="#000066" size="5" face="Verdana, Arial, Helvetica, sans-serif">Ganti Status Sukses</font></strong></p>
    <table width="400"  border="0" align="center" cellpadding="4" cellspacing="0" class="bordertable">
      <tr> 
        <td width="100%" height="26">&nbsp;</td>
      </tr>
      <tr>
        <td height="27"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
          <input name="submit" type="submit" class="tombol" value="VALIDASI" />
        </font></td>
      </tr>
    </table>
    <p>&nbsp;</p>
  </form>
  <font size="2" face="Verdana, Arial, Helvetica, sans-serif">
  <?
	break;
	case ordform :
	$db->update("gf_start", "sukses='1'", "status='1'");
?>
  </font>
    <div align="center">
<font color="#000066" size="5" face="Verdana, Arial, Helvetica, sans-serif"><strong>Semua Status Pending   Berhasil Di Ganti</strong></font>
<p>&nbsp;</p></div>
<p align="center">&nbsp;</p>
    <?
	//echo "<meta http-equiv='refresh' content='0;URL=?m=member'>";
	break;
}
?>
<p>&nbsp;</p>
  