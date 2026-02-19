<?php
/**
* Type:     	Cite CMS Core Getter Class<br>
* Name:    	invoice_laborGetter<br>
* Purpose:  	For all Invoice Labor fields<br>
* @author    Cite CMS Module Developer
* @access Public
* @package CiteCMS
* @version 1.0
* @Copyright 2006 Cite Software Solutions 
* @link http://www.citecsoftware.com
*/
class invoice_labor_getter {

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_invoice_labor_id<br>
	 	* Purpose:  Returns invoice_labor_id Database field<br>
	 	*
	 	* @author Cite CMS Developer Module
	 	* @return String last_modified
		 *
		*/
 function get_invoice_labor_id(){
		return $this->fields['invoice_labor_id'];
	}
	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_invoice_id<br>
	 	* Purpose:  Fetch invoice_id Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String invoice_id
		 *
		*/
	function get_invoice_id() {
		return $this->fields['invoice_id'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_invoice_labor_hours<br>
	 	* Purpose:  Fetch invoice_labor_hours Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String invoice_labor_hours
		 *
		*/
	function get_invoice_labor_hours() {
		return $this->fields['invoice_labor_hours'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_invoice_labor_rate<br>
	 	* Purpose:  Fetch invoice_labor_rate Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String invoice_labor_rate
		 *
		*/
	function get_invoice_labor_rate() {
		return $this->fields['invoice_labor_rate'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_invoice_labor_description<br>
	 	* Purpose:  Fetch invoice_labor_description Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String invoice_labor_description
		 *
		*/
	function get_invoice_labor_description() {
		return $this->fields['invoice_labor_description'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_invoice_labor_sub_total<br>
	 	* Purpose:  Fetch invoice_labor_sub_total Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String invoice_labor_sub_total
		 *
		*/
	function get_invoice_labor_sub_total() {
		return $this->fields['invoice_labor_sub_total'];
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