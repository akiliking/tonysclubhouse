<center>

					<p>&nbsp;</p>
					<p>&nbsp;</p>
					<p>&nbsp;</p>
					<p>&nbsp;</p>
					<table width="738" border="0">
                      <tr>
                        <td width="283"><?php
					
							include_once "event_calendar.php";
							
							// Construct a calendar to show the current month
							$cal = new Calendar;
							
							echo $cal->getEventsData($day, $month, $year);
					?></td>
                      </tr>
                    </table>
					<p>&nbsp;</p>
					