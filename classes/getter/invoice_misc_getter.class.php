<?php

class invoice_misc_getter {

function get_invoice_misc_id() {
	return $this->fields['invoice_misc_id'];
}

function get_invoice_id() {
	return $this->fields['invoice_id'];
}

function get_invoice_misc_description() {
	return $this->fields['invoice_misc_description'];
}

function get_invoice_misc_qty() {
	return $this->fields['invoice_misc_qty'];
}

function get_invoice_misc_amount() {
	return $this->fields['invoice_misc_amount'];
}

function get_invoice_misc_subtotal() {
	return $this->fields['invoice_misc_subtotal'];
}

function get_last_modified() {
	return $this->fields['last_modified'];
}
}
?>