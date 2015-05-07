

<center>

<?php
include_once "dbobjects/dbutils.php";
  $IAPPP = new dbutils($dbName, $dbLogin, $dbPassword);

?> 

  <form method='post' action='base.php?page=dbinsert.php'>
  <table class="playertatstable" cellSpacing="0" cellPadding="0" width="90%">
    <tr> 
      <th colspan="3" align="center">Host Setup&nbsp;</th>
    </tr>
    <tr>
      <td align="right" colspan="1">Host Name:</td>
      <td colspan="2"><input name="Alias" type="text" id="Alias" size="25"></td>
    </tr>
    <tr> 
      <td align="right" colspan="1">Contact First Name:</td>
      <td colspan="2"><input type='text' name='FName' size='15' value='<?php echo $FName ?>'></td>
    </tr>
    <tr> 
      <td align="right" colspan="1">Contact Last Name:</td>
      <td colspan="2"><input type='text' name='LName' size='15' value='<?php echo $LName ?>'></td>
    </tr>
    <tr> 
      <td align="right" colspan="1">Contact Email Address:</td>
      <td colspan="2"><input name="Email" type="text" id="Email" size="25"></td>
    </tr>
    <tr> </tr>
    <tr> 
      <td align="right" colspan="1">Choose User Name:</td>
      <td colspan="2"><input type='text' name='Login' size='15' value='<?php echo $Login ?>'></td>
    </tr>
    <tr> </tr>
    <tr> 
      <td align="right" colspan="1">Choose Password:</td>
      <td colspan="2"><input type='password' name='Password' size='15' value='<?php echo $Password ?>'></td>
    </tr>
    <tr> </tr>
    <tr> 
      <td align="right" colspan="1">Type Password Again:</td>
      <td colspan="2"><input type='password' name='Password2' size='15' value='<?php echo $Password ?>'> 
      </td>
    </tr>
    <tr> 
      <td align="right" colspan="1">Address:</td>
      <td colspan="2"><input name="Address" type="text" id="Address" size="25"></td>
    </tr>
    <tr> 
      <td align="right" colspan="1">Address 2:</td>
      <td colspan="2"><input name="Address2" type="text" id="Address2" size="25"></td>
    </tr>
    <tr> </tr>
    <tr> 
      <td align="right" colspan="1">City:</td>
      <td colspan="2"><input type="text" id="City" name="City"> </td>
    </tr>
    <tr> 
      <td align="right" colspan="1">State:</td>
      <td colspan="2"><select name="State" size="1" id="State">
          <?php echo $IAPPP->makeStateList(226,0); ?> </select></td>
    </tr>
    <tr> 
      <td align="right" colspan="1">Zip:</td>
      <td colspan="2"><input name="Zip" id="Zip" type="text" size="10"></td>
    </tr>
    <tr> 
      <td colspan="3">&nbsp; </td>
    </tr>
    <tr> 
      <td colspan="3" align='center'> <input class='button' type='submit' value='Create Host Account'> 
        &nbsp; <?php echo "<a class= \"Link\" href=\"javascript:popupWin('popup.php?type=host_policy')\">Host Policy</a>";?>	
        <input name="Type" type="hidden" value="Host"> <input name="RequestType" type="hidden" value="addUser"> 
      </td>
    </tr>
  </table>
 </form>
