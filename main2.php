<html>


<base target="_self">
<script language="JavaScript">
<!--

function SymError()
{
  return true;
}

window.onerror = SymError;

//-->
var refreshTime = 30;
var refreshTimeInMs = refreshTime * 1000;

function refreshPage() {
    if ( window.refreshFlag ) {
    if ( refreshFlag && refreshTime > 0 ) {
      setTimeout ( "location.reload()", refreshTimeInMs );
    }
  }
}
</script>
<style fprolloverstyle>A:hover {color: #F2E497; font-weight: bold}
</style>
<script LANGUAGE="JavaScript" SRC="http://www.live365.com/scripts/listen.js"></script>
<meta name="Microsoft Theme" content="clubhouse 010">
</head>

<body bgcolor="#000000" text="#FFFFCC" link="#FF9900" vlink="#999900" alink="#669933" onLoad="refreshPage()">

<!--mstheme--></font><table border="0" width="100%" height="100%" cellspacing="0" cellpadding="0"
  <tr>
    <td height="5%"><!--mstheme--><font face="Arial, Helvetica"><p align="center">
        <?php
    		$WKDay = date("l");
			$CurTime = time();
			If (($WKDay == "Friday" and $CurTime >= strtotime("08:58 PM")) or ($WKDay == "Saturday" and $CurTime <= strtotime("02:00 AM"))){
				 
					echo"<a href=http://wlfr.stockton.edu:8000/listen.pls target=\"_blank\">
  
   					<font size=\"1\" color=\"#F2E497\"><b>
   					<img border=\"0\" src=\"images/on_air.gif\" alt=\"On the Air.  Click now to listen to us live!\"><br>LISTEN TO THE CLUBHOUSE LIVE!</b></font>
   					</a></p><font size=\"1\" color=\"#C9CBB6\">";
			}Elseif ($WKDay == "Monday" and $CurTime >= "07:30 PM" and $CurTime <= strtotime("10:05 PM")){ 
				echo"<a href=http://livevideo.nyu.edu:8080/ramgen/broadcast/wnyu.rm target=\"_blank\">
  
   					<font size=\"1\" color=\"#F2E497\"><b>
   					<img border=\"0\" src=\"images/on_air.gif\" alt=\"Tonys Clubhouse is currently off the air but you can listen to The Candystore Live!\"><br>LISTEN TO THE CANDY STORE LIVE!</b></font>
   					</a></p><font size=\"1\" color=\"#C9CBB6\">";			
			}Else{ 
				echo "<a HREF=\"javascript:LaunchBroadcast(&quot;akiliking&quot;)\">
				<strong><font size=\"1\" color=\"#F2E497\">
				<img border=\"0\" src=\"images/off_air.gif\" alt=\"We are currently off the air.  However you can listen to our live365 broadcast!\"></font></a>
 				</strong>	<font size=\"1\" color=\"#C9CBB6\">";
			}; ?> <br>
    


      <p align="center"> </font></font><!--mstheme--></font></td>
  </tr>

</center>
 <div align="center"> </div>
</body>
</html>
