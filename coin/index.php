<?
foreach ($_REQUEST AS $key => $value) { ${$key} = $value; }
session_start();
if($page == "logout")
	{
		$user_session="";
		$user_password="";
		$user_status="";
		$user_blokir="";
		session_destroy();
		header("location:../login.php");
	}
if(isset( $_SESSION['user_session'])){
include "../geb_database.php";
include "../geb_utama_coin.php";
$db = new db_mysql($server_name, $userdb, $passdb, $databasename,"");
include "../plus_inc.php";
include "template_member.php";
} else {
	header("location:../");
//include "../";
}
?>