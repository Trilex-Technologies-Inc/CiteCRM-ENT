<?php
/**
 * Type:     Cite CMS Core Class<br>
 * Name:     vendor_contact.class.php<br>
 * Purpose:  For all vendor_contact methods<br>
 * @author Cite CMS Module Developer
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions
 * @link http://www.citecsoftware.com
*/

require(CLASS_PATH.'/getter/vendor_contact_getter.class.php');

class vendor_contact extends vendor_contact_getter {

	function vendor_contact() {
		global $smarty;
		global $translate;
		
		$translate = new translate();

		$translate_array = $translate->translate_module("vendor_contact");


		if(!empty($translate_array)) {
		
			foreach($translate_array as $translate){
				
				$tans = "translate_".strtolower($translate['name']);
				
				$val = $translate['content'];
				
				$smarty->assign($tans,$val);
			}
		}
	
	}
	

	function add_vendor_contact(){
		global $db;
		global $error;
	
		$q = "INSERT INTO  vendor_contact SET
			vendor_id								=". $db->qstr($_REQUEST['vendor_id']) .",
			vendor_contact_type					=". $db->qstr($_REQUEST['vendor_contact_type']) .",
			vendor_contact_value					=". $db->qstr($_REQUEST['vendor_contact_value']);
	
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
	
	return $db->Insert_ID();
	}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     view_vendor_contact<br>
* Purpose:  Loads A single vendor_contact row<br>
*
* @author Cite CMS Module Developer
* @param $vendor_contact_id String The vendor_contact ID
* @access Public
* @return vendor_contact Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function view_vendor_contact($vendor_contact_id){
	global $db;
	global $error;

	$q = "SELECT * FROM vendor_contact
	WHERE vendor_contact_id = ". $db->qstr($vendor_contact_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     search_vendor_contact<br>
* Purpose:  Loads All vendor_contact rows paginated<br>
*
* @author Cite CMS Module Developer
* @param SmartyPaginate::getCurrentIndex() Smarty Paginate Object
* @param  SmartyPaginate::getLimit() Smarty Paginate Object
* @access Public
* @return $vendor_contactArray Array  The paginated result set  of vendor_contacts
* @version 1.0
* @uses $db Datbase object, $error the Error object, $smarty Smarty Object
*/
function search_vendor_contact(){
	global $db;
	global $error;

	$q = sprintf("SELECT SQL_CALC_FOUND_ROWS * FROM vendor_contact LIMIT %d,%d",SmartyPaginate::getCurrentIndex(), SmartyPaginate::getLimit() );

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
}

	$vendor_contactArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$vendor_contactArray[$counter] = new vendor_contact();
		$vendor_contactArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	// now we get the total number of records from the table
	$q = "SELECT FOUND_ROWS()";
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	SmartyPaginate::setTotal($rs->fields['FOUND_ROWS()']);

	return $vendor_contactArray;

}


	function load_by_vendor($vendor_id) {
		global $db;
		global $error;	
	
		$q = "SELECT * FROM vendor_contact WHERE vendor_id = " . $db->qstr($vendor_id);
	
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}

		$vendor_contactArray = array();

		$counter = 0;

		$tempArray = $rs->GetArray();

		while($counter < count($tempArray)) {
			$vendor_contactArray[$counter] = new vendor_contact();
			$vendor_contactArray[$counter]->fields = $tempArray[$counter];
			$counter++;
		}
		
		return $vendor_contactArray;
	
	}

/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     update_vendor_contact<br>
* Purpose:  Updates A single vendor_contact row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function update_vendor_contact($_REQUEST){
	global $db;
	global $error;

	$q = "UPDATE vendor_contact SET
		vendor_id					=". $db->qstr($_REQUEST['vendor_id']) ."	,
		vendor_contact_type					=". $db->qstr($_REQUEST['vendor_contact_type']) ."	,
		vendor_contact_value					=". $db->qstr($_REQUEST['vendor_contact_value']) ."
	WHERE vendor_contact_id = " . $db->qstr($_REQUEST['vendor_contact_id']);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	return true;
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     delete_vendor_contact<br>
* Purpose:  Deletes A single vendor_contact row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function delete_vendor_contact($vendor_contact_id){
	global $db;
	global $error;

	$q = "DELETE FROM vendor_contact
	WHERE vendor_contact_id = " . $db->qstr($vendor_contact_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	return true;
}


}
?>