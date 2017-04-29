<?
//*********************************************************************************
// Original Script By : Budi Haeruman, S.Pd Di Jual melalui http://anekascript.us
// Please Call / SMS : 081323779601 (budihaeruman@ymail.com)
// Juga Menerima Jasa Pembuatan Website Bisnis
//*********************************************************************************
?>
<?

function myfetch($csql)
{
$nresult = myquery($csql);
return mysql_fetch_array($nresult);
}

# ==============================================================================
function myquery($csql)
{
include("../configdb_inc.php");
mysql_pconnect($server_name,$userdb,$passdb) or die( mysql_error());
mysql_select_db($databasename) or die (mysql_error());
$nresult = mysql_query($csql) or die("<b>Perintah SQL Salah</b><p>".$csql);
return $nresult;
}

?>