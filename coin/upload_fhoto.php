<?
	if($user_status > 0 ) {
?>
<style type="text/css">
body,td,th {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 12px;
}
</style>
 <?
switch ($page) {
	default :
?>
<form action="?e=upload_fhoto&page=submit" method="post" enctype="multipart/form-data" name="form1">

<table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="800" border="0" cellspacing="2" cellpadding="2">
      <tr>
        <td width="164"><strong>Change FHOTO</strong></td>
        <td width="282">&nbsp;</td>
        <td width="30">&nbsp;</td>
        <td width="77">&nbsp;</td>
        <td width="215">&nbsp;</td>
      </tr>
      <tr>
        <td>Your Fhoto Profile</td>
        <td><? $myfoto = $db->dataku("foto", $user_session);
		if($myfoto<>""){
			$fotoku="<img src='../foto_profile/$myfoto' width='80' height='100' border='0' />";
		} else {
			$fotoku="<img src='../foto_profile/no_photo.jpg' width='80' height='100' border='0' />";
		}
		echo $fotoku;
		 ?></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Change Fhoto</td>
        <td>:
  <input name="file" type="file" class="form" id="file"></td><td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Your Token </td>
        <td>: 
          <input name="pin" type="password" id="pin" value="" size="10" /></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;&nbsp;<input type="submit" name="Submit" value="UPLOAD FOTO" class="tombol"></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        
      </tr>
    </table></td>
  </tr>
</table>
<?

	?>
    
    <?
	if($page == "submit") {
	$mypin=$db->dataku("pin", $user_session);
	if($mypin<>$pin){
		echo "<center><font color='#FF0000'><br>Maaf PIN yang Anda Masukan Tidak Sesuai</font></center>";
		echo "<meta http-equiv=\"refresh\" content=\"2; url=?e=upload_fhoto\">";
	} else {
$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 20000000)
&& in_array($extension, $allowedExts))
  {
move_uploaded_file($_FILES["file"]["tmp_name"],
      "../foto_profile/" . $_FILES["file"]["name"]);
	  $img1_name=$_FILES["file"]["name"];
	  
	  $myquery=mysql_query("UPDATE member SET foto='$img1_name' WHERE username='$user_session'");
	echo "<p align=center><strong>Foto telah berhasil di-upload.</strong></p>";
	echo "<meta http-equiv=\"refresh\" content=\"2; url=?e=upload_fhoto\">";
}
else
  {
  echo "<p>&nbsp;</p><p align=center style='color:red'><b>File harus berupa file image (jpg, gif atau png)</b></p>";
  }
  }	
?>
</form>
<?
	}
	break;
}
?>
<?
} else {
echo "<meta http-equiv=\"refresh\" content=\"1; url=illegal.html\">";
}
?>
