<?php
/**
* Type:     	Cite CMS Core Getter Class<br>
* Name:    	lead_statusGetter<br>
* Purpose:  	For all Lead Status fields<br>
* @author    Cite CMS Module Developer
* @access Public
* @package CiteCMS
* @version 1.0
* @Copyright 2006 Cite Software Solutions 
* @link http://www.citecsoftware.com
*/
class support_call_getter {

	function get_support_call_id() {
		return $this->fields['support_call_id'];
	}
	function get_support_call_type() {
		return $this->fields['support_call_type'];
	}

	function get_support_call_type_id() {
		return $this->fields['support_call_type_id'];
	}

	function get_support_call_enter_by() {
		return $this->fields['support_call_enter_by'];
	}

	function get_support_call_start() {
		return $this->fields['support_call_start'];
	}
	function get_support_call_num_min() {
		return $this->fields['support_call_num_min'];
	}

	function get_support_calls_billing_rate() {
		return $this->fields['support_calls_billing_rate'];
	}

	function get_billed_amount(){
		$amount = $this->fields['support_calls_billing_rate'] * $this->fields['support_call_num_min'];
		return $amount;
		
	}

	function get_support_call_stop() {
		return $this->fields['support_call_stop'];
	}

	function get_support_call_notes() {
		return $this->fields['support_call_notes'];
	}

	function get_last_modified() {
		return $this->fields['last_modified'];
	}
}