<?php


    
include "geb_database.php";
include "geb_utama.php";
$db= new db_mysql($server_name, $userdb, $passdb, $databasename,"");
include "plus_inc.php";


 $user_session ="king";
		
  $date1= (date("Y-m-d"));
  $date2=  $db->dataku("tgl_reinves", $user_session);
  $datetime1 = new DateTime($date1);
  $datetime2 = new DateTime($date2);
  $difference = $datetime1->diff($datetime2);
  echo $difference->days;
 
 
  ?>