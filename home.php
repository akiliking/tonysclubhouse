<!-- <head><bgsound src="voices.wav" loop="-1" ></head>-->
<body>
<table border="0" width="100%" cellspacing="0" cellpadding="0" height="100%">
  <tr>
    <td width="100%" colspan="3" align="left" valign="top" bgcolor="#000000"> 
      <p align="center"><b><font color="#FFFFFF">Welcome to</font><font color="#FFFFFF" size="5"><br>
        TONY'S CLUBHOUSE</font><font color="#C9CBB6" size="5"><br>
      </font></b><img border="0" src="ton.jpg" width="285" height="100"></p>
          
      <p align="center"><font color="#FFFFFF"><strong>featuring Beat Mixologist<br>
        D.J. Tony T�n the Awesome</strong></font><font color="#FFFFFF"><br>
        </font> 
      <p align="center"><font color="#C9CBB6"><br>
        Welcome to the official website of<strong> Tony's ClubHouse</strong>. 
        Every Friday night on 91.7 <a href="http://loki.stockton.edu/~wlfr" target="_blank" title="91.7FM WLFR Radio (Richard Stockton College in Pomona, New Jersey)"><strong>WLFR</strong></a>, 
        DJ Tony T&oacute;n has dazzled the airwaves of South Jersey with the Awesome 
        sounds and ultimate mixes for the true devoted pioneers of &quot;<strong><a href="http://en.wikipedia.org/wiki/House_music" target="_blank" title="What is House Music?">House</a></strong>&quot;. 
        Thanks to technology, that experience has now been extended world-wide 
        across the internet. The <strong>ClubHouse</strong> brings a collage of 
        hard-core sounds and thrives on tribal rhythms, raw trax, hard-core vocals, 
        latin house, deep house, gospel house, classic house, and sheer underground 
        sounds. Music containing that strong &#8220;thump&#8221; in the Bass...... 
        fierce &#8220;pound&#8221; in the drum......and strong soul from the chords......no 
        matter the style of vibrant sounds, hard-core beats and vocals are welcomed 
        &#8220;open-armed&#8221; and included in the &#8220;CLUBHOUSE&#8221; rotation. 
        Tony's ClubHouse focuses on everything <a href="http://en.wikipedia.org/wiki/House_music" target="_blank" title="What is House Music?">HOUSE</a> 
        the Classics and the New... The Legends as well as new up-coming artists. 
        The clubhouse is a slave to the rythm not the recording industry thus 
        DJ Tony T&oacute;n makes up his own mind on what to play; bringing you 
        a unique experience with every Mix. </font> 
      <p align="center"><font color="#FFFFFF">&#8220;The harder the bang, the 
        louder the noise&#8221;-- An aphorism that deems much truth inside, &#8220;<strong>TONY'S 
      CLUBHOUSE</strong>&#8221;!! </font>      
    </td>
  </tr>		
  <tr>
     <td>
      <p align="center">
      <br>
      <font color="#C9CBB6">
      <marquee behavior="alternate">ADMISSION!!! Free of Charge... as long as
      you work!!!</marquee>
      </font></td>
  </tr><tr><td><br><br><p align="center">
      <?php 
	   $isonair = $_SESSION['onair'];
	  	if( $isonair == false){$autostart = "true";}
		else{$autostart = "false";}
		?>

<div align="center">
<iframe width="660" height="180" src="https://www.mixcloud.com/widget/iframe/?feed=http%3A%2F%2Fwww.mixcloud.com%2Ftonysclubhouse%2Fplaylists%2Ftonys-clubhouse%2F&amp;embed_uuid=0e95a39d-7151-4153-a93c-100ad3d5b327&amp;replace=0&amp;hide_cover=1&amp;embed_type=widget_standard&amp;hide_tracklist=1&amp;autoplay=<?php echo $autostart; ?>" frameborder="0"></iframe><div style="clear: both; height: 3px; width: 652px;"></div><p style="display: block; font-size: 11px; font-family: 'Open Sans', Helvetica, Arial, sans-serif; margin: 0px; padding: 3px 4px; color: rgb(153, 153, 153); width: 652px;"><a href="http://www.mixcloud.com/tonysclubhouse/playlists/tonys-clubhouse/?utm_source=widget&amp;amp;utm_medium=web&amp;amp;utm_campaign=base_links&amp;amp;utm_term=resource_link" target="_blank" style="color:#808080; font-weight:bold;">Tonys Clubhouse</a><span> by </span><a href="http://www.mixcloud.com/tonysclubhouse/?utm_source=widget&amp;amp;utm_medium=web&amp;amp;utm_campaign=base_links&amp;amp;utm_term=profile_link" target="_blank" style="color:#808080; font-weight:bold;">Tony's Clubhouse</a><span> on </span><a href="http://www.mixcloud.com/?utm_source=widget&amp;utm_medium=web&amp;utm_campaign=base_links&amp;utm_term=homepage_link" target="_blank" style="color:#808080; font-weight:bold;"> Mixcloud</a></p><div style="clear: both; height: 3px; width: 652px;"></div>
</div>
		<!--<object type="application/x-shockwave-flash" allowScriptAccess="never" allowNetworking="internal" height="140" width="400" data="http://www.kingplus.com/clubhouse/music/player.swf">
		  <param name="allowScriptAccess" value="never" />
		  <param name="allowNetworking" value="internal" />
		  <param name="movie" value="http://www.kingplus.com/clubhouse/music/player.swf" />
		  <param name="flashvars" value="file=http://www.kingplus.com/clubhouse/mysql_playlist.php&height=140&width=400&description=tony's clubhouse&captions=ClubHouse Media Player&stretching=fill&displaywidth=120&autostart=<?php echo $autostart; ?>&volume=100&linktarget=_blank&playlist=right&displayclick=play&repeat=always&skin=http://www.kingplus.com/clubhouse/music/skins/nacht.swf&playlistsize=190&plugins=revolt_1-0" />
		</object>-->
		<?php 
			$music_link = "http://www.kingplus.com/clubhouse/mysql_playlist.php";					
			$show_listen = "player3.php?music_link=$music_link&userid=$userid&autostart=yes";
			//$listen	= "<A HREF=\"javascript:openWindow('$show_listen');\"><img src='images/button_listen_headphones.gif' alt='Listen' border=0></a>";
			echo "<p align=\"center\"><A HREF=\"javascript:openPlayer2('$show_listen',165,425);\" title=\"Launch player in separate window\">Launch in Separate Window</a>  </p>";
		?>
		</p>
				</td></tr>
				</td></tr><tr><td align="center"><center><object width="425" height="344"><param name="movie" value="http://www.youtube.com/v/CC4DvPgy-vk&hl=en&fs=1"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/CC4DvPgy-vk&hl=en&fs=1" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="425" height="344"></embed></object>
</center></td></tr>
				
</table>

<div align="center">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p><strong><font color="#CCCCCC">Tony's Clubhouse live Friday Nights on </font></strong><br /><hr>
    <a href="http://www.wlfr.fm/" target="main"><img height="59" alt="" src="http://www.kingplus.com/clubhouse/images/wlfr1.gif" width="440" align="top" border="0" /></a></p>
    <hr>
</div>
<div align="center">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
	<object width="425" height="344"><param name="movie" value="http://www.youtube.com/v/EznncXgJqyU?fs=1&amp;hl=en_US&amp;color1=0x3a3a3a&amp;color2=0x999999"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/EznncXgJqyU?fs=1&amp;hl=en_US&amp;color1=0x3a3a3a&amp;color2=0x999999" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="425" height="344"></embed></object>
</div>

</body>