<?php
/**
* Type:     	Cite CMS Core Getter Class<br>
* Name:    	invoiceGetter<br>
* Purpose:  	For all Invoice fields<br>
* @author    Cite CMS Module Developer
* @access Public
* @package CiteCMS
* @version 1.0
* @Copyright 2006 Cite Software Solutions 
* @link http://www.citecsoftware.com
*/
class invoice_getter {

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_invoice_id<br>
	 	* Purpose:  Returns invoice_id Database field<br>
	 	*
	 	* @author Cite CMS Developer Module
	 	* @return String last_modified
		 *
		*/
 function get_invoice_id(){
		return $this->fields['invoice_id'];
	}
	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_invoice_create_date<br>
	 	* Purpose:  Fetch invoice_create_date Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String invoice_create_date
		 *
		*/
	function get_invoice_create_date() {
		return $this->fields['invoice_create_date'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_invoice_create_by<br>
	 	* Purpose:  Fetch invoice_create_by Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String invoice_create_by
		 *
		*/
	function get_invoice_create_by() {
		return $this->fields['invoice_create_by'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_invoice_due_date<br>
	 	* Purpose:  Fetch invoice_due_date Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String invoice_due_date
		 *
		*/
	function get_invoice_due_date() {
		return $this->fields['invoice_due_date'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_invoice_amount<br>
	 	* Purpose:  Fetch invoice_amount Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String invoice_amount
		 *
		*/
	function get_invoice_amount() {
		return $this->fields['invoice_amount'];
	}

	function get_invoice_shipping_amount() {
		return $this->fields['invoice_shipping_amount'];
	}
	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_invoice_discount_amount<br>
	 	* Purpose:  Fetch invoice_discount_amount Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String invoice_discount_amount
		 *
		*/
	function get_invoice_discount_amount() {
		return $this->fields['invoice_discount_amount'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_invoice_total_amount<br>
	 	* Purpose:  Fetch invoice_total_amount Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String invoice_total_amount
		 *
		*/
    function get_invoice_tax_amount() {
        return $this->fields['invoice_tax_amount'];
    }

	function get_invoice_total_amount() {
		return $this->fields['invoice_total_amount'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_invoice_status<br>
	 	* Purpose:  Fetch invoice_status Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String invoice_status
		 *
		*/
	function get_invoice_status() {
		return $this->fields['invoice_status'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_invoice_paid_date<br>
	 	* Purpose:  Fetch invoice_paid_date Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String invoice_paid_date
		 *
		*/
	function get_invoice_paid_date() {
		return $this->fields['invoice_paid_date'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_invoice_paid_amount<br>
	 	* Purpose:  Fetch invoice_paid_amount Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String invoice_paid_amount
		 *
		*/
	function get_invoice_paid_amount() {
		return $this->fields['invoice_paid_amount'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_invoice_payment_type<br>
	 	* Purpose:  Fetch invoice_payment_type Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String invoice_payment_type
		 *
		*/
	function get_invoice_payment_type() {
		return $this->fields['invoice_payment_type'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_invoice_barcode<br>
	 	* Purpose:  Fetch invoice_barcode Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String invoice_barcode
		 *
		*/
	function get_invoice_barcode() {
		return $this->fields['invoice_barcode'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_invoice_payment_enter_by<br>
	 	* Purpose:  Fetch invoice_payment_enter_by Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String invoice_payment_enter_by
		 *
		*/
	function get_invoice_payment_enter_by() {
		return $this->fields['invoice_payment_enter_by'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_invoice_memo<br>
	 	* Purpose:  Fetch invoice_memo Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String invoice_memo
		 *
		*/
	function get_invoice_memo() {
		return $this->fields['invoice_memo'];
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

	

	function get_invoice_item_date(){
		return $this->fields['invoice_item_date'];
	}

	function get_account_type(){
		return $this->fields['account_type'];
	}

	function get_account_type_id(){
		return $this->fields['account_type_id'];
	}

	function get_invoice_item_type(){
		return $this->fields['invoice_item_type'];
	}

	function get_invoice_item_id(){
		return $this->fields['invoice_item_id'];
	}

	function get_invoice_item_qty(){
		return $this->fields['invoice_item_qty'];
	}

	function get_invoice_item_amount(){
		return $this->fields['invoice_item_amount'];
	}

	function get_invoice_item_description(){
		return $this->fields['invoice_item_description'];
	}

	function get_invoice_item_line_type(){
		return $this->fields['invoice_item_line_type'];
	}

	function get_invoice_item_subtotal(){
		return $this->fields['invoice_item_subtotal'];
	}

}
?>