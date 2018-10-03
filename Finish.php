<?php
require ("functions.php");

function loginNow()
{
	$r = goCurlGet("http://bo.jaserindo.com/index.php?r=site%2Flogin");
	$csrftoken = getLogincsrftoken($r['data']);
	
	$post['_csrf'] = $csrftoken;
	$post['LoginForm']['username'] = 'AP0019';
	$post['LoginForm']['password'] = 'JSR149';			
	$post['LoginForm']['rememberMe'] = '1';
	$post['LoginForm']['login-button'] = null;
	
	$post = http_build_query($post);
	
	$r = goCurlPost("http://bo.jaserindo.com/index.php?r=site%2Flogin", $post);
}

session_start();
if (!isset($_SESSION['_isLogin']))
{
	loginNow();
	$_SESSION['_isLogin'] = 1;
}

	$attr = array("TGL_ORDER","NO_SIP","TGL_SIP","NOLHPP","JENIS_ORDER","NAMA_PEMOHON","ALAMAT_PEMOHON","TARIF","DAYA","BIRO_TEKNIK","PEMERIKSA");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Grabbing</title>
</head>
<body>
<form method="POST" action="">
	<table>
		<tr>
			<td>SORT berdasarkan</td>
			<td>:</td>
			<td>
				<select name="sortBy">
					<option value="0">None</option>
					<option value="<?php echo $attr[0] ?>">Tanggal Order</option>
					<option value="<?php echo $attr[1] ?>">No.Sip</option>
					<option value="<?php echo $attr[2] ?>">Tgl. Sip</option>
					<option value="<?php echo $attr[3] ?>">LHPP</option>
					<option value="<?php echo $attr[4] ?>">Jenis Order</option>
					<option value="<?php echo $attr[5] ?>">Nama Pemohon</option>
					<option value="<?php echo $attr[6] ?>">Alamat</option>
					<option value="<?php echo $attr[7] ?>">Tarif</option>
					<option value="<?php echo $attr[8] ?>">Daya</option>
					<option value="<?php echo $attr[9] ?>">Biro Teknik</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>SORT</td>
			<td>:</td>
			<td>
				<select name="sort">
					<option value="ASC">Naik</option>
					<option value="DSC">Turun</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Jumlah Rows yang ingin digrab</td>
			<td>:</td>
			<td>
				<input type="text" name="rows">
			</td>
		</tr>
		<tr>
			<td><strong>Cari Berdasarkan</strong></td>
			<td></td>
			<td>
			</td>
		</tr>
		<tr>
			<td>Tanggal Order</td>
			<td>:</td>
			<td><input type"text" name="qry[<?php echo $attr[0] ?>]">
			</td>
		</tr>
		<tr>
			<td>No.Sip</td>
			<td>:</td>
			<td><input type"text" name="qry[<?php echo $attr[1] ?>]">
			</td>
		</tr>
		<tr>
			<td>Tgl. Sip</td>
			<td>:</td>
			<td><input type"text" name="qry[<?php echo $attr[2] ?>]">
			</td>
		</tr>
		<tr>
			<td>LHPP</td>
			<td>:</td>
			<td><input type"text" name="qry[<?php echo $attr[3] ?>]">
			</td>
		</tr>
		<tr>
			<td>Jenis Order</td>
			<td>:</td>
			<td><input type"text" name="qry[<?php echo $attr[4] ?>]">
			</td>
		</tr>
		<tr>
			<td>Nama Pemohon</td>
			<td>:</td>
			<td><input type"text" name="qry[<?php echo $attr[5] ?>]">
			</td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td>:</td>
			<td><input type"text" name="qry[<?php echo $attr[6] ?>]">
			</td>
		</tr>
		<tr>
			<td>Tarif</td>
			<td>:</td>
			<td><input type"text" name="qry[<?php echo $attr[7] ?>]">
			</td>
		</tr>
		<tr>
			<td>Daya</td>
			<td>:</td>
			<td><input type"text" name="qry[<?php echo $attr[8] ?>]">
			</td>
		</tr>
		<tr>
			<td>Biro Teknik</td>
			<td>:</td>
			<td><input type"text" name="qry[<?php echo $attr[9] ?>]">
			</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td><input type="submit" value="Cari!">
			</td>
		</tr>
	</table>
</form>

<?php if(count($_POST)>1)
{
	echo '<pre>';
	print_r($_POST);
	echo "</pre>";

	$cond = '';
	foreach ($attr as $key => $value) 
	{
		$cond .= "&OrderSearch[$value]=".$_POST['qry'][$value];
	}

	if ($_POST['sortBy']!='0')
	{
		$cond .= '&sort=';
		if($_POST['sort']=='DSC')
			$cond .= '-';
		$cond .= $_POST['sortBy'];
	}

//http://bo.jaserindo.com/index.php?r=order%2Ffinish&OrderSearch[TGL_ORDER]=1&OrderSearch[NO_SIP]=1&OrderSearch[TGL_SIP]=1&OrderSearch[NOLHPP]=1&OrderSearch[JENIS_ORDER]=&OrderSearch[NAMA_PEMOHON]=1&OrderSearch[ALAMAT_PEMOHON]=1&OrderSearch[TARIF]=&OrderSearch[DAYA]=1&OrderSearch[BIRO_TEKNIK]=1&r=order%2Ffinish&page=2&per-page=50&sort=TGL_ORDER
//bo.jaserindo.com/index.php?OrderSearch%5BTGL_ORDER%5D=1&OrderSearch%5BNO_SIP%5D=1&OrderSearch%5BTGL_SIP%5D=1&OrderSearch%5BNOLHPP%5D=1&OrderSearch%5BJENIS_ORDER%5D=&OrderSearch%5BNAMA_PEMOHON%5D=1&OrderSearch%5BALAMAT_PEMOHON%5D=1&OrderSearch%5BTARIF%5D=&OrderSearch%5BDAYA%5D=1&OrderSearch%5BBIRO_TEKNIK%5D=1&r=order%2Ffinish&page=2&per-page=50&sort=TGL_ORDER
	$r = goCurlGet('http://bo.jaserindo.com/index.php?r=order%2Ffinish');
	

	$konten = get_message_data($r['data'], '<tbody>', '</tbody>');
		
	// mengambil total data
	$t = ($_POST['rows']=='')?get_message_data($r['data'], 'dari <b>', '</b>'):$_POST['rows'];
	
	//lakukan loop lanjutan sesuai karakter per page data yang ditampilkan, untuk page ini adalah 50
	$pr = ceil($t/50);
	for($i=0; $i<$pr; $i++) {// loop dimuali setelah page pertama
		ob_end_flush();
		$r = goCurlGet('http://bo.jaserindo.com/index.php?r=order%2Ffinish&page='.($i+1).'&per-page=50'.$cond);
		$konten = get_message_data($r['data'], '<tbody>', '</tbody>');
		// print_r($konten);
		echo "<table border='1'>".$konten."</table>";
		echo "<br/><br/>Contd...<br/><br/>";
		ob_start();
	}
}
?>
</body>
</html>