<?PHP

if(isset( $_SESSION['valid_admin']))

  {

?>

<script type="text/javascript">
<!--
function confirmation(mid, page, action) {
	var answer = confirm("Proses Withdrawl id : " + mid )
	if (answer){
		//alert("Bye bye!")
		
		window.location = "?m=withdrawl&page=" + page + "&mid=" + mid + "&action=" + action;
		
	}
	
}
//-->
</script>
<h2 align="center"><img src="images/icon-48-user.png" width="48" height="48" align="absmiddle" /> History Pembayaran Komisi </h2>

<?
switch($page) {
	default :
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
$where = "a.valid='1' and ignored=0";
if($mid) {
	$wherekom = "a.valid='1'";
}	
if($kat == "") {
	//$numrows = $db->count_records("transfer", "");
	$db->select("a.id, a.userid, a.tglbayar, a.bonus, a.rp, a.adm, a.status,  a.valid, a.tujuan, b.nama, b.tgl_daftar, b.bank, b.norek, b.an", "transfer as a inner join member as b on a.userid=b.username", $where, "a.id DESC", "", "", "$start, $limit");

} else {
	//$numrows = $db->count_records("transfer", $where);	
//	$db->select("a.id, a.userid,  a.tglbayar, a.bonus, a.rp, a.adm, a.valid, a.status, a.status, b.nama, b.tgl_daftar, b.bank, b.norek, b.an", "transfer as a inner join member as b on a.userid=b.username", $wherekom, "a.id DESC", "", "", "$start, $limit");

}
$sel = "selected";
?>
<?
$sql1 = mysql_query("select rp, adm, bonus from transfer where id='$kode'");
		$data = mysql_fetch_row($sql1);
		$bayar = $data[0];
		$adm = $data[1];
		$jmltrf = $data[2];
		?>
<table width="95%" border="0" align="center" cellpadding="5" cellspacing="0">
  <tr>
    <td colspan="11" align="center" style="padding:0"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding:0; margin:0">
      <tr>
        <td width="80%"><form action="" method="post" name="form1" id="form1" style="margin:0; padding:0">
          <label> Status Withdrawl :
            <select name="select" onchange="location =  this.options[this.selectedIndex].value" class="form">
            <option value="?m=withdrawl" selected="selected" <? echo $pilih; ?>>Semua</option>
            <option value="?m=withdrawl&amp;kat=0&amp;sel2=<?= $sel; ?>" <? echo $sel2; ?>>Pending</option>
            <option value="?m=withdrawl&amp;kat=1&amp;sel3=<?= $sel; ?>" <? echo $sel3; ?>>Done</option>
          </select>
          </label>
          &nbsp;&nbsp;
        </form></td>
<?php

$ettyf= mysql_query("select sum(bonus) as total from transfer where valid=1 and status=1 and ignored=0");
$data = mysql_fetch_array ($ettyf);

?>
        <td width="20%"><b>Total: <?php echo number_format($data['total'],0,",","."); ?></b></td>
      </tr>
    </table></td>
  </tr>
  <tr class="tbl_header">
    <td width="4%" align="center">#</td>
    <td width="8%" align="center">Tanggal</td>
    <td width="9%" align="center">ID Member </td>
    <td width="16%" align="center">Nama Lengkap</td>
    <td width="19%" align="center">Data rekening member  </td>
    
    <td width="11%" align="center">Total Bonus </td>
	
    <td width="8%" align="center">Adm</td>
    <td width="9%" align="center">Jumlah Transfer </td>
    <td width="8%" align="center">Status</td>
    <td width="8%" align="center">Action</td>
  </tr>
<?

$j=$db->num_rows();
$nom =1 + $start;
//while($row = $db->fetch_row()) {
for($i=0;$i<$j;$i++) {
	$user = $db->result($i, "a.userid");
	if(is_odd($i) > 0) {
		$class = "tblrow_ganjil";
	} else {
		$class = "tblrow_genap";
	} 	
	if( $db->result($i, "valid") > 0) {
		$aktif = "<a href='#' onclick=\"confirmation('". $db->result($i, "id")."', 'activation', 'Disable')\" style='cursor:hand'>DONE</a>";
	} else {
		$aktif = "<a href='#' onclick=\"confirmation('".$db->result($i, "id")."', 'activation', 'Activated')\" style='cursor:hand'><img src='images/publish_x.png' title='Change to Active Transfer' border=0 /></a>";
	}
$tgl = $db->result($i, "tglbayar");	
$sql=mysql_query("select a.tgl_daftar, b.paket from member as a inner join upline as b on a.username=b.username where a.username='$user'");
$dt = mysql_fetch_row($sql);
$tgaktif = $dt[0];	
$dtfrom2 = $tgaktif;
$dtto = date("Y-m-d");
if($dt[1] > 1) {
	$total0 = $db->komisipaket($user, "AND (tglbayar BETWEEN '$dtfrom' AND '$dtto')");	
} else {
	$total0 = $db->totalkomisi( $user, "AND (tglbayar BETWEEN '$tgaktif' AND '".$db->result($i, "tglbayar")."') and status=0");
}	
$widrl = $db->bayarkomisi($user, "AND (tglbayar BETWEEN '$tgaktif' AND '".$db->result($i, "tglbayar")."')");
$total0 = $total0 - $widrl;

	$tujuan = $db->result($i, "tujuan");
$tw = $tw + $total0;
?>
 
  <tr class="<?= $class; ?>">
    <td width="4%"><?= $nom; ?> </td>
    <td width="8%"><?= date("d-m-Y", strtotime( $tgl)); ?></td>
    <td width="9%"><a href="?m=member&page=detilkomisi&bulan=<?= $bln; ?>&tahun=<?= $thn; ?>&mid=<?= $user; ?>"><?=  $user; ?></a></td>
    <td><?= $db->result($i, "nama"); ?></td>
    <td><?= $db->result($i, "bank"); ?>-<?= $db->result($i, "norek"); ?>-<?= $db->result($i, "an"); ?></td>
    
   
    <td align="right">
      <div align="right">
        <?= rupiah($db->result($i, "bonus")); ?>
    </div></td>
   
	<td align="right"><?= rupiah($db->result($i, "adm")); ?></td>
    <td align="right"><?= rupiah($db->result($i, "rp")); ?></td>
    <td align="center"><?= $aktif; ?></td>
    <td align="right"><a href="?m=historywithdrawl&del=1&id=<?=$i ?>"><img src="/solutionprofit_admin/images/icon-32-delete_resize.png"></a></td>
  </tr>
<?
	$nom++;
	}
?>	  
</table>
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
  <a href="?m=withdrawl&kat=<?= $kat; ?>&show=1" style="font-size:10px; color:#0000CC"><< Awal </a> | <a href="?m=withdrawl&kat=<?= $kat; ?>&show=<?= $previous; ?>" style="font-size:10px; color:#0000CC">< Sebelumnya </a> |
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
[ <a href="?m=withdrawl&kat=<?= $kat; ?>&show=<?= $i; ?>" style="font-size:10px; color:#0000CC">
<?= $i; ?>
</a> ]
<?php
		
		}
	
	}

}

if ($display < $paging) {

	$next = $display + 1;
	
?>
| <a href="?m=withdrawl&kat=<?= $kat; ?>&show=<?= $next; ?>" style="font-size:10px; color:#0000CC">Selanjutnya ></a> | <a href="?m=withdrawl&kat=<?= $kat; ?>&show=<?= $paging; ?>" style="font-size:10px; color:#0000CC">Terakhir >></a>
<?php

}
//
?>
    </td>
  </tr>
</table>
<?
	break;
	
	case activation :

if($action == "Disable") {

		$db->update("transfer", "status=0", "id='$mid'");
		echo "<meta http-equiv='refresh' content='0;URL=?m=withdrawl'>";
		} else { 
		$sqlx = mysql_query("select id, userid , rp from transfer where id='$mid' and valid=0");
		$dtax = mysql_fetch_row($sqlx);
		$idx = $dtax[0];
		$userx = $dtax[1];
		$bonus = $dtax[2];
		

		$db->update("transfer", "valid=1", "id='$mid'");
		
$hpx=$db->dataku("hp", $userx);	
$bayarx = rupiah($bonus);
$message="".$userx." Sukses Transfer Bonus ".$bayarx." dari solutionprofit.com Terima kasih" ;

$db->smsnotifikasi ($hpx , $message) ;

echo "<meta http-equiv='refresh' content='0;URL=?m=withdrawl'>";
		
	}	
		
}

	
?>		
<?
} else {
echo "<meta http-equiv=\"refresh\" content=\"1; url=illegal.html\">";
}
?>