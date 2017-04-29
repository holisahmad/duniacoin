<?php
$ip=$_SERVER["REMOTE_ADDR"];
$db->insert("click", "", "'$ref', '$clientdate', '$clienttime', '$clientbrowser', '$ip', '$clienturl', ''");
?>
<?php
$db->select("title, maintext", "content", "title='infosms' and published=1");

$ttl = $db->result(0, "title");	
$te = $db->fetch_array();
$tot = $db->num_rows();
for($i=0;$i<$tot;$i++) {
	echo $db->result($i, "maintext");	
}		 	
?>