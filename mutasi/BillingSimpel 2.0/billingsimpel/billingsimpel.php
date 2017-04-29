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

include 'billingsimpel-admin/app/settings/config.php';
include 'billingsimpel-admin/app/function.php';

if ( isset( $_GET['showCategory'] ) ) {
	$n = mysqli_query( $conn, "SELECT * FROM category" );
	$w = array();

	while ( $row = mysqli_fetch_object( $n ) ) {
		$w[] = array( 'id'=>$row->id, 'name'=>$row->name );
	}

	die( json_encode( $w ) );
} elseif ( isset( $_GET['showProducts'] ) ) {
	if ( empty( $_GET['showProducts'] ) ) {
		die();
	}
	$catid = $_GET['showProducts'];
	$n = mysqli_query( $conn, "SELECT * FROM products WHERE catid='$catid'" );
	$w = array();

	while ( $row = mysqli_fetch_object( $n ) ) {
		$w[] = array( 'id'=>$row->id, 'name'=>$row->name );
	}

	die( json_encode( $w ) );
}

if ( !isset( $_POST ) ) {
	die();
}

if ( !isset( $_POST['pid'] ) ) {
	die();
}

if ( !is_numeric( $_POST['pid'] ) ) {
	die();
}

$w = array();

foreach ( $_POST as $key=>$val ) {
	if ( $key=='pid' ) {
		continue;
	}
	if ( strpos( $key, '-opt-' ) !== false ) {
		$key = str_replace( '-opt-', '', $key );
		$w[$key] = mysqli_real_escape_string( $conn, strip_tags($val) );
		continue;
	}
	if ( empty( $val ) ) {
		if($urlError): header('Location: '.$urlFormKosong); endif;
		die( 'Jangan kosongkan form' );
	}
	$w[$key] = mysqli_real_escape_string( $conn, strip_tags($val) );
}

$pid = mysqli_real_escape_string( $conn, $_POST['pid'] );

$n = mysqli_num_rows( mysqli_query( $conn, "SELECT id FROM products WHERE id='$pid'" ) );
if ( $n<1 ) {
	if($urlError): header('Location: '.$urlError.'?message=Produk%20Tidak%20Ada%20Dalam%20Database'); endif;
	die( 'Produk tidak ada dalam database.' );
}
$n = mysqli_fetch_array( mysqli_query( $conn, "SELECT * FROM products WHERE id='$pid'" ) );
$price = $n['price'] + $conf['start_from'];

while ( true ) {
	$price++;
	$n = mysqli_num_rows( mysqli_query( $conn, "SELECT * FROM `order` WHERE total='$price' AND status=1 AND DATE(datetime)=CURDATE()" ) );
	if ( $n>=1 ) {
		continue;
	} else {
		break;
	}
}

$w = json_encode( $w );

$datetime = date( 'Y-m-d H:i:s' );
$q = mysqli_query( $conn, "INSERT INTO `order` VALUES(DEFAULT, '$pid', '0', '$price', '1', '$datetime', '$w')" );
if ( !$q ) {
	if($urlError): header('Location: '.$urlError.'?message=Error%20Saat%20Mensubmit%20Form'); endif;
	die( 'Error saat mensubmit form' );
} else {
	$id = mysqli_insert_id( $conn );
	$no = $id + 1220000;
	$q = mysqli_query( $conn, "UPDATE `order` SET trxno='$no' WHERE id='$id'" );
	header( 'Location: cek-transaksi.php?trx='.$no );
	die();
}
