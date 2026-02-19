<?php
/**
* Type:     	Cite CMS Core Getter Class<br>
* Name:    	stateGetter<br>
* Purpose:  	For all State fields<br>
* @author    Cite CMS Module Developer
* @access Public
* @package CiteCMS
* @version 1.0
* @Copyright 2006 Cite Software Solutions 
* @link http://www.citecsoftware.com
*/
class state_getter {

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_state_id<br>
	 	* Purpose:  Returns state_id Database field<br>
	 	*
	 	* @author Cite CMS Developer Module
	 	* @return String last_modified
		 *
		*/
 function get_state_id(){
		return $this->fields['state_id'];
	}
	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_country_id<br>
	 	* Purpose:  Fetch country_id Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String country_id
		 *
		*/
	function get_country_id() {
		return $this->fields['country_id'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_state_code<br>
	 	* Purpose:  Fetch state_code Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String state_code
		 *
		*/
	function get_state_code() {
		return $this->fields['state_code'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_state_text<br>
	 	* Purpose:  Fetch state_text Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String state_text
		 *
		*/
	function get_state_text() {
		return $this->fields['state_text'];
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