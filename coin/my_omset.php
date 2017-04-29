<?
	if($user_status > 0 ) {
?>
<style type="text/css">
body,td,th {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 12px;
}
.ssss {
	color: #F00;
}
</style>

<table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="800" border="0" cellspacing="2" cellpadding="2">
      <tr>
        <td width="300" valign="middle" background="images/assignment.png"><table width="234" border="0" align="center" cellpadding="3" cellspacing="3">
            <tr>
              <td width="223" height="28"><div align="center">Total Omset RA </div></td>
            </tr>
            <tr>
              <td><h3 align="center"><?= rupiah($db->omsetra("('$dtfrom')")); ?></h3></td>
            </tr>
            <tr>
              <td><div align="center"><strong class="ssss">
               <?
		$ta = $db->count_records("gh_start", "status=0");
		echo $ta;
		
		?> Jumlah Member RA </strong></div></td>
            </tr>
            <tr>
              <td></td>            </tr>
        </table>
          <p>&nbsp;</p>
          <table width="234" border="0" align="center" cellpadding="3" cellspacing="3">
            <tr>
              <td width="223" height="28"><div align="center">Omset RA Indonesia </div></td>
            </tr>
            <tr>
              <td><h3 align="center">
                <?= rupiah($db->omsetrari("('$dtfrom')")); ?>
              </h3></td>
            </tr>
            <tr>
              <td><div align="center"><strong class="ssss">
                  <?
		$ta = $db->count_records("gh_start", "status=0 and negara='Indonesia'");
		echo $ta;
		
		?>
                Jumlah Member RA </strong></div></td>
            </tr>
            <tr>
              <td></td>
            </tr>
          </table>
          <p>&nbsp;</p>
          <table width="234" border="0" align="center" cellpadding="3" cellspacing="3">
            <tr>
              <td width="223" height="28"><div align="center">Omset RA Malaysia </div></td>
            </tr>
            <tr>
              <td><h3 align="center">
                  <?= rupiah($db->omsetrakl("('$dtfrom')")); ?>
              </h3></td>
            </tr>
            <tr>
              <td><div align="center"><strong class="ssss">
                  <?
		$ta = $db->count_records("gh_start", "status=0 and negara='Malaysia'");
		echo $ta;
		
		?>
                Jumlah Member RA </strong></div></td>
            </tr>
            <tr>
              <td></td>
            </tr>
          </table>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p></td>
        <td>&nbsp;</td>
        <td width="300" align="center"><table width="300" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="300" height="200" valign="middle" background="images/assignment.png"><table width="234" border="0" align="center" cellpadding="3" cellspacing="3">
              <tr>
                <td width="223" height="28"><div align="center">Total Omset PA  </div></td>
              </tr>
              <tr>
                <td><h3 align="center"><strong><?= rupiah($db->omsetpa("('$dtfrom')")); ?></strong></h3></td>
              </tr>
              <tr>
                <td><div align="center"><strong class="ssss">
                  <?
		$ta = $db->count_records("gf_start", "status=0");
		echo $ta;
		
		?>
                   Jumlah Member PA </strong></div></td>
              </tr>
              <tr>
                <td><div align="center"></div>
                  </td>
              </tr>
            </table>
              <p>&nbsp;</p>
              <table width="234" border="0" align="center" cellpadding="3" cellspacing="3">
                <tr>
                  <td width="223" height="28"><div align="center">Omset PA Indonesia </div></td>
                </tr>
                <tr>
                  <td><h3 align="center"><strong>
                    <?= rupiah($db->omsetpari("('$dtfrom', 'Indonesia')")); ?>
                  </strong></h3></td>
                </tr>
                <tr>
                  <td><div align="center"><strong class="ssss">
                      <?
		$ta = $db->count_records("gf_start", "status=0 and negara='Indonesia'");
		echo $ta;
		
		?>
                    Jumlah Member PA </strong></div></td>
                </tr>
                <tr>
                  <td><div align="center"></div></td>
                </tr>
              </table>
              <p>&nbsp;</p>
              <table width="234" border="0" align="center" cellpadding="3" cellspacing="3">
                <tr>
                  <td width="223" height="28"><div align="center"> Omset PA Malaysia </div></td>
                </tr>
                <tr>
                  <td><h3 align="center"><strong>
                    <?= rupiah($db->omsetpakl("('$dtfrom' , negara='Malaysia')")); ?>
                  </strong></h3></td>
                </tr>
                <tr>
                  <td><div align="center"><strong class="ssss">
                      <?
		$ta = $db->count_records("gf_start", "status=0 and negara='Malaysia'");
		echo $ta;
		
		?>
                    Jumlah Member PA </strong></div></td>
                </tr>
                <tr>
                  <td><div align="center"></div></td>
                </tr>
              </table>
              <p>&nbsp;</p>
              <p>&nbsp;</p></td>
            </tr>
        </table></td>
        </tr>
    </table></td>
  </tr>
</table>
<p>&nbsp;</p>
<?
} else {
echo "<meta http-equiv=\"refresh\" content=\"1; url=illegal.html\">";
}
?>