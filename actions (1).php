<?php
error_reporting(E_ALL & ~E_NOTICE);
require ("functions.php");

if ($_GET[f] == 'login') {
	
	$r = goCurlGet("http://bo.jaserindo.com/index.php?r=site%2Flogin");
	$csrftoken = getLogincsrftoken($r[data]);
	
	$post[_csrf] = $csrftoken;
	$post[LoginForm][username] = 'AP0019';
	$post[LoginForm][password] = 'JSR149';			
	$post[LoginForm][rememberMe] = '1';
	$post[LoginForm][login-button] = null;
	
	$post = http_build_query($post);
	
	$r = goCurlPost("http://bo.jaserindo.com/index.php?r=site%2Flogin", $post);
		
	header("location: index.php");die;
	
}

if ($_GET[f] == '1') {
	// meriquest http://bo.jaserindo.com/index.php?r=order%2Findex
	
	$r = goCurlGet('http://bo.jaserindo.com/index.php?r=order%2Findex');
	$konten = get_message_data($r[data], '<tbody>', '</tbody>');
		
	// mengambil total data
	$t = get_message_data($r[data], 'dari <b>', '</b>');
	
	//lakukan loop lanjutan sesuai karakter per page data yang ditampilkan, untuk page ini adalah 50
	$pr = ceil($t/50);
	for($i=1; $i<$pr; $i++) {// loop dimuali setelah page pertama
		
		$r = goCurlGet('http://bo.jaserindo.com/index.php?r=order%2Findex&page='.($i+1).'&per-page=50');
		$konten .= get_message_data($r[data], '<tbody>', '</tbody>');
		
	}
	
	echo "<table>".$konten."</table>";die;
	
	
}

if ($_GET[f] == '2') {
	// meriquest http://bo.jaserindo.com/index.php?r=order%2Findex
	
	$r = goCurlGet('http://bo.jaserindo.com/index.php?r=order%2Fdalampelaksanaan');
	$konten = get_message_data($r[data], '<tbody>', '</tbody>');
		
	// mengambil total data
	$t = get_message_data($r[data], 'dari <b>', '</b>');
	
	//lakukan loop lanjutan sesuai karakter per page data yang ditampilkan, untuk page ini adalah 50
	$pr = ceil($t/50);
	for($i=1; $i<$pr; $i++) {// loop dimuali setelah page pertama
		
		$r = goCurlGet('http://bo.jaserindo.com/index.php?r=order%2Fdalampelaksanaan&page='.($i+1).'&per-page=50');
		$konten .= get_message_data($r[data], '<tbody>', '</tbody>');
		
	}
	
	echo "<table>".$konten."</table>";die;
	
	
}

if ($_GET[f] == '3') {
	// meriquest http://bo.jaserindo.com/index.php?r=order%2Findex
	
	$r = goCurlGet('http://bo.jaserindo.com/index.php?r=order%2Fsudahdilaksanakan');
	$konten = get_message_data($r[data], '<tbody>', '</tbody>');
		
	// mengambil total data
	$t = get_message_data($r[data], 'dari <b>', '</b>');
	
	//lakukan loop lanjutan sesuai karakter per page data yang ditampilkan, untuk page ini adalah 50
	$pr = ceil($t/50);
	for($i=1; $i<$pr; $i++) {// loop dimuali setelah page pertama
		
		$r = goCurlGet('http://bo.jaserindo.com/index.php?r=order%2Fsudahdilaksanakan&page='.($i+1).'&per-page=50');
		$konten .= get_message_data($r[data], '<tbody>', '</tbody>');
		
	}
	
	echo "<table>".$konten."</table>";die;
	
	
}


if ($_GET[f] == '4') {
	// meriquest http://bo.jaserindo.com/index.php?r=order%2Findex
	
	$r = goCurlGet('http://bo.jaserindo.com/index.php?r=order%2Ffinish');
	$konten = get_message_data($r[data], '<tbody>', '</tbody>');
		
	// mengambil total data
	$t = get_message_data($r[data], 'dari <b>', '</b>');
	
	//lakukan loop lanjutan sesuai karakter per page data yang ditampilkan, untuk page ini adalah 50
	$pr = ceil($t/50);
	for($i=1; $i<$pr; $i++) {// loop dimuali setelah page pertama
		
		$r = goCurlGet('http://bo.jaserindo.com/index.php?r=order%2Ffinish&page='.($i+1).'&per-page=50');
		$konten .= get_message_data($r[data], '<tbody>', '</tbody>');
		
	}
	
	echo "<table>".$konten."</table>";die;
	
	
}

if ($_GET[f] == '5') {
	// meriquest http://bo.jaserindo.com/index.php?r=tenagateknik%2Findex
	
	$r = goCurlGet('http://bo.jaserindo.com/index.php?r=tenagateknik%2Findex');
	$konten = get_message_data($r[data], '<tbody>', '</tbody>');
		
	// mengambil total data
	$t = get_message_data($r[data], 'dari <b>', '</b>');
	
	//lakukan loop lanjutan sesuai karakter per page data yang ditampilkan, untuk page ini adalah 50
	$pr = ceil($t/50);
	for($i=1; $i<$pr; $i++) {// loop dimuali setelah page pertama
		
		//$r = goCurlGet('http://bo.jaserindo.com/index.php?r=order%2Ffinish&page='.($i+1).'&per-page=50');
		$r = goCurlGet('http://bo.jaserindo.com/index.php?r=tenagateknik%2Findex&page='.($i+1).'&per-page=50');
		
		$konten .= get_message_data($r[data], '<tbody>', '</tbody>');
    }
	
	echo "<table>".$konten."</table>";die;
	    
}		

	if ($_GET[f] == '6') {
	// meriquest http://bo.jaserindo.com/index.php?r=orderpln%2Findex
	
	$r = goCurlGet('http://bo.jaserindo.com/index.php?r=orderpln%2Findex');
	$konten = get_message_data($r[data], '<tbody>', '</tbody>');
		
	// mengambil total data
	$t = get_message_data($r[data], 'dari <b>', '</b>');
	
	//lakukan loop lanjutan sesuai karakter per page data yang ditampilkan, untuk page ini adalah 50
	$pr = ceil($t/50);
	for($i=1; $i<$pr; $i++) {// loop dimuali setelah page pertama
		
		//$r = goCurlGet('http://bo.jaserindo.com/index.php?r=orderpln%2Findex&page='.($i+1).'&per-page=50');
		$r = goCurlGet('http://bo.jaserindo.com/index.php?r=orderpln%2Findex&page='.($i+1).'&per-page=50');
		
		$konten .= get_message_data($r[data], '<tbody>', '</tbody>');
		
	}
	echo "<table>".$konten."</table>";die;
	
}

if ($_GET[f] == '6') {
	// meriquest http://bo.jaserindo.com/index.php?r=orderpln%2Findex
	
	$r = goCurlGet('http://bo.jaserindo/index.php?r=orderpln%2Findex');
	$konten = get_message_data($r[data], '<tbody>', '</tbody>');
		
	// mengambil total data
	$t = get_message_data($r[data], 'dari <b>', '</b>');
	
	//lakukan loop lanjutan sesuai karakter per page data yang ditampilkan, untuk page ini adalah 50
	$pr = ceil($t/50);
	for($i=1; $i<$pr; $i++) {// loop dimuali setelah page pertama
		
		$r = goCurlGet('http://bo.jaserindo.com/index.php?r=orderpln%2Findex&page='.($i+1).'&per-page=50');
		$konten .= get_message_data($r[data], '<tbody>', '</tbody>');
		
	}
	
	echo "<table>".$konten."</table>";die;
	
	
}
?>