<?php
$user_session=$_SESSION['user_session'];
$user_status=$_SESSION['user_status'];
$user_blokir=$_SESSION['user_blokir'];
$domain=$db->config("domain");
?>
<?

$lev_member = $db->dataku("lev", $user_session); 
if($lev_member ==0)
{ 

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Secret Area</title>
<link rel="stylesheet" href="menuku_files/mbcsmbmcp.css" type="text/css" />
<style type="text/css">
a {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 12px;
	color: #00F;
}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #00F;
}
a:hover {
	text-decoration: none;
	color: #F00;
}
a:active {
	text-decoration: none;
	color: #00F;
}
body,td,th {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 12px;
}
body {
	background-image: url(../image/bg.png);
	background-repeat: repeat-x;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-attachment:fixed;
	background-color: #232323;
}
.style1 {
	color: #ff0000!important;
	font-weight: bold;
}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /></head>
<body>
<table width="104%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="104" align="center">
      <table width="1000" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="218"><div align="left"></div></td>
          <td width="632"><div align="right">Welcome <span class="style1">
            <?= $db->dataku("nama", $user_session); ?>
            </span> You are login as <span class="style1">
              <?= $user_session; ?>
          </span>, <a href="?page=logout">Logout</a></div></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td height="69" align="center"><ul id="mbmcpebul_table" class="mbmcpebul_menulist css_menu" style="width: 712px; height: 34px;">
  <li class="topitem spaced_li"><div class="buttonbg"><a href='index.php' class="button_1">Member Home</a></div></li>
  <li class="topitem spaced_li"><div class="arrow buttonbg"><a>Account</a></div>
  <ul>
  <li><a href='?e=account_detail' title="">Profile</a></li>
  <li><a href='?e=account_edit' title="">Edit Profile</a></li>
  <li><a href='?e=change_pass' title="">Change Password</a></li>
  <li><a href='?e=change_pin' title="">Change Token</a></li>
  <li class="last_item"><a href='?e=upload_fhoto' title="">Upload Profile Picture</a></li>
  </ul></li>
  <li class="topitem spaced_li"><div class="arrow buttonbg" style="width: 87px;"><a>Network</a></div>
  <ul>
  <li><a href='?e=binary_tree' title="">Binary Network Tree</a></li>
  <li><a href='?e=refferal_tree' title="">Refferal Tree</a></li>
   
  
  </ul></li>
  <li class="topitem spaced_li">
    <div class="arrow buttonbg" style="width: 128px;"><a>Fund Activities</a></div>
    <ul>
 
 
  <li class="last_item"><a href='?e=daily_deviden' title="">Detail Bonus</a></li>
   <li class="last_item"><a href='?e=daily_deviden_roi' title="">Detail Bonus Pasif</a></li>
   <li class="last_item"></li>
   <li><a href='?e=bonus_statement' title="">Withdraw Bonus</a></li>
 <?php 
  $date1= (date("Y-m-d"));
  $date2=  $db->dataku("tgl_reinves", $user_session);
  $datetime1 = new DateTime($date1);
  $datetime2 = new DateTime($date2);
  $difference = $datetime1->diff($datetime2);
  if ( $difference->days < 3 ) {  
  ?>
  
  <li><a href='?e=reinvest' title="">Re-invest</a></li>
<?php  
  }
 
 ?>  
   
   
   
   <li><a href='?e=reward' title="">Reward Bonus</a></li>
  </ul>
  </li>
  <li class="topitem spaced_li"><div class="arrow buttonbg" style="width: 113px;"><a>Ticket</a></div>
  <ul>
  <li><a href='?e=mypinaktivation' title="">My Ticket  Activation</a></li>
  <li><a href='?e=orderticket' title="">Order Ticket </a></li>
  <li><a href='?e=transferpin' title="">Transfer My Ticket </a></li>
  <li><a href='?e=transferpinhistory' title="">History Transfer Ticket </a></li>
  
  <li class="last_item"><a href='?e=registration_history' title="">Registration History</a></li>
  </ul></li>
  <li class="topitem spaced_li"><div class="buttonbg" style="width: 95px;"><a href='?e=my_paket' class="button_6">My Package</a></div></li>
  <li class="topitem"><div class="buttonbg" style="width: 63px;"><a href='?page=logout' class="button_7">Logout</a></div></li>
</ul>
<!-- Menus will work without this javascript file. It is used only for extra
     effects, improved usability and compatibility with very old web browsers. -->
<script type="text/javascript" src="menuku_files/mbjsmbmcp.js"></script></td>
  </tr>
  <tr>
    <td align="center"><table width="900" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><img src="../image/c1.png" width="1020" height="54" /></td>
      </tr>
      <tr>
        <td background="../image/c2.png"><table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><?
	 if($user_status > 0 and $user_blokir == 0) {
	   switch($e){
	        
			case "account_detail":
			include("account_detail.php");
        	break;
			
			case "account_edit":
			include("account_edit.php");
        	break;
			
			case "transferpin":
			include("transferpin.php");
        	break;
			
			case "orderticket":
			include("orderticket.php");
        	break;
			
			case "transferpinhistory":
			include("transferpinhistory.php");
        	break;
			
			case "berita":
			include("berita.php");
        	break;
			
			case "infosms":
			include("infosms.php");
        	break;
			
			case "daily_deviden":
			include("daily_deviden.php");
        	break;
			
			case "daily_deviden_roi":
			include("daily_deviden_roi.php");
        	break;
			
			case "mypinaktivation":
			include("mypinaktivation.php");
        	break;
			
			case "hidepin":
			include("hidepin.php");
        	break;
			
			case "change_pass":
			include("change_pass.php");
        	break;
			
			case "allfund":
			include("allfund.php");
        	break;
			
			case "change_pin":
			include("change_pin.php");
        	break;
			
			case "upload_fhoto":
			include("upload_fhoto.php");
        	break;
			
			case "binary_tree":
			include("binary_tree.php");
        	break;
			
			case "binary_group":
			include("binary_group.php");
        	break;
	        
			case "refferal_tree":
			include("refferal_tree.php");
        	break;
			
            case "my_manager":
        	include("my_manager.php");
		    break;
			
			case "detailpaketdaftar":
        	include("detailpaketdaftar.php");
		    break;

            case "reward":
        	include("reward.php");
		    break;
			
			case "reinvest":
        	include("reinvest.php");
		    break;
			
			case "gf_cancel":
        	include("gf_cancel.php");
		    break;
			
			case "datarek":
        	include("datarek.php");
		    break;
			
			case "konfirmasibb":
        	include("konfirmasibb.php");
		    break;
			
			case "reject":
        	include("reject.php");
		    break;
			
			case "batalkan_calon":
        	include("batalkan_calon.php");
		    break;
			
			case "approve":
        	include("approve.php");
		    break;

            case "take_fund":
        	include("take_fund.php");
		    break;
			
			case "take_fund_bonus":
        	include("take_fund_bonus.php");
		    break;
			
			case "take_fund_history":
        	include("take_fund_history.php");
		    break;
			
			case "assignment":
        	include("assignment.php");
		    break;
			
			case "fund_history":
        	include("fund_history.php");
		    break;

            case "bonus_statement":
        	include("bonus_statement.php");
		    break;
			
			case "total_bonus":
        	include("total_bonus.php");
		    break;
			
			case "registration":
 			if ($actions==submit)
		  	{
		    include ("signup.php");
			break;
		   	}
		   	include("form.php");
        	break; 
			
			case "registration_history":
        	include("registration_history.php");
		    break;
			
			case "my_paket":
        	include("my_paket.php");
		    break;
			
			case "join":
 			if ($actions==submit)
		  	{
		    include ("signup.php");
			break;
		   	}
		   	include("form.php");
        	break;
        	
        	case "join2":
 			if ($actions==submit)
		  	{
		    include ("signup2.php");
			break;
		   	}
		   	include("form2.php");
        	break;

			default:
			
			include("home.php");
			
        	break;
		}  

	 } else {
	 	switch($act){
	        default:
			include("home.php");
        			
			case "konfirmasi":
        	include("konfirmasi.php");
		    break;
			
			case "berita":
        	include("berita.php");
			break;

		}	
	 }

?>





<?php }elseif($lev_member ==1) { ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Secret Area</title>
<link rel="stylesheet" href="menuku_files/mbcsmbmcp.css" type="text/css" />
<style type="text/css">
a {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 12px;
	color: #00F;
}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #00F;
}
a:hover {
	text-decoration: none;
	color: #F00;
}
a:active {
	text-decoration: none;
	color: #00F;
}
body,td,th {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 12px;
}
body {
	background-image: url(../image/bg.png);
	background-repeat: repeat-x;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-attachment:fixed;
	background-color: #232323;
}
.style1 {
	color: #FF0000;
	font-weight: bold;
}
</style>

<table width="104%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="104" align="center">
      <table width="1000" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="218"><div align="left"></div></td>
          <td width="632"><div align="right">Selamat datang <span class="style1">
            <?= $db->dataku("nama", $user_session); ?>
            </span> Anda Login Sebagai <span class="style1">
              <?= $user_session; ?>
          </span>, Klik Di Sini Jika Ingin <a href="?page=logout">Logout</a></div></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td height="69" align="center"><ul id="mbmcpebul_table" class="mbmcpebul_menulist css_menu" style="width: 712px; height: 34px;">
  <li class="topitem spaced_li"><div class="buttonbg"><a href='index.php' class="button_1">Member Home</a></div></li>
  <li class="topitem spaced_li"><div class="arrow buttonbg"><a>Account</a></div>
  <ul>
  <li><a href='?e=account_detail' title="">Profile</a></li>
  <li><a href='?e=account_edit' title="">Edit Profile</a></li>
  <li><a href='?e=change_pass' title="">Ganti Password</a></li>
  <li><a href='?e=change_pin' title="">Ganti Token</a></li>
  <li class="last_item"><a href='?e=upload_fhoto' title="">Upload Profile Picture</a></li>
  </ul></li>
  <li class="topitem spaced_li"><div class="arrow buttonbg" style="width: 87px;"><a>Network</a></div>
  <ul>
  <li><a href='?e=binary_tree' title="">Binary Network Tree</a></li>
  <li><a href='?e=binary_group' title="">Binary Omzet Group</a></li>
  <li><a href='?e=refferal_tree' title="">Refferal Tree</a></li>
  <li class="last_item"><a href='?e=my_manager' title="">My Sponsor</a></li>
  </ul></li>
  <li class="topitem spaced_li">
    <div class="arrow buttonbg" style="width: 128px;"><a>Fund Activities</a></div>
    <ul>
  <li><a href='?e=give_fund' title="">PA Fund</a></li>
  <li><a href='?e=give_fund_history' title="">PA Fund History</a></li>
  <li><a href='?e=take_fund' title="">RA Fund Daily</a></li>
  <li><a href='?e=total_bonus' title="">RA Fund Bonus</a></li>
  <li><a href='?e=take_fund_history' title="">RA Fund Bonus History</a></li>
  <li><a href='?e=assignment' title="">Assistance  Room</a></li>
  <li><a href='?e=bonus_statement' title="">Statment Bonus</a></li>
  <li class="last_item"><a href='?e=daily_deviden' title="">Daily Bonus</a></li>
  </ul></li>
  <li class="topitem spaced_li"><div class="arrow buttonbg" style="width: 113px;"><a>Registration</a></div>
  <ul>
  <li><a href='?e=mypinaktivation' title="">My Ticket  Activation</a></li>
  <li><a href='?e=transferpin' title="">Transfer My Ticket </a></li>
  <li><a href='?e=transferpinhistory' title="">History Transfer Ticket </a></li>
  <li><a href='?e=join2' title="">New Member Registration</a></li>
  <li class="last_item"><a href='?e=registration_history' title="">Registration History</a></li>
  </ul></li>
  
  
  <li class="topitem"><div class="buttonbg" style="width: 63px;"><a href='?page=logout' class="button_7">Logout</a></div></li>
</ul>
<!-- Menus will work without this javascript file. It is used only for extra
     effects, improved usability and compatibility with very old web browsers. -->
<script type="text/javascript" src="menuku_files/mbjsmbmcp.js"></script></td>
  </tr>
  <tr>
    <td align="center"><table width="900" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><img src="../image/c1.png" width="1020" height="54" /></td>
      </tr>
      <tr>
        <td background="../image/c2.png"><table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><?
	 if($user_status > 0 and $user_blokir == 0) {
	   switch($e){
	        
			case "account_detail":
			include("account_detail.php");
        	break;
			
			case "account_edit":
			include("account_edit.php");
        	break;
			
			case "transferpin":
			include("transferpin.php");
        	break;
			
			case "buktitransferfinal":
			include("buktitransferfinal.php");
        	break;
			
			
			case "member":
			include("member1.php");
        	break;
			
			
			case "transferpinhistory":
			include("transferpinhistory.php");
        	break;
			
			case "berita":
			include("berita.php");
        	break;
			
			case "daily_deviden":
			include("daily_deviden.php");
        	break;
			
			case "mypinaktivation":
			include("mypinaktivation.php");
        	break;
			
			case "hidepin":
			include("hidepin.php");
        	break;
			
			case "change_pass":
			include("change_pass.php");
        	break;
			
			case "allfund":
			include("allfund.php");
        	break;
			
			case "change_pin":
			include("change_pin.php");
        	break;
			
			case "upload_fhoto":
			include("upload_fhoto.php");
        	break;
			
			case "binary_tree":
			include("binary_tree.php");
        	break;
			
			case "binary_group":
			include("binary_group.php");
        	break;
	        
			case "refferal_tree":
			include("refferal_tree.php");
        	break;
			
            case "my_manager":
        	include("my_manager.php");
		    break;
			
			case "detailpaketdaftar":
        	include("detailpaketdaftar.php");
		    break;

            case "give_fund":
        	include("give_fund.php");
		    break;
			
			case "give_fund_history":
        	include("give_fund_history.php");
		    break;
			
			case "gf_cancel":
        	include("gf_cancel.php");
		    break;
			
			case "datarek":
        	include("datarek.php");
		    break;
			
			case "konfirmasibb":
        	include("konfirmasibb.php");
		    break;
			
			case "reject":
        	include("reject.php");
		    break;
			
			case "batalkan_calon":
        	include("batalkan_calon.php");
		    break;
			
			case "approve":
        	include("approve.php");
		    break;

            case "take_fund":
        	include("take_fund.php");
		    break;
			
			case "take_fund_bonus":
        	include("take_fund_bonus.php");
		    break;
			
			case "take_fund_history":
        	include("take_fund_history.php");
		    break;
			
			case "assignment":
        	include("assignment.php");
		    break;
			
			case "fund_history":
        	include("fund_history.php");
		    break;

            case "bonus_statement":
        	include("bonus_statement.php");
		    break;
			
			case "registration":
 			if ($actions==submit)
		  	{
		    include ("signup.php");
			break;
		   	}
		   	include("form.php");
        	break; 
			
			case "registration_history":
        	include("registration_history.php");
		    break;
			
			case "my_omset":
        	include("my_omset.php");
		    break;
			
			
			case "join":
 			if ($actions==submit)
		  	{
		    include ("signup.php");
			break;
		   	}
		   	include("form.php");
        	break;
        	
        	case "join2":
 			if ($actions==submit)
		  	{
		    include ("signup2.php");
			break;
		   	}
		   	include("form2.php");
        	break;

			default:
			include("home.php");
        	break;
		}  

	 } else {
	 	switch($act){
	        default:
			include("home.php");
        	break;
			
			case "faq":
        	include("faq.php");
			break;

		}	
	 }
}

?>

<?php if($lev_member ==2 ) { ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Secret Area</title>
<link rel="stylesheet" href="menuku_files/mbcsmbmcp.css" type="text/css" />
<style type="text/css">
a {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 12px;
	color: #00F;
}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #00F;
}
a:hover {
	text-decoration: none;
	color: #F00;
}
a:active {
	text-decoration: none;
	color: #00F;
}
body,td,th {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 12px;
}
body {
	background-image: url(../image/bg.png);
	background-repeat: repeat-x;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-attachment:fixed;
	background-color: #232323;
}
.style1 {
	color: #FF0000;
	font-weight: bold;
}
</style>

<table width="104%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="104" align="center">
      <table width="1000" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="218"><div align="left"><img src="../images/wtc.png" width="316" height="100" /></div></td>
          <td width="632"><div align="right">Selamat datang <span class="style1">
            <?= $db->dataku("nama", $user_session); ?>
            </span> Anda Login Sebagai <span class="style1">
              <?= $user_session; ?>
          </span>, Klik Di Sini Jika Ingin <a href="?page=logout">Logout</a></div></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td height="69" align="center"><ul id="mbmcpebul_table" class="mbmcpebul_menulist css_menu" style="width: 712px; height: 34px;">
  <li class="topitem spaced_li"><div class="buttonbg"><a href='index.php' class="button_1">Member Home</a></div></li>
  <li class="topitem spaced_li"><div class="arrow buttonbg"><a>Account</a></div>
  <ul>
  <li><a href='?e=account_detail' title="">Profile</a></li>
  <li><a href='?e=account_edit' title="">Edit Profile</a></li>
  <li><a href='?e=change_pass' title="">Ganti Password</a></li>
  <li><a href='?e=change_pin' title="">Ganti Token</a></li>
  <li class="last_item"><a href='?e=upload_fhoto' title="">Upload Profile Picture</a></li>
  </ul></li>
  <li class="topitem spaced_li"><div class="arrow buttonbg" style="width: 87px;"><a>Network</a></div>
  <ul>
  <li><a href='?e=binary_tree' title="">Binary Network Tree</a></li>
  <li><a href='?e=binary_group' title="">Binary Omzet Group</a></li>
  <li><a href='?e=refferal_tree' title="">Refferal Tree</a></li>
  <li class="last_item"><a href='?e=my_manager' title="">My Sponsor</a></li>
  </ul></li>
  <li class="topitem spaced_li">
    <div class="arrow buttonbg" style="width: 128px;"><a>Fund Activities</a></div>
    <ul>
  <li><a href='?e=give_fund' title="">PA Fund</a></li>
  <li><a href='?e=give_fund_history' title="">PA Fund History</a></li>
  <li><a href='?e=daily_deviden' title="">RA Fund Daily</a></li>
  <li><a href='?e=total_bonus' title="">RA Fund Bonus</a></li>
  <li><a href='?e=take_fund_history' title="">RA Fund Bonus History</a></li>
  <li><a href='?e=berita' title="">Berita Admin</a></li>
  <li><a href='?e=assignment' title="">Assistance  Room</a></li>
  <li><a href='?e=bonus_statement' title="">Statment Bonus</a></li>
  <li class="last_item"><a href='?e=daily_deviden' title="">Daily Bonus</a></li>
  </ul></li>
  <li class="topitem spaced_li"><div class="arrow buttonbg" style="width: 113px;"><a>Registration</a></div>
  <ul>
  <li><a href='?e=mypinaktivation' title="">My Ticket  Activation</a></li>
  <li><a href='?e=transferpin' title="">Transfer My Ticket </a></li>
  <li><a href='?e=transferpinhistory' title="">History Transfer Ticket </a></li>
  <li><a href='?e=join2' title="">New Member Registration</a></li>
  <li class="last_item"><a href='?e=registration_history' title="">Registration History</a></li>
  </ul></li>
<li class="topitem spaced_li">
    <div class="buttonbg" style="width: 95px;"><a href='' class="button_6">Panel admin </a></div>
	 <ul>
  <li><a href='?e=my_omset' title="">Omset PA & RA</a></li>
  <li><a href='?e=data_gf' title="">Penjodohan PA Admin </a></li>
  <li><a href='?e=my_prioritas' title="">PA Proses</a></li>
   <li><a href='?e=tambahwaktu' title="">Tambah Waktu </a></li>
   <li><a href='?e=data_gh' title="">Data RA </a></li>
   <li><a href='?e=data_pag' title="">Data PA Gagal </a></li>
     <li><a href='?e=data_pa' title="">PA Antrian </a></li>
	<li><a href='?e=data_ra' title="">RA  Antrian </a></li>
	<li><a href='?e=input_tf_admin' title="">Input User Prioritas </a></li>
	<li><a href='?e=lihat_tf_admin' title="">Lihat User Prioritas </a></li>
	 <li><a href='?e=data_auto' title="">Penjodohan Auto</a></li>
   <li><a href='?e=konfir' title="">Konfirmasi Transfer </a></li>
    <li><a href='?e=content' title="">Berita Admin </a></li>
  <li><a href='?e=member' title="">All Member </a></li>
  
  </ul></li>
  <li class="topitem"><div class="buttonbg" style="width: 63px;"><a href='?page=logout' class="button_7">Logout</a></div></li>
</ul>
<!-- Menus will work without this javascript file. It is used only for extra
     effects, improved usability and compatibility with very old web browsers. -->
<script type="text/javascript" src="menuku_files/mbjsmbmcp.js"></script></td>
  </tr>
  <tr>
    <td align="center"><table width="900" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><img src="../image/c1.png" width="1020" height="54" /></td>
      </tr>
      <tr>
        <td background="../image/c2.png"><table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><?
	 if($user_status > 0 and $user_blokir == 0) {
	   switch($e){
	        
			case "account_detail":
			include("account_detail.php");
        	break;
			
			case "account_edit":
			include("account_edit.php");
        	break;
			
			case "transferpin":
			include("transferpin.php");
        	break;
			
			case "buktitransferfinal":
			include("buktitransferfinal.php");
        	break;
			
			case "infosms":
			include("infosms.php");
        	break;
			
			case "content":
			include("content.php");
        	break;
			
			case "input_tf_admin":
			include("input_tf_admin.php");
        	break;
			
			case "lihat_tf_admin":
			include("lihat_tf_admin.php");
        	break;
			
			case "berita":
			include("berita.php");
        	break;
        	
        	case "my_prioritas":
			include("my_prioritas.php");
        	break;
        	
        				
			case "konfir":   
			include("konfir.php");
        	break;
			
			case "transferpinhistory":
			include("transferpinhistory.php");
        	break;
			
			case "data_gh2":
			include("data_gh2.php");
        	break;
			
			case "data_gh":
			include("data_gh.php");
        	break;
			
			case "data_gh1":
			include("data_gh1.php");
        	break;
			
			case "data_pa":
			include("data_pa.php");
        	break;
			
			
			case "data_ra":
			include("data_ra.php");
        	break;
			
			case "data_auto":
			include("data_auto.php");
        	break;
			
			case "tambahwaktu":
			include("tambahwaktu.php");
        	break;
			
			case "daily_deviden":
			include("daily_deviden.php");
        	break;
			
			case "bukablokirnext":
			include("bukablokirnext.php");
        	break;
						
			
			case "mypinaktivation":
			include("mypinaktivation.php");
        	break;
			
			case "hidepin":
			include("hidepin.php");
        	break;
			
			case "change_pass":
			include("change_pass.php");
        	break;
			
			
			case "member":
			include("member.php");
        	break;
			
			
			case "allfund":
			include("allfund.php");
        	break;
			
			case "change_pin":
			include("change_pin.php");
        	break;
			
			case "upload_fhoto":
			include("upload_fhoto.php");
        	break;
			
			case "binary_tree":
			include("binary_tree.php");
        	break;
			
			case "data_pag":
			include("data_pag.php");
        	break;
			
			case "binary_group":
			include("binary_group.php");   
        	break;
	        
			case "refferal_tree":
			include("refferal_tree.php");
        	break;
			
            case "my_manager":
        	include("my_manager.php");
		    break;
			
			case "detailpaketdaftar":
        	include("detailpaketdaftar.php");
		    break;

            case "give_fund":
        	include("give_fund.php");
		    break;
			
			case "give_fund_history":
        	include("give_fund_history.php");
		    break;
			
			case "gf_cancel":
        	include("gf_cancel.php");
		    break;
			
			case "datarek":
        	include("datarek.php");
		    break;
			
			case "data_gf":
        	include("data_gf.php");
		    break;
			
			case "konfirmasibb":
        	include("konfirmasibb.php");
		    break;
			
			case "reject":
        	include("reject.php");
		    break;
			
			case "batalkan_calon":
        	include("batalkan_calon.php");
		    break;
			
			case "approve":
        	include("approve.php");
		    break;

            case "take_fund":
        	include("take_fund.php");
		    break;
			
			case "total_bonus":
        	include("total_bonus.php");
		    break;
			
			case "take_fund_history":
        	include("take_fund_history.php");
		    break;
			

			case "assignment":
        	include("assignment.php");
		    break;
			
			case "fund_history":
        	include("fund_history.php");
		    break;

            case "bonus_statement":
        	include("bonus_statement.php");
		    break;
			
			case "registration":
 			if ($actions==submit)
		  	{
		    include ("signup.php");
			break;
		   	}
		   	include("form.php");
        	break; 
			
			case "registration_history":
        	include("registration_history.php");
		    break;
			
			case "my_omset":
        	include("my_omset.php");
		    break;
			
			case "join":
 			if ($actions==submit)
		  	{
		    include ("signup.php");
			break;
		   	}
		   	include("form.php");
        	break;
        	
        	case "join2":
 			if ($actions==submit)
		  	{
		    include ("signup2.php");
			break;
		   	}
		   	include("form2.php");
        	break;

			default:
			
			include("home.php");
        	break;
		}  

	 } else {
	 	switch($act){
	        default:
			include("home.php");
        	break;
			
			case "faq":
        	include("faq.php");
			break;

		}	
	 }
}

?>





</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><img src="../image/c3.png" width="1020" height="42" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>


</body>
</html>