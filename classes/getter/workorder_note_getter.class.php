<?php
/**
* Type:     	Cite CMS Core Getter Class<br>
* Name:    	workorder_noteGetter<br>
* Purpose:  	For all Work Order Note fields<br>
* @author    Cite CMS Module Developer
* @access Public
* @package CiteCMS
* @version 1.0
* @Copyright 2006 Cite Software Solutions 
* @link http://www.citecsoftware.com
*/
class workorder_note_getter {

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_workorder_note_id<br>
	 	* Purpose:  Returns workorder_note_id Database field<br>
	 	*
	 	* @author Cite CMS Developer Module
	 	* @return String last_modified
		 *
		*/
 function get_workorder_note_id(){
		return $this->fields['workorder_note_id'];
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
	 	* Name:     get_workorder_note_create_by<br>
	 	* Purpose:  Fetch workorder_note_create_by Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String workorder_note_create_by
		 *
		*/
	function get_workorder_note_create_by() {
		return $this->fields['workorder_note_create_by'];
	}

    function get_workorder_subject() {
        return $this->fields['workorder_subject'];
    }

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_workorder_note_text<br>
	 	* Purpose:  Fetch workorder_note_text Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String workorder_note_text
		 *
		*/
	function get_workorder_note_text() {
		return $this->fields['workorder_note_text'];
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
 function get_workorder_note_no_update(){
	return $this->fields['workorder_note_no_update'];
}

 function get_last_modified(){
		return $this->fields['last_modified'];
	}

}
?>