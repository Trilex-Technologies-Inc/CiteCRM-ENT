<?php
/**
* Type:     	Cite CMS Core Getter Class<br>
* Name:    	check_paymentGetter<br>
* Purpose:  	For all Check Payment fields<br>
* @author    Cite CMS Module Developer
* @access Public
* @package CiteCMS
* @version 1.0
* @Copyright 2006 Cite Software Solutions 
* @link http://www.citecsoftware.com
*/
class check_payment_getter {

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_check_payment_id<br>
	 	* Purpose:  Returns check_payment_id Database field<br>
	 	*
	 	* @author Cite CMS Developer Module
	 	* @return String last_modified
		 *
		*/
 function get_check_payment_id(){
		return $this->fields['check_payment_id'];
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
	 	* Name:     get_check_payment_amount<br>
	 	* Purpose:  Fetch check_payment_amount Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String check_payment_amount
		 *
		*/
	function get_check_payment_amount() {
		return $this->fields['check_payment_amount'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_check_payment_number<br>
	 	* Purpose:  Fetch check_payment_number Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String check_payment_number
		 *
		*/
	function get_check_payment_number() {
		return $this->fields['check_payment_number'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_check_payment_enter_by<br>
	 	* Purpose:  Fetch check_payment_enter_by Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String check_payment_enter_by
		 *
		*/
	function get_check_payment_enter_by() {
		return $this->fields['check_payment_enter_by'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_check_payment_date<br>
	 	* Purpose:  Fetch check_payment_date Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String check_payment_date
		 *
		*/
	function get_check_payment_date() {
		return $this->fields['check_payment_date'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_check_payment_status<br>
	 	* Purpose:  Fetch check_payment_status Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String check_payment_status
		 *
		*/
	function get_check_payment_status() {
		return $this->fields['check_payment_status'];
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