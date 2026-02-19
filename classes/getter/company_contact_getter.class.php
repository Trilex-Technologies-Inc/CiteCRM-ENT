<?php
/**
* Type:     	Cite CMS Core Getter Class<br>
* Name:    	company_contactGetter<br>
* Purpose:  	For all Company Contact fields<br>
* @author    Cite CMS Module Developer
* @access Public
* @package CiteCMS
* @version 1.0
* @Copyright 2006 Cite Software Solutions 
* @link http://www.citecsoftware.com
*/
class company_contact_getter {

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_company_contact_id<br>
	 	* Purpose:  Returns company_contact_id Database field<br>
	 	*
	 	* @author Cite CMS Developer Module
	 	* @return String last_modified
		 *
		*/
 function get_company_contact_id(){
		return $this->fields['company_contact_id'];
	}
	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_company_id<br>
	 	* Purpose:  Fetch company_id Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String company_id
		 *
		*/
	function get_company_id() {
		return $this->fields['company_id'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_company_contact_type<br>
	 	* Purpose:  Fetch company_contact_type Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String company_contact_type
		 *
		*/
	function get_company_contact_type() {
		return $this->fields['company_contact_type'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_company_contact_value<br>
	 	* Purpose:  Fetch company_contact_value Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String company_contact_value
		 *
		*/
	function get_company_contact_value() {
		return $this->fields['company_contact_value'];
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