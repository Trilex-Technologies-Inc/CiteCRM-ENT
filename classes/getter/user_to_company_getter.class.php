<?php
/**
* Type:     	Cite CMS Core Getter Class<br>
* Name:    	user_to_companyGetter<br>
* Purpose:  	For all User To Company fields<br>
* @author    Cite CMS Module Developer
* @access Public
* @package CiteCMS
* @version 1.0
* @Copyright 2006 Cite Software Solutions 
* @link http://www.citecsoftware.com
*/
class user_to_company_getter {

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_user_to_company_id<br>
	 	* Purpose:  Returns user_to_company_id Database field<br>
	 	*
	 	* @author Cite CMS Developer Module
	 	* @return String last_modified
		 *
		*/
 function get_user_to_company_id(){
		return $this->fields['user_to_company_id'];
	}
	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_user_id<br>
	 	* Purpose:  Fetch user_id Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String user_id
		 *
		*/
	function get_user_id() {
		return $this->fields['user_id'];
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