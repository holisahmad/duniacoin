<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<?php if(isset($_SESSION['valid_admin'])){ ?>
<table class="table table-bordered table-striped">
<thead>
<tr>
<th>No</th>
<th>Username</th>
<th>Nama</th>
<th>Current omset</th>
<th>U</th>
<th>Jenis reward</th>
<th>Tanggal klaim</th>
<th>Phone</th>
<th>Status</th>
</tr>
</thead>
<tbody>
<?php
$query = mysql_query ("select member.id, member.hp, member.nama, claimrewards.current_omset, claimrewards.user, claimrewards.useleft,claimrewards.useright, claimrewards.reward_id,claimrewards.status,claimrewards.date_claim from claimrewards,member where member.username=claimrewards.user");
if (mysql_num_rows($query) == 0){
?>
<tr>
<td colspan=9>Tidak ada</td>
</tr>
<?php }else{ 
$i =0;
while($data = mysql_fetch_array ($query)){
?>
<tr>
<td><?php echo $i+1 ?></td>
<td><?php echo $data['user'] ?></td>
<td><?php echo $data['nama'] ?></td>
<td><?php echo $data['current_omset'] ?></td>
<td><?php echo number_format($data['useright'],0,",",".") ?></td>
<td><?php echo $data['reward_id'] ?></td>
<td><?php echo $data['date_claim'] ?></td>
<td><?php echo $data['hp'] ?></td>
<td><?php echo $data['status'] ?></td>
</tr>
<?php $i++; } ?> 
</tbody>
</table>
<?php }
}else{
header ("location:/");
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
