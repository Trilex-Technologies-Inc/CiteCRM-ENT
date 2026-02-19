<?php

class autobill_getter {

	function get_autobill_id() {
		return $this->fields['autobill_id'];
	}
	
	function get_invoice_id() {
		return $this->fields['invoice_id'];
	}

	function get_autobill_amount() {
		return $this->fields['autobill_amount'];
	}

	function get_autobill_create_date() {
		return $this->fields['autobill_create_date'];
	}

	function get_autobill_start_date() {
		return $this->fields['autobill_start_date'];
	}

	function get_autobill_due_date() {
		return $this->fields['autobill_due_date'];
	}

	function get_autobill_status() {
		return $this->fields['autobill_status'];
	}

}
?>