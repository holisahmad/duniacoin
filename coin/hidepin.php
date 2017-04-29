<?
	if($user_status > 0) {
?>

<?
$user = $user_session;
$data = ereg_replace("{NAMAMEMBER}", $user_nama, $data);
$data = ereg_replace("{USERNAME}", $user, $data);
?>
<?
$db->update("card", "jenis='1'", "dealer='$mid'");
echo "<meta http-equiv=\"refresh\" content=\"1; url=?e=mypinaktivation\">";
?>
<?
} else {
	include "index0.php";
}
?>

  