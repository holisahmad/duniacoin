<?php
        $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
        $page = mysqli_real_escape_string($conn, $page);
        $limit = 25;
        $startpoint = ($page * $limit) - $limit;
        $title = 'Mutasi';
        $table = 'mutasi';
        $statement = "mutasi";
?>
<div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Statistik Mutasi</h3></div>
                <div class="panel-body"> <table class="table table-striped table-bordered">
                <tbody>
                    <tr>
                        <td>Total Mutasi</td>
                        <td><?php echo mysqli_num_rows(mysqli_query($conn, "SELECT id FROM mutasi")); ?></td>
                    </tr>
                    <tr>
                        <td>Mutasi Hari Ini Total</td>
                        <td><?php echo mysqli_num_rows(mysqli_query($conn, "SELECT id FROM mutasi WHERE date=CURDATE()")); ?></td>
                    </tr>
                     <tr>
                        <td>Mutasi Hari Ini (BCA)</td>
                        <td><?php echo mysqli_num_rows(mysqli_query($conn, "SELECT id FROM mutasi WHERE date=CURDATE() AND bank='BCA'")); ?></td>
                    </tr>
                    <tr>
                        <td>Mutasi Hari Ini (Mandiri)</td>
                        <td><?php echo mysqli_num_rows(mysqli_query($conn, "SELECT id FROM mutasi WHERE date=CURDATE() AND bank='Mandiri'")); ?></td>
                    </tr>
                    <tr>
                        <td>Mutasi Hari Ini (BNI)</td>
                        <td><?php echo mysqli_num_rows(mysqli_query($conn, "SELECT id FROM mutasi WHERE date=CURDATE() AND bank='BNI'")); ?></td>
                    </tr>
                    <tr>
                        <td>Mutasi Hari Ini (BRI)</td>
                        <td><?php echo mysqli_num_rows(mysqli_query($conn, "SELECT id FROM mutasi WHERE date=CURDATE() AND bank='BRI'")); ?></td>
                    </tr>
                </tbody>
            </table>
                </div>
            </div>
        </div>
        <div class="col-md-12">
             <nav>
         <?php
            echo makePagination($statement,$limit,$page, '?do='.$_GET['do'].'&');
        ?>
        </nav>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                        <th>ID</th>
                        <th>Bank</th>
                        <th>Deskripsi</th>
                        <th>Tipe</th>
                        <th>Total</th>
                        <th>Posisi Saldo</th>
                        <th>Tanggal</th>
                        <th>Tanggal & Waktu Pengecekan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $q = mysqli_query($conn, "SELECT * FROM {$statement} ORDER BY id DESC LIMIT {$startpoint} , {$limit}");
                            while($row = mysqli_fetch_object($q)) {
                        ?>
                        <tr>
                        <td><?php echo $row->id ?></td>
                        <td><?php echo $row->bank ?></td>
                        <td><?php echo $row->description ?></td>
                        <td><?php echo $row->type ?></td>
                        <td><?php echo $row->total ?></td>
                        <td><?php echo $row->balanceposition ?></td>
                        <td><?php echo $row->date ?></td>
                        <td><?php echo $row->checkdatetime ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table><br/>
                <div align="center">Cek Mutasi powered by <a href='https://dimaspratama.com/CekMutasi/'>DimasPratama.com/CekMutasi</a></div>
            </div>
        </div>