<?php
/**
* Type:     	Cite CMS Core Getter Class<br>
* Name:    	operating_systemGetter<br>
* Purpose:  	For all Operating System fields<br>
* @author    Cite CMS Module Developer
* @access Public
* @package CiteCMS
* @version 1.0
* @Copyright 2006 Cite Software Solutions 
* @link http://www.citecsoftware.com
*/
class operating_system_getter {

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_operating_system_id<br>
	 	* Purpose:  Returns operating_system_id Database field<br>
	 	*
	 	* @author Cite CMS Developer Module
	 	* @return String last_modified
		 *
		*/
 function get_operating_system_id(){
		return $this->fields['operating_system_id'];
	}
	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_operating_system_manufacture_id<br>
	 	* Purpose:  Fetch operating_system_manufacture_id Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String operating_system_manufacture_id
		 *
		*/
	function get_operating_system_manufacture_id() {
		return $this->fields['operating_system_manufacture_id'];
	}


	function get_operating_system_name() {
		return $this->fields['operating_system_name'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_operating_system_active<br>
	 	* Purpose:  Fetch operating_system_active Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String operating_system_active
		 *
		*/
	function get_operating_system_active() {
		return $this->fields['operating_system_active'];
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