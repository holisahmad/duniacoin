<?
//$db->aktivasibinary($username);
//$db->insert("transaksi", "", "'', '$kode', '$username', '$rpadmin', '$clientdate', 'Aktivasi Member : $username', 1");
$data = ereg_replace("{USERNAME}", $username, $data);
	$data = ereg_replace("{EMAIL}", $email, $data);
	$data = ereg_replace("{PASSWORD}", $pass1, $data);
	$data = ereg_replace("{NEWTOKEN}", $newtoken, $data);
	$data = ereg_replace("{HP}", $hp, $data);
	$data = ereg_replace("{NAMA}", $nama, $data);
?>
<h2 align="center">Congratulation ...! <br />New Member Has Been Created  ..!!</h2>
<p align="center"><strong>Username : 
  <?= $username; ?>
</strong></p>
<p align="center"><strong>Password : 
  <?= $pass1; ?>
</strong></p>
<p align="center"><strong>Your Token : 
  <?= $newtoken; ?>
</strong></p>
<p align="center">Data Token Tidak Terkirim Ke Email Harap di Catat dan Di Simpan Dengan Baik, <br />
Token Akan Di Gunakan Untuk Setiap Transaksi Di solutionprofit.com</p>
