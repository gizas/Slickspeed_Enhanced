<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" debug="true">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>	
    <link rel="stylesheet" href="style.css" type="text/css" media="screen">		
	<style>
	    a:visited {color:red}
	</style>
</head>

<body>
<ul>
<?php

$phpfiles = glob("results*.html");

foreach($phpfiles as $phpfile)
{
echo "<li><a href=$phpfile>".basename($phpfile)."</a>";
}
?>
</ul>
</body>
</html>