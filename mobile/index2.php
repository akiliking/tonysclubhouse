<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<title>Clubhouse Mobile</title>

	<meta name="author" content="kingplus" />
	<meta name="copyright" content="copyright 2009 kingplus.com" />
	<meta name="description" content="Clubhouse" />
	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
	<link rel="apple-touch-icon" href="images/logo.png"/>
	<link rel="shortcut icon" href="images/logo.png" >

	<style type="text/css">
		@import url("music.css");
	</style>

	<script type="text/javascript" src="orientation.js"></script>
	<script type="text/javascript">
		window.addEventListener("load", function() { setTimeout(loaded, 100) }, false);
	
		function loaded() {
			document.getElementById("page_wrapper").style.visibility = "visible";
			window.scrollTo(0, 1); // pan to the bottom, hides the location bar
		}


	</script>

</head>

<body onorientationchange="updateOrientation();" style="width:320px;height:450px;margin-top:0px;margin-left:0px;margin-right:0px;margin-bottom:20px">

	 <div id="page_wrapper">
		<h1>Clubhouse Mobile</h1>


	</div>
<?php

include_once "../../includes/javascript_functions.php";
if ($handle = opendir('/home/users/web/b1603/ipw.kingplus/public_html/clubhouse/mobile')) {
	$counter = 0;
    echo"<div><table border=1 width='100%' height=450 padding='1' cellspacing='1'>";
    while (false !== ($file = readdir($handle))) {
        if (strrpos($file, '.pls') > 0)
		{
			if (($file <> 'index.php') and ($file <> '..')and ($file <> 'music.css')){
				$counter = $counter+1;
				$link = "http://www.kingplus.com/clubhouse/music/live".$file;
				$Listen = "<a HREF =$file  title='Listen to $file'>$file <img src ='../../images/listen-sm-rad-reg.gif' border=0></a>";

				echo "<tr valign='top'><td><h2> $Listen </h2></td></tr>";
			}
		}
    }

echo"</table></div>";
    closedir($handle);
}
?>

</body>
</html>