<?php
/**
* Type:     	Cite CMS Core Getter Class<br>
* Name:    	tax_rateGetter<br>
* Purpose:  	For all Tax Rates fields<br>
* @author    Cite CMS Module Developer
* @access Public
* @package CiteCMS
* @version 1.0
* @Copyright 2006 Cite Software Solutions 
* @link http://www.citecsoftware.com
*/
class tax_rate_getter {

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_tax_rate_id<br>
	 	* Purpose:  Returns tax_rate_id Database field<br>
	 	*
	 	* @author Cite CMS Developer Module
	 	* @return String last_modified
		 *
		*/
 function get_tax_rate_id(){
		return $this->fields['tax_rate_id'];
	}
	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_tax_rate_zone_id<br>
	 	* Purpose:  Fetch tax_rate_zone_id Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String tax_rate_zone_id
		 *
		*/
	function get_tax_rate_zone_id() {
		return $this->fields['tax_rate_zone_id'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_tax_class_id<br>
	 	* Purpose:  Fetch tax_class_id Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String tax_class_id
		 *
		*/
	function get_tax_class_id() {
		return $this->fields['tax_class_id'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_tax_rate_priority<br>
	 	* Purpose:  Fetch tax_rate_priority Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String tax_rate_priority
		 *
		*/
	function get_tax_rate_priority() {
		return $this->fields['tax_rate_priority'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_tax_rate_value<br>
	 	* Purpose:  Fetch tax_rate_value Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String tax_rate_value
		 *
		*/
	function get_tax_rate_value() {
		return $this->fields['tax_rate_value'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_tax_rate_description<br>
	 	* Purpose:  Fetch tax_rate_description Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String tax_rate_description
		 *
		*/
	function get_tax_rate_description() {
		return $this->fields['tax_rate_description'];
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