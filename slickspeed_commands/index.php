<?php
function full_path()
{
    $s = &$_SERVER;
    $ssl = (!empty($s['HTTPS']) && $s['HTTPS'] == 'on') ? true:false;
    $sp = strtolower($s['SERVER_PROTOCOL']);
    $protocol = substr($sp, 0, strpos($sp, '/')) . (($ssl) ? 's' : '');
    $port = $s['SERVER_PORT'];
    $port = ((!$ssl && $port=='80') || ($ssl && $port=='443')) ? '' : ':'.$port;
    $host = isset($s['HTTP_X_FORWARDED_HOST']) ? $s['HTTP_X_FORWARDED_HOST'] : isset($s['HTTP_HOST']) ? $s['HTTP_HOST'] : $s['SERVER_NAME'];
    $uri = $protocol . '://' . $host . $port . $s['REQUEST_URI'];
    $segments = explode('/', $uri, 2);
    $url = $segments[0];
	if (sizeof($segments)>1)
	$mydoc=$segments[1];
	else $mydoc="";
    return $mydoc;
}

$my_url= full_path();
if (strpos($my_url,'big') !== false) {
    header( 'Location: /slickspeed_commands/slickspeed_big' ) ;
}

else if (strpos($my_url,'med') !== false) {
    header( 'Location: /slickspeed_commands/slickspeed_med' ) ;
}

else if (strpos($my_url,'small') !== false) {
    header( 'Location: /slickspeed_commands/slickspeed_small' ) ;
}

else
{echo ' <html><head><link rel="stylesheet" href="style.css" type="text/css" media="screen">
</head><body>';
?>
<div id="container">
<?php include('header.html'); ?>
<h3>Please make your choise:</h3>
<ul>
<li><a href="index.php?big">Big Size of Dom</a></li>
<li><a href="index.php?med">Medium Size of Dom</a> </li>
<li><a href="index.php?small">Small Size of Dom</a> </li>
</ul>
</div>
<?php
echo '</body> </html>';
}
?>
