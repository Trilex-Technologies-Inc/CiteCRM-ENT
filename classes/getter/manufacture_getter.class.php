<?php
/**
* Type:     	Cite CMS Core Getter Class<br>
* Name:    	manufactureGetter<br>
* Purpose:  	For all Manufacture fields<br>
* @author    Cite CMS Module Developer
* @access Public
* @package CiteCMS
* @version 1.0
* @Copyright 2006 Cite Software Solutions 
* @link http://www.citecsoftware.com
*/
class manufacture_getter {

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_manufacture_id<br>
	 	* Purpose:  Returns manufacture_id Database field<br>
	 	*
	 	* @author Cite CMS Developer Module
	 	* @return String last_modified
		 *
		*/
 function get_manufacture_id(){
		return $this->fields['manufacture_id'];
	}
	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_manufacture_name<br>
	 	* Purpose:  Fetch manufacture_name Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String manufacture_name
		 *
		*/
	function get_manufacture_name() {
		return $this->fields['manufacture_name'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_manufacture_image<br>
	 	* Purpose:  Fetch manufacture_image Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String manufacture_image
		 *
		*/
	function get_manufacture_image() {
		return $this->fields['manufacture_image'];
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