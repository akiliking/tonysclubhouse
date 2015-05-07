   <?php $username = $_SESSION['user_name']; ?>    
	    <form name="login" method="post" action="base.php">
        	<table class="logintable">
						<TR>
							<TD width="32%" align="right">Current Password:
							</TD>
							<TD width="68%"><INPUT id="CurrPassword" type="password" size="12" name="CurrPassword"></TD>
						</TR>
						<TR>
							<TD width="32%" align="right">New Password:
							</TD>
							<TD width="68%"><INPUT id="Password" type="password" size="12" name="Password"></TD>
						</TR>
						<TR>
							<TD width="32%" align="right">Retype Password:
							</TD>
							<TD width="68%"><INPUT id="Password2" type="password" size="12" name="Password2">
                <input class='button' type="submit" name="Submit" value="go"></TD>
						</TR>
						<TR>
							<td colspan="2">
							<input name="RequestType" type="hidden" value="ChangePW">
							<input id="username" name="username" type="hidden" value="<?php echo $username;?>">
							<input id="page" name="page" type="hidden" value="dbinsert.php"></td>
						</TR>
					</table>
