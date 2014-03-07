<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" debug="true">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>	
	<style>
	body {
	font: 11px "Lucida Grande", "Trebuchet MS", Verdana, sans-serif;
	color: #41464D;
	margin: 0;
	padding: 0;
	background: #F3F1F1;
	}
	#container {
	padding: 30px;
	}
	 a:visited {color:red}
	 .box{
    display: none;
    width: 100%;
		}

	a:hover + .box,.box:hover{
    display: block ;
    position: absolute;
	margin-left:100px;
    z-index: 400;
	border:2px solid black;
	width:450px;
	overflow:hidden
	}
	</style>
</head>

<body>
<div id="container">
Tests have been made:
<ul>
<?php

$phpfiles = glob("results*.html");

foreach($phpfiles as $phpfile)
{
echo"<li>";
echo "<a href=$phpfile>".basename($phpfile)."</a><div class='box'><iframe src='".$phpfile."' width = '450px' height = '150px' scrolling='no' frameBorder='0'></iframe></div>";
echo"</li>";

}
?>
</ul>
</div>
</body>
</html>