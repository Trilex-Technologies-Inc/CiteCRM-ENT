<?php
/**
* Type:     	Cite CMS Core Getter Class<br>
* Name:    	workorder_commentGetter<br>
* Purpose:  	For all Work Order Comment fields<br>
* @author    Cite CMS Module Developer
* @access Public
* @package CiteCMS
* @version 1.0
* @Copyright 2006 Cite Software Solutions 
* @link http://www.citecsoftware.com
*/
class workorder_comment_getter {

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_workorder_comment_id<br>
	 	* Purpose:  Returns workorder_comment_id Database field<br>
	 	*
	 	* @author Cite CMS Developer Module
	 	* @return String last_modified
		 *
		*/
 function get_workorder_comment_id(){
		return $this->fields['workorder_comment_id'];
	}
	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_workorder_id<br>
	 	* Purpose:  Fetch workorder_id Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String workorder_id
		 *
		*/
	function get_workorder_id() {
		return $this->fields['workorder_id'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_workorder_comment_create_by<br>
	 	* Purpose:  Fetch workorder_comment_create_by Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String workorder_comment_create_by
		 *
		*/
	function get_workorder_comment_create_by() {
		return $this->fields['workorder_comment_create_by'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_workorder_comment_text<br>
	 	* Purpose:  Fetch workorder_comment_text Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String workorder_comment_text
		 *
		*/
	function get_workorder_comment_text() {
		return $this->fields['workorder_comment_text'];
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

}
?>