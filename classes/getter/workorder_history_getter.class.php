<?php
/**
* Type:     	Cite CMS Core Getter Class<br>
* Name:    	workorder_historyGetter<br>
* Purpose:  	For all Work Order History fields<br>
* @author    Cite CMS Module Developer
* @access Public
* @package CiteCMS
* @version 1.0
* @Copyright 2006 Cite Software Solutions 
* @link http://www.citecsoftware.com
*/
class workorder_history_getter {

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_workorder_history_id<br>
	 	* Purpose:  Returns workorder_history_id Database field<br>
	 	*
	 	* @author Cite CMS Developer Module
	 	* @return String last_modified
		 *
		*/
 function get_workorder_history_id(){
		return $this->fields['workorder_history_id'];
	}
	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_workorder_id<br>
	 	* Purpose:  Fetch workorder_id Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String workorder_id
		 *
		*/
	function get_workorder_id() {
		return $this->fields['workorder_id'];
	}

	function get_user_id() {
		return $this->fields['user_id'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_workorder_history_text<br>
	 	* Purpose:  Fetch workorder_history_text Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String workorder_history_text
		 *
		*/
	function get_workorder_history_text() {
		return $this->fields['workorder_history_text'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_workorder_history_create_date<br>
	 	* Purpose:  Fetch workorder_history_create_date Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String workorder_history_create_date
		 *
		*/
	function get_workorder_history_create_date() {
		return $this->fields['workorder_history_create_date'];
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