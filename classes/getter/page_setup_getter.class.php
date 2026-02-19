<?php
/**
* Type:    		Cite CMS Core Getter Class<br>
* Name:    		page_setup_getter.class.php<br>
* Purpose:  	For all Project Type fields<br>
* @author    	Cite CMS Module Developer
* @access Public
* @package CiteCMS
* @version 1.0
* @Copyright 2006 Cite Software Solutions 
* @link http://www.citecsoftware.com
*/
class  page_setup_getter {

	/**
	* Type:     Public Getter<br>
	* Name:     get_page_setup_id<br>
	* Purpose:  Returns page_setup_id Database field<br>
	*
	* @author Cite CMS Developer Module
	* @return String page_setup_id
	*
	*/
	function get_page_setup_id() {
		return $this->fields['page_setup_id'];
	}
	
	
	/**
	* Type:     Public Getter<br>
	* Name:     get_page_setup_name<br>
	* Purpose:  Returns page_setup_name Database field<br>
	*
	* @author Cite CMS Developer Module
	* @return String page_setup_name
	*
	*/
	function get_page_setup_name() {
		return $this->fields['page_setup_name'];
	}
	
	
	/**
	* Type:     Public Getter<br>
	* Name:     get_page_setup_display_name<br>
	* Purpose:  Returns page_setup_display_name Database field<br>
	*
	* @author Cite CMS Developer Module
	* @return String page_setup_display_name
	*
	*/
	function get_page_setup_display_name() {
		return $this->fields['page_setup_display_name'];
	}
	
	
	/**
	* Type:     Public Getter<br>
	* Name:     get_page_setup_page_title<br>
	* Purpose:  Returns page_setup_page_title Database field<br>
	*
	* @author Cite CMS Developer Module
	* @return String page_setup_page_title
	*
	*/
	function get_page_setup_page_title() {
		return $this->fields['page_setup_page_title'];
	}
	
	
	/**
	* Type:     Public Getter<br>
	* Name:     get_page_setup_description<br>
	* Purpose:  Returns page_setup_description Database field<br>
	*
	* @author Cite CMS Developer Module
	* @return String page_setup_description
	*
	*/
	function get_page_setup_description() {
		return $this->fields['page_setup_description'];
	} 
	
	
	/**
	* Type:     Public Getter<br>
	* Name:     get_page_setup_keywords<br>
	* Purpose:  Returns page_setup_keywords Database field<br>
	*
	* @author Cite CMS Developer Module
	* @return String page_setup_keywords
	*
	*/
	function get_page_setup_keywords() {
		return $this->fields['page_setup_keywords'];
	}
	
	
	/**
	* Type:     Public Getter<br>
	* Name:     get_page_setup_order<br>
	* Purpose:  Returns page_setup_order Database field<br>
	*
	* @author Cite CMS Developer Module
	* @return String page_setup_order
	*
	*/
	function get_page_setup_order() {
		return $this->fields['page_setup_order'];
	}
	
	
	/**
	* Type:     Public Getter<br>
	* Name:     get_page_setup_menu<br>
	* Purpose:  Returns page_setup_menu Database field<br>
	*
	* @author Cite CMS Developer Module
	* @return String page_setup_menu
	*
	*/
	function get_page_setup_menu() {
		return $this->fields['page_setup_menu'];
	} 
	
	
	/**
	* Type:     Public Getter<br>
	* Name:     get_page_setup_active<br>
	* Purpose:  Returns page_setup_active Database field<br>
	*
	* @author Cite CMS Developer Module
	* @return String page_setup_active
	*
	*/
	function get_page_setup_active() {
		return $this->fields['page_setup_active'];
	}
	
	
	/**
	* Type:     Public Getter<br>
	* Name:     get_page_views<br>
	* Purpose:  Returns page_views Database field<br>
	*
	* @author Cite CMS Developer Module
	* @return String page_views
	*
	*/
	function get_page_views() {
		return $this->fields['page_views'];
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
	function get_last_modified() {
		return $this->fields['last_modified'];
	}
}