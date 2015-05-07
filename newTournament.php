
      
<?php

include_once "dbobjects/dbutils.php";
  $IAPPP = new dbutils($dbName, $dbLogin, $dbPassword);
  $CurrHostId = $_SESSION['CurrHostId'];

?> 
    			<table class="statstable" height="26" cellSpacing="0" cellPadding="0" width="90%">
						<tr>
							<th align="center">
								New Tournament Setup</th></tr>
					</table>
					
  
<table class="statstable" border='0' cellspacing='0' cellpadding='0' width="90%">
  <form method='post' action='base.php?page=dbinsert.php'>
    <tr> 
      <td colspan="1" align="right">Tournament Name:</td>
      <td colspan="2"> <input name='TName' type='text' id="TName" value="<?php echo $TName ?>" size='30'> 
      </td>
    </tr>
    <tr> 
      <td colspan="1" align="right">Entries: </td>
      <td colspan="2"><input name='Entries' type='text' id="Entries" value="<?php echo $Entries ?>" size='20'> 
      </td>
    </tr>
    <tr>
      <td colspan="1" align="right">Date:</td>
      <td colspan="2"><input title='Date of Tournament' name='Date' type='text' id="Date" size='20'><a href="#null"><img src="images/cal.gif" id="DateBtn" width="16" height="16" border="0"></a></td>
    </tr>
    <tr> 
      <td colspan="1" align="right">Prize Value:</td>
      <td colspan="2"><b>$ </b>
        <input name='Pot' type='text' id="Pot" size='18'></td>
    </tr>
    <tr> 
      <td colspan="1" align="right">Type:</td>
      <td colspan="2"><select name="Type" size="1" id="Type">
          <?php echo $IAPPP->makeTournamentTypeList(); ?> </select></td>
    </tr>
    <tr> 
      <td colspan="1" align="right">City:</td>
      <td colspan="2"><input name='City' type='text' id="City" value="<?php echo $City ?>" size='20'> 
      </td>
    </tr>
    <tr> 
      <td colspan="1" align="right">State:</td>
      <td colspan="2"><select name="State" size="1" id="State">
          <?php echo $IAPPP->makeStateList(226,0); ?> </select></td>
    </tr>
    <tr> 
      <td colspan="3">&nbsp; </td>
    </tr>
    <tr> 
      <td colspan="3" align='center'> <input class="button" type='submit' value='Create Tournament'> 
      </td>
    </tr>
    <input name="HostId" type="hidden" value="<?php echo $CurrHostId;?>">
    <input name="RequestType" type="hidden" value="addTournament">
  </form>
</table>
<script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "Date",      // ID of the input field
      ifFormat    : "%m/%d/%Y",    // the date format
      button      : "DateBtn",    // ID of the button
      showsHelp   : false,
      showsClose  : false
    }
  );
</script>