<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="yes" name="apple-mobile-web-app-capable" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<link href="pics/Chicken-icon.png" rel="apple-touch-icon" />
<meta content="minimum-scale=1.0, width=device-width, maximum-scale=0.6667, user-scalable=no" name="viewport" />
<link href="css/style.css" rel="stylesheet" media="screen" type="text/css" />
<script src="javascript/functions.js" type="text/javascript"></script>
<title>Automated Chicken Coop</title>
<link href="pics/Chicken-icon.png" rel="apple-touch-startup-image" />
<meta content="chickens, controller, remote access" name="keywords" />
<meta content="Control your chicken coop remotely" name="description" />
</head>

<body>
     <!-- On/Off button's picture -->
	 <?php
	 //this php script generate the first page in function of the gpio's status
	 $status = array (0, 0, 0, 0, 0, 0, 0, 0);
	 for ($i = 0; $i < count($status); $i++) {
		//set the pin's mode to output and read them
		system("gpio mode ".$i." out");
		exec ("gpio read ".$i, $status[$i], $return );
	 }
	?>
<div id="topbar">
	<div id="title">Automated Chicken Coop</div>
</div>
<div id="content">
	<span class="graytitle">Status Information</span>
	<ul class="pageitem">
		<li class="textbox">
		<p>Current Date/Time:</p>
		<p>Outside Temperature:</p>
		<p>Inside Temperature:</p>
		<p>Food Status:</p>
		<p>Water Status:</p>
		<p>Door Status:</p>
		</li>
	</ul>
	<span class="graytitle">Features</span>
	<ul class="pageitem">
		<li class="textbox"><span class="header">Automate Chicken Coop</span><p>
		Welcome to your Automated coop</p>
		</li>
		<li class="select"><select name="d">
			<option value="1">Automatically Turn on/off Lights</option>
			<option value="2">Permanent Override</option>
			<option value="3">Temporary Override</option>
			</select><span class="arrow"></span> </li>
		<li class="checkbox"><span class="name">Turn Light On </span>
		<?php
			if ($status[0][0] == 0 ) {
				echo('<input id="button_0" alt="off" name="remember" type="checkbox" /> </li>');
			}
			if ($status[0][0] == 1 ) {
				echo('<input id="button_0" alt="on" name="remember" type="checkbox" checked/> </li>');
			}
		?>
		<li class="checkbox"><span class="name">Open Door(On) / Close Door (Off)</span>
		<input name="remember" type="checkbox" /> </li>
		<li class="select"><select name="d">
			<option value="1">Automatically Turn on/off Heat Lamps</option>
			<option value="2">Permanent Override</option>
			<option value="3">Temporary Override</option>
			</select><span class="arrow"></span> </li>
		<li class="checkbox"><span class="name">Turn Heat Lamp On </span>
		<?php
			if ($status[1][0] == 0 ) {
				echo('<input id="button_1" alt="off" name="remember" type="checkbox" /> </li>');
			}
			if ($status[1][0] == 1 ) {
				echo('<input id="button_1" alt="on" name="remember" type="checkbox" checked/> </li>');
			}
		?>
		<li class="menu"><a href="">
		<span class="name">Chicken Cam</span><span class="arrow"></span></a></li>
		<li class="menu"><a href="faq.php">
		<span class="name">FAQ's</span><span class="arrow"></span></a></li>
	</ul>
</div>
<div id="footer">
	<!-- Support iWebKit by sending us traffic; please keep this footer on your page, consider it a thank you for my work :-) -->
	<a class="noeffect" href="http://snippetspace.com">iPhone site powered by Automated Pet Products, LLC</a></div>
	 <!-- javascript -->
	 <script src="javascript/gpioscript.js"></script>
</body>

</html>
