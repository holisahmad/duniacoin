<?php
if(isset($_GET['act'])) {
    switch($_GET['act']) {
        case 'add':
            if(!isset($_POST['name'])||empty($_POST['name'])) {
                $empty = 1;
                break;
            }
            if(!isset($_POST['price'])||empty($_POST['price'])) {
                $empty = 1;
                break;
            }
            if(!isset($_POST['catid'])||empty($_POST['catid'])) {
                $empty = 1;
                break;
            }
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $catid = mysqli_real_escape_string($conn, $_POST['catid']);
            $price = mysqli_real_escape_string($conn, $_POST['price']);
            $n = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM products WHERE name='$name' AND catid='$catid'"));
            if($n>=1) {
                $exist = 1;
                break;
            }
            $q = mysqli_query($conn, "INSERT INTO products VALUES(DEFAULT, '$catid', '$name', '$price')");
            $success = 1;
        break;  

        case 'delete':
            if(!isset($_GET['id'])||empty($_GET['id'])) {
                break;
            }
            $id = mysqli_real_escape_string($conn, $_GET['id']);
            $q = mysqli_query($conn, "DELETE FROM products WHERE id='$id'");
        break;
    }
}

?>
<div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Tambah Produk</h3></div>
                <div class="panel-body">
<?php if(isset($exist)) { ?>
<div class="alert alert-danger">
  <strong>Error!</strong> Produk ini sudah ada dalam database.
</div>
<?php } elseif(isset($success)) { ?>
<div class="alert alert-success">
  <strong>Berhasil!</strong> berhasil menambah produk.
</div>
<?php } elseif(isset($empty)) { ?>
<div class="alert alert-danger">
  <strong>Error!</strong> Jangan kosongkan form.
</div>
<?php } ?>
                    <form action="?do=products&act=add" method="post">
                        <div class="form-group">
  <label for="sel1">Pilih Kategori:</label>
  <select class="form-control" name="catid">

                        <?php $q = mysqli_query($conn, "SELECT * FROM category"); 
                        while($row = mysqli_fetch_object($q)) {
 echo "<option value='$row->id'>$row->name</option>";                       
} ?>
  </select>
</div>
                        <div class="form-group">
                            <label class="control-label" for="text-input">Nama Produk</label>
                            <input class="form-control" name="name" type="text" id="text-input" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="text-input">Harga</label>
                            <input class="form-control" name="price" type="text" id="text-input" required>
                        </div>
                        <div class="form-group"></div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Tambah Produk</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID </th>
                            <th>Kategori</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Aksi </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $q = mysqli_query($conn, "SELECT * FROM products"); 
                        while($row = mysqli_fetch_object($q)) {
                        ?>
                        <tr>
                            <td><?php echo $row->id ?> </td>
                            <td><?php $a = mysqli_fetch_array(mysqli_query($conn, "SELECT name FROM category WHERE id='$row->catid'")); echo $a['name']; ?> </td>
                            <td><?php echo $row->name ?> </td>
                            <td><?php echo $row->price ?></td>
                            <td><a href="?do=products&act=delete&id=<?php echo $row->id ?>"><button type="button" class="btn btn-danger btn-xs">Hapus Kategori</button></a></td>   
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>