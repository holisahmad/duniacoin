<?php
include 'billingsimpel-admin/app/settings/config.php';
if ( isset( $_GET['trx'] ) ) {
  $number = mysqli_real_escape_string( $conn, trim( $_GET['trx'] ) );
  $n = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `order` WHERE trxno='$number'"));
  if($n<1) {
    die('Maaf Transaksi Tidak Ditemukan');
  }
  $q = mysqli_fetch_object( mysqli_query( $conn, "SELECT * FROM `order` WHERE trxno='$number'" ) );
  if ( !$q ) {
    header( 'Location: index.php' );
    die();
  }
} else {
    header( 'Location: index.php' );
    die();
}
?>
<style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #4CAF50;
    color: white;
}
 button {
  color: #900;
  border: 1px solid #900;
  font-weight: bold;
}

/* CSS */
.btn {
  color: #900;
  background: #FF0;
  font-weight: bold;
  border: 1px solid #900;
}

.btn:hover {
  color: #FFF;
  background: #900;
}
.btn:hover {
  cursor: pointer; /* cursor: hand; for IE5 */
}
</style>
<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<body>
<div align="center">
<div align="center" style="background-color:#FFFFFF;  margin-bottom: -1px;font-family: 'Open Sans';">
<br/><a href="index.php"><img height="100px" width="auto" src="#" alt="Powered By BillingSimpel by DimasPratama.com" /></a><br/>
<title>Transaksi <?php echo $q->trxno ?></title><br/>
 <a href="cek-transaksi.php?trx=<?php echo $q->trxno ?>"><input type="button" class="btn" value="Update Status Pesanan" /></a><br/>

<p>Nomor Transaksi:</p>
<h2 style="margin-top:-20px"><?php echo $q->trxno ?></h2>

<p style="margin-top:-10px;">Status Transaksi:</p>
<h2 style="margin-top:-20px"><?php switch($q->status){ case 1: echo 'Belum Dibayar'; break; case 2: echo 'Dalam Proses'; break; case 3: echo 'Selesai'; break; } ?></h2>

<p style="margin-top:-10px;">Total:</p>
<h2 style="margin-top:-20px"><?php echo $q->total; ?></h2>

          <table style="border-style:solid;border-width:1px;width:500px;">
                <tbody>
                        <tr>
                        <td>Produk</td>
                        <td><?php $a = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM products WHERE id='$q->pid'")); echo $a['name']; ?></td>
                      </tr>
                      <tr>
                        <td>Tanggal & Waktu</td>
                        <td><?php echo $q->datetime ?></td>
                      </tr>
                    <?php
                    $sw = json_decode($q->formdata, 1);
                    foreach($sw as $key=>$val) {
                    $key = str_replace('_', ' ', $key);
                    ?>
                     <tr>
                        <td><?php echo strip_tags(ucfirst($key)) ?></td>
                        <td><?php echo strip_tags(ucfirst($val)) ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
<?php
  if ( $q->status==1 ) {
?><br/><br/>
<hr style="border-top: #BCCACA dashed 2px;" />
<div>
<h4>Bayar Ke:</h4>
<strong>Total Transfer:</strong> <?php echo $q->total ?><br/>
<strong>Transfer Sebelum:</strong> <?php echo date('d M Y H:i', strtotime($q->datetime."+$transfer_hours hours"))?><br/><br/>
<?php 
foreach($bank as $key=>$val) { 
if(!$val['rekening']||!$val['nama']): continue; endif; ?>
<strong>Bank <?php echo $key ?></strong><br/>
<strong>Nomor Rekening:</strong> <?php echo $val['rekening'] ?><br/>
<strong>Atas Nama:</strong> <?php echo $val['nama'] ?><br/><br/>
<?php } ?>
<br/><strong>Transfer dengan total yang sama dengan diatas, jangan menggenapkan / membulatkan agar mempermudah transaksi.
<br/>Catat & simpan nomor transaksi untuk mengecek status transaksi.</strong><br/><br/><br/><br/>
<div align="center" style="color:#7f8c8d;">Cek Mutasi Powered by <a href='https://dimaspratama.com/CekMutasi/'>DimasPratama.com/CekMutasi</a></div>
            <br/><br/>
</div>


<?php
  } 
?>
</div>
</div>
</body>
<!-- Copyright 2016 DimasPratama.com (Powered by DimasPratama.com/CekMutasi/) -->