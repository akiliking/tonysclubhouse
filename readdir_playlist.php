<?php
// we'll first add an xml header and the opening tags .. 
header("content-type:text/xml;charset=utf-8");




// search for mp3 files. set this to '.flv' or '.jpg' for the other scripts 
$filter = ".mp3";
// path to the directory you want to scan
$directory = "music/";


// read through the directory and filter files to an array
@$d = dir($directory);
if ($d) { 
	while($entry=$d->read()) {  
		$ps = strpos(strtolower($entry), $filter);
		if (!($ps === false)) {  
			$items[] = $entry; 
		} 
	}
	$d->close();
	sort($items);
}


// third, the playlist is built in an xspf format

echo "<playlist version='1' xmlns='http://xspf.org/ns/0/'>\n";
echo "	<title>PHP Generated Playlist</title>\n";
echo "	<info>http://www.kingplus.com/</info>\n";
echo "	<trackList>\n";


for($i=0; $i<sizeof($items); $i++) {
	echo "		<track>\n";
	echo "			<title>".$items[$i]."</title>\n";
	echo "			<location>".$directory.'/'.$items[$i]."</location>\n";
	echo "			<image>http://www.kingplus.com/clubhouse/images/DJMix2a.jpg</image>\n";
	echo "		</track>\n";
}
 
// .. and last we add the closing tags
echo "	</trackList>\n";
echo "</playlist>\n";


/*
That's it! You can feed this playlist to the SWF by setting this as it's 'file' 
parameter in your HTML page.
*/

?>