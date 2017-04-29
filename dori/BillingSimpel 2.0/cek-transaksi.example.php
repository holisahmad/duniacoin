<?php
if(isset($_GET['trx'])):
?>
<iframe src="cek-transaksi.php?trx=<?php echo $_GET['trx'] ?>" width="100%" height="100%"></iframe>
<?php else: ?>
<div class="col-lg-8 col-lg-offset-2" align="center">
<form method="get" action="">
<div class="form-group">
  <label for="usr">Nomor Transaksi:</label>
  <input name="trx" type="text" class="form-control" id="usr">
</div><br/>
 <input type="submit" class="btn btn-success btn-lg" value="Cek Transaksi" />
</form>
<?php endif; ?>