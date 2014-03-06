<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" debug="true">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>	
    <link rel="stylesheet" href="style.css" type="text/css" media="screen">		
</head>

<body>

<?php
if (!empty($br) and !empty($os) and !empty($siskevi) and !empty($results) and !empty($fileName))
{
$br=$_POST['br'];
$os=$_POST['os'];
$siskevi=$_POST['siskevi'];
$agent=$_POST['agent'];
$results=$_POST['results'];
$fileName = "results-". date('Ymd-His').".html";
$f = '<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"/><link rel="stylesheet" href="style.css" type="text/css" media="screen"><script src="hide_show_results.js"></script><script src="http://code.jquery.com/jquery-1.10.2.js"></script></head>';
$f .= '<body><h2>BROWSER: '.$br.'</h2><h2>DEVICE: '.$siskevi.'  OS: '.$os.'</h2><h3>AGENT: '.$agent.'</h3><h3>FILENAME: '.$fileName.'</h3>';
//$f .= '<input type="button" value="Toggle found" onclick="toggleFound()"> <input type="button" value="Toggle detailed times" onclick="toggleDetailTimes()">';
$f .= '<input type="button" value="Toggle found" onclick="toggleFound()">';
$f .= '<table>'.$results.'</table>';
	

$fileHandle = fopen($fileName, 'w') or die("file could not be accessed/created");
fwrite($fileHandle, $f);
fclose($fileHandle);

?>

	<p><b>SUCCESS!</b>Results are saved on server to file: <?php echo $fileName ?></p>
	<p>Back to <a href="index.php">SlickSpeed</a></p>
<?php
}else{?>
<p><b>No data saved!</b>Please check if you left empty fields or you did not run any test <button onclick="javascript:window.history.back()">Go back</button></p>

<?php 
}
?>	
</body>
</html>