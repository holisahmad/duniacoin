<?
foreach ($_REQUEST AS $key => $value) { ${$key} = $value; }
session_start();
if($page == "logout")
	{
		$valid_admin="";
		$admin_password="";
		session_destroy();
		header("location:../");
	}
  if(isset( $_SESSION['valid_admin']))
  {
include "../geb_database.php";
include "../geb_utama_coin.php";
$db = new db_mysql($server_name, $userdb, $passdb, $databasename,"");
include "../plus_inc.php";
include "template_admin.php";
} else {
	include "login.php";
}
?>