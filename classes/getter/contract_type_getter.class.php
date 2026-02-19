<?php
/**
* Type:     	Cite CMS Core Getter Class<br>
* Name:    	contract_typeGetter<br>
* Purpose:  	For all Contract Type fields<br>
* @author    Cite CMS Module Developer
* @access Public
* @package CiteCMS
* @version 1.0
* @Copyright 2006 Cite Software Solutions 
* @link http://www.citecsoftware.com
*/
class contract_type_getter {

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_contract_type_id<br>
	 	* Purpose:  Returns contract_type_id Database field<br>
	 	*
	 	* @author Cite CMS Developer Module
	 	* @return String last_modified
		 *
		*/
 function get_contract_type_id(){
		return $this->fields['contract_type_id'];
	}
	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_contract_type_name<br>
	 	* Purpose:  Fetch contract_type_name Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String contract_type_name
		 *
		*/
	function get_contract_type_name() {
		return $this->fields['contract_type_name'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_contract_type_text<br>
	 	* Purpose:  Fetch contract_type_text Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String contract_type_text
		 *
		*/
	function get_contract_type_text() {
		return $this->fields['contract_type_text'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_contract_type_rate<br>
	 	* Purpose:  Fetch contract_type_rate Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String contract_type_rate
		 *
		*/
	function get_contract_type_rate() {
		return $this->fields['contract_type_rate'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_contract_type_term<br>
	 	* Purpose:  Fetch contract_type_term Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String contract_type_term
		 *
		*/
	function get_contract_type_term() {
		return $this->fields['contract_type_term'];
	}

    function get_contract_to_company_increament() {
        return $this->fields['contract_to_company_increament'];
    }

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_contract_type_active<br>
	 	* Purpose:  Fetch contract_type_active Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String contract_type_active
		 *
		*/
	function get_contract_type_active() {
		return $this->fields['contract_type_active'];
	}

	function get_contract_type_covered_labor() {
		return $this->fields['contract_type_covered_labor'];
	}

    function get_contract_type_covered_labor_rate() {
		return $this->fields['contract_type_covered_labor_rate'];
	}

    function get_contract_type_non_covered_labor_rate() {
		return $this->fields['contract_type_non_covered_labor_rate'];
	}

    function get_contract_type_call_min() {
		return $this->fields['contract_type_call_min'];
	}

    function get_contract_type_call_covered_rate() {
		return $this->fields['contract_type_call_covered_rate'];
	}

   function get_contract_type_call_non_covered_rate() {
		return $this->fields['contract_type_call_non_covered_rate'];
	}

}
?>