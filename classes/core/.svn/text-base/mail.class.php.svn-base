<?php
/** 
 * Type:     Cite CMS Core Class<br>
 * Name:     mail<br>
 * Purpose:  For all mail methods<br>
 * @author Jaimie Garner jaimie@citesoftware.com
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions 
 * @link http://www.citecsoftware.com
*/
class mail {

	/**
     * Class Constructor
	*/
	function mail() {}

	// Public Methods

	/** mailAdmin
	 *
	 * Type:     Public Method<br>
	 * Name:     mailAdmin<br>
	 * Purpose:  Emails the SITE_ADMIN a messages<br>
	 * Template: adminEmail.tpl
	 *
	 * @author jaimie@citesoftware.com
	 * @Param String  $msg | The Mail Message 
	 * @Param String $subject | The subject of the email
	 * 
	*/
	function mailAdmin($msg,$subject) {
	
		$messageArray = file(EMAIL_TEMPLATE.'/adminEmail.tpl');

		$message = implode('', $messageArray);

		$message = eregi_replace("%EMAILMSG%", 	$msg, $message);
		
		$message = eregi_replace("%SITE_NAME%", 	SITE_NAME, $message);
		
		$this->fields["mail_body"] 					= $message;
		
		$this->fields["mail_subject"]				= $subject;
		
		$this->fields["mail_to_email"] 				= SITE_EMAIL_ADMIN;
		
       	$this->fields["mail_to_name"] 				= SITE_NAME . ' Admin';
       	
		$this->fields["mail_from_email"] 			= SITE_EMAIL;
		
		$this->fields["mail_from_name"] 			= SITE_EMAIL;
		
		$this->fields["mail_creation_unixtime"] 	= mktime();

        $this->_save();
	
	}
	

	function mail_contact($email_to,$email_name,$email_subject,$email_text){

		$messageArray = file(EMAIL_TEMPLATE.'/mail_contact.tpl');

		$message = implode('', $messageArray);

		$message = eregi_replace("%EMAILMSG%", 	$email_text, $message);

		$message = eregi_replace("%SITE_NAME%", 	SITE_NAME, $message);

		$this->fields["mail_body"] 					= $message;

		$this->fields["mail_subject"]				= $email_subject;
		
		$this->fields["mail_to_email"] 				= $email_to;
		
       	$this->fields["mail_to_name"] 				= $email_name;
       	
		$this->fields["mail_from_email"] 			= SITE_EMAIL;
		
		$this->fields["mail_from_name"] 			= SITE_EMAIL;
		
		$this->fields["mail_creation_unixtime"] 	= mktime();

        $mail_id = $this->_save();

		return $mail_id;


	}

	
	/** sendActivationEmail
	 *
	 * Type:     Public Method<br>
	 * Name:     sendActivationEmail<br>
	 * Purpose:  Emails the Activation code to a new user<br>
	 * Template: activation.tpl
	 *
	 * @author jaimie@citesoftware.com
	 * @Param Object  $userObject | The User Object 
	 * 
	*/
	function sendActivationEmail($userObject) {

 		$messageArray = file(EMAIL_TEMPLATE.'/activation.tpl');
		
		require_once(CLASS_PATH."/core/user_address.class.php");
		
		$address = new user_address();
		
		$address->loadByAddressType( 'Home','', $userObject->getUserID());
		
        // first line is the subject
		// second line is nothing

        $messageArray = array_reverse($messageArray);

        $this->fields["mail_subject"] = array_pop($messageArray);

        array_pop($messageArray);

        $messageArray = array_reverse($messageArray);

        $message = implode('', $messageArray);

        $message = eregi_replace("%FIRSTNAME%", 	$userObject->getUserFirstName(), $message);

        $message = eregi_replace("%LASTNAME%", 	$userObject->getUserLastName(), $message);

        $message = eregi_replace("%COMPANY%", 		$userObject->getUserCompany(), $message);

        $message = eregi_replace("%ADDRESS%", 		$address->getAddressStreet(), $message);
        
		$message = eregi_replace("%ADDRESS2%", 	$address->getAddressStreet2(), $message);

       	$message = eregi_replace("%CITY%", 		$address->getAddressCity(), $message);
       	
        $message = eregi_replace("%STATE%", 		$address->getAddressState(), $message);
        
        $message = eregi_replace("%ZIP%", 			$address->getAddressPostalCode(), $message);

		$message = eregi_replace("%COUNTRY%", 		$address->getAddressCountry(), $message);

		//$message = eregi_replace("%PHONE%", 			contact::getUserHomePhone($userObject->getUserID()), $message);

		$message = eregi_replace("%USERNAME%", 	$userObject->getUserUsername(), $message);

		$message = eregi_replace("%ACTIVATIONCODE%", $userObject->getUserActivationCode(), $message);

		$message = eregi_replace("%ACTIVATIONURL%",  ROOT_URL . "/index.php?page=user:activate_user", $message);

		$this->fields["mail_body"] = $message;

        $this->fields["mail_to_email"] = $userObject->getUserEmail();
        
       	$this->fields["mail_to_name"] = $userObject->getUserFirstName() . " " . $userObject->getUserLastName();
       	
		$this->fields["mail_from_email"] = SITE_EMAIL;
		
		$this->fields["mail_from_name"] = SITE_EMAIL;
		
		$this->fields["mail_creation_unixtime"] = mktime();

        $this->_save();

	}
	
	
	// Private Methods

	
	/** _save
	 *
	 * Type:     Private Method<br>
	 * Name:     _save<br>
	 * Purpose:  Saves email to DB<br>
	 *
	 * @author jaimie@citesoftware.com
	 *
	*/
	function _save() {
		global $db;
		global $error;
		
		$q = "INSERT INTO mail SET
				mail_to_email			= " . $db->qstr( $this->fields['mail_to_email'] 	) . " , 
				mail_to_name 			= " . $db->qstr( $this->fields['mail_to_name'] 	) . " ,
				mail_from_email 		= " . $db->qstr( $this->fields['mail_from_email']	) . " ,
				mail_from_name 			= " . $db->qstr( $this->fields['mail_from_name'] 	) . " ,
				mail_subject			= " . $db->qstr( $this->fields['mail_subject'] 		) . " , 
				mail_body 				= " . $db->qstr( $this->fields['mail_body'] 		) . " ,
				mail_creation_unixtime 	= " . $db->qstr( time() 							);
				
		if(!$rs = $db->Execute($q) ) {
			$error->dbError($db->ErrorMsg(), $q);
		}		
	
		$messageID = $db->Insert_ID();	

		// Coment out this line if you whish to use a cron Job to do the email. Then use the cron/mail.php Script in a crontab to email
		$this->_mailOne($messageID);
	
		return $messageID;
	}
	
	
	/** _mailOne
	 *
	 * Type:     Private Method<br>
	 * Name:    _mailOne<br>
	 * Purpose:  Emails A single email message<br>
	 *
	 * @author jaimie@citesoftware.com
	 *
	 * @Param String $messageID | The message ID 
	*/
	function _mailOne($messageID) {
		global $db;
		global $error;
		
		// Get Message
		$q = "SELECT * FROM mail WHERE mail_id = " . $db->qstr( $messageID );
		
		
		
		if(!$rs = $db->Execute($q) ) {
			$error->dbError($db->ErrorMsg(), $q);
		}
		
		
		$to			= $rs->fields['mail_to_email'];
		$subject	= $rs->fields['mail_subject'];
		$message	= $rs->fields['mail_body'];
	
	
		// To send HTML mail, the Content-type header must be set
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		// Additional headers
		$headers .= 'To: '.$rs->fields['mail_to_name'].' <'.$rs->fields['mail_to_email'].'>' . "\r\n";
		$headers .= 'From: '.$rs->fields['mail_from_name'].' <'.$rs->fields['mail_from_email'].'>' . "\r\n";


		// Mail it
		mail($to, $subject, $message, $headers);
			// Update that messages was sent
			$q = "UPDATE mail SET mail_deliverd = " . $db->qstr( time() ) . " WHERE mail_id = " . $db->qstr( $messageID );
			
			if(!$rs = $db->Execute($q) ) {
				$error->dbError($db->ErrorMsg(), $q);
			}
			
			
	}
	
	
	/** _mailAllNew
	 *
	 * Type:     Private Method<br>
	 * Name:    _mailAllNew<br>
	 * Purpose:  This should be ran from a cron Job to deliver all new mail messages in the DB<br>
	 *
	 * @author jaimie@citesoftware.com
	 *
	*/
	function _mailAllNew(){
	
	}

}

?>