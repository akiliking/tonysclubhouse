

<?php
  include_once "dbobjects/webdata.php";
  if(!$url){$url = "base.php";}
  $readyforinsert =1;
  extract($_POST,'$'); // get post values and prefix with $ ie. $FName,$LName,$Login, $Password

 $GETWEBDATA = new GETWEBDATA($dbName, $dbLogin, $dbPassword);

// set sql based on action type (0 = query, 1 = Insert, 2 = Update, 3 = delete)

if ($action==1) {
	$timestamp = date("U");
	if ($year == "") {$year = date("Y");}
	if ($day == "") {$day = date("d");}
	if ($month == 0) {$month = date("m");}
	if ($start_time == "") {$start_hour = date("h");}
	if ($start_time1 == "") {$start_min = date("i");}
	if ($AMPM == "PM" && $start_time <= "12") {$start_hour = $start_hour + 12;}
	$start_date = "$year-$month-$day, $start_hour:$start_min";

	if ($end_year == "") {$end_year = date("Y");}
	if ($end_day == "") {$end_day = date("d");}
	if ($end_month == 0) {$end_month = date("m");}
	if ($end_time == "") {$end_hour = date("h:iA");}
	if ($end_time1 == "") {$end_min = date("i");}
	if ($End_AMPM == "PM" && $end_time <= 12) {$end_hour = $end_hour + 12;}
	$end_date = "$end_year-$end_month-$end_day, $end_hour:$end_min";
	$result = $GETWEBDATA->addEvent($title, $detail, $location, $start_date, $end_date);

}
elseif ($action==3) {
	if($id){
	$result = $GETWEBDATA->delEvent($id);
	}
}

print '<meta http-equiv="refresh" content="0;URL=$url">'; 


?>

