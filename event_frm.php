<html>
<head>
<title></title>
<link rel="stylesheet" type="text/css" href="http://www.kingplus.com/calender.css">

<style type="text/css">

</style>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>
<body ><div align="center">
<center> <table class="statstable" border="0" width="100%" > 
<tr>
      <td width="100%" height="20%" valign="bottom">
      </td>
    </tr>
    <tr>

      <td width="100%" height="70%" valign="middle"><br>
  
        <!--webbot BOT="GeneratedScript" PREVIEW=" " startspan --><script Language="JavaScript" Type="text/javascript"><!--
function FrontPage_Form1_Validator(theForm)
{

  if (theForm.title.value == "")
  {
    alert("Please enter a value for the \"title\" field.");
    theForm.title.focus();
    return (false);
  }

  if (theForm.title.value.length < 1)
  {
    alert("Please enter at least 1 characters in the \"title\" field.");
    theForm.title.focus();
    return (false);
  }

  if (theForm.location.value == "")
  {
    alert("Please enter a value for the \"location\" field.");
    theForm.location.focus();
    return (false);
  }

  if (theForm.location.value.length < 1)
  {
    alert("Please enter at least 1 characters in the \"location\" field.");
    theForm.location.focus();
    return (false);
  }

  var checkOK = "0123456789-,";
  var checkStr = theForm.day.value;
  var allValid = true;
  var validGroups = true;
  var decPoints = 0;
  var allNum = "";
  for (i = 0;  i < checkStr.length;  i++)
  {
    ch = checkStr.charAt(i);
    for (j = 0;  j < checkOK.length;  j++)
      if (ch == checkOK.charAt(j))
        break;
    if (j == checkOK.length)
    {
      allValid = false;
      break;
    }
    if (ch != ",")
      allNum += ch;
  }
  if (!allValid)
  {
    alert("Please enter only digit characters in the \"day\" field.");
    theForm.day.focus();
    return (false);
  }

  var chkVal = allNum;
  var prsVal = parseInt(allNum);
  if (chkVal != "" && !(prsVal <= "31"))
  {
    alert("Please enter a value less than or equal to \"31\" in the \"day\" field.");
    theForm.day.focus();
    return (false);
  }

  var checkOK = "0123456789-";
  var checkStr = theForm.year.value;
  var allValid = true;
  var validGroups = true;
  var decPoints = 0;
  var allNum = "";
  for (i = 0;  i < checkStr.length;  i++)
  {
    ch = checkStr.charAt(i);
    for (j = 0;  j < checkOK.length;  j++)
      if (ch == checkOK.charAt(j))
        break;
    if (j == checkOK.length)
    {
      allValid = false;
      break;
    }
    allNum += ch;
  }
  if (!allValid)
  {
    alert("Please enter only digit characters in the \"year\" field.");
    theForm.year.focus();
    return (false);
  }

  if (theForm.start_time.value == "")
  {
    alert("Please enter a value for the \"start_time\" field.");
    theForm.start_time.focus();
    return (false);
  }

  if (theForm.start_time.value.length > 2)
  {
    alert("Please enter at most 2 characters in the \"start_time\" field.");
    theForm.start_time.focus();
    return (false);
  }

  var checkOK = "0123456789-";
  var checkStr = theForm.start_time.value;
  var allValid = true;
  var validGroups = true;
  var decPoints = 0;
  var allNum = "";
  for (i = 0;  i < checkStr.length;  i++)
  {
    ch = checkStr.charAt(i);
    for (j = 0;  j < checkOK.length;  j++)
      if (ch == checkOK.charAt(j))
        break;
    if (j == checkOK.length)
    {
      allValid = false;
      break;
    }
    allNum += ch;
  }
  if (!allValid)
  {
    alert("Please enter only digit characters in the \"start_time\" field.");
    theForm.start_time.focus();
    return (false);
  }

  if (theForm.start_time1.value == "")
  {
    alert("Please enter a value for the \"start_time1\" field.");
    theForm.start_time1.focus();
    return (false);
  }

  if (theForm.start_time1.value.length > 2)
  {
    alert("Please enter at most 2 characters in the \"start_time1\" field.");
    theForm.start_time1.focus();
    return (false);
  }

  var checkOK = "0123456789-";
  var checkStr = theForm.start_time1.value;
  var allValid = true;
  var validGroups = true;
  var decPoints = 0;
  var allNum = "";
  for (i = 0;  i < checkStr.length;  i++)
  {
    ch = checkStr.charAt(i);
    for (j = 0;  j < checkOK.length;  j++)
      if (ch == checkOK.charAt(j))
        break;
    if (j == checkOK.length)
    {
      allValid = false;
      break;
    }
    allNum += ch;
  }
  if (!allValid)
  {
    alert("Please enter only digit characters in the \"start_time1\" field.");
    theForm.start_time1.focus();
    return (false);
  }

  var checkOK = "0123456789-,";
  var checkStr = theForm.end_day.value;
  var allValid = true;
  var validGroups = true;
  var decPoints = 0;
  var allNum = "";
  for (i = 0;  i < checkStr.length;  i++)
  {
    ch = checkStr.charAt(i);
    for (j = 0;  j < checkOK.length;  j++)
      if (ch == checkOK.charAt(j))
        break;
    if (j == checkOK.length)
    {
      allValid = false;
      break;
    }
    if (ch != ",")
      allNum += ch;
  }
  if (!allValid)
  {
    alert("Please enter only digit characters in the \"end_day\" field.");
    theForm.end_day.focus();
    return (false);
  }

  var chkVal = allNum;
  var prsVal = parseInt(allNum);
  if (chkVal != "" && !(prsVal <= "31"))
  {
    alert("Please enter a value less than or equal to \"31\" in the \"end_day\" field.");
    theForm.end_day.focus();
    return (false);
  }

  var checkOK = "0123456789-";
  var checkStr = theForm.end_year.value;
  var allValid = true;
  var validGroups = true;
  var decPoints = 0;
  var allNum = "";
  for (i = 0;  i < checkStr.length;  i++)
  {
    ch = checkStr.charAt(i);
    for (j = 0;  j < checkOK.length;  j++)
      if (ch == checkOK.charAt(j))
        break;
    if (j == checkOK.length)
    {
      allValid = false;
      break;
    }
    allNum += ch;
  }
  if (!allValid)
  {
    alert("Please enter only digit characters in the \"end_year\" field.");
    theForm.end_year.focus();
    return (false);
  }

  if (theForm.end_time.value == "")
  {
    alert("Please enter a value for the \"end_time\" field.");
    theForm.end_time.focus();
    return (false);
  }

  if (theForm.end_time.value.length > 2)
  {
    alert("Please enter at most 2 characters in the \"end_time\" field.");
    theForm.end_time.focus();
    return (false);
  }

  var checkOK = "0123456789-";
  var checkStr = theForm.end_time.value;
  var allValid = true;
  var validGroups = true;
  var decPoints = 0;
  var allNum = "";
  for (i = 0;  i < checkStr.length;  i++)
  {
    ch = checkStr.charAt(i);
    for (j = 0;  j < checkOK.length;  j++)
      if (ch == checkOK.charAt(j))
        break;
    if (j == checkOK.length)
    {
      allValid = false;
      break;
    }
    allNum += ch;
  }
  if (!allValid)
  {
    alert("Please enter only digit characters in the \"end_time\" field.");
    theForm.end_time.focus();
    return (false);
  }

  if (theForm.end_time1.value == "")
  {
    alert("Please enter a value for the \"end_time1\" field.");
    theForm.end_time1.focus();
    return (false);
  }

  if (theForm.end_time1.value.length > 2)
  {
    alert("Please enter at most 2 characters in the \"end_time1\" field.");
    theForm.end_time1.focus();
    return (false);
  }

  var checkOK = "0123456789-";
  var checkStr = theForm.end_time1.value;
  var allValid = true;
  var validGroups = true;
  var decPoints = 0;
  var allNum = "";
  for (i = 0;  i < checkStr.length;  i++)
  {
    ch = checkStr.charAt(i);
    for (j = 0;  j < checkOK.length;  j++)
      if (ch == checkOK.charAt(j))
        break;
    if (j == checkOK.length)
    {
      allValid = false;
      break;
    }
    allNum += ch;
  }
  if (!allValid)
  {
    alert("Please enter only digit characters in the \"end_time1\" field.");
    theForm.end_time1.focus();
    return (false);
  }
  return (true);
}
//--></script><!--webbot BOT="GeneratedScript" endspan -->    <?php
	echo"<form method=\"POST\" action=\"event_db.php\" onsubmit=\"return FrontPage_Form1_Validator(this)\" language=\"JavaScript\" name=\"FrontPage_Form1\">
  <div align=\"center\">
    <center>    
    <table >
      <tr>
        <td align=\"justify\" width=\"417\" valign=\"top\" colspan=\"4\">
          <p align=\"center\"><span style=\"text-transform: uppercase; letter-spacing: 1pt\">Enter
          event information</span></td>
      </tr>
      <tr>
        <td align=\"justify\" valign=\"top\">Event
          Title:&nbsp;</td>
        <td align=\"justify\" colspan=\"3\" width=\"353\"><!--webbot
          bot=\"Validation\" B-Value-Required=\"TRUE\" I-Minimum-Length=\"1\" --><input type=\"text\" name=\"title\" size=\"52\" tabindex=\"1\" style=\"background-color: #FFFFCC; color: #333333\" value=\"\"></font></td>
      </tr>
      <tr>
        <td  align=\"justify\" width=\"64\" valign=\"top\">Description:</td>
        <td  align=\"justify\" colspan=\"3\" width=\"353\"><textarea rows=\"3\" name=\"detail\" cols=\"44\" tabindex=\"2\"></textarea></td>
      </tr>
      <tr>
        <td  align=\"justify\" valign=\"top\">Location:</td>
        <td  align=\"justify\" valign=\"middle\" colspan=\"3\"><!--webbot
          bot=\"Validation\" B-Value-Required=\"TRUE\" I-Minimum-Length=\"1\" --><input type=\"text\" name=\"location\" size=\"52\" tabindex=\"3\" style=\"background-color: #FFFFCC; color: #333333\" value=\"\"></font></td>
      </tr>
	  <tr> 
      <td colspan='1'><b>&nbsp;DOB: </b></td>
      <td colspan='2'><input title='Date of Birth' name='DOB' type='text' id='DOB' size='20' value='$dob'><a href='#null'><img src='images/cal.gif' id='DateBtn' width='16' height='16' border='0' title='Calendar'></a></td>
    </tr>

      <tr>
        <td  align=\"justify\" valign=\"top\">Start:</td>
        <td  align=\"justify\" valign=\"middle\"><select size=\"1\" name=\"month\" tabindex=\"4\">
        ";
    				$mnths= array("Please Specify","January","February","March","April","May","June","July","August","September","October","November","December");
    				$mnthval = array("00","01","02","03","04","05","06","07","08","09","10","11","12");
					while (list($key,$value) = each($mnths)){
					if  ($month  == $key)
						{echo "<option  value=\"$mnthval[$key]\" selected>$value</option>";}
					else
						{echo "<option value=\"$mnthval[$key]\">$value</option>";}
					}
					    
            /*<option value=\"00\"></option>
            <option value=\"01\">January</option>
            <option value=\"02\">February</option>
            <option value=\"03\">March</option>
            <option value=\"04\">April</option>
            <option value=\"05\">May</option>
            <option value=\"06\">June</option>
            <option value=\"07\">July</option>
            <option value=\"08\">August</option>
            <option value=\"09\">September</option>
            <option value=\"10\">October</option>
            <option value=\"11\">November</option>
            <option value=\"12\">December</option>*/
          echo"</select><!--webbot bot=\"Validation\" S-Display-Name=\"day\"
          S-Data-Type=\"Integer\" S-Number-Separators=\",\"
          S-Validation-Constraint=\"Less than or equal to\"
          S-Validation-Value=\"31\" --><input type=\"text\" name=\"day\" size=\"2\" tabindex=\"5\" value=\"$day\"><!--webbot
          bot=\"Validation\" S-Data-Type=\"Integer\" S-Number-Separators=\"x\" --><input type=\"text\" name=\"year\" size=\"9\" value=\"$year\" tabindex=\"6\"></font></td>
        <td  align=\"justify\"><font >Time</font></td>
        <td  align=\"justify\"><font color=\"#CCCC00\"><!--webbot
          bot=\"Validation\" S-Data-Type=\"Integer\" S-Number-Separators=\"x\"
          B-Value-Required=\"TRUE\" I-Maximum-Length=\"2\" --><input type=\"text\" name=\"start_time\" size=\"2\" maxlength=\"2\" value=\"12\" tabindex=\"7\"></font><b><font color=\"#000000\">:</font></b><font color=\"#CCCC00\"><!--webbot
          bot=\"Validation\" S-Data-Type=\"Integer\" S-Number-Separators=\"x\"
          B-Value-Required=\"TRUE\" I-Maximum-Length=\"2\" --><input type=\"text\" name=\"start_time1\" size=\"3\" maxlength=\"2\" value=\"00\" tabindex=\"7\"><select size=\"1\" name=\"AMPM\" tabindex=\"8\">
                        <option value=\"PM\">PM</option>
                        <option value=\"AM\">AM</option>
                      </select></font></td>
      </tr>
      <tr>
        <td  align=\"justify\" valign=\"top\">End:</td>
        <td  align=\"justify\" valign=\"middle\"><select size=\"1\" name=\"end_month\" tabindex=\"9\">
            
            <option value=\"00\"></option>
            <option value=\"01\">January</option>
            <option value=\"02\">February</option>
            <option value=\"03\">March</option>
            <option value=\"04\">April</option>
            <option value=\"05\">May</option>
            <option value=\"06\">June</option>
            <option value=\"07\">July</option>
            <option value=\"08\">August</option>
            <option value=\"09\">September</option>
            <option value=\"10\">October</option>
            <option value=\"11\">November</option>
            <option value=\"12\">December</option>
          </select><!--webbot bot=\"Validation\" S-Display-Name=\"end_day\"
          S-Data-Type=\"Integer\" S-Number-Separators=\",\"
          S-Validation-Constraint=\"Less than or equal to\"
          S-Validation-Value=\"31\" --><input type=\"text\" name=\"end_day\" size=\"2\" tabindex=\"10\" value=\"\"><!--webbot
          bot=\"Validation\" S-Data-Type=\"Integer\" S-Number-Separators=\"x\" --><input type=\"text\" name=\"end_year\" size=\"9\" value=\"\" tabindex=\"11\"></font></td>
        <td  align=\"justify\">Time</td>
        <td  align=\"justify\"><!--webbot
          bot=\"Validation\" S-Data-Type=\"Integer\" S-Number-Separators=\"x\"
          B-Value-Required=\"TRUE\" I-Maximum-Length=\"2\" --><input type=\"text\" name=\"end_time\" size=\"2\" maxlength=\"2\" value=\"12\" tabindex=\"12\"></font><b><font color=\"#000000\">:</font></b><font color=\"#CCCC00\"><!--webbot
          bot=\"Validation\" S-Data-Type=\"Integer\" S-Number-Separators=\"x\"
          B-Value-Required=\"TRUE\" I-Maximum-Length=\"2\" --><input type=\"text\" name=\"end_time1\" size=\"3\" maxlength=\"2\" value=\"00\" tabindex=\"12\"><select size=\"1\" name=\"End_AMPM\" tabindex=\"13\">
                        <option value=\"PM\">PM</option>
                        <option value=\"AM\">AM</option>
                      </select></font></td>
      </tr>
      <tr>
        <td  align=\"justify\" width=\"64\" valign=\"top\">&nbsp;</td>
        <td  align=\"justify\" colspan=\"3\" width=\"353\" >&nbsp;</td>
      </tr>
      <tr>
        <td colspan=\"4\" align=\"center\" width=\"427\" valign=\"top\">
        <input type=\"hidden\" value=\"1\" name=\"action\"><input type=\"submit\" value=\"Save\" name=\"save\">
        <input type=\"hidden\" value=\"\" name=\"id\"><input type=\"reset\" value=\"Reset\" name=\"B2\"></td>
      </tr>
    </table>
    </center>
  </div>
 
</form>
    </tr>
  </table>";
  ?>
  </center>
</div>

</body>

</html>

