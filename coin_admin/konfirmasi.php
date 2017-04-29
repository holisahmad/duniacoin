<?PHP

if(isset( $_SESSION['valid_admin']))

  {

?>
<script type="text/javascript">

<!--

function confirmation(noid) {

	var answer = confirm("Are You sure to delete this Konfirmasi ?")

	if (answer){

		//alert("Bye bye!")

		window.location = "?m=konfirmasi&page=delete&id=" + noid;

		

	}

	

}

//-->

</script>
<style type="text/css">
<!--
.style1 {
	font-size: 10px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	color: #FF0000;
}
-->
</style>


<h2 align="center"><img src="images/icon-48-user.png" width="48" height="48" align="absmiddle" /> Data Konfirmasi Transfer</h2>

<div id="menu_button2"></div>



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



	$numrows = $db->count_records("konfirmasi", $filter);	

	$db->select("id, trx, username, pengirim, nominal, penerima, foto, status, tgl", "konfirmasi", "", "tgl DESC");



?>

<table width="100%" border="0" cellspacing="0" cellpadding="5">

  

  <tr class="tbl_header">

    <td width="4%" align="center">#</td>

    <td width="12%" align="center">Kode Transaksi</td>
    <td width="16%" align="center">Pengirim Konfirmasi</td>

    <td width="17%" align="center">Tgl</td>

    <td width="19%" align="center"> Konfirmasi Transfer Untuk</td>
    <td width="20%" align="center">Klik Untuk Melihat Scan Bukti Transfer</td>

    <td width="12%" align="center">Status</td>
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

	if($db->result($i, "status") > 0) {

		$img = "<a href='?m=konfirmasi&page=publish&pub=0&id=".$db->result($i, "id")."'><img src='images/tick.png' border=0 title='Click to Unpublish'></a>";

	} else {

		$img = "<a href='?m=konfirmasi&page=publish&pub=1&id=".$db->result($i, "id")."'><img src='images/publish_x.png' border=0 title='Click to Publish'></a>";

	} 	

?>

 

  <tr class="<?= $class; ?>">

    <td width="4%" valign="top"><?= $nom; ?> </td>

    <td width="12%" align="center" valign="top"><?= $db->result($i, "trx"); ?></td>
    <td width="16%" align="center" valign="top"><?= $db->result($i, "pengirim"); ?></td> 

    <td align="center" valign="top"><?= $db->result($i, "tgl"); ?></td>

    <td align="center" valign="top"><?= $db->result($i, "username"); ?> - 
    <?= $db->result($i, "penerima"); ?></td>
    <td valign="top"><div align="center"><a href="?m=konfirmasi&page=addnew&edit=1&id=<?= $db->result($i, "id"); ?>">
      <?= rupiah($db->result($i, "nominal")); ?>
    </a></div></td>

   

    <td align="center" valign="top">
      
      
      
      
      
    <?= $img; ?></td>
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

  <a href="?m=konfirmasi&kat=<?= $kat; ?>&show=1" style="font-size:10px; color:#0000CC"><< Awal </a> | <a href="?m=konfirmasi&kat=<?= $kat; ?>&show=<?= $previous; ?>" style="font-size:10px; color:#0000CC">< Sebelumnya </a> |

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

[ <a href="?m=konfirmasi&kat=<?= $kat; ?>&show=<?= $i; ?>" style="font-size:10px; color:#0000CC">

<?= $i; ?>

</a> ]

<?php

		

		}

	

	}



}



if ($display < $paging) {



	$next = $display + 1;

	

?>

| <a href="?m=konfirmasi&kat=<?= $kat; ?>&show=<?= $next; ?>" style="font-size:10px; color:#0000CC">Selanjutnya ></a> | <a href="?m=konfirmasi&kat=<?= $kat; ?>&show=<?= $paging; ?>" style="font-size:10px; color:#0000CC">Terakhir >></a>

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

		$db->select("id, trx, username, pengirim, nominal, penerima, foto, status, tgl", "konfirmasi", "id=$id");
		$foto = $db->result(0, "foto");
		$username = $db->result(0, "username");
		$pengirim = $db->result(0, "pengirim");
		$nominal = $db->result(0, "nominal");
		$penerima = $db->result(0, "penerima");
		$trx = $db->result(0, "trx");

	}	

	

?>

<form action="?m=konfirmasi&amp;page=submit" method="post" enctype="multipart/form-data">

  <div align="center">

    <center>

      <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="70%" id="AutoNumber1" bordercolor="#EDEDE9">

        <tr class="tbl_header">

          <td width="100%" align="center"><?

		  if($act == 1 or $act) {

?>

<div id="notice"><img src="images/notice-info.png" width="29" height="29" align="absmiddle" />Data telah berhasil diupdate ! </div>

	<?

	}

	?>

		  

		  

		  <b><font face="Arial">UPDATE 

            DATA </font></b></td>

        </tr>

        <tr>

          <td width="100%" style="border-style: none; border-width: medium"><div align="center">

              <table width="100%" border="0" cellspacing="0" cellpadding="1">
                <tr>

                <td width="38%" align="right">Pengirim Konfirmasi  : </td>

                <td width="62%"><input name="pengirim" type="text" class="form" id="pengirim" value="<?= $pengirim; ?>" size="30" />

                    <input name="id" type="hidden" class="form" id="id" value="<?= $id; ?>" size="10" />

                  <label></label></td>

              </tr>
                <tr>
                  <td align="right">Nomor Transaksi : </td>
                  <td><input name="trx" type="text" class="form" id="trx" value="<?= $trx; ?>" size="30" /></td>
                </tr>

              <tr>

                <td align="right">Nominal Transfer : </td>

                <td><input name="nominal" type="text" class="form" id="nominal" value="<?= rupiah($nominal); ?>" size="30" /></td>

              </tr>

              <tr>

                <td align="right">Username Penerima Transfer  : </td>

                <td><input name="username" type="text" class="form" id="username" value="<?= $username; ?>" size="30" /></td>

              </tr>
              <tr>
                <td align="right">Nama Anggota  Penerima Transfer  : </td>
                <td><input name="penerima" type="text" class="form" id="penerima" value="<?= $penerima; ?>" size="30" /></td>
              </tr>

              <tr>

                <td align="right">Scan Bukti Transfer : </td>

                <td><label>

                  <?

		  	if($foto <> "") {

		?>
                  <img src="../bukti_gf/<?= $foto; ?>" alt="<?= $nama; ?>" /><br />

                  <?

		 } else {

		 ?>
		 <img src="../bukti_gf/<?= $foto; ?>" alt="<?= $nama; ?>" /><br />
		 <?
		 }
		 ?>
                </label>

                    </td>

              </tr>

            </table>

              <p class="style1">&nbsp;</p>
            </div></td>

        </tr>

      </table>

    </center>

  </div>

</form>

<?	

	break;
		case publish :

		$db->update("konfirmasi", "status='1'", "id='$id'");

		echo "<meta http-equiv='refresh' content='0;URL=?m=konfirmasi'>";

	break;

	case delete :

		$db->delete("konfirmasi", "id='$id'");

		echo "<meta http-equiv='refresh' content='0;URL=?m=konfirmasi'>";

	break;	

}		

?>
<?
} else {
echo "<meta http-equiv=\"refresh\" content=\"1; url=illegal.html\">";
}
?>


