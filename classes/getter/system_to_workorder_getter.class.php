<?php
/**
* Type:     	Cite CMS Core Getter Class<br>
* Name:    	system_to_workorderGetter<br>
* Purpose:  	For all System To Workorder fields<br>
* @author    Cite CMS Module Developer
* @access Public
* @package CiteCMS
* @version 1.0
* @Copyright 2006 Cite Software Solutions 
* @link http://www.citecsoftware.com
*/
class system_to_workorder_getter {

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_system_to_workorder_id<br>
	 	* Purpose:  Returns system_to_workorder_id Database field<br>
	 	*
	 	* @author Cite CMS Developer Module
	 	* @return String last_modified
		 *
		*/
 function get_system_to_workorder_id(){
		return $this->fields['system_to_workorder_id'];
	}
	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_system_id<br>
	 	* Purpose:  Fetch system_id Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String system_id
		 *
		*/
	function get_system_id() {
		return $this->fields['system_id'];
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