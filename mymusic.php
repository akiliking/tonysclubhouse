
<?php
include_once "includes/javascript_functions.php";
if (false !== ($handle = @opendir('/home/users/web/b1603/ipw.kingplus/public_html/clubhouse/music/'.$userid) or die ("You have not added a music directory!"))) {
	$counter = 0; 
    /* This is the correct way to loop over the directory. */
    while (false !== ($file = readdir($handle))) {
        if (strrpos($file, '.mp3') > 0)
		{
			$counter = $counter+1;
			$link = "http://www.kingplus.com/clubhouse/music/".$file;
			$Listen = "<a HREF =\"javascript:openPlayer('player.php?music_link=$link&autostart=yes');\" title='Listen to $file'><strong>$file <img src ='images/listen-sm-rad-reg.gif' border=0></strong></a>";
			
			echo "$counter) $Listen <br>";
		}
    }


    closedir($handle);
}
?> 