<?php
/**
* Type:     	Cite CMS Core Getter Class<br>
* Name:    	user_typeGetter<br>
* Purpose:  	For all User Type fields<br>
* @author    Cite CMS Module Developer
* @access Public
* @package CiteCMS
* @version 1.0
* @Copyright 2006 Cite Software Solutions 
* @link http://www.citecsoftware.com
*/
class user_type_getter {

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_user_type_id<br>
	 	* Purpose:  Returns user_type_id Database field<br>
	 	*
	 	* @author Cite CMS Developer Module
	 	* @return String last_modified
		 *
		*/
 function get_user_type_id(){
		return $this->fields['user_type_id'];
	}
	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_user_type_text<br>
	 	* Purpose:  Fetch user_type_text Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String user_type_text
		 *
		*/
	function get_user_type_text() {
		return $this->fields['user_type_text'];
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