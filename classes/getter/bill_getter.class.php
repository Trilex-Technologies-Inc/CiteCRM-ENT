<?php
/**
* Type:     	Cite CMS Core Getter Class<br>
* Name:    	billGetter<br>
* Purpose:  	For all Bills fields<br>
* @author    Cite CMS Module Developer
* @access Public
* @package CiteCMS
* @version 1.0
* @Copyright 2006 Cite Software Solutions 
* @link http://www.citecsoftware.com
*/
class bill_getter {

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_bill_id<br>
	 	* Purpose:  Returns bill_id Database field<br>
	 	*
	 	* @author Cite CMS Developer Module
	 	* @return String last_modified
		 *
		*/
 function get_bill_id(){
		return $this->fields['bill_id'];
	}
	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_vendor_id<br>
	 	* Purpose:  Fetch vendor_id Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String vendor_id
		 *
		*/
	function get_vendor_id() {
		return $this->fields['vendor_id'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_bill_date_create<br>
	 	* Purpose:  Fetch bill_date_create Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String bill_date_create
		 *
		*/
	function get_bill_date_create() {
		return $this->fields['bill_date_create'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_bill_due_date<br>
	 	* Purpose:  Fetch bill_due_date Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String bill_due_date
		 *
		*/
	function get_bill_due_date() {
		return $this->fields['bill_due_date'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_bill_amount_due<br>
	 	* Purpose:  Fetch bill_amount_due Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String bill_amount_due
		 *
		*/
	function get_bill_amount_due() {
		return $this->fields['bill_amount_due'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_bill_amount_paid<br>
	 	* Purpose:  Fetch bill_amount_paid Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String bill_amount_paid
		 *
		*/
	function get_bill_amount_paid() {
		return $this->fields['bill_amount_paid'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_bill_ref_num<br>
	 	* Purpose:  Fetch bill_ref_num Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String bill_ref_num
		 *
		*/
	function get_bill_ref_num() {
		return $this->fields['bill_ref_num'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_bill_memo<br>
	 	* Purpose:  Fetch bill_memo Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String bill_memo
		 *
		*/
	function get_bill_memo() {
		return $this->fields['bill_memo'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_bill_paid<br>
	 	* Purpose:  Fetch bill_paid Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String bill_paid
		 *
		*/
	function get_bill_paid() {
		return $this->fields['bill_paid'];
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