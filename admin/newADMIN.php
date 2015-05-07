

<center>

<?php
include_once "dbobjects/dbutils.php";
  $IAPPP = new dbutils($dbName, $dbLogin, $dbPassword);

?> 

  <form method='post' action='../base.php?page=dbinsert.php'>
  <table class="playertatstable" cellSpacing="0" cellPadding="0" width="90%">
    <tr> 
      <th colspan="3" align="center">Create Admin User</th>
    </tr>
    <tr> 
      <td width="50%" colspan="1" align="right">First Name:</td>
      <td width="50%" colspan="2"><input type='text' name='FName' size='15' value='<?php echo $FName ?>'></td>
    </tr>
    <tr> 
      <td align="right" colspan="1">Last Name:</td>
      <td colspan="2"><input type='text' name='LName' size='15' value='<?php echo $LName ?>'></td>
    </tr>
    <tr> 
      <td align="right" colspan="1">Email Address:</td>
      <td colspan="2"><input name="Email" type="text" id="Email" size="25"></td>
    </tr>
    <tr> 
      <td align="right" colspan="1">Choose User Name:</td>
      <td colspan="2"><input title='Login Id to IAPPP website' type='text' name='Login' size='15' value='<?php echo $Login ?>'></td>
    </tr>
    <tr> 
      <td align="right" colspan="1">Choose Password:</td>
      <td colspan="2"><input type='password' name='Password' size='15' value='<?php echo $Password ?>'></td>
    </tr>
    <tr> 
      <td align="right" colspan="1">Type Password Again:</td>
      <td colspan="2"><input type='password' name='Password2' size='15' value='<?php echo $Password ?>'> 
      </td>
    </tr>
    <tr> 
      <td colspan="3" align='center'> <input class='button' type='submit' value='Create User'> 
        &nbsp; <input name="Type" type="hidden" value="ADMIN"> <input name="RequestType" type="hidden" value="addUser"> 
      </td>
    </tr>
  </table>
 </form>
