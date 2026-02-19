<?php
require(CLASS_PATH."/getter/navigation_getter.class.php");

/** 
 * Type:     Cite CMS Core Class<br>
 * Name:     Navigation<br>
 * Purpose:  For all user methods<br>
 * @author Jaimie Garner jaimie@citesoftware.com
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions 
 * @link http://www.citecsoftware.com
*/
class Navigation extends navigation_getter {

	var $fields;


	/** getMainNavMenu ()
	 * Gets The navigation menu pages from DB
	 *
	*/
	function getMainNavMenu () {
		global $db;
		global $error;
		
		$q = "SELECT page_setup_name, 
                     page_setup_display_name 
             FROM page_setup WHERE page_setup_menu = '1' 
             AND page_setup_active = '1' 
             AND page_setup_order != '0' 
             ORDER BY page_setup_order";
		
		if( !$rs = $db->Execute($q) ) {
			$error->dbError($db->ErrorMsg(),$q);
			exit;
		}
		
	
		$nav = array();
		
		$counter = 0;

		$tempArray = $rs->GetArray();

		while($counter < count($tempArray)) {

			$nav[$counter] = new Navigation();
			
			$nav[$counter]->fields = $tempArray[$counter];
			
			$counter++;
		}
					
		
		return $nav;
	}
	
	

    function load_all_main_menu() {
        global $db;
		global $error;

        $q = "SELECT * FROM  page_setup WHERE page_setup_menu = '1'";

        if( !$rs = $db->Execute($q) ) {
			$error->dbError($db->ErrorMsg(),$q);
			exit;
		}
		
	
		$nav = array();
		
		$counter = 0;

		$tempArray = $rs->GetArray();

		while($counter < count($tempArray)) {

			$nav[$counter] = new Navigation();
			
			$nav[$counter]->fields = $tempArray[$counter];
			
			$counter++;
		}
					
		
		return $nav;

    }

    function load_page_by_id($page_id) {
        global $db;
		global $error;

        $q = "SELECT * FROM page_setup WHERE page_setup_id = " . $db->qstr($page_id);

        if( !$rs = $db->Execute($q) ) {
			$error->dbError($db->ErrorMsg(),$q);
			exit;
		}

       $tempArray = $rs->GetArray();

	   $this->fields = $tempArray[0];
        

    }


    function update_main_menu($page_setup_id,$page_setup_display_name,$page_setup_page_title,$page_setup_order,$page_setup_active,$page_setup_menu,$page_setup_description,$page_setup_keywords) {

        global $db;
		global $error;

        $q = "UPDATE page_setup SET
                page_setup_display_name = " . $db->qstr($page_setup_display_name) . ",
                page_setup_page_title   = " . $db->qstr($page_setup_page_title) . ",
                page_setup_order        = " . $db->qstr($page_setup_order) . ",
                page_setup_active       = " . $db->qstr($page_setup_active) . ",
                page_setup_menu         = " . $db->qstr($page_setup_menu) . ",
                page_setup_description  = " . $db->qstr($page_setup_description) . ",
                page_setup_keywords     = " . $db->qstr($page_setup_keywords) . "
               WHERE page_setup_id     = " . $db->qstr($page_setup_id);

        if( !$rs = $db->Execute($q) ) {
			$error->dbError($db->ErrorMsg(),$q);
			exit;
		}
    
    }

    function add_page_to_menu($page_setup_id){
        global $db;
		global $error;


        $q = "UPDATE page_setup SET
                page_setup_menu     = '1',
                page_setup_order    = '99'
                WHERE page_setup_id = " . $db->qstr($page_setup_id);


        if( !$rs = $db->Execute($q) ) {
			$error->dbError($db->ErrorMsg(),$q);
			exit;
		}
    
    }


    function load_all_active_pages() {
        global $db;
		global $error;

        $q = "SELECT * FROM page_setup WHERE page_setup_active = '1' ORDER BY page_setup_name";

        if( !$rs = $db->Execute($q) ) {
			$error->dbError($db->ErrorMsg(),$q);
			exit;
		}
		
	
		$nav = array();
		
		$counter = 0;

		$tempArray = $rs->GetArray();

		while($counter < count($tempArray)) {

			$nav[$counter] = new Navigation();
			
			$nav[$counter]->fields = $tempArray[$counter];
			
			$counter++;
		}
					
		
		return $nav;
    }


    function load_all_pages() {
        global $db;
		global $error;

        $q = "SELECT * FROM page_setup  ORDER BY page_setup_name";

        if( !$rs = $db->Execute($q) ) {
			$error->dbError($db->ErrorMsg(),$q);
			exit;
		}
		
	
		$nav = array();
		
		$counter = 0;

		$tempArray = $rs->GetArray();

		while($counter < count($tempArray)) {

			$nav[$counter] = new Navigation();
			
			$nav[$counter]->fields = $tempArray[$counter];
			
			$counter++;
		}
					
		
		return $nav;

    }

}


?>