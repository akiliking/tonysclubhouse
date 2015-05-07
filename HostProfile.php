
<?php

//include "navbar.php";
include_once "dbobjects/dbutils.php";
  extract($_POST,'$'); // get post values and prefix with $ ie. $FName,$LName,$Login, $Password
  $CurrHostId = $_SESSION['CurrHostId'];
  if (!$HostId){$HostId = $CurrMemberId;}
  $dbutils = new dbutils($dbName, $dbLogin, $dbPassword);

  $dbResultSet =  $dbutils->getDJByDJId($HostId); 
    while($dbRow = mysql_fetch_array($dbResultSet, MYSQL_ASSOC)) {
		$Alias =$dbRow["DJName"]; 
		$Name =$dbRow["fldFName"] ." " .$dbRow["fldLName"]; 
		$PlayerId = $dbRow["pkRecId"]; 
		$photo =$dbRow["fldPhotoURL"]; 
		if ($photo == ""){$photo = "images/no_photo.jpg";}
		$username = $dbRow["fldLogin"];
		$location = $dbRow["fldCity"] .", " .$dbRow["fldAbbrev"];
		$dob	=$dbRow["fldBirthDate"];
		if ($dob){$dob = date("M j, Y ",strtotime($dob));
			$dob2 = date("M j",strtotime($dob));}
		
		$today = date('M j');
		if ($dob2 == $today){$dob = "(HAPPY BIRTHDAY) " .$dob;}
		$createdate = $dbRow["fldCreateDTS"];
		if($createdate){$createdate = date("M j, Y",strtotime($createdate));}
    }
if($HostId == $CurrHostId){$editable = true;}
//echo "host id: $HostId";
   echo " 
					<TABLE class=\"maintable\" id=\"Table3\" cellSpacing=\"0\" cellPadding=\"0\" width=\"85%\" border=\"0\">
						<TBODY>
							<tr>
								<th align=\"center\">
									     <p>&nbsp;</p> <p align=\"center\"><font color=\"#FFFFFF\" size=\"5\"><b>TONY'S CLUBHOUSE</font></b>
								</p>      <p>&nbsp;</p>
      							</th>
							</tr></TBODY> </TABLE>";

?> 
					<table class="playertatstable" cellSpacing="0" cellPadding="0" width="90%">
						<tr>
							
    <th align="center">Host Profile</th>
  </tr>
					</table>
					<table class="playertatstable" id="Table2" cellSpacing="0" cellPadding="0" width="90%">
						<tr>
							<td bgcolor="#F3F3F3" align="center" >
							
							<?php echo "<img align='middle' border='0' src='$photo' width='50' height='69'></img>";?>
							</td>
							<td class="level2" align="right">
								<b>Host Name:</b><br/>
								<b></b><br/>
								<b>User Name:</b><br/>
								<b>Name:</b><br/>
								<b>Location:</b><br/>
								<b>Member Since:</b><br/>
								<b></b><br/>
							</TH>
							<td align="left">
								<b><?php echo $Alias;?></b><br/>
								<b></b><br/>
								<b><?php echo $username;?></b><br/>
								<b><?php echo $Name;?></b><br/>
								<b><?php echo $location;?></b><br/>
								<b><?php echo $createdate;?></b><br/>
								<b></b><br/>
								<?php if($editable == true){echo "<a href='base.php?page=editHost.php'>[edit profile]</a>";}?>
							</TH>
						</tr>
					</table>

      

