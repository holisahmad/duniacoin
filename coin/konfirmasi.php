 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script>
  $(function() {
  
  $( "#datepicker" ).datepicker({dateFormat: "yy-mm-dd"});
   
  });
  </script>

  <?php 
  			 $db->select("*", "konfirmasi", "username='$user_session' and status='0'");
 			 $chkd_user = $db->num_rows();
			
			if ($chkd_user == 0 ) {
  
  ?>
  
<div id="module">
  <table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="10">&nbsp;</td>
      <td><p align="left"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
        <?
		  
switch ($page) {
	default :	
			
		
			
?>
      </font></p>
        <form action="?e=konfirmasi&page=submit" method="post" enctype="multipart/form-data" name="form1">
          <table width="90%" border="0" align="center" cellpadding="2" cellspacing="1">
            <tr>
              <td width="37%" align="right" valign="top">&nbsp;</td>
              <td width="63%">&nbsp;</td>
            </tr>
			
			 <tr>
              <td align="right" valign="top"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Nominal :</font></td>
              <td><?php  
			 
			  $db->select("*", "order_aktivasi", "username='$user_session' and status='0'");
			   $total = $db->result($i, "total");
			  $totalrp = rupiah2($total);
			  echo $totalrp;
			  
			  ?>
                <input name="nominal" type="hidden" id="nominal" value="<?= $total; ?>" />			  </td>
            </tr>
			
			
			 <tr>
              <td align="right" valign="top"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Nama Pengirim  :</font></td>
               <td><input name="clientdate2" type="text" class="form" id="mid"  size="20" /></td>
            </tr>
			 <tr>
              <td align="right" valign="top"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Bank  :</font></td>
              <td><select name="bank" id="bank">
                <option value="Bca" selected="selected">Bca</option>
                <option value="Bca">Mandiri</option>
              </select></td>
            </tr>
			
            <tr>
              <td align="right" valign="top"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Tanggal Transfer :</font></td>
              <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
                <input name="tanggal" type="text" class="form" id="datepicker"  size="15" />
              </font></td>
            </tr>
            <tr>
              <td align="right">Berita : </td>
              <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
                <textarea name="berita" type="text" class="form" id="berita"  size="50"></textarea>
                <label></label>
              </font></td>
            </tr>
            <tr>
              <td align="center" valign="top">&nbsp;</td>
              <td valign="top"><p><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
                  <input type="submit" name="Submit" value="KONFIRMASI" class="tombol" />
                </font></p>
                  <p>&nbsp;</p></td>
            </tr>
          </table>
        </form>        <p align="left"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">



<?php



break;
	
case submit :
if($page == "submit") {

$db->insert("konfirmasi", "", "'', '$user_session', '$tanggal', '$mid', '$bank', '$nominal', '$berita','0'");
		
$nohp  = "082260285259";
$nominalx = rupiah2 ($nominal) ;

$message= "Silahkan Cek Transferan ke ".$bank." an ".$mid." untuk user ".$user_session ." nominal ".$nominalx." Terima Kasih.";

$db->smsnotifikasi($nohp, $message) ;



}		
?>

        </font></p>
        <p align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Konfirmasi Transfer Anda berhasil di Kirimkan. </strong></font></p>
        <p align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Silahkan Tunggu Beberapa Saat Lagi <br />
        </strong></font><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong><br>
        Terima kasih</strong></font></p>
        <p align="center">&nbsp;</p>
      </td>
      <td width="10">&nbsp;</td>
    </tr>
  </table>

  
  <h3 align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
  </font></h3>
</div>
<?php
} }else { 
?>
<div align="center" class="style11111">
 </p>
        <p align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Konfirmasi Anda Sudah Kami Terima Dan akan Segera diProses . </strong></p>
</div>
<?php
}
?>