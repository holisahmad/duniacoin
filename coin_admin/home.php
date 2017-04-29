<?PHP

if(isset( $_SESSION['valid_admin']))

  {

?>

<?
//*********************************************************************************
// Original Script By : Budi Haeruman, S.Pd Di Jual melalui http://anekascript.us
// Please Call / SMS : 081323779601 (budihaeruman@ymail.com)
// Juga Menerima Jasa Pembuatan Website Bisnis
//*********************************************************************************
?>
<table width="100%" border="0" cellspacing="1" cellpadding="4">
  <tr>
    <td width="63%" valign="top"><table width="100%" border="0" cellspacing="4" cellpadding="2">
      <tr>
        <td width="25%" align="center"><a href="?m=berita&amp;page=addnew"><img src="images/icon-48-article-add.png" alt="Add Article" width="48" height="48"><br>
          Tambah Berita </a></td>
        <td width="25%" align="center"><a href="?m=berita"><img src="images/icon-48-article.png" alt="Article Manager" width="48" height="48"><br> 
        Edit Berita
</a></td>
        <td width="25%" align="center"><a href="?m=mailmass"><img src="images/icon-48-section.png" alt="Section Manager" width="48" height="48"><br> 
          Mail Manajer
</a></td>
        </tr>
      <tr>
        <td align="center"><a href="?m=member"><img src="images/icon-48-user.png" alt="User Manager" width="48" height="48"><br>
          Member Manager</a></td>
        <td align="center"><a href="?m=testimonial"><img src="images/icon-48-media.png" alt="Product Manager" width="48" height="48"><br>
          Testimonial Manager</a></td>
          <td align="center"><a href="?m=configuration"><img src="images/icon-48-config.png" alt="Configuration" width="48" height="48" /><br />
            Configuration</a></td>
        </tr>
    </table>
     
    <p>&nbsp;</p></td>
    <td width="37%" valign="top"><div id="modul_admin">
    <h3>Selamat  Datang  <?php echo $_SESSION[userid] ?>di Admin Area</h3>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td colspan="2" align="center"><strong>STATISTIK</strong></td>
        </tr>
      <tr>
        <td width="44%" align="right">Jumlah Member : </td>
        <td width="56%"><?
		$ta = $db->count_records("member", "status=1");
		echo $ta;
		
		?></td>
      </tr>
      <tr>
        <td align="right"> Member Terbaru : </td>
        <td>
		<?
		$db->select("nama, username", "member", "status=1", "id DESC");
		if($db->num_rows() > 0) {
		echo "<a href='?m=member&page=addnew&edit=1&mid=".$db->result(0, "username")."'>".$db->result(0, "nama")." (".$db->result(0, "username").")</a>";
		}
		?>		</td>
      </tr>
	  <tr>
        <td width="44%" align="right">&nbsp;</td>
        <td width="56%">&nbsp;</td>
      </tr>
      <tr>
        <td align="right">Pembayaran</td>
        <td><?= rupiah($db->bayarbonus("$tgl")); ?> </td>
      </tr>
      <tr>
        <td align="right">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
        <tr>

        <td align="right">&nbsp;</td>

        <td>&nbsp;</td>
      </tr>

      <tr>

        <td align="right">&nbsp;</td>

        <td>&nbsp;</td>
      </tr>
    </table>
    </div></td>
  </tr>
</table>
<?
} else {
echo "<meta http-equiv=\"refresh\" content=\"1; url=illegal.html\">";
}
?>