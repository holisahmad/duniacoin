 <?php
if(isset($_GET['act'])) {
    switch($_GET['act']) {
        case 'admin':
            if(!isset($_POST['username'])||empty($_POST['username'])) {
                $empty = 1;
                break;
            }
            if(!isset($_POST['secret'])||empty($_POST['secret'])) {
                $empty = 1;
                break;
            }
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $secret = mysqli_real_escape_string($conn, $_POST['secret']);
            $q = mysqli_query($conn, "UPDATE settings SET val='$username' WHERE name='admin_username'");
            $q = mysqli_query($conn, "UPDATE settings SET val='$secret' WHERE name='admin_password'");
            $success = 1;
        break;
    }
}
?>
  <h1>Dashboard </h1>
  
        <div class="col-md-8">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Total Orderan</th>
                        <th><?php  echo mysqli_num_rows(mysqli_query($conn, "SELECT id FROM `order`")); ?> </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Orderan Hari Ini</td>
                        <td><?php $date = date('Y-m-d'); echo mysqli_num_rows(mysqli_query($conn, "SELECT id FROM `order` WHERE DATE(datetime)='$date'")); ?></td>
                    </tr>
                    <tr>
                        <td>Orderan Kemarin</td>
                        <td><?php $date = date('Y-m-d', strtotime(date('Y-m-d') . '-1 days')); echo mysqli_num_rows(mysqli_query($conn, "SELECT id FROM `order` WHERE DATE(datetime)='$date'")); ?></td>
                    </tr>
                    <tr>
                        <td>Alamat IP</td>
                        <td><?php echo $_SERVER['REMOTE_ADDR']; ?> </td>
                    </tr>
                    <tr>
                        <td>BillingSimpel</td>
                        <td>2.0</td>
                    </tr>
                </tbody>
            </table>
        </div></div>

        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">User Admin</h3></div>
                <div class="panel-body">
<?php if(isset($success)) { ?>
<div class="alert alert-success">
  <strong>Berhasil!</strong> berhasil mengubah user admin.
</div>
<?php } elseif(isset($empty)) { ?>
<div class="alert alert-danger">
  <strong>Error!</strong> Jangan kosongkan form.
</div>
<?php } ?>
                    <form action="?do=dashboard&act=admin" method="post">
                        <div class="form-group">
                            <label class="control-label" for="text-input">Username Admin</label>
                            <input class="form-control" name="username" type="text" id="text-input" value="<?php $s = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM settings WHERE name='admin_username'")); echo $s['val']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="text-input">Password Admin</label>
                            <input class="form-control" name="secret" type="password" id="text-input" required>
                        </div>
                        <div class="form-group"></div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Ubah Admin</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>