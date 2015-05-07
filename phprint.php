<?php

/*PHPrint - This file is phprint.php
Make any Page Printer Friendly!
Copyright by MikeNew.Net, Notice must stay intact
************
Legal: MikeNew.Net is not responsible for any damages caused
by use of this script. (Not likely that it will. Hasn't yet.)
This script will make your pages printer friendly.
Optionally, it will strip images as well. (Instructions for that below)

// After installation, you can remove text from here down to the next: 8< ---->
// Back up/copy this file first.

1. Save this script in the root of the site for simplicity.
2. Place <!-- BeginPRN --> somewhere in your HTML page where you consider
it to be the start of printer friendly content, and <!-- EndPRN --> goes at the end
of that same content.
3. You place a link to phprint.php anywhere on the HTML page (preferably outside the printed content,
like this: <a href="/phprint.php">Print this page</a>
- or however you like, just as long as you link to this script. */

// If you've already tested, you can remove the text from here up to the other: 8< ---->

//Do you want to strip images from the printable output?
// If no, change to "no". Otherwise, images are stripped by default.
$noImgs = "yes";


// That's it! No need to go below here. Upload it and test by going to yoursite.com/page.php
// (The page containing a the two tags and a link to this script)
// -----------------------------------------------------

$beginprnt = "<!-- BeginPRN -->";
$$endprnt = "<!-- EndPRN -->";
// let's turn off any ugly errors for a sec-
error_reporting(0);
// $read = fopen($HTTP_REFERER, "rb") ... may work better if you're using NT and images
$read = fopen($HTTP_REFERER, "r") or die("<br />Oops! There is no access to this file directly. You must follow a link. <br /><br />Please click your browser's back button.");
// let's turn errors back on so we can debug if necessary
error_reporting(1);

$value = "";
while(!feof($read)){
$value .= fread($read, 10000); // reduce number to save server load
}
fclose($read);
$start= strpos($value, "$beginprnt");
$finish= strpos($value, "$$endprnt");
$length= $finish-$start;
$value=substr($value, $start, $length);

function i_denude($variable)
{
return(eregi_replace("<img src=[^>]*>", "", $variable));
}

function i_denudef($variable)
{
return(eregi_replace("<font[^>]*>", "", $variable));
}

$PHPrint = ("$value");

if ($noImgs == "yes") {
$PHPrint = i_denude("$PHPrint");
}

$PHPrint = i_denudef("$PHPrint");
$PHPrint = str_replace( "</font>", "", $PHPrint );
$PHPrint = stripslashes("$PHPrint");

echo $PHPrint;
// Next line mandatory. Please don't remove - it's invisible. Nobody will see it except SE crawlers, anyway. Thanks! :)
echo "<br><a href=\"http://www.mikenew.net/\"><img src=\"http://www.mikenew.net/images/php.gif\" ";
echo "alt=\"printer friendly pages script, php\" width=\"20\" height=\"8\" border=\"0\"></a>";
echo "<br/><br/>This page printed from: $HTTP_REFERER";
flush ();
?>
