<?php
/**
* Type:     	Cite CMS Core Getter Class<br>
* Name:    	lead_typeGetter<br>
* Purpose:  	For all Lead Types fields<br>
* @author    Cite CMS Module Developer
* @access Public
* @package CiteCMS
* @version 1.0
* @Copyright 2006 Cite Software Solutions 
* @link http://www.citecsoftware.com
*/
class lead_type_getter {

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_lead_type_id<br>
	 	* Purpose:  Returns lead_type_id Database field<br>
	 	*
	 	* @author Cite CMS Developer Module
	 	* @return String last_modified
		 *
		*/
 function get_lead_type_id(){
		return $this->fields['lead_type_id'];
	}
	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_lead_type_text<br>
	 	* Purpose:  Fetch lead_type_text Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String lead_type_text
		 *
		*/
	function get_lead_type_text() {
		return $this->fields['lead_type_text'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_lead_type_active<br>
	 	* Purpose:  Fetch lead_type_active Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String lead_type_active
		 *
		*/
	function get_lead_type_active() {
		return $this->fields['lead_type_active'];
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