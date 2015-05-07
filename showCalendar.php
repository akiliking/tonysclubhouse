<center>

					<?php
					
							include_once "event_calendar.php";
							
							// Construct a calendar to show the current month
							$cal = new Calendar;
							if (!$month)
							{
								echo $cal->getCurrentMonthView();
							}
							else 
							{
								echo $cal->getMonthView($day, $month, $year);
							}
					?>