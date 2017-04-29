<?php
// include captcha class
require('php-captcha.inc.php');

// define fonts
$aFonts = array('VeraMoBd.ttf', 'comic.ttf');

// create new image
$oPhpCaptcha = new PhpCaptcha($aFonts, 150, 40);
$oPhpCaptcha->CaseInsensitive(false);
$oPhpCaptcha->UseColour(true);
$oPhpCaptcha->Create();

?>