<?php 

	$subject = "zazzle";
	$headers =  "From: GPLEX <akiliking@yahoo.com>\nX-Mailer: PHP/" . phpversion(). "\r\n";
	$headers .= 'Bcc: akili.king@xo.com' . "\r\n";
	$html = "<!DOCTYPE html PUBLIC/"-//W3C//DTD XHTML 1.0 Transitional//EN/" /"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd/"><html>";
	$zazzle = "<div style='text-align: center; line-height: 150%'><a href='http://www.zazzle.com/akiliking*/product/235372747473333926?CMP=OTC-4DI168192205' target='_top'><img src='http://rdr.zazzle.com/img/imt-prd/pd-235372747473333926/isz-m/tl-I+love+house+music.jpg' style='border: 0px;' /></a><br /><a href='http://www.zazzle.com/akiliking*/product/235372747473333926?CMP=OTC-4DI168192205/" target=/"_top/">I love house music</a><br /></div>";
    
	$message = "$html  

Now that I have your attention.... How do i send HTML in an email?
	
This is an automated message, please do not reply!

$zazzle
"; 

     
    mail("akiliking@yahoo.com", $subject, $message, $headers); ?>
	
//		$zazzle = "<div style=/"text-align: center; line-height: 150%/"><a href=/"http://www.zazzle.com/akiliking*/product/235372747473333926?CMP=OTC-4DI168192205/" target=/"_top/"><img src=/"http://rdr.zazzle.com/img/imt-prd/pd-235372747473333926/isz-m/tl-I+love+house+music.jpg/" alt=/"I love house music shirt/" style=/"border: 0px;/" /></a><br /><a href=/"http://www.zazzle.com/akiliking*/product/235372747473333926?CMP=OTC-4DI168192205/" target=/"_top/">I love house music</a><br /></div>";
