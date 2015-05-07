
<?php

//include "navbar.php";
include_once "dbobjects/dbutils.php";
  extract($_POST,'$'); // get post values and prefix with $ ie. $FName,$LName,$Login, $Password
  $CurrMemberId = $_SESSION['CurrMemberId'];
  $DBUTIL = new dbutils($dbName, $dbLogin, $dbPassword);

  $dbResultSet =  $DBUTIL->getMemberByUserId($CurrMemberId); 
    while($dbRow = mysql_fetch_array($dbResultSet, MYSQL_ASSOC)) {
		$Alias =$dbRow["fldNickName"]; 
		$FName =$dbRow["fldFName"];
		$LName = $dbRow["fldLName"]; 
		$Email = $dbRow["fldEmail"]; 
		$AllowEmails = $dbRow["fldEmailSetting"];
		//$PlayerRank =$dbRow["Grade"]; 
		$MemberId = $dbRow["pkrecid"]; 
		$photo =$dbRow["fldPhotoURL"]; 
		$username = $dbRow["fldLogin"];
		$location = $dbRow["fldCity"] .", " .$dbRow["fldAbbrev"];
		$City = $dbRow["fldCity"]; 
		$stateid = $dbRow["fkState"];
		$dob	=$dbRow["fldBirthDate"];
		$Gender = $dbRow["fldGender"];
		$address = $dbRow["fldAddress"];
		$address2 = $dbRow["fldAddress2"];
		$Zip = $dbRow["fldZip"];
		if ($dob){$dob = date("M j, Y ",strtotime($dob));
			$month = date("m",strtotime($dob));
			$day = date("d",strtotime($dob));
			$year = date("Y",strtotime($dob));}
    }
if($MemberId == $CurrMemberId){$editable = true;}
?> 
    			<table class="statstable" height="26" cellSpacing="0" cellPadding="0" width="90%">
						<tr>
							<th>
								PROFILE</th></tr>
</table>
					

					
<table class="statstable" cellSpacing="0" cellPadding="0" width="90%">
  <form name="form1" enctype="multipart/form-data" method="post" action="base.php?page=dbinsert.php">
    <tr> 
      <td colspan="1"><b>&nbsp;Login Name: </b></td>
      <td><b><?php echo $username;?>&nbsp;&nbsp;&nbsp;[<a href='base.php?page=ChangePW_form.php'>Change 
        Password</a>]</b> </td>
    </tr></tr>


    <tr> 
       <td valign="bottom" colspan="3"> 
        <?php 
						if (!$photo){$photo = "images/no_photo.jpg";}
							echo "<img align='middle' border='0' src='$photo' width='56' height='64'>";
				?>
        <input type="file" name="file" class="button"> </td>
    </tr>
    <tr> 
      <td colspan="1"><b>&nbsp;Full&nbsp;Name: </b></td>
      <td> <b> 
        <input name="FName" type="text" id="FName7" value="<?php echo $FName;?>" size="12">
        <input name="LName" type="text" id="LName" value="<?php echo $LName;?>" size="12">
        </b></td>
    </tr>
    <tr> 
      <td colspan="1"><b>&nbsp;Nick Name: </b></td>
      <td> <input name="Alias" type="text" id="Alias" value="<?php echo $Alias;?>"></td>
    </tr>
    <tr> 
      <td colspan="1"><b> &nbsp;Email: </b></td>
      <td><input name="Email" type="text" id="Email" size="25" value="<?php echo $Email;?>">
        <br>
        <input type="checkbox" name="allowemails" value="1" <?php if($AllowEmails>0){echo "checked";}?>>
        <font size="-3">Allow Clubhouse Emails</font></td>
    </tr>

	<tr>
        <td bordercolor="#999999" bordercolorlight="#C0C0C0" bordercolordark="#666666" align="justify" valign="top"><b>&nbsp;DOB: </b></td>
        <td bordercolor="#999999" bordercolorlight="#C0C0C0" bordercolordark="#666666" align="justify" valign="middle"><font color="#CCCC00"><select size="1" name="month">
            <?php $month_arr = array('00' => '','01'=>'January','02'=>'February','03'=>'March',
										'04'=>'April','05'=>'May','06'=>'June','07'=>'July',
										'08'=>'August','09'=>'September','10'=>'October','11'=>'November',
										'12'=>'December'); 
			foreach ($month_arr as $mkey=>$mval){
				if ($mkey == $month){$selected = "selected=\"selected\"";}else{$selected ="";}
				echo "<option value='$mkey' $selected>$mval</option>";}
			
			?>
          </select><!--webbot bot="Validation" S-Display-Name="val_day"
          S-Data-Type="Integer" S-Number-Separators="," B-Value-Required="TRUE"
          I-Maximum-Length="2" S-Validation-Constraint="Less than or equal to"
          S-Validation-Value="31" --><input type="text" name="day" size="3" tabindex="1" maxlength="2" value="<?php echo "$day";?>"><!--webbot
          bot="Validation" S-Data-Type="Integer" S-Number-Separators="x"
          B-Value-Required="TRUE" I-Maximum-Length="4" --><input type="text" name="year" size="9" maxlength="4" value="<?php echo "$year";?>"></font></td>
	</tr>
    <tr> 
      <td colspan="1"><b>&nbsp;Gender: </b></td>
      <td><select name="Gender" id="Gender">
          <?php 
	  	if ($Gender){
			if ($Gender == "Male"){$Gender2 = "Female"; }else{$Gender2 = "Male"; }
		$GenderList = "<option selected value=\"$Gender\">$Gender</option><option value=\"$Gender2\">$Gender2</option>
		<option value=\"$Gender3\">$Gender3</option>";}
		else{ 
			echo"<option value=\"\"></option>
          <option value=\"Male\">Male</option>
          <option value=\"Female\">Female</option>";
		  }

		echo $GenderList;
		?>
        </select> </b></td>
    </tr>
    <tr> 
      <td colspan="2" align="left"><b>&nbsp; </b> </td>
    </tr>
    <tr> 
		<td>&nbsp;<b>Address</b></td>
      <td><input name="Address" type="text" id="Address" size="50" value="<?php echo "$address";?>"></td>
    </tr>
    <tr> 
		<td>&nbsp;&nbsp; line 2</td>
      <td><input name="Address2" type="text" id="Address2" size="50" value="<?php echo "$address2";?>"></td>
    </tr>
    <tr> 
      <td colspan="1"><b>&nbsp;City </b></td>
      <td> <input name="City" type="text" value="<?php echo $City; ?>" size="15">      </td>
    </tr>
    <tr> 
      <td colspan="1" width="122"><b>&nbsp;State </b></td>
      <td><select name="State" size="1" id="State">
          <?php echo $DBUTIL->makeStateList(226,0,$stateid); ?> </select></td>
    </tr>
    <tr> 
      <td colspan="1" width="122"><b>&nbsp;Zip </b></td>
      <td><input name="Zip" type="text" id="Zip" size="10" value="<?php echo $Zip ;?>"></td>
    </tr>
    <tr> 
      <td colspan="2" align="center"><input  align="center" class="button" type="submit" name="Submit" value="Update Profile Information"></td>
    </tr>
    <tr> 
      <input name="RequestType" type="hidden" id="RequestType" value="updateUser">
      <input name="Type" type="hidden" id="Type" value="MEMBER">
      <input name="Login" type="hidden" id="Login" value="<?php echo $username ?>">
  </form>
</table>
  <br/>

