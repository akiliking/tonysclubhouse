
<?php

//include "navbar.php";
include_once "dbobjects/dbutils.php";
  extract($_POST,'$'); // get post values and prefix with $ ie. $FName,$LName,$Login, $Password
  $CurrHostId = $_SESSION['CurrHostId'];
  $DBUTIL = new dbutils($dbName, $dbLogin, $dbPassword);

  $dbResultSet =  $DBUTIL->getHostByHostId($CurrHostId); 
    while($dbRow = mysql_fetch_array($dbResultSet, MYSQL_ASSOC)) {
		$Alias =$dbRow["fldHostName"]; 
		$FName = $dbRow["fldFName"];
		$LName = $dbRow["fldLName"];
		$Email = $dbRow["fldEmail"];
		$PlayerName =$dbRow["fldFName"] ." " .$dbRow["fldLName"]; 
		$PlayerId = $dbRow["fldPlayerId"]; 
		$photo =$dbRow["fldPhotoURL"]; 
		if ($photo == ""){$photo = "images/ACE_sm.jpg";}
		$username = $dbRow["fldLogin"];
		$location = $dbRow["fldCity"] .", " .$dbRow["fldAbbrev"];
		$City = $dbRow["fldCity"]; 
		$stateid = $dbRow["pkRecId"];
		$address = $dbRow["fldAddress"];
		$address2 = $dbRow["fldAddress2"];
		$Zip = $dbRow["fldZip"];
    }
//if($PlayerId == $CurrHostId){$editable = true;}
?> 
    			<table class="statstable" height="26" cellSpacing="0" cellPadding="0" width="90%">
						<tr>
							<th>
								HOST PROFILE</th></tr>
					</table>
					

					
<table class="statstable" cellSpacing="0" cellPadding="0" width="90%">
  <form name="form1" enctype="multipart/form-data" method="post" action="base.php?page=dbinsert.php">
    <tr> 
      <td colspan="1"><b>&nbsp;Login Name: </b></td>
      <td colspan="2"><b><?php echo $username;?>&nbsp;&nbsp;&nbsp;[<a href='base.php?page=ChangePW_form.php'>Change 
        Password</a>]</b> </td>
    </tr></tr>
    <tr> 
      <td  colspan="1"><b>&nbsp;Tournaments Hosted: </b></td>
      <td colspan="2"> 
        <?php 
	      $dbResultSet = $DBUTIL->getHostTournaments($CurrHostId, 1); 
		  $tournamentcnt = mysql_num_rows($dbResultSet);
	  echo $tournamentcnt;?>
      </td>
    </tr>
    <tr> 
      <td valign="bottom" colspan="3"> 
        <?php 
						if (!$photo){$photo = "images/no_photo.jpg";}
							echo "<img align='middle' border='0' src='$photo' width='56' height='64'>";
				?>
        <input type="file" name="file" class="button"> </td>
    </tr>
    <tr> 
      <td colspan="1"><b>&nbsp;Contact&nbsp;Name: </b></td>
      <td colspan="2"> <b> 
        <input name="FName" type="text" id="FName7" value="<?php echo $FName;?>" size="12">
        <input name="LName" type="text" id="LName" value="<?php echo $LName;?>" size="12">
        </b></td>
    </tr>
    <tr>
      <td colspan="1"><b>Contact&nbsp;Email: </b></td>
      <td colspan="2"><input name="Email" type="text" id="Email" size="25" value="<?php echo $Email;?>"></td>
    </tr>
    <tr> 
      <td colspan="1"><b>&nbsp;Host Name: </b></td>
      <td colspan="2"> <input name="Alias" type="text" id="Alias" value="<?php echo $Alias;?>"></td>
    </tr>
    <tr> 
      <td colspan="3" align="left"><b>&nbsp;Address </b> </td>
    </tr>
    <tr> 
      <td colspan="3"><input name="Address" type="text" id="Address" size="50" value="<?php echo "$address";?>"></td>
    </tr>
    <tr> 
      <td colspan="3"><input name="Address2" type="text" id="Address2" size="50" value="<?php echo "$address2";?>"></td>
    </tr>
    <tr> 
      <td colspan="1"><b>&nbsp;City </b></td>
      <td colspan="2"> <input name="City" type="text" value="<?php echo $City; ?>" size="15"> 
      </td>
    </tr>
    <tr> 
      <td colspan="1" width="67"><b>&nbsp;State </b></td>
      <td colspan="2"><select name="State" size="1" id="State">
          <?php echo $DBUTIL->makeStateList(226,0,$stateid); ?> </select></td>
    </tr>
    <tr> 
      <td colspan="1" width="122"><b>&nbsp;Zip </b></td>
      <td colspan="2"><input name="Zip" type="text" id="Zip" size="10" value="<?php echo $Zip; ?>"></td>
    </tr>
    <tr> 
      <td colspan="3"><input  align="center" class="button" type="submit" name="Submit" value="Update Profile Information"></td>
    </tr>
    <tr> 
      <input name="RequestType" type="hidden" id="RequestType" value="updateUser">
      <input name="Type" type="hidden" id="Type" value="Host">
      <input name="Login" type="hidden" id="Login" value="<?php echo $username ?>">
  </form>
</table>