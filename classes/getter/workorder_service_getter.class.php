<?php

/**
 * @author 
 * @copyright 2007
 */

class workorder_service_getter {
	
	function get_workorder_service_id() {
		return $this->fields['workorder_service_id'];
	}
		
	function get_workorder_id() {
		return $this->fields['workorder_id'];
	}
	
	function get_workorder_service_qty() {
		return $this->fields['workorder_service_qty'];
	}
	
	function get_workorder_service_description() {
		return $this->fields['workorder_service_description'];
	}
	
	function get_workorder_service_amount() {
		return $this->fields['workorder_service_amount'];
	}
	
	function get_workorder_service_total() {
		return $this->fields['workorder_service_total'];
	}
	
	function get_last_modified() {
		return $this->fields['last_modified'];
	}
}

?>