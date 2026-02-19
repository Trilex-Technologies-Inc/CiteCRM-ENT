<?php
/**
* Type:     	Cite CMS Core Getter Class<br>
* Name:    	projectGetter<br>
* Purpose:  	For all Project fields<br>
* @author    Cite CMS Module Developer
* @access Public
* @package CiteCMS
* @version 1.0
* @Copyright 2006 Cite Software Solutions 
* @link http://www.citecsoftware.com
*/
class project_getter {

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_project_id<br>
	 	* Purpose:  Returns project_id Database field<br>
	 	*
	 	* @author Cite CMS Developer Module
	 	* @return String last_modified
		 *
		*/
 function get_project_id(){
		return $this->fields['project_id'];
	}
	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_project_name<br>
	 	* Purpose:  Fetch project_name Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String project_name
		 *
		*/
	function get_project_name() {
		return $this->fields['project_name'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_project_status_id<br>
	 	* Purpose:  Fetch project_status_id Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String project_status_id
		 *
		*/
	function get_project_status_id() {
		return $this->fields['project_status_id'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_project_create_date<br>
	 	* Purpose:  Fetch project_create_date Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String project_create_date
		 *
		*/
	function get_project_create_date() {
		return $this->fields['project_create_date'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_project_completed_date<br>
	 	* Purpose:  Fetch project_completed_date Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String project_completed_date
		 *
		*/
	function get_project_completed_date() {
		return $this->fields['project_completed_date'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_project_type_id<br>
	 	* Purpose:  Fetch project_type_id Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String project_type_id
		 *
		*/
	function get_project_type_id() {
		return $this->fields['project_type_id'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_project_web_address<br>
	 	* Purpose:  Fetch project_web_address Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String project_web_address
		 *
		*/
	function get_project_web_address() {
		return $this->fields['project_web_address'];
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