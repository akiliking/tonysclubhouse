<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<title>ClubHouse Mobile</title>

	<meta name="author" content="kingplus" />
	<meta name="copyright" content="copyright 2009 kingplus.com" />
	<meta name="description" content="ClubHouse Mobile - Kingplus, Inc." />
	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
	<META NAME =”keywords” CONTENT="house music dj club songs mix dance beats disco">
	<link rel="apple-touch-icon" href="images/logo.png"/>
	<link rel="shortcut icon" href="images/logo.png" >

	<style type="text/css">
		@import url("clubhousemobile.css");
	</style>

	<script type="text/javascript" src="orientation.js"></script>
	<script type="text/javascript">
		window.addEventListener("load", function() { setTimeout(loaded, 100) }, false);
	
		function loaded() {
			document.getElementById("page_wrapper").style.visibility = "visible";
			window.scrollTo(0, 1); // pan to the bottom, hides the location bar
		}


	</script>
	<script type="text/javascript"><!--
	  // XHTML should not attempt to parse these strings, declare them CDATA.
	  /* <![CDATA[ */
	  window.googleAfmcRequest = {
	    client: 'ca-mb-pub-0799542483187963',
	    format: '320x50_mb',
	    output: 'html',
	    slotname: '1328489023',
	  };
	  /* ]]> */
	 //-->
	</script>
	
	

</head>

<body onorientationchange="updateOrientation();" bgcolor="#000000" >

<!--	 Header Band
		<div id="page_wrapper">
		<h1>ClubHouse Mobile</h1>
		</div>

-->
	
		<div align="center">
		  <center>
		
		<div><p align="center"><b><font color="#223E4C" size="5"><b>HOUSE IS A FEELING!</b></font>
			  </p><img src="images/dj-100x128.png" width="100" height="128" border="0" ></img></div>
			  <?php 
			  	//echo "<div id='onair'>";	
				include_once "onair.php";
				//echo "</div>"; 
				?>
		<p/><font color="#E3FFEB">
		<table border="0" width="100%" cellspacing="0" cellpadding="0" height="100%">
		  <tr>
		    <td width="100%" valign="top" align="left" colspan="2">
		      <p align="center"><b><font color="#223E4C" size="5"><b>ClubHouse Featured Music</b></font><font color="#CCD3B6"></p>
		      <h3><p align="center">[ <a href="index.html">Home</a> | <a href="history.html">History of House Music</a> |  <a href="store.html">Merchandise</a> |
		      	<a href="videopage.php">Videos</a> | <a href="featured.html">ClubHouse Featured</a> | <a href="events.php">Events Page</a>]
			  </p></h3>
			  <hr>
			</td>
		  </tr>		  	
  		 <tr>
  		 	<td colspan=2 valign="bottom" align="center"><p><h2>Can't Get Enough House?</h2> <br />
  		 	Check out some of these 24/7 online House Radio stations!</p></td>
  		 </tr>
  		 <tr>
  			<td></td><td valign="top" align="center" cellpadding="25" cellspacing="25"><p><a href="http://server2.myshoutcast.de:9044/listen.pls" alt="Deep and Soulful ssRadio"><h2>Deep & Soulful on Ssradio </h2></a></p></td>
  		 </tr>
  			<td></td><td valign="top" align="center" cellpadding="25" cellspacing="25"><p><a href="http://uk2-pn.mixstream.net:8430/listen.pls" alt="Handz on Radio"><h2>Handz On Radio</h2></a></p></td>
  		 </tr>
  			<td></td><td valign="top" align="center" cellpadding="25" cellspacing="25"><p><a href="http://clubhousemobile.kingplus.com/wtchouseradio.pls" alt="WTC House Radio"><h2>Where's The Culture House Radio</h2></a></p></td>
		  </tr>	
		  </tr>
  			<td></td><td valign="top" align="center" cellpadding="25" cellspacing="25"><p><a href="http://dl-master.mixcache.com:9128/listen.pls" alt="dogglounge"><h2>dogglounge - Streaming Deep House Music 24/7</h2></a></p></td>
		  </tr>	
		  	  
		</table></font>
		  </center>
		</div>


</body>
</html>
