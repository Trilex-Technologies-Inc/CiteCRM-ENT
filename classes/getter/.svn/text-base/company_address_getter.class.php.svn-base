<?php
/**
* Type:     	Cite CMS Core Getter Class<br>
* Name:    	company_addressGetter<br>
* Purpose:  	For all Company Address fields<br>
* @author    Cite CMS Module Developer
* @access Public
* @package CiteCMS
* @version 1.0
* @Copyright 2006 Cite Software Solutions 
* @link http://www.citecsoftware.com
*/
class company_address_getter {

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_company_address_id<br>
	 	* Purpose:  Returns company_address_id Database field<br>
	 	*
	 	* @author Cite CMS Developer Module
	 	* @return String last_modified
		 *
		*/
 function get_company_address_id(){
		return $this->fields['company_address_id'];
	}
	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_company_id<br>
	 	* Purpose:  Fetch company_id Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String company_id
		 *
		*/
	function get_company_id() {
		return $this->fields['company_id'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_company_street_1<br>
	 	* Purpose:  Fetch company_street_1 Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String company_street_1
		 *
		*/
	function get_company_street_1() {
		return $this->fields['company_street_1'];
	}




	function get_company_address_type() {
		return $this->fields['company_address_type'];
	}



    function get_company_address_name() {
        if($this->fields['company_address_name'] == '') {
            $this->fields['company_address_name'] = $this->fields['company_address_type'];
        }

        return $this->fields['company_address_name'];
    }


	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_company_street_2<br>
	 	* Purpose:  Fetch company_street_2 Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String company_street_2
		 *
		*/
	function get_company_street_2() {
		return $this->fields['company_street_2'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_company_city<br>
	 	* Purpose:  Fetch company_city Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String company_city
		 *
		*/
	function get_company_city() {
		return $this->fields['company_city'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_company_state<br>
	 	* Purpose:  Fetch company_state Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String company_state
		 *
		*/
	function get_company_state() {
		return $this->fields['company_state'];
	}


	function get_company_state_code($state_id) {
		global $db;
		global $error;

		$q = "SELECT state_code FROM state WHERE state_id = " . $db->qstr($state_id);

		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}

		$state_name = $rs->fields['state_code'];

		return $state_name;

	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_company_postal_code<br>
	 	* Purpose:  Fetch company_postal_code Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String company_postal_code
		 *
		*/
	function get_company_postal_code() {
		return $this->fields['company_postal_code'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_company_country<br>
	 	* Purpose:  Fetch company_country Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String company_country
		 *
		*/
	function get_company_country() {
		return $this->fields['company_country'];
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

    function get_company_name() {
        return $this->fields['company_name'];
    }

}
?>