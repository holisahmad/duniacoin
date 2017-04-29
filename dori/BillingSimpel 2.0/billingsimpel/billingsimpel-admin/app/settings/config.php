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

/* Setting Timezone */

date_default_timezone_set('Asia/Jakarta');

/* App Database Configuration */
$conf['MYSQL_HOST'] = "localhost"; // MySQL Host
$conf['MYSQL_USER'] = "profitne_pro88"; // MySQL Username
$conf['MYSQL_PASSWORD'] = "hartati241078"; // MySQL Password
$conf['MYSQL_DB'] = "profitne_pro88"; // MySQL Database Name 
/* End Database Configuration*/

/* Informasi Rekening Bank */
/* Kosongkan salah satu bank untuk tidak menampilkan informasi rekening bank tersebut di cek transaksi */
$bank['BCA']['rekening'] = '12345678';
$bank['BCA']['nama'] = 'Nama Anda';
$bank['Mandiri']['rekening'] = '12345678';
$bank['Mandiri']['nama'] = 'Nama Anda';
$bank['BNI']['rekening'] = '12345678';
$bank['BNI']['nama'] = 'Nama Anda';
$bank['BRI']['rekening'] = '12345678';
$bank['BRI']['nama'] = 'Nama Anda';
/* End Informasi Rekening Bank */

$transfer_hours = 5; // Maksimal Batas Transfer Setelah Berapa Jam
$urlError = ''; // URL Redirect Jika Ada Error
$urlFormKosong = ''; // URL Redirect Jika Ada Error Form kosong

/* DB Connection */
$conn = @mysqli_connect ($conf['MYSQL_HOST'], $conf['MYSQL_USER'], $conf['MYSQL_PASSWORD'], $conf['MYSQL_DB']);
if(!$conn){
	die( "Sorry! There's an error when proccessing your request.<br/>Error Code: #DBA1A2");
}
?>