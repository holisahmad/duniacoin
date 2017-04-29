<?
      $sbl=mysql_query("select * from gh_start where username='$user_session' order by id");
	  while($row=mysql_fetch_row($sbl)) {
	  ?>
<?      
if($row[47]>0){
include "gh_sukses_history.php";
} else {
include "gh_menunggu_history.php";
}
?>
<?
	  }
	  ?>