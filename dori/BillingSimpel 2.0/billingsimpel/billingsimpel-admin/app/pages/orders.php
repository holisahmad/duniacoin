<?php
if(isset($_GET['act'])) {
    switch($_GET['act']) {
        case 'detail':
            if(!isset($_GET['id'])||empty($_GET['id'])) {
                break;
            }
            $id = mysqli_real_escape_string($conn, $_GET['id']);
            $q = mysqli_query($conn, "SELECT * FROM `order` WHERE id='$id'");
            $n = mysqli_num_rows($q);
            if($n<1) {
                break;
            }

            $a = $id;
        break;  

        case 'delete':
            if(!isset($_GET['id'])||empty($_GET['id'])) {
                break;
            }
            $id = mysqli_real_escape_string($conn, $_GET['id']);
            $q = mysqli_query($conn, "DELETE FROM `order` WHERE id='$id'");
        break;

        case 'proses':
            if(!isset($_GET['id'])||empty($_GET['id'])) {
                break;
            }
            $id = mysqli_real_escape_string($conn, $_GET['id']);
            $q = mysqli_query($conn, "UPDATE `order` SET status=3 WHERE id='$id'");
        break;

        case 'success':
            if(!isset($_GET['id'])||empty($_GET['id'])) {
                break;
            }
            $id = mysqli_real_escape_string($conn, $_GET['id']);
            $q = mysqli_query($conn, "UPDATE `order` SET status=4 WHERE id='$id'");
        break;
    }
}

?>
<h1>Kelola Orderan </h1>
<?php if(isset($a)) {
$s = mysqli_fetch_array($q);
?>
       <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Detail Pemesanan</h3></div>
                <div class="panel-body">
                   <table class="table table-striped table-bordered">
                <tbody>
                    <tr>
                        <td>ID</td>
                        <td><?php echo $s['id'] ?></td>
                    </tr>
                     <tr>
                        <td>Nomor</td>
                        <td><?php echo $s['trxno'] ?></td>
                    </tr>
                    <tr>
                        <td>Yang Diorder</td>
                        <td><?php $a = $s['pid']; $a = mysqli_fetch_array(mysqli_query($conn, "SELECT name FROM products WHERE id='$a'")); echo $a['name']; ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Order</td>
                        <td><?php echo $s['datetime'] ?></td>
                    </tr>
                     <tr>
                        <td>Total</td>
                        <td><?php echo $s['total'] ?></td>
                    </tr>
                     <tr>
                        <td>Status</td>
                        <td><?php switch($s['status']){ case 1: echo 'Belum Dibayar'; case 2: echo 'Dibayar'; break; break; case 3: echo 'Dalam Proses'; break; case 4: echo 'Selesai'; break; } ?></td>
                    </tr>
                    <?php
                    $sw = json_decode($s['formdata'], 1);
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
            <a href="?do=orders&act=delete&id=<?php echo $s['id'] ?>"><button type="button" class="btn btn-danger btn-sm">Hapus</button></a>
               <a href="?do=orders&act=proses&id=<?php echo $s['id'] ?>"><button type="button" class="btn btn-primary btn-sm">Set Dalam Proses</button></a>
                <a href="?do=orders&act=success&id=<?php echo $s['id'] ?>"><button type="button" class="btn btn-success btn-sm">Set Selesai</button></a>
                </div>
            </div>
        </div>
        <?php }  if(isset($a)) { ?>
<div class="col-md-8">
<?php } else { ?>
<div class="col-md-12">
<?php } ?>
<div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID </th>
                        <th>No.Transaksi </th>
                        <th>Yang Diorder</th>
                        <th>Total</th>
                        <th>Tanggal Order</th>
                        <th>Status </th>
                        <th>Aksi </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $q = mysqli_query($conn, "SELECT * FROM `order`");
                        while($row = mysqli_fetch_object($q)) {
                        ?>
                    <tr>
                        <td><?php echo $row->id ?></td>
                        <td><?php echo $row->trxno ?></td>
                        <td><?php $a = $row->pid; $a = mysqli_fetch_array(mysqli_query($conn, "SELECT name FROM products WHERE id='$a'")); echo $a['name']; ?></td>
                        <td><?php echo $row->total ?></td>
                        <td><?php echo $row->datetime ?></td>
                        <td><?php switch($row->status){ case 1: echo 'Belum Dibayar'; break; case 2: echo 'Dibayar'; break; case 3: echo 'Dalam Proses'; break; case 4: echo 'Selesai'; break; } ?></td>
                        <td><a href="?do=orders&act=detail&id=<?php echo $row->id ?>"><button type="button" class="btn btn-primary btn-xs">Detail Order &raquo;</button></a></td>   
                        
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
</div>

