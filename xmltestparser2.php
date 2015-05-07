<?php 

//header("Content-type: text/xml"); 

include_once "dbobjects/playlist_db.php";

// connect to db
$DBUTIL = new PLAYLISTDB();

$data = $DBUTIL->shows_xml();
//echo $data; 


$xml_showname_key = "*SHOWS*SHOW*SHOW_NAME";
$xml_date_key = "*SHOWS*SHOW*DATE";

// An array for storing our information. An array is nice to use here
// because it allows us to parse the XML and then temporarily forget about it
// allowing use greater freedom to edit and maniplulate the output.
$show_array = array();

// A counter that will come into use later.
$counter = 0;

// A simple class that will make our life easier. We could use an 
// associative array as well, but I prefer to just write up the class. =)
class shows_xml{
	var $showname, $showdate;
}

// Once again, this is what we want our parser to do when it reaches a start tag
function startTag($parser, $data){
	global $current_tag;
	$current_tag .= "*$data";
}

// Same thing here as well. This tells the parser what to do when it trips over an end tag.
function endTag($parser, $data){
	global $current_tag;
	$tag_key = strrpos($current_tag, '*');
	$current_tag = substr($current_tag, 0, $tag_key);
}

// When the parser hits the contents of the tags it will perform this function.
// This will all be explained word for word in the tutorial
function contents($parser, $data){
	global $current_tag, $xml_showname_key, $xml_date_key, $counter, $show_array;
	//echo $current_tag .'<br>';
	switch($current_tag){
		case $xml_showname_key:
			$show_array[$counter] = new shows_xml();
			$show_array[$counter]->showname = $data;
			//echo $current_tag .' -> ' .$data.'<br>';
			break;
		case $xml_date_key:
			$show_array[$counter]->showdate = $data;
			//echo $current_tag .' -> ' .$data.'<br>';
			$counter++;
			break;
		
	}
}

// Creates the parser
$xml_parser = xml_parser_create();

// Sets the element handlers for the start and end tags
xml_set_element_handler($xml_parser, "startTag", "endTag");

// Sets the data handler, same as before...
xml_set_character_data_handler($xml_parser, "contents");



// This if statement is exactly the same as before. It parses the xml document
// according to the functions we have defined; and it returns an error message
// if the parsing fails
if(!(xml_parse($xml_parser, $data, 1))){
	die("Error on line " . xml_get_current_line_number($xml_parser));
}

// Frees up the memory 
xml_parser_free($xml_parser);


?>
<html>
<head>
<title>SHOW LIST</title>
</head>
<body bgcolor="#FFFFFF">
<table width="50%" border="1">
<tr>
	<th>Show Name</th>
	<th>Date</th>
</tr>
<? 
// A simple for loop that outputs our final data.
//echo $show_array[0]->headline;
for($x=0;$x<count($show_array);$x++){
	echo "<tr>\n\t<td>" . $show_array[$x]->showname . "</td>\n";
	//echo "\t\t<br />\n";
	echo "\t<td>" . $show_array[$x]->showdate . "</td>\n</tr>";
}
?>

</table>

</body>
</html>