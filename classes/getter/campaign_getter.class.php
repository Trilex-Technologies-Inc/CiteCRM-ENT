<?php
/**
* Type:     	Cite CMS Core Getter Class<br>
* Name:    	campaignGetter<br>
* Purpose:  	For all Campaign fields<br>
* @author    Cite CMS Module Developer
* @access Public
* @package CiteCMS
* @version 1.0
* @Copyright 2006 Cite Software Solutions 
* @link http://www.citecsoftware.com
*/
class campaign_getter {

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_campaign_id<br>
	 	* Purpose:  Returns campaign_id Database field<br>
	 	*
	 	* @author Cite CMS Developer Module
	 	* @return String last_modified
		 *
		*/
 function get_campaign_id(){
		return $this->fields['campaign_id'];
	}
	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_campaign_type_id<br>
	 	* Purpose:  Fetch campaign_type_id Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String campaign_type_id
		 *
		*/
	function get_campaign_type_id() {
		return $this->fields['campaign_type_id'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_campaign_name<br>
	 	* Purpose:  Fetch campaign_name Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String campaign_name
		 *
		*/
	function get_campaign_name() {
		return $this->fields['campaign_name'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_campaign_start_date<br>
	 	* Purpose:  Fetch campaign_start_date Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String campaign_start_date
		 *
		*/
	function get_campaign_start_date() {
		return $this->fields['campaign_start_date'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_campaign_end_date<br>
	 	* Purpose:  Fetch campaign_end_date Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String campaign_end_date
		 *
		*/
	function get_campaign_end_date() {
		return $this->fields['campaign_end_date'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_campaign_cost<br>
	 	* Purpose:  Fetch campaign_cost Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String campaign_cost
		 *
		*/
	function get_campaign_cost() {
		return $this->fields['campaign_cost'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_campaign_active<br>
	 	* Purpose:  Fetch campaign_active Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String campaign_active
		 *
		*/
	function get_campaign_active() {
		return $this->fields['campaign_active'];
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
		
function get_campaign_description() {
	return $this->fields['campaign_description'];
}
 function get_last_modified(){
		return $this->fields['last_modified'];
	}

}
?>