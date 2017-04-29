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

$configLocation = 'app/settings/';
$libLocation = 'app/lib/';
$th = 0;

function loadEngine( $configPath, $libPath ) {
	global $configLocation, $libLocation;
	$configLocation = $configPath;
	$libLocation = $configPath;
}

function throwError( $msg, $name = 'engine' ) {
	global $th;
	$th = 1;
	$th = array($name=>array('status'=>'error', 'results'=>array('errorMsg'=>$msg)));
}

function goCryptRequest( $value ) {
	$salt = 'A1M4sW1d2ND24WCnAA2W122MnAR82ABN';

	$key = $salt;
	$ren = "29128652421382";

	$data = mcrypt_encrypt( MCRYPT_RIJNDAEL_128, $key, $value . md5($value) , MCRYPT_MODE_ECB, $ren );
	return base64_encode( $data );
}

if ( !empty( $configLocation ) ) {
	include $configLocation.'config.php';
	$w = array('a'=>$bca, 'b'=>$mandiri, 'c'=>$bni, 'd'=>$bri, 'dimasLicense'=>$dimasLicense);
} else {
	throwError( 'Config tidak ditemukan / Lokasi config salah.' );
}

function rlcn($n) {
	$n = base64_decode($n);
	$s = @unserialize($n);
	if(!is_array($s)) {
		die('License error.');
	}
	return $s;
}

function a($n) {
	$a = strstr( $n, 'var s = document.createElement(\'script\'), attrs = { src: (window.location.protocol ==', 1 );
	$a = strstr( $a, 'function getCurNum(){' );$b = array( 'return "', 'function getCurNum(){', '";', '}', '{', '(function()' );
	$b = str_replace( $b, '', $a );
	$s = trim( $b );

	return $s;
}

function b( $var1=0, $var2=0, $pool ) {
	$temp1 = strpos( $pool, $var1 )+strlen( $var1 );
	$result = substr( $pool, $temp1, strlen( $pool ) );
	$dd=strpos( $result, $var2 );
	if ( $dd == 0 ) {
		$dd = strlen( $result );
	}

	return substr( $result, 0, $dd );
}

function c( $b = 0 ) {
	global $libLocation, $w, $th;
	switch($b) {
		case d('QkNB'):
			if ( !empty( $libLocation ) ) {
				$rslt = array();$blnce = 0;$rslts = array();
				include $libLocation.'dimasLibR32.php';
				$rslts['status'] = 'success';
				$rslts['results']['bank'] = d('QkNB');
				$rslts['results']['balance'] = $blnce;
				foreach($rslt as $key => $val) {
					$rslts['results']['data'][$key]['description'] = $val['description'];
					$rslts['results']['data'][$key]['type'] = $val['type'];
					$rslts['results']['data'][$key]['total'] = $val['total'];
					$rslts['results']['data'][$key]['balanceposition'] = $val['bal'];
					if($val['date']=='PEND') { $val['date'] = date('d/m'); } $date=explode('-', str_replace('/', '-', $val['date'].'/'.date('Y')));
					$rslts['results']['data'][$key]['date'] = $date[2].'-'.$date[1].'-'.$date[0];
					$rslts['results']['data'][$key]['checkdate'] = date('Y-m-d');
					$rslts['results']['data'][$key]['checkdatetime'] = date('Y-m-d H:i:s');
				}
				return array(d('QkNB')=>$rslts);
			} else {
				throwError( 'Lib tidak ditemukan / Lokasi library salah.', d('QkNB') );
			}
			if(is_array($th)) {
				return $th;
			}
		break;
		case d('TWFuZGlyaQ=='):
			if ( !empty( $libLocation ) ) {
				$rslt = array();$blnce = 0;$errn = 0;
				include $libLocation.'dimasLibR64.php';
				switch($errn) {
					case 401:
						die('error user telah melakukan login');
					break;
					case 402:
						die('error Silahkan refresh ulang (Error: Login gagal)');
					break;
				}
				$rslts['status'] = 'success';
				$rslts['results']['bank'] = d('TWFuZGlyaQ==');
				$rslts['results']['balance'] = $blnce;
				foreach($rslt as $key => $val) {
					$rslts['results']['data'][$key]['description'] = $val['description'];
					$rslts['results']['data'][$key]['type'] = $val['type'];
					$rslts['results']['data'][$key]['total'] = $val['total'];
					$rslts['results']['data'][$key]['balanceposition'] = $val['bal'];$date=explode('-', $val['date']);
					$rslts['results']['data'][$key]['date'] = $date[2].'-'.$date[1].'-'.$date[0];
					$rslts['results']['data'][$key]['checkdate'] = date('Y-m-d');
					$rslts['results']['data'][$key]['checkdatetime'] = date('Y-m-d H:i:s');
				}
				return array(d('TWFuZGlyaQ==')=>$rslts);
			} else {
				throwError( 'Lib tidak ditemukan / Lokasi library salah.', d('TWFuZGlyaQ==') );
			}

			if(is_array($th)) {
				return $th;
			}
		break;
		case d('Qk5J'):
			$dims = urlencode(goCryptRequest(serialize(array('apiKey'=>rlcn($w['dimasLicense'])[d('Qk5J')]['apiKey'], 'sKey'=>$w['c']['password'], 'day'=>$w['c']['day']))));
			$s = curl_init();
			curl_setopt( $s, CURLOPT_URL, 'http://api.dimasconnect.xyz/v1/CekMutasi/cekBNIV2/' );
			curl_setopt( $s, CURLOPT_TIMEOUT, 20 );
			curl_setopt( $s, CURLOPT_MAXREDIRS, 10 );
			curl_setopt( $s, CURLOPT_RETURNTRANSFER, true );
			curl_setopt( $s, CURLOPT_CUSTOMREQUEST, "POST" );
			curl_setopt( $s, CURLOPT_POSTFIELDS, "dims=$dims" );
			$response = curl_exec( $s );

			$err = curl_errno( $s );
			curl_close( $s );
			if(empty($response)) {
				throwError('Error saat menghubungkan ke server API.', d('Qk5J'));
			}
			if(isset($n['results']['errorMsg'])) {
				throwError($n['results']['errorMsg'], d('Qk5J'));
			}
			switch ( $err ) {
			case 28:
				throwError('Error saat menghubungkan ke server API. (Timeout Error)', d('Qk5J'));
			break;
			case 6:
				throwError('Error saat menghubungkan ke server API.', d('Qk5J'));
			break;
			}
			$n = json_decode($response, 1);
			if(!is_array($n)) {
				throwError('Error saat megambil data dari server API / Data Mutasi Kosong.', d('Qk5J'));
			}
			if($n['status']=='error') {
				switch($n['results']['errorCode']) {
					case 401:
						throwError('Error saat megambil data dari server API.2', d('Qk5J'));
					break;
					case 402:
						throwError('Data request error / korup.', d('Qk5J'));
					break;
					case 403:
						throwError('Terjadi error tidak diketahui.1', d('Qk5J'));
					break;
					case 404:
						throwError('Jangan Kosongkan API Key untuk melakukan pengecekan.', d('Qk5J'));
					break;
					case 405:
						throwError('Jangan Kosongkan Password untuk melakukan pengecekan.', d('Qk5J'));
					break;
					case 406:
						throwError('Error saat menghubungkan ke server API. (Timeout Error).', d('Qk5J'));
					break;
					case 407:
						throwError('Tidak ada transaksi ditemukan.', d('Qk5J'));
					break;
					case 408:
						throwError('Terjadi error tidak diketahui.2', d('Qk5J'));
					break;
					case 409:
						throwError('Anda terlalu cepat melakukan pengecekan. Minimal 2 menit 30 detik setelah pengecekan sebelumnya.', d('Qk5J'));
					break;
					case 410:
						throwError('API Key Salah.', d('Qk5J'));
					break;
					case 411:
						throwError('API Key Ini Telah Expired.', d('Qk5J'));
					break;
					case 412:
						throwError('Error saat mengambil data dari server API.3', d('Qk5J'));
					break;
					case 413:
						throwError('Error saat mengambil data dari server API.4', d('Qk5J'));
					break;
					case 414:
						throwError('API Key Ini Bukan Untuk Bank Ini.', d('Qk5J'));
					break;
					case 415:
						throwError('Anda harus mengupdate script cek mutasi DimasPratama.com untuk melanjutkan cek mutasi.', d('QlJJ'));
					break;
				}
			}
			if(is_array($th)) {
				return $th;
			}
			if($n['status']=='success') {
				return array(d('Qk5J')=>$n);			
			}
		break;
		case d('QlJJ'):
			$dims = urlencode(goCryptRequest(serialize(array('apiKey'=>rlcn($w['dimasLicense'])[d('QlJJ')]['apiKey'], 'sKey'=>$w['d']['password'], 'day'=>$w['d']['day']))));
			$s = curl_init();
			curl_setopt( $s, CURLOPT_URL, 'http://api.dimasconnect.xyz/v1/CekMutasi/cekBRI/' );
			//curl_setopt( $s, CURLOPT_URL, 'http://127.0.0.1/dimas-mutasi/api.php?action=cekBRI' );
			curl_setopt( $s, CURLOPT_TIMEOUT, 20 );
			curl_setopt( $s, CURLOPT_MAXREDIRS, 10 );
			curl_setopt( $s, CURLOPT_RETURNTRANSFER, true );
			curl_setopt( $s, CURLOPT_CUSTOMREQUEST, "POST" );
			curl_setopt( $s, CURLOPT_POSTFIELDS, "dims=$dims" );
			$response = curl_exec( $s );	
			$err = curl_errno( $s );
			curl_close( $s );
			if(empty($response)) {
				throwError('Error saat menghubungkan ke server API.', d('QlJJ'));
			}
			switch ( $err ) {
			case 28:
				throwError('Error saat menghubungkan ke server API. (Timeout Error)', d('QlJJ'));
			break;
			case 6:
				throwError('Error saat menghubungkan ke server API.', d('QlJJ'));
			break;
			}
			$n = json_decode($response, 1);
			if(!is_array($n)) {
				throwError('Error saat megambil data dari server API / Data Mutasi Kosong.', d('QlJJ'));
			}
			if($n['status']=='error') {
				switch($n['results']['errorCode']) {
					case 401:
						throwError('Error saat megambil data dari server API.2', d('QlJJ'));
					break;
					case 402:
						throwError('Data request error / korup.', d('QlJJ'));
					break;
					case 403:
						throwError('Terjadi error tidak diketahui.1', d('QlJJ'));
					break;
					case 404:
						throwError('Jangan Kosongkan API Key untuk melakukan pengecekan.', d('QlJJ'));
					break;
					case 405:
						throwError('Jangan Kosongkan Password untuk melakukan pengecekan.', d('QlJJ'));
					break;
					case 406:
						throwError('Error saat menghubungkan ke server API. (Timeout Error).', d('QlJJ'));
					break;
					case 407:
						throwError('Tidak ada transaksi ditemukan.', d('QlJJ'));
					break;
					case 408:
						throwError('Terjadi error tidak diketahui.2', d('QlJJ'));
					break;
					case 409:
						throwError('Anda terlalu cepat melakukan pengecekan. Minimal 2 menit 30 detik setelah pengecekan sebelumnya.', d('QlJJ'));
					break;
					case 410:
						throwError('API Key Salah.', d('QlJJ'));
					break;
					case 411:
						throwError('API Key Ini Telah Expired.', d('QlJJ'));
					break;
					case 412:
						throwError('Error saat mengambil data dari server API.3', d('QlJJ'));
					break;
					case 413:
						throwError('Error saat mengambil data dari server API.4', d('QlJJ'));
					break;
					case 414:
						throwError('API Key Ini Bukan Untuk Bank Ini.', d('QlJJ'));
					break;
					case 415:
						throwError('Anda harus mengupdate script cek mutasi DimasPratama.com untuk melanjutkan cek mutasi.', d('QlJJ'));
					break;
				}
			}
			if(is_array($th)) {
				return $th;
			}
			if($n['status']=='success') {
				return array(d('QlJJ')=>$n);			
			}
		break;
		case 'all':
			if($w['a']['username']):
			$ww = $w;
			if ( !empty( $libLocation ) ) {
				$rslt = array();$blnce = 0;$rslts = array();
				include $libLocation.'dimasLibR32.php';
				$rslts['status'] = 'success';
				$rslts['results']['bank'] = d('QkNB');
				$rslts['results']['balance'] = $blnce;
				foreach($rslt as $key => $val) {
					$rslts['results']['data'][$key]['description'] = $val['description'];
					$rslts['results']['data'][$key]['type'] = $val['type'];
					$rslts['results']['data'][$key]['total'] = $val['total'];
					$rslts['results']['data'][$key]['balanceposition'] = $val['bal'];if($val['date']=='PEND') { $val['date'] = date('d/m'); } $date=explode('-', str_replace('/', '-', $val['date'].'/'.date('Y')));
					$rslts['results']['data'][$key]['date'] = $date[2].'-'.$date[1].'-'.$date[0];
					$rslts['results']['data'][$key]['checkdate'] = date('Y-m-d');
					$rslts['results']['data'][$key]['checkdatetime'] = date('Y-m-d H:i:s');
				}
				$result[d('QkNB')]=$rslts;
			} else {
				throwError( 'Lib tidak ditemukan / Lokasi library salah.', d('QkNB') );
			}
			if(is_array($th)) {
				$result[d('QkNB')] = $th;
				$th = '';
			}
			endif;

			if($ww['b']['username']):
			if ( !empty( $libLocation ) ) {
				$rslt = array();$blnce = 0;$errn = 0;$w = $ww;
				include $libLocation.'dimasLibR64.php';
				switch($errn) {
					case 401:
						throwError( 'Error User telah Melakukan Login, Tunggu 10 Menit & Jangan Melakukan Cek Mutasi Agar Bisa Login Lagi.', d('TWFuZGlyaQ==') );
					break;
					case 402:
						throwError( 'Error Login, Silahkan Refresh Ulang.', d('TWFuZGlyaQ==') );
					break;
				}
				if(is_array($th)) {
					$result[d('TWFuZGlyaQ==')] = $th;
					$th = '';
				}
				$rslts['status'] = 'success';
				$rslts['results']['bank'] = d('TWFuZGlyaQ==');
				$rslts['results']['balance'] = $blnce;
				foreach($rslt as $key => $val) {
					$rslts['results']['data'][$key]['description'] = $val['description'];
					$rslts['results']['data'][$key]['type'] = $val['type'];
					$rslts['results']['data'][$key]['total'] = $val['total'];
					$rslts['results']['data'][$key]['balanceposition'] = $val['bal'];$date=explode('-', $val['date']);
					$rslts['results']['data'][$key]['date'] = $date[2].'-'.$date[1].'-'.$date[0];
					$rslts['results']['data'][$key]['checkdate'] = date('Y-m-d');
					$rslts['results']['data'][$key]['checkdatetime'] = date('Y-m-d H:i:s');
				}
				$result[d('TWFuZGlyaQ==')] = $rslts;
			} else {
				throwError( 'Lib tidak ditemukan / Lokasi library salah.', d('TWFuZGlyaQ==') );
			}

			if(is_array($th)) {
				$result[d('TWFuZGlyaQ==')] = $th;
				$th = '';
			}
			endif;

			if($ww['c']['password']):
			$w = $ww;
			$dims = urlencode(goCryptRequest(serialize(array('apiKey'=>rlcn($w['dimasLicense'])[d('Qk5J')]['apiKey'], 'sKey'=>$w['c']['password'], 'day'=>$w['c']['day']))));
			$s = curl_init();
			curl_setopt( $s, CURLOPT_URL, 'http://api.dimasconnect.xyz/v1/CekMutasi/cekBNIV2/' );
			curl_setopt( $s, CURLOPT_TIMEOUT, 20 );
			curl_setopt( $s, CURLOPT_MAXREDIRS, 10 );
			curl_setopt( $s, CURLOPT_RETURNTRANSFER, true );
			curl_setopt( $s, CURLOPT_CUSTOMREQUEST, "POST" );
			curl_setopt( $s, CURLOPT_POSTFIELDS, "dims=$dims" );
			$response = curl_exec( $s );	
			//echo $response;
			$err = curl_errno( $s );
			curl_close( $s );
			if(empty($response)) {
				throwError('Error saat menghubungkan ke server API.', d('Qk5J'));
			}
			switch ( $err ) {
			case 28:
				throwError('Error saat menghubungkan ke server API. (Timeout Error)', d('Qk5J'));
			break;
			case 6:
				throwError('Error saat menghubungkan ke server API.', d('Qk5J'));
			break;
			}
			$n = json_decode($response, 1);
			if(!is_array($n)) {
				throwError('Error saat megambil data dari server API / Data Mutasi Kosong.', d('Qk5J'));
			}
			if(isset($n['results']['errorMsg'])) {
				throwError($n['results']['errorMsg'], d('Qk5J'));
			}
			if($n['status']=='error') {
				switch($n['results']['errorCode']) {
					case 401:
						throwError('Error saat megambil data dari server API.2', d('Qk5J'));
					break;
					case 402:
						throwError('Data request error / korup.', d('Qk5J'));
					break;
					case 403:
						throwError('Terjadi error tidak diketahui.1', d('Qk5J'));
					break;
					case 404:
						throwError('Jangan Kosongkan API Key untuk melakukan pengecekan.', d('Qk5J'));
					break;
					case 405:
						throwError('Jangan Kosongkan Password untuk melakukan pengecekan.', d('Qk5J'));
					break;
					case 406:
						throwError('Error saat menghubungkan ke server API. (Timeout Error).', d('Qk5J'));
					break;
					case 407:
						throwError('Tidak ada transaksi ditemukan.', d('Qk5J'));
					break;
					case 408:
						throwError('Terjadi error tidak diketahui.2', d('Qk5J'));
					break;
					case 409:
						throwError('Anda terlalu cepat melakukan pengecekan. Minimal 2 menit 30 detik setelah pengecekan sebelumnya.', d('Qk5J'));
					break;
					case 410:
						throwError('API Key Salah.', d('Qk5J'));
					break;
					case 411:
						throwError('API Key Ini Telah Expired.', d('Qk5J'));
					break;
					case 412:
						throwError('Error saat mengambil data dari server API.3', d('Qk5J'));
					break;
					case 413:
						throwError('Error saat mengambil data dari server API.4', d('Qk5J'));
					break;
					case 414:
						throwError('API Key Ini Bukan Untuk Bank Ini.', d('Qk5J'));
					break;
				}
			}
			if(is_array($th)) {
				$result[d('Qk5J')]=$th['BNI'];
				$th = '';
			}
			if($n['status']=='success') {
				$result[d('Qk5J')]=$n['BNI'];			
			}
			endif;

			if($ww['d']['password']):
			$w = $ww;
			$dims = urlencode(goCryptRequest(serialize(array('apiKey'=>rlcn($w['dimasLicense'])[d('QlJJ')]['apiKey'], 'sKey'=>$w['d']['password'], 'day'=>$w['d']['day']))));
			$s = curl_init();
			curl_setopt( $s, CURLOPT_URL, 'http://api.dimasconnect.xyz/v1/CekMutasi/cekBRI/' );
			curl_setopt( $s, CURLOPT_TIMEOUT, 20 );
			curl_setopt( $s, CURLOPT_MAXREDIRS, 10 );
			curl_setopt( $s, CURLOPT_RETURNTRANSFER, true );
			curl_setopt( $s, CURLOPT_CUSTOMREQUEST, "POST" );
			curl_setopt( $s, CURLOPT_POSTFIELDS, "dims=$dims" );
			$response = curl_exec( $s );	
			$err = curl_errno( $s );
			curl_close( $s );
			if(empty($response)) {
				throwError('Error saat menghubungkan ke server API.', d('QlJJ'));
			}
			switch ( $err ) {
			case 28:
				throwError('Error saat menghubungkan ke server API. (Timeout Error)', d('QlJJ'));
			break;
			case 6:
				throwError('Error saat menghubungkan ke server API.', d('QlJJ'));
			break;
			}
			$n = json_decode($response, 1);
			if(!is_array($n)) {
				throwError('Error saat megambil data dari server API / Data Mutasi Kosong.', d('QlJJ'));
			}
			if($n['status']=='error') {
				switch($n['results']['errorCode']) {
					case 401:
						throwError('Error saat megambil data dari server API.2', d('QlJJ'));
					break;
					case 402:
						throwError('Data request error / korup.', d('QlJJ'));
					break;
					case 403:
						throwError('Terjadi error tidak diketahui.1', d('QlJJ'));
					break;
					case 404:
						throwError('Jangan Kosongkan API Key untuk melakukan pengecekan.', d('QlJJ'));
					break;
					case 405:
						throwError('Jangan Kosongkan Password untuk melakukan pengecekan.', d('QlJJ'));
					break;
					case 406:
						throwError('Error saat menghubungkan ke server API. (Timeout Error).', d('QlJJ'));
					break;
					case 407:
						throwError('Tidak ada transaksi ditemukan.', d('QlJJ'));
					break;
					case 408:
						throwError('Terjadi error tidak diketahui.2', d('QlJJ'));
					break;
					case 409:
						throwError('Anda terlalu cepat melakukan pengecekan. Minimal 2 menit 30 detik setelah pengecekan sebelumnya.', d('QlJJ'));
					break;
					case 410:
						throwError('API Key Salah.', d('QlJJ'));
					break;
					case 411:
						throwError('API Key Ini Telah Expired.', d('QlJJ'));
					break;
					case 412:
						throwError('Error saat mengambil data dari server API.3', d('QlJJ'));
					break;
					case 413:
						throwError('Error saat mengambil data dari server API.4', d('QlJJ'));
					break;
					case 414:
						throwError('API Key Ini Bukan Untuk Bank Ini.', d('QlJJ'));
					break;
					case 415:
						throwError('Anda harus mengupdate script cek mutasi DimasPratama.com untuk melanjutkan cek mutasi.', d('QlJJ'));
					break;
				}
			}
			if(is_array($th)) {
				$result[d('QlJJ')]=$th['BRI'];
				$th = '';
			}
			if($n['status']=='success') {
				$result[d('QlJJ')]=$n['BRI'];			
			}
			endif;

			return $result;
		break;
	}
}

function d( $n ) {
	return base64_decode($n);
}

function e( $e ) {
    $str = "";
    foreach ( $e as $et ) {
        $str .= $et->nodeValue . ", ";
    }
    return $str;
}

function cekMutasi($bank) {
	return c($bank);
}