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
 * Maksimal per mutasi yang bisa dibaca adalah Rp.2.147.483.647 ( Integer Maksimum )
 */

$hasilCek = cekMutasi( 'all' );
//$hasilCek = cekMutasi('BCA');

//echo '<pre>'.print_r( $hasilCek, 1 ).'</pre>'; // Menampilkan hasil mutasi berbentuk array langsung


foreach ( $hasilCek as $key => $val ) {
	if ( $val['status']=='error' ) {
		continue; // Skip Kalau Cek Mutasi Bank Ini Error
	}
	/* Parameter Yang Tersedia Untuk Bagian Ini:
	  $val['results']['bank'] - Nama Bank (BCA / Mandiri / BNI / BRI)
	  $val['results']['balance'] - Sisa Saldo Di Bank Anda
	 */

	foreach ( $val['results']['data'] as $keys => $param ) {
		/* Parameter Yang Tersedia Untuk Bagian Ini:
	 	 $param['description'] - Keterangan Mutasi
	 	 * type - Tipe Mutasi (CR / DB)
	 	 * total - Total / Nilai Mutasi
	 	 * balanceposition - Posisi Saldo // Khusus untuk mandiri parameter ini tidak ada
	 	 * date - Tanggal Mutasi
	 	 * checkdate - Tanggal Cek Mutasi
	 	 * checkdatetime - Tanggal & Waktu Cek Mutasi
	     */
	}
}

include '../otorisasi.php';

?>