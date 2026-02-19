<?php
/**
* Type:     	Cite CMS Core Getter Class<br>
* Name:    	systemGetter<br>
* Purpose:  	For all System fields<br>
* @author    Cite CMS Module Developer
* @access Public
* @package CiteCMS
* @version 1.0
* @Copyright 2006 Cite Software Solutions 
* @link http://www.citecsoftware.com
*/
class system_getter {

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_system_id<br>
	 	* Purpose:  Returns system_id Database field<br>
	 	*
	 	* @author Cite CMS Developer Module
	 	* @return String last_modified
		 *
		*/
 function get_system_id(){
		return $this->fields['system_id'];
	}
	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_system_manufacture_id<br>
	 	* Purpose:  Fetch system_manufacture_id Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String system_manufacture_id
		 *
		*/
	function get_system_manufacture_id() {
		return $this->fields['system_manufacture_id'];
	}

	function get_system_host_name(){
		return $this->fields['system_host_name'];
	}

	function get_system_ip_address() {
		return $this->fields['system_ip_address'];
	}


	function get_system_purchase_date() {
		return $this->fields['system_purchase_date'];
	}
	
	function get_operating_system_manufacture_id() {
		return $this->fields['operating_system_manufacture_id'];
	}
	
	function get_system_serial_num() {
		return $this->fields['system_serial_num'];
	}
	
	
	
	function get_operating_system_id() {
		return $this->fields['operating_system_id'];
	}
	
	
	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_system_model_id<br>
	 	* Purpose:  Fetch system_model_id Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String system_model_id
		 *
		*/
	function get_system_model_id() {
		return $this->fields['system_model_id'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_system_name<br>
	 	* Purpose:  Fetch system_name Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String system_name
		 *
		*/
	function get_system_name() {
		return $this->fields['system_name'];
	}

	function get_system_waranty_text() {
		return $this->fields['system_waranty_text'];
	}

	function get_system_warenty_expire_date() {
		return $this->fields['system_warenty_expire_date'];
	}

	function get_system_purchase_price() {
		return $this->fields['system_purchase_price'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_system_active<br>
	 	* Purpose:  Fetch system_active Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String system_active
		 *
		*/
	function get_system_active() {
		return $this->fields['system_active'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_system_last_service<br>
	 	* Purpose:  Fetch system_last_service Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String system_last_service
		 *
		*/
	function get_system_last_service() {
		return $this->fields['system_last_service'];
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