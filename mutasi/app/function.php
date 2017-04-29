<?php
/**
 * DimasPratama.com - Cek Mutasi Engine
 * Version 5.2
 * Copyright, 2016 Dimas Pratama.
 *
 * @package Cek Mutasi
 * @link https://dimaspratama.com/
 * @author Widigdo Dimas Pratama (widigdo@dimaspratama.com)
 * @copyright 2016 Widigdo Dimas Pratama | DimasPratama.com
 * Date Created: 01 August 2016
 */

function sendEmailSMTP( $destination, $email, $host, $port, $security, $password, $hasil ) 
{
	require_once 'app/lib/PHPMailerAutoload.php';

	$mail = new PHPMailer;

	//$mail->SMTPDebug = 3;                               // Enable verbose debug output

	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = $host;  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = $email;                 // SMTP username
	$mail->Password = $password;                           // SMTP password
	$mail->SMTPSecure = 'none';                            // Enable encryption, `ssl` also accepted
	$mail->Port = 25;                                    // TCP port to connect to

	$mail->setFrom( $email, 'Mblo.co Cek Mutasi' );

	$mail->isHTML( true );                                  // Set email format to HTML

	$mail->Subject = 'Ada Mutasi Di Bank: '.$hasil['bank'];
	$mail->Body    =  "------<br/>Dari Bank: ".$hasil['bank']."<br/>Jumlah: ".$hasil['jumlah']."<br/>Tanggal: ".$hasil['tanggal']."<br/>Detail: ".$hasil['detail']."<br/>------<br/><br/>";

	if ( !$mail->send() ) {
		echo 'Pesan Tidak Dapat Dikirim.';
		echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
		echo 'Pesan Telah Dikirimkan<br/>';
	}
}