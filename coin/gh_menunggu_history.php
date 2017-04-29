<?
      $sbl=mysql_query("select * from gh_start where username='$user_session' and status='0' order by id");
	  while($row=mysql_fetch_row($sbl)) {
	  ?>
<style type="text/css">
<!--
.style1111 {
	font-size: 24px;
	font-weight: bold;
}
.style2111 {
	color: #FF0000;
	font-weight: bold;
}
-->
</style>

<table width="800" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="302" height="200" background="images/gh_menunggu_history.png"><table width="700" border="0" align="left" cellpadding="2" cellspacing="2">
      <tr>
        <td width="187" height="44">&nbsp;</td>
        <td width="311">&nbsp;</td>
        <td width="182">&nbsp;</td>
      </tr>
      <tr>
        <td height="25">&nbsp;</td>
        <td><strong>
          Transaksi  
          <?= $row[2];
				?>
        </strong>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><strong> Jumlah  
          <?= rupiah($row[4]);
				?>
        </strong>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><strong> Tanggal :
            <?= date("d-m-Y", strtotime($row[3]));
				?>
        </strong>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><div align="center" class="style1111"> 
            <?= $row[1]; ?></div></td>
        <td colspan="2"><div align="center" class="style2111"></div></td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>      <p>&nbsp;</p>
    </td>
  </tr>
</table>
<?
	  }
	  ?>