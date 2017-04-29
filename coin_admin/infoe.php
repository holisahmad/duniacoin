<title>Mail Sender</title>
<?
//---------- free member-------------
$sfm="SELECT username FROM member WHERE status='0'";
$mqry=mysql_query($sfm);
$j_fm=mysql_num_rows($mqry);

//---------- member biasa-------------
$sbm="SELECT username FROM member WHERE status='1'";
$bqry=mysql_query($sbm);
$j_bm=mysql_num_rows($bqry);
//---------- xtra member-------------
$xfm="SELECT username FROM member WHERE status='2'";
$xqry=mysql_query($xfm);
$j_xm=mysql_num_rows($xqry);
$tot_mbr = $j_fm + $j_bm + $j_xm;

//--------newest member-------------
$nbr="SELECT username FROM member ORDER BY id DESC limit 1";
$dqr=mysql_query($nbr);
$new=mysql_fetch_array($dqr);

$emailadmin = $db->config("email");
?>
<style type="text/css">
<!--
.style1 {
	font-size: 18px;
	font-family: Georgia, "Times New Roman", Times, serif;
}
.style2 {
	font-size: 11px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
.style3 {font-size: 11px}
.style4 {font-family: Verdana, Arial, Helvetica, sans-serif}
-->
</style>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="3" height="43"><p align="center" class="title style1"><strong><u>Kirim E-mail Massal</u></strong></p></td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#CCCCCC"></td>
  </tr>
  <tr>
    <td width="1" rowspan="3" bgcolor="#FFFFFF"></td>
    <td width="956" height="3" bgcolor="#EF9400"></td>
    <td width="1" rowspan="3" bgcolor="#FFFFFF"></td>
  </tr>
  <tr>
    <td valign="top">
<?
switch($page) {
	default :
?>	
	<blockquote>
	  <p class="style2">Halaman ini digunakan untuk mengirimkan informasi kepada  free member, active member atau kepada semuanya secara sekaligus.<br />
	    Hati-hati pada penggunaan fasilitas kirim email massal ini. Cukup sekali saja klik tombol <strong>KIRIM EMAIL</strong> karena jika terlalu sering maka akan dianggap <strong>SPAM</strong>.</p>
	  </blockquote>	
	<form name="form1" method="post" action="?m=mailmass&page=kirim">
        <table width="100%" border="0" align="center" cellpadding="2" cellspacing="1">
          <tr>
            <td width="32%" align="right"><span class="style2">Ditujukan ke : </span></td>
            <td width="68%"><span class="style2">
              <label>
            <?
	if($tujuan <> "") {
	?>
            <input name="tujuan" type="text" class="form" id="tujuan" value="<?= $tujuan; ?>" size="20">
            <?
	} else {
	?>
            <select name="tujuan" id="tujuan" class="form">
                <option value="0">-- Silahkan Pilih --</option>
               
              <option value="2">Free Member</option>
                <option value="3">Paid Member</option>
                <option value="4">Semuanya</option>
            </select>
            <?
	}
	?>
              </label>
            </span></td>
          </tr>
          <tr>
            <td align="right"><span class="style2">Subjek : </span></td>
            <td><input name="subjek" type="text" class="form " id="subjek" size="50"></td>
          </tr>
          <tr>
            <td align="right" valign="top"><span class="style2">Isi Pesan : </span></td>
            <td><textarea name="pesan" cols="50" rows="8" class="form style3 style4" id="pesan"></textarea></td>
          </tr>
          <tr>
            <td valign="top">&nbsp;</td>
            <td>
              <label>
              <input type="submit" name="Submit" value="KIRIM EMAIL" class="tombol">
              </label>
            </td>
          </tr>
        </table>
      </form>

<?
	break;
	
	case kirim :
	$domain=$db->config("domain");
	if($tujuan == 0 or $pesan == "") {
		echo "<p align=center><b>Kepada siapa informasi ini akan dikirimkan dan apa pesannya?<br>Klik BACK untuk mengulang!</b></p>";
	} else {
		
		if($tujuan == 2) {
			$sql=mysql_query("SELECT nama, email FROM member WHERE status=0");
		}	
		//-------paid member------
		if($tujuan == 3) {
			$sql=mysql_query("SELECT nama, email FROM member WHERE status=1");
		}	
		//------semua----------
		if($tujuan == 4) {
			$sql=mysql_query("SELECT nama, email FROM member");
		}
		$cek=mysql_num_rows($sql);
		//for($i=0;$i<$cek;$i++) {
		$headers="From: Admin $domain<$emailadmin>\nX-Sender: $emailadmin\n";
		while($data=mysql_fetch_row($sql)) {
			$email = $data[1];
			$nama = $data[0];
			@mail($email, $subjek, $pesan, $headers); 
		}
		echo "<p align=center><b>Informasi telah berhasil dikirimkan!</b></p>";
	}
	break;
}
?>		  
    </td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td colspan="3" align="right">&nbsp;</td>
  </tr>
</table>
