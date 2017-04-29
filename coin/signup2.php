<title>Konfirmasi Data Pendaftaran </title><?PHP 
$warna="red";
if ($pin<1) {
	echo "<H2><center><Font color=$warna>Maaf. Anda Tidak memiliki Voucher Aktivasi.</center></font></h2>";
} else {
$mytoken=$db->dataku("pin", $user_session);
if($mytoken<>$token) {
echo "<H2><center><Font color=$warna>Maaf. Token Anda Tidak Cocok.</center></font></h2>";
} else {

	$db->select("username", "member", "username='$username'");
	$chkd_user = $db->num_rows();
	if ($chkd_user!= "") {
	 	 echo "<H3><center><Font color=$warna>Username yang anda masukkan sudah terdaftar dalam database kami.</center></font>";
    echo "<center><Font color=$warna>Silahkan menggunakan username lain. <br></center></font></h3>";
} else {
if ($username=="") {
	echo "<H3><center><Font color=$warna>Maaf. Username Tidak Boleh Kosong.</center></font></h3>";
} else {
if((!preg_match('/^[a-zA-Z0-9_]+$/', $username))) { 
include "cekerror.php";
} else {
if ($pass1=="") {
	echo "<H3><center><Font color=$warna>Maaf. Password Tidak Boleh Kosong.</center></font></h3>";
} else {
if ($pass2=="") {
	echo "<H3><center><Font color=$warna>Maaf. Password Verifikasi Tidak Boleh Kosong.</center></font></h3>";
} else {
if(strlen($pass1)<6){
echo "<H3><center><Font color=$warna>Password Tidak Boleh Kurang Dari 6 Karakter.</center></font></h3>";
} else {
if($pass1<>$pass2){
echo "<H3><center><Font color=$warna>Password 1 dan Password 2 Harus Sama.</center></font></h3>";
} else {
if ($nama=="") {
	echo "<H3><center><Font color=$warna>Maaf. Nama Tidak Boleh Kosong.</center></font></h3>";
} else {
if ($email=="") {
	echo "<H3><center><Font color=$warna>Maaf. Email Tidak Boleh Kosong.</center></font></h3>";
} else {
if ($hp=="") {
	echo "<H3><center><Font color=$warna>Maaf. Mobile Phone Tidak Boleh Kosong.</center></font></h3>";
} else {
if ($alamat=="") {
	echo "<H3><center><Font color=$warna>Maaf. Alamat Tidak Boleh Kosong.</center></font></h3>";
} else {
if ($kota=="") {
	echo "<H3><center><Font color=$warna>Maaf. Kota Tidak Boleh Kosong.</center></font></h3>";
} else {
if ($norek=="") {
	echo "<H3><center><Font color=$warna>Maaf. Nomor Rekening Tidak Boleh Kosong.</center></font></h3>";
} else {
if ($an=="") {
	echo "<H3><center><Font color=$warna>Maaf. Atas Nama Rekening Tidak Boleh Kosong.</center></font></h3>";
} else {

if ($sponsor2 == "") {
	 	 echo "<H3><center><Font color=$warna>Maaf. Sponsor Tidak Boleh Kosong</center></font>";
    echo "<center><Font color=$warna>Anda Harus Memiliki Sponsor.<br></center></font></h3>";
} else {
	$db->select("username", "member", "username='$sponsor2' and status='1'");
	$chkd_sp = $db->num_rows();
if ($chkd_sp == "") {
	echo "<H3><center><Font color=$warna>Maaf. Username Sponsor yang Anda Masukan Tidak Terdapat Dalam Database Kami.</center></font>";
    echo "<center><Font color=$warna>Silahkan Isi Kolom Sponsor Dengan Benar. <br></center></font></h3>";
} else {
if ($upline2 == "") {
	echo "<H3><center><Font color=$warna>Maaf. Upline Tidak Boleh Kosong</center></font>";
    echo "<center><Font color=$warna>Anda Harus Memiliki Upline.<br></center></font></h3>";
} else {
	$db->select("username", "member", "username='$upline2' and status='1'");
	$chkd_upli = $db->num_rows();
if ($chkd_upli == "") {
	echo "<H3><center><Font color=$warna>Maaf. Username Upline Tidak Terdapat Dalam Database Kami.</center></font>";
    echo "<center><Font color=$warna>Silahkan Isi Kolom Sponsor Dengan Benar. <br></center></font></h3>";
} else {
	if($posisi=="KIRI" or $posisi=="kiri" or $posisi=="Kiri"){
	$sql = mysql_query("select kiri from upline where username='$upline'");
		$dta = mysql_fetch_row($sql);
		$adamember = $dta[0];
	} else {
		$sql = mysql_query("select kanan from upline where username='$upline'");
		$dta = mysql_fetch_row($sql);
		$adamember = $dta[0];
	}
	if($adamember<>""){
		echo "<H3><center><Font color=$warna>Maaf. Posisi yang Anda Pilih Sudah Terisi Member Lain.</center></font>";
    	echo "<center><Font color=$warna>Silahkan Tentukan Posisi Anda Dengan Benar. <br></center></font></h3>";
	} else {
	
$domain=$db->config("domain");
$level=$db->dataupline("level", $upline2);
$pass=$pass1;
$levele = $level + 1;

$newtoken=rand(1111, 9999);

		
$db->insert("member", "", "'', '$username', '$pass', '$newtoken', '$nama', '$sponsor2', '$upline2', '$posisi', '$email', '$alamat', '$kota', '$hp', '$phone', '$negara', '$pinbb', '$foto', '$bank', '$norek', '$an', '$payment', '$acc', '$nameacc', '$setuju', '$clientdate', '1','1', '$paket_daftar', '0', '0', 'Reguler', '0','$curency'");
					$upli0=$db->dataupline("upline0", $upline2);
					$upli1=$db->dataupline("upline0", $upli0);
					$upli2=$db->dataupline("upline0", $upli1);
					$upli3=$db->dataupline("upline0", $upli2);
					$upli4=$db->dataupline("upline0", $upli3);
					$upli5=$db->dataupline("upline0", $upli4);
					$upli6=$db->dataupline("upline0", $upli5);
					$upli7=$db->dataupline("upline0", $upli6);
					$upli8=$db->dataupline("upline0", $upli7);
					$upli9=$db->dataupline("upline0", $upli8);
					$upli10=$db->dataupline("upline0", $upli9);
					$upli11=$db->dataupline("upline0", $upli10);
					$upli12=$db->dataupline("upline0", $upli11);
					$upli13=$db->dataupline("upline0", $upli12);
					$upli14=$db->dataupline("upline0", $upli13);
					$upli15=$db->dataupline("upline0", $upli14);
					$upli16=$db->dataupline("upline0", $upli15);
					$upli17=$db->dataupline("upline0", $upli16);
					$upli18=$db->dataupline("upline0", $upli17);
					$upli19=$db->dataupline("upline0", $upli18);
					$upli20=$db->dataupline("upline0", $upli19);
					$upli21=$db->dataupline("upline0", $upli20);
					$upli22=$db->dataupline("upline0", $upli21);
					$upli23=$db->dataupline("upline0", $upli22);
					$upli24=$db->dataupline("upline0", $upli23);
					$upli25=$db->dataupline("upline0", $upli24);
					$upli26=$db->dataupline("upline0", $upli25);
					$upli27=$db->dataupline("upline0", $upli26);
					$upli28=$db->dataupline("upline0", $upli27);
					$upli29=$db->dataupline("upline0", $upli28);
					$upli30=$db->dataupline("upline0", $upli29);
					$upli31=$db->dataupline("upline0", $upli30);
					$upli32=$db->dataupline("upline0", $upli31);
					$upli33=$db->dataupline("upline0", $upli32);
					$upli34=$db->dataupline("upline0", $upli33);
					$upli35=$db->dataupline("upline0", $upli34);
					$upli36=$db->dataupline("upline0", $upli35);
					$upli37=$db->dataupline("upline0", $upli36);
					$upli38=$db->dataupline("upline0", $upli37);
					$upli39=$db->dataupline("upline0", $upli38);
					$upli40=$db->dataupline("upline0", $upli39);
					$upli41=$db->dataupline("upline0", $upli40);
					$upli42=$db->dataupline("upline0", $upli41);
					$upli43=$db->dataupline("upline0", $upli42);
					$upli44=$db->dataupline("upline0", $upli43);
					$upli45=$db->dataupline("upline0", $upli44);
					$upli46=$db->dataupline("upline0", $upli45);
					$upli47=$db->dataupline("upline0", $upli46);
					$upli48=$db->dataupline("upline0", $upli47);
					$upli49=$db->dataupline("upline0", $upli48);
					$upli50=$db->dataupline("upline0", $upli49);
					$upli51=$db->dataupline("upline0", $upli50);
					$upli52=$db->dataupline("upline0", $upli51);
					$upli53=$db->dataupline("upline0", $upli52);
					$upli54=$db->dataupline("upline0", $upli53);
					$upli55=$db->dataupline("upline0", $upli54);
					$upli56=$db->dataupline("upline0", $upli55);
					$upli57=$db->dataupline("upline0", $upli56);
					$upli58=$db->dataupline("upline0", $upli57);
					$upli59=$db->dataupline("upline0", $upli58);
					$upli60=$db->dataupline("upline0", $upli59);
					$upli61=$db->dataupline("upline0", $upli60);
					$upli62=$db->dataupline("upline0", $upli61);
					$upli63=$db->dataupline("upline0", $upli62);
					$upli64=$db->dataupline("upline0", $upli63);
					$upli65=$db->dataupline("upline0", $upli64);
					$upli66=$db->dataupline("upline0", $upli65);
					$upli67=$db->dataupline("upline0", $upli66);
					$upli68=$db->dataupline("upline0", $upli67);
					$upli69=$db->dataupline("upline0", $upli68);
					$upli70=$db->dataupline("upline0", $upli69);
					$upli71=$db->dataupline("upline0", $upli70);
					$upli72=$db->dataupline("upline0", $upli71);
					$upli73=$db->dataupline("upline0", $upli72);
					$upli74=$db->dataupline("upline0", $upli73);
					$upli75=$db->dataupline("upline0", $upli74);
					$upli76=$db->dataupline("upline0", $upli75);
					$upli77=$db->dataupline("upline0", $upli76);
					$upli78=$db->dataupline("upline0", $upli77);
					$upli79=$db->dataupline("upline0", $upli78);
					$upli80=$db->dataupline("upline0", $upli79);
					$upli81=$db->dataupline("upline0", $upli80);
					$upli82=$db->dataupline("upline0", $upli81);
					$upli83=$db->dataupline("upline0", $upli82);
					$upli84=$db->dataupline("upline0", $upli83);
					$upli85=$db->dataupline("upline0", $upli84);
					$upli86=$db->dataupline("upline0", $upli85);
					$upli87=$db->dataupline("upline0", $upli86);
					$upli88=$db->dataupline("upline0", $upli87);
					$upli89=$db->dataupline("upline0", $upli88);
					$upli90=$db->dataupline("upline0", $upli89);
					$upli91=$db->dataupline("upline0", $upli90);
					$upli92=$db->dataupline("upline0", $upli91);
					$upli93=$db->dataupline("upline0", $upli92);
					$upli94=$db->dataupline("upline0", $upli93);
					$upli95=$db->dataupline("upline0", $upli94);
					$upli96=$db->dataupline("upline0", $upli95);
					$upli97=$db->dataupline("upline0", $upli96);
					$upli98=$db->dataupline("upline0", $upli97);
					
					$upli99=$db->dataupline("upline0", $upli98);
					$upli100=$db->dataupline("upline0", $upli99);
					$upli101=$db->dataupline("upline0", $upli100);
					$upli102=$db->dataupline("upline0", $upli101);
					$upli103=$db->dataupline("upline0", $upli102);
					$upli104=$db->dataupline("upline0", $upli103);
					$upli105=$db->dataupline("upline0", $upli104);
					$upli106=$db->dataupline("upline0", $upli105);
					$upli107=$db->dataupline("upline0", $upli106);
					$upli108=$db->dataupline("upline0", $upli107);
					$upli109=$db->dataupline("upline0", $upli108);
					$upli110=$db->dataupline("upline0", $upli109);
					$upli111=$db->dataupline("upline0", $upli110);
					$upli112=$db->dataupline("upline0", $upli111);
					$upli113=$db->dataupline("upline0", $upli112);
					$upli114=$db->dataupline("upline0", $upli113);
					$upli115=$db->dataupline("upline0", $upli114);
					$upli116=$db->dataupline("upline0", $upli115);
					$upli117=$db->dataupline("upline0", $upli116);
					$upli118=$db->dataupline("upline0", $upli117);
					$upli119=$db->dataupline("upline0", $upli118);
					$upli120=$db->dataupline("upline0", $upli119);
					$upli121=$db->dataupline("upline0", $upli120);
					$upli122=$db->dataupline("upline0", $upli121);
					$upli123=$db->dataupline("upline0", $upli122);
					$upli124=$db->dataupline("upline0", $upli123);
					$upli125=$db->dataupline("upline0", $upli124);
					$upli126=$db->dataupline("upline0", $upli125);
					$upli127=$db->dataupline("upline0", $upli126);
					$upli128=$db->dataupline("upline0", $upli127);
					$upli129=$db->dataupline("upline0", $upli128);
					$upli130=$db->dataupline("upline0", $upli129);
					$upli131=$db->dataupline("upline0", $upli130);
					$upli132=$db->dataupline("upline0", $upli131);
					$upli133=$db->dataupline("upline0", $upli132);
					$upli134=$db->dataupline("upline0", $upli133);
					$upli135=$db->dataupline("upline0", $upli134);
					$upli136=$db->dataupline("upline0", $upli135);
					$upli137=$db->dataupline("upline0", $upli136);
					$upli138=$db->dataupline("upline0", $upli137);
					$upli139=$db->dataupline("upline0", $upli138);
					$upli140=$db->dataupline("upline0", $upli139);
					$upli141=$db->dataupline("upline0", $upli140);
					$upli142=$db->dataupline("upline0", $upli141);
					$upli143=$db->dataupline("upline0", $upli142);
					$upli144=$db->dataupline("upline0", $upli143);
					$upli145=$db->dataupline("upline0", $upli144);
					$upli146=$db->dataupline("upline0", $upli145);
					$upli147=$db->dataupline("upline0", $upli146);
					$upli148=$db->dataupline("upline0", $upli147);
					$upli149=$db->dataupline("upline0", $upli148);
					$upli150=$db->dataupline("upline0", $upli149);
					$upli151=$db->dataupline("upline0", $upli150);
					$upli152=$db->dataupline("upline0", $upli151);
					$upli153=$db->dataupline("upline0", $upli152);
					$upli154=$db->dataupline("upline0", $upli153);
					$upli155=$db->dataupline("upline0", $upli154);
					$upli156=$db->dataupline("upline0", $upli155);
					$upli157=$db->dataupline("upline0", $upli156);
					$upli158=$db->dataupline("upline0", $upli157);
					$upli159=$db->dataupline("upline0", $upli158);
					$upli160=$db->dataupline("upline0", $upli159);
					$upli161=$db->dataupline("upline0", $upli160);
					$upli162=$db->dataupline("upline0", $upli161);
					$upli163=$db->dataupline("upline0", $upli162);
					$upli164=$db->dataupline("upline0", $upli163);
					$upli165=$db->dataupline("upline0", $upli164);
					$upli166=$db->dataupline("upline0", $upli165);
					$upli167=$db->dataupline("upline0", $upli166);
					$upli168=$db->dataupline("upline0", $upli167);
					$upli169=$db->dataupline("upline0", $upli168);
					$upli170=$db->dataupline("upline0", $upli169);
					$upli171=$db->dataupline("upline0", $upli170);
					$upli172=$db->dataupline("upline0", $upli171);
					$upli173=$db->dataupline("upline0", $upli172);
					$upli174=$db->dataupline("upline0", $upli173);
					$upli175=$db->dataupline("upline0", $upli174);
					$upli176=$db->dataupline("upline0", $upli175);
					$upli177=$db->dataupline("upline0", $upli176);
					$upli178=$db->dataupline("upline0", $upli177);
					$upli179=$db->dataupline("upline0", $upli178);
					$upli180=$db->dataupline("upline0", $upli179);
					$upli181=$db->dataupline("upline0", $upli180);
					$upli182=$db->dataupline("upline0", $upli181);
					$upli183=$db->dataupline("upline0", $upli182);
					$upli184=$db->dataupline("upline0", $upli183);
					$upli185=$db->dataupline("upline0", $upli184);
					$upli186=$db->dataupline("upline0", $upli185);
					$upli187=$db->dataupline("upline0", $upli186);
					$upli188=$db->dataupline("upline0", $upli187);
					$upli189=$db->dataupline("upline0", $upli188);
					$upli190=$db->dataupline("upline0", $upli189);
					$upli191=$db->dataupline("upline0", $upli190);
					$upli192=$db->dataupline("upline0", $upli191);
					$upli193=$db->dataupline("upline0", $upli192);
					$upli194=$db->dataupline("upline0", $upli193);
					$upli195=$db->dataupline("upline0", $upli194);
					$upli196=$db->dataupline("upline0", $upli195);
					$upli197=$db->dataupline("upline0", $upli196);
					$upli198=$db->dataupline("upline0", $upli197);
					$upli199=$db->dataupline("upline0", $upli198);
					
$upli200=$db->dataupline("upline0", $upli199) ;
$upli201=$db->dataupline("upline0", $upli200) ;
$upli202=$db->dataupline("upline0", $upli201) ;
$upli203=$db->dataupline("upline0", $upli202) ;
$upli204=$db->dataupline("upline0", $upli203) ;
$upli205=$db->dataupline("upline0", $upli204) ;
$upli206=$db->dataupline("upline0", $upli205) ;
$upli207=$db->dataupline("upline0", $upli206) ;
$upli208=$db->dataupline("upline0", $upli207) ;
$upli209=$db->dataupline("upline0", $upli208) ;
$upli210=$db->dataupline("upline0", $upli209) ;
$upli211=$db->dataupline("upline0", $upli210) ;
$upli212=$db->dataupline("upline0", $upli211) ;
$upli213=$db->dataupline("upline0", $upli212) ;
$upli214=$db->dataupline("upline0", $upli213) ;
$upli215=$db->dataupline("upline0", $upli214) ;
$upli216=$db->dataupline("upline0", $upli215) ;
$upli217=$db->dataupline("upline0", $upli216) ;
$upli218=$db->dataupline("upline0", $upli217) ;
$upli219=$db->dataupline("upline0", $upli218) ;
$upli220=$db->dataupline("upline0", $upli219) ;
$upli221=$db->dataupline("upline0", $upli220) ;
$upli222=$db->dataupline("upline0", $upli221) ;
$upli223=$db->dataupline("upline0", $upli222) ;
$upli224=$db->dataupline("upline0", $upli223) ;
$upli225=$db->dataupline("upline0", $upli224) ;
$upli226=$db->dataupline("upline0", $upli225) ;
$upli227=$db->dataupline("upline0", $upli226) ;
$upli228=$db->dataupline("upline0", $upli227) ;
$upli229=$db->dataupline("upline0", $upli228) ;
$upli230=$db->dataupline("upline0", $upli229) ;
$upli231=$db->dataupline("upline0", $upli230) ;
$upli232=$db->dataupline("upline0", $upli231) ;
$upli233=$db->dataupline("upline0", $upli232) ;
$upli234=$db->dataupline("upline0", $upli233) ;
$upli235=$db->dataupline("upline0", $upli234) ;
$upli236=$db->dataupline("upline0", $upli235) ;
$upli237=$db->dataupline("upline0", $upli236) ;
$upli238=$db->dataupline("upline0", $upli237) ;
$upli239=$db->dataupline("upline0", $upli238) ;
$upli240=$db->dataupline("upline0", $upli239) ;
$upli241=$db->dataupline("upline0", $upli240) ;
$upli242=$db->dataupline("upline0", $upli241) ;
$upli243=$db->dataupline("upline0", $upli242) ;
$upli244=$db->dataupline("upline0", $upli243) ;
$upli245=$db->dataupline("upline0", $upli244) ;
$upli246=$db->dataupline("upline0", $upli245) ;
$upli247=$db->dataupline("upline0", $upli246) ;
$upli248=$db->dataupline("upline0", $upli247) ;
$upli249=$db->dataupline("upline0", $upli248) ;
$upli250=$db->dataupline("upline0", $upli249) ;
$upli251=$db->dataupline("upline0", $upli250) ;
$upli252=$db->dataupline("upline0", $upli251) ;
$upli253=$db->dataupline("upline0", $upli252) ;
$upli254=$db->dataupline("upline0", $upli253) ;
$upli255=$db->dataupline("upline0", $upli254) ;
$upli256=$db->dataupline("upline0", $upli255) ;
$upli257=$db->dataupline("upline0", $upli256) ;
$upli258=$db->dataupline("upline0", $upli257) ;
$upli259=$db->dataupline("upline0", $upli258) ;
$upli260=$db->dataupline("upline0", $upli259) ;
$upli261=$db->dataupline("upline0", $upli260) ;
$upli262=$db->dataupline("upline0", $upli261) ;
$upli263=$db->dataupline("upline0", $upli262) ;
$upli264=$db->dataupline("upline0", $upli263) ;
$upli265=$db->dataupline("upline0", $upli264) ;
$upli266=$db->dataupline("upline0", $upli265) ;
$upli267=$db->dataupline("upline0", $upli266) ;
$upli268=$db->dataupline("upline0", $upli267) ;
$upli269=$db->dataupline("upline0", $upli268) ;
$upli270=$db->dataupline("upline0", $upli269) ;
$upli271=$db->dataupline("upline0", $upli270) ;
$upli272=$db->dataupline("upline0", $upli271) ;
$upli273=$db->dataupline("upline0", $upli272) ;
$upli274=$db->dataupline("upline0", $upli273) ;
$upli275=$db->dataupline("upline0", $upli274) ;
$upli276=$db->dataupline("upline0", $upli275) ;
$upli277=$db->dataupline("upline0", $upli276) ;
$upli278=$db->dataupline("upline0", $upli277) ;
$upli279=$db->dataupline("upline0", $upli278) ;
$upli280=$db->dataupline("upline0", $upli279) ;
$upli281=$db->dataupline("upline0", $upli280) ;
$upli282=$db->dataupline("upline0", $upli281) ;
$upli283=$db->dataupline("upline0", $upli282) ;
$upli284=$db->dataupline("upline0", $upli283) ;
$upli285=$db->dataupline("upline0", $upli284) ;
$upli286=$db->dataupline("upline0", $upli285) ;
$upli287=$db->dataupline("upline0", $upli286) ;
$upli288=$db->dataupline("upline0", $upli287) ;
$upli289=$db->dataupline("upline0", $upli288) ;
$upli290=$db->dataupline("upline0", $upli289) ;
$upli291=$db->dataupline("upline0", $upli290) ;
$upli292=$db->dataupline("upline0", $upli291) ;
$upli293=$db->dataupline("upline0", $upli292) ;
$upli294=$db->dataupline("upline0", $upli293) ;
$upli295=$db->dataupline("upline0", $upli294) ;
$upli296=$db->dataupline("upline0", $upli295) ;
$upli297=$db->dataupline("upline0", $upli296) ;
$upli298=$db->dataupline("upline0", $upli297) ;
$upli299=$db->dataupline("upline0", $upli298) ;
$upli300=$db->dataupline("upline0", $upli299) ;
$upli301=$db->dataupline("upline0", $upli300) ;
$upli302=$db->dataupline("upline0", $upli301) ;
$upli303=$db->dataupline("upline0", $upli302) ;
$upli304=$db->dataupline("upline0", $upli303) ;
$upli305=$db->dataupline("upline0", $upli304) ;
$upli306=$db->dataupline("upline0", $upli305) ;
$upli307=$db->dataupline("upline0", $upli306) ;
$upli308=$db->dataupline("upline0", $upli307) ;
$upli309=$db->dataupline("upline0", $upli308) ;
$upli310=$db->dataupline("upline0", $upli309) ;
$upli311=$db->dataupline("upline0", $upli310) ;
$upli312=$db->dataupline("upline0", $upli311) ;
$upli313=$db->dataupline("upline0", $upli312) ;
$upli314=$db->dataupline("upline0", $upli313) ;
$upli315=$db->dataupline("upline0", $upli314) ;
$upli316=$db->dataupline("upline0", $upli315) ;
$upli317=$db->dataupline("upline0", $upli316) ;
$upli318=$db->dataupline("upline0", $upli317) ;
$upli319=$db->dataupline("upline0", $upli318) ;
$upli320=$db->dataupline("upline0", $upli319) ;
$upli321=$db->dataupline("upline0", $upli320) ;
$upli322=$db->dataupline("upline0", $upli321) ;
$upli323=$db->dataupline("upline0", $upli322) ;
$upli324=$db->dataupline("upline0", $upli323) ;
$upli325=$db->dataupline("upline0", $upli324) ;
$upli326=$db->dataupline("upline0", $upli325) ;
$upli327=$db->dataupline("upline0", $upli326) ;
$upli328=$db->dataupline("upline0", $upli327) ;
$upli329=$db->dataupline("upline0", $upli328) ;
$upli330=$db->dataupline("upline0", $upli329) ;
$upli331=$db->dataupline("upline0", $upli330) ;
$upli332=$db->dataupline("upline0", $upli331) ;
$upli333=$db->dataupline("upline0", $upli332) ;
$upli334=$db->dataupline("upline0", $upli333) ;
$upli335=$db->dataupline("upline0", $upli334) ;
$upli336=$db->dataupline("upline0", $upli335) ;
$upli337=$db->dataupline("upline0", $upli336) ;
$upli338=$db->dataupline("upline0", $upli337) ;
$upli339=$db->dataupline("upline0", $upli338) ;
$upli340=$db->dataupline("upline0", $upli339) ;
$upli341=$db->dataupline("upline0", $upli340) ;
$upli342=$db->dataupline("upline0", $upli341) ;
$upli343=$db->dataupline("upline0", $upli342) ;
$upli344=$db->dataupline("upline0", $upli343) ;
$upli345=$db->dataupline("upline0", $upli344) ;
$upli346=$db->dataupline("upline0", $upli345) ;
$upli347=$db->dataupline("upline0", $upli346) ;
$upli348=$db->dataupline("upline0", $upli347) ;
$upli349=$db->dataupline("upline0", $upli348) ;
$upli350=$db->dataupline("upline0", $upli349) ;
$upli351=$db->dataupline("upline0", $upli350) ;
$upli352=$db->dataupline("upline0", $upli351) ;
$upli353=$db->dataupline("upline0", $upli352) ;
$upli354=$db->dataupline("upline0", $upli353) ;
$upli355=$db->dataupline("upline0", $upli354) ;
$upli356=$db->dataupline("upline0", $upli355) ;
$upli357=$db->dataupline("upline0", $upli356) ;
$upli358=$db->dataupline("upline0", $upli357) ;
$upli359=$db->dataupline("upline0", $upli358) ;
$upli360=$db->dataupline("upline0", $upli359) ;
$upli361=$db->dataupline("upline0", $upli360) ;
$upli362=$db->dataupline("upline0", $upli361) ;
$upli363=$db->dataupline("upline0", $upli362) ;
$upli364=$db->dataupline("upline0", $upli363) ;
$upli365=$db->dataupline("upline0", $upli364) ;
$upli366=$db->dataupline("upline0", $upli365) ;
$upli367=$db->dataupline("upline0", $upli366) ;
$upli368=$db->dataupline("upline0", $upli367) ;
$upli369=$db->dataupline("upline0", $upli368) ;
$upli370=$db->dataupline("upline0", $upli369) ;
$upli371=$db->dataupline("upline0", $upli370) ;
$upli372=$db->dataupline("upline0", $upli371) ;
$upli373=$db->dataupline("upline0", $upli372) ;
$upli374=$db->dataupline("upline0", $upli373) ;
$upli375=$db->dataupline("upline0", $upli374) ;
$upli376=$db->dataupline("upline0", $upli375) ;
$upli377=$db->dataupline("upline0", $upli376) ;
$upli378=$db->dataupline("upline0", $upli377) ;
$upli379=$db->dataupline("upline0", $upli378) ;
$upli380=$db->dataupline("upline0", $upli379) ;
$upli381=$db->dataupline("upline0", $upli380) ;
$upli382=$db->dataupline("upline0", $upli381) ;
$upli383=$db->dataupline("upline0", $upli382) ;
$upli384=$db->dataupline("upline0", $upli383) ;
$upli385=$db->dataupline("upline0", $upli384) ;
$upli386=$db->dataupline("upline0", $upli385) ;
$upli387=$db->dataupline("upline0", $upli386) ;
$upli388=$db->dataupline("upline0", $upli387) ;
$upli389=$db->dataupline("upline0", $upli388) ;
$upli390=$db->dataupline("upline0", $upli389) ;
$upli391=$db->dataupline("upline0", $upli390) ;
$upli392=$db->dataupline("upline0", $upli391) ;
$upli393=$db->dataupline("upline0", $upli392) ;
$upli394=$db->dataupline("upline0", $upli393) ;
$upli395=$db->dataupline("upline0", $upli394) ;
$upli396=$db->dataupline("upline0", $upli395) ;
$upli397=$db->dataupline("upline0", $upli396) ;
$upli398=$db->dataupline("upline0", $upli397) ;
$upli399=$db->dataupline("upline0", $upli398) ;
$upli400=$db->dataupline("upline0", $upli399) ;
$upli401=$db->dataupline("upline0", $upli400) ;
$upli402=$db->dataupline("upline0", $upli401) ;
$upli403=$db->dataupline("upline0", $upli402) ;
$upli404=$db->dataupline("upline0", $upli403) ;
$upli405=$db->dataupline("upline0", $upli404) ;
$upli406=$db->dataupline("upline0", $upli405) ;
$upli407=$db->dataupline("upline0", $upli406) ;
$upli408=$db->dataupline("upline0", $upli407) ;
$upli409=$db->dataupline("upline0", $upli408) ;
$upli410=$db->dataupline("upline0", $upli409) ;
$upli411=$db->dataupline("upline0", $upli410) ;
$upli412=$db->dataupline("upline0", $upli411) ;
$upli413=$db->dataupline("upline0", $upli412) ;
$upli414=$db->dataupline("upline0", $upli413) ;
$upli415=$db->dataupline("upline0", $upli414) ;
$upli416=$db->dataupline("upline0", $upli415) ;
$upli417=$db->dataupline("upline0", $upli416) ;
$upli418=$db->dataupline("upline0", $upli417) ;
$upli419=$db->dataupline("upline0", $upli418) ;
$upli420=$db->dataupline("upline0", $upli419) ;
$upli421=$db->dataupline("upline0", $upli420) ;
$upli422=$db->dataupline("upline0", $upli421) ;
$upli423=$db->dataupline("upline0", $upli422) ;
$upli424=$db->dataupline("upline0", $upli423) ;
$upli425=$db->dataupline("upline0", $upli424) ;
$upli426=$db->dataupline("upline0", $upli425) ;
$upli427=$db->dataupline("upline0", $upli426) ;
$upli428=$db->dataupline("upline0", $upli427) ;
$upli429=$db->dataupline("upline0", $upli428) ;
$upli430=$db->dataupline("upline0", $upli429) ;
$upli431=$db->dataupline("upline0", $upli430) ;
$upli432=$db->dataupline("upline0", $upli431) ;
$upli433=$db->dataupline("upline0", $upli432) ;
$upli434=$db->dataupline("upline0", $upli433) ;
$upli435=$db->dataupline("upline0", $upli434) ;
$upli436=$db->dataupline("upline0", $upli435) ;
$upli437=$db->dataupline("upline0", $upli436) ;
$upli438=$db->dataupline("upline0", $upli437) ;
$upli439=$db->dataupline("upline0", $upli438) ;
$upli440=$db->dataupline("upline0", $upli439) ;
$upli441=$db->dataupline("upline0", $upli440) ;
$upli442=$db->dataupline("upline0", $upli441) ;
$upli443=$db->dataupline("upline0", $upli442) ;
$upli444=$db->dataupline("upline0", $upli443) ;
$upli445=$db->dataupline("upline0", $upli444) ;
$upli446=$db->dataupline("upline0", $upli445) ;
$upli447=$db->dataupline("upline0", $upli446) ;
$upli448=$db->dataupline("upline0", $upli447) ;
$upli449=$db->dataupline("upline0", $upli448) ;
$upli450=$db->dataupline("upline0", $upli449) ;
$upli451=$db->dataupline("upline0", $upli450) ;
$upli452=$db->dataupline("upline0", $upli451) ;
$upli453=$db->dataupline("upline0", $upli452) ;
$upli454=$db->dataupline("upline0", $upli453) ;
$upli455=$db->dataupline("upline0", $upli454) ;
$upli456=$db->dataupline("upline0", $upli455) ;
$upli457=$db->dataupline("upline0", $upli456) ;
$upli458=$db->dataupline("upline0", $upli457) ;
$upli459=$db->dataupline("upline0", $upli458) ;
$upli460=$db->dataupline("upline0", $upli459) ;
$upli461=$db->dataupline("upline0", $upli460) ;
$upli462=$db->dataupline("upline0", $upli461) ;
$upli463=$db->dataupline("upline0", $upli462) ;
$upli464=$db->dataupline("upline0", $upli463) ;
$upli465=$db->dataupline("upline0", $upli464) ;
$upli466=$db->dataupline("upline0", $upli465) ;
$upli467=$db->dataupline("upline0", $upli466) ;
$upli468=$db->dataupline("upline0", $upli467) ;
$upli469=$db->dataupline("upline0", $upli468) ;
$upli470=$db->dataupline("upline0", $upli469) ;
$upli471=$db->dataupline("upline0", $upli470) ;
$upli472=$db->dataupline("upline0", $upli471) ;
$upli473=$db->dataupline("upline0", $upli472) ;
$upli474=$db->dataupline("upline0", $upli473) ;
$upli475=$db->dataupline("upline0", $upli474) ;
$upli476=$db->dataupline("upline0", $upli475) ;
$upli477=$db->dataupline("upline0", $upli476) ;
$upli478=$db->dataupline("upline0", $upli477) ;
$upli479=$db->dataupline("upline0", $upli478) ;
$upli480=$db->dataupline("upline0", $upli479) ;
$upli481=$db->dataupline("upline0", $upli480) ;
$upli482=$db->dataupline("upline0", $upli481) ;
$upli483=$db->dataupline("upline0", $upli482) ;
$upli484=$db->dataupline("upline0", $upli483) ;
$upli485=$db->dataupline("upline0", $upli484) ;
$upli486=$db->dataupline("upline0", $upli485) ;
$upli487=$db->dataupline("upline0", $upli486) ;
$upli488=$db->dataupline("upline0", $upli487) ;
$upli489=$db->dataupline("upline0", $upli488) ;
$upli490=$db->dataupline("upline0", $upli489) ;
$upli491=$db->dataupline("upline0", $upli490) ;
$upli492=$db->dataupline("upline0", $upli491) ;
$upli493=$db->dataupline("upline0", $upli492) ;
$upli494=$db->dataupline("upline0", $upli493) ;
$upli495=$db->dataupline("upline0", $upli494) ;
$upli496=$db->dataupline("upline0", $upli495) ;
$upli497=$db->dataupline("upline0", $upli496) ;
$upli498=$db->dataupline("upline0", $upli497) ;
$upli499=$db->dataupline("upline0", $upli498) ;		
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					


//-------------------masukkan ke tabel upline--------------
$db->insert("upline", "", "'', '$username', '$sponsor2', '$posisi', '', '', '$upline2', '$upli0', '$upli1', '$upli2', '$upli3', '$upli4', '$upli5', '$upli6', '$upli7', '$upli8', '$upli9', '$upli10', '$upli11', '$upli12', '$upli13', '$upli14', '$upli15', '$upli16', '$upli17', '$upli18', '$upli19', '$upli20', '$upli21', '$upli22', '$upli23', '$upli24', '$upli25', '$upli26', '$upli27', '$upli28', '$upli29', '$upli30', '$upli31', '$upli32', '$upli33', '$upli34', '$upli35', '$upli36', '$upli37', '$upli38', '$upli39', '$upli40', '$upli41', '$upli42', '$upli43', '$upli44', '$upli45', '$upli46', '$upli47', '$upli48', '$upli49', '$upli50', '$upli51', '$upli52', '$upli53', '$upli54', '$upli55', '$upli56', '$upli57', '$upli58', '$upli59', '$upli60', '$upli61', '$upli62', '$upli63', '$upli64', '$upli65', '$upli66', '$upli67', '$upli68', '$upli69', '$upli70', '$upli71', '$upli72', '$upli73', '$upli74', '$upli75', '$upli76', '$upli77', '$upli78', '$upli79', '$upli80', '$upli81', '$upli82', '$upli83', '$upli84', '$upli85', '$upli86', '$upli87', '$upli88', '$upli89', '$upli90', '$upli91', '$upli92', '$upli93', '$upli94', '$upli95', '$upli96', '$upli97', '$upli98', '$upli99', '$upli100', '$upli101', '$upli102', '$upli103', '$upli104', '$upli105', '$upli106', '$upli107', '$upli108', '$upli109', '$upli110', '$upli111', '$upli112', '$upli113', '$upli114', '$upli115', '$upli116', '$upli117', '$upli118', '$upli119', '$upli120', '$upli121', '$upli122', '$upli123', '$upli124', '$upli125', '$upli126', '$upli127', '$upli128', '$upli129', '$upli130', '$upli131', '$upli132', '$upli133', '$upli134', '$upli135', '$upli136', '$upli137', '$upli138', '$upli139', '$upli140', '$upli141', '$upli142','$upli143', '$upli144', '$upli145', '$upli146', '$upli147', '$upli148',  '$upli149', '$upli150', '$upli151', '$upli152', '$upli153','$upli154', '$upli155', '$upli156', '$upli157', '$upli158', '$upli159', '$upli160', '$upli161', '$upli162',  '$upli163', '$upli164', '$upli165', '$upli166', '$upli167', '$upli168', '$upli169', '$upli170', '$upli171', '$upli172', '$upli173', '$upli174', '$upli175', '$upli176', '$upli177', '$upli178', '$upli179', '$upli180', '$upli181', '$upli182', '$upli183', '$upli184', '$upli185', '$upli186', '$upli187', '$upli188', '$upli189', '$upli190', '$upli191', '$upli192', '$upli193', '$upli194', '$upli195', '$upli196', '$upli197', '$upli198', '$upli199', '$upli200', '$upli201', '$upli202', '$upli203', '$upli204', '$upli205', '$upli206', '$upli207', '$upli208', '$upli209', '$upli210', '$upli211', '$upli212', '$upli213', '$upli214', '$upli215', '$upli216', '$upli217', '$upli218', '$upli219', '$upli220', '$upli221', '$upli222', '$upli223', '$upli224', '$upli225', '$upli226', '$upli227', '$upli228', '$upli229', '$upli230', '$upli231', '$upli232', '$upli233', '$upli234', '$upli235', '$upli236', '$upli237', '$upli238', '$upli239', '$upli240', '$upli241', '$upli242', '$upli243', '$upli244', '$upli245', '$upli246', '$upli247', '$upli248', '$upli249', '$upli250', '$upli251', '$upli252', '$upli253', '$upli254', '$upli255', '$upli256', '$upli257', '$upli258', '$upli259', '$upli260', '$upli261', '$upli262', '$upli263', '$upli264', '$upli265', '$upli266', '$upli267', '$upli268', '$upli269', '$upli270', '$upli271', '$upli272', '$upli273', '$upli274', '$upli275', '$upli276', '$upli277', '$upli278', '$upli279', '$upli280', '$upli281', '$upli282', '$upli283', '$upli284', '$upli285', '$upli286', '$upli287', '$upli288', '$upli289', '$upli290', '$upli291', '$upli292', '$upli293', '$upli294', '$upli295', '$upli296', '$upli297', '$upli298', '$upli299', '$upli300', '$upli301', '$upli302', '$upli303', '$upli304', '$upli305', '$upli306', '$upli307', '$upli308', '$upli309', '$upli310', '$upli311', '$upli312', '$upli313', '$upli314', '$upli315', '$upli316', '$upli317', '$upli318', '$upli319', '$upli320', '$upli321', '$upli322', '$upli323', '$upli324', '$upli325', '$upli326', '$upli327', '$upli328', '$upli329', '$upli330', '$upli331', '$upli332', '$upli333', '$upli334', '$upli335', '$upli336', '$upli337', '$upli338', '$upli339', '$upli340', '$upli341', '$upli342', '$upli343', '$upli344', '$upli345', '$upli346', '$upli347', '$upli348', '$upli349', '$upli350', '$upli351', '$upli352', '$upli353', '$upli354', '$upli355', '$upli356', '$upli357', '$upli358', '$upli359', '$upli360', '$upli361', '$upli362', '$upli363', '$upli364', '$upli365', '$upli366', '$upli367', '$upli368', '$upli369', '$upli370', '$upli371', '$upli372', '$upli373', '$upli374', '$upli375', '$upli376', '$upli377', '$upli378', '$upli379', '$upli380', '$upli381', '$upli382', '$upli383', '$upli384', '$upli385', '$upli386', '$upli387', '$upli388', '$upli389', '$upli390', '$upli391', '$upli392', '$upli393', '$upli394', '$upli395', '$upli396', '$upli397', '$upli398', '$upli399', '$upli400', '$upli401', '$upli402', '$upli403', '$upli404', '$upli405', '$upli406', '$upli407', '$upli408', '$upli409', '$upli410', '$upli411', '$upli412', '$upli413', '$upli414', '$upli415', '$upli416', '$upli417', '$upli418', '$upli419', '$upli420', '$upli421', '$upli422', '$upli423', '$upli424', '$upli425', '$upli426', '$upli427', '$upli428', '$upli429', '$upli430', '$upli431', '$upli432', '$upli433', '$upli434', '$upli435', '$upli436', '$upli437', '$upli438', '$upli439', '$upli440', '$upli441', '$upli442', '$upli443', '$upli444', '$upli445', '$upli446', '$upli447', '$upli448', '$upli449', '$upli450', '$upli451', '$upli452', '$upli453', '$upli454', '$upli455', '$upli456', '$upli457', '$upli458', '$upli459', '$upli460', '$upli461', '$upli462', '$upli463', '$upli464', '$upli465', '$upli466', '$upli467', '$upli468', '$upli469', '$upli470', '$upli471', '$upli472', '$upli473', '$upli474', '$upli475', '$upli476', '$upli477', '$upli478', '$upli479', '$upli480', '$upli481', '$upli482', '$upli483', '$upli484', '$upli485', '$upli486', '$upli487', '$upli488', '$upli489', '$upli490', '$upli491', '$upli492', '$upli493', '$upli494', '$upli495', '$upli496', '$upli497', '$upli498', '$upli499',  '$levele', '1','1','0','0'");



$mypin = $db->pinku("jumlahpin", $user_session);
$newpin=$mypin-1;
$db->update("card", "jumlahpin='$newpin'", "username='$user_session'");
$db->insert("card", "", "'', '$username', '0', '$clientdate'");
$db->insert("history_card", "", "'', '$user_session', '1', 'Aktivasi Username : $username', '$clientdate'");


$message= "Selamat Datang Di www.WTC-int.Com User ID : ".$username.", Pass : ".$pass." Token/pin : ".$newtoken." Segera Lengkapi data dimember area. Terima Kasih.";

//$db->insert("outbox", "", "'', '$hp', '$sms'");
$db->smsnotifikasi ($hp , $message) ;

if($posisi == "KIRI") {
			$db->update("upline", "kiri='$username'", "username='$upline2'");
		} else {
			$db->update("upline", "kanan='$username'", "username='$upline2'");
		}
		
		$emailadmin = $db->config("email");
		$isimail="Berikut data Member Baru di https://WTC-int.com:\n"
				."User ID : $username\n"
				."Password : $pass\n"
				."Token : $newtoken\n"
				."Nama : $nama\n"
				."No. HP : $hp\n"
				."E-mail : $email\n"
				."Tanggal Daftar : $clientdate\n\n"
			
				."";
		$headers = "From: $nama<$email>\nX-Sender: $email\n";
		$subject = "[Pendaftaran Partisipan Baru di https://WTC-int.com]"; 

   
$pengelola = $db->config("name"); 
		
		$subject2 ="Selamat Datang di https://WTC-int.com";
		$headers2="From: $domain<".$emailadmin.">\nX-Sender: ".$emailadmin."\n";

 	if($off == 1) {
		$filename = "thankyou.txt";	
	} else {	
		$filename = "thankyou.txt";

	}	

	$fp = fopen($filename, "r");
	$data = fread($fp, filesize($filename));
	fclose($fp);
	$data = ereg_replace("{USERNAME}", $username, $data);
	$data = ereg_replace("{EMAIL}", $email, $data);
	$data = ereg_replace("{PASSWORD}", $pass, $data);
	$data = ereg_replace("{MYTOKEN}", $newtoken, $data);
	$data = ereg_replace("{HP}", $hp, $data);
	$data = ereg_replace("{NAMA}", $nama, $data);
	
	$data = ereg_replace("{PENGELOLA}", $pengelola, $data);

	$aemailbody = $data;
        @mail($email, $subject2, $aemailbody, $headers2); 
		@mail($emailadmin, $subject, $isimail, $headers);
		




		include "thankyou.php";
	}
}
}
}}}}}}}}
}}}}
}}}}}}
?>
 