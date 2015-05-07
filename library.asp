<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>Music LibraryID</title>
</head>


<p align="center"><b><font size="6">CLUBHOUSE ARSENAL </font></b>
<p align="center">&nbsp;</p>
<table width="100%" border="1">
  <thead>
    <tr>
      <td align="center"><b><font color="#F2E497">ID</font></b></td>
      <td align="center"><b><font color="#F2E497">Artist</font></b></td>
      <td align="center"><b><font color="#F2E497">Song</font></b></td>
      <td align="center"><b><font color="#F2E497">Label</font></b></td>
      <td align="center"><b><font color="#F2E497">Albulm</font></b></td>
      <td align="center"><b><font color="#F2E497">Format</font></b></td>
      <td align="center"><b><font color="#F2E497">category</font></b></td>
      <td align="center"><b><font color="#F2E497">Comments</font></b></td>
      <td align="center"><b><font color="#F2E497">Timestamp</font></b></td>
    </tr>
  </thead>
  <tbody>
<%
Set Conn = Server.CreateObject("ADODB.Connection")
Set Rs = Server.CreateObject("ADODB.RecordSet")
Conn.Open "/fpdb/musicinputdb"
sSQL = "SELECT * FROM Results"
Set Rs = Conn.Execute(sSQL)
Do While NOT Rs.EOF
Response.Write(Rs.Fields("Song").value)
Rs.MoveNext
Loop

Rs.Close
Set Rs = Nothing
Conn.Close
Set Conn = Nothing
%>  
  
  
   </tbody>
</table>

</html>

