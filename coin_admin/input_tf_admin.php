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
  <form name="form3" method="post" action="?m=input_tf_admin&page=ordform">
    <p align="center"><font color="#000066" size="5" face="Verdana, Arial, Helvetica, sans-serif"><strong>Input Manual TF Admin</strong></font></p>
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
        <td><div align="right"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Nominal TF</font></div></td>
        <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">:
              <input name="nominal" type="text" id="nominal" size="20">
        </font></td>
      </tr>
      <tr> 
        <td height="53" colspan="2"><div align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">&nbsp; 
            <input name="submit" type="submit" class="tombol" value="INPUT TAKE FUN ADMIN">
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
	$kodetrx=rand(11111, 99999);
$db->insert("gh_start", "", "'', 'TF$kodetrx', '$username', '$clientdate', '$nominal', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '$nominal', '0', '1'");


?>
  </font>
    <div align="center">
      <p><strong><font color="#000066" size="5" face="Verdana, Arial, Helvetica, sans-serif">Take Fun Admin Berhasil Di Input</font></strong></p>
<p>&nbsp;</p></div>
    <p align="center">&nbsp;</p>
    <?
	//echo "<meta http-equiv='refresh' content='0;URL=?m=updatejaringan'>";
	break;
}
?>
<p>&nbsp;</p>
  