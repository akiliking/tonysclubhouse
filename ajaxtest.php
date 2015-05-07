<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script src="includes/prototype.js" type="text/javascript"></script>  
<script type="text/javascript">   /* ajax.Request */  function ajaxRequest(url,data) {     var aj = new Ajax.Request(     url, {      method:’get’,      parameters: data,      onComplete: getResponse      }     );   }   /* ajax.Response */  function getResponse(oReq) {     $(’result’).innerHTML = oReq.responseText;   }   </script> 

</head>

<body>
<input type="text" id="myval" size="10">     <input type="button" value="GO" onClick="ajaxRequest('parse.php', 'val='+$F('myval'))">     <div id="result"></div>   
</body>
</html>
