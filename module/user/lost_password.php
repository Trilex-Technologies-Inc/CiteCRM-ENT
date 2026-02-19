<?php


if(isset($_POST['submit'])) {
	require_once(CLASS_PATH."/core/user.class.php");
	require_once(ROOT_PATH."/include/phpmailer/class.phpmailer.php");
	
	$mail 			= new PHPMailer(); 
	$error		 	= false;	
	$userObj 		= new user();
	
	$user_email 	= $_POST['user_email'];	
	$code 			= $userObj->createVerificationCode();
	$ip 			= $core->getIP();
	$expire_date 	= mktime(date("H")+2,date("i"),0,date("m"),date("d"),date("Y"));
	$request_time	= date("M-d-Y G:i",time());
	$no_link		= ROOT_URL."/index.php?page=user:reset_password";
	$userObj->load_by_email($user_email);
	if(empty($user_email)){
		$smarty->assign('user_email',$user_email);
		$smarty->assign('errorMsg','No Such user was found');
		$smarty->display('user/lost_password.tpl');
		die;	
	}
	
	
	if($userObj->getUserID() > 0){
		if($user_email == 'demo@citecrm.com'){
			$error = true;
			$smarty->assign('user_email',$user_email);
			$smarty->assign('errorMsg','You can not reset the Demo Users password');
		} else {
			
			$userObj->save_password_reset($userObj->getUserID(),$code,$expire_date);
			$link = ROOT_URL."/index.php?page=user:reset_password&code=".$code;
			
			$expire_date = date("M-d-Y G:i",$expire_date);
			
			$mail->IsSMTP();                                   // send via SMTP
			$mail->Host     = "mail.citecrm.com"; // SMTP servers
			$mail->SMTPAuth = true;     // turn on SMTP authentication
			$mail->Username = "support@citecrm.com";  // SMTP username
			$mail->Password = "69hg34.5"; // SMTP password
			
			$mail->From     = "support@citecrm.com";
			$mail->FromName = "Cite CRM Support";
			
			$mail->AddAddress($user_email,$user_email); 
			
			$mail->AddReplyTo("support@citecrm.com","Cite CRM Support");
			
			$mail->WordWrap = 50;                              // set word wrap 
			$mail->IsHTML(true);                               // send as HTML
			
			$mail->Subject  =  "You Cite CRM Account Information";
			$mail->Body="<b>Thank you for contacting Cite CRM Account Support.</b><br>
				<p>You have asked us to reset your password.</p>				
				<p>You may reset your password using the link the below. This link is good for 2 hours and will expire $expire_date PST.<br>				
				<a href=\"$link\">$link</a><br>
				</p>		
				<p>If you can not click the link above go to the link $no_link and copy the reset code: $code and past it into the Reset Code box.</p>				
				<p>If you did not request the password reset please forward this email to support@citecrm.com and we will expire the link.
				<br>
				Request Sent at: $request_time<br>
				Request IP: $ip<br>
				Request Email: $user_email<br>
				Request Expire: $expire_date<br>
				</p>
				<p>If you have additional questions, please contact us at support@citecrm.com</p>
				<p>
				Thank you,<br>
				Cite CRM Account Support</p>";
			$mail->AltBody="Thank you for contacting Cite CRM Account Support.
				
You have asked us to reset your password.
				
You may reset your password using the link the below. This link is good for 2 hours and will expire $expire_date PST.
				
$link
				
If you can not click the link above go to the link $no_link and copy the reset code: $code and past it into the Reset Code box.
				
If you did not request the password reset please forward this email to support@citecrm.com and we will expire the link.
				
Request Sent at: $request_time
Request IP: $ip
Request Email: $user_email
Request Expire: $expire_date

If you have additional questions, please contact us at support@citecrm.com
				
Thank you,
Cite CRM Account Support";
			if(!$mail->Send()){
			   echo "Message was not sent <p>";
			   echo "Mailer Error: " . $mail->ErrorInfo;
			   exit;
			}
			
			
			//Send Admin Mail
			$mail = new PHPMailer(); 
			$mail->IsSMTP();                                   // send via SMTP
			$mail->Host     = "mail.citecrm.com"; // SMTP servers
			$mail->SMTPAuth = true;     // turn on SMTP authentication
			$mail->Username = "support@citecrm.com";  // SMTP username
			$mail->Password = "69hg34.5"; // SMTP password
			
			$mail->From     = "support@citecrm.com";
			$mail->FromName = "Cite CRM Support";
			
			$mail->AddAddress('support@citecrm.com','Cite CRM Support'); 
			
			$mail->AddReplyTo("support@citecrm.com","Cite CRM Support");
			
			$mail->WordWrap = 50;                              // set word wrap 
			$mail->IsHTML(true);                               // send as HTML
			
			$mail->Subject  =  "Password Reset Request";
			$mail->Body="
				Request Sent at: $request_time<br>
				Request IP: $ip<br>
				Request Email: $user_email<br>
				Request Expire: $expire_date<br>";
			$mail->AltBody="Request Sent at: $request_time
				Request IP: $ip
				Request Email: $user_email
				Request Expire: $expire_date";
			if(!$mail->Send()){
			   echo "Message was not sent <p>";
			   echo "Mailer Error: " . $mail->ErrorInfo;
			   exit;
			}
			
			$smarty->assign('sucsess',true);
			$smarty->assign('user_email',$user_email);
		
		}
		
		
		
		
	} else {
		$smarty->assign('user_email',$user_email);
		$smarty->assign('errorMsg','No Such user was found');	
	}
	
	$smarty->display('user/lost_password.tpl');

} else {

	$smarty->display('user/lost_password.tpl');

}

?>