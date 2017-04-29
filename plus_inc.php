<?php




function IntervalDays($CheckIn,$CheckOut){
$CheckInX = explode("-", $CheckIn);
$CheckOutX =  explode("-", $CheckOut);
$date1 =  mktime(0, 0, 0, $CheckInX[1],$CheckInX[2],$CheckInX[0]);
$date2 =  mktime(0, 0, 0, $CheckOutX[1],$CheckOutX[2],$CheckOutX[0]);
$interval =($date2 - $date1)/(3600*24);
// returns numberofdays
return  $interval ;
}	



function potong($num) {
  if ($num < 1000) {
    return $num;
  }
  $x = round($num);
  $x_number_format = number_format($x);
  $x_array = explode(',', $x_number_format);
  $x_parts = array(' Rb', ' Jt', ' M', ' T',' P',' E');
  $x_count_parts = count($x_array) - 1;
  $x_display = $x;
  $x_display = $x_array[0] . ((int) $x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
  $x_display .= $x_parts[$x_count_parts - 1];
  return $x_display;
}

function hitunglibur($tglawal,$tglakhir) {

 $tgl_awal = $tgl_akhir = $minggu = $sabtu = $koreksi = 0;
 
//  mengubah ke unix timestamp
    $jmldetik = 24*3600;
    $a = strtotime($tglawal);
    $b = strtotime($tglakhir);
    
//    menghitung jumlah libur nasional 
    
    
//    menghitung jumlah hari minggu
    for($i=$a; $i<$b; $i+=$jmldetik){
        if(date("w",$i)=="0"){
            $minggu++;
        }
    }
    
//    menghitung jumlah hari sabtu
    for($i=$a; $i<$b; $i+=$jmldetik){
        if(date("w",$i)=="6"){
            $sabtu++;
        }
    }
	
	if(date("w",$b)=="0" || date("w",$b)=="6"){
        $koreksi = 1;
    }
    
    $jumlahhari = $sabtu + $minggu + $koreksi + 1 ;
	
    return $jumlahhari ;
    
    }





function memberkiri($username, $dtgl) {
	$ki="";
	//-----------cari level tertinggi-------------
	$slv="select * from upline order by level desc";
	$rlv=mysql_query($slv);
	$slev=mysql_fetch_array($rlv);
	if($slev["level"] <= 10) {
		$jmlev=$slev["level"];
	} else {
		$jmlev = 10;
	}
	//------------------- kiri -----------------
	if($dtgl == "") {
		$sqlki="select a.username, b.status from upline as a inner join member as b on a.username=b.username where a.upline0='$username' and a.posisi='KIRI' and b.status='1'";
	} else {
		$sqlki="select a.username, b.status from upline as a inner join member as b on a.username=b.username where a.upline0='$username' and a.posisi='KIRI' $dtgl";
	}
	$rki=mysql_query($sqlki);

	$kir=mysql_fetch_row($rki);
	$adaki=mysql_num_rows($rki);
	$user=$kir[0];
	$upliki=$kir["upline0"];
	
	if ($adaki > 0)
	{

		for($i=0;$i<$jmlev;$i++)
		{
			if($dtgl == "") {
			$sql2="select a.username, b.tglaktif from upline as a inner join member as b on a.username=b.username where a.upline$i='$user'";
			} else {
			$sql2="select a.username, b.tglaktif from upline as a inner join member as b on a.username=b.username where a.upline$i='$user' $dtgl";
			}
			$res=mysql_query($sql2);
	
			$jml=array();
	
			$jml[$i]=mysql_num_rows($res);
			$tot=$tot+$jml[$i];
			$lv=2 + $i;
			$tal=0;
	
			$tal=$tal+$tot;

	
		}
			$totki=$tot+1;
	} else {
		$totki=0;
	}
	$ki=$totki;
	return $ki;
}

function memberkanan($username, $dtgl) {
	$tg="";
	//-----------cari level tertinggi-------------
	$slv="select * from upline order by level desc";
	$rlv=mysql_query($slv);
	$slev=mysql_fetch_array($rlv);
	if($slev["level"] <= 10) {
		$jmlev=$slev["level"];
	} else {
		$jmlev = 10;
	}
	//------------------- kiri -----------------
	if($dtgl == "") {
		$sqlka="select a.username, b.status from upline as a inner join member as b on a.username=b.username where a.upline0='$username' and a.posisi='KANAN' and b.status='1'";
	} else {
		$sqlka="select a.username, b.status from upline as a inner join member as b on a.username=b.username where a.upline0='$username' and a.posisi='KANAN' $dtgl";
	}
	$rtg=mysql_query($sqlka);

	$ktg=mysql_fetch_row($rtg);
	$adatg=mysql_num_rows($rtg);
	$user=$ktg[0];
	$uplitg=$ktg["upline0"];
	
	if ($adatg > 0)
	{

		for($i=0;$i<$jmlev;$i++)
		{
			if($dtgl == "") {
			$sql2="select a.username, b.tglaktif from upline as a inner join member as b on a.username=b.username where a.upline$i='$user'";
			} else {
			$sql2="select a.username, b.tglaktif from upline as a inner join member as b on a.username=b.username where a.upline$i='$user' $dtgl";
			}
			$res=mysql_query($sql2);
	
			$jml=array();
	
			$jml[$i]=mysql_num_rows($res);
			$tot=$tot+$jml[$i];
			$lv=2 + $i;
			$tal=0;
	
			$tal=$tal+$tot;

	
		}
			$tottg=$tot+1;
	} else {
		$tottg=0;
	}
	$tg=$tottg;
	return $tg;
}

function is_odd ($n) {
	return ($n & 1);
}	

function category_name($id) {
	$sql = mysql_query("select title from categories where id='$id'") or die;
	$kat = mysql_fetch_row($sql);
	$cat = $kat[0];
	return $cat;
}

function rupiah2($rp)
{
	$rupiah = "";
	$p = strlen($rp);
	while($p > 3)
	{
		$rupiah = "." . substr($rp,-3) . $rupiah;
		$l = strlen($rp) - 3;
		$rp = substr($rp,0,$l);
		$p = strlen($rp);
	}
	$rupiah = "IDR. " . $rp . $rupiah . ",-";
	return $rupiah;
}

function rupiah($rp)
{
	$rupiah = "";
	$p = strlen($rp);
	while($p > 3)
	{
		$rupiah = "." . substr($rp,-3) . $rupiah;
		$l = strlen($rp) - 3;
		$rp = substr($rp,0,$l);
		$p = strlen($rp);
	}
	$rupiah = "BV   " . $rp . $rupiah . "";
	return $rupiah;
}



//--make random password-----------
function makeRandomPassword() { 
          $salt = "01234567890987654321"; 
          srand((double)microtime()*1000000);  
          $i = 0; 
          while ($i <= 7) { 
                $num = rand() % 33; 
                $tmp = substr($salt, $num, 1); 
                $pass = $pass . $tmp; 
                $i++; 
          } 
          return $pass; 
}

//------------upline spillover-----------
function spillover($field, $username) {
	$sql="SELECT kiri, kanan FROM upline WHERE username='$username' and status='1' order by urutan asc";
	$mq=mysql_query($sql);
	$cek=mysql_num_rows($mq);
	$ada=mysql_fetch_row($mq);
	if($ada[0] == "" or $ada[1] == "") {
		if($ada[0] == "") {
			$posisi = "KIRI";
		} else {
			$posisi = "KANAN";
		}
		if($field == "random") {
			$nm="";
			$nm=$username;
			return $nm;
		}
		if($field == "pos") {
			$ps="";
	 		$ps=$posisi;
			return $ps;
		}
	} else {
		$upli=array();
		$pos=array();
		for($i=0;$i<10;$i++) {
		$sql="SELECT username, kiri, kanan FROM upline WHERE upline$i='$username' and status='1' order by urutan asc";
		$mq=mysql_query($sql);
		$cek=mysql_num_rows($mq);
		while($ada=mysql_fetch_row($mq)) {
			if($ada[1] == "" or $ada[2] == "") {
			if($ada[1] == "") {
				$posisi = "KIRI";
			} else {
				$posisi = "KANAN";
			}
			$upli[]=$ada[0];	
			$pos[]=$posisi;
		}
	}
	}
	if($field == "random") {
		$nm="";
		$nm=$upli[0];
		return $nm;
	}
	if($field == "pos") {
		$ps="";
	 	$ps=$pos[0];
		return $ps;
	}
	}
		mysql_free_result($mq);
}
//---------tgl expire----------
function formatgl($tgaktif) {
	$tg = "";
	//$tgaktif = date("Y-m-d"); 
	$hari=array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
	$bulane = array("Jan", "Feb", "Maret", "Apri", "Mei", "Juni", "Juli", "Agust", "Sept", "Okt", "Nov", "Des");
	$expire = date("w, d m Y",strtotime($tgaktif)); 
//$showexp = date("w n d Y",time() + (7776000/3)); 
	$day = substr($expire, 0, 1);
	$tgle = substr($expire, 3,2);
	$blne = substr($expire, 6,2);
	$thne = substr($expire, 9,4);
	if($blne < 10 ) {
		$blne0 = substr($blne, 1,1) - 1;
	} else {
		$blne0 = $blne - 1;
	}
	$tg =  "$hari[$day], $tgle $bulane[$blne0] $thne";
	return $tg;
}

//---jml member per level--
function jmlmember($username, $dtgl) {
	$jm = 0;
	$jm = memberkiri($username, $dtgl) + memberkiri($username, $dtgl);
	return $jm;
}	

function warning($text) {
	echo "<div id='warning'><p align=center>$text</p></div>";
}	
function kwitansi() {
	$ko = 0;
	$sql = mysql_query("select kode from transfer order by kode desc");
	if(mysql_num_rows($sql) == 0) {
		$ko = 100123;
	} else {	
		$data = mysql_fetch_row($sql);
		$ko = $data[0] + 1;
	}	
	return $ko;
}	


function kwitansi2() {
	$ko = 0;
	$sql = mysql_query("select kode from transferroi order by kode desc");
	if(mysql_num_rows($sql) == 0) {
		$ko = 100123;
	} else {	
		$data = mysql_fetch_row($sql);
		$ko = $data[0] + 1;
	}	
	return $ko;
}	
?>