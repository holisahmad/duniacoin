<?php
	include "geb_database.php";
	include "geb_utama.php";
	$db = new db_mysql($server_name, $userdb, $passdb, $databasename,"");
	include "plus_inc.php";
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Solutionprofit.com Company's Profile</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
    body{
    background-image: url(bg_clouds_blue.jpg);
    background-repeat: no-repeat;
    background-position: 0 50px;
}
    .navbar {
    border: 0;
    border-radius: 0;
    background: #637fa4;
    background: -webkit-linear-gradient(top, #637fa4 1%, #3a6693 50%, #245391 50%, #205486 100%);
    background: -moz-linear-gradient(top, #637fa4 1%, #3a6693 50%, #245391 50%, #205486 100%);
    background: -o-linear-gradient(top, #637fa4 1%, #3a6693 50%, #245391 50%, #205486 100%);
    background: -ms-linear-gradient(top, #637fa4 1%, #3a6693 50%, #245391 50%, #205486 100%);
    background: linear-gradient(top, #637fa4 1%, #3a6693 50%, #245391 50%, #205486 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#637fa4', endColorstr='#205486', GradientType=0);
    }
    .navbar-default .navbar-nav>li>a {
    color: #fff;
    font-weight: bold;
}
.navbar-default .navbar-nav>.active>a, .navbar-default .navbar-nav>.active>a:focus, .navbar-default .navbar-nav>.active>a:hover {
    color: #21548a;
    background-color: #d0e2f7;
}
.navbar-default .navbar-nav>li>a:focus, .navbar-default .navbar-nav>li>a:hover {
    color: #4d7bab;
    background-color: #bad0ea;
}
.wrapper-sht{
    text-align: center;
    background-image: linear-gradient(#cacaca, #ececec);
    border-radius: 5px;
    border: 1px solid #a0a0d4;
}
.wrapper-sht img{}
.marquee-wrapper{}
.marquee-wrapper marquee{
height: 200px;
}
.marquee-wrapper marquee ul{
margin:0;
padding:0;
}
.marquee-wrapper marquee ul li{
    list-style: none;
    padding: 12px 0;
    border-bottom: 1px solid #c5c5c5;
}
.footer-bg{
background-color: #ebeff8; padding-top: 2em;
}
.footer-bg .panel{
    background-color: transparent;
    border: 0;
    box-shadow: none;
}
.clr-orange {
    color: #fd6102;
}
    </style>
  </head>
  <body>
  
  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/"><img src="/Solutionprofitlogo.png" class="img-responsive" style="height: 25px;"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="/">Home</a></li>
        <li><a href="/about.php">About</a></li>
        <li class="active"><a href="/company.php">Company</a></li>
        <li><a href="/downloads.php">Downloads</a></li>
        <li><a href="/contacts.php">Contacts</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="/login.php"><span class="glyphicon glyphicon-user"></span> My Account</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="container">

<div class="row">
	<div class="panel" style="padding: 5em 1em; border: 1px solid gray; background-color: rgba(255, 255, 255, 0.7);">
	<div class="panel-body">
		<div>
	                <h1>Company Profile</h1>
	                <p>Solution Profit Group LLC for reliable and profitable investment opportunities! Since 2010, the company has been offering the best investments opportunities for business planning and startups. The company is also a reliable partner for investors willing to invest their funds in Forex market,index and Comodity. Our team is here to provide you the best service possible.<br><br>
	
	The company was founded by professional Forex traders. The services rendered by our staff are market analysis, online marketing, and profitable trade. Safe trading activity is achieved not only through the distribution of financial assets and financial flows, but also through the in-house trading system with low risks. <br><br>
	
	 Solution Profit Group LLC is an innovative company with a unique approach to investments of funds yielding sizable profits 2% per day in the long-term perspective. We offer stable, lucrative and timely payouts, the safety of our client's funds and protection of their personal information. Cooperation with Solution Profit Group LLC is the key to your financial freedom and impressive results in the field of online investments!
	</p>
		</div>
	        <div>
			<h3>OUR VISION</h3>
			
			<p>To be the best in class, most preferred investment solution provider.</p>
		</div>

        	<div>
			<h3>OUR MISION</h3>
			
			<p>Our mission is to provide investment management and investment advisory services to enable our clients achieve their financial goals. Our services would be delivered through a client centric approach focusing on superior returns, excellent customer service, and need-based products while maintaining highest ethical and professional standards.<br>
			We would focus on being accessible for investors and for those who want to invest in our company.
			We are also committed to create awareness on savings and investments among general public.</p>
		</div>
	</div>
	</div>
</div>

	<div class="row">
	<div class="footer text-center">
	  <div class="col-sm-12">
	  <div class="wrapper acenter">
        <a class="clr-orange" href="/">Home</a> 
| <a class="clr-orange" href="#">Features</a> 
| <a class="clr-orange" href="#">FAQs</a> 
| <a class="clr-orange" href="./downloads.php">Downloads</a> 
| <a class="clr-orange" href="./login">My Account</a> 
| <a class="clr-orange" href="#">Support</a> 
| <a class="clr-orange" href="./about.php">About Us</a> 
| <a class="clr-orange" href="./contacts.php">Contact Us</a>
<br>
		<p class="tsmall">©2016 Solution Profit Group LLC</p>
		
	</div>
	  </div>
	</div>
	</div>
	</div>
	</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>