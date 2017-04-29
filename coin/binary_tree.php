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
		if($cari == 1) {
	//---levelku--
			$mylev = $db->dataupline("level", $user_session);
			$lev_uid = $db->dataupline("level", $mid);
			for($i=0;$i<$lev_uid;$i++) {
				$jd = $db->count_records("upline", "username='$mid' and upline$i='$user_session'");
				$ad = $ad + $jd;
			}
			if($mylev>$lev_uid or $ad<1){
			echo "<center><strong><font color='#FF0000'>You can't see your upline network<br> <!--Atau Jaringan Member Yang Crossline Dengan Anda<br>Perhatian ...!  Jangan Melakukan Posting Pada Saat Upline Anda Kosong--></font></strong></center>";
				$mid="";
			} else {
				$mid = $mid;
			}
			
		} else {
			$mid = $mid;
		}		
	}
	
	
?>
<style type="text/css">
body,td,th {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 12px;
}
</style>

<table style="border-collapse: collapse;" border="0" bordercolor="#111111" cellpadding="2" width="40%">
  <form method="post" action="">
    <tbody>
      <tr>
        <td align="center">&nbsp;</td>
      </tr>
      <tr>
        <td align="center" width="113"><strong>Username: </strong></td>
        <td width="337" align="center"><input name="mid" size="10" style="width: 100%;" type="text" id="mid" />
            <input name="cari" type="hidden" id="cari"  value="1" size="5" /></td>
        <td align="center" width="50"><input src="images/btn_go01.gif" height="19" type="image" width="31" /></td>
      </tr>
    </tbody>
  </form>
</table>
<table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="800" border="0" cellspacing="2" cellpadding="2">
      <tr>
        <td align="center">My Binary Tree</td>
      </tr>
      <tr>
        <td align="center"><hr /></td>
      </tr>
      <tr>
        <td align="center"><strong>Network (<span style="color: rgb(255, 0, 0);">
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
        <td height="514" align="center" valign="top" background="images/arow1.png"><table width="800" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="158" align="center" valign="top">
<?
$myfoto = $db->dataku("foto", $mid);
$blokir = $db->dataku("blokir", $mid);
$free = $db->dataku("status", $mid);
if ($free== 1 ) {
if($myfoto<>""){
			$fotoku ="../foto_profile/".$db->dataku("foto", $mid)."";
			} else {
			$fotoku="../foto_profile/no_photo.png";
		}
		} else {
		 $fotoku="../foto_profile/no_photo_free.png";
		}
		
	$sql=mysql_query("select * from omzet where username='$mid'");
			$jkiri=0;
			$jkanan=0;
			while($row=mysql_fetch_row($sql)) {
			$jkiri = $jkiri + $row[2];
			$jkanan = $jkanan + $row[3];
			}
	
		
$sbl=mysql_query("select kiri, kanan from jaringan where username='$mid' order by id desc");
$row=mysql_fetch_row($sbl);

?>
              <a href="#" title="<?= $db->dataku("nama", $mid); ?> <?= $db->dataku("kota", $mid); ?>">
              <table  cellpadding="0" cellspacing="0">
                <tbody>
                  <tr>
                    <td align="center" height="75" width="75"><img src="<?= $fotoku; ?>" title="<?= $db->dataku("username", $mid); ?> - Paket(<?= $db->dataku("paket_daftar", $mid); ?>)- join(<?= $db->dataku("tgl_daftar", $mid); ?>) - Exp(<?= $db->dataku("tgl_reinves", $mid); ?>)" border="0" height="75" width="75" /></td>
                  </tr>
                </tbody>
              </table>
              </a> <p><span style="font-size: 9px;">
			   <?= rupiah($jkiri); ?>
| 
  <?= rupiah($jkanan); ?>
                </span></p>
              <p><span style="font-size: 9px;">
                <?= $row[0]; ?>
                |
                <?= $row[1]; ?>
                </span><br />
                <span style="font-size: 9px;"><a href="#"><strong>
                  <?= $mid; ?>
                </strong></a></span></p></td>
          </tr>
          <tr>
            <td height="52"><table width="800" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="173">&nbsp;</td>
                <td width="130" align="center"><?
      $db->select("kiri, kanan", "upline", "username='$mid'");
   		$idki = $db->result(0, "kiri");
		$naki = $db->dataku("paket_daftar", $idki);
		$blokirki = $db->dataku("blokir", $idki);
		$kotaki = $db->dataku("tgl_daftar", $idki);
		$tglki = $db->dataku("tgl_reinves", $idki);
		$free = $db->dataku("status", $idki);
if ($free== 1 ) {
		 if(!$db->dataku("foto", $idki)) {
			$foto = "../foto_profile/no_photo.png";
		} else {
			$foto =	"../foto_profile/".$db->dataku("foto", $idki);
		}	
		
		} else {
		 $foto ="../foto_profile/no_photo_free.png";
		}
		
$sql=mysql_query("select * from omzet where username='$idki'");
			$jkiri=0;
			$jkanan=0;
			while($row=mysql_fetch_row($sql)) {
			$jkiri = $jkiri + $row[2];
			$jkanan = $jkanan + $row[3];
			}
		
$sbl=mysql_query("select kiri, kanan from jaringan where username='$idki' order by id desc");
$row=mysql_fetch_row($sbl);
		
   if($idki) {
   		
   		$kiri = "<a href='?e=binary_tree&mid=$idki' title='$idki - Paket($naki) - Join($kotaki) - Exp ($tglki)'><table class='tbl03' cellpadding='0' cellspacing='0'><tbody><tr><td align='center' height='75' width='75'><img src='$foto'  border='0' height='75' width='75' style='padding-top:2px'></td></tr></tbody></table></a><span style='font-size: 9px;'>".rupiah($jkiri)." | ".rupiah($jkanan)."</span><br><span style='font-size: 9px;'>".$row[0]." | ".$row[1]."</span><br><span style='font-size: 9px;'><a href='?e=binary_tree&mid=$idki'><strong>$idki</strong></a></span>";
   } else {
   		$kiri = "<span style='font-size: 9px;'><a href='?e=join&up=$mid&pos=KIRI''><strong><img src='images/kosong.png' width='72' height='72' /></strong></a></span>";
		
   }
   echo $kiri;
   $kosong = "";
   ?></td>
                <td width="176">&nbsp;</td>
                <td width="150" align="center"><?
   $db->select("kiri, kanan", "upline", "username='$mid'");
   		$idka = $db->result(0, "kanan");
		$naka =  $db->dataku("paket_daftar", $idka);
		$blokirka = $db->dataku("blokir", $idka);
		$kotaka = $db->dataku("tgl_daftar", $idka);
		$tglka = $db->dataku("tgl_reinves", $idka);
		$free = $db->dataku("status", $idka);
		if ($free== 1 ) {
		 if(!$db->dataku("foto", $idka)) {
			$foto = "../foto_profile/no_photo.png";
		} else {
			$foto =	"../foto_profile/".$db->dataku("foto", $idka);
		}		
		} else {
		 $foto ="../foto_profile/no_photo_free.png";
		}
		$sql=mysql_query("select * from omzet where username='$idka'");
			$jkiri=0;
			$jkanan=0;
			while($row=mysql_fetch_row($sql)) {
			$jkiri = $jkiri + $row[2];
			$jkanan = $jkanan + $row[3];
			}
		
$sbl=mysql_query("select kiri, kanan from jaringan where username='$idka' order by id desc");
$row=mysql_fetch_row($sbl);
		
   if($idka) {
   		
   		$kanan = "<a href='?e=binary_tree&mid=$idka' title='$idka - Paket($naka)- Join($kotaka) - Exp($tglka)'><table class='tbl03' cellpadding='0' cellspacing='0'><tbody><tr><td align='center' height='75' width='75'><img src='$foto'  border='0' height='75' width='75' style='padding-top:2px'></td></tr></tbody></table></a><span style='font-size: 9px;'>".rupiah($jkiri)." | ".rupiah($jkanan)."</span><br><span style='font-size: 9px;'>".$row[0]." | ".$row[1]."</span><br></a><span style='font-size: 9px;'><a href='?e=binary_tree&mid=$idka'><strong>$idka</strong></a></span>";
   } else {
   		$kanan = "<span style='font-size: 9px;'><a href='?e=join&up=$mid&pos=KANAN''><strong><img src='images/kosong.png' width='72' height='72' /></strong></a></span>";
		
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
			$nakia = $db->dataku("paket_daftar", $idkia);
			$kotakia = $db->dataku("tgl_daftar", $idkia);
			$tglkia = $db->dataku("tgl_reinves", $idkia);
			$free = $db->dataku("status", $idkia);
	if ($free== 1 ) {
		if(!$db->dataku("foto", $idkia)) {
			$foto = "../foto_profile/no_photo.png";
		} else {
			$foto =	"../foto_profile/".$db->dataku("foto", $idkia);
		}
		} else {
		 $foto ="../foto_profile/no_photo_free.png";
		}
			
	$sql=mysql_query("select * from omzet where username='$idkia'");
			$jkiri=0;
			$jkanan=0;
			while($row=mysql_fetch_row($sql)) {
			$jkiri = $jkiri + $row[2];
			$jkanan = $jkanan + $row[3];
			}		
			
	$sbl=mysql_query("select kiri, kanan from jaringan where username='$idkia' order by id desc");
	$row=mysql_fetch_row($sbl);
	
	   if($idkia) {
   		
   		$kiria = "<a href='?e=binary_tree&mid=$idkia' title='$idkia - paket($nakia) - Joint($kotakia) - Exp($tglkia)'><table class='tbl03' cellpadding='0' cellspacing='0'><tbody><tr><td align='center' height='75' width='75'><img src='$foto'  border='0' height='75' width='75' style='padding-top:2px'></td></tr></tbody></table></a><span style='font-size: 9px;'>".rupiah($jkiri)." | ".rupiah($jkanan)."</span><br><span style='font-size: 9px;'>".$row[0]." | ".$row[1]."</span><br><span style='font-size: 9px;'><a href='?e=binary_tree&mid=$idkia'><strong>$idkia</strong></a></span>";
   } else {
   		$kiria = "<span style='font-size: 9px;'><a href='?e=join&up=$idki&pos=KIRI''><strong><img src='images/kosong.png' width='72' height='72' /></strong></a></span>";
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
			$nakib = $db->dataku("paket_daftar", $idkib);
			$kotakib = $db->dataku("tgl_daftar", $idkib);
			$tglkib = $db->dataku("tgl_reinves", $idkib);
	$free = $db->dataku("status", $idkib);
	if ($free== 1 ) {	
			
		if(!$db->dataku("foto", $idkib)) {
			$foto = "../foto_profile/no_photo.png";
		} else {
			$foto =	"../foto_profile/".$db->dataku("foto", $idkib);
		} } else {
		 $foto ="../foto_profile/no_photo_free.png";
		}
			
	$sql=mysql_query("select * from omzet where username='$idkib'");
			$jkiri=0;
			$jkanan=0;
			while($row=mysql_fetch_row($sql)) {
			$jkiri = $jkiri + $row[2];
			$jkanan = $jkanan + $row[3];
			}		
			
	$sbl=mysql_query("select kiri, kanan from jaringan where username='$idkib' order by id desc");
	$row=mysql_fetch_row($sbl);
	
	   if($idkib) {
   		
   		$kirib = "<a href='?e=binary_tree&mid=$idkib' title='$idkib - Paket ($nakib) - Join($kotakib) - Exp($tglkib)'><table class='tbl03' cellpadding='0' cellspacing='0'><tbody><tr><td align='center' height='75' width='75'><img src='$foto'  border='0' height='75' width='75' style='padding-top:2px'></td></tr></tbody></table></a><span style='font-size: 9px;'>".rupiah($jkiri)." | ".rupiah($jkanan)."</span><br><span style='font-size: 9px;'>".$row[0]." | ".$row[1]."</span><br><span style='font-size: 9px;'><a href='?e=binary_tree&mid=$idkib'><strong>$idkib</strong></a></span>";
   } else {
   		$kirib = "<span style='font-size: 9px;'><a href='?e=join&up=$idki&pos=KANAN''><strong><img src='images/kosong.png' width='72' height='72' /></strong></a></span>";
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
			$nakaa = $db->dataku("paket_daftar", $idkaa);
			$kotakaa = $db->dataku("tgl_daftar", $idkaa);
			$tglkaa = $db->dataku("tgl_reinves", $idkaa);
	$free = $db->dataku("status", $idkaa);
	if ($free== 1 ) {	
			
		if(!$db->dataku("foto", $idkaa)) {
			$foto = "../foto_profile/no_photo.png";
		} else {
			$foto =	"../foto_profile/".$db->dataku("foto", $idkaa);
		} } else {
		 $foto ="../foto_profile/no_photo_free.png";
		}
		
		$sql=mysql_query("select * from omzet where username='$idkaa'");
			$jkiri=0;
			$jkanan=0;
			while($row=mysql_fetch_row($sql)) {
			$jkiri = $jkiri + $row[2];
			$jkanan = $jkanan + $row[3];
			}		
			
	$sbl=mysql_query("select kiri, kanan from jaringan where username='$idkaa' order by id desc");
	$row=mysql_fetch_row($sbl);
	
	   if($idkaa) {
   		
   		$kanana = "<a href='?e=binary_tree&mid=$idkaa' title='$idkaa - Paket($nakaa) - Join($kotakaa) - Exp($tglkaa)'><table class='tbl03' cellpadding='0' cellspacing='0'><tbody><tr><td align='center' height='75' width='75'><img src='$foto'  border='0' height='75' width='75' style='padding-top:2px'></td></tr></tbody></table></a><span style='font-size: 9px;'>".rupiah($jkiri)." | ".rupiah($jkanan)."</span><br><span style='font-size: 9px;'>".$row[0]." | ".$row[1]."</span><br><span style='font-size: 9px;'><a href='?e=binary_tree&mid=$idkaa'><strong>$idkaa</strong></a></span>";
   } else {
   		$kanana = "<span style='font-size: 9px;'><a href='?e=join&up=$idka&pos=KIRI''><strong><img src='images/kosong.png' width='72' height='72' /></strong></a></span>";
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
			$nakab = $db->dataku("paket_daftar", $idkab);
			$kotakab = $db->dataku("tgl_daftar", $idkab);
			$tglkab = $db->dataku("tgl_reinves", $idkab);
			$free = $db->dataku("status", $idkab);
	if ($free== 1 ) {	
			
		if(!$db->dataku("foto", $idkab)) {
			$foto = "../foto_profile/no_photo.png";
		} else {
			$foto =	"../foto_profile/".$db->dataku("foto", $idkab);
		}  } else {
		 $foto ="../foto_profile/no_photo_free.png";
		}
		
			
			$sql=mysql_query("select * from omzet where username='$idkab'");
			$jkiri=0;
			$jkanan=0;
			while($row=mysql_fetch_row($sql)) {
			$jkiri = $jkiri + $row[2];
			$jkanan = $jkanan + $row[3];
			}		
	
	
	$sbl=mysql_query("select kiri, kanan from jaringan where username='$idkab' order by id desc");
	$row=mysql_fetch_row($sbl);
	
	   if($idkab) {
   		
   		$kananb = "<a href='?e=binary_tree&mid=$idkab' title='$idkab - paket($nakab)- Join($kotakab) - Exp($tglkab)'><table class='tbl03' cellpadding='0' cellspacing='0'><tbody><tr><td align='center' height='75' width='75'><img src='$foto'  border='0' height='75' width='75' style='padding-top:2px'></td></tr></tbody></table></a><span style='font-size: 9px;'>".rupiah($jkiri)." | ".rupiah($jkanan)."</span><br><span style='font-size: 9px;'>".$row[0]." | ".$row[1]."</span><br><span style='font-size: 9px;'><a href='?e=binary_tree&mid=$idkab'><strong>$idkab</strong></a></span>";
   } else {
   		$kananb = "<span style='font-size: 9px;'><a href='?e=join&up=$idka&pos=KANAN''><strong><img src='images/kosong.png' width='72' height='72' /></strong></a></span>";
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
            <td><table width="800" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="56">&nbsp;</td>
                <td width="94" align="center"><?
   //----level 2 kiri---
   if(!$idkia) {
   	echo $kosong;
	} else {
		$db->select("kiri, kanan", "upline", "username='$idkia'");
		$idkia1 = $db->result(0, "kiri");
			$nakia1 = $db->dataku("paket_daftar", $idkia1);
			$kotakia1 = $db->dataku("tgl_daftar", $idkia1);
			$tglkia1 = $db->dataku("tgl_reinves", $idkia1);
			$free = $db->dataku("status", $idkia1);
	if ($free== 1 ) {
		if(!$db->dataku("foto", $idkia1)) {
			$foto = "../foto_profile/no_photo.png";
		} else {
			$foto =	"../foto_profile/".$db->dataku("foto", $idkia1);
		} } else {
		 $foto ="../foto_profile/no_photo_free.png";
		}
	
	$sql=mysql_query("select * from omzet where username='$idkia1'");
			$jkiri=0;
			$jkanan=0;
			while($row=mysql_fetch_row($sql)) {
			$jkiri = $jkiri + $row[2];
			$jkanan = $jkanan + $row[3];
			}		
			
	$sbl=mysql_query("select kiri, kanan from jaringan where username='$idkia1' order by id desc");
	$row=mysql_fetch_row($sbl);
	
	   if($idkia1) {
   		
   		$kiria1 = "<a href='?e=binary_tree&mid=$idkia1' title='$idkia1 - Paket($nakia1) - Join($kotakia1) - Exp($tglkia1)'><table class='tbl03' cellpadding='0' cellspacing='0'><tbody><tr><td align='center' height='75' width='75'><img src='$foto'  border='0' height='75' width='75' style='padding-top:2px'></td></tr></tbody></table></a><span style='font-size: 9px;'>".rupiah($jkiri)." | ".rupiah($jkanan)."</span><br><span style='font-size: 9px;'>".$row[0]." | ".$row[1]."</span><br><span style='font-size: 9px;'><a href='?e=binary_tree&mid=$idkia1'><strong>$idkia1</strong></a></span>";
   } else {
   		$kiria1 = "<span style='font-size: 9px;'><a href='?e=join&up=$idkia&pos=KIRI''><strong><img src='images/kosong.png' width='72' height='72' /></strong></a></span>";
   }
   echo $kiria1;
	}
   ?></td>
                <td width="87" align="center"><?
   //----level 2 kiri---
   if(!$idkia) {
   	echo $kosong;
	} else {
		$db->select("kiri, kanan", "upline", "username='$idkia'");
		$idkia2 = $db->result(0, "kanan");
			$nakia2 = $db->dataku("paket_daftar", $idkia2);
			$kotakia2 = $db->dataku("tgl_daftar", $idkia2);
			$tglkia2 = $db->dataku("tgl_reinves", $idkia2);
			$free = $db->dataku("status", $idkia2);
	if ($free== 1 ) {
		if(!$db->dataku("foto", $idkia2)) {
			$foto = "../foto_profile/no_photo.png";
		} else {
			$foto =	"../foto_profile/".$db->dataku("foto", $idkia2);
		} } else {
		 $foto ="../foto_profile/no_photo_free.png";
		}
			
		$sql=mysql_query("select * from omzet where username='$idkia2'");
			$jkiri=0;
			$jkanan=0;
			while($row=mysql_fetch_row($sql)) {
			$jkiri = $jkiri + $row[2];
			$jkanan = $jkanan + $row[3];
			}			
			
	$sbl=mysql_query("select kiri, kanan from jaringan where username='$idkia2' order by id desc");
	$row=mysql_fetch_row($sbl);
	
	   if($idkia2) {
   		
   		$kiria2 = "<a href='?e=binary_tree&mid=$idkia2' title='$idkia2 - Paket($nakia2) - Join($kotakia2) - Exp($tglkia2)'><table class='tbl03' cellpadding='0' cellspacing='0'><tbody><tr><td align='center' height='75' width='75'><img src='$foto'  border='0' height='75' width='75' style='padding-top:2px'></td></tr></tbody></table></a><span style='font-size: 9px;'>".rupiah($jkiri)." | ".rupiah($jkanan)."</span><br><span style='font-size: 9px;'>".$row[0]." | ".$row[1]."</span><br><span style='font-size: 9px;'><a href='?e=binary_tree&mid=$idkia2'><strong>$idkia2</strong></a></span>";
   } else {
   		$kiria2 = "<span style='font-size: 9px;'><a href='?e=join&up=$idkia&pos=KANAN''><strong><img src='images/kosong.png' width='72' height='72' /></strong></a></span>";
   }
   echo $kiria2;
	}
   ?></td>
                <td width="75" align="center"><?
   //----level 2 kiri---
   if(!$idkib) {
   	echo $kosong;
	} else {
		$db->select("kiri, kanan", "upline", "username='$idkib'");
		$idkib1 = $db->result(0, "kiri");
			$nakib1 = $db->dataku("paket_daftar", $idkib1);
			$kotakib1 = $db->dataku("tgl_daftar", $idkib1);
			$tglkib1 = $db->dataku("tgl_reinves", $idkib1);
			$free = $db->dataku("status", $idkib1);
	if ($free== 1 ) {
		if(!$db->dataku("foto", $idkib1)) {
			$foto = "../foto_profile/no_photo.png";
		} else {
			$foto =	"../foto_profile/".$db->dataku("foto", $idkib1);
		} } else {
		 $foto ="../foto_profile/no_photo_free.png";
		}
		
	$sql=mysql_query("select * from omzet where username='$idkib1'");
			$jkiri=0;
			$jkanan=0;
			while($row=mysql_fetch_row($sql)) {
			$jkiri = $jkiri + $row[2];
			$jkanan = $jkanan + $row[3];
			}		
			
	$sbl=mysql_query("select kiri, kanan from jaringan where username='$idkib1' order by id desc");
	$row=mysql_fetch_row($sbl);
	
	   if($idkib1) {
   		
   		$kirib1 = "<a href='?e=binary_tree&mid=$idkib1' title='$idkib1 - Paket($nakib1) - Join($kotakib1) - Exp($tglkib1)'><table class='tbl03' cellpadding='0' cellspacing='0'><tbody><tr><td align='center' height='75' width='75'><img src='$foto'  border='0' height='75' width='75' style='padding-top:2px'></td></tr></tbody></table></a><span style='font-size: 9px;'>".rupiah($jkiri)." | ".rupiah($jkanan)."</span><br><span style='font-size: 9px;'>".$row[0]." | ".$row[1]."</span><br><span style='font-size: 9px;'><a href='?e=binary_tree&mid=$idkib1'><strong>$idkib1</strong></a></span>";
   } else {
   		$kirib1 = "<span style='font-size: 9px;'><a href='?e=join&up=$idkib&pos=KIRI''><strong><img src='images/kosong.png' width='72' height='72' /></strong></a></span>";
   }
   echo $kirib1;
	}
   ?></td>
                <td width="88" align="center"><?
   //----level 2 kiri---
   if(!$idkib) {
   	echo $kosong;
	} else {
		$db->select("kiri, kanan", "upline", "username='$idkib'");
		$idkib2 = $db->result(0, "kanan");
			$nakib2 = $db->dataku("paket_daftar", $idkib2);
			$kotakib2 = $db->dataku("tgl_daftar", $idkib2);
			$tglkib2 = $db->dataku("tgl_reinves", $idkib2);
		$free = $db->dataku("status", $idkib2);
	if ($free== 1 ) {	
			
		if(!$db->dataku("foto", $idkib2)) {
			$foto = "../foto_profile/no_photo.png";
		} else {
			$foto =	"../foto_profile/".$db->dataku("foto", $idkib2);
		} } else {
		 $foto ="../foto_profile/no_photo_free.png";
		}
	
	$sql=mysql_query("select * from omzet where username='$idkib2'");
			$jkiri=0;
			$jkanan=0;
			while($row=mysql_fetch_row($sql)) {
			$jkiri = $jkiri + $row[2];
			$jkanan = $jkanan + $row[3];
			}			
			
	$sbl=mysql_query("select kiri, kanan from jaringan where username='$idkib2' order by id desc");
	$row=mysql_fetch_row($sbl);
	
	   if($idkib2) {
   		
   		$kirib2 = "<a href='?e=binary_tree&mid=$idkib2' title='$idkib2 - Paket($nakib2) - Join($kotakib2) - Exp($tglkib2)'><table class='tbl03' cellpadding='0' cellspacing='0'><tbody><tr><td align='center' height='75' width='75'><img src='$foto'  border='0' height='75' width='75' style='padding-top:2px'></td></tr></tbody></table></a><span style='font-size: 9px;'>".rupiah($jkiri)." | ".rupiah($jkanan)."</span><br><span style='font-size: 9px;'>".$row[0]." | ".$row[1]."</span><br><span style='font-size: 9px;'><a href='?e=binary_tree&mid=$idkib2'><strong>$idkib2</strong></a></span>";
   } else {
   		$kirib2 = "<span style='font-size: 9px;'><a href='?e=join&up=$idkib&pos=KANAN''><strong><img src='images/kosong.png' width='72' height='72' /></strong></a></span>";
   }
   echo $kirib2;
	}
   ?></td>
                <td width="87" align="center"><?
   //----level 3 kiri---
   if(!$idkaa) {
   	echo $kosong;
	} else {
		$db->select("kiri, kanan", "upline", "username='$idkaa'");
		$idkaa1 = $db->result(0, "kiri");
			$nakaa1 = $db->dataku("paket_daftar", $idkaa1);
			$kotakaa1 = $db->dataku("tgl_daftar", $idkaa1);
			$tglkaa1 = $db->dataku("tgl_reinves", $idkaa1);
			$free = $db->dataku("status", $idkaa1);
	if ($free== 1 ) {	
			
		if(!$db->dataku("foto", $idkaa1)) {
			$foto = "../foto_profile/no_photo.png";
		} else {
			$foto =	"../foto_profile/".$db->dataku("foto", $idkaa1);
		} } else {
		 $foto ="../foto_profile/no_photo_free.png";
		}
	
	$sql=mysql_query("select * from omzet where username='$idkaa1'");
			$jkiri=0;
			$jkanan=0;
			while($row=mysql_fetch_row($sql)) {
			$jkiri = $jkiri + $row[2];
			$jkanan = $jkanan + $row[3];
			}		
					
	$sbl=mysql_query("select kiri, kanan from jaringan where username='$idkaa1' order by id desc");
	$row=mysql_fetch_row($sbl);
	
	   if($idkaa1) {
   		
   		$kanana1 = "<a href='?e=binary_tree&mid=$idkaa1' title='$idkaa1 - Paket($nakaa1) - Join($kotakaa1) - Exp($tglkaa1)'><table class='tbl03' cellpadding='0' cellspacing='0'><tbody><tr><td align='center' height='75' width='75'><img src='$foto'  border='0' height='75' width='75' style='padding-top:2px'></td></tr></tbody></table></a><span style='font-size: 9px;'>".rupiah($jkiri)." | ".rupiah($jkanan)."</span><br><span style='font-size: 9px;'>".$row[0]." | ".$row[1]."</span><br><span style='font-size: 9px;'><a href='?e=binary_tree&mid=$idkaa1'><strong>$idkaa1</strong></a></span>";
   } else {
   		$kanana1 = "<span style='font-size: 9px;'><a href='?e=join&up=$idkaa&pos=KIRI''><strong><img src='images/kosong.png' width='72' height='72' /></strong></a></span>";
   }
   echo $kanana1;
	}
   ?></td>
                <td width="76" align="center"><?
   //----level 3 kanan---
   if(!$idkaa) {
   	echo $kosong;
	} else {
		$db->select("kiri, kanan", "upline", "username='$idkaa'");
		$idkaa2 = $db->result(0, "kanan");
			$nakaa2 = $db->dataku("paket_daftar", $idkaa2);
			$kotakaa2 = $db->dataku("tgl_daftar", $idkaa2);
			$tglkaa2 = $db->dataku("tgl_reinves", $idkaa2);
			$free = $db->dataku("status", $idkaa2);
	if ($free== 1 ) {
		if(!$db->dataku("foto", $idkaa2)) {
			$foto = "../foto_profile/no_photo.png";
		} else {
			$foto =	"../foto_profile/".$db->dataku("foto", $idkaa2);
		} } else {
		 $foto ="../foto_profile/no_photo_free.png";
		}
	
	$sql=mysql_query("select * from omzet where username='$idkaa2'");
			$jkiri=0;
			$jkanan=0;
			while($row=mysql_fetch_row($sql)) {
			$jkiri = $jkiri + $row[2];
			$jkanan = $jkanan + $row[3];
			}	
					
	$sbl=mysql_query("select kiri, kanan from jaringan where username='$idkaa2' order by id desc");
	$row=mysql_fetch_row($sbl);
	
	   if($idkaa2) {
   		
   		$kanana2 = "<a href='?e=binary_tree&mid=$idkaa2' title='$idkaa2 - Paket($nakaa2) - Join($kotakaa2) - Exp($tglkaa2)'><table class='tbl03' cellpadding='0' cellspacing='0'><tbody><tr><td align='center' height='75' width='75'><img src='$foto'  border='0' height='75' width='75' style='padding-top:2px'></td></tr></tbody></table></a><span style='font-size: 9px;'>".rupiah($jkiri)." | ".rupiah($jkanan)."</span><br><span style='font-size: 9px;'>".$row[0]." | ".$row[1]."</span><br><span style='font-size: 9px;'><a href='?e=binary_tree&mid=$idkaa2'><strong>$idkaa2</strong></a></span>";
   } else {
   		$kanana2 = "<span style='font-size: 9px;'><a href='?e=join&up=$idkaa&pos=KANAN''><strong><img src='images/kosong.png' width='72' height='72' /></strong></a></span>";
   }
   echo $kanana2;
	}
   ?></td>
                <td width="88" align="center"><?
   //----level 2 kanan---
   if(!$idkab) {
   	echo $kosong;
	} else {
		$db->select("kiri, kanan", "upline", "username='$idkab'");
		$idkab1 = $db->result(0, "kiri");
			$nakab1 = $db->dataku("paket_daftar", $idkab1);
			$kotakab1 = $db->dataku("tgl_daftar", $idkab1);
			$tglkab1 = $db->dataku("tgl_reinves", $idkab1);
			$free = $db->dataku("status", $idkab1);
	if ($free== 1 ) {
		if(!$db->dataku("foto", $idkab1)) {
			$foto = "../foto_profile/no_photo.png";
		} else {
			$foto =	"../foto_profile/".$db->dataku("foto", $idkab1);
		} } else {
		 $foto ="../foto_profile/no_photo_free.png";
		}
		
		
		
		$sql=mysql_query("select * from omzet where username='$idkab1'");
			$jkiri=0;
			$jkanan=0;
			while($row=mysql_fetch_row($sql)) {
			$jkiri = $jkiri + $row[2];
			$jkanan = $jkanan + $row[3];
			}	
	$sbl=mysql_query("select kiri, kanan from jaringan where username='$idkab1' order by id desc");
	$row=mysql_fetch_row($sbl);
	
	   if($idkab1) {
   		
   		$kananb1 = "<a href='?e=binary_tree&mid=$idkab1' title='$idkab1 - Paket($nakab1) - Join($kotakab1) - Exp($tglkab1)'><table class='tbl03' cellpadding='0' cellspacing='0'><tbody><tr><td align='center' height='75' width='75'><img src='$foto'  border='0' height='75' width='75' style='padding-top:2px'></td></tr></tbody></table></a><span style='font-size: 9px;'>".rupiah($jkiri)." | ".rupiah($jkanan)."</span><br><span style='font-size: 9px;'>".$row[0]." | ".$row[1]."</span><br><span style='font-size: 9px;'><a href='?e=binary_tree&mid=$idkab1'><strong>$idkab1</strong></a></span>";
   } else {
   		$kananb1 = "<span style='font-size: 9px;'><a href='?e=join&up=$idkab&pos=KIRI''><strong><img src='images/kosong.png' width='72' height='72' /></strong></a></span>";
   }
   echo $kananb1;
	}
   ?></td>
                <td width="75" align="center"><?
   //----level 2 kanan---
   if(!$idkab) {
   	echo $kosong;
	} else {
		$db->select("kiri, kanan", "upline", "username='$idkab'");
		$idkab2 = $db->result(0, "kanan");
			$nakab2 = $db->dataku("paket_daftar", $idkab2);
			$kotakab2 = $db->dataku("tgl_daftar", $idkab2);
			$tglkab2 = $db->dataku("tgl_reinves", $idkab2);
			$free = $db->dataku("status", $idkab2);
	if ($free== 1 ) {
		if(!$db->dataku("foto", $idkab2)) {
			$foto = "../foto_profile/no_photo.png";
		} else {
			$foto =	"../foto_profile/".$db->dataku("foto", $idkab2);
		} } else {
		 $foto ="../foto_profile/no_photo_free.png";
		}
			
		$sql=mysql_query("select * from omzet where username='$idkab2'");
			$jkiri=0;
			$jkanan=0;
			while($row=mysql_fetch_row($sql)) {
			$jkiri = $jkiri + $row[2];
			$jkanan = $jkanan + $row[3];
			}	
			
	$sbl=mysql_query("select kiri, kanan from jaringan where username='$idkab2' order by id desc");
	$row=mysql_fetch_row($sbl);
	
	   if($idkab2) {
   		
   		$kananb2 = "<a href='?e=binary_tree&mid=$idkab2' title='$idkab2 - Paket($nakab2) - Join($kotakab2) - Exp($tglkab2)'><table class='tbl03' cellpadding='0' cellspacing='0'><tbody><tr><td align='center' height='75' width='75'><img src='$foto'  border='0' height='75' width='75' style='padding-top:2px'></td></tr></tbody></table></a><span style='font-size: 9px;'>".rupiah($jkiri)." | ".rupiah($jkanan)."</span><br><span style='font-size: 9px;'>".$row[0]." | ".$row[1]."</span><br><span style='font-size: 9px;'><a href='?e=binary_tree&mid=$idkab2'><strong>$idkab2</strong></a></span>";
   } else {
   		$kananb2 = "<span style='font-size: 9px;'><a href='?e=join&up=$idkab&pos=KANAN''><strong><img src='images/kosong.png' width='72' height='72' /></strong></a></span>";
   }
   echo $kananb2;
	}
   ?></td>
                <td width="74">&nbsp;</td>
              </tr>
            </table></td>
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
