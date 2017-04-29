<style type="text/css">
<!--
body {
	background-image: url(images/indah.jpg);
}
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}

.style2 {font-weight: bold; }
.allform {
padding-top:10px;
margin:1em 0;
}

.allform fieldset {
padding-top:.5em;
border:none;
border-top:1px solid #f1f1f1;
margin:0;
}

.allform p {
clear:both;
overflow:hidden;
margin:.5em 0;
}

.allform label {
float:left;
width:200px;
display:block;
text-align:right;
margin-right:10px;
}

.allform input,.allform textarea {
width:200px;
border:1px solid #ddd;
margin:0;
padding:3px 5px 3px 25px;
}

.allform input.name {
background:#fff url(../image/icon/namaemail.gif) no-repeat 5px 50%;
}

.allform input.alamat {
background:#fff url(../image/icon/alamat.png) no-repeat 5px 50%;
}

.allform input.kota {
background:#fff url(../image/icon/kota.png) no-repeat 5px 50%;
}

.allform input.handphone {
background:#fff url(../image/icon/handphone.png) no-repeat 5px 50%;
}

.allform input.password {
background:#fff url(../image/icon/password.png) no-repeat 5px 50%;
}

.allform input.lupapassword {
background:#fff url(../image/icon/lupapassword.gif) no-repeat 5px 50%;
}

.allform input.telepon {
background:#fff url(../image/icon/telepon.png) no-repeat 5px 50%;
}

.allform input.nilaitransfer {
background:#fff url(../image/icon/nilaitransfer.png) no-repeat 5px 50%;
}

.allform input.email {
background:#fff url(../image/icon/emailanda.gif) no-repeat 5px 50%;
}

.allform input.subject {
background:#fff url(../image/icon/subject.gif) no-repeat 5px 50%;
}

.allform textarea.message {
background:#fff url(../image/icon/isiemail.gif) no-repeat 5px 6px;
}

.allform textarea.keterangan {
background:#fff url(../image/icon/keterangan.gif) no-repeat 5px 6px;
}

.allform textarea {
height:125px;
overflow:auto;
}

.allform p.submit {
clear:both;
border-top:1px solid #f1f1f1;
margin:1em 0;
padding:.5em 210px;
}

.allform button {
height:28px;
line-height:28px;
border-top:1px solid #999;
border-left:1px solid #999;
border-right:1px solid #333;
border-bottom:1px solid #333;
background:url(../image/icon/form_button.gif) no-repeat;
color:#333;
cursor:pointer;
text-align:left;
font-size:11px;
font-weight:700;
padding:0 10px 0 25px;
}
-->
</style>
<form action="loginprocess.php" method="post" class="allform" name="form1" id="form1">
<table width="850" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="550" align="left" valign="top" background="images/login-new.png">
    
    <table width="633" border="0" cellspacing="2" cellpadding="2">
      <tr>
        <td width="181">&nbsp;</td>
        <td width="121">&nbsp;</td>
        <td width="16">&nbsp;</td>
        <td width="289">&nbsp;</td>
      </tr>
      <tr>
        <td height="158">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>Username ID</td>
        <td align="center">:</td>
        <td><input name="userlogin" type="text" id="userlogin" class="name" value="" size="20" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>Password</td>
        <td align="center">:</td>
        <td><input name="passlogin" type="password" id="passlogin" class="password" value="" size="20" /></td>
      </tr>
      <tr>
        <td height="22">&nbsp;</td>
        <td>&nbsp;</td>
        <td align="center">&nbsp;</td>
        <td><img src="captcha.php" width="150" height="40" border="0" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>Chaptcha</td>
        <td align="center">:</td>
        <td><input name="php_captcha" type="text" id="php_captcha" value="" class="password" size="20" /></td>
      </tr>
      <tr>
        <td height="42">&nbsp;</td>
        <td>&nbsp;</td>
        <td align="center">&nbsp;</td>
        <td><input type="submit" name="button" id="button" value="MEMBER LOGIN" class="email" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td align="right"><a href="index.php">Home</a></td>
        <td align="center">|</td>
        <td align="left"><a href="?u=loss_pass">Lupa Password ?</a> | <a href="?u=loss_token">Lupa Token ?</a></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
