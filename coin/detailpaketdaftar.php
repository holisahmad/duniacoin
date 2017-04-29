<?
	if($user_status > 0 ) {
?>
<style type="text/css">
<!--
.style1 {
	color: #FF0000;
	font-weight: bold;
}
.style3 {
	color: #FF0000;
	font-weight: bold;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 18px;
}
-->
</style>

<center>
  <h1 class="style1">Detail Package </h1>
  <h2>Bronze : IDR. 100.000 - IDR. 1.000.000</h2>
  <h2>Silver : IDR. 1.100.000 - IDR. 5.000.000</h2>
  <h2>Gold : IDR. 5.100.000 - IDR. 10.000.000</h2>
  <h2>Platinum : IDR. 30.000.000</h2>
  <h2>Diamond : IDR. 50.000.000</h2>
  <p>&nbsp;</p>
</center>
<?
} else {
echo "<meta http-equiv=\"refresh\" content=\"1; url=illegal.html\">";
}
?>
