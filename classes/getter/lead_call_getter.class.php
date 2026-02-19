<?php
/**
* Type:     	Cite CMS Core Getter Class<br>
* Name:    	lead_callGetter<br>
* Purpose:  	For all Lead Call fields<br>
* @author    Cite CMS Module Developer
* @access Public
* @package CiteCMS
* @version 1.0
* @Copyright 2006 Cite Software Solutions 
* @link http://www.citecsoftware.com
*/
class lead_call_getter {

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_lead_call_id<br>
	 	* Purpose:  Returns lead_call_id Database field<br>
	 	*
	 	* @author Cite CMS Developer Module
	 	* @return String last_modified
		 *
		*/
 function get_lead_call_id(){
		return $this->fields['lead_call_id'];
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
	 	* Name:     get_lead_call_subject<br>
	 	* Purpose:  Fetch lead_call_subject Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String lead_call_subject
		 *
		*/
	function get_lead_call_subject() {
		return $this->fields['lead_call_subject'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_lead_call_text<br>
	 	* Purpose:  Fetch lead_call_text Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String lead_call_text
		 *
		*/
	function get_lead_call_text() {
		return $this->fields['lead_call_text'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_lead_call_date<br>
	 	* Purpose:  Fetch lead_call_date Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String lead_call_date
		 *
		*/
	function get_lead_call_date() {
		return $this->fields['lead_call_date'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_lead_call_duration<br>
	 	* Purpose:  Fetch lead_call_duration Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String lead_call_duration
		 *
		*/
	function get_lead_call_duration() {
		return $this->fields['lead_call_duration'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_lead_call_by<br>
	 	* Purpose:  Fetch lead_call_by Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String lead_call_by
		 *
		*/
	function get_lead_call_by() {
		return $this->fields['lead_call_by'];
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