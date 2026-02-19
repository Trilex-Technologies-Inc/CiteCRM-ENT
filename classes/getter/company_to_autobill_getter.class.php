<?php

class company_to_autobill_getter {

	function get_company_to_autobill_id() {
		return $this->fields['company_to_autobill_id'];
	}
	
	function get_autobill_id() {
		return $this->fields['autobill_id'];
	}
	
	function get_contract_to_company_id() {
		return $this->fields['contract_to_company_id'];
	}
	
	function get_company_id() {
		return $this->fields['company_id'];
	}
	
	function get_company_to_autobill_active() {
		return $this->fields['company_to_autobill_active'];
	}
	
	function get_last_modified() {
		return $this->fields['last_modified'];
	}

}

?>