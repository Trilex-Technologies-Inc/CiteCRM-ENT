<?php
/**
* Type:     	Cite CMS Core Getter Class<br>
* Name:    	fileGetter<br>
* Purpose:  	For all Files fields<br>
* @author    Cite CMS Module Developer
* @access Public
* @package CiteCMS
* @version 1.0
* @Copyright 2006 Cite Software Solutions 
* @link http://www.citecsoftware.com
*/
class file_getter {

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_file_id<br>
	 	* Purpose:  Returns file_id Database field<br>
	 	*
	 	* @author Cite CMS Developer Module
	 	* @return String last_modified
		 *
		*/
 function get_file_id(){
		return $this->fields['file_id'];
	}
	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_file_type<br>
	 	* Purpose:  Fetch file_type Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String file_type
		 *
		*/
	function get_file_type() {
		return $this->fields['file_type'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_file_type_id<br>
	 	* Purpose:  Fetch file_type_id Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String file_type_id
		 *
		*/
	function get_file_type_id() {
		return $this->fields['file_type_id'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_file_size<br>
	 	* Purpose:  Fetch file_size Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String file_size
		 *
		*/
	function get_file_size() {
		return $this->fields['file_size'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_file_name<br>
	 	* Purpose:  Fetch file_name Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String file_name
		 *
		*/
	function get_file_name() {
		return $this->fields['file_name'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_file_ext<br>
	 	* Purpose:  Fetch file_ext Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String file_ext
		 *
		*/
	function get_file_ext() {
		return $this->fields['file_ext'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_file_create_date<br>
	 	* Purpose:  Fetch file_create_date Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String file_create_date
		 *
		*/
	function get_file_create_date() {
		return $this->fields['file_create_date'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_file_upload_by<br>
	 	* Purpose:  Fetch file_upload_by Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String file_upload_by
		 *
		*/
	function get_file_upload_by() {
		return $this->fields['file_upload_by'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_file_active<br>
	 	* Purpose:  Fetch file_active Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String file_active
		 *
		*/
	function get_file_active() {
		return $this->fields['file_active'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_file_mime_type<br>
	 	* Purpose:  Fetch file_mime_type Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String file_mime_type
		 *
		*/
	function get_file_mime_type() {
		return $this->fields['file_mime_type'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_file_path<br>
	 	* Purpose:  Fetch file_path Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String file_path
		 *
		*/
	function get_file_path() {
		return $this->fields['file_path'];
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