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
    $segments = explode('?', $uri, 2);
    $url = $segments[0];
	if (sizeof($segments)>1)
	$mydoc=$segments[1];
	else $mydoc="";
    return $mydoc;
}

$my_url= full_path();
$my_url= full_path();
if (strpos($my_url,'big') !== false) {
    header( 'Location: /slickspeed/slickspeed_big' ) ;
}

else if (strpos($my_url,'med') !== false) {
    header( 'Location: /slickspeed/slickspeed_med' ) ;
}

else if (strpos($my_url,'small') !== false) {
    header( 'Location: /slickspeed/slickspeed_small' ) ;
}

else
{
?>
<div id="container">
<table class="myForm">
<tr>
<td>
<div>Choose size of document for testing:</div>
<div>>Big Size of Dom
</div>
<div><a href="index.php?med">Medium Size of Dom</a>
</div>
<div><a href="index.php?small">Small Size of Dom</a>
</div>
</div></td>
</tr>
</table>

<?php
}
?>
<?php include('../system/index.php');?>
