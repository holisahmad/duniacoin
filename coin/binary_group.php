<?
	if($user_status > 0 ) {
?>
<?
switch($page) {
	default :
	$awal = $user_session;
	if(!$mid) {
		$mid = $user_session;
	} else {		
	}
	
	
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
        <td align="center">My Binary Omzet Group</td>
      </tr>
      <tr>
        <td align="center"><hr /></td>
      </tr>
      <tr>
        <td align="center"><strong>Jaringan (<span style="color: rgb(255, 0, 0);">
          <?= $mid; ?>
        </span>)<br />
Sponsor (<span style="color: rgb(255, 0, 0);">
<?= $db->dataku("sponsor", $mid); ?>
</span>)</strong></td>
      </tr>
      <tr>
        <td align="center"><hr /></td>
      </tr>
      <tr>
        <td align="center"><strong>upline<br />
          (<span style="color: rgb(255, 0, 0);">
          <?= $db->dataupline("upline0", $mid); ?>
          </span>)</strong></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><br>
      </tr>
      <tr>
        <td height="514" align="center" valign="top" background="images/arow2.png"><table width="800" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="158" align="center" valign="top">
<?
$myfoto = $db->dataku("foto", $mid);
if($myfoto<>""){
			$fotoku ="../foto_profile/".$db->dataku("foto", $mid)."";
		} else {
			$fotoku="../foto_profile/no_photo.png";
			
		}
$sql=mysql_query("select * from omzet where username='$mid'");
			$jkiri=0;
			$jkanan=0;
			while($row=mysql_fetch_row($sql)) {
			$jkiri = $jkiri + $row[2];
			$jkanan = $jkanan + $row[3];
			}
$sql2=mysql_query("select * from omzet where username='$mid'");
			$allkiri=0;
			$allkanan=0;
			while($row=mysql_fetch_row($sql2)) {
			$allkiri = $allkiri + $row[4];
			$allkanan = $allkanan + $row[5];
			}
?>
              <a href="#" title="<?= $db->dataku("nama", $mid); ?> <?= $db->dataku("kota", $mid); ?>">
              <table  cellpadding="0" cellspacing="0">
                <tbody>
                  <tr>
                    <td align="center" height="75" width="75"><img src="<?= $fotoku; ?>" title="<?= $db->dataku("username", $mid); ?> - <?= $db->dataku("nama", $mid); ?> - <?= $db->dataku("kota", $mid); ?> - <?= $db->dataku("tgl_daftar", $mid); ?>" border="0" height="75" width="75" /></td>
                  </tr>
                </tbody>
              </table>
              </a> <span style="font-size: 9px;">
              <?= potong($jkiri); ?>
|
<?= potong($jkanan); ?>
              </span><br />
              <span style="font-size: 9px;"><a href="#"><strong>
              <?= $mid; ?></strong></a><br /><?= potong($allkiri); ?> | <?= potong($allkanan); ?>
              </span></td>
          </tr>
          <tr>
            <td height="52"><table width="800" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="173">&nbsp;</td>
                <td width="130" align="center"><?
   $db->select("kiri, kanan", "upline", "username='$mid'");
   		$idki = $db->result(0, "kiri");
		$naki = $db->dataku("nama", $idki);
		$kotaki = $db->dataku("kota", $idki);
		$tglki = $db->dataku("tgl_daftar", $idki);
		 if(!$db->dataku("foto", $idki)) {
			$foto = "../foto_profile/no_photo.png";
		} else {
			$foto =	"../foto_profile/".$db->dataku("foto", $idki);
		}	
		
$sql=mysql_query("select * from omzet where username='$idki'");
			$jkiri=0;
			$jkanan=0;
			while($row=mysql_fetch_row($sql)) {
			$jkiri = $jkiri + $row[2];
			$jkanan = $jkanan + $row[3];
			}
$sql2=mysql_query("select * from omzet where username='$idki'");
			$allkiri=0;
			$allkanan=0;
			while($row=mysql_fetch_row($sql2)) {
			$allkiri = $allkiri + $row[4];
			$allkanan = $allkanan + $row[5];
			}
		
   if($idki) {
   		
   		$kiri = "<a href='?e=binary_group&mid=$idki' title='$idki - $naki - $kotaki - $tglki'><table class='tbl03' cellpadding='0' cellspacing='0'><tbody><tr><td align='center' height='75' width='75'><img src='$foto'  border='0' height='75' width='75' style='padding-top:2px'></td></tr></tbody></table></a><span style='font-size: 9px;'>".potong($jkiri)." | ".potong($jkanan)."</span><br><span style='font-size: 9px;'><a href='?e=binary_group&mid=$idki'><strong>$idki</strong></a><br>".potong($allkiri)." | ".potong($allkanan)."</span>";
   } else {
   		$kiri = "<span style='font-size: 9px;'><a href='?e=join&up=$mid&posisi=KIRI''><strong><img src='images/kosong.png' width='72' height='72' /></strong></a></span>";
		
   }
   echo $kiri;
   $kosong = "";
   ?></td>
                <td width="176">&nbsp;</td>
                <td width="150" align="center"><?
   $db->select("kiri, kanan", "upline", "username='$mid'");
   		$idka = $db->result(0, "kanan");
		$naka = $db->dataku("nama", $idka);
		$kotaka = $db->dataku("kota", $idka);
		$tglka = $db->dataku("tgl_daftar", $idka);
		 if(!$db->dataku("foto", $idka)) {
			$foto = "../foto_profile/no_photo.png";
		} else {
			$foto =	"../foto_profile/".$db->dataku("foto", $idka);
		}	
		
$sql=mysql_query("select * from omzet where username='$idka'");
			$jkiri=0;
			$jkanan=0;
			while($row=mysql_fetch_row($sql)) {
			$jkiri = $jkiri + $row[2];
			$jkanan = $jkanan + $row[3];
			}
$sql2=mysql_query("select * from omzet where username='$idka'");
			$allkiri=0;
			$allkanan=0;
			while($row=mysql_fetch_row($sql2)) {
			$allkiri = $allkiri + $row[4];
			$allkanan = $allkanan + $row[5];
			}
		
   if($idka) {
   		
   		$kanan = "<a href='?e=binary_group&mid=$idka' title='$idka - $naka - $kotaka - $tglka'><table class='tbl03' cellpadding='0' cellspacing='0'><tbody><tr><td align='center' height='75' width='75'><img src='$foto'  border='0' height='75' width='75' style='padding-top:2px'></td></tr></tbody></table></a><span style='font-size: 9px;'>".potong($jkiri)." | ".potong($jkanan)."</span><br><span style='font-size: 9px;'><a href='?e=binary_group&mid=$idka'><strong>$idka</strong></a><br>".potong($allkiri)." | ".potong($allkanan)."</span>";
   } else {
   		$kanan = "<span style='font-size: 9px;'><a href='?e=join&up=$mid&posisi=KANAN''><strong><img src='images/kosong.png' width='72' height='72' /></strong></a></span>";
		
   }
   echo $kanan;
   $kosong = "";
   ?></td>
                <td width="171">&nbsp;</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="44">&nbsp;</td>
          </tr>
          <tr>
            <td height="71"><table width="800" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="102">&nbsp;</td>
                <td width="105" align="center"><?
   //----level 2 kiri---
   if(!$idki) {
   	echo $kosong;
	} else {
		$db->select("kiri, kanan", "upline", "username='$idki'");
		$idkia = $db->result(0, "kiri");
			$nakia = $db->dataku("nama", $idkia);
			$kotakia = $db->dataku("kota", $idkia);
			$tglkia = $db->dataku("tgl_daftar", $idkia);
		if(!$db->dataku("foto", $idkia)) {
			$foto = "../foto_profile/no_photo.png";
		} else {
			$foto =	"../foto_profile/".$db->dataku("foto", $idkia);
		}
			
$sql=mysql_query("select * from omzet where username='$idkia'");
			$jkiri=0;
			$jkanan=0;
			while($row=mysql_fetch_row($sql)) {
			$jkiri = $jkiri + $row[2];
			$jkanan = $jkanan + $row[3];
			}
$sql2=mysql_query("select * from omzet where username='$idkia'");
			$allkiri=0;
			$allkanan=0;
			while($row=mysql_fetch_row($sql2)) {
			$allkiri = $allkiri + $row[4];
			$allkanan = $allkanan + $row[5];
			}
	
	   if($idkia) {
   		
   		$kiria = "<a href='?e=binary_group&mid=$idkia' title='$idkia - $nakia - $kotakia - $tglkia'><table class='tbl03' cellpadding='0' cellspacing='0'><tbody><tr><td align='center' height='75' width='75'><img src='$foto'  border='0' height='75' width='75' style='padding-top:2px'></td></tr></tbody></table></a><span style='font-size: 9px;'>".potong($jkiri)." | ".potong($jkanan)."</span><br><span style='font-size: 9px;'><a href='?e=binary_group&mid=$idkia'><strong>$idkia</strong></a><br>".potong($allkiri)." | ".potong($allkanan)."</span>";
   } else {
   		$kiria = "<span style='font-size: 9px;'><a href='?e=join&up=$idki&posisi=KIRI''><strong><img src='images/kosong.png' width='72' height='72' /></strong></a></span>";
   }
   echo $kiria;
	}
   ?></td>
                <td width="51" align="center">&nbsp;</td>
                <td width="114" align="center"><?
   //----level 2 kiri---
   if(!$idki) {
   	echo $kosong;
	} else {
		$db->select("kiri, kanan", "upline", "username='$idki'");
		$idkib = $db->result(0, "kanan");
			$nakib = $db->dataku("nama", $idkib);
			$kotakib = $db->dataku("kota", $idkib);
			$tglkib = $db->dataku("tgl_daftar", $idkib);
		if(!$db->dataku("foto", $idkib)) {
			$foto = "../foto_profile/no_photo.png";
		} else {
			$foto =	"../foto_profile/".$db->dataku("foto", $idkib);
		}
			
$sql=mysql_query("select * from omzet where username='$idkib'");
			$jkiri=0;
			$jkanan=0;
			while($row=mysql_fetch_row($sql)) {
			$jkiri = $jkiri + $row[2];
			$jkanan = $jkanan + $row[3];
			}
$sql2=mysql_query("select * from omzet where username='$idkib'");
			$allkiri=0;
			$allkanan=0;
			while($row=mysql_fetch_row($sql2)) {
			$allkiri = $allkiri + $row[4];
			$allkanan = $allkanan + $row[5];
			}
	
	   if($idkib) {
   		
   		$kirib = "<a href='?e=binary_group&mid=$idkib' title='$idkib - $nakib - $kotakib - $tglkib'><table class='tbl03' cellpadding='0' cellspacing='0'><tbody><tr><td align='center' height='75' width='75'><img src='$foto'  border='0' height='75' width='75' style='padding-top:2px'></td></tr></tbody></table></a><span style='font-size: 9px;'>".potong($jkiri)." | ".potong($jkanan)."</span><br><span style='font-size: 9px;'><a href='?e=binary_group&mid=$idkib'><strong>$idkib</strong></a><br>".potong($allkiri)." | ".potong($allkanan)."</span>";
   } else {
   		$kirib = "<span style='font-size: 9px;'><a href='?e=join&up=$idki&posisi=KANAN''><strong><img src='images/kosong.png' width='72' height='72' /></strong></a></span>";
   }
   echo $kirib;
	}
   ?></td>
                <td width="49">&nbsp;</td>
                <td width="114" align="center"><?
   //----level 2 kanan---
   if(!$idka) {
   	echo $kosong;
	} else {
		$db->select("kiri, kanan", "upline", "username='$idka'");
		$idkaa = $db->result(0, "kiri");
			$nakaa = $db->dataku("nama", $idkaa);
			$kotakaa = $db->dataku("kota", $idkaa);
			$tglkaa = $db->dataku("tgl_daftar", $idkaa);
		if(!$db->dataku("foto", $idkaa)) {
			$foto = "../foto_profile/no_photo.png";
		} else {
			$foto =	"../foto_profile/".$db->dataku("foto", $idkaa);
		}
			
$sql=mysql_query("select * from omzet where username='$idkaa'");
			$jkiri=0;
			$jkanan=0;
			while($row=mysql_fetch_row($sql)) {
			$jkiri = $jkiri + $row[2];
			$jkanan = $jkanan + $row[3];
			}
$sql2=mysql_query("select * from omzet where username='$idkaa'");
			$allkiri=0;
			$allkanan=0;
			while($row=mysql_fetch_row($sql2)) {
			$allkiri = $allkiri + $row[4];
			$allkanan = $allkanan + $row[5];
			}
	
	   if($idkaa) {
   		
   		$kanana = "<a href='?e=binary_group&mid=$idkaa' title='$idkaa - $nakaa - $kotakaa - $tglkaa'><table class='tbl03' cellpadding='0' cellspacing='0'><tbody><tr><td align='center' height='75' width='75'><img src='$foto'  border='0' height='75' width='75' style='padding-top:2px'></td></tr></tbody></table></a><span style='font-size: 9px;'>".potong($jkiri)." | ".potong($jkanan)."</span><br><span style='font-size: 9px;'><a href='?e=binary_group&mid=$idkaa'><strong>$idkaa</strong></a><br>".potong($allkiri)." | ".potong($allkanan)."</span>";
   } else {
   		$kanana = "<span style='font-size: 9px;'><a href='?e=join&up=$idka&posisi=KIRI''><strong><img src='images/kosong.png' width='72' height='72' /></strong></a></span>";
   }
   echo $kanana;
	}
   ?></td>
                <td width="37">&nbsp;</td>
                <td width="131" align="center"><?
   //----level 2 kanan---
   if(!$idka) {
   	echo $kosong;
	} else {
		$db->select("kiri, kanan", "upline", "username='$idka'");
		$idkab = $db->result(0, "kanan");
			$nakab = $db->dataku("nama", $idkab);
			$kotakab = $db->dataku("kota", $idkab);
			$tglkab = $db->dataku("tgl_daftar", $idkab);
		if(!$db->dataku("foto", $idkab)) {
			$foto = "../foto_profile/no_photo.png";
		} else {
			$foto =	"../foto_profile/".$db->dataku("foto", $idkab);
		}
			
$sql=mysql_query("select * from omzet where username='$idkab'");
			$jkiri=0;
			$jkanan=0;
			while($row=mysql_fetch_row($sql)) {
			$jkiri = $jkiri + $row[2];
			$jkanan = $jkanan + $row[3];
			}
$sql2=mysql_query("select * from omzet where username='$idkab'");
			$allkiri=0;
			$allkanan=0;
			while($row=mysql_fetch_row($sql2)) {
			$allkiri = $allkiri + $row[4];
			$allkanan = $allkanan + $row[5];
			}
	
	   if($idkab) {
   		
   		$kananb = "<a href='?e=binary_group&mid=$idkab' title='$idkab - $nakab - $kotakab - $tglkab'><table class='tbl03' cellpadding='0' cellspacing='0'><tbody><tr><td align='center' height='75' width='75'><img src='$foto'  border='0' height='75' width='75' style='padding-top:2px'></td></tr></tbody></table></a><span style='font-size: 9px;'>".potong($jkiri)." | ".potong($jkanan)."</span><br><span style='font-size: 9px;'><a href='?e=binary_group&mid=$idkab'><strong>$idkab</strong></a><br>".potong($allkiri)." | ".potong($allkanan)."</span>";
   } else {
   		$kananb = "<span style='font-size: 9px;'><a href='?e=join&up=$idka&posisi=KANAN''><strong><img src='images/kosong.png' width='72' height='72' /></strong></a></span>";
   }
   echo $kananb;
	}
   ?></td>
                <td width="97">&nbsp;</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="51">&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td align="center">&nbsp;</td>
      </tr>
      <tr>
        <td align="center">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>
<?	
	break;
	case tree :
	break;
}
?>	
<?
} else {
echo "<meta http-equiv=\"refresh\" content=\"1; url=illegal.html\">";
}
?>
