<?php
/**
 * BillingSimpel
 * Version 2.0
 * Copyright, 2016 Dimas Pratama.
 *
 * @package BillingSimpel
 * @link https://dimaspratama.com/CekMutasi/
 * @author Widigdo Dimas Pratama (widigdo@dimaspratama.com)
 * @copyright 2016 Widigdo Dimas Pratama
 * Date Created: 21 August 2016
 */

session_start();
include 'app/settings/config.php';
include 'app/function.php';

if(isset($_GET['do'])) { 
    if($_GET['do']=='login') {
       if ( isset( $_SESSION['admin_login_billingsimpel'] ) ) { header('Location: ?do=dashboard'); die(); }
       $isLoginPage = 1;
    }
    if($_GET['do']=='signout') {
       unset($_SESSION['admin_login_billingsimpel']);
       header('Location: ?do=login');
       $isLoginPage = 1;
    }
}

if ( !isset( $_SESSION['admin_login_billingsimpel'] ) ) {
 $isLoginPage = 1;
   }

if(!isset($isLoginPage)) { ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BillingSimpel - Admin Panel</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header"><a class="navbar-brand navbar-link" href="#">BillingSimpel</a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav">
                    <li role="presentation"><a href="?do=dashboard">Dashboard </a></li>
                    <li role="presentation"><a href="?do=orders">Daftar Orderan</a></li>
                    <li role="presentation"><a href="?do=category">Kategori </a></li>
                    <li role="presentation"><a href="?do=products">Produk </a></li>
                    <li role="presentation"><a href="?do=mutasi">Mutasi </a></li>
                </ul>
                      <ul class="nav navbar-nav navbar-right">
                <li role="presentation"><a href="?do=signout">Sign Out</a></li>
            </ul>
            </div>
        </div>
    </nav>
    <div class="container">

<?php 
   if ( isset( $_GET['do'] ) ) {
      $act=htmlentities( $_GET['do'] );
    }else {
      $act="dashboard";
    }

    $file="app/pages/$act.php";
    $cek=strlen( $act );

    if ( $cek>30 || !file_exists( $file ) || empty( $act ) ) {
      header( 'Location: ?do=dashboard' );
    }else {
      include $file;
    }

?>
    </div>


        <div class="media">
            <div class="media-body"></div>
        </div>
    <footer class="site-footer">
        <div class="container">
            <hr>
            <div class="row">
                <div class="col-sm-6">
                    <h5>BillingSimpel © <?php echo date('Y') ?> by <a href="https://dimaspratama.com/">Dimas Pratama</a></h5></div>
                 </div>
        </div>
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>

<?php } else { 
if(!isset($_POST['username'])||!isset($_POST['secret'])) {
    
} else {
$username = mysqli_real_escape_string($conn, $_POST['username']);
$secret = mysqli_real_escape_string($conn, $_POST['secret']);
$n = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM settings WHERE name='admin_username' AND val='$username'"));
if($n<1) { die('Username/Kata Sandi Salah.');}
$n = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM settings WHERE name='admin_password' AND val='$secret'"));
if($n<1) { die('Username/Kata Sandi Salah.');}
$_SESSION['admin_login_billingsimpel'] = 1;
header('Location: ?do=dashboard');
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BillingSimpel</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <style>.login-card{
  max-width:350px;
  padding:40px 40px;
  background-color:#F7F7F7;
  margin:0 auto 25px;
  margin-top:50px;
  border-radius:2px;
  box-shadow:0px 2px 2px rgba(0, 0, 0, 0.3);
}

.login-card .profile-img-card{
  width:96px;
  height:96px;
  margin:0 auto 10px;
  display:block;
  border-radius:50%;
}

.login-card .profile-name-card{
  font-size:16px;
  font-weight:bold;
  text-align:center;
  margin:10px 0 0;
  min-height:1em;
}

.login-card .reauth-email{
  display:block;
  color:#404040;
  line-height:2;
  margin-bottom:10px;
  font-size:14px;
  text-align:center;
  overflow:hidden;
  text-overflow:ellipsis;
  white-space:nowrap;
  box-sizing:border-box;
}

.login-card .form-signin input[type=email], .login-card .form-signin input[type=password], .login-card .form-signin input[type=text], .login-card .form-signin button{
  height:44px;
  font-size:16px;
  width:100%;
  display:block;
  margin-bottom:10px;
  z-index:1;
  position:relative;
  box-sizing:border-box;
}

.login-card label{
  color:#000000;
}

.login-card .form-signin .form-control:focus{
  border-color:rgb(104, 145, 162);
  outline:0;
  -webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgb(104, 145, 162);
  box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgb(104, 145, 162);
}

.login-card .btn.btn-signin{
  font-weight:700;
  height:36px;
  line-height:36px;
  font-size:14px;
  background:rgb(104, 145, 162);
  border-radius:3px;
  border:none;
  transition:all 0.218s;
  padding:0;
}

.login-card .btn.btn-signin:hover, .login-card .btn.btn-signin:active, .login-card .btn.btn-signin:focus{
  background:rgb(12, 97, 33);
}

.login-card .forgot-password{
  color:rgb(104, 145, 162);
}

.login-card .forgot-password:hover, .login-card .forgot-password:active, .login-card .forgot-password:focus{
  color:rgb(12, 97, 33);
}

.breadcrumb{
  text-align:center;
  background-color:transparent;
  border-bottom:1px solid #eee;
  padding-top:12px;
  padding-bottom:12px;
  margin-bottom:40px;
}

nav.navbar.navbar-default{
  margin-bottom:0px;
}

@media (min-width:992px) {
  .product h2{
    margin-top:0;
  }
}

.navbar .navbar-brand{
  font-size:24px;
  line-height:18px;
}

.reviewer-name{
  margin-right:10px;
}

.site-footer{
  padding:20px 0;
  text-align:center;
}

@media (min-width:768px) {
  .site-footer h5{
    text-align:left;
  }
}

.site-footer h5{
  color:inherit;
  font-size:16px;
}

.site-footer .social-icons a:hover{
  opacity:1;
}

.site-footer .social-icons a{
  display:inline-block;
  width:32px;
  border:none;
  font-size:20px;
  border-radius:50%;
  margin:4px;
  color:#fff;
  text-align:center;
  background-color:#798FA5;
  height:32px;
  opacity:0.8;
  line-height:32px;
}

@media (min-width:768px) {
  .site-footer .social-icons{
    text-align:right;
  }
}

.btn.write-review{
  float:right;
  margin-top:-6px;
}

</style>
    <link rel="stylesheet" href="assets/bootstrap/fonts/font-awesome.min.css" />
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.form.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</head>

<body>
    <aside></aside>
    <footer class="site-footer">
        <div class="login-card"><a href="https://dimaspratama.com/mblopulsa/"><h2>BillingSimpel 2</h2></a>
            <p class="profile-name-card"> </p>
            <form class="form-signin" action="?do=login" method="post"><span class="reauth-email"> </span>
                <input class="form-control" type="text" required placeholder="Username Admin" autofocus id="inoutUsername" name="username" />
                <input class="form-control" type="password" required placeholder="Kata sandi Admin" id="inputPassword" name="secret" />
                <button class="btn btn-primary btn-block btn-lg btn-signin" type="submit">Sign in</button>
            </form>
        </div>
        <div class="container">
            <hr>
            <div class="row">
                 <div class="col-sm-6">
                    <h5>BillingSimpel © <?php echo date('Y') ?> by <a href="https://dimaspratama.com/">Dimas Pratama</a></h5></div>
                 </div>
        </div>
    </footer>
</body>

</html>
<?php } ?>