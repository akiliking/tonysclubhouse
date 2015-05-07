<title>IAPPP</title>
<script language="JavaScript">
<!--

function SymError()
{
  return true;
}

window.onerror = SymError;

//-->
</script>

<script language="JavaScript" type="text/JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_showHideLayers() { //v6.0
  var i,p,v,obj,args=MM_showHideLayers.arguments;
  for (i=0; i<(args.length-2); i+=3) if ((obj=MM_findObj(args[i]))!=null) { v=args[i+2];
    if (obj.style) { obj=obj.style; v=(v=='show')?'visible':(v=='hide')?'hidden':v; }
    obj.visibility=v; }
}
//-->
</script>



<div align="center">
  <table border="0">
    <tr>
      <td width="100%" align="center" valign="top">
      		<a href='newUSER.php' onMouseOut="MM_showHideLayers('Layer1','','hide')" onMouseOver="MM_showHideLayers('Layer1','','show')">
            New User</a> &nbsp;|&nbsp; <a href='newTournament.php' onMouseOut="MM_showHideLayers('Layer2','','hide')" onMouseOver="MM_showHideLayers('Layer2','','show')">New 
Tournament</a> &nbsp;|&nbsp; <a href='newscore.php' onMouseOut="MM_showHideLayers('Layer3','','hide')" onMouseOver="MM_showHideLayers('Layer3','','show')">Enter new ranking</a> &nbsp;|&nbsp; 
<a href='verified_ranking.php?db=omar_test&login=admin&password=admin' onMouseOut="MM_showHideLayers('Layer4','','hide')" onMouseOver="MM_showHideLayers('Layer4','','show')">Verified 
rankings</a> &nbsp;|&nbsp; <a href='unverified_ranking.php?db=omar_test&login=admin&password=admin' onMouseOut="MM_showHideLayers('Layer5','','hide')" onMouseOver="MM_showHideLayers('Layer5','','show')">Un-Verified 
rankings</a> 
			<div id="Layer1" style="position:absolute; left:275px; top:80px; width:600px; height:310px; z-index:1; visibility: hidden;">
				<table class="box" width="100%" height = "100%" border="0" cellspacing="7" cellpadding="7" >
				<tr><td align="center" colspan="2" class = "title"><b>Add New User</b></td></tr>
				</table>
            </div>
			<div id="Layer2" style="position:absolute; left:275px; top:80px; width:600px; height:310px; z-index:1; visibility: hidden;">
				<table class="box" width="100%" height = "100%" border="0" cellspacing="7" cellpadding="7">
				<tr><td align="center" colspan="2" class = "title"><b>Add New Tournament</b></td></tr>
				</table>
            </div>
			<div id="Layer3" style="position:absolute; left:275px; top:80px; width:600px; height:310px; z-index:1; visibility: hidden;">
				<table class="box" width="100%" height = "100%" border="0" cellspacing="7" cellpadding="7">
				<tr><td align="center" colspan="2" class = "title"><b>Enter New Ranking</b></td></tr>
				</table>
            </div>
			<div id="Layer4" style="position:absolute; left:275px; top:80px; width:600px; height:310px; z-index:1; visibility: hidden;">
				<table class="box" width="100%" height = "100%" border="0" cellspacing="7" cellpadding="7">
				<tr><td align="center" colspan="2" class = "title"><b>Show Verified Ranking</b></td></tr>
				</table>
            </div>
			<div id="Layer5" style="position:absolute; left:275px; top:80px; width:600px; height:310px; z-index:1; visibility: hidden;">
				<table class="box" width="100%" height = "100%" border="0" cellspacing="7" cellpadding="7">
				<tr><td align="center" colspan="2" class = "title"><b>Show Unverified Ranking</b></td></tr>
				</table>
            </div>
	  </td>
    </tr>
	</table>
	</div>
