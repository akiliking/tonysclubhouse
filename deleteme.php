

<center>

<?php
include_once "dbobjects/dbutils.php";
  $IAPPP = new dbutils($dbName, $dbLogin, $dbPassword);

?> 

  
<h2>Host Setup</h2>
  
  
  
<table width="347" border='0' cellpadding='0' cellspacing='5'>
  <form method='post' action='base.php?page=dbinsert.php'>
    <tr> 
      <td>Host Name:</td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="3"><input name="NickName" type="text" id="NickName" size="50"></td>
    </tr>
    <tr> 
      <td width="222"> Contact Information:</td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td>First Name </td>
      <td colspan="2">Last Name </td>
    </tr>
    <tr> 
      <td> <input type='text' name='FName' size='15' value='<?php echo $FName ?>'> 
      </td>
      <td colspan="2"><input type='text' name='LName' size='15' value='<?php echo $LName ?>'></td>
    </tr>
    <tr> 
      <td colspan="3">Email Address</td>
    </tr>
    <tr> 
      <td colspan="3"><input name="Email" type="text" id="Email" size="50"></td>
    </tr>
    <tr> 
      <td colspan="3">Choose User Name</td>
    </tr>
    <tr> 
      <td colspan="3"><input type='text' name='Login' size='30' value='<?php echo $Login ?>'> 
      </td>
    </tr>
    <tr> 
      <td colspan="3"> Choose Password </td>
    </tr>
    <tr> 
      <td colspan="3"><input type='password' name='Password' size='30' value='<?php echo $Password ?>'></td>
    </tr>
    <tr> 
      <td colspan="3"><input type='password' name='Password2' size='30' value='<?php echo $Password ?>'> 
      </td>
    </tr>
    <tr> 
      <td>Address </td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="3"><input name="Address" type="text" id="Address" size="50"></td>
    </tr>
    <tr> 
      <td colspan="3"><input name="Address2" type="text" id="Address2" size="50"></td>
    </tr>
    <tr> 
      <td>City</td>
      <td width="67">State</td>
      <td width="122">ZIPCODE</td>
    </tr>
    <tr> 
      <td><input type="text" name="City"> </td>
      <td><select name="State" size="1" id="State">
          <?php echo $IAPPP->makeStateList(226,0); ?> </select></td>
      <td><input name="textfield2" type="Zip" size="20"></td>
    </tr>
    <tr> 
      <td colspan="3">&nbsp; </td>
    </tr>
    <tr> 
      <td colspan="3" align='center'> <input type='submit' value='Create User' class="btn" 
		onmouseover="this.className='btn btnhov'" onmouseout="this.className='btn'"/> 
        &nbsp; <?php echo "<a class= \"Link\" href=\"javascript:popupWin('popup.php?type=user_policy')\">User Policy</a>";?>	
        <input name="Type" type="hidden" value="Host"> <input name="RequestType" type="hidden" value="addUser"> 
      </td>
    </tr>
  </form>
</table>
