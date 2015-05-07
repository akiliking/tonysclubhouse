<center>

					<?php
							include_once "event_calendar.php";
							
							// Construct a calendar to show the current month
							$cal = new Calendar;

							
							echo $cal->getEventData($eventId);
					?>