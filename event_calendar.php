<html>


<head>
<link rel="stylesheet" type="text/css" href="cal.css">
<style type="text/css">

</style>
<SCRIPT language="JavaScript">

function openWin(URL) {
	var aWindow;
	aWindow = window.open(URL,"newWindow","toolbar=no,width=500,height=175,status=no,scrollbars=no,resize=yes,titlebar=no,location=no,menubar=no,top=100,left=100");

}

</SCRIPT>
<?php



class Calendar
{
    /*
        Constructor for the Calendar class
    */
    function Calendar()
    {
    }


    /*
        Get the array of strings used to label the days of the week. This array contains seven
        elements, one for each day of the week. The first entry in this array represents Sunday.
    */
    function getDayNames()
    {
        return $this->dayNames;
    }


    /*
        Set the array of strings used to label the days of the week. This array must contain seven
        elements, one for each day of the week. The first entry in this array represents Sunday.
    */
    function setDayNames($names)
    {
        $this->dayNames = $names;
    }

    /*
        Get the array of strings used to label the months of the year. This array contains twelve
        elements, one for each month of the year. The first entry in this array represents January.
    */
    function getMonthNames()
    {
        return $this->monthNames;
    }

    /*
        Set the array of strings used to label the months of the year. This array must contain twelve
        elements, one for each month of the year. The first entry in this array represents January.
    */
    function setMonthNames($names)
    {
        $this->monthNames = $names;
    }



    /*
        Gets the start day of the week. This is the day that appears in the first column
        of the calendar. Sunday = 0.
    */
      function getStartDay()
    {
        return $this->startDay;
    }

    /*
        Sets the start day of the week. This is the day that appears in the first column
        of the calendar. Sunday = 0.
    */
    function setStartDay($day)
    {
        $this->startDay = $day;
    }


    /*
        Gets the start month of the year. This is the month that appears first in the year
        view. January = 1.
    */
    function getStartMonth()
    {
        return $this->startMonth;
    }

    /*
        Sets the start month of the year. This is the month that appears first in the year
        view. January = 1.
    */
    function setStartMonth($month)
    {
        $this->startMonth = $month;
    }


    /*
        Return the URL to link to in order to display a calendar for a given month/year.
        You must override this method if you want to activate the "forward" and "back"
        feature of the calendar.

        Note: If you return an empty string from this function, no navigation link will
        be displayed. This is the default behaviour.

        If the calendar is being displayed in "year" view, $month will be set to zero.
    */
    function getCalendarLink($month, $year)
    {
        return "base.php?day=1&month=$month&year=$year";
    }

    /*
        Return the URL to link to  for a given date.
        You must override this method if you want to activate the date linking
        feature of the calendar.

        Note: If you return an empty string from this function, no navigation link will
        be displayed. This is the default behaviour.
    */
    function getDateLink($day, $month, $year)
    {
        $today = mktime(0, 0, 0, date("m")  , date("d"), date("Y"));
				$indate  = mktime(0, 0, 0, $month  , $day, $year);
				$addlink = ($indate >= $today) ? "base.php?page=showUpcomingEvents.php&day=$day&month=$month&year=$year": "";

				return $addlink;
    }

    function getPopupDateLink($day, $month, $year, $hour, $min)
	  {
	      $today = mktime(0, 0, 0, date("m")  , date("d"), date("Y"));
				$indate  = mktime(0, 0, 0, $month  , $day, $year);
				$addlink = ($indate >= $today) ? "javascript:openWin('popup.php?day=$day&month=$month&year=$year&hour=$hour&min=$min')": "";
				
				return $addlink;
    }
    /*
        Return the HTML for the current month
    */
    function getCurrentMonthView()
    {
        $d = getdate(time());
        return $this->getMonthView($d["day"], $d["mon"], $d["year"]);
    }

    /*
        Return the HTML for the current year
    */
    function getCurrentYearView()
    {
        $d = getdate(time());
        return $this->getYearView($d["year"]);
    }


    /*
        Return the HTML for a specified month
    */
    function getMonthView($day, $month, $year)
    {
        return $this->getMonthHTML($day, $month, $year);
    }

    /*
        Return the HTML for a specified year
    */
    function getYearView($year)
    {
        return $this->getYearHTML($year);
    }

  	/*
        Return Event data html
    */
    function getEventsData($day, $month, $year)
    {
    	$thedate  = mktime(0, 0, 0, $month  , $day, $year);
	    // Perform SQL query
	    $dbQuery = "SELECT * from djdb_tblEvent where start_date > " .$thedate. " or end_date < " .$thedate. " order by start_date asc ";
	    //print "dbQuery 			=> " . $dbQuery 	. "<br/>";;
	    $dbResultSet = mysql_query($dbQuery) or die("Error executing query: " .mysql_error());
?>
    			<table class="statstable" height="26" cellSpacing="0" cellPadding="0" width="90%">
						<tr>
							<th "center">
								ClubHouse Calendar</th></tr>
					</table>
					
					<table class="statstable" cellSpacing="0" cellPadding="0" width="90%">
						<tr>
							<td class="level2" align="center">
								<b>Event</b>
							</TH>
							<td class="level2" align="center">
								<b>Location</b>
							</TH>
	<!--						<td class="level2" align="center">
								<b>Detail</b> </TH></td>
-->								

<?php
    $previous_rank = "";
    $count = 0;
    while($dbRow = mysql_fetch_array($dbResultSet, MYSQL_ASSOC)) {
    		$count++;
        echo "<tr>";
       	echo "  <td align='left' ><a href=base.php?page=event.php&eventId=".$dbRow["pkRecId"].">".$dbRow["title"]."</a>&nbsp;</td>";
       	echo "  <td align='left' >".$dbRow["location"]."&nbsp;</td>";
//        echo "  <td align='left' >".$dbRow["detail"]."&nbsp;</td>";
        echo "</tr>";
    }
?>

    </table>
    
<?php
        return $events;
    }

  	/*
        Return Event data html
    */
    function getEventData($eventId)
    {
	    // Perform SQL query
	    $dbQuery = "SELECT * from djdb_tblEvent where pkRecId = ".$eventId. " ";
	    //print "dbQuery 			=> " . $dbQuery 	. "<br/>";;
	    $dbResultSet = mysql_query($dbQuery) or die("Error executing query: " .mysql_error());
/*
    $previous_rank = "";
    $count = 0;
    while($dbRow = mysql_fetch_array($dbResultSet, MYSQL_ASSOC)) {
    		$count++;
        echo "<tr>";
       	echo "  <td align='left' >".$dbRow["title"]."</a>&nbsp;</td>";
       	echo "  <td align='left' >".$dbRow["location"]."&nbsp;</td>";
        echo "  <td align='left' >".$dbRow["detail"]."&nbsp;</td>";
        echo "</tr>";
    }
	*/
?>

    </table>
    
<?php
        return $events;
    }
    /********************************************************************************

        The rest are private methods. No user-servicable parts inside.

        You shouldn't need to call any of these functions directly.

    *********************************************************************************/


    /*
        Calculate the number of days in a month, taking into account leap years.
    */
    function getDaysInMonth($month, $year)
    {
        if ($month < 1 || $month > 12)
        {
            return 0;
        }

        $d = $this->daysInMonth[$month - 1];

        if ($month == 2)
        {
            // Check for leap year
            // Forget the 4000 rule, I doubt I'll be around then...

            if ($year%4 == 0)
            {
                if ($year%100 == 0)
                {
                    if ($year%400 == 0)
                    {
                        $d = 29;
                    }
                }
                else
                {
                    $d = 29;
                }
            }
        }

        return $d;
    }



    /*
        Generate the HTML for a given month
    */
    function getMonthHTML($selected_date, $m, $y, $showYear = 1)
    {
        $s = "";

        $a = $this->adjustDate($m, $y);
        $month = $a[0];
        $year = $a[1];

    	$daysInMonth = $this->getDaysInMonth($month, $year);
    	$date = getdate(mktime(12, 0, 0, $month, 1, $year));

    	$first = $date["wday"];
    	$monthName = $this->monthNames[$month - 1];

    	$prev = $this->adjustDate($month - 1, $year);
    	$next = $this->adjustDate($month + 1, $year);

    	if ($showYear == 1)
    	{
    	    $prevMonth = $this->getCalendarLink($prev[0], $prev[1]);
    	    $nextMonth = $this->getCalendarLink($next[0], $next[1]);
    	}
    	else
    	{
    	    $prevMonth = "";
    	    $nextMonth = "";
    	}

    	$header = $monthName . (($showYear > 0) ? " " . $year : "");
?>
					<table class="playertatstable" cellSpacing="0" cellPadding="0" width="100%">
						<tr>
							<th align="center">ClubHouse Calendar</th></tr>
					</table>
<?php
    	$s .= "<table class=\"playertatstable\" cellspacing=\"0\" cellpadding=\"1\" width=\"100%\" border=\"0\">\n";
    	$s .= "<tr>\n";
    	$s .= "<td align=\"center\" valign=\"top\" >". (($prevMonth == "") ? "&nbsp;" : "<a href=\"$prevMonth\">&lt;&lt;</a>")  . "</td>\n";
    	$s .= "<td align=\"center\" valign=\"top\" class=\"level2\" colspan=\"5\"><b>$header</b></td>\n";
    	$s .= "<td align=\"center\" valign=\"top\" >". (($nextMonth == "") ? "&nbsp;" : "<a href=\"$nextMonth\">&gt;&gt;</a>")  . "</td>\n";
    	$s .= "</tr>\n";

    	$s .= "<tr>\n";
    	$s .= "<td align=\"center\" valign=\"top\"  >" . $this->dayNames[($this->startDay)%7] . "</td>\n";
    	$s .= "<td align=\"center\" valign=\"top\"  >" . $this->dayNames[($this->startDay+1)%7] . "</td>\n";
    	$s .= "<td align=\"center\" valign=\"top\"  >" . $this->dayNames[($this->startDay+2)%7] . "</td>\n";
    	$s .= "<td align=\"center\" valign=\"top\"  >" . $this->dayNames[($this->startDay+3)%7] . "</td>\n";
    	$s .= "<td align=\"center\" valign=\"top\"  >" . $this->dayNames[($this->startDay+4)%7] . "</td>\n";
    	$s .= "<td align=\"center\" valign=\"top\"  >" . $this->dayNames[($this->startDay+5)%7] . "</td>\n";
    	$s .= "<td align=\"center\" valign=\"top\"  >" . $this->dayNames[($this->startDay+6)%7] . "</td>\n";
    	$s .= "</tr>\n";

    	// We need to work out what date to start at so that the first appears in the correct column
    	$d = $this->startDay + 1 - $first;
    	while ($d > 1)
    	{
    	    $d -= 7;
    	}

        // Make sure we know when today is, so that we can use a different CSS style
        $today = getdate(time());

    	while ($d <= $daysInMonth)
    	{
    	    $s .= "<tr>\n";

    	    for ($i = 0; $i < 7; $i++)
    	    {
    	    	if($selected_date == "") $selected_date = $today["mday"];
//        	    	$class = ($year == $today["year"] && $month == $today["mon"] && $d == $today["mday"]) ? "calendarToday" : "calendar";
        	    	$class = ($year == $today["year"] && $month == $today["mon"] && $selected_date == $d ) ? "calendarToday" : "";

    	        $s .= "<td onmouseover=\"this.className='level2'\" onmouseout=\"this.className='$class'\" class=\"$class\" align=\"right\" valign=\"top\">";
    	        if ($d > 0 && $d <= $daysInMonth)
    	        {
    	            $link = $this->getDateLink($d, $month, $year);
    	            $s .= (($link == "") ? $d : "<a href=\"$link\">$d</a>");
					//$events = $this->geteventdata($d, $month, $year);
					//if($events){$s .= "<img src= 'images/bell4.gif' alt='$events'>";}
					$s .= "$events";
    	        }
    	        else
    	        {
    	            $s .= "&nbsp;";
    	        }
      	        $s .= "</td>\n";
        	    $d++;
    	    }
    	    $s .= "</tr>\n";
    	}

    	$s .= "</table>\n";

    	return $s;
    }

    /*
        Generate the HTML for a given year
    */
    function getYearHTML($year)
    {
        $s = "";
    	$prev = $this->getCalendarLink(0, $year - 1);
    	$next = $this->getCalendarLink(0, $year + 1);

        $s .= "<table class=\"calendar\" border=\"0\">\n";
        $s .= "<tr>";
    	$s .= "<td align=\"center\" valign=\"top\" align=\"left\">" . (($prev == "") ? "&nbsp;" : "<a href=\"$prev\">&lt;&lt;</a>")  . "</td>\n";
        $s .= "<td class=\"calendarHeader\" valign=\"top\" align=\"center\">" . (($this->startMonth > 1) ? $year . " - " . ($year + 1) : $year) ."</td>\n";
    	$s .= "<td align=\"center\" valign=\"top\" align=\"right\">" . (($next == "") ? "&nbsp;" : "<a href=\"$next\">&gt;&gt;</a>")  . "</td>\n";
        $s .= "</tr>\n";
        $s .= "<tr>";
        $s .= "<td class=\"calendar\" valign=\"top\">" . $this->getMonthHTML(0 + $this->startMonth, $year, 0) ."</td>\n";
        $s .= "<td class=\"calendar\" valign=\"top\">" . $this->getMonthHTML(1 + $this->startMonth, $year, 0) ."</td>\n";
        $s .= "<td class=\"calendar\" valign=\"top\">" . $this->getMonthHTML(2 + $this->startMonth, $year, 0) ."</td>\n";
        $s .= "</tr>\n";
        $s .= "<tr>\n";
        $s .= "<td class=\"calendar\" valign=\"top\">" . $this->getMonthHTML(3 + $this->startMonth, $year, 0) ."</td>\n";
        $s .= "<td class=\"calendar\" valign=\"top\">" . $this->getMonthHTML(4 + $this->startMonth, $year, 0) ."</td>\n";
        $s .= "<td class=\"calendar\" valign=\"top\">" . $this->getMonthHTML(5 + $this->startMonth, $year, 0) ."</td>\n";
        $s .= "</tr>\n";
        $s .= "<tr>\n";
        $s .= "<td class=\"calendar\" valign=\"top\">" . $this->getMonthHTML(6 + $this->startMonth, $year, 0) ."</td>\n";
        $s .= "<td class=\"calendar\" valign=\"top\">" . $this->getMonthHTML(7 + $this->startMonth, $year, 0) ."</td>\n";
        $s .= "<td class=\"calendar\" valign=\"top\">" . $this->getMonthHTML(8 + $this->startMonth, $year, 0) ."</td>\n";
        $s .= "</tr>\n";
        $s .= "<tr>\n";
        $s .= "<td class=\"calendar\" valign=\"top\">" . $this->getMonthHTML(9 + $this->startMonth, $year, 0) ."</td>\n";
        $s .= "<td class=\"calendar\" valign=\"top\">" . $this->getMonthHTML(10 + $this->startMonth, $year, 0) ."</td>\n";
        $s .= "<td class=\"calendar\" valign=\"top\">" . $this->getMonthHTML(11 + $this->startMonth, $year, 0) ."</td>\n";
        $s .= "</tr>\n";
        $s .= "</table>\n";

        return $s;
    }

    /*
        Adjust dates to allow months > 12 and < 0. Just adjust the years appropriately.
        e.g. Month 14 of the year 2001 is actually month 2 of year 2002.
    */
    function adjustDate($month, $year)
    {
        $a = array();
        $a[0] = $month;
        $a[1] = $year;

        while ($a[0] > 12)
        {
            $a[0] -= 12;
            $a[1]++;
        }

        while ($a[0] <= 0)
        {
            $a[0] += 12;
            $a[1]--;
        }

        return $a;
    }

    /*
        The start day of the week. This is the day that appears in the first column
        of the calendar. Sunday = 0.
    */
    var $startDay = 0;

    /*
        The start month of the year. This is the month that appears in the first slot
        of the calendar in the year view. January = 1.
    */
    var $startMonth = 1;

    /*
        The labels to display for the days of the week. The first entry in this array
        represents Sunday.
    */
    var $dayNames = array("S", "M", "T", "W", "T", "F", "S");

    /*
        The labels to display for the months of the year. The first entry in this array
        represents January.
    */
    var $monthNames = array("January", "February", "March", "April", "May", "June",
                            "July", "August", "September", "October", "November", "December");


    /*
        The number of days in each month. You're unlikely to want to change this...
        The first entry in this array represents January.
    */
    var $daysInMonth = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
    //int mcal_is_leap_year (int year)


}


?>








