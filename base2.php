<?php 
 session_save_path("/home/users/web/b1603/ipw.kingplus/phpsessions");
	session_start(); 
	header("Cache-control: private");

	include "init.php";
 ?>

<html>
	
	<head>
		<title>Tony's Clubhouse</title>
		<LINK href="css/style.css" type="text/css" rel="STYLESHEET"><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>
		<meta name="description" content="Welcome to the official website of Tony's ClubHouse. Every Friday night on 91.7 WLFR, DJ Tony Tón has dazzled the airwaves of South Jersey with the Awesome sounds and ultimate mixes for the true devoted pioneers of House. Thanks to technology, that experience has now been extended world-wide across the internet. The ClubHouse brings a collage of hard-core sounds and thrives on tribal rhythms, raw trax, hard-core vocals, latin house, deep house, gospel house, classic house, and sheer underground sounds. Music containing that strong “thump” in the Bass...... fierce “pound” in the drum......and strong soul from the chords......no matter the style of vibrant sounds, hard-core beats and vocals are welcomed “open-armed” and included in the “CLUBHOUSE” rotation. Tony's ClubHouse focuses on everything HOUSE the Classics and the New... The Legends as well as new up coming artists. The clubhouse is a slave to the rythm not the recording industry thus 
										DJ Tony Tón makes up his own mind on what to play bringing you a unique experience with every Mix. ">
		<meta name="keywords" content="Music, House, Club, WLFR, WNYU, DJ Tony Ton, Akili, Gospel,Napster,, Deep House"> 
<!-- Include for pop-up calendar -->
      <link rel="stylesheet" type="text/css" media="all" href="css/calendar-system.css"/>
      <script type="text/javascript" src="includes/calendar.js"></script>
      <script type="text/javascript" src="includes/calendar-en.js"></script>
      <script type="text/javascript" src="includes/calendar-setup.js"></script>
      	
	
<body background="recrd.gif" width="850" <?php 
	//Debugging popup
	//echo"onLoad=\"javascript:popupWin('popup.php?o_message=DEBUG OUTPUT: <br>$debug;')\"";?>


<table cellSpacing="0" cellPadding="0" width="95%" align="center" border="0">
			<tr> 
				<!-- CONTENT 460-->
				
    <td width="80%" rowSpan="2" vAlign="top" bgColor="black" style="left-padding=5px;"> 
      <div align="center"> 
        <?php
        	if($page){
				$findme = "HTTP";
				$pos = strpos(strtoupper($page), $findme);
				if ($pos !== false) {
					echo "found it";
				    $page = "main.php"; $detail="default";
				} 
				include_once "$page";
        	}
		?>
      </div>
	</td>
				
		</table>


</body>
