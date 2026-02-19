<?php
/**
* Type:     	Cite CMS Core Getter Class<br>
* Name:    	workorderGetter<br>
* Purpose:  	For all Work Order fields<br>
* @author    Cite CMS Module Developer
* @access Public
* @package CiteCMS
* @version 1.0
* @Copyright 2006 Cite Software Solutions 
* @link http://www.citecsoftware.com
*/
class workorder_getter {

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_workorder_id<br>
	 	* Purpose:  Returns workorder_id Database field<br>
	 	*
	 	* @author Cite CMS Developer Module
	 	* @return String last_modified
		 *
		*/
 function get_workorder_id(){
		return $this->fields['workorder_id'];
	}
	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_workorder_open_date<br>
	 	* Purpose:  Fetch workorder_open_date Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String workorder_open_date
		 *
		*/
	function get_workorder_open_date() {
		return $this->fields['workorder_open_date'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_workorder_status<br>
	 	* Purpose:  Fetch workorder_status Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String workorder_status
		 *
		*/
	function get_workorder_status() {
		return $this->fields['workorder_status'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_workorder_active<br>
	 	* Purpose:  Fetch workorder_active Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String workorder_active
		 *
		*/
	function get_workorder_active() {
		return $this->fields['workorder_active'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_workorder_create_by<br>
	 	* Purpose:  Fetch workorder_create_by Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String workorder_create_by
		 *
		*/
	function get_workorder_create_by() {
		return $this->fields['workorder_create_by'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_workorder_assigned_to<br>
	 	* Purpose:  Fetch workorder_assigned_to Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String workorder_assigned_to
		 *
		*/
	function get_workorder_assigned_to() {
		return $this->fields['workorder_assigned_to'];
	}
	
	function get_workorder_assigned_to_name($user_id) {
		global $db;
		global $error;


		$q = "SELECT user_first_name, user_last_name FROM user WHERE user_id = " . $db->qstr($user_id);
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
		
		$name = $rs->fields['user_first_name'] . " " . $rs->fields['user_last_name'];

		return $name;
	}


	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_workorder_scope<br>
	 	* Purpose:  Fetch workorder_scope Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String workorder_scope
		 *
		*/
	function get_workorder_scope() {
		return $this->fields['workorder_scope'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_workorder_desription<br>
	 	* Purpose:  Fetch workorder_desription Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String workorder_desription
		 *
		*/
	function get_workorder_desription() {
		return $this->fields['workorder_desription'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_workorder_close_date<br>
	 	* Purpose:  Fetch workorder_close_date Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String workorder_close_date
		 *
		*/
	function get_workorder_close_date() {
		return $this->fields['workorder_close_date'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_workorder_close_by<br>
	 	* Purpose:  Fetch workorder_close_by Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String workorder_close_by
		 *
		*/
	function get_workorder_close_by() {
		return $this->fields['workorder_close_by'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_workorder_resolution<br>
	 	* Purpose:  Fetch workorder_resolution Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String workorder_resolution
		 *
		*/
	function get_workorder_resolution() {
		return $this->fields['workorder_resolution'];
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

 function get_company_id() {
 	return $this->fields['company_id'];
 }

	function get_company_name() {
		return $this->fields['company_name'];
	}
	
	
	function get_workorder_start_time() {
		return $this->fields['workorder_start_time'];
	}
	
	function get_workorder_end_time() {
		return $this->fields['workorder_end_time'];
	}
}
?>