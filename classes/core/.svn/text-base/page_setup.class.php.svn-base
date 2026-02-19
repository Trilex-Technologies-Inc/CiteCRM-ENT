<?php
/**
 * Type:     Cite CMS Core Class<br>
 * Name:     page_setup.class.php<br>
 * Purpose:  For all page_setup methods<br>
 * @author Cite CMS Module Developer
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions
 * @link http://www.citecsoftware.com
*/

require(CLASS_PATH.'/getter/page_setup_getter.class.php');

class page_setup extends page_setup_getter {


	function page_setup() {
		global $smarty;
		global $translate;
		
		$translate = new translate();

		$translate_array = $translate->translate_module("page_setup");


		if(!empty($translate_array)) {
		
			foreach($translate_array as $translate){
				
				$tans = "translate_".strtolower($translate['name']);
				
				$val = $translate['content'];
				
				$smarty->assign($tans,$val);
			}
		}
	
	}

	/**
		*
		* Type:     Cite CMS Public Methods<br>
		* Name:     add_page_setup<br>
		* Purpose:  Adds A single page_setup row<br>
		*
		* @author Cite CMS Module Developer
		* @param $_REQUEST ARRAY Form Array
		* @access Public
		* @return $page_setup String the Insert ID
		* @version 1.0
		* @uses $db Datbase object, $error the Error object
	*/
	function add_page_setup($_REQUEST){
		global $db;
		global $error;
	
		$q = "INSERT INTO  project SET
			page_setup_name 				= " . $db->qstr( $_REQUEST['page_setup_name']) .",
			page_setup_display_name 	= " . $db->qstr( $_REQUEST['page_setup_display_name']) .",
			page_setup_page_title 		= " . $db->qstr( $_REQUEST['page_setup_page_title']) .",
			page_setup_description		= " . $db->qstr( $_REQUEST['page_setup_description']) .", 
			page_setup_keywords			= " . $db->qstr( $_REQUEST['page_setup_keywords']) .", 
			page_setup_order				= " . $db->qstr( $_REQUEST['page_setup_order']) .", 
			page_setup_menu 				= " . $db->qstr( $_REQUEST['page_setup_menu']) .",
			page_setup_active				= " . $db->qstr( $_REQUEST['page_setup_active']) .", 
			page_views						= " . $db->qstr( $_REQUEST['page_views']); 
			
			
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
	
		$this->fields['page_setup_id'] = $db->Insert_ID();
	
		return $this->fields['page_setup_id'];
 	
	}


	/**
	*
	 * Type:     Cite CMS Public Methods<br>
	 * Name:     view_page_setup<br>
	 * Purpose:  Loads A single page_setup row<br>
	 *
	 * @author Cite CMS Module Developer
	 * @param $page_setup_id String The page_setup ID
	 * @access Public
	 * @return page_setup Object
	 * @version 1.0
	 * @uses $db Datbase object, $error the Error object
	*/
	function view_page_setup($page_setup_id){
		global $db;
		global $error;
	
		$q = "SELECT * FROM page_setup
		WHERE page_setup_id = ". $db->qstr($page_setup_id);
	
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
	
		$tempArray = $rs->GetArray();
	
		$this->fields = $tempArray[0];
	
	}
	
	
	
	/**
	 *
	 * Type:     Cite CMS Public Methods<br>
	 * Name:     search_page_setup<br>
	 * Purpose:  Loads All page_setup rows paginated<br>
	 *
	 * @author Cite CMS Module Developer
	 * @param SmartyPaginate::getCurrentIndex() Smarty Paginate Object
	 * @param  SmartyPaginate::getLimit() Smarty Paginate Object
 	 * @access Public
	 * @return $page_setupArray Array  The paginated result set  of page_setup
	 * @version 1.0
	 * @uses $db Datbase object, $error the Error object, $smarty Smarty Object
	*/
	function search_page_setup(){
		global $db;
		global $error;
	
		$q = sprintf("SELECT SQL_CALC_FOUND_ROWS * FROM page_setup LIMIT %d,%d",SmartyPaginate::getCurrentIndex(), SmartyPaginate::getLimit() );
	
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
	}
	
		$page_setupArray = array();
	
		$counter = 0;
	
		$tempArray = $rs->GetArray();
	
		while($counter < count($tempArray)) {
			$page_setupArray[$counter] = new page_setup();
			$page_setupArray[$counter]->fields = $tempArray[$counter];
			$counter++;
		}
	
		// now we get the total number of records from the table
		$q = "SELECT FOUND_ROWS()";
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
	
		SmartyPaginate::setTotal($rs->fields['FOUND_ROWS()']);
	
		return $page_setupArray;
	
	}


	/**
	 *
	 * Type:     Cite CMS Public Methods<br>
	 * Name:     update_page_setup<br>
	 * Purpose:  Updates A single page_setup row<br>
	 *
	 * @author Cite CMS Module Developer
	 * @param $_REQUEST Array The Form Fields
	 * @access Public
	 * @return Boolen True/ False
	 * @version 1.0
	 * @uses $db Datbase object, $error the Error object
	*/
	function update_page_setup($_REQUEST){
		global $db;
		global $error;
	
		$q = "UPDATE page_setup SET
			page_setup_name 				= " . $db->qstr( $_REQUEST['page_setup_name']) .",
			page_setup_display_name 	= " . $db->qstr( $_REQUEST['page_setup_display_name']) .",
			page_setup_page_title 		= " . $db->qstr( $_REQUEST['page_setup_page_title']) .",
			page_setup_description		= " . $db->qstr( $_REQUEST['page_setup_description']) .", 
			page_setup_keywords			= " . $db->qstr( $_REQUEST['page_setup_keywords']) .", 
			page_setup_order				= " . $db->qstr( $_REQUEST['page_setup_order']) .", 
			page_setup_menu 				= " . $db->qstr( $_REQUEST['page_setup_menu']) .",
			page_setup_active				= " . $db->qstr( $_REQUEST['page_setup_active']) .", 
			page_views						= " . $db->qstr( $_REQUEST['page_views']) . "
		WHERE page_setup_id = " . $db->qstr($_REQUEST['page_setup_id']);
	
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
	
		return true;
	}



	/**
	 *
	 * Type:     Cite CMS Public Methods<br>
	 * Name:     delete_page_setup<br>
	 * Purpose:  Deletes A single page_setup row<br>
	 *
	 * @author Cite CMS Module Developer
	 * @param $page_setup_id The page_setup_id
	 * @access Public
	 * @return Boolen True/ False
	 * @version 1.0
	 * @uses $db Datbase object, $error the Error object
	*/
	function delete_project($page_setup_id){
		global $db;
		global $error;
	
		$q = "DELETE FROM page_setup
		WHERE page_setup_id = " . $db->qstr($page_setup_id);
	
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
	
		return true;
	}
	
	
	/**
	 *
	 * Type:     Cite CMS Public Methods<br>
	 * Name:     delete_page_setup<br>
	 * Purpose:  Deletes A single page_setup row<br>
	 *
	 * @author Cite CMS Module Developer
	 * @param $page_setup_id The page_setup_id
	 * @access Public
	 * @return Boolen True/ False
	 * @version 1.0
	 * @uses $db Datbase object, $error the Error object
	*/
	function view_page_setup_by_name($page_setup_name) {
		global $db;
		global $error;
		
		$q = "SELECT * FROM page_setup WHERE  page_setup_name = " . $db->qstr( $page_setup_name );

		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
	
		$tempArray = $rs->GetArray();
	
		$this->fields = $tempArray[0];
		
	}
	

}