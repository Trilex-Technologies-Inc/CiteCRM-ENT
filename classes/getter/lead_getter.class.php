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
class lead_getter {

	function get_lead_id() {
		return $this->fields['lead_id'];
	}

	function get_lead_type_id() {
		return $this->fields['lead_type_id'];
	}

	function get_lead_status_id() {
		return $this->fields['lead_status_id'];
	}

	function get_lead_assigned_user() {
		return $this->fields['lead_assigned_user'];
	}

	function get_company_id() {
		return $this->fields['company_id'];
	}

	function get_lead_referer() {
		return $this->fields['lead_referer'];
	}

	function get_lead_campaign() {
		return $this->fields['lead_campaign'];
	}

	function get_lead_description() {
		return $this->fields['lead_description'];
	}

	function get_lead_create_date() {
		return $this->fields['lead_create_date'];
	}

	function get_last_modifed() {
		return $this->fields['last_modifed'];
	}



}


?>