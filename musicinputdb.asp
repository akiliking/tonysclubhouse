<%
' FP_ASP ASP Automatically generated by a Frontpage Component. Do not Edit.
On Error Resume Next
Session("FP_OldCodePage") = Session.CodePage
Session("FP_OldLCID") = Session.LCID
Session.CodePage = 1252
Session.LCID = 1033
Err.Clear

strErrorUrl = "input_err.html"

If Request.ServerVariables("REQUEST_METHOD") = "POST" Then
If Request.Form("VTI-GROUP") = "0" Then
	Err.Clear

	Set fp_conn =  Server.CreateObject("ADODB.Connection")
	FP_DumpError strErrorUrl, "Cannot create connection"

	Set fp_rs = Server.CreateObject("ADODB.Recordset")
	FP_DumpError strErrorUrl, "Cannot create record set"

	fp_conn.Open Application("musicinputdb_ConnectionString")
	FP_DumpError strErrorUrl, "Cannot open database"

	fp_rs.Open "Results", fp_conn, 1, 3, 2 ' adOpenKeySet, adLockOptimistic, adCmdTable
	FP_DumpError strErrorUrl, "Cannot open record set"

	fp_rs.AddNew
	FP_DumpError strErrorUrl, "Cannot add new record set to the database"
	Dim arFormFields0(7)
	Dim arFormDBFields0(7)
	Dim arFormValues0(7)

	arFormFields0(0) = "Song"
	arFormDBFields0(0) = "Song"
	arFormValues0(0) = Request("Song")
	arFormFields0(1) = "Format"
	arFormDBFields0(1) = "Format"
	arFormValues0(1) = Request("Format")
	arFormFields0(2) = "Artist"
	arFormDBFields0(2) = "Artist"
	arFormValues0(2) = Request("Artist")
	arFormFields0(3) = "category"
	arFormDBFields0(3) = "category"
	arFormValues0(3) = Request("category")
	arFormFields0(4) = "Albulm"
	arFormDBFields0(4) = "Albulm"
	arFormValues0(4) = Request("Albulm")
	arFormFields0(5) = "Label"
	arFormDBFields0(5) = "Label"
	arFormValues0(5) = Request("Label")
	arFormFields0(6) = "Comments"
	arFormDBFields0(6) = "Comments"
	arFormValues0(6) = Request("Comments")

	FP_SaveFormFields fp_rs, arFormFields0, arFormDBFields0

	If Request.ServerVariables("REMOTE_HOST") <> "" Then
		FP_SaveFieldToDB fp_rs, Request.ServerVariables("REMOTE_HOST"), "Remote_computer_name"
	End If
	If Request.ServerVariables("HTTP_USER_AGENT") <> "" Then
		FP_SaveFieldToDB fp_rs, Request.ServerVariables("HTTP_USER_AGENT"), "Browser_type"
	End If
	FP_SaveFieldToDB fp_rs, Now, "Timestamp"
	If Request.ServerVariables("REMOTE_USER") <> "" Then
		FP_SaveFieldToDB fp_rs, Request.ServerVariables("REMOTE_USER"), "User_name"
	End If

	fp_rs.Update
	FP_DumpError strErrorUrl, "Cannot update the database"

	fp_rs.Close
	fp_conn.Close

	Session("FP_SavedFields")=arFormFields0
	Session("FP_SavedValues")=arFormValues0
	Session.CodePage = Session("FP_OldCodePage")
	Session.LCID = Session("FP_OldLCID")
	Response.Redirect "add_confirm.html"

End If
End If

Session.CodePage = Session("FP_OldCodePage")
Session.LCID = Session("FP_OldLCID")

%>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta http-equiv="Content-Language" content="en-us">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>ClubHouse Music Library</title>
</head>

<body background="recrd.gif" bgcolor="#000000">

<p><font color="#F2E497"><strong><!--webbot bot="PurpleText"
PREVIEW="Use the below entry form to input new music into the music library database.  Please only hit submit once."
-->
</strong></font>
</p>
<hr>
<p align="center"><font color="#F2E497"><strong><font size="6">The Clubhouse
Music Library</font><br>
&nbsp;Entry Form.</strong></font></p>
<!--webbot BOT="GeneratedScript" PREVIEW=" " startspan --><script Language="JavaScript" Type="text/javascript"><!--
function FrontPage_Form1_Validator(theForm)
{

  if (theForm.Artist.value == "")
  {
    alert("Please enter a value for the \"Artist\" field.");
    theForm.Artist.focus();
    return (false);
  }

  if (theForm.Artist.value.length < 1)
  {
    alert("Please enter at least 1 characters in the \"Artist\" field.");
    theForm.Artist.focus();
    return (false);
  }

  if (theForm.Artist.value.length > 256)
  {
    alert("Please enter at most 256 characters in the \"Artist\" field.");
    theForm.Artist.focus();
    return (false);
  }

  if (theForm.category.selectedIndex < 0)
  {
    alert("Please select one of the \"Category\" options.");
    theForm.category.focus();
    return (false);
  }

  if (theForm.category.selectedIndex == 0)
  {
    alert("The first \"Category\" option is not a valid selection.  Please choose one of the other options.");
    theForm.category.focus();
    return (false);
  }
  return (true);
}
//--></script><!--webbot BOT="GeneratedScript" endspan --><form action="musicinputdb.asp" method="POST" name="FrontPage_Form1" webbot-action="--WEBBOT-SELF--" onsubmit="return FrontPage_Form1_Validator(this)" language="JavaScript">
  <!--webbot bot="SaveDatabase" SuggestedExt="asp"
  U-ASP-Include-Url="_fpclass/fpdbform.inc" S-DataConnection="musicinputdb"
  S-RecordSource="Results" U-Database-URL="fpdb/musicinputdb.mdb"
  U-Confirmation-Url="add_confirm.html" U-Validation-Error-Url="input_err.html"
  S-Builtin-Fields="REMOTE_HOST HTTP_USER_AGENT Timestamp REMOTE_USER"
  S-Builtin-DBFields="Remote_computer_name Browser_type Timestamp User_name"
  S-Form-Fields="Song Format Artist category Albulm Label Comments"
  S-Form-DBFields="Song Format Artist category Albulm Label Comments" startspan --><input TYPE="hidden" NAME="VTI-GROUP" VALUE="0"><!--#include file="_fpclass/fpdbform.inc"--><!--webbot bot="SaveDatabase" endspan i-checksum="40548" -->
  <p>&nbsp;</p>
  <table>
    <tr>
      <td><font color="#F2E497"><strong>Artist Name:</strong></font>
      <td><font color="#F2E497"><strong><!--webbot bot="Validation"
        S-Display-Name="Artist" B-Value-Required="TRUE" I-Minimum-Length="1"
        I-Maximum-Length="256" --><input type="text" size="35" maxlength="256" name="Artist">
        </strong></font>
    </tr>
    <tr>
      <td><font color="#F2E497"><strong>Song:</strong></font>
      <td><font color="#F2E497"><strong><input type="text" size="35" maxlength="256" name="Song">
        </strong></font>
    </tr>
    <tr>
      <td><font color="#F2E497"><strong>Label:</strong></font>
      <td><font color="#F2E497"><strong><input type="text" size="35" maxlength="256" name="Label">
        </strong></font>
    </tr>
    <tr>
      <td><font color="#F2E497"><strong>Album:</strong></font>
      <td><font color="#F2E497"><strong><input type="text" size="35" maxlength="256" name="Albulm">
        </strong></font>
    </tr>
    <tr>
      <td><font color="#F2E497"><strong>Format:</strong></font>
      <td><font color="#F2E497"><strong><input type="text" size="35" maxlength="256" name="Format">
        </strong></font>
    </tr>
    <tr>
      <td><font color="#F2E497"><strong>Category:</strong></font>
      <td><font color="#F2E497"><strong><!--webbot bot="Validation"
        S-Display-Name="Category" B-Value-Required="TRUE"
        B-Disallow-First-Item="TRUE" --><select name="category" size="1">
          <option selected>Please Specify</option>
          <option>Deep/Jazzy</option>
          <option>Hard-Core</option>
          <option>Tribal</option>
          <option>Vocal</option>
          <option>Accapella</option>
          <option>Break Beats</option>
          <option>Latin House</option>
          <option>(Other)</option>
        </select>
        </strong></font>
    </tr>
    <tr>
      <td valign="top"><font color="#F2E497"><strong>Notes:</strong></font>
      <td><font color="#F2E497"><strong><textarea name="Comments" rows="5" cols="42"></textarea>
        </strong></font>
    </tr>
    <tr>
      <td valign="top">
      <td>
    </tr>
    <tr>
      <td valign="top">
      <td><font color="#F2E497"><strong><input type="submit" value="Submit" name="Submit"><input type="reset" value="Clear">
        </strong></font>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <dl>
    <dd>&nbsp;</dd>
  </dl>
  <p>&nbsp;</p>
</form>
<hr>
<h5><font color="#F2E497"><strong>Author information goes here.<br>
Copyright � 1999 [OrganizationName]. All rights reserved.<br>
Revised: <!--webbot bot="TimeStamp" S-Type="EDITED" S-Format="%B %d, %Y" startspan -->December 08, 2002<!--webbot bot="TimeStamp" endspan i-checksum="39492" -->
.</strong></font></h5>

</body>

</html>