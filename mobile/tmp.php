<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>My App Catalog</title>
	<meta name="viewport" content="minimum-scale=1.0, width=device-width, maximum-scale=1.6, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="palm pre, pre, app catalog, pre apps, super hangman, cool tip calculator, guitarist's reference, card messages, words of wisdom" />
	<meta name="description" content="High quality games/apps for Palm Pre phone. Check out Super Hangman, Cool Tip Calculator, Guitarist's Reference, Card Messages and Words Of Wisdom" />
    <link rel="stylesheet" type="text/css" href="style.css" />
	 <script type="text/javascript">
		var ajax_text_updating="Sending...";var ajax_text_loading="Loading...";var ajax_text_loading_picture="Loading Images...";var ajax_text_please_wait="Please wait...";var original_value=1;var re_num=2;function WriteRecipientLoop(){var myloop="";for(i=1;i<=re_num;i++){var list_friend_name="";var list_friend_email="";myloop+="<div class=\"Error_Message\" style=\"padding:5px;display:none\" id=\"show_error_message_"+i+"\"></div>Recipient Name "+i+"<br><input id=\"list_friend_name_"+i+"\" name=\"list_friend_name_"+i+"\" value=\"\" type=\"text\" style=\"width:97%\" onkeydown=\"showid2('show_error_message_"+i+"','none')\" /><div style=\"line-height:4px\">&nbsp;</div>Recipient Email "+i+"<br><input id=\"list_friend_email_"+i+"\" name=\"list_friend_email_"+i+"\" value=\"\" type=\"text\" onblur=\"if(!valid_email(this.value)){this.value='';ShowDivInvalidEmail('"+i+"');}\" style=\"width:97%\" onkeydown=\"showid2('show_error_message_"+i+"','none')\" /><div style=\"line-height:6px\">&nbsp;</div><hr class=\"HR_Color\" /><div style=\"line-height:6px\">&nbsp;</div>";}document.getElementById("show_recipient_loop").innerHTML=myloop;}function SendToFriends(){var sender_name=document.getElementById("sender_name").value;var sender_email=document.getElementById("sender_email").value;if(sender_name==""){alert("You must enter sender name");document.getElementById("sender_name").focus();return false;}else if(!valid_email(sender_email)){alert("You must enter a valid sender email address");document.getElementById("sender_email").focus();return false;}else{var check_recipient_info=false;var data="";var list_friend_name="";var list_friend_email="";for(i=1;i<=re_num;i++){list_friend_name=document.getElementById("list_friend_name_"+i).value;list_friend_email=document.getElementById("list_friend_email_"+i).value;if(list_friend_name!=""&&list_friend_email!=""){check_recipient_info=true;list_friend_name=list_friend_name.replace(";",",");data+=list_friend_name+";"+list_friend_email+"\n";}if(list_friend_name!=""&&list_friend_email==""||list_friend_name==""&&list_friend_email!=""){check_recipient_info=false;data="1";document.getElementById("show_error_message_"+i).innerHTML="Missing recipient name or recipient email. Please check your input";showid2("show_error_message_"+i,"block");document.getElementById("list_friend_name_"+i).focus();}}if(check_recipient_info==false){if(data==""){document.getElementById("show_error_message_1").innerHTML="You must enter recipient information";showid2("show_error_message_1","block");document.getElementById("list_friend_name_1").focus();return false;}}else{window.scrollTo(0,1);Editme("tell_your_friends.php?sender_name="+sender_name+"&sender_email="+sender_email+"&list_email=",data,"1","1","temp","sending email");setTimeout("alert('Thank you! Email has been sent to your friends');",1000);return false;}}return false;}function ShowDivInvalidEmail(id){if(id=="show_error_message_sender_info"){showid2(id,'block');if(document.getElementById(id))document.getElementById(id).innerHTML="You must enter a valid email address";}else{showid2('show_error_message_'+id,'block');if(document.getElementById('show_error_message_'+id))document.getElementById('show_error_message_'+id).innerHTML="You must enter a valid email address";}}function ShowIt(data){showid2("div_features","none");showid2("div_tellafriend","none");showid2("div_contactus","none");showid2("div_buy_now","none");showid2(data,"block");}function SendContactUs(){var contact_sender_name=document.getElementById("contact_sender_name").value;var contact_sender_email=document.getElementById("contact_sender_email").value;var contact_email_subject=document.getElementById("contact_email_subject").value;var contact_messages=document.getElementById("contact_messages").value;if(contact_sender_name==""){alert("You must enter sender name");document.getElementById("contact_sender_name").focus();return false;}else if(!valid_email(contact_sender_email)){alert("You must enter a valid sender email address");document.getElementById("contact_sender_email").focus();return false;}else if(contact_email_subject==""){alert("You must enter email subject");document.getElementById("contact_email_subject").focus();return false;}else if(contact_messages==""){alert("You must enter email messages");document.getElementById("contact_messages").focus();return false;}else{window.scrollTo(0,1);Editme("contact_us.php?contact_sender_name="+contact_sender_name+"&contact_sender_email="+contact_sender_email+"&contact_email_subject="+contact_email_subject+"&contact_messages=",contact_messages,"1","1","temp","Sending email");setTimeout("alert('Thank you! Email has been sent to site admin');",1000);return false;}return false;}var x=1;function ScreenShots(num,mode){if(mode!=1){x=x+num;}else{x=num;}if(x<=0)x=circle_numer;if(x>circle_numer)x=1;document.getElementById("span_num").innerHTML=x+"/"+circle_numer;document.getElementById("page_info").innerHTML="Page "+x+"/"+circle_numer;document.getElementById("img_thumb").src="../screenshots/"+app_name+"/"+x+".jpg";for(var i in array_data){if(i==x){var data=array_data[i];document.getElementById("div_text").innerHTML=data;break;}}if(x==1){document.getElementById("btimg_prv").className="btimg_inactive";document.getElementById("btimg_next").className="btimg_active";}else if(x>1&&x<circle_numer){document.getElementById("btimg_prv").className="btimg_active";document.getElementById("btimg_next").className="btimg_active";}else if(x==circle_numer){document.getElementById("btimg_next").className="btimg_inactive";document.getElementById("btimg_prv").className="btimg_active";}showid2("div_jump","none");}function JumpTo(data){ScreenShots(data,1);}function showid(data){var objBranch=document.getElementById(data);if(objBranch){if(objBranch.style.display=="block"){objBranch.style.display="none";}else{objBranch.style.display="block";}}}function showid2(data,key){var objBranch=document.getElementById(data);if(objBranch)objBranch.style.display=key;}function showdiv(id){showid2("div_features","none");showid2("div_screenshots","none");showid2("div_tellafriend","none");showid2("div_contactus","none");showid2(id,"block");}var EL="";function createRequest(){var request=null;try{request=new XMLHttpRequest();}catch(trymicrosoft){try{request=new ActiveXObject("Msxml2.XMLHTTP");}catch(othermicrosoft){try{request=new ActiveXObject("Microsoft.XMLHTTP");}catch(failed){request=null;}}}return request;}var res_UpdateDataTable=null;function UpdateDataTable(url){res_UpdateDataTable=createRequest();url=url+"&ajaxstyle=1&dummy="+new Date().getTime();var array=url.split("?");ShowLoaderImage(ajax_text_updating);res_UpdateDataTable.open("POST",array[0],true);res_UpdateDataTable.setRequestHeader("Content-Type","application/x-www-form-urlencoded");res_UpdateDataTable.onreadystatechange=UpdateDataTable2;res_UpdateDataTable.send(array[1]);}function UpdateDataTable2(){if(res_UpdateDataTable.readyState==4){if(res_UpdateDataTable.status==200){setTimeout("showid2('show_loading','none');",700);}}}var res_UpdateSession=null;function UpdateSession(){var tik5_session_expr=readCookie("session_expr");if(tik5_session_expr!="1"){GameOver();}else{res_UpdateSession=createRequest();url="playphotohunt.php?step=update_session&cat_dir="+cat_dir+"&set_time="+set_time+"&hint1_used="+hint1_used+"&hint2_used="+hint2_used+"&hint3_used="+hint3_used+"&hint_number="+hint_number+"&get_score="+get_score+"&game_level="+game_level+"&wrong_hit_number="+wrong_hit_number+"&ajaxstyle=1&dummy="+new Date().getTime();var array=url.split("?");ShowLoaderImage(ajax_text_updating);res_UpdateSession.open("POST",array[0],true);res_UpdateSession.setRequestHeader("Content-Type","application/x-www-form-urlencoded");res_UpdateSession.onreadystatechange=UpdateSession2;res_UpdateSession.send(array[1]);}}function UpdateSession2(){if(res_UpdateSession.readyState==4){if(res_UpdateSession.status==200){var res=res_UpdateSession.responseText;if(res=="1"){location.reload(true);}}}}function ShowLoaderImage(text){document.getElementById("show_loading_text").innerHTML=text;ShowDivCenterPage("show_loading");}function Editme(url,text_value,option,original_value,field_id){if(option=="1"){if(text_value==""){alert(js_alert_edit_field_not_blank);document.getElementById(field_id).value=original_value;return false;}}else if(option=="2"){if(isNaN(text_value)||text_value<=0||text_value==""){alert(js_alert_edit_field_not_a_number);document.getElementById(field_id).value=original_value;return false;}}else if(option=="20"){if(isNaN(text_value)||text_value<0||text_value==""){alert(js_alert_edit_field_not_a_number);document.getElementById(field_id).value=original_value;return false;}}else if(option=="3"){if(!valid_email(text_value)){alert(js_alert_edit_field_invalid_email);document.getElementById(field_id).value=original_value;return false;}}text_value=text_value.replace(/\&/g,'%26');text_value=text_value.replace(/\?/g,'%3F');text_value=text_value.replace(/\;/g,'%3B');UpdateDataTable(url+text_value);}function ShowDiv(next_id,show_id,extra_left,extra_top,show_hidden_iframe){buttonElement=document.getElementById(next_id);var X=getOffsetLeft(buttonElement)+extra_left;var Y=getOffsetTop(buttonElement)+buttonElement.offsetHeight+extra_top;if(X+parseInt(document.getElementById(show_id).style.width)>document.body.offsetWidth){X=document.body.offsetWidth-parseInt(document.getElementById(show_id).style.width)+10;}document.getElementById(show_id).style.left=X+"px";document.getElementById(show_id).style.top=Y+"px";document.getElementById(show_id).style.display="block";if(Y+document.getElementById(show_id).offsetHeight>document.body.offsetHeight){Y=document.body.offsetHeight-document.getElementById(show_id).offsetHeight;document.getElementById(show_id).style.top=Y+"px";}}function ShowDivCenterPage(id,modal,show_hidden_iframe){arrayPageSize=getPageSize();arrayPageScroll=getPageScroll();var top=arrayPageScroll[1]+((arrayPageSize[3])/2);var left=((arrayPageSize[0]-100)/2);if(modal=="1"){document.getElementById("moz_modalbkg").style.display="block";document.getElementById("moz_modalbkg").style.width=(document.body.offsetWidth+25)+"px";document.getElementById("moz_modalbkg").style.height=(document.body.offsetHeight+25)+"px";}document.getElementById(id).style.display="block";left=left-(document.getElementById(id).offsetWidth/2)+50;top=top-(document.getElementById(id).offsetHeight/2);if(top<0)top=0;if(left<0)left=0;document.getElementById(id).style.left=left+"px";document.getElementById(id).style.top=top+"px";}function getOffsetLeft(elm){var mOffsetLeft=elm.offsetLeft;var mOffsetParent=elm.offsetParent;while(mOffsetParent){mOffsetLeft+=mOffsetParent.offsetLeft;mOffsetParent=mOffsetParent.offsetParent;}return mOffsetLeft;}function getOffsetTop(elm){var mOffsetTop=elm.offsetTop;var mOffsetParent=elm.offsetParent;while(mOffsetParent){mOffsetTop+=mOffsetParent.offsetTop;mOffsetParent=mOffsetParent.offsetParent;}return mOffsetTop;}function isNumberKey(evt){var charCode=(evt.which)?evt.which:event.keyCode;if(charCode==13||charCode>31&&(charCode<48||charCode>57))return false;return true;}function getPageScroll(){var yScroll;if(self.pageYOffset){yScroll=self.pageYOffset;}else if(document.documentElement&&document.documentElement.scrollTop){yScroll=document.documentElement.scrollTop;}else if(document.body){yScroll=document.body.scrollTop;}arrayPageScroll=new Array('',yScroll);return arrayPageScroll;}function getPageSize(){var xScroll,yScroll;if(window.innerHeight&&window.scrollMaxY){xScroll=document.body.scrollWidth;yScroll=window.innerHeight+window.scrollMaxY;}else if(document.body.scrollHeight>document.body.offsetHeight){xScroll=document.body.scrollWidth;yScroll=document.body.scrollHeight;}else{xScroll=document.body.offsetWidth;yScroll=document.body.offsetHeight;}var windowWidth,windowHeight;if(self.innerHeight){windowWidth=self.innerWidth;windowHeight=self.innerHeight;}else if(document.documentElement&&document.documentElement.clientHeight){windowWidth=document.documentElement.clientWidth;windowHeight=document.documentElement.clientHeight;}else if(document.body){windowWidth=document.body.clientWidth;windowHeight=document.body.clientHeight;}var pageHeight,pageWidth;if(yScroll<windowHeight){pageHeight=windowHeight;}else{pageHeight=yScroll;}if(xScroll<windowWidth){pageWidth=windowWidth;}else{pageWidth=xScroll;}var arrayPageSize=new Array(pageWidth,pageHeight,windowWidth,windowHeight);return arrayPageSize;}function noEnterKey(evt){if(evt.keyCode==13||evt.which==13){return false;}return true;}function noGlobalEnterKey(evt){if(no_enterkey=="0"){if(evt.keyCode==13||evt.which==13){return false;}return true;}}function valid_email(e){ok="1234567890qwertyuiop[]asdfghjklzxcvbnm.@-_QWERTYUIOPASDFGHJKLZXCVBNM";for(i=0;i<e.length;i++){if(ok.indexOf(e.charAt(i))<0){return(false);}}if(document.images){re=/(@.*@)|(\.\.)|(^\.)|(^@)|(@$)|(\.$)|(@\.)/;re_two=/^.+\@(\[?)[a-zA-Z0-9\-\.]+\.([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;if(!e.match(re)&&e.match(re_two)){return(-1);}}}
	</script>	

</head>
<body style="width:320px;height:100%;background-color:#fd8b05;margin-top:0px;margin-left:0px;margin-right:0px;margin-bottom:20px" onload="WriteRecipientLoop();ShowAppId();widow.scrollTo(0,1);">
<!-- Load Ajax Loader -->
<div id="moz_modalbkg" onclick="showid2('div_L','none');showid2('moz_modalbkg','none');" style="position:absolute;display:none;filter:Alpha(Opacity=40);-moz-opacity:0.4;opacity:0.4;width:1px;height:1px;background-color: #999999;z-index:1;top:0px;left:0px;"></div>
<div id="show_loading" style="-webkit-border-radius:10px;-webkit-box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.8);position:absolute;display:none;top:0;left:0;text-align:center;padding:10px;width:140px;background-color:#FDBF04;border:1px solid #7D7764;z-index:11"><img alt="" src="ajax_loader.gif" /><br /><span id="show_loading_text" style="font-weight:bold;font-size:15px;"></span></div>



<div style="width:320px;height:88px;background-image:url(top.png);z-index:3" id="div_header">
	<table border="0" width="100%" cellspacing="0" cellpadding="0">
		<tr>
			<td><div style="width:80px;height:88px;" onclick="ShowScreen('div_main');">&nbsp;</div></td>
			<td><div style="width:80px;height:88px;" onclick="ShowScreen('div_tellafriend');">&nbsp;</div></td>

			<td><div style="width:80px;height:88px;" onclick="ShowScreen('div_contactus');">&nbsp;</div></td>
			<td><div style="width:80px;height:88px;" onclick="window.open('normal.php');">&nbsp;</div></td>
		</tr>
	</table>
</div>

<div style="padding-top:10px;display:block;text-align:center" id="div_main">	
	<img src="logo.png" /><br /><br />		
	<table border="0" width="100%" cellspacing="4" cellpadding="0">
		<tr>
			<td style="text-align:center;width:33%" onclick="gotoNextScreen('gr');" ><img src="icon_gr.png" /></td>

			<td style="text-align:center;width:34%" onclick="gotoNextScreen('cm');" ><img src="icon_cm.png" /></td>
			<td style="text-align:center;width:33%" onclick="gotoNextScreen('ph');" ><img src="icon_ph1.png" /></td>
		</tr>
		<tr>
			<td style="text-align:center;font-size:12pt;width:33%" onclick="gotoNextScreen('gr');" >Guitarist's Reference</td>
			<td style="text-align:center;font-size:12pt;width:34%" onclick="gotoNextScreen('cm');" >Greeting Card Messages</td>
			<td style="text-align:center;font-size:12pt;width:33%" onclick="gotoNextScreen('ph');" >Spot The Difference</td>

		</tr>
	</table>
	<div style="line-height:10px">&nbsp;</div>
	<table border="0" width="100%" cellspacing="4" cellpadding="0">
		<tr>
			<td style="text-align:center;width:33%" onclick="gotoNextScreen('ph2');" ><img src="icon_ph2.png" /></td>
			<td style="text-align:center;width:34%" onclick="gotoNextScreen('sh');" ><img src="icon_sh.png" /></td>
			<td style="text-align:center;width:33%" onclick="gotoNextScreen('ctc');" ><img src="icon_ctc.png" /></td>
		</tr>

		<tr>
			<td style="text-align:center;font-size:12pt;width:33%" onclick="gotoNextScreen('ph2');" >Spot The<br />Missing ...</td>
			<td style="text-align:center;font-size:12pt;width:34%" onclick="gotoNextScreen('sh');" >Super Hangman</td>
			<td style="text-align:center;font-size:12pt;width:33%" onclick="gotoNextScreen('ctc');" >Cool Tip Calculator</td>
		</tr>
	</table>
</div>

<div id="div_features" style="display:none;width:310px;margin-left:auto;margin-right:auto">
	<div style="text-align:center;padding-top:10px;padding-bottom:10px"><img border="0" alt="" src="" id="div_app_title" /></div>
	<div style="text-align:center;" id="page_info"></div>
	<table width="100%" align="center">
		<tr>
			<td style="width:340px;vertical-align:top;padding:15px;">
				<div style="text-align:center;border:10px solid black;width:160px;height:240px;margin-left:auto;margin-right:auto;-moz-border-radius:20px;-moz-box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.8);-webkit-border-radius:20px;-webkit-box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.8);" onclick="ZoomIn();"><img id="img_thumb" border="0" alt="" src="" id="feature_photo" width="160" height="240" /></div>
				<div style="text-align:center;font-size:11pt;padding:7px">Tap thumbnail to zoom in</div>

				<div style="text-align:center;" id="download_link"></div>
			</td>
		</tr>
		<tr>
			<td style="width:*;vertical-align:top" valign="top">
				<div id="div_text" style="text-align:left;padding:0px 7px 12px 7px;font-family:tahoma,sans-serif;font-size:13pt"></div>					
				<table width="171px" align="center" cellspacing="0" cellpadding="0">
					<tr>
						<td style="width:48px;height:75px;"><img class="btimg_inactive" id="btimg_prv" border="0" alt="" src="arrow_left.gif" onclick="window.scrollTo(0,1);ScreenShots(-1)" style="cursor:pointer" /></td>

						<td style="width:75px;height:75px;background-image:url(circle.gif);backrgound-repeat:no-repeat;cursor:pointer"><div id="span_num" style="text-align:center;font-weight:bold;font-size:14pt;">1/15</div></td>
						<td style="width:48px;height:75px;"><img id="btimg_next" border="0" alt="" src="arrow_right.gif" onclick="window.scrollTo(0,1);ScreenShots(1)" style="cursor:pointer" /></td>
					</tr>
				</table>
				<div style="text-align:center;padding-top:15px;cursor:pointer;" onclick="ShowScreen('div_main');"><img border="0" alt="" src="bt_main_page.gif" /></div>
			</td>			
		</tr>
	</table>
</div>

<div id="div_tellafriend" style="display:none">
	<div style="text-align:center;padding-top:10px;padding-bottom:10px"><img border="0" alt="" src="header_tell_your_friends.png" /></div>
	<div style="width:300px;margin-left:auto;margin-right:auto;text-align:left;padding:7px;font-size:12pt">
		<form name="tellfriend">
		<input type="hidden" name="what" value="send_to_friends" />
		<input type="hidden" name="list_email" value="" />
		<strong>Sender information</strong> <span class="Error_Message">*</span><br>							
		<div style="line-height:5px">&nbsp;</div> 
		Sender name<br><input onkeydown="showid2('show_error_message_sender_info','none');" id="sender_name" name="sender_name" value="" type="text" style="width:97%;" />

		<div style="line-height:4px">&nbsp;</div> 
		Sender Email<br><input onkeydown="showid2('show_error_message_sender_info','none');" onblur="if(!valid_email(this.value)){this.value='';ShowDivInvalidEmail('show_error_message_sender_info');}" id="sender_email" name="sender_email" value="" type="text" style="width:97%;" />
		<br><br><strong>Recipient information</strong> <span class="Error_Message">*</span><br>							
		<div style="line-height:5px">&nbsp;</div> 
		<div id="show_recipient_loop"></div>		
		<div style="text-align:center"><img border="0" alt="" src="button_send.gif" onclick="SendToFriends();" /></div>
		</form>
	</div>
</div>

<div id="div_contactus" style="display:none">
	<div style="text-align:center;padding-top:10px;padding-bottom:10px"><img border="0" alt="" src="header_contact_us.png" /></div>
	<div style="width:300px;margin-left:auto;margin-right:auto;text-align:left;padding:7px;font-size:12pt">
		<form name="contact_us">
		<input type="hidden" name="what" value="send_to_friends" />
		<input type="hidden" name="list_email" value="" />
			Sender name <span class="Error_Message">*</span><br><input style="width:97%" onkeydown="showid2('show_error_message_contact_sender_info','none');" id="contact_sender_name" name="contact_sender_name" value="" type="text" />
			<div style="line-height:14px">&nbsp;</div> 
			Sender Email <span class="Error_Message">*</span><br><input style="width:97%" onkeydown="showid2('show_error_message_contact_sender_info','none');" onblur="if(!valid_email(this.value)){this.value='';ShowDivInvalidEmail('show_error_message_contact_sender_info');}" id="contact_sender_email" name="contact_sender_email" value="" type="text"/>

			<div style="line-height:14px">&nbsp;</div> 
			Subject <span class="Error_Message">*</span><br><input id="contact_email_subject" style="width:97%" name="contact_email_subject" value="" type="text"/>
			<div style="line-height:14px">&nbsp;</div>								
			Messages <span class="Error_Message">*</span><br>
			<textarea style="width:97%;height:150px" id="contact_messages" name="contact_messages"></textarea><br><br>		
			<div style="text-align:center"><img border="0" alt="" src="button_send.gif" onclick="SendContactUs();" /></div>			
		</form>
	</div>

</div>
<div style="line-height:20px">&nbsp;</div>
<div style="text-align:center;padding:7px"><a href="http://twitter.com/MyAppCatalog" target="_blank"><img border="0" src="twitter_logo_header.png" /></a></div>
<div style="text-align:center;padding:7px;font-weight:bold;font-size:14pt">@MyAppCatalog</div>
<div style="text-align:center;font-weight:bold;font-size:11pt;padding-top:10px">(C) Copyright 2009 MyAppCatalog.com</div>
<div style="text-align:center;font-weight:bold;font-size:11pt;"></div>
</body>

</html>
<script type="text/javascript">
	var app_id="sh";
	var circle_numer=0;
	var app_name="";
	var array_data=new Array();
	var array_data_ctc=new Array();	
	var array_data_gr=new Array();	
	var array_data_sh=new Array();
	var array_data_cm=new Array();
	var link="";
	function ShowAppId(){
		if(app_id!="ph" && app_id!="gr" && app_id!="sh" && app_id!="ctc" && app_id!="cm" && app_id!="ph2"){
			return false;
		}
		else{
			gotoNextScreen(app_id);
		}
	}

	function gotoNextScreen(data){				
		x=1;
		app_name=data;
		if(data=="gr"){
			document.getElementById("download_link").innerHTML="<a href='http://developer.palm.com/appredirect/?packageid=com.myappcatalog.guitaristsreferencepro&applicationid=320' target='_blank'><img src='bt_download.png' /></a>";
			document.getElementById("div_app_title").src="title_guitarists_reference.gif";

			array_data_gr[1]="To provide a comprehensive guitar toolkit, the <strong>Guitarist's Reference</strong> was developed and recently launched, providing learning tools for chords, scales and arpeggios. This innovative new application specifically caters to the guitar lover in anyone.<br /><br />Tap icon <img src=\"../arrow_right.gif\" style=\"vertical-align:middle;width:24px;height:38px\"/> below to go to next page to learn more about its features";
			array_data_gr[2]="This is the main screen.<br /><br />Unlike other guitar chords apps which only show you guitar chords, with our <strong>Guitarist's Reference</strong> you will learn everything about guitar chords, scales, arpeggios, triads, standard tuning and alternate tunings<br /><ul><li>Comprehensive database with over <strong>3,000 chord voicings</strong></li><li>Over <strong>500 scales</strong></li><li>Over <strong>550 arpeggios</strong></li><li><strong>Triads</strong> in any inversion</li><li><strong>Chord/Scale relationships</strong>: you select a chord, program will show recommended scales</li><li><strong>Scales to Chords</strong>: you pick a scale, program will show all chords that work well with selected scale.</li><li><strong>Chord Name Finder</strong>: You enter your notes on the fretboard, program will tell you the chord name.</li><li>Easy to look up any note on the fretboard</li><li>Tones are actually played with every chord, scale, arpeggio, triad.</li><li>A <strong>Chord Quiz</strong> feature allows the user to test their learning on an ongoing basis</li><li>Support <strong>38 alternate guitar tunings</strong> or you can custom your tuning</li><li>Support <strong>Left</strong> and <strong>Right</strong> handed</li><li>Superb graphics and friendly user interface</li></ul>";

			array_data_gr[3]="<strong>Guitar Chords</strong> screen. In here you will be able to look up over 3,000 chord voicings.<br /><br />Tap <strong>Set Root</strong> button to select Key, then tap <strong>Set Type</strong> to make up a chord.<br /><br />Tap 2 icons <img alt=\"\" border=\"0\" src=\"../gr_button_up.png\" style=\"vertical-align:middle\" />&nbsp;&nbsp;&nbsp;&nbsp;<img alt=\"\" border=\"0\" src=\"../gr_button_down.png\" style=\"vertical-align:middle\" /> to view chord inversions.<br /><br />Support <strong style=\"font-size:15pt;\">47</strong> chord types:<br /><br /><strong>Major Chords (11)</strong>: maj, maj7, maj9, maj13, maj9(#11), maj13(#11), 6, add9, 6/9, maj7(b5), maj7(#5)<br /><br /><strong>Minor Chords (12)</strong>: m, m7, m9, m11, m13, m6, m(add9), m6/9, m(maj7), m(maj9), m7(b5), m7(#5)<br /><br /><strong>Dominant Chords (5)</strong>: 7, 9, 11, 13, 7sus4<br /><br /><strong>Altered Dominant Chords (13)</strong>: 7(b5), 7(#5), 7(b9), 7(#9), 7(b5,b9), 7(b5,#9), 7(#5,b9), 7(#5,#9), 9(b5), 9(#5), 13(#11), 13(b9), 11(b9)<br /><br /><strong>Other Chords (6)</strong>: +, o7, 5, sus4, sus2, sus2,sus4";
			array_data_gr[4]="Chord name: <strong>A m</strong><br /><br /><strong>A.C.E</strong>: notes to make up a chord <strong>A m</strong><br /><br /><img border=\"1\" alt=\"\" src=\"../icon_close_string.gif\" style=\"vertical-align:middle;\" /> Don't play this string<br /><br /><img border=\"1\" alt=\"\" src=\"../icon_open_string.gif\" style=\"vertical-align:middle;\" /> Play this open string<br /><br /><img border=\"1\" alt=\"\" src=\"../icon_open_string_root.gif\" style=\"vertical-align:middle;\" /> Play this open string (blue color means this is a root note)<br /><br /><img border=\"1\" alt=\"\" src=\"../icon_root_note.gif\" style=\"vertical-align:middle;\" /> Root note. In this case <strong>A</strong> is a root note<br /><br />Tap the Switch icon <img border=\"0\" alt=\"\" src=\"../icon_switch.png\" style=\"vertical-align:middle;\" /> to switch from fingering to note name<br /><br />Go to next page to see chord <strong>A m</strong> in note name view mode";
			array_data_gr[5]="Chord <strong>A m</strong> in note name view mode<br /><br />Tap Audio icon <img border=\"0\" alt=\"\" src=\"../icon_play.png\" style=\"vertical-align:middle;\" /> to play sound sample<br /><br />Tap icon <img border=\"0\" alt=\"\" src=\"../gr_button_down.png\" style=\"vertical-align:middle;\" /> to view available chord inversion<br /><br />Next page you will see chord <strong>A m</strong> inversion screen shot";
			array_data_gr[6]="Chord <strong>A m</strong> inversion 5th Position, Root 6th.<br /><br />If you wish to learn more details about chord <strong>A m</strong> (such as alternate chord symbolds or view scales that work with this chord) , then tap Info icon <img border=\"0\" alt=\"\" src=\"../icon_info.png\" style=\"vertical-align:middle;\" /><br /><br />Go to next page to see <strong>Chord Information</strong> box screen shot";
			array_data_gr[7]="<strong>Chord Information</strong><br /><br />Tap <img border=\"0\" alt=\"\" src=\"../bt_view_recommended_scales.png\" style=\"vertical-align:middle;\" /> to view all scales that work with chord <strong>A m</strong>";
			array_data_gr[8]="<strong>Recommended Scales</strong><br /><br />If you want to view the relationship between Chord <strong>A m</strong> and Scale <strong>A Phrygian</strong>, then tap on <strong>A Phrygian</strong>. Program will switch to <strong>Guitar Scales</strong> screen to display <strong>Scale Chord Relationships</strong>";
			array_data_gr[9]="<strong>Scale Chord Relationships</strong><br /><br />Tap info icon <img border=\"0\" alt=\"\" src=\"../icon_info.png\" style=\"vertical-align:middle\" /> again to view more in detail about this chord and scale.";
			array_data_gr[10]="<strong>Chord Name Finder</strong>.<br /><br />First time use this feature, program will show you the <strong>Chord Finder Instruction</strong> box.<br /><br />Step 1: Enter your notes<br /><br />Step 2: Tap Search button<br /><br />Step 3: View search results";
			array_data_gr[11]="You need to enter your notes, then tap <strong>SEARCH</strong> button.<br /><br />You can tap the red X icon to create an open string.<br /><br />You entered 3 notes <strong>C.A.F</strong>. Now tap <strong>SEARCH</strong> button to find out the chord name";
			array_data_gr[12]="View Search result. Tap on <strong>F maj</strong> to view this chord.";
			array_data_gr[13]="Viewing chord name <strong>F maj</strong>";
			array_data_gr[14]="<strong>Guitar Scales</strong> screen. In here you will be able to look up over 500 scales.<br /><br />Tap <strong>Set Root</strong> button to select Key, then tap <strong>Set Type</strong> button to make up a scale.";			
			array_data_gr[15]="Support <strong style=\"font-size:15pt;\">42</strong> scale types:<br /><br /><strong>Major Scale (7)</strong>: Major, Dorian, Phrygian, Lydian, Mixolydian, Aeolian, Locrian<br /><br /><strong>Harmonic Minor (2)</strong>: Harmonic Minor, Spanish Phrygian<br /><br /><strong>Melodic Minor (7)</strong>: Melodic Minor, Dorian b2, Lydian Augmented, Lydian Dominant, Mixolydian b6, Locrian #2, Altered<br /><br /><strong>Pentatonics (11)</strong>: Major Pentatonic, Minor Pentatonic, Blues Scale, Major Blues Scale, Egyptian, Hirajoshi, Pelog, Balinese, Japanese, Chinese, Chinese 2<br /><br /><strong>Symmetrical Scales (3)</strong>: Half/Whole Diminished, Whole/Half Diminished, Whole Tone<br /><br /><strong>Misc (12)</strong>: Bebop Dominant, Bebop Major, Hungarian Major, Hungarian Minor, Enigmatic, Neopolitan Major, Neopolitan Minor, Flamenco, Arabian, Persian, Byzantine, Jewish";
			array_data_gr[16]="Scale name: <strong>C Dorian</strong><br /><br /><strong>C.D.Eb.F.G.A.Bb</strong>: notes to make up a scale <strong>C Dorian</strong><br /><br />Tap Audio icon <img border=\"0\" alt=\"\" src=\"../icon_play.png\" style=\"vertical-align:middle;\" /> to play sound sample<br /><br />Tap Positions icon <img border=\"0\" alt=\"\" src=\"../icon_positions.png\" style=\"vertical-align:middle;\" /> to select the position you want to view scale<br /><br />Tap Info icon <img border=\"0\" alt=\"\" src=\"../icon_info.png\" style=\"vertical-align:middle;\" /> to view more info about this scale such as alternate scale name or view the list of chords that work with this scale. <br /><br />Tap icon <img border=\"0\" alt=\"\" src=\"../gr_button_down.png\" style=\"vertical-align:middle;\" /> to scroll the guitar neck";
			array_data_gr[17]="<strong>Show Positions</strong> option. Use this to quick jump to any position you want. Program will also remember your selected position.";
			array_data_gr[18]="This is the look if you select view scale in <strong>3rd position</strong> with option 5 note positions<br /><br />Tap Audio icon <img border=\"0\" alt=\"\" src=\"../icon_play.png\" style=\"vertical-align:middle;\" /> to play sound sample<br /><br />If you wish to learn more details about scale <strong>C Dorian</strong> (such as alternate scale names or view the list of chords that work with this scale), then tap Info icon <img border=\"0\" alt=\"\" src=\"../icon_info.png\" style=\"vertical-align:middle;\" /><br /><br />Go to next page to see <strong>Scale Information</strong> box screen shot";
			array_data_gr[19]="<strong>Scale Information</strong> box<br /><br />Tap <img border=\"0\" alt=\"\" src=\"../bt_view_scale_to_chords.png\" style=\"vertical-align:middle;\" /> to view all chords that work with scale <strong>C Dorian</strong>";
			array_data_gr[20]="<strong>Recommended Chords</strong> table<br /><br />List all chords that have the same notes with scale <strong>C Dorian</strong>";
			array_data_gr[21]="Viewing Chord / Scale Relationships. Tap Info icon <img border=\"0\" alt=\"\" src=\"../icon_info.png\" style=\"vertical-align:middle;\" /> again to view more information about chord <strong>D# maj9</strong> and scale <strong>C Dorian</strong>";
			array_data_gr[22]="<strong>Scale Chord Relationships</strong> information";
			array_data_gr[23]="<strong>Guitar Arpeggios</strong> screen. In here you will be able to look up over 550 arpeggios.<br /><br />Tap <strong>Set Root</strong> button to select Key, then tap <strong>Set Type</strong>.";		
			array_data_gr[24]="Arpeggio name: <strong>C maj</strong><br /><br /><strong>C.E.G</strong>: notes to make up a arpeggio <strong>C maj</strong>";
			array_data_gr[25]="Tap the Info icon <img border=\"0\" alt=\"\" src=\"../icon_info.png\" style=\"vertical-align:middle;\" /> to view <strong>Arpeggio Information</strong>.";
			array_data_gr[26]="<strong>Guitar Notes</strong> screen. In here you will be able to look up any note on the fretboard.";
			array_data_gr[27]="You have an option to view all notes on the fretboard.";
			array_data_gr[28]="You have selected to view key: <strong>D</strong>";
			array_data_gr[29]="View all notes on the fretboard at the same time.";
			array_data_gr[30]="<strong>Guitar Triads</strong> screen.";
			array_data_gr[31]="Triad type list";
			array_data_gr[32]="Triad name: <strong>E Major, Root Position</strong><br /><br /><strong>E.G.B</strong>: notes to make up a triad<br /><br />Tap the Audio icon <img border=\"0\" alt=\"\" src=\"../icon_play.png\" style=\"vertical-align:middle;\" /> to listen sound sample.<br /><br />Tap the Switch icon <img border=\"0\" alt=\"\" src=\"../icon_switch.png\" style=\"vertical-align:middle;\" /> to switch from fingering to note name<br /><br />Tap Info icon <img border=\"0\" alt=\"\" src=\"../icon_info.png\" style=\"vertical-align:middle;\" /> to view <strong>Triad Information</strong> box";
			array_data_gr[33]="<strong>Triad Information</strong> screen";
			
			array_data_gr[34]="<strong>Chord Quiz</strong> feature, program will random pick a chord and display it on the fretboard. Your job is find out what the chord name is. This little fun game will help you improve chord reading.<br /><br />Tap <strong>New Quiz</strong> button to start the game.";
			array_data_gr[35]="Tap <strong>Answer</strong> button will take you to multiple choices screen";
			array_data_gr[36]="Tap to select the correct answer.";
			
			array_data_gr[37]="Program will tell you your answer is correct or incorrect. It will also keep track your score";
			array_data_gr[38]="<strong>Guitar Tunings</strong> screen<br /><br />There are about 38 alternate tunings.";
			array_data_gr[39]="<strong>Custom Tuning</strong>.<br /><br />There are many more preset tunings for you here.";
			array_data_gr[40]="<strong>Preset Custom Tunings List</strong>";
			array_data_gr[41]="If you select an alternate tuning or custom tuning, then Chord, Triads and Chord Quiz feature will be disabled.";
			array_data_gr[42]="When you select an alternate tuning, program will ask you to apply this tuning or view more inforamtion about this tuning before you apply it.";
			
			array_data_gr[43]="Useful information about <strong>Open C Tuning</strong>";

			array_data=array_data_gr;
		}
		else if(data=="sh"){
			document.getElementById("download_link").innerHTML="<div style=\"padding:10px\"><a href=\"http://developer.palm.com/appredirect/?packageid=com.myappcatalog.superhangman&applicationid=289\" target=\"_blank\"><img src='bt_buy_pro.png' /></a></div><div><a href=\"http://developer.palm.com/appredirect/?packageid=com.myappcatalog.superhangmanfree&applicationid=283\" target=\"_blank\"><img src='bt_download_free.png' /></a></div>";
			document.getElementById("div_app_title").src="title_super_hangman.gif";

			array_data_sh[1]="This <strong>Super Hangman</strong> game challenges the user with over <strong>16,800 words</strong> in a fun way of studying for the <strong>SAT, GRE, TOEFL, GMAT</strong> vocabulary test. Words vary from simple to complex but are easy to learn while playing the game. More words will be added in the future.<br /><br />Tap icon <img src=\"../arrow_right.gif\" style=\"vertical-align:middle;width:24px;height:38px\"/> below to go to next page to learn more about its features";
			array_data_sh[2]="The big differentiator between this app and other word game apps is quality. This app comes with excellent graphics, a user friendly interface, and numerous options for play.<br /><br /><strong>Features:</strong><br /><ul><li>Relax and Challenge mode</li><li>Challenge mode you play against the timer. Your best scores will be submitted to Global High Scores board.</li><li>Global High Scores board will show your rank and top 100 players.</li><li>There are 4 stick man themes for you to choose</li><li>App will remember your stats, settings. Your game will be saved when you have a phone call. You can continue your game when you re-open the app.</li><li>User friendly design</li><li>Appealing graphics</li><li>One and Two Player modes</li><li>Two Player mode which allows you to enter your own words for your friends to guess</li><li>Choice of ABC or QWERTY keyboard. There is a switch button that allows you switch between 2 keyboards on the fly. <strong>You can use the hardware keyboard to play</strong></li><li>Test prep vocabulary for SAT</li><li>Prep for Test of English as a Foreign Language</li><li>Test vocabulary for Graduate Exams: GRE and GMAT</li><li>Hints with either definition or fill-in-the-blank</li><li>9 word categories</li><li>Ability to choose to play with words from all 9 categories</li><li>Over 16,000 words</li><li>Solve option for study use</li><li>Quick definition reference from Dictionary.com with internet connection</li></ul><strong>Super Hangman Pro</strong> is a great game for the whole family. Whether studying for an exam or just looking for a fun word game, <strong>Super Hangman Pro</strong> will please everyone.";
			array_data_sh[3]="<strong>Super Hangman Pro</strong> comes with over 16,000 words in 9 categories.<br /><br />More words and categories will be added in the future version";
			array_data_sh[4]="Play game with <strong>Relax mode</strong>. Word is random picked from the word lists. You won't play the same word twice in 1 category.<br /><br />If word comes with hint, then you can tap the underline to see it.<br /><br />Tap switch icon <img border=\"0\" lat=\"\" src=\"../sh_icon_switch.gif\" style=\"vertical-align:middle\"/> to switch between 2 keyboards<br /><br /><img border=\"1\" alt=\"\" src=\"../key_abc.jpg\" width=\"260\" height=\"89\" /><br /><br /><img border=\"1\" alt=\"\" src=\"../key_qwe.jpg\" width=\"260\" height=\"89\" /><br /><br />Tap <strong>SOLVE</strong> button to reveal the word. Use this button for study purpose only.";
			array_data_sh[5]="Showing Hint/Clue for word <strong>ARDOR</strong>.<br /><br />Hints with either definition or fill-in-the-blank";
			array_data_sh[6]="After you solve the puzzle, you will see 3 buttons: <strong>Star New Game</strong>, <strong>Open Dictionary</strong> and <strong>Change Category</strong>. Tap <strong>Open Dictionary</strong> button to quick view definition reference from Dictionary.com (internet connection is required)";
			array_data_sh[7]="You must have internet connection to view the word's definition at Dictionary.com";
			array_data_sh[8]="<strong>Congratulations, You win</strong> popup message";
			array_data_sh[9]="<strong>Sorry! You've been hanged</strong> popup message";
			array_data_sh[10]="Play game with <strong>Two player mode</strong>.";
			array_data_sh[11]="<strong>Settings page</strong>. You can select your theme here. Enter your name and email for <strong>Global High Scores</strong>.";
			array_data_sh[12]="Play game with <strong>Challenge mode</strong>.<br /><ul><li>You have 5 lives to play.</li><li>Timer will get faster on higher level</li><li>Score will be deducted if you tap the wrong letter.</li><li>Score will be increased if you tap the correct letter</li><li>Use PAUSE button to stop timer.</li></ul>";
			array_data_sh[13]="If you win, you will have the bonus points.<br /><br />Solve the puzzle fast and get more <strong>&quot;Time Bonus Points&quot;</strong><br /><br />You have 5 lives, keep them as long as you can to get more <strong>&quot;Life Bonus Points&quot;</strong>";
			//array_data_sh[14]="You can close the app anytime. This app will auto save your game and ready to resume next time you re-open it.";
			array_data=array_data_sh;
		}
		else if(data=="ctc"){
			document.getElementById("download_link").innerHTML="<a href='http://developer.palm.com/appredirect/?packageid=com.myappcatalog.cooltipcalculator&applicationid=237' target='_blank'><img src='bt_download.png' /></a>";
			document.getElementById("div_app_title").src="title_cool_tip_calculator.gif";

			array_data_ctc[1]="The <strong>Cool Tip Calculator</strong> is a handy utility application for use in any tipping situation, compatible with Palm Pre.<br /><br />Other tip calculator apps are unattractive and difficult to use. The <strong>Cool Tip Calculator</strong> has large clear text and is incredibly straightforward, colorful graphics, appealing design, and thoughtful features make the <strong>Cool Tip Calculator</strong> simply the best tip calculator available.<br /><br />Tap icon <img src=\"../arrow_right.gif\" style=\"vertical-align:middle;width:24px;height:38px\"/> below to go to next page to learn more about its features";
			array_data_ctc[2]="<strong>Features:</strong><ul><li><strong>My Bill Records:</strong> This feature allows you save your bills to database and review them later<br /><br /></li><li>Adjustment screen allows you easily split the bill in anyway you want<br /><br /></li><li>App will auto remember your settings (tip %, tax rated...) for next time use.<br /><br /></li><li>Attractive design </li> <li>Large keys for number entries</li> <li>Large easy-to-read text and numbers</li> <li>Color scheme and design for maximum ease of reading in low lighted restaurants</li> <li>Intuitive interface, easy to use</li> <li>Calculates tip without tax</li> <li>Divides tip amount among number of people</li> <li>Allows user to change tip percentage based on quality of service</li> <li>Option for rounding tip amount, total to pay, and total per person</li> <li>Reference information on how to tip properly</li><ul>";
			array_data_ctc[3]="Tap on each large button <strong>Tip %</strong>, <strong>Tax %</strong> and <strong>SPLIT</strong> to edit the number. Tap <strong>Calculate</strong> button to view result";
			array_data_ctc[4]="If you tap button <strong>Tip %</strong>, then this is the screen you will see. Go ahead enter your new tip %";
			array_data_ctc[5]="Show result with 3 round options: <strong>Round Tip Amount</strong>, <strong>Round Total Pay</strong> and <strong>Round Total per person</strong><br /><br />If you set <strong>SPLIT</strong> number more than 1, then you can tap button<br /><br /><img src=\"../bkg_total_person2.png\" /><br /><br />to go to <strong>Adjustment screen</strong>.";
			array_data_ctc[6]="<strong>Adjustment Screen.</strong><br /><br />Let's say you just order a salad while your friends have steak or seafood, of course you don't want to split the bill evenly. Use this feature to adjust your check.<br /><br />Tap icon <img src=\"../icon_adjback.png\" style=\"vertical-align:middle\" /> to <strong>Go back</strong> to previous screen<br /><br />Tap icon <img src=\"../icon_adjreset.png\" style=\"vertical-align:middle\" /> to <strong>Reset</strong> your adjustments<br /><br />Tap button #1 or #2 or #3 to enter new amount";
			array_data_ctc[7]="Enter new amount for check #1";
			array_data_ctc[8]="App will auto adjust the amount of check #2, #3 and #4";
			array_data_ctc[9]="App includes <strong>Tipping Guide.</strong>";
			array_data=array_data_ctc;
		}
		else if(data=="cm"){
			document.getElementById("download_link").innerHTML="<a href='http://developer.palm.com/appredirect/?packageid=com.myappcatalog.cardmessagespro&applicationid=310' target='_blank'><img src='bt_download.png' /></a>";
			document.getElementById("div_app_title").src="title_card_messages.gif";

			array_data_cm[1]="&quot;Happy Birthday, Julie...again this year&quot; Are you lost for words? Need some inspiration?<br /><br />We've collected thousands of card messages and put them on <strong>Card Messages</strong> App. From Birthdays to Romance, Anniversaries to Sympathy. Find just the right words for your cards with <strong>Card Messages</strong>.<br /><br />Tap icon <img src=\"../arrow_right.gif\" style=\"vertical-align:middle;width:24px;height:38px\"/> below to go to next page to learn more about its features";
			array_data_cm[2]="This is the main screen. You will see the list of main category card messages<br /><br /><strong>Features:</strong><br /><ul><li>Over <strong>2,500 card messages</strong> at your fingertips</li><li>Over <strong>120 categories</strong></li><li><strong>My Favorite Messages</strong> allows you save your favorite card messages.</li><li>Allows you send email messages to your friends</li><li>Allows you send SMS card messages to your friends</li><li>Simple, fast and easy to use</li></ul>";
			array_data_cm[3]="Continue main category";
			array_data_cm[4]="Show <strong>LOVE's</strong> sub categories";
			array_data_cm[5]="Show all card messages in category name <strong>I Love You</strong>";
			array_data_cm[6]="Card Messages Options.<br /><br />Use <strong>[+/- Fav]</strong> button to add/remove card message from favorite place.<br /><br />Tap <strong>SMS</strong> button to send card message to SMS app.<br /><br />Tap <strong>Email</strong> button to send card message to Email app.";
			array_data_cm[7]="Your selected card message has been transfered to Email app. You just need to enter your email address and tap Send button";
			array_data_cm[8]="Your selected card message has been transfered to SMS Messaging app. You just need to enter your contact name/phone number and tap Send button";
			array_data_cm[9]="All of your favorite messages will be stored in here for easy look up in the future.";
			array_data=array_data_cm;
		}
		else if(data=="ph"){
			document.getElementById("download_link").innerHTML="<div style=\"padding:10px\"><a href=\"http://developer.palm.com/appredirect/?packageid=com.myappcatalog.photohuntpro&applicationid=223\" target=\"_blank\"><img src='bt_buy_pro.png' /></a></div><div><a href=\"http://developer.palm.com/appredirect/?packageid=com.myappcatalog.photohuntfree&applicationid=104\" target=\"_blank\"><img src='bt_download_free.png' /></a></div>";
			document.getElementById("div_app_title").src="title_photohunt.gif";

			array_data_cm[1]="Can you spot what's different? Analyze two similar images and spot 5 differences before time's up. This is a popular family classic pencil and paper Spot the Difference - Photo hunt game that basically test and push the powers of your observation to the limits.<br /><br /><strong>Please note:</strong> Spot The Difference Pro and Free version share the same leader board. Pro version has over 200 levels<br /><br />Tap icon <img src=\"../arrow_right.gif\" style=\"vertical-align:middle;width:24px;height:38px\"/> below to go to next page to learn more about its features";
			array_data_cm[2]="This is the main screen.<br /><br /><strong>Features:</strong><br /><ul><li>Over 200 sets of images from 3 categories (200+ levels)</li><li>Global Leader Board</li><li><strong>3 Hints</strong> are provided per game to help you find a difference. Try to save Hints for as long as possible because extra Hint Bonus points are awarded for each unused Hint everytime you go to the next level.</li><li>Timer gets faster for each wrong spots made, or on completion of each level</li><li>You will have more points if you play fast and keep 3 hints alive as long as you can.</li><li>Interesting sound effect</li><li>Beautiful design and easy to use</li></ul>";
			array_data_cm[3]="Select a category you want to play.";
			array_data_cm[4]="Spot all 5 differences before time's up<br /><br />Tap icon <img src=\"../icon_pause.png\" border=\"0\" alt=\"\" style=\"vertical-align:middle\" /> to pause game. Game will auto pause when you have a phone call.<br /><br />Tap icon <img src=\"../icon_sound_on.png\" border=\"0\" alt=\"\" style=\"vertical-align:middle\" /> to turn ON/OFF music background and other sound effect.<br /><br />Tap Hint icon <img src=\"../icon_hint.png\" border=\"0\" alt=\"\" style=\"vertical-align:middle\" /> when you need help. Keep 3 hints as long as you can to have more bonus points";
			array_data_cm[5]="Bonus Point Table. Tap <strong>Next Level</strong> button play next level";
			array_data_cm[6]="<strong>Help and Instruction</strong>";
			array_data_cm[7]="<strong>Settings</strong>. You must enter your name in order to post your best score to Global Leader Board.";
			array_data=array_data_cm;
		}
		else if(data=="ph2"){
			document.getElementById("download_link").innerHTML="<div style=\"padding:10px\"><a href=\"http://developer.palm.com/appredirect/?packageid=com.myappcatalog.photohunt5spotspro&applicationid=254\" target=\"_blank\"><img src='bt_buy_pro.png' /></a></div><div><a href=\"http://developer.palm.com/appredirect/?packageid=com.myappcatalog.photohunt5spotsfree&applicationid=103\" target=\"_blank\"><img src='bt_download_free.png' /></a></div>";
			document.getElementById("div_app_title").src="title_5missing.gif";

			array_data_cm[1]="Identify and tap 5 missing pieces of a picture before the clock runs out. The photo on your left has 5 missing pieces, you need to find them all by tapping the pieces you see on your right.<br /><br /><strong>Please note:</strong> Spot The Missing Pieces Pro and Free version share the same leader board. Pro version has over 200 levels<br /><br />Tap icon <img src=\"../arrow_right.gif\" style=\"vertical-align:middle;width:24px;height:38px\"/> below to go to next page to learn more about its features";
			array_data_cm[2]="This is the main screen.<br /><br /><strong>Features:</strong><br /><ul><li>Over 200 levels in 3 categories <b>General, People and Halloween</b></li><li>Global Leader Board</li><li><strong>3 Hints</strong> are provided per game to help you find a missing spot. Try to save Hints for as long as possible because extra Hint Bonus points are awarded for each unused Hint everytime you go to the next level.</li><li>Timer gets faster for each wrong spots made, or on completion of each level</li><li>You will have more points if you play fast and keep 3 hints alive as long as you can.</li><li>Interesting sound effect</li><li>Beautiful design and easy to use</li></ul>";
			array_data_cm[3]="Select a category you want to play.";
			array_data_cm[4]="You have 3 seconds to see/remember the photo on your left";
			array_data_cm[5]="Program will create 5 missing pieces randomly. You need to find them all by tapping the pieces you see on your right<br /><br />Tap icon <img src=\"../icon_pause2.png\" border=\"0\" alt=\"\" style=\"vertical-align:middle\" /> to pause game. Game will auto pause when you have a phone call.<br /><br />Tap icon <img src=\"../icon_sound_on.png\" border=\"0\" alt=\"\" style=\"vertical-align:middle\" /> to turn ON/OFF music background and other sound effect.<br /><br />Tap Hint icon <img src=\"../icon_hint.png\" border=\"0\" alt=\"\" style=\"vertical-align:middle\" /> when you need help. Keep 3 hints as long as you can to have more bonus points";
			array_data_cm[6]="Each level you have 2 chances to see the missing piece. Simply tap button <img src=\"../bkg_question.png\" style=\"vertical-align:middle;border:2px solid black\" /> to reveal the missing piece. You only have 3 seconds to remember it and then the question mark button will reappear, this time you will see this image <img src=\"../bkg_question2.png\" style=\"vertical-align:middle;border:2px solid black\" />. After you use your second chance for quick look the missing piece, all remain question mark buttons will be grayed out. <strong>Note:</strong> points are deducted each time you reveal the missing piece. The end of each level you will get bonus points if you don't use this kind of help.";
			array_data_cm[7]="<strong>Bonus points table</strong>";
			array_data_cm[8]="<strong>Help - Instruction</strong>";
			array_data_cm[9]="<strong>Settings</strong>: You must enter your name in order to post your best score to Global Leader Board.<br /><br />You can select a song for your game music background and config other sound effects";
			array_data_cm[10]="You can use your own song in your music library for game music background";
			array_data_cm[11]="How would you like to play sound effect when you tap to the right spot or wrong spot? ";
			array_data_cm[12]="Select a song to play as game music background";
			array_data_cm[13]="Select a sound effect when you tap to the right spot or wrong spot";
			array_data_cm[14]="<strong>Leader Board</strong> - Showing your rank and count how many active players";
			array_data_cm[15]="<strong>Leader Board</strong>- Showing top 100 players";
			array_data=array_data_cm;
		}

		circle_numer=array_data.length-1;

		document.getElementById("span_num").innerHTML="1/"+circle_numer;
		document.getElementById("page_info").innerHTML="Page 1/"+circle_numer;
		document.getElementById("div_text").innerHTML=array_data[1];
		document.getElementById("img_thumb").src="../screenshots/"+data+"/1.jpg";
		
		document.getElementById("btimg_prv").className="btimg_inactive";
		document.getElementById("btimg_next").className="btimg_active";

		showid2("div_main","none");
		showid2("div_features","block");
		window.scrollTo(0,1);
	}

	function ShowScreen(id){
		showid2("div_main","none");
		showid2("div_features","none");
		showid2("div_tellafriend","none");
		showid2("div_contactus","none");
		showid2("div_zoom","none");
		showid2(id,"block");
		window.scrollTo(0,1);
	}

	function ZoomIn(){
		var src=document.getElementById("img_thumb").src;
		document.getElementById("pic_zoom").src=src;
		showid2("div_header","none");
		ShowScreen("div_zoom");
	}
</script>