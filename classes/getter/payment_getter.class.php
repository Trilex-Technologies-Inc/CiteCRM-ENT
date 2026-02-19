<?php
/**
* Type:     	Cite CMS Core Getter Class<br>
* Name:    	    Payment_Getter<br>
* Purpose:  	For all Payment fields<br>
* @author       Cite CMS Module Developer
* @access       Public
* @package      CiteCMS
* @version      1.0
* @Copyright    2006 Cite Software Solutions 
* @link         http://www.citecsoftware.com
*/
class payment_getter {

    //credit card
    function get_cc_payment_id() {
        return $this->fields['cc_payment_id'];
    }

    function get_invoice_id() {
        return $this->fields['invoice_id'];
    }

    function get_cc_payment_amount() {
        return $this->fields['cc_payment_amount'];
    }

    function get_cc_payment_number() {
        return $this->fields['cc_payment_number'];
    }

    function get_cc_payment_expirdate() {
        return $this->fields['cc_payment_expirdate'];
    }

    function get_cc_payment_enter_by() {
        return $this->fields['cc_payment_enter_by'];
    }

    function get_cc_payment_billing_attempt() {
        return $this->fields['cc_payment_billing_attempt'];
    }

    function get_cc_payment_status() {
        return $this->fields['cc_payment_status'];
    }

    function get_cc_payment_date() {
        return $this->fields['cc_payment_date'];
    }

    function get_cc_payment_date_proc() {
        return $this->fields['cc_payment_date_proc'];
    }


    // Check 
    function get_check_payment_id() {
        return $this->fields['check_payment_id'];
    }


    function get_check_payment_amount() {
        return $this->fields['check_payment_amount'];
    }

    function get_check_payment_number() {
        return $this->fields['check_payment_number'];
    }

    function get_check_payment_enter_by() {
        return $this->fields['check_payment_enter_by'];
    }

    function get_check_payment_date() {
        return $this->fields['check_payment_date'];
    }

    function get_check_payment_status() {
        return $this->fields['check_payment_status'];
    }

    function get_last_modified() {
        return $this->fields['last_modified'];
    }


   



}