<?PHP

if(isset( $_SESSION['valid_admin']))

  {

?>

<?
//*********************************************************************************
// Original Script By : Budi Haeruman, S.Pd Di Jual melalui http://anekascript.us
// Please Call / SMS : 081323779601 (budihaeruman@ymail.com)
// Juga Menerima Jasa Pembuatan Website Bisnis
//*********************************************************************************
?>
<?
if($type == "content") {
	$jdlhlm = "Category Manager";
} else if($type == "faq") {
	$jdlhlm = "FAQ Category";
} else {	
	$jdlhlm = "Product Category";
}	
?>
<script type="text/javascript">
<!--
function confirmation(noid) {
	var answer = confirm("Are You sure to delete this Category?")
	if (answer){
		//alert("Bye bye!")
		window.location = "?m=category&page=delete&no=" + noid;
		
	}
	
}
//-->
</script>
<h2><img src="images/icon-48-article.png" width="48" height="48" align="absmiddle"> <?= $jdlhlm; ?></h2>
<?
switch($page) {
	default :
?>	
<div id="menu_button">
  <ul>
    <li><a href="?m=category&page=addnew&type=<?= $type; ?>">Add New Category</a></li>
  </ul>
</div>
<table width="90%" border="0" align="center" cellpadding="5" cellspacing="0">
  <tr class="tbl_header">
    <td width="5%" align="center">#</td>
    <td width="6%" align="center">ID</td>
    <td width="59%" align="center">Title</td>
    <td width="16%" align="center">Published</td>
    <td width="14%" align="center">&nbsp;</td>
  </tr>
<?
$db->select("id, parent_id, title, published", "categories", "section='$type' and parent_id=0", "title");

$j=$db->num_rows();
for($i=0;$i<$j;$i++) {
	$nom = $i + 1;
	$lid = $i - 1;
	if(is_odd($i) == 0) {
		$class = "tblrow_ganjil";
	} else {
		$class = "tblrow_genap";
	} 	
	if($db->result($i, "published") > 0) {
		$img = "<a href='?m=category&page=publish&pub=0&no=".$db->result($i, "id")."'><img src='images/tick.png' border=0 title='Click to Unpublish'></a>";
	} else {
		$img = "<a href='?m=category&page=publish&pub=1&no=".$db->result($i, "id")."'><img src='images/publish_x.png' border=0 title='Click to Publish'></a>";
	} 	
	
?>
 
  <tr class="<?= $class; ?>">
    <td width="5%"><?= $nom; ?> </td>
    <td width="6%"><?= $db->result($i, "id"); ?></td>
    <td>
   
   <a href="?m=category&page=addnew&edit=1&type=<?= $type; ?>&no=<?= $db->result($i, "id"); ?>"><?= $db->result($i, "title"); ?></a></td>
    <td align="center"><?= $img; ?></td>
    <td align="center"><div id="delete"><a href="#" onClick='confirmation(<?= $db->result($i, "id"); ?>)' style='cursor:hand; padding-left:15px'>Delete</a></div></td>
  </tr>
<?
	$sql = mysql_query("select id, parent_id, title, published from categories where section='$type' and parent_id=".$db->result($i, "id")."");
	$nome = $nom + 1;
		while($row=mysql_fetch_row($sql)) {
		?>
			<tr class="<?= $class; ?>">
        <td width="5%"><?= $nome; ?> </td>
        <td width="6%"><?= $row[0]; ?></td>
        <td>&nbsp;|
       
       <a href="?m=category&page=addnew&edit=1&type=<?= $type; ?>&no=<?= $row[0]; ?>"><?= $row[2]; ?></a></td>
        <td align="center"><?= $img; ?></td>
        <td align="center"><div id="delete"><a href="#" onClick='confirmation(<?= $row[0]; ?>)' style='cursor:hand; padding-left:15px'>Delete</a></div></td>
      </tr>
            
        <?  
		$nome++;  
		}	

	}
?>	  
</table>
<p>&nbsp;</p>
<?
	break;
	case addnew :
	//include("fckeditor/fckeditor.php") ;
		if($edit > 0) {
			$db->select("id, parent_id, title, published", "categories", "id='$no'");
			$title = $db->result($i, "title"); 
			$publish = $db->result($i, "published"); 
			$pid = $db->result($i, "parent_id"); 
			$judul = "Edit a Category";
		} else {
			$author = $valid_admin; 
			$crdate = $clientdate; 
			$judul = "Create New Category";
		}		
?>
<form name="form_category" method="post" action="?m=category&page=submit">
  <table width="98%" border="0" align="center" cellpadding="5" cellspacing="0">
    <tr>
      <td colspan="4"><h4><?= $judul; ?></h4></td>
    </tr>
    <tr>
      <td align="right">Parent :</td>
      <td><label>
        <select name="parent" id="parent">
          <option value="0">0</option>
    <?
	$db->select("id, parent_id, title, published", "categories", "section='$type' and parent_id=0"); 
	while($data = $db->fetch_row()) {
		if($pid == $data[0]) {
			$sel = "selected";
		} else {
			$sel = "";
		}		
		echo "<option value=$data[0] $sel>$data[2]</option>";
		$sql = mysql_query("select id, parent_id, title, published from categories where section='$type' and parent_id=$data[0]");
		while($row=mysql_fetch_row($sql)) {
			echo "<option value=$row[0]>&nbsp;| $row[2]</option>";
		}	
	}
	?>	     
        </select>
      </label></td>
      <td align="right">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td width="10%" align="right">Title :</td>
      <td width="52%"><label>
        <input name="title" type="text" id="title" value="<?= $title; ?>" size="50">
      </label></td>
      <td width="16%" align="right">&nbsp;</td>
      <td width="22%">&nbsp;</td>
    </tr>
    <tr>
      <td align="right" valign="top">Published :</td>
      <td colspan="3"><p>
        <label>
          <input name="publish" type="radio" id="publish_0" value="1" checked>
          Yes</label> 
        <label>
          <input type="radio" name="publish" value="0" id="publish_1">
          No</label>
        <input name="no" type="hidden" id="no" value="<?= $no; ?>" size="20">
        <input name="edit" type="hidden" id="edit" value="<?= $edit; ?>" size="20">
        <input name="type" type="hidden" id="type" value="<?= $type; ?>" size="20" />
        <br>
      </p></td>
    </tr>
    <tr>
      <td align="right">&nbsp;</td>
      <td colspan="3"><label>
        <input type="submit"  value="SAVE" class="button">
        
      </label><label><input type="button" name="cancel" id="cancel" value="CANCEL" onClick="javascript:history.go(-1)" class="cancelbutton">
      </label></td>
    </tr>
  </table>
</form>
  <script language="JavaScript" type="text/javascript">
 var frmvalidator = new Validator("form_category");
 frmvalidator.addValidation("title","req","Title harus diisi, silahkan ulangi lagi!");


</script>  
<?	
	break;
	case submit :
		
		if($edit > 0) {
			$db->update("categories", "parent_id='$parent', title='$title', published='$publish'", "id='$no'");
	} else {
			$db->insert("categories", "parent_id, title, alias, section, published", "'$parent', '$title', '$title', '$type', $publish");
	}		
			echo "<meta http-equiv='refresh' content='0;URL=?m=category&type=content'>";
	break;
	
	case publish :
		$db->update("categories", "published='$pub'", "id='$no'");
		echo "<meta http-equiv='refresh' content='0;URL=?m=category&type=content'>";
	break;
	case delete :
		//echo "delete no $no";
		$db->delete("categories", "id=$no");
		echo "<meta http-equiv='refresh' content='0;URL=?m=category&type=content'>";
	break;	
	
	case frontpage :
		$db->update("categories", "frontpage='$pub'", "id='$no'");
		echo "<meta http-equiv='refresh' content='0;URL=?m=category&type=content'>";
	break;
}
?>	
<?
} else {
echo "<meta http-equiv=\"refresh\" content=\"1; url=illegal.html\">";
}
?>