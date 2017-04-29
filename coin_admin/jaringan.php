<?
foreach ($_REQUEST AS $key => $value) { ${$key} = $value; }
include "../configdb_inc.php";
include "../utama_inc.php";
$db = new db_mysql($server_name, $userdb, $passdb, $databasename,"");
include "../plus_inc.php";
//include "mydb.php";
?>
<head>
	<title>Networking Area <?= $domain; ?></title>
	<!-- Ajax class -->
	<script type="text/javascript" src="../javascript/ajax.js"></script>

    <script type="text/javascript" src="../javascript/prototype.js"></script> 
		<script type="text/javascript" src="../javascript/effects.js"></script> 
		<script type="text/javascript" src="../javascript/newsbox.js"></script>
    <style type="text/css">
<!--

.newsContent {padding: 10px; margin: 0px; }
.newsItem {padding: 0px; margin: 0px; }
.newsItem a.newsTitle, .newsItem a.newsTitle:visited {
	display: block;
	text-decoration: underline;
	cursor: pointer!important;
	cursor: hand;
	padding: 1px;
	font-weight: bold;
} 
body {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
}
table {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
}
.status_active {
	font-weight: bold;
	background-color: #009900;
}
.status_free {
	font-weight: bold;
	background-color:#0000FF;
	color: #FF0000;
}
.status_blokir {
	font-weight: bold;
	background-color:#FF0000;
}
.style1 {color: #006600}
.style2 {color: #0000CC}
.style3 {color: #FF0000}
-->
    </style> 
</head>
<?
if(!$awal) $awal = $mid;
?>
<body>
<h4 align="center">DATA JARINGAN MEMBER </h4>
<p>&nbsp;</p>
<?
switch($page) {
	default :
	
	break;
	
	case genealogi :
?>
	<p>&nbsp;</p>

<?	
	break;
	
	case tree :
		
		$idtree = $db->tree($mid);
			include("../classes/class.tree.php");

		$tree=new Tree($idtree);    // or $_POST["id"] numeric value of the root folder/category/directory to create the tree
		$tree->display();
		//echo $idtree;
	break;
	
	case tree2 :
		//------------lev tertinggi------------
		$db->select("level", "upline", "", "level DESC");
		$levh=$db->fetch_row();
		$lv=$levh[0];
		for($i=0;$i<100;$i++) {
			$j = $i + 1;
			//$db->select("username", "upline", "upline$i='$mid'");
			$ja = $db->jmlmember($mid, "a.status=1 and b.upline$i='$mid'"); //jml mbr aktif per level
			if($ja > 0 or $jf > 0) {
?>
<div style="width: 100%; padding: 1; margin: 0;">
            <div id="newsBox">
              <!-- NEWS ITEMS GO HERE - Repeat Sections as many times as you want -->
              <!--NEWS ITEM-->
              <div class="newsItem"> <a class="newsTitle">Level <?= $j; ?> : <span style="color:#006600"><?= $ja; ?></span> Member</a>
                <div style="display:yes;">
                    <div class="newsContent">
                      <?
					 
		//$csq=myfetch("SELECT konten FROM konten WHERE url='caragabung'");
		//echo $db->jumlahdl($mid, "1");
		$db->select("a.username, a.nama, a.status, a.hp, a.phone, a.email, a.tgl_daftar, a.upline, b.sponsor", "member as a inner join upline as b on a.username=b.username", "b.upline$i='$mid'");
		?>
                  <table width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#D7D7D7">
      <tr>
        <td width="6%" align="center" bgcolor="#FFCC00"><strong>#</strong></td>
        <td width="19%" align="center" bgcolor="#FFCC00"><strong>Username</strong></td>
		<td width="19%" align="center" bgcolor="#FFCC00"><strong>Nama Member</strong></td>
        <td width="20%" align="center" bgcolor="#FFCC00"><strong>Sponsor</strong></td>
		<td width="14%" align="center" bgcolor="#FFCC00"><strong>Upline</strong></td>
        <td width="12%" align="center" bgcolor="#FFCC00"><strong>HP</strong></td>
        
        <td width="10%" align="center" bgcolor="#FFCC00"><strong>Status</strong></td>
      </tr>
   <?
   		$n=1;
		while($row = $db->fetch_row()) {
			if($row[2] > 0) {
				$status = "AKTIF";
				$cl_status = "status_active";
			} else if($row[3] > 0) {
				$status = "BLOKIR";
				$cl_status = "status_blokir";	
			} else {
				$status = "FREE";
				$cl_status = "status_free";
			}			
   ?>  
	  <tr>
        <td bgcolor="#FFFFFF"><?= $n; ?></td>
        <td bgcolor="#FFFFFF"><?= $row[0]; ?></td>
		<td bgcolor="#FFFFFF"><?= $row[1]; ?></td>
        <td bgcolor="#FFFFFF"><?= $row[8]; ?></td>
		<td bgcolor="#FFFFFF"><?= $row[7]; ?></td>
        <td bgcolor="#FFFFFF"><?= $row[4]; ?></td>
       
        <td bgcolor="#FFFFFF" class="<?= $cl_status; ?>" align="center"><?= $status; ?></td>
      </tr>
	 <?
	 	$n++;
	 	} //--end while
	 ?> 
    </table>  </div>
                  </div>
              </div>
              <!-- end news items -->
            </div>
</div>
	<p>
	  <?
	  		} //---end if
		} //--end for
	?>		
	  <!-- this script is required for your newsbox to work; also, modify the variables defined below to customize the look of the newbox contents. -->
	  <!-- bg = background color; fg = text color for your article; link = the color for your links -->
	  <!-- altbg = background color of alternating row ; altfg = text color for your article on an alternating row; altlink = the color for your links on an alernating row -->
	  <script type="text/javascript">newsBox = new newsBox({'bg':'#f7f7f7','fg':'#000000','link':'#0000cc','altbg':'#ffffff','altfg':'#000000','altlink':'#0000cc'});</script>
	  
<?	
	
	break;
}
?>
</p>
<p>&nbsp;    </p>
</body>
</html>