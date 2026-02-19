<?php
/**
* Type:     	Cite CMS Core Getter Class<br>
* Name:    	project_typeGetter<br>
* Purpose:  	For all Project Type fields<br>
* @author    Cite CMS Module Developer
* @access Public
* @package CiteCMS
* @version 1.0
* @Copyright 2006 Cite Software Solutions 
* @link http://www.citecsoftware.com
*/
class project_type_getter {

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_project_type_id<br>
	 	* Purpose:  Returns project_type_id Database field<br>
	 	*
	 	* @author Cite CMS Developer Module
	 	* @return String last_modified
		 *
		*/
 function get_project_type_id(){
		return $this->fields['project_type_id'];
	}
	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_project_type_name<br>
	 	* Purpose:  Fetch project_type_name Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String project_type_name
		 *
		*/
	function get_project_type_name() {
		return $this->fields['project_type_name'];
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