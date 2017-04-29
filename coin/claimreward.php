<?php


include "../geb_database.php";
include "../geb_utama.php";
$db = new db_mysql($server_name, $userdb, $passdb, $databasename,"");
include "../plus_inc.php";

if (isset ($_POST)){
$current_omset = $_POST['current_omset'];
$user = $_POST['user'];
$reward_id = $_POST['reward_id'];
$useleft = $_POST['useleft'];
$useright = $_POST['useright'];

if (mysql_query ("insert into claimrewards set current_omset='$current_omset', user='$user', reward_id='$reward_id', useleft='$useleft', useright='$useright', status=0, date_claim=now()")){
echo json_encode (true);
}else{
echo json_encode (false);
}

}

?>