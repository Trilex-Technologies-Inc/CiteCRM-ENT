<?php
/**
* Type:     	Cite CMS Core Getter Class<br>
* Name:    	calendarGetter<br>
* Purpose:  	For all Calendar fields<br>
* @author    Cite CMS Module Developer
* @access Public
* @package CiteCMS
* @version 1.0
* @Copyright 2006 Cite Software Solutions 
* @link http://www.citecsoftware.com
*/
class calendar_getter {

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_calendar_id<br>
	 	* Purpose:  Returns calendar_id Database field<br>
	 	*
	 	* @author Cite CMS Developer Module
	 	* @return String last_modified
		 *
		*/
 function get_calendar_id(){
		return $this->fields['calendar_id'];
	}
	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_calendar_year<br>
	 	* Purpose:  Fetch calendar_year Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String calendar_year
		 *
		*/
	function get_calendar_year() {
		return $this->fields['calendar_year'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_calendar_month<br>
	 	* Purpose:  Fetch calendar_month Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String calendar_month
		 *
		*/
	function get_calendar_month() {
		return $this->fields['calendar_month'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_calendar_day<br>
	 	* Purpose:  Fetch calendar_day Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String calendar_day
		 *
		*/
	function get_calendar_day() {
		return $this->fields['calendar_day'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_calendar_hour<br>
	 	* Purpose:  Fetch calendar_hour Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String calendar_hour
		 *
		*/
	function get_calendar_hour() {
		return $this->fields['calendar_hour'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_calendar_min<br>
	 	* Purpose:  Fetch calendar_min Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String calendar_min
		 *
		*/
	function get_calendar_min() {
		return $this->fields['calendar_min'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_calendar_type<br>
	 	* Purpose:  Fetch calendar_type Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String calendar_type
		 *
		*/
	function get_calendar_type() {
		return $this->fields['calendar_type'];
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
        if($this->fields['user_id'] == '0') {
            return 'Un Assigned';
        } else {
		  return $this->fields['user_id'];
        }
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_calendar_title<br>
	 	* Purpose:  Fetch calendar_title Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String calendar_title
		 *
		*/
	function get_calendar_title() {
		return $this->fields['calendar_title'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_calendar_text<br>
	 	* Purpose:  Fetch calendar_text Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String calendar_text
		 *
		*/
	function get_calendar_text() {
		return $this->fields['calendar_text'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_calendar_avtive<br>
	 	* Purpose:  Fetch calendar_avtive Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String calendar_avtive
		 *
		*/
	function get_calendar_avtive() {
		return $this->fields['calendar_avtive'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_calendar_private<br>
	 	* Purpose:  Fetch calendar_private Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String calendar_private
		 *
		*/
	function get_calendar_private() {
		return $this->fields['calendar_private'];
	}

	function get_calendar_event_type(){
		return $this->fields['calendar_event_type'];
	}

	function get_calendar_event_id() {
		return $this->fields['calendar_event_id'];
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