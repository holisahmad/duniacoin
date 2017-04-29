<?
if(isset( $_SESSION['valid_admin'])) {
$valid_admin=$_SESSION['valid_admin'];
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Administrator Area</title>



<link href="style.css" rel="stylesheet" type="text/css" />

<SCRIPT LANGUAGE="JavaScript">



<!-- This script and many more are available free online at -->

<!-- The JavaScript Source!! http://javascript.internet.com -->



<!-- Begin

var win = null;

function newWindow(mypage,myname,w,h,features) {

  var winl = (screen.width-w)/2;

  var wint = (screen.height-h)/2;

  if (winl < 0) winl = 0;

  if (wint < 0) wint = 0;

  var settings = 'height=' + h + ',';

  settings += 'width=' + w + ',';

  settings += 'top=' + wint + ',';

  settings += 'left=' + winl + ',';

  settings += features;

  win = window.open(mypage,myname,settings);

  win.window.focus();

}

//  End -->

</script>

<script src="../gen_validatorv2.js"></script>

<link type="text/css" rel="stylesheet" href="../dhtmlgoodies_calendar/dhtmlgoodies_calendar.css?random=20051112" media="screen"></LINK>



<SCRIPT type="text/javascript" src="../dhtmlgoodies_calendar/dhtmlgoodies_calendar.js?random=20080118"></script>

<link href="cssmenu/pro_drop_1.css" rel="stylesheet" type="text/css" />

<script src="cssmenu/stuHover.js" type="text/javascript"></script>

<style type="text/css">
<!--
.style2 {color: #FFFFFF}
-->
</style>
</head>



<body>

<table width="100%" border="0" cellspacing="0" cellpadding="2">

  <tr>

    <td class="header"><h1 align="center">ADMIN AREA
        <?= strip_tags(strtoupper($db->config("domain"))); ?>
</h1></td>

  </tr>

  <tr>

    <td align="center" class="topmenu"><div><ul id="nav">

  <li class="top"><a href="?m=home" class="top_link"><span>Home</span></a></li>
  <li class="top"><a class="top_link" href="?m=content"><span class="down">Content Manager</span></a>

            <ul class="sub">
              <li><a href="?m=content">Article Manager</a></li>
              <li><a href="?m=category&type=content">Category Manager</a></li>
            </ul>

  </li>
   
   <li class="top"><a class="top_link" href="#"><span class="down">Berita Admin</span></a>

            <ul class="sub">
              <li><a href="?m=berita&page=addnew">Tambah Berita</a></li>
              <li><a href="?m=berita">Edit Berita</a></li>
            </ul>

  </li>
  
  <li class="top"><a class="top_link" href="#"><span class="down">Member Manager</span></a>

            <ul class="sub">
              <li><a href="?m=member">All Member</a></li>
			  <li><a href="?m=member&page=komisi&bulan=<?= $bln; ?>&tahun=<?= $thn; ?>">Komisi</a></li>
             
			  <li><a href="?m=withdrawl">Withdrawl</a></li>
			    <li><a href="?m=withdrawlroi">Withdrawl Roi</a></li>
			   
			 
			  
			  
            </ul>

  </li>
  
  <li class="top"><a class="top_link" href="#"><span class="down">Pembayaran Bonus</span></a>

            <ul class="sub">
              <li><a href="?m=bayartoday">Bonus Aktif</a></li>
               <li><a href="?m=bayartodayroi">Bonus Roi</a></li>
              
			  
            </ul>

  </li>
  
  <li class="top"><a href="#" class="top_link"><span class="down">Tiket Center</span></a>      

       <ul class="sub">
 <li><a href="?m=cardcenter&page=generate">Kirim Tiket </a></li>
 
    <li><a href="?m=cardcenter">Lihat Tiket</a></li>
     <li><a href="?m=history_tiket">History Tiket</a></li>
	</ul></li>
	
	
 <li class="top"><a href="#" class="top_link"><span class="down">Laporan Admin</span></a>      

       <ul class="sub">
	 <li><a href="?m=laporan">Laporan Bulanan</a></li>
    <li><a href="?m=sudahbayar">Laporan Sudah Bayar</a></li>
    
	</ul></li>
	
<li class="top"><a href="" class="top_link"><span>Mutasi</span></a> 
<ul class="sub">    
<li><a href="?m=stockistordro">Mutasi Paket</a></li>

<li><a href="?m=histstockistordro">History Paket</a></li>

 </ul></li>


  
  
  
  <li class="top"><a href="?m=ewalet" class="top_link"><span>Saldo Automaintent</span></a>       </li>


  <li class="top"><li><a href="?m=configuration" class="top_link"><span>Configuration</span></a>       </li>


   
   
   
    </li>
	
	   <li class="top"><a href="#" class="top_link"><span class="down">Laporan</span></a>
   <ul class="sub">

       <li><a href="?m=history">Data Transfer</a></li>
	   <li><a href="?m=history&page=komisi">Data Komisi</a></li>

       

    </ul>

   <li class="top"><a href="#" class="top_link"><span class="down">Tools</span></a>

            <ul class="sub">
              <li><a href="?m=changepass&page=ganti">Change Password</a></li>
			  <li><a href="?m=mailmass">Kirim e-Mail</a></li>
            </ul>

   </li>

   <li class="top"><a href="../" target="_blank" class="top_link"><span>Preview</span></a></li>

    <li class="top"><a href="?page=logout" class="top_link"><span>LOG OUT</span></a></li>

</ul>

    </div></td>

  </tr>

  <tr>

    <td><div id="main_content">

<?
switch($m) {
	default:
		include("home.php");
        break;
	  case "home":
        	include("home.php");
        	break;
        case "menu":
        	include("menu.php");
        	break;
		case "updatesp":
        	include("updatesp.php");
        	break; 
		case "bayartoday":
        	include("bayartoday.php");
        	break;
        	
        	case "bayartodayroi":
        	include("bayartodayroi.php");
        	break;
        	
		case "hapusdatabayar":
        	include("hapusdatabayar.php");
        	break;  
		case "stockist":
        	include("stockist.php");
        	break;
		case "historywithdrawl":
        	include("historywithdrawl.php");
        	break;
		case "laporan":
        	include("laporan.php");
        	break;
		case "histstockistordro":
        	include("histstockistordro.php");
        	break;
		case "ewalet":
        	include("ewalet.php");
        	break;
		case "addmember":
        	include("addmember.php");
        	break;
		case "stockistord":
        	include("stockistord.php");
        	break; 
			
		case "stockistordro":
        	include("stockistordro.php");
        	break; 
			
		case "history_tiket":
        	include("history_card.php");
        	break;
		case "updatejaringan":
        	include("updatejaringan.php");
        	break; 
		case "history_tiketb":
        	include("history_cardb.php");
        	break;
		case "inputbonus":
        	include("inputbonus.php");
        	break; 
		case "orderstock":
        	include("orderstock.php");
        	break; 
		case "orderstockplanc":
        	include("orderstockplanc.php");
        	break; 
		case "reward1":
        	include("reward1.php");
        	break;	
		case "reward1req":
        	include("reward1req.php");
        	break;
		case "reward2":
        	include("reward2.php");
        	break; 
		case "reward2req":
        	include("reward2req.php");
        	break;
		case "reward3":
        	include("reward3.php");
        	break;
		case "reward3req":
        	include("reward3req.php");
        	break;
		case "reward4":
        	include("reward4.php");
        	break;
		case "reward4req":
        	include("reward4req.php");
        	break;
		case "reward5":
        	include("reward5.php");
        	break;
		case "reward5req":
        	include("reward5req.php");
        	break;	 
		case "reward6":
        	include("reward6.php");
        	break;
		case "reward6req":
        	include("reward6req.php");
        	break;
		case "rewardplanb1":
        	include("rewardplanb1.php");
        	break;
		case "rewardplanb1req":
        	include("rewardplanb1req.php");
        	break;
		case "rewardplanb2":
        	include("rewardplanb2.php");
        	break;
		case "rewardplanb2req":
        	include("rewardplanb2req.php");
        	break;
		case "rewardplanb3":
        	include("rewardplanb3.php");
        	break;
		case "rewardplanb3req":
        	include("rewardplanb3req.php");
        	break;
		case "rewardplanb4":
        	include("rewardplanb4.php");
        	break;
		case "rewardplanb4req":
        	include("rewardplanb4req.php");
        	break;
		case "rewardplanb5":
        	include("rewardplanb5.php");
        	break;
		case "rewardplanb5req":
        	include("rewardplanb5req.php");
        	break;
		case "rewardplanb6":
        	include("rewardplanb6.php");
        	break;
		case "rewardplanb6req":
        	include("rewardplanb36req.php");
        	break;
		case "rewardplanc1":
        	include("rewardplanc1.php");
        	break;
		case "rewardplanc1req":
        	include("rewardplanc1req.php");
        	break;
		case "rewardplanc1a":
        	include("rewardplanc1a.php");
        	break;
		case "rewardplanc1areq":
        	include("rewardplanc1areq.php");
        	break;
		case "rewardplanc2":
        	include("rewardplanc2.php");
        	break;
		case "rewardplanc2req":
        	include("rewardplanc2req.php");
        	break;
		case "rewardplanc2a":
        	include("rewardplanc2a.php");
        	break;
		case "rewardplanc2areq":
        	include("rewardplanc2areq.php");
        	break;
		case "rewardplanc3":
        	include("rewardplanc3.php");
        	break;
		case "rewardplanc3req":
        	include("rewardplanc3req.php");
        	break;
		case "rewardplanc3a":
        	include("rewardplanc3a.php");
        	break;
		case "rewardplanc3areq":
        	include("rewardplanc3areq.php");
        	break;
		case "cardcenter":
        	include("kodeaktivasi.php");
        	break; 
		case "cardcenterb":
        	include("kodeaktivasib.php");
        	break;
		case "cardcenterc":
        	include("kodeaktivasic.php");
        	break;
		case "cekreward1":
        	include("cekreward1.php");
        	break;
		case "cekreward2":
        	include("cekreward2.php");
        	break;	
		case "cekreward3":
        	include("cekreward3.php");
        	break;	
		case "cekreward4":
        	include("cekreward4.php");
        	break;		
		case "stockistordro":
        	include("stockistordro.php");
        	break;
		case "produkplanc":
        	include("produkplanc.php");
        	break; 
		case "aktivasiro":
        	include("aktivasiro.php");
        	break; 
        	case "aktivasiro2":
        	include("aktivasiro2.php");
        	break; 
		case "berita":
        	include("newsman.php");
        	break; 
		case "content":
        	include("content.php");
        	break;  
		case "category":
        	include("category.php");
        	break; 
		case "iklan":
        	include("iklanman.php");
        	break; 
		case "testimonial":
			include("testimonial.php");
        	break;        	
	  	case "member":
        	include("member.php");
        	break;
		case "faq":
        	include("faq.php");
        	break;

		case "configuration":
        	include("configuration.php");
        	break;   
        	
        	case "configurationb":
        	include("configurationb.php");
        	break;   
        	
		case "mailmass":
        	include("infoe.php");
        	break;     
		case "cari":
        	include("cari.php");
        	break;
		case "changepass":
        	include("ganti_pass.php");
        	break;	
		case "history":
        	include("history.php");
        	break;
		case "withdrawl":
        	include("withdrawl.php");
      		break;
		case "withdrawlroi":
        	include("withdrawlroi.php");
      		break;
		case "saldo":
        	include("saldo.php");
        	break;	
			
			case "saldosms":
        	include("saldosms.php");
        	break;	
			
		case "testimonial":
        	include("testimonial.php");
        	break;
		case "testiproduk":
        	include("testiproduk.php");
        	break;
		}  
?>		   

    </div></td>

  </tr>

  <tr>

    <td>&nbsp;</td>

  </tr>

</table>

<div id="footer">
  <div align="center" class="ewalet style2">Copyright By
    <?= $db->config("domain"); ?>
 2015</div>
</div>



</body>

</html>
<?
} else {
echo "<meta http-equiv=\"refresh\" content=\"1; url=illegal.html\">";
}
?>