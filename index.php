<?php 
 session_save_path("/home/users/web/b1603/ipw.kingplus/phpsessions");
	session_start(); 
	header("Cache-control: private");

	include "init.php";
 ?>

<html>
	
	<head>
		<title>Tony's Clubhouse - The Awesome sounds of House Music</title>
		<LINK href="css/style.css" type="text/css" rel="STYLESHEET">
		<link rel="shortcut icon" href="http://www.kingplus.com/clubhouse/favicon.ico" >
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<meta name="description" content="Welcome to the official website of Tony's ClubHouse. Every Friday night on 91.7 WLFR, DJ Tony Tón has dazzled the airwaves of South Jersey with the Awesome sounds and ultimate mixes for the true devoted pioneers of House. Thanks to technology, that experience has now been extended world-wide across the internet. The ClubHouse brings a collage of hard-core sounds and thrives on tribal rhythms, raw trax, hard-core vocals, latin house, deep house, gospel house, classic house, and sheer underground sounds. Music containing that strong “thump” in the Bass...... fierce “pound” in the drum......and strong soul from the chords......no matter the style of vibrant sounds, hard-core beats and vocals are welcomed “open-armed” and included in the “CLUBHOUSE” rotation. Tony's ClubHouse focuses on everything HOUSE the Classics and the New... The Legends as well as new up coming artists. The clubhouse is a slave to the rythm not the recording industry thus 
										DJ Tony Tón makes up his own mind on what to play bringing you a unique experience with every Mix. ">
		<meta name="keywords" content="Turn table,ipod,TCS,TCATS, dance, silena murrell, Numark,technics,radio,mp3,Music, House, Club, WLFR, WNYU, DJ Tony Ton, Akili,Tón,kingplus.com,kingplus, Gospel,Napster,djtonyton, Deep House"> 
<!-- Include for pop-up calendar -->
      <link rel="stylesheet" type="text/css" media="all" href="css/calendar-system.css"/>
      <script type="text/javascript" src="includes/calendar.js"></script>
      <script type="text/javascript" src="includes/calendar-en.js"></script>
      <script type="text/javascript" src="includes/calendar-setup.js"></script>
      	
	</head>
<body background="recrd.gif" width="850" <?php 
	//Debugging popup
	//echo"onLoad=\"javascript:popupWin('popup.php?o_message=DEBUG OUTPUT: <br>$debug;')\"";?>
	>
<!--<table cellpadding="0" cellspacing="0" border="0" width="100%">
	<tr>
		<td align="center" valign="top"><br><BR>			
		<img src="images/intro4.gif">
	</tr>
</table>-->
<table cellSpacing="0" cellPadding="0" width="95%" align="center" border="0">
			<tr> 
				<!-- LEFT MENU 850 174-->
				<td vAlign="top" width="174">
					
					<!-- ================== MENU Start ========================= -->
						
      <p>&nbsp;</p>
      <p>&nbsp;</p>
	  
	 <TABLE class="newstable" id="Table3" cellSpacing="0" cellPadding="0" width="100%" border="0">
        <TBODY>

			  <?php 
			  	echo "<div id='onair'>";	
				include_once "onair.php";
				echo "</div>"; 
				?>
        </TBODY>
      </TABLE>
      <p></p>
        <?php
									include "navbar2.php";
		?>

					<!-- =================== Heading End ========================== -->
					<!-- ================== News Start ========================= -->
					<?php
						include "LatestNews.php";
						
					?><!--#include virtual="/cgi-bin/content_feed.pl?feed_id=3012"-->
					<!-- =================== News End ========================== -->
					
				</td>
				<!-- END OF LEFT MENU -->
				<!-- CONTENT 460-->
				
    <td width="80%" rowSpan="2" vAlign="top" bgColor="black" style="left-padding=5px;"> 
      <div align="center"> 
        <?php
        	include_once "$page";
		?>
				
      </div>
				</td>
				
				<!-- RIGHT MENU -->
				
    <td vAlign="top" rowSpan="2"> 
	
      <p>&nbsp;</p>
      <p>&nbsp;</p>
	
      <?php
						 include "userlogin.php";
				?>
					
      <center>
     <?php 
	 		echo date('l, F dS Y');
			include_once 'event_calendar.php';

			// Construct a calendar to show the current month
			$cal = new Calendar;
			
			//echo $cal->getEventsData($day, $month, $year);


			if (!$month)
			{
				echo $cal->getCurrentMonthView();
			}
			else 
			{
				echo $cal->getMonthView($day, $month, $year);
			}
		?><div title="Today's Poll" class="clubhouse_poll" id="clubhouse_poll"><p align="center">
		<?php @include("http://kingplus.ipower.com/vzpoll/poll.php");?></p></div>
		<p>
      				<!-- Begin Ad Block -->
						<script type="text/javascript"><!--
						google_ad_client = "pub-0799542483187963";
						google_ad_width = 250;
						google_ad_height = 250;
						google_ad_format = "250x250_as";
						google_ad_type = "text_image";
						google_ad_channel ="";
						google_color_border = "341473";
						google_color_bg = "C3D9FF";
						google_color_link = "0000FF";
						google_color_text = "FFFFFF";
						google_color_url = "3D81EE";
						//--></script>
						<script type="text/javascript"
						  src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
						</script></p>
	</center>					
						
	  </td>
				<!-- END OF RIGHT MENU --></tr>
		</table>
<table cellspacing="0" cellpadding="0" width="750" align="center" border="0">
    <tr> 
    <td><p></p></td>
  </tr>
  <tr> 
    <td><p><hr></p></td>
  </tr>
</table>

<table cellspacing="0" cellpadding="0" width="750" align="center" border="0">
  <tr> 
    <td> <div class="ad">
<script type="text/javascript"><!--
google_ad_client = "pub-0799542483187963";
google_ad_width = 728;
google_ad_height = 90;
google_ad_format = "728x90_as";
google_ad_type = "image";
google_ad_channel ="";
google_color_border = "000000";
google_color_bg = "000000";
google_color_link = "0000FF";
google_color_text = "FFFFFF";
google_color_url = "008000";
//--></script>
<script type="text/javascript"
  src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
        <br>
      </div>
      <div class="navFooter" align="center"> 
        <div style="COLOR: #a3a37e; PADDING-TOP: 20px" align="center"><a href="http://partners.ipower.com/z/4/CD2886/" target="_blank" class="bottom" title="Web Hosting">Tony's 
          Clubhouse hosted by iPowerweb and </a> <a href="http://www.kingplus.com/" target="_blank" class="bottom" title="Web Design">managed by KINGPLUS.COM</a><br>If you are looking for excellent but inexpensive web hosting 
                <a href="http://partners.ipower.com/z/56/CD2886/">Click Here</a>. </div>
        <div style="FONT-SIZE: 10px; PADDING-TOP: 5px" align="center">Copyright 
          ©2006 All Rights Reserved.</div>
      </div></td>
  </tr>
</table>
<p>&nbsp;</p></body>
