<?php
function goCurlGet($url) {
	
	$ch = curl_init(); 
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; rv:5.0) Gecko/20100101 Firefox/5.0');
	curl_setopt($ch, CURLOPT_COOKIEJAR, "coockie.txt");
	curl_setopt($ch, CURLOPT_COOKIEFILE, "coockie.txt");
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_TIMEOUT, 60); 
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
	
	$out = curl_exec($ch);
	$err = curl_errno($ch); 
	curl_close($ch);	
	return array("data" => $out, "err" => $err);		
}

function goCurlPost($url, $post) {
	
	$ch = curl_init(); 
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
	curl_setopt($ch, CURLOPT_TIMEOUT, 60); 
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; rv:5.0) Gecko/20100101 Firefox/5.0');
	curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
	curl_setopt($ch, CURLOPT_COOKIEJAR, "coockie.txt");
	curl_setopt($ch, CURLOPT_COOKIEFILE, "coockie.txt"); 
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	
	$out = curl_exec($ch);
	$err = curl_errno($ch); 
	curl_close($ch);
		
	return array("data" => $out, "err" => $err);		
}


function get_message_data($message, $awal, $akhir) {
	$a = strlen($awal);
	$message = ' '.$message;
	$trx = strpos($message, $awal); 
	$trxx = strpos($message, $akhir);
	if ($trx !== false && $trxx !== false){ // awal dan akhir harus ada
		$trx += $a ;
		if ($akhir == ""){
			$data = substr($message, $trx);
		} else {
			$trxend = strpos($message, $akhir, $trx);
			$trxlen = $trxend - $trx;
			$data = substr($message, $trx, $trxlen);
		}
	} else { 
		echo $data = 'None'; 
	}
	return $data;
}

function getLogincsrftoken($data) {
	return get_message_data($data, '<meta name="csrf-token" content="', '">');
}

function isLoginState() {
	
	$r = goCurlGet("http://bo.jaserindo.com/");
	
	if (strpos($r[data], '/img/no-profile-img.gif') !== false) {
		//sudah login
		return true;
	} else {
		return false;		
	}
		
	
}


?>