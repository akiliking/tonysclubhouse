
<?php 
	$curruserid = $_SESSION['CurrMemberId'];
	$currhostid = $_SESSION['CurrHostId'];
	$home = "<a href='base.php' title='Home'>HOME</a>";
	$top20 = "<a href='base.php?page=players.php' title='Top 20'>TOP 20</a>";
	$twitter = "<a href='http://twitter.com/tonysclubhouse' target='blank' title='Follow Tonys Clubhouse on Twitter'>Follow us on Twitter <img src='images/twitter_sm.png' border=0 /></a>";
	$profile = "<a href='base.php?page=UserProfile.php&MemberId=$curruserid' title='View your Profile'>My Profile</a>";
	$archive = "<a href='base.php?page=vault.html' title='Clubhouse Vault: Archives'> Ton's Vault</a>";
	$vault_locked = "<a href='base.php?page=vault_locked.html' title='Clubhouse Vault:(Locked)'>Ton's Vault</a>";
	$vault_unlocked = "<a href='base.php?page=vault_membersonly.html' title='Clubhouse Vault: (Unlocked)'>Ton's Vault</a>";
	$HostProfile = "<a href='base.php?page=HostProfile.php&HostId=$currhostid' title='View your Profile'>My Profile</a>";
	$register = "<a href='base.php?page=NewMembershipForm.php' title='Create an Account'>Join the Club!</a>";
	$newShow = "<a href='base.php?page=PlayListDB/show_hdr.php' title='Create a New Play List'>New Show</a>";
	$Listen = "<a HREF =\"javascript:openPlayer('player.php?music_link=$link&setid=$setid&userid=$userid&autostart=yes');\" title='Listen to the Lastest Mix'><strong>Latest Mix  <img src ='images/listen-sm-rad-reg.gif' border=0></strong></a>";
	$playlists = "<a href='base.php?page=playlist_frame.php' title='View Playlists and Listen to Mixes'><u><b>MIXES</u></b> <img src ='images/listen-sm-rad-reg.gif' border=0> <br>& Playlists </a>";
	$Editplaylists = "<a href='base2.php?page=PlayListDB/show.php' target='_blank' title='Edit Playlists'>Edit Playlists</a>";
	$memberlist = "<a href='base.php?page=members_view.php' title='View Clubhouse Members'>Members</a>";
	$sign_out	= "<a href='base.php?request=logout' title='Log Out'>Sign Out</a>";
	$news	="<a href='base.php?page=NEWS2.php' title='Clubhouse News'>News</a>";
	$arcade	="<a href='base.php?page=arcade.html' title='Chill Out at the Clubhouse Arcade'>Clubhouse Arcade</a>";		
	$contacts	= "<a href='base.php?page=contactus.php'  title='Clubhouse Contact Info'>Contact Us</a>";
	$emailmembers	= "<a href='base.php?page=emailform.php'  title='Send Email to Clubhouse Members'>Email Members</a>";
	$aboutus	= "<a href='base.php?page=aboutus.php' title='About The Clubhouse' >About Us</a>";
	$newsadmin = "<a href='base2.php?page=admin/adminNews.php' title='News Admin'>NEWS ADMIN</a>";
	$editcontent = "<a href='base2.php?page=admin/adminOtherData.php'>CONTENT EDITOR</a>";
	$addcontent = "<a href='base2.php?page=admin/addWebData.php'>ADD CONTENT</a>";
	$adminuser = "<a href='base2.php?page=admin/newADMIN.php'>NEW ADMIN ACCOUNT</a>";
	$djuser = "<a href='base.php?page=PlayListDB/edit_dj.php'>NEW DJ</a>";
	$userspaceedit	= "<a href='base.php?page=userspaceeditor.php' title='Edit your Space' >My Clubhouse Space Editor</a>";
	$userspace	= "<a href='userspace.php' target = '_blank' title='My Clubhouse Space' >My Clubhouse Space</a>";
	$blog	="<a href='http://tonysclubhouse.blogspot.com/' target='chblog' title='Clubhouse Blog' >Clubhouse Blog</a>";
	$mobile	="<a href='http://clubhousemobile.kingplus.com/' title='Clubhouse Mobile' >Mobile Site</a>";
	$store = "<a href='base.php?page=clubhouse_store.html' title='The Clubhouse Store' >The Clubhouse Store</a>";
	$plscreate = "<a href='http://kingplus.com/clubhouse/pls_create.php' target='blank' title='Regenerate the playlist.pls file' >UPDATE PLS</a>";	
	$logfiles ="<a href='logs/logs.html' target='blank' title='View Log Files' >Logs</a>"; 
	$request_form  = "<a href='base.php?page=request_form.php'  title='Send Us your Requests'>Requests & Shouts</a>";
	$spacer = "";
	$promo = "<a href='base.php?page=promo/promos.html' title='Promos and Upcoming Events' >What's Happening!</a>";

	$USERTYPE = $_SESSION['user_type'];
	if (isset($_SESSION['user_name'])){
		if($USERTYPE=="MEMBER"){$menuarray = array($home,$mobile,$profile,$playlists,$promo,$request_form,$twitter,$blog,	 $memberlist,$userspace,$userspaceedit,$vault_unlocked,$store,$arcade,$contacts, $sign_out, $spacer);}
		elseif($USERTYPE=="GUEST_DJ"){$menuarray = array($home,$mobile,$playlists,$promo,$request_form,$twitter,$blog,$profile,$store,$vault_unlocked,$arcade,$contacts,  $sign_out, $spacer);}
		elseif($USERTYPE=="DJ"){$menuarray = array($home,$mobile,$profile,$playlists,$promo,$request_form,$twitter,$blog,$store,$vault_unlocked,$spacer,$emailmembers,$arcade,$contacts,  $sign_out, $spacer);}
		elseif($USERTYPE=="HOST"){$menuarray = array($home,$mobile,$profile,$playlists,$promo,$twitter,$blog,$request_form,$memberlist,$userspace,$userspaceedit,$store,$vault_unlocked, $contacts,$spacer,$Editplaylists,$emailmembers,$djuser,$newsadmin, $addcontent,$editcontent,$adminuser,$plscreate,  $logfiles,$sign_out, $spacer);}
		elseif($USERTYPE=="ADMIN"){$menuarray = array($home,$mobile,$playlists,$promo,$twitter,$blog,$request_form,$store,$vault_unlocked,$newsadmin, $addcontent,$editcontent,$adminuser,$plscreate,  $spacer,$emailmembers,$contacts,$logfiles, $sign_out, $spacer);}
		else{$menuarray = array($home,$mobile,$register,$playlists,$promo,$twitter,$blog,$request_form,$store,$vault_locked,$arcade,$contacts, $spacer);}	

	}else{
	$menuarray = array($home,$mobile,$register,$playlists,$promo,$twitter,$blog,$request_form,$store,$vault_locked,$contacts, $spacer);
	}
?>	
	  <TABLE class="newstable" id="Table3" cellSpacing="0" cellPadding="0" width="100%" border="0">
        <TBODY>
          <tr> 
            <td align="center">TONY'S CLUBHOUSE</td>
          </tr>
       </TBODY>
     </TABLE>	  
	 <TABLE class="newstable" id="Table3" cellSpacing="0" cellPadding="0" width="100%" border="0">
        <TBODY>
		  <tr>
		  	<div id='navcontainer'>
				<ul>
				  <?php
						foreach ($menuarray as $item) {
							echo "<li>";
							echo "$item";
							echo "</li>";
						}
					?>
				</ul>
			</div>
		</tr>
       </TBODY>
     </TABLE>
	  




						