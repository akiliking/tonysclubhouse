<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>THE CLUBHOUSE</title>
<base target="main">
<SCRIPT LANGUAGE="JavaScript" SRC="http://www.live365.com/scripts/listen.js"></SCRIPT>

<!--mstheme--><link rel="stylesheet" type="text/css" href="_themes/clubhouse/club1110.css"><meta name="Microsoft Theme" content="clubhouse 1110">
</head>

<body topmargin="0">

<table border="0" width="100%" cellspacing="0" cellpadding="0">
  <tr>
    <td width="60%">
      <p align="center">
      <applet code="fprotate.class" codebase="./" width="648" height="86">
        <param name="rotatoreffect" value="dissolve">
        <param name="time" value="5">
        <param name="image1" valuetype="ref" value="images/clubhouse_logo2.jpg">
        <param name="image2" valuetype="ref" value="images/clubhouse_logo3.jpg">
        <param name="image3" valuetype="ref" value="images/clubhouse_logo4.jpg">
      </applet>
    </td>
    <td width="20%" valign="top" align="center">
  
    <font size="1" color="#C9CBB6">
  
    <%
			Dim FormatDate
			Dim WKDay
			Dim CurTime
			FormatDate= Now()
			Response.Write FormatDateTime(FormatDate, vbLongDate)
			WKDay = WeekDayName(WeekDay(FormatDate)) 
			CurTime = Time() 
			If WKDay = "Monday" and CurTime < "10:29:00 PM" Then
				 
					%> <p><b>On The Air Now</b><BR>
	
   	 				</font>

    				<a href="http://www.wnyu.org/wnyu.ram" target="_blank">
  
   					<font size="1" color="#F2E497">
  
    				<b>The Candy Store Live</b>

    				</font>

   					</a></p>
  
    				<font size="1" color="#C9CBB6">
  
					<%
			Else 
			%>
				<p><blink><strong>On The Air Now</strong></blink><BR> 

    			</font>

                    <a HREF="javascript:LaunchBroadcast(&quot;akiliking&quot;)" target="_self"><strong>
  
    			<font size="1" color="#F2E497">THE CLUBHOUSE LIVE</font>

 				</strong></a></p>
  
   				<font size="1" color="#C9CBB6">
  
				<%
			End If
			%>

    </font>

</td>
  </tr>
</table>

</body>

</html>
