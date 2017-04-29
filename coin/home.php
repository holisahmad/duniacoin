<?
	if($user_status > 0 and $user_blokir==0) {
?>

<div align="center">
  <table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td><p align="center" class="LEFT">Welcome <strong><font color="#FF0000"><?= $db->dataku("nama", $user_session); ?></font></strong> You Are Login As <strong><font color="#FF0000"><?= $user_session; ?></font></strong> </p>
      </tr>
  </table>
  <table width="800" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td><hr /></td>
    </tr>
    <tr>
      <td><p></p>
        <p></p>
        <?php
$db->select("title, maintext", "content", "published=1 and catid=1");
$ttl = $db->result(0, "title");	
$te = $db->fetch_array();
$tot = $db->num_rows();
for($i=0;$i<$tot;$i++) {
	echo $db->result($i, "maintext");	
}		 	
?>
	
   
    
    </p>
      <p>&nbsp;</p></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>    <?
} else {
	include "index0.php";
}
?>
  </p>
    </p>
</div>
</div>