<html>
<head>
  <title>New Ranking</title>
  <LINK href="css/stylesheet.css" type="text/css" rel="stylesheet">
</head>
<body bgcolor="white">

<center>

<?php

include "navbar.php";
include "dbobjects/webdata.php";
//include 'dbobjects/dbcfg.php';
//$dbName                       = "kingplus_kingplusdb"; // $_GET["db"];
//$dbLogin                      = "kingplus_sa"; // $_GET["login"];
//$dbPassword                   = "sa"; // $_GET["password"];


?> 
<br/>
<p>
<TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
  <TBODY>
  <TR vAlign=top>
    <TD style="PADDING-RIGHT: 20px; PADDING-LEFT: 20px" width="100%"><!-- ============ Home Page Message Starts ================= -->
      <H1>Welcome to IAPPP.com </H1>
      <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
        <TBODY>
        <TR vAlign=top>
          <TD width="100%">
            <P>Welcome to the International Association of Professional Poker 
            Players, the official sanctioning body of the world's 
            fastest-growing game. Inside you will find tons of information and 
            entertainment. Become an official IAPPP member and you will be able 
            to keep up with poker's latest news, track upcoming tournaments and, 
            best of all, see where you rank against neighborhood buddies or the 
            best players in the world.</P>
            <P>&nbsp;</P></TD>
          <TD><IMG height=201 alt="Join The IAPPP Today" 
            src="images/pic.jpg" width=150></TD></TR></TBODY></TABLE><!-- ============= Home Page Message Ends ================== -->
      <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
        <TBODY>
        <TR>
          <TD style="PADDING-RIGHT: 20px" width="50%">
		  <!-- ================== News Start ========================= -->
            <DIV class=sectionHeader bgcolor='silver'>News</DIV><BR>
			<?php  
                  
  $NEWS = new GETWEBDATA();

  $NEWS->GetNewsSummaries(0,10); ?>
		<!-- =================== News End ========================== --></TD>
          <TD width=1 bgColor=#cccccc><IMG height=1 
            src="IAPPP_files/spacer.gif" width=1> </TD>
          <TD style="PADDING-LEFT: 20px" width="50%"><!-- ================== Events Start ======================= -->
            <DIV class=sectionHeader>Events</DIV><BR>
            <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
              <TBODY>
              <TR>
                <TD vAlign=top align=left>
                  <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
                    <TBODY>
                    <TR>
                      <TD class=eventHeadlineTD><A class=eventHeadline 
                        href="http://www.iappp.com/index.php?src=events&amp;srctype=profile&amp;id=30">2005 
                        Penchanga Open</A> </TD></TR>
                    <TR>
                      <TD class=eventDetail><B>Date:</B>&nbsp;February 9, 
                        2005<BR></TD></TR>
                    <TR>
                      <TD 
                    class=eventDetail>2/9/2005-2/13/2005<BR></TD></TR></TBODY></TABLE></TD></TR>
              <TR>
                <TD>&nbsp;</TD></TR>
              <TR>
                <TD vAlign=top align=left>
                  <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
                    <TBODY>
                    <TR>
                      <TD class=eventHeadlineTD><A class=eventHeadline 
                        href="http://www.iappp.com/index.php?src=events&amp;srctype=profile&amp;id=31">2005 
                        Southern California Poker Tour II</A> </TD></TR>
                    <TR>
                      <TD class=eventDetail><B>Date:</B>&nbsp;February 12, 
                        2005<BR></TD></TR></TBODY></TABLE></TD></TR>
              <TR>
                <TD>&nbsp;</TD></TR>
              <TR>
                <TD vAlign=top align=left>
                  <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
                    <TBODY>
                    <TR>
                      <TD class=eventHeadlineTD><A class=eventHeadline 
                        href="http://www.iappp.com/index.php?src=events&amp;srctype=profile&amp;id=15">L.A. 
                        Poker Classic</A> </TD></TR>
                    <TR>
                      <TD class=eventDetail><B>Date:</B>&nbsp;February 19, 
                        2005<BR></TD></TR>
                    <TR>
                      <TD 
                    class=eventDetail>2/19/2005-2/22/2005<BR></TD></TR></TBODY></TABLE></TD></TR>
              <TR>
                <TD>&nbsp;</TD></TR></TBODY></TABLE>
            <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
              <TBODY>
              <TR>
                <TD><A class=eventMoreLink 
                  href="http://www.iappp.com/index.php?src=events">More 
                  Events&gt;&gt;</A></TD></TR></TBODY></TABLE><!-- ================== Events End ========================= --></TD></TR></TBODY></TABLE></TD>
    <TD width=1 bgColor=#cccccc><IMG height=1 src="IAPPP_files/spacer.gif" 
      width=1> </TD>
    <TD style="PADDING-LEFT: 20px" width=180>
<BR>
      <DIV align=center><BR><BR></DIV><BR><IMG height=1 
      src="IAPPP_files/spacer.gif" width=180></TD></TR></TBODY></TABLE><!-- ============== Middle Section Ends  =================== -->
      
