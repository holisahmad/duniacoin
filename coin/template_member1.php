<?php
$user_session=$_SESSION['user_session'];
$user_status=$_SESSION['user_status'];
$domain=$db->config("domain");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Komunitas Area</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
	background-image: url(images/bg.jpg);
}
</style>
</head>
<body>
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="55" align="center"><a href="index.php">Home</a> | <a href="?act=beribantuan">Beri Bantuan</a> | <a href="?act=lihat_konfirmasi">Lihat Konfirmasi Transfer</a> | <a href="?act=mintabantuan">Minta Bantuan</a> | <a href="?act=history">Cash History</a> | <a href="?act=jabatan">Jabatan</a> | <a href="?page=logout">Logout</a></td>
  </tr>
  <tr>
    <td><?
	 if($user_status > 0 ) {
	   switch($act){
	        
			case "history":
			include("history.php");
        	break;
			
			case "beribantuan":
			include("beribantuan.php");
        	break;
			
			case "hapusbbku":
			include("hapusbbku.php");
        	break;
			
			case "historybb":
			include("historybb.php");
        	break;
			
			case "kodeatm":
			include("kodeatm.php");
        	break;
			
			case "mintabantuan":
			include("mintabantuan.php");
        	break;
			
			case "historymb":
			include("historymb.php");
        	break;
	        
			case "home":
			include("home.php");
        	break;
			
            case "profile":
        	include("profile.php");
		    break;

            case "jabatan":
        	include("jabatan.php");
		    break;

            case "aprove":
        	include("aprove.php");
		    break;
			
			case "iklan":
        	include("iklan.php");
		    break;
			
			case "upgrade":
        	include("upgrade.php");
		    break;

            case "withdrawl":
        	include("withdrawl.php");
		    break;

            case "stockist":
        	include("stockist.php");
		    break;
			
            case "genealogi":
        	include("genealogi.php");
		    break;

		 case "downline":
        	include("downline.php");
        	break;    
		
		case "content":
        	include("../content.php");
        	break;		 

		case "gantipass":
        	include("gantipass.php");
        	break;   

		case "jaringan":
        	include("jaringan.php");
        	break;  


       case "upload":
        	include("upload.php");
        	break;
			
			case "lihat_konfirmasi":
        	include("lihat_konfirmasi.php");
        	break;


		case "testimonial":
        	include("testimonial.php");
        	break;

		case "konfirmasi":
        	include("konfirmasi.php");
        	break;


		case "tree":
        	include("tree.php");
        	break;


		case "login":
        	include("login.php");
        	break;

		case "genealogi":
        	include("genealogi.php");
        	break;

		case "sponsor":
        	include("upline.php");
        	break;

		case "loginsalah":
        	include("loginsalah.php");
        	break;


		case "losspass":
        	include("loss_pass.php");
        	break;	


		case "login":
        	include("login.php");
        	break;	
		
		case "order":
        	include("order.php");
        	break;		
			
		case "loss_pass":
		   	if ($page==submit)
		  {


		    include("loss_pass.php");
			break;
		   }

			include ("login_pwd.htm");
			break;


case "join":

 if ($actions==submit)
		  {
		    include ("signup.php");
			break;
		   }
		   include("form.php");
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

			case "home":
        	include("home.php");
			break;
			
			case "faq":
        	include("faq.php");
			break;

			case "konfirmasi":
        	include("konfirmasi.php");
        	break;
		}	
	 }

?></td>
  </tr>
</table>
</body>
</html>