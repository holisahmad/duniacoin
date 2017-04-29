<?php


include "geb_database.php";
include "geb_utama.php";
$db= new db_mysql($server_name, $userdb, $passdb, $databasename,"");
include "plus_inc.php";


$tgl_skr = (date("Y-m-d"));

//$username = "revita2016";

$db->update("automaintain", "status='1'", "tanggal='$tgl_skr'") ;

$db->update("komisi", "status='1'", "tglbayar='$tgl_skr'") ;
	


function IntervalDays($CheckIn,$CheckOut){
$CheckInX = explode("-", $CheckIn);
$CheckOutX =  explode("-", $CheckOut);
$date1 =  mktime(0, 0, 0, $CheckInX[1],$CheckInX[2],$CheckInX[0]);
$date2 =  mktime(0, 0, 0, $CheckOutX[1],$CheckOutX[2],$CheckOutX[0]);
$interval =($date2 - $date1)/(3600*24);
// returns numberofdays
return  $interval ;
}	
 
 
 


$query="select * from member where status='1' order by id desc" ;
$resul=mysql_query($query);

while ($rowf=mysql_fetch_array($resul)) {
$id=$rowf["id"];
$username =$rowf["username"];
$sms1 = $rowf["sms1"];
$hp = $rowf["hp"];

 
  $date1= (date("Y-m-d"));
  $date2 = $rowf["tgl_reinves"];
  
    $difference = IntervalDays($date1,$date2) ; 
   
    if ( $difference == 2 ) {
    
$message= "solutionprofit: ".$username." Masa inves Anda akan Berakhir 2 Hari lagi,Terima Kasih.";
$db->smsnotifikasi ($hp , $message) ;




 } 


}


 
$hp2 ="085760525722";
$message2 = "Proses Auto Solution Terima Kasih.";
$db->smsnotifikasi ($hp2 , $message2) ;
 
 
 ?>