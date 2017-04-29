<?php
if(isset($_GET['act'])) {
    switch($_GET['act']) {
        case 'add':
            if(!isset($_POST['name'])||empty($_POST['name'])) {
                $empty = 1;
                break;
            }
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $n = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM category WHERE name='$name'"));
            if($n>=1) {
                $exist = 1;
                break;
            }
            $q = mysqli_query($conn, "INSERT INTO category VALUES(DEFAULT, '$name')");
            $success = 1;
        break;  

        case 'delete':
            if(!isset($_GET['id'])||empty($_GET['id'])) {
                break;
            }
            $id = mysqli_real_escape_string($conn, $_GET['id']);
            $q = mysqli_query($conn, "DELETE FROM category WHERE id='$id'");
        break;
    }
}

?>
<div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Tambah Kategori</h3></div>
                <div class="panel-body">
<?php if(isset($exist)) { ?>
<div class="alert alert-danger">
  <strong>Error!</strong> Kategori ini sudah ada dalam database.
</div>
<?php } elseif(isset($success)) { ?>
<div class="alert alert-success">
  <strong>Berhasil!</strong> berhasil menambah kategori.
</div>
<?php } elseif(isset($empty)) { ?>
<div class="alert alert-danger">
  <strong>Error!</strong> Jangan kosongkan form.
</div>
<?php } ?>
                    <form action="?do=category&act=add" method="post">
                        <div class="form-group">
                            <label class="control-label" for="text-input">Nama Kategori</label>
                            <input class="form-control" name="name" type="text" id="text-input" required>
                        </div>
                        <div class="form-group"></div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Tambah Kategori</button>
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
                            <th>Nama Kategori</th>
                            <th>Aksi </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $q = mysqli_query($conn, "SELECT * FROM category"); 
                        while($row = mysqli_fetch_object($q)) {
                        ?>
                        <tr>
                            <td><?php echo $row->id ?> </td>
                            <td><?php echo $row->name ?></td>
                            <td><a href="?do=category&act=delete&id=<?php echo $row->id ?>"><button type="button" class="btn btn-danger btn-xs">Hapus Kategori</button></a></td>   
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>