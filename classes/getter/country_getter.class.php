<?php
/**
* Type:     	Cite CMS Core Getter Class<br>
* Name:    	countryGetter<br>
* Purpose:  	For all Country fields<br>
* @author    Cite CMS Module Developer
* @access Public
* @package CiteCMS
* @version 1.0
* @Copyright 2006 Cite Software Solutions 
* @link http://www.citecsoftware.com
*/
class country_getter {

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_country_id<br>
	 	* Purpose:  Returns country_id Database field<br>
	 	*
	 	* @author Cite CMS Developer Module
	 	* @return String last_modified
		 *
		*/
 function get_country_id(){
		return $this->fields['country_id'];
	}
	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_country_code<br>
	 	* Purpose:  Fetch country_code Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String country_code
		 *
		*/
	function get_country_code() {
		return $this->fields['country_code'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_country_text<br>
	 	* Purpose:  Fetch country_text Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String country_text
		 *
		*/
	function get_country_text() {
		return $this->fields['country_text'];
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