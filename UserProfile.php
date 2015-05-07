
<?php

//include "navbar.php";
include_once "dbobjects/dbutils.php";
  extract($_POST,'$'); // get post values and prefix with $ ie. $FName,$LName,$Login, $Password
  $CurrMemberId = $_SESSION['CurrMemberId'];
  if (!$MemberId){$MemberId = $CurrMemberId;}
  $USR = new dbutils($dbName, $dbLogin, $dbPassword);

  $dbResultSet =  $USR->getMemberByUserId($MemberId); 
    while($dbRow = mysql_fetch_array($dbResultSet, MYSQL_ASSOC)) {
		$Alias =$dbRow["fldNickName"]; 
		$MemberName =$dbRow["fldFName"] ." " .$dbRow["fldLName"]; 
		$Gender =$dbRow["fldGender"]; 
		$PlayerId = $dbRow["pkRecId"];  
		$photo =$dbRow["fldPhotoURL"]; 
		if ($photo == ""){$photo = "images/no_photo.jpg";}
		$username = $dbRow["fldLogin"];
		$location = $dbRow["fldCity"] .", " .$dbRow["fldAbbrev"];
		$dob	=$dbRow["fldBirthDate"];
		if ($dob){$dob = date("M j, Y ",strtotime($dob));
			$dob2 = date("M j",strtotime($dob));}
		
		$today = date('M j');
		if ($dob2 == $today){$dob = "(HAPPY BIRTHDAY)" .$dob;}
		$createdate = $dbRow["fldCreateDTS"];
		if($createdate){$createdate = date("M j, Y",strtotime($createdate));}
		
    }
if($MemberId == $CurrMemberId){$editable = true;}
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
							<th align="center">Member Profile</th>
						</tr>
					</table>
					<table class="playertatstable" id="Table2" cellSpacing="0" cellPadding="0" width="90%">
						<tr>
							<td bgcolor="#F3F3F3" align="center" >
							<?php echo "<a href ='$photo' target=\"_blank\" title=\"$Alias\"><img align='middle' border='0' src='$photo' width='90' height='100'></img></a>";?>
							</td>
							<td class="level2" align="right">
								<b>User Name:</b><br/>
								<b>Full Name:</b><br/>
								<b>Nick Name:</b><br/>
								<b>DOB:</b><br/>
								<b>Gender:</b><br/>
								<b>Location:</b><br/>
								<b>Member Since:</b>
							</TH>
							<td align="left">
								<b><?php echo $username;?></b><br/>
								<b><?php echo $MemberName;?></b><br/>
								<b><?php echo $Alias;?></b><br/>
								<b><?php echo $dob;?></b><br/>
								<b><?php echo $Gender;?></b><br/>
								<b><?php echo $location;?></b><br/>
								<b><?php
								  echo $createdate;?></b><br/>
								<?php if($editable == true){echo "<a href='base.php?page=editUSER.php'>[edit profile] </a><a href='base.php?page=userspaceeditor.php&userid=$MemberId'>[edit My WebSpace]</a>";}
								else{echo"<a href='userspace.php?userid=$MemberId'>View $username userspace</a>";}?>
							</TH>
						</tr>
					</table>

<br/>
