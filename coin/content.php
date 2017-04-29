
<script type="text/javascript">
<!--
function confirmation(noid) {
	var answer = confirm("Are You sure to delete this Article?")
	if (answer){
		//alert("Bye bye!")
		window.location = "?e=content&page=delete&no=" + noid;
		
	}
	
}
//-->
</script>
<h2><img src="../admin/images/icon-48-article.png" width="48" height="48" align="absmiddle"> Article Manager</h2>
<?
switch($page) {
	default :
?>	
<div id="menu_button">
  <ul>
    <li><a href="?e=content&page=addnew">Add New Article</a></li>
  </ul>
</div>
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr class="tbl_header">
    <td width="3%" align="center">#</td>
    <td width="3%" align="center">ID</td>
    <td width="41%" align="center">Title</td>
    <td width="9%" align="center">Published</td>
    <td width="10%" align="center">Frontpage</td>
    <td width="9%" align="center">Author</td>
    <td width="6%" align="center">Date</td>
    <td width="9%" align="center">Category</td>
    <td width="7%" align="center">&nbsp;</td>
  </tr>
<?
$db->select("id, title, created_by_alias, published, created, catid, frontpage", "content", "", "created DESC");

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
		$img = "<a href='?e=content&page=publish&pub=0&no=".$db->result($i, "id")."'><img src='../admin/images/tick.png' border=0 title='Click to Unpublish'></a>";
	} else {
		$img = "<a href='?e=content&page=publish&pub=1&no=".$db->result($i, "id")."'><img src='../admin/images/publish_x.png' border=0 title='Click to Publish'></a>";
	} 	
	//---frontpage
	if($db->result($i, "frontpage") > 0) {
		$frontpage = "<a href='?e=content&page=frontpage&pub=0&no=".$db->result($i, "id")."'><img src='../admin/images/tick.png' border=0 title='Click to Unpublish'></a>";
	} else {
		$frontpage = "<a href='?e=content&page=frontpage&pub=1&no=".$db->result($i, "id")."'><img src='../admin/images/publish_x.png' border=0 title='Click to Publish'></a>";
	} 
?>
 
  <tr class="<?= $class; ?>">
    <td width="3%"><?= $nom; ?> </td>
    <td width="3%"><?= $db->result($i, "id"); ?></td>
    <td><a href="?e=content&page=addnew&edit=1&no=<?= $db->result($i, "id"); ?>"><?= $db->result($i, "title"); ?></a></td>
    <td align="center"><?= $img; ?></td>
    <td align="center"><?= $frontpage; ?></td>
    <td><?= $db->result($i, "created_by_alias"); ?></td>
    <td><?= $db->result($i, "created"); ?></td>
    <td><?= category_name($db->result($i, "catid")); ?></td>
    <td align="center"><div id="delete"><a href="#" onClick='confirmation(<?= $db->result($i, "id"); ?>)' style='cursor:hand; padding-left:15px'>Delete</a></div></td>
  </tr>
<?
	}
?>	  
</table>
<p>&nbsp;</p>
<?
	break;
	case addnew :
	include("fckeditor/fckeditor.php") ;
		if($edit > 0) {
			$db->select("id, title, maintext, created_by_alias, published, created, catid", "content", "id='$no'");
			$title = $db->result($i, "title"); 
			$author = $db->result($i, "created_by_alias"); 
			$crdate = $db->result($i, "created"); 
			$publish = $db->result($i, "published"); 
			$catid = $db->result($i, "catid"); 
			$maintext = $db->result($i, "maintext"); 
			$judul = "Edit an Article";
		} else {
			$author = $valid_admin; 
			$crdate = $clientdate; 
			$judul = "Create New Article";
		}		
?>
<form action="?e=content&page=submit" method="post" name="konten">
  <table width="98%" border="0" align="center" cellpadding="5" cellspacing="0">
    <tr>
      <td colspan="4"><h4><?= $judul; ?></h4></td>
    </tr>
    <tr>
      <td width="10%" align="right">Title :</td>
      <td><label>
        <input name="title" type="text" id="title" value="<?= $title; ?>" size="50">
      </label></td>
      <td align="right">Created Date :</td>
      <td><input name="crdate" type="text" id="crdate" value="<?= $crdate; ?>" size="20"></td>
    </tr>
    <tr>
      <td align="right">Category :</td>
      <td width="52%"><select name="cat" id="cat">
        <option value="0">- Select Category -</option>
        <?
	 	$db->select("id, title", "categories", "section='content'");
		$j=$db->num_rows();
for($i=0;$i<$j;$i++) {	
		if($catid == $db->result($i, "id")) {
			$sel = " selected='selected'";
		} else {
			$sel = "";
		}	
		echo "<option value='".$db->result($i, "id")."' $sel>".$db->result($i, "title")."</option>";
	}	
	 
	 ?>
            </select></td>
      <td width="16%" align="right">Author :</td>
      <td width="22%"><input name="author" type="text" id="author" value="<?= $author; ?>" size="20" /></td>
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
        <br>
      </p></td>
    </tr>
    <tr>
      <td align="right" valign="top">Main Text :</td>
      <td colspan="3">
      <?php
// Automatically calculates the editor base path based on the _samples directory.
// This is usefull only for these samples. A real application should use something like this:
// $oFCKeditor->BasePath = '/fckeditor/' ;	// '/fckeditor/' is the default value.
//$sBasePath = $_SERVER['PHP_SELF'] ;
 $sBasePath = eregi_replace("/[a-z0-9_-]+.php$","",$_SERVER['PHP_SELF'])."/fckeditor/"; 

$oFCKeditor = new FCKeditor('FCKeditor1') ;
$oFCKeditor->BasePath	= $sBasePath ;
$oFCKeditor->Value		= $maintext ;
$oFCKeditor->Create() ;
?>      </td>
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
 var frmvalidator = new Validator("konten");
 frmvalidator.addValidation("title","req","Title artikel harus diisi, silahkan ulangi lagi!");
 
  frmvalidator.addValidation("cat","dontselect=0","Pilih katagori artikel!");


</script>  
<?	
	break;
	case submit :
		if ( isset( $_POST ) )
  			 $postArray = &$_POST ;			// 4.1.0 or later, use $_POST
		else
   			$postArray = &$HTTP_POST_VARS ;	// prior to 4.1.0, use HTTP_POST_VARS

		foreach ( $postArray as $sForm => $value )
		{
			//if ( get_magic_quotes_gpc() )
				//$postedValue = htmlspecialchars( stripslashes( $value ) ) ;
			//else
				$postedValue =  stripslashes( $value ) ;


		}
		$variable = mysql_real_escape_string($postedValue);
		if($edit > 0) {
			$db->update("content", "title='$title', created='$crdate', catid='$cat', created_by_alias='$author', maintext='$variable', published='$publish'", "id='$no'");
	} else {
			$db->insert("content", "title, maintext, catid, created, published, created_by_alias", "'$title', '$variable', $cat, '$crdate', $publish, '$author'");
	}		
			echo "<meta http-equiv='refresh' content='0;URL=?e=content'>";
	break;
	
	case publish :
		$db->update("content", "published='$pub'", "id='$no'");
		echo "<meta http-equiv='refresh' content='0;URL=?e=content'>";
	break;
	case delete :
		//echo "delete no $no";
		$db->delete("content", "id=$no");
		echo "<meta http-equiv='refresh' content='0;URL=?e=content'>";
	break;	
	
	case frontpage :
		$db->update("content", "frontpage='$pub'", "id='$no'");
		echo "<meta http-equiv='refresh' content='0;URL=?e=content'>";
	break;
}
?>	