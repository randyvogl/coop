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
<style>
	body {
	text-align: center;
	}
	   
	#g1, #g2 {
	width:100px; height:80px;
	display: inline-block;
	margin: 1em;
	}
</style>
<script src="javascript/justguage/raphael.2.1.0.min.js"></script>
<script src="javascript/justguage/justgage.1.0.1.min.js"></script>
<script src="resources/js/jquery-1.11.2.js"></script>
<script>
      var g1, g2;
      
      window.onload = function(){
        var g1 = new JustGage({
          id: "g1", 
          value: 0, 
          min: 0,
          max: 120,
	  levelColors : ["#ff0000", "#f9c802","#a9d70b","#f9c802","#ff0000"],
          title: "Outside Temperature",
          label: "Temp (F)"
        });
        
        var g2 = new JustGage({
          id: "g2", 
          value: 0, 
          min: 0,
          max: 120,
	  levelColors : ["#ff0000", "#f9c802","#a9d70b","#f9c802","#ff0000"],
          title: "Inside Temperature",
          label: "Temp (F)"
        });
      
        setInterval(function() {
		$.get('resources/ajax/tempReset.php', function(newValue) { g1.refresh(newValue);});		
		$.get('resources/ajax/tempReset.php', function(newValue) { g2.refresh(newValue);});
        }, 1);
      };
</script>

</head>

<body>
<div id="topbar">
	<div id="title"></div>
</div>
<div id="content">
	<span class="graytitle">Status Information</span>
	<ul class="pageitem">
    		<div id="g1" style="width:400px; height:320px;"></div>
		<div id="g2"></div>
	</ul>
	<span class="graytitle">Features</span>
	<ul class="pageitem">

	</ul>
</div>
<div id="footer">
	<!-- Support iWebKit by sending us traffic; please keep this footer on your page, consider it a thank you for my work :-) -->
	<a class="noeffect" href="http://snippetspace.com"></a></div>
	 <!-- javascript -->
	 <script src="javascript/gpioscript.js"></script>
</body>

</html>
