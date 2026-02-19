<?php
/**
* Type:     	Cite CMS Core Getter Class<br>
* Name:    	product_descriptionGetter<br>
* Purpose:  	For all Product Description fields<br>
* @author    Cite CMS Module Developer
* @access Public
* @package CiteCMS
* @version 1.0
* @Copyright 2006 Cite Software Solutions 
* @link http://www.citecsoftware.com
*/
class product_description_getter {

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_product_description_id<br>
	 	* Purpose:  Returns product_description_id Database field<br>
	 	*
	 	* @author Cite CMS Developer Module
	 	* @return String last_modified
		 *
		*/
 function get_product_description_id(){
		return $this->fields['product_description_id'];
	}
	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_product_id<br>
	 	* Purpose:  Fetch product_id Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String product_id
		 *
		*/
	function get_product_id() {
		return $this->fields['product_id'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_product_name<br>
	 	* Purpose:  Fetch product_name Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String product_name
		 *
		*/
	function get_product_name() {
		return $this->fields['product_name'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_product_description<br>
	 	* Purpose:  Fetch product_description Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String product_description
		 *
		*/
	function get_product_description() {
		return $this->fields['product_description'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_product_url<br>
	 	* Purpose:  Fetch product_url Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String product_url
		 *
		*/
	function get_product_url() {
		return $this->fields['product_url'];
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