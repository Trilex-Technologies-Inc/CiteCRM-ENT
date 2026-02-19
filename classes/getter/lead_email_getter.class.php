<?php
/**
* Type:     	Cite CMS Core Getter Class<br>
* Name:    	lead_emailGetter<br>
* Purpose:  	For all Lead Email fields<br>
* @author    Cite CMS Module Developer
* @access Public
* @package CiteCMS
* @version 1.0
* @Copyright 2006 Cite Software Solutions 
* @link http://www.citecsoftware.com
*/
class lead_email_getter {

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_lead_email_id<br>
	 	* Purpose:  Returns lead_email_id Database field<br>
	 	*
	 	* @author Cite CMS Developer Module
	 	* @return String last_modified
		 *
		*/
 function get_lead_email_id(){
		return $this->fields['lead_email_id'];
	}
	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_lead_id<br>
	 	* Purpose:  Fetch lead_id Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String lead_id
		 *
		*/
	function get_lead_id() {
		return $this->fields['lead_id'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_mail_id<br>
	 	* Purpose:  Fetch mail_id Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String mail_id
		 *
		*/
	function get_mail_id() {
		return $this->fields['mail_id'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_lead_mail_sent_by<br>
	 	* Purpose:  Fetch lead_mail_sent_by Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String lead_mail_sent_by
		 *
		*/
	function get_lead_mail_sent_by() {
		return $this->fields['lead_mail_sent_by'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_lead_mail_date_sent<br>
	 	* Purpose:  Fetch lead_mail_date_sent Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String lead_mail_date_sent
		 *
		*/
	function get_lead_mail_date_sent() {
		return $this->fields['lead_mail_date_sent'];
	}

	function get_lead_email_has_reply() {
		return $this->fields['lead_email_has_reply'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_last_modified<br>
	 	* Purpose:  Returns last_modified Database field<br>
	 	*
	 	* @author Cite CMS Developer Module
	 	* @return String last_modified
		 *
		*/
 function get_last_modified(){
		return $this->fields['last_modified'];
	}

}
?>