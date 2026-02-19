<?php
/**
* Type:     	Cite CMS Core Getter Class<br>
* Name:    	noteGetter<br>
* Purpose:  	For all Notes fields<br>
* @author    Cite CMS Module Developer
* @access Public
* @package CiteCMS
* @version 1.0
* @Copyright 2006 Cite Software Solutions 
* @link http://www.citecsoftware.com
*/
class note_getter {

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_note_id<br>
	 	* Purpose:  Returns note_id Database field<br>
	 	*
	 	* @author Cite CMS Developer Module
	 	* @return String last_modified
		 *
		*/
 function get_note_id(){
		return $this->fields['note_id'];
	}
	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_note_text<br>
	 	* Purpose:  Fetch note_text Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String note_text
		 *
		*/



	function get_note_text() {
		return $this->fields['note_text'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_note_type<br>
	 	* Purpose:  Fetch note_type Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String note_type
		 *
		*/

     function get_note_subject() {
        if($this->fields['note_subject'] == "") {
            $this->fields['note_subject'] = $this->fields['note_text'];
        }

        return $this->fields['note_subject'];

    }

	function get_note_type() {
		return $this->fields['note_type'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_note_type_id<br>
	 	* Purpose:  Fetch note_type_id Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String note_type_id
		 *
		*/
	function get_note_type_id() {
		return $this->fields['note_type_id'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_note_enter_by<br>
	 	* Purpose:  Fetch note_enter_by Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String note_enter_by
		 *
		*/
	function get_note_enter_by() {
		return $this->fields['note_enter_by'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_note_create_date<br>
	 	* Purpose:  Fetch note_create_date Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String note_create_date
		 *
		*/
	function get_note_create_date() {
		return $this->fields['note_create_date'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_note_active<br>
	 	* Purpose:  Fetch note_active Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String note_active
		 *
		*/
	function get_note_active() {
		return $this->fields['note_active'];
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