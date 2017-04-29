<?
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
<script type="text/javascript">
<!--
function confirmation(noid) {
	var answer = confirm("Are You sure to delete this news ?")
	if (answer){
		//alert("Bye bye!")
		window.location = "?m=berita&page=delete&no=" + noid;
		
	}
	
}
//-->
</script>
<style type="text/css">
<!--
.style1 {font-size: x-small}
.style3 {color: #FF0000}
.style5 {
	color: #99CC00;
	font-weight: bold;
}
.style13 {color: #666666}
.style14 {font-size: x-small; color: #666666; }
-->
</style>

<h2><img src="images/icon-48-user.png" width="48" height="48" align="absmiddle" />News 
  Manager</h2>
<div id="menu_button2"> 
  <ul>
    <li><a href="?m=berita&amp;page=addnew">Add News</a><a href="?m=newssilver"></a></li>
  </ul>
</div>

<?
switch($page) {
	default :
?>
<?
//---pagination----------------
$limit = '50'; // How many results should be shown at a time
$scroll = '0'; // Do you want the scroll function to be on (1 = YES, 2 = NO)
$scrollnumber = '50'; // How many elements to the record bar are shown at a time when the scroll function is on
//-------------pagination--------------
if (!isset ($_GET['show'])) {

	$display = 1;
	
} else {

	$display = $_GET['show'];
	
}
$start = (($display * $limit) - $limit);


//if($uidm == 001) {

//$db->select("*", "member", $kat);

	$numrows = $db->count_records("berita", $filter);	
	//$db->select("no, userid, nama, kota, testimoni, foto, published, tgl", "newssilver", "userid='$user_session'", "tgl DESC");
	$db->select("id_berita, id_user, judul, isi_berita, gambar, tanggal, counter, published", "berita", "", "id_berita desc");
?>
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  
  <tr class="tbl_header">
    <td width="4%" align="center">#</td>
    <td width="16%" align="center">Username</td>
    <td width="13%" align="center">Tgl</td>
    <td width="51%" align="center">Judul Berita</td>
    <td width="7%" align="center">Published</td>
    <td width="9%" align="center">Delete</td>
  </tr>
<?


$j=$db->num_rows();
for($i=0;$i<$j;$i++) {
	$nom = $i + 1;
	$lid = $i - 1;
	if(is_odd($i) == 0) {
		$class = "tblrow_ganjil";
	} else {
		$class = "tblrow_genap";
	} 	
	if($db->result($i, "published") > 0) {
		$img = "<a href='?m=berita&page=publish&pub=0&no=".$db->result($i, "id_berita")."'><img src='images/tick.png' border=0 title='Click to Unpublish'></a>";
	} else {
		$img = "<a href='?m=berita&page=publish&pub=1&no=".$db->result($i, "id_berita")."'><img src='images/publish_x.png' border=0 title='Click to Publish'></a>";
	} 	
?>
 
  <tr class="<?= $class; ?>">
    <td width="4%" valign="top"><?= $nom; ?> </td>
    <td width="16%" valign="top"><?= $db->result($i, "id_user"); ?></td> 
    <td align="center" valign="top"><?= $db->result($i, "tanggal"); ?></td>
    <td valign="top"><a href="?m=berita&page=addnew&edit=1&no=<?= $db->result($i, "id_berita"); ?>"><?= $db->result($i, "judul"); ?></a></td>
   
    <td align="center" valign="top">
    
    
   <?= $img; ?></td>
    <td valign="top"><div id="delete"><a href="#" onclick='confirmation(<?= $db->result($i, "id_berita"); ?>)' style='cursor:hand; padding-left:15px'>Delete</a></div></td>
  </tr>
<?
	}
?>	  
</table>
<br />
<table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td align="center">
     <?php

//}
//

$paging = ceil ($numrows / $limit);

// Display the navigation
if ($display > 1) {
	
	$previous = $display - 1;
	
?>
  <a href="?m=berita&kat=<?= $kat; ?>&show=1" style="font-size:10px; color:#0000CC"><< Awal </a> | <a href="?m=berita&kat=<?= $kat; ?>&show=<?= $previous; ?>" style="font-size:10px; color:#0000CC">< Sebelumnya </a> |
  <?php

}

if ($numrows != $limit) {
	
	if ($scroll == 1) {
	
		if ($paging > $scrollnumber) {
			
			$first = $display;
			
			$last = ($scrollnumber - 1) + $display;
			
		}
	
	} else {
	
		$first = 1;
			
		$last = $paging;
			
	}
	
	if ($last > $paging ) {
			
		$first = $paging - ($scrollnumber - 1);
			
		$last = $paging;
			
	}
	
	for ($i = $first;$i <= $last;$i++){
		
		if ($display == $i) {
			
?>
[ <b>
<?= $i ?>
</b> ]
<?php
			
		} else {
			
?>
[ <a href="?m=berita&kat=<?= $kat; ?>&show=<?= $i; ?>" style="font-size:10px; color:#0000CC">
<?= $i; ?>
</a> ]
<?php
		
		}
	
	}

}

if ($display < $paging) {

	$next = $display + 1;
	
?>
| <a href="?m=berita&kat=<?= $kat; ?>&show=<?= $next; ?>" style="font-size:10px; color:#0000CC">Selanjutnya ></a> | <a href="?m=berita&kat=<?= $kat; ?>&show=<?= $paging; ?>" style="font-size:10px; color:#0000CC">Terakhir >></a>
<?php

}
//
?>
    </td>
  </tr>
</table>
<p>&nbsp;</p>
<?
	break;
	case addnew :
	if($edit > 0) {
	$db->select("id_berita, id_user, judul, isi_berita, gambar, tanggal, counter, published", "berita", "id_berita='$no'");
		//$db->select("no, userid, nama, kota, testimoni, foto, published, tgl, judul, website, email, hp, company, tayang", "newssilver", "no=$no");
		$no = $db->result(0, "id_berita");
		$foto = $db->result(0, "gambar");
		$isi = $db->result(0, "isi_berita");
		$judul = $db->result(0, "judul");
		$userid = $db->result(0, "id_user");
		
	} else {
		$foto = "";
		$isi = "";
		$judul ="";
	}	
	
?>
<form action="?m=berita&amp;page=submit" method="post" enctype="multipart/form-data">
  <div align="center">
    <center>
      <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="100%" id="AutoNumber1" bordercolor="#EDEDE9">
        <tr class="tbl_header">
          <td width="100%" align="center"><?
		  if($act == 1 or $act) {
?>
<div id="notice"><img src="images/notice-info.png" width="29" height="29" align="absmiddle" />Data telah berhasil diupdate ! </div>
	        <?
	}
	?>
            <b><font face="Arial">Input Postingan</font></b></td>
        </tr>
        <tr>
          <td width="100%" style="border-style: none; border-width: medium"><div align="center">
              <table width="100%" border="0" cellspacing="0" cellpadding="1">
                <tr> 
                  <td align="left"><div align="left"></div></td>
                </tr>
                <tr> 
                  <td align="left">
<p align="center" class="style5">Form Pengisian Berita<font color="#00CC00" size="2" face="Tahoma, Arial, Helvetica, sans-serif"><strong> 
                      </strong> </font> </p>
                    </td>
                </tr>
                <tr bgcolor="#FF9933"> 
                  <td align="left"><div align="center"><font color="#000000" size="2"><strong>JUDUL</strong></font></div></td>
                </tr>
                <tr> 
                  <td align="left"><div align="center"><span class="style5">Judul 
                      Berita : </span><span class="style3">*</span> 
                      <input name="userid" type="hidden" class="form" id="userid" value="<?= $userid; ?>" size="75" />
                      <input name="edit" type="hidden" id="edit" value="<?= $edit; ?>" />
                      <input name="no" type="hidden" class="form" id="no" value="<?= $no; ?>" size="10" />
                    </div></td>
                </tr>
                <tr> 
                  <td height="7" align="center"><textarea name="judul" cols="50" rows="2" class="form"><?= $judul; ?></textarea></td>
                </tr>
                <tr> 
                  <td align="left"><div align="center" class="style14">Judul posting 
                      anda, maksimal 255 karakter</div></td>
                </tr>
                <tr bgcolor="#FF9933"> 
                  <td align="left"><div align="center"><font color="#000000" size="2"><strong>ISI 
                      BERITA </strong></font></div></td>
                </tr>
                <tr> 
                  <td align="left"><div align="center"><span class="style5"><strong>Isi 
                      Berita:</strong></span> <span class="style3">*</span> </div></td>
                </tr>
                <tr> 
                  <td align="center"><textarea name="testi" cols="50" rows="15" class="form" id="testi"><?= $isi; ?></textarea></td>
                </tr>
                <tr> 
                  <td align="center"><div align="center" class="style14">Isi berita, 
                      maksimal unlimited karakter</div></td>
                </tr>
                <tr> 
                  <td align="center">&nbsp;</td>
                </tr>
                <tr> 
                  <td align="center"><div align="center" class="style5">Gambar 
                      : </div></td>
                </tr>
                <tr> 
                  <td align="center"><div align="center"> 
                      <label> 
                      <?
		  	if($foto <> "") {
		?>
                      <img src="../foto_berita/<?= $foto; ?>" alt="<?= $judul; ?>" /><br />
                      <?
		 }
		 ?>
                      <input name="img1" type="file" id="img1" size="20" class="form" />
                      </label>
                      <input name="foto" type="hidden" class="form" id="foto" value="<?= $foto; ?>" size="12" />
                    </div></td>
                </tr>
                <tr> 
                  <td align="left"><div align="center" class="style1 style13">Upload 
                      gambar baru anda (hanya JPG)<br>
                      Ukuran maksimal 100KB, dimensi lebar maksimal 475 pixels, 
                      tinggi maksimal 1000 pixels</div></td>
                </tr>
                <tr> 
                  <td align="left">&nbsp;</td>
                </tr>
                <tr> 
                  <td align="left">&nbsp;</td>
                </tr>
                <tr> 
                  <td align="left"><div align="center"> 
                      <label> 
                      <input name="Submit" type="submit" class="button"  value="SAVE" />
                      </label>
                      <label> 
                      <input type="button" name="cancel" id="cancel" value="CANCEL" onclick="javascript:history.go(-1)" class="cancelbutton" />
                      </label>
                  </div></td>
                </tr>
              </table>
          </div></td>
        </tr>
      </table>
    </center>
  </div>
</form>
<?	
	break;
	
	case submit :
	function getFileExtension($filename){
  return substr($filename, strrpos($filename, '.'));
}
if(getFileExtension($img1_name) == ".php" or getFileExtension($img1_name) == ".PHP" or getFileExtension($img1_name) == ".php4" or getFileExtension($img1_name) == ".PHP4" or getFileExtension($img1_name) == ".php5" or getFileExtension($img1_name) == ".PHP5" or getFileExtension($img1_name) == ".exe" or getFileExtension($img1_name) == ".EXE "or getFileExtension($img1_name) == ".htm" or getFileExtension($img1_name) == ".HTM" or getFileExtension($img1_name) == ".html" or getFileExtension($img1_name) == ".HTML" or getFileExtension($img1_name) == ".bat" or getFileExtension($img1_name) == ".BAT") {
		echo "<p>&nbsp;</p><p align=center style='color:red'><b>File harus berupa file image (jpg, gif atau png)</b></p>";
		
	} else {
	//---------upload foto
		if($img1 <> "") {
			$foto = $img1_name;
			$file = "../foto_berita/$img1_name";
			@copy("$img1" , $file);
			//$ukr2=getimagesize("../images/$img1_name");
					//	$w2=$ukr2[0];
					//	$h2=$ukr2[1];
		} else {
			$foto = $foto2;
		}	
		//$nama = $db->dataku("nama", $userid);
		if($edit > 0) {
				$tgl_sekarang = date("Y-m-d");
				$jam_sekarang = date("H:i:s");
				$clientdate = date("Y-m-d H:i:s");
				if (empty($img1)) {
				$db->update("berita", "isi_berita='$testi', judul='$judul', tanggal='$clientdate'", "id_berita='$no'");
				echo "<meta http-equiv='refresh' content='0;URL=?m=berita'>";
				} else {
				$db->update("berita", "isi_berita='$testi', judul='$judul', tanggal='$clientdate', gambar='$foto'", "id_berita='$no'");
				echo "<meta http-equiv='refresh' content='0;URL=?m=berita'>";
				}
			} else {
				$clientdate = date("Y-m-d H:i:s");
				$db->insert("berita", "", "'', 'admin', '$judul', '$testi', '$foto', '$clientdate', 0, 0");
				
				echo "<meta http-equiv='refresh' content='0;URL=?m=berita'>";
			}
			}

		break;
		
		case publish :
		$db->update("berita", "published='$pub'", "id_berita='$no'");
		echo "<meta http-equiv='refresh' content='0;URL=?m=berita'>";
	break;
	case delete :
		//echo "delete no $no";
		$db->delete("berita", "id_berita=$no");
		echo "<meta http-equiv='refresh' content='0;URL=?m=berita'>";
	break;	
}		
?>

<?
} else {
echo "<meta http-equiv=\"refresh\" content=\"1; url=illegal.html\">";
}
?>