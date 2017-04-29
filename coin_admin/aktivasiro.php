<?php
if(isset( $_SESSION['valid_admin'])) {
$valid_admin=$_SESSION['valid_admin'];
?>


  <h3 align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
  
	<?
switch ($page) {
	default :
?>

  </font></h3>
  <font size="2" face="Verdana, Arial, Helvetica, sans-serif">  </font>
  <form name="form3" method="post" action="?m=aktivasiro&page=ordform">
    <p align="center"><strong><font color="#000066" size="5" face="Verdana, Arial, Helvetica, sans-serif">Form Aktivasi RO Member </font></strong></p>
    <table width="400"  border="0" align="center" cellpadding="4" cellspacing="0" class="bordertable">
      <tr> 
        <td width="100%" height="26"><div align="center">Masukan Username : 
            <input type="text" name="username" id="username" />
        </div></td>
      </tr>
      <tr>
        <td height="27"><div align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
          <input name="submit" type="submit" class="tombol" value="Aktivasi RO" />
        </font></div></td>
      </tr>
    </table>
    <p>&nbsp;</p>
  </form>
  <font size="2" face="Verdana, Arial, Helvetica, sans-serif">
  <?
	break;
	case ordform :
	$db->aktivasiro("$username");
?>
  </font>
    <div align="center">
<font color="#000066" size="5" face="Verdana, Arial, Helvetica, sans-serif"><strong> Proses aktivasi RO Sukses </strong></font>
<p>&nbsp;</p></div>
<p align="center">&nbsp;</p>
    <?
	//echo "<meta http-equiv='refresh' content='0;URL=?m=member'>";
	break;
}
}
?>
<p>&nbsp;</p>
  