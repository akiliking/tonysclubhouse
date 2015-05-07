<?php
$url = 'http://tonysclubhouse.kingplus.com/music/juneteenth.mp3';

//print_r(parse_url($url));

//echo parse_url($url, PHP_URL_PATH);

$path_parts = pathinfo('http://tonysclubhouse.kingplus.com/music/juneteenth.mp3');

//echo $path_parts['dirname'], "\n";
echo $path_parts['basename'], "\n";
//echo $path_parts['extension'], "\n";
//echo $path_parts['filename'], "\n"; // since PHP 5.2.0
?> 
