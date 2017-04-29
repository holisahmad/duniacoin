<?PHP

if(isset( $_SESSION['valid_admin']))

  {

?>

<?

//---pagination----------------

$limit = '50'; // How many results should be shown at a time

$scroll = '0'; // Do you want the scroll function to be on (1 = YES, 2 = NO)

$scrollnumber = '10'; // How many elements to the record bar are shown at a time when the scroll function is on

//-------------pagination--------------

if (!isset ($_GET['show'])) {



	$display = 1;

	

} else {



	$display = $_GET['show'];

	

}

$start = (($display * $limit) - $limit);

//if($uidm == 001) {

//$db->select("*", "member", $kat);
if($Submit == "CARI") {
	$filter = "a.username like '%$keywrd%'";
	$where = "a.username like '%$keywrd%'";
	
} 


//---
		
//$db->select("id, username, ro_kanan, ro_kiri", "jaringan",  $where, $order, "", "", "$start, $limit");

//$db->select("id, username, nama,  adminrp,  hp, sponsor, upline, email, kota, tgl, status, blokir, agen", "member", $where, $order, "", "", "$start, $limit");
$numrows = $sql0;

if($kat > 0 or !$kat) {

	$order = "id desc";

} else {

	$order = "id desc";

}		
if($kat == "") {

	$numrows = $db->count_records("jaringan", "");

	$db->select("a.id, a.username, a.ro_kanan,  a.ro_kanan_exc, a.ro_kiri_exc , a.ro_kiri ,a.w_kanan, a.w_kiri , a.kanan, a.kiri, b.sp ", "jaringan as a inner join upline as b on a.username= b.username ", "", $order, "", "", "$start, $limit");

	

} else {

	$numrows = $db->count_records("jaringan", "status=$kat");	

	//$db->select("id, username, ro_kanan, ro_kiri, kanan, kiri ", "jaringan ",  $where, $order, "", "", "$start, $limit");
	
	$db->select("a.id, a.username, a.ro_kanan, a.ro_kiri , a.ro_kanan_exc, a.ro_kiri_exc , a.w_kanan, a.w_kiri , a.kanan, a.kiri, b.sp ", "jaringan as a inner join upline as b on a.username= b.username ", $where, $order, "", "", "$start, $limit");

}







?>
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td colspan="11" align="center" style="padding:0"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding:0; margin:0">
      <tr>
        <td width="63%"><form action="" method="post" name="form1" id="form1" style="margin:0; padding:0">
        </form></td>
        <td width="37%"><form id="form2" name="form2" method="post" action="?m=reward1&amp;kat=2" style="margin:0; padding:0">
          <label>
            Cari Member : 
            <input name="keywrd" type="text" id="keywrd" />
            </label>
          <label>
          <input type="submit" name="Submit" value="CARI" />
          </label>
        </form>        </td>
      </tr>
    </table></td>
  </tr>
  <tr class="tbl_header">
    <td width="3%" align="center">No</td>
  
    <td width="11%" align="center">Username</td>
    <td width="11%" align="center">Jlh Sponsor</td>
    <td width="10%" align="center">Jar Kanan</td>
    <td width="9%" align="center">Jar Kiri</td>
	<td width="9%" align="center">Ro Kanan</td>
    <td width="8%" align="center">RO Kiri</td>
	<td width="9%" align="center">Wis Kanan</td>
    <td width="11%" align="center">Wis Kiri</td>
	<td width="10%" align="center">Exc Kanan</td>
    <td width="9%" align="center">Exc Kiri</td>
   
  </tr>
<?


$j=$db->num_rows();
for($i=0;$i<$j;$i++) {
$nom = $i + 1 + $start;
	$lid = $i - 1;
	
$username = $db->result($i, "username");
$kanan = $db->result($i, "kanan");
$kiri = $db->result($i, "kiri");
$ro_kanan = $db->result($i, "ro_kanan"); 
$ro_kiri = $db->result($i, "ro_kiri"); 
$w_kanan = $db->result($i, "w_kanan"); 
$w_kiri = $db->result($i, "w_kiri"); 
$ex_kanan = $db->result($i, "ro_kanan_exc"); 
$ex_kiri = $db->result($i, "ro_kiri_exc"); 
$sp = $db->result($i, "sp" );

?>
 
  <tr class="<?= $class; ?>">
    <td width="3%"><?= $nom; ?> </td>
    <td width="11%"><?= $username ;?>
    </a> </td>
	
	 <td width="11%"><div align="center">
	  <?= $sp ;?>	  
    </a> </div></td>
	
    <td><div align="center">
      <?=  $kanan ; ?>
    </div>
    </a></td>
    <td><div align="center">
      <?= $kiri ;?>
    </div>
    </td>
	<td><div align="center">
	  <?= $ro_kanan ;?>
	</div>
    </a></td>
    <td><div align="center">
      <?= $ro_kiri; ?>
    </div>
    </td>
	
	<td><div align="center">
	  <?= $w_kanan ;?>
	</div>
    </a></td>
    <td><div align="center">
      <?= $w_kiri; ?>
    </div>
    </td>
	
	<td><div align="center">
	  <?= $ex_kanan ;?>
	</div>
    </a></td>
    <td><div align="center">
      <?= $ex_kiri; ?>
    </div>
    </td>
   
  </tr>
<?
	}
?>	  
</table>

<table width="80%" border="0" align="center" cellpadding="2" cellspacing="0">
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
  <a href="?m=reward1&kat=&show=1" style="font-size:10px; color:#0000CC"><< Awal </a> | <a href="?m=reward1&kat=&show=<?= $previous; ?>" style="font-size:10px; color:#0000CC">< Sebelumnya </a> |
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
[ <a href="?m=reward1&kat=&show=<?= $i; ?>" style="font-size:10px; color:#0000CC">
<?= $i; ?>
</a> ]
<?php
		
		}
	
	}

}

if ($display < $paging) {

	$next = $display + 1;
	
?>
| <a href="?m=reward1&kat=&show=<?= $next; ?>" style="font-size:10px; color:#0000CC">Selanjutnya ></a> | <a href="?m=reward1&kat=&show=<?= $paging; ?>" style="font-size:10px; color:#0000CC">Terakhir >></a>
<?php

}
//
?>
    </td>
  </tr>
</table>

      </tr>
</table>

<?
} else {
echo "<meta http-equiv=\"refresh\" content=\"1; url=illegal.html\">";
}
?>