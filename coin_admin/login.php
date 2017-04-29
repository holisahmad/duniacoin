<?php
session_start();
$username = $_POST['username']; 
$admin_password = $_POST['password'];
if ($username && $admin_password)
{
	include "../geb_database.php";
	include "../geb_utama_coin.php";
	$db = new db_mysql($server_name, $userdb, $passdb, $databasename,"");
	$password=($admin_password);
  $db->select("userid, email", "admin", "userid='$username' and pass='$password'");
if ($db->num_rows() >0)
  {
	$_SESSION['valid_admin'] = $db->result(0, "userid");
	session_write_close();
  }  else {
	header("location: login.php?result=wrong");
}
}
 if(isset( $_SESSION['valid_admin']))
  {
    header("location:index.php ");
  }
  else
  {
?>
<html>
<title>ADMIN LOGIN</title>
<style type="text/css">
<!--
.kotak {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	border: 1px solid #CCCCCC;
}
.style11 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; }
a:link {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #0000FF;
	text-decoration: none;
}
a:hover {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
	color: #FF0000;
	text-decoration: underline;
}
.style12 {
	color: #FF0000;
	font-weight: bold;
}
.style13 {color: #FF0000}
body {
	margin-top: 80px;
}
.style14 {color: #FFFF00}
-->
</style>

<body>
<div align="center">
<table width="355" border="0" align="center" cellpadding="0" cellspacing="0" class="kotak">
    <tr> 
      <td width="353" height="30" bgcolor="#006600"><div class="bodytext" align="center"> 
          <p class="style14"><b>ADMINISTRATOR LOGIN</b> <b><br>
          </b></p>
        </div></td>
    </tr>
    <tr>
      <td><div align="center">
        <p>
          <?
	 if($result == "wrong") {
	 ?>
        </p>
        <p><span class="style12">Access Denied!</span><br>
            <span class="style13">Your username or password is wrong!</span></p>
        <?
	 }
	 ?>
        <form method="post" action="login.php">
          <table width="60%" cellpadding="5" cellspacing="0" class="bodytext">
            <tr>
              <td><span class="style11">Username</span></td>
              <td><span class="style11">:</span></td>
              <td><input name="username" type="text" size="15"></td>
            </tr>
            <tr>
              <td><span class="style11">Password</span></td>
              <td><span class="style11">:</span></td>
              <td><input name="password" type="password" size="15"></td>
            </tr>
          </table>
          <input type="submit" name="submit" value=" LOGIN ">
        </form>
        <p>&nbsp;</p>
      </div></td>
    </tr>
    <tr>
      <td bgcolor="#FF6600">&nbsp;</td>
    </tr>
  </table>
</div>
</body>
</html>
<?php
}
?>