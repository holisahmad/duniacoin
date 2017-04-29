

  <h3 align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
  
	<?
switch ($page) {
	default :
?>

  </font></h3>
  <font size="2" face="Verdana, Arial, Helvetica, sans-serif">  </font>
  <form name="form3" method="post" action="?m=hapusdatabayar&page=ordform">
    <p align="center"><font color="#000066" size="5" face="Verdana, Arial, Helvetica, sans-serif"><strong> Cetak Dulu Pembayaran Untuk Hari ini..!</strong></font></p>
    <table width="400"  border="0" align="center" cellpadding="4" cellspacing="0" class="bordertable">
      <tr class="formjoin">
        <td height="33"><div align="center"><strong>Anda yakin akan menghapus Data Pembayaran ? </strong></div></td>
      </tr>
      <tr> 
        <td height="53"><div align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">&nbsp; 
            <input name="submit" type="submit" class="tombol" value="HAPUS DATA PEMBAYARAN KE MEMBER">
        </font></div></td>
      </tr>
      <tr> 
        <td>&nbsp;</td>
      </tr>
    </table>
    <p>&nbsp;</p>
  </form>
  <font size="2" face="Verdana, Arial, Helvetica, sans-serif">
  <?
	break;
	case ordform :
	myquery("DELETE FROM bayartoday WHERE paket=1 AND status=1");
	
?>
  </font>
    <div align="center">
      <p><font color="#000066" size="5" face="Verdana, Arial, Helvetica, sans-serif"><strong>Data Sudah Di Hapus..!!!! </strong></font></p>
</div>

    <?
	//echo "<meta http-equiv='refresh' content='0;URL=?m=member'>";
	break;
}
?>
<p>&nbsp;</p>
  