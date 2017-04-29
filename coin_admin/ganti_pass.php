<?php
if(isset( $_SESSION['valid_admin'])) {
$valid_admin=$_SESSION['valid_admin'];
?>

<?
//*********************************************************************************
// Original Script By : Budi Haeruman, S.Pd Di Jual melalui http://anekascript.us
// Please Call / SMS : 081323779601 (budihaeruman@ymail.com)
// Juga Menerima Jasa Pembuatan Website Bisnis
//*********************************************************************************
?>
<title>Ganti Password - Admin</title>
<?
if($page == "ganti") {

?>
<style type="text/css">
<!--
.style1 {
	font-size: 10px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	color: #FF0000;
}
-->
</style>
<table width="99%" border="0" align="center" cellpadding="2" cellspacing="1">
  <tr>
    <td height="30" bgcolor="#999999"><div align="center"><span class="title">&nbsp;&nbsp;<strong>Ganti Password  Admin</strong><u></u></span></div></td>
  </tr>
  <tr>
    <td><p>&nbsp;</p>
      <table width="90%" border="0" align="center" cellpadding="3" cellspacing="1" class="kotak">
        <tr>
          <td align="center"><b>Ganti Password</b></td>
        </tr>
        <tr>
          <td><form method="post" action="?m=changepass&page=send">
              <table border="0" align="center" class="bodytext">
                <tr>
                  <td>Masukkan password baru</td>
                  <td>:</td>
                  <td><input type="password" name="password1" class="form2"></td>
                </tr>
                <tr>
                  <td>Masukkan kembali password baru</td>
                  <td>:</td>
                  <td><input type="password" name="password2" class="form2"></td>
                </tr>
              </table>
              <div align="center">
                <p> 
                  <input type="submit" name="Submit" value=" GANTI PASSWORD " class="tombol2">
                </p>
                </div>
          </form></td>
        </tr>
        <tr>
          <td><div align="center" class="style1"></div></td>
        </tr>
      </table>
      <p>&nbsp;</p>
      <?
}

if($page == "send") {
if($password1 <> $password2)
			{
				//include "html_opening.html";
				?>
      <table width="90%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#EAE9FE" class="kotak">
        <tr>
          <td><b>Ganti Password</b></td>
        </tr>
        <tr>
          <td align="center" style="font-weight:bold; color:#FF0000">Kedua password harus sama!. Tekan tombol <b>BACK</b> pada browser Anda.</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
      </table>
	 <? } elseif(!$password1 or !$password2)
			{
				//include "html_opening.html";
				?>
				<table width="90%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#EAE9FE" class="kotak">
        <tr>
          <td><b>Ganti Password</b></td>
        </tr>
        <tr>
          <td align="center" style="font-weight:bold; color:#FF0000">Password Tidak Boleh Kosong!. Tekan tombol <b>BACK</b> pada browser Anda.</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
      </table>
				
      <?php
				//include "html_closing.html";
			}
			else
			{
				$pswd=($password1);
				$db->update("admin", "pass='$pswd'", "userid='$valid_admin'");
			
				
				//include "html_opening.html";
				?>
      <table width="90%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#EAE9FE" class="kotak">
        <tr>
          <td><b>Ganti Password</b></td>
        </tr>
        <tr>
          <td align="center" style="font-weight:bold; color:#FF0000">Password Anda sudah diganti. Gunakan password baru anda untuk login selanjutnya.</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
      </table>
      <?php
				//include "html_closing.html";
			}
}
?>
      <p align="center">&nbsp;</p>
    <p></p></td>
  </tr>
</table>
<?
} else {
echo "<meta http-equiv=\"refresh\" content=\"1; url=illegal.html\">";
}
?>