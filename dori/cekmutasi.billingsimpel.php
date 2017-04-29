<?php
/**
 * DimasPratama.com - Script Cek Mutasi
 * Version 5.2
 * Copyright, 2016 Dimas Pratama.
 *
 * @package Cek Mutasi
 * @link https://dimaspratama.com/
 * @author Widigdo Dimas Pratama (widigdo@dimaspratama.com)
 * @copyright 2016 Widigdo Dimas Pratama | DimasPratama.com
 * Date Created: 01 August 2016
 */

include 'app/lib/dimasEngine.php';
include 'app/function.php';

/* Dibawah ini ada fungsi untuk memulai cek mutasi, anda bisa mengganti 'all' dengan variabel berikut:
 * all - Cek Mutasi Semua Bank / cekMutasi('all')[0];
 * BCA - Cek Mutasi BCA Saja / cekMutasi('BCA');
 * Mandiri - Cek Mutasi Mandiri Saja / cekMutasi('Mandiri');
 * BNI - Cek Mutasi BNI Saja / cekMutasi('BNI');
 * BRI - Cek Mutasi BRI Saja / cekMutasi('BRI');
 */

$hasilCek = cekMutasi( 'all' );

function callBackMutasi($val) {
	// CallBack Setelah Mengupdate Status Pesanan Menjadi Dibayar
	// Isi $val adalah array dari kolom kolom di tabel orders berbentuk Object

	// echo 'Berhasil menerima pembayaran untuk transaksi ' . $val->trxno;
}

echo '<pre>'.print_r( $hasilCek, 1 ).'</pre>'; // Menampilkan hasil mutasi berbentuk array langsung

foreach ( $hasilCek as $key => $val ) {
	if ( $val['status']=='error' ) {
		continue; // Skip Kalau Cek Mutasi Bank Ini Error
	}
	/* Parameter Yang Tersedia Untuk Bagian Ini:
	 * bank - Nama Bank (BCA / Mandiri / BNI / BRI)
	 * balance - Sisa Saldo Di Bank Anda
	 */
	foreach ( $val['results']['data'] as $keys => $param ) {
		/* Parameter Yang Tersedia Untuk Bagian Ini:
	 	 * description - Keterangan Mutasi
	 	 * type - Tipe Mutasi (CR / DB)
	 	 * total - Total / Nilai Mutasi
	 	 * balanceposition - Posisi Saldo // Khusus untuk mandiri parameter ini tidak ada
	 	 * date - Tanggal Mutasi
	 	 * checkdate - Tanggal Cek Mutasi
	 	 * checkdatetime - Tanggal & Waktu Cek Mutasi
	     */

		$bank = $val['results']['bank'];
		$balance = $val['results']['balance'];

		/* Function Bawaan Yang Tersedia
	 	 * sendEmail(email_tujuan) - Kirim via Email Biasa
	 	 * sendEmailSMTP(email_tujuan,  username_smtp, host_smtp, port_smtp, security_smtp=none/tcp/ssl, password_smtp, parameter)) - Kirim via Email SMTP
	     */

		// Berikut adalah contoh script untuk masukkan ke DB
		// Konfigurasi harus sama dengan konfigurasi DB BillingSimpel
		$conf['MYSQL_HOST'] = "localhost";
		$conf['MYSQL_USER'] = "root";
		$conf['MYSQL_PASSWORD'] = "";
		$conf['MYSQL_DB'] = "cekmutasi";
		$transfer_hours = 5; // Harus sama dengan yang di config BillingSimpel

		$conn = @mysqli_connect( $conf['MYSQL_HOST'], $conf['MYSQL_USER'], $conf['MYSQL_PASSWORD'], $conf['MYSQL_DB'] );
		if ( !$conn ) { die( "Maaf Koneksi Ke Database Error." );}

		$description = mysqli_real_escape_string( $conn, $param['description'] );
		$type = $param['type'];
		$balanceposition = $param['balanceposition'];
		$total = $param['total'];
		$date = $param['date'];
		$checkdate = $param['checkdate'];
		$checkdatetime = $param['checkdatetime'];

		$tabel = 'mutasi';

		$n = mysqli_num_rows( mysqli_query( $conn, "SELECT * FROM $tabel WHERE description='$description' AND type='$type' AND total='$total' AND date='$date' AND balanceposition='$balanceposition'" ) );
		echo mysqli_error( $conn );
		if ( $n>=1 ) {
			continue; // Skip Jika Sudah Ada Data Yang Sama Di database
		}

		$q = mysqli_query( $conn, "INSERT INTO $tabel VALUES(DEFAULT, '$bank', '$description', '$type', '$total', '$balanceposition', '$date', '$checkdate', '$checkdatetime')" );

		$q = mysqli_fetch_object(mysqli_query($conn, "SELECT * FROM `orders` WHERE total='$total' AND status=1"));
		while($row = mysqli_fetch_object($q)) {
			if(strtotime(date('Y-m-d H:i:s'))>strtotime($row->datetime."+$transfer_hours hours"): continue; else:
				$s = mysqli_query($conn, "UPDATE orders SET status=2 WHERE id='$q->id'");
				callBackMutasi($q);
				break;
			endif;
		}
		if ( !$q ) {
			//echo 'Error saat memasukkan ke database';
		} else {
			//echo 'Berhasil memasukkan transaksi #'.mysqli_insert_id($conn);
		}
	}
}
