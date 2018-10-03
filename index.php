<?php
error_reporting(E_ALL & ~E_NOTICE);
require ("functions.php");


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>
<?php if (isLoginState()) { ?>
Anda telah login<br /><br />
1. http://bo.jaserindo.com/index.php?r=order%2Findex -> <a href="actions.php?f=1" target="_blank">OPEN</a><br />
2. http://bo.jaserindo.com/index.php?r=order%2Fdalampelaksanaan <a href="actions.php?f=2" target="_blank">OPEN</a><br />
3. http://bo.jaserindo.com/index.php?r=order%2Fsudahdilaksanakan <a href="actions.php?f=3" target="_blank">OPEN</a><br />
4. http://bo.jaserindo.com/index.php?r=order%2Ffinish AWAS DATA BESAR, proses jadi agak lama <a href="Finish.php" target="_blank">OPEN</a><br />
5. http://118.97.191.107/index.php?r=sertifikat%2Findex AWAS DATA BESAR, proses jadi agak lama <a href="sertifikat.php" target="_blank">OPEN</a><br />
6. http://bo.jaserindo.com/index.php?r=biroteknik%2Findex <a href="actions.php?f=5" target="_blank">OPEN</a><br />
<?php } else { ?>
<a href="actions.php?f=login">Login</a>
<?php } ?>




</body>
</html>