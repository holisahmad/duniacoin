<?
	if($user_status > 0 ) {
?>
<style type="text/css">
body,td,th {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 12px;
}
</style>

<table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="800" border="0" cellspacing="2" cellpadding="2">
      <tr>
        <td colspan="5"><strong>Fund History</strong></td>
        </tr>
      <tr>
        <td width="129">&nbsp;</td>
        <td width="234">&nbsp;</td>
        <td width="48">&nbsp;</td>
        <td width="137">&nbsp;</td>
        <td width="220">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>
<?
} else {
echo "<meta http-equiv=\"refresh\" content=\"1; url=illegal.html\">";
}
?>
