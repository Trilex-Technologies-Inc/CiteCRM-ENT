<?php
/**
* Type:     	Cite CMS Core Getter Class<br>
* Name:    	tax_classGetter<br>
* Purpose:  	For all Tax Class fields<br>
* @author    Cite CMS Module Developer
* @access Public
* @package CiteCMS
* @version 1.0
* @Copyright 2006 Cite Software Solutions 
* @link http://www.citecsoftware.com
*/
class tax_class_getter {

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_tax_class_id<br>
	 	* Purpose:  Returns tax_class_id Database field<br>
	 	*
	 	* @author Cite CMS Developer Module
	 	* @return String last_modified
		 *
		*/
 function get_tax_class_id(){
		return $this->fields['tax_class_id'];
	}
	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_tax_class_title<br>
	 	* Purpose:  Fetch tax_class_title Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String tax_class_title
		 *
		*/
	function get_tax_class_title() {
		return $this->fields['tax_class_title'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_tax_class_description<br>
	 	* Purpose:  Fetch tax_class_description Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String tax_class_description
		 *
		*/
	function get_tax_class_description() {
		return $this->fields['tax_class_description'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_tax_type<br>
	 	* Purpose:  Fetch tax_type Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String tax_type
		 *
		*/
	function get_tax_type() {
		return $this->fields['tax_type'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_tax_class_active<br>
	 	* Purpose:  Fetch tax_class_active Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String tax_class_active
		 *
		*/
	function get_tax_class_active() {
		return $this->fields['tax_class_active'];
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