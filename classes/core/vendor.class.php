<?php
/**
 * Type:     Cite CMS Core Class<br>
 * Name:     vendor.class.php<br>
 * Purpose:  For all vendor methods<br>
 * @author Cite CMS Module Developer
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions
 * @link http://www.citecsoftware.com
*/

require(CLASS_PATH.'/getter/vendor_getter.class.php');

class vendor extends vendor_getter {

	function vendor() {
		global $smarty;
		global $translate;
		
		$translate = new translate();

		$translate_array = $translate->translate_module("vendor");


		if(!empty($translate_array)) {
		
			foreach($translate_array as $translate){
				
				$tans = "translate_".strtolower($translate['name']);
				
				$val = $translate['content'];
				
				$smarty->assign($tans,$val);
			}
		}
	}


	function add_vendor(){
	
		global $db;
		global $error;
		
		require_once(CLASS_PATH."/core/vendor_address.class.php");
		
		require_once(CLASS_PATH."/core/vendor_contact.class.php");
	
		$vendor_address = new Vendor_Address();
		
		$vendor_contact = new Vendor_contact();
		
		$q = "INSERT INTO  vendor SET
			vendor_name						=". $db->qstr($_REQUEST['vendor_name']) .",
			vendor_website					=". $db->qstr($_REQUEST['vendor_website']) .",
			vendor_create_date			=". $db->qstr(strtotime($_REQUEST['vendor_create_date'])) .",
			vendor_active					=". $db->qstr($_REQUEST['vendor_active']);
	
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}		
		
		$_REQUEST['vendor_id'] = $db->Insert_ID();
		
		// Save Address		
		$vendor_address->add_vendor_address($_REQUEST);
		
		// Save Contact
		$vendor_contact->add_vendor_contact($_REQUEST);
		
		$_SESSION['CLEAR_CACHE'] = true;
		
		return $db->Insert_ID();
		
	}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     view_vendor<br>
* Purpose:  Loads A single vendor row<br>
*
* @author Cite CMS Module Developer
* @param $vendor_id String The vendor ID
* @access Public
* @return vendor Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function view_vendor($vendor_id){
	global $db;
	global $error;

	$q = "SELECT * FROM vendor
	WHERE vendor_id = ". $db->qstr($vendor_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     search_vendor<br>
* Purpose:  Loads All vendor rows paginated<br>
*
* @author Cite CMS Module Developer
* @param SmartyPaginate::getCurrentIndex() Smarty Paginate Object
* @param  SmartyPaginate::getLimit() Smarty Paginate Object
* @access Public
* @return $vendorArray Array  The paginated result set  of vendors
* @version 1.0
* @uses $db Datbase object, $error the Error object, $smarty Smarty Object
*/
function search_vendor(){
	global $db;
	global $error;

	$q = sprintf("SELECT SQL_CALC_FOUND_ROWS * FROM vendor LIMIT %d,%d",SmartyPaginate::getCurrentIndex(), SmartyPaginate::getLimit() );

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
}

	$vendorArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$vendorArray[$counter] = new vendor();
		$vendorArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	// now we get the total number of records from the table
	$q = "SELECT FOUND_ROWS()";
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	SmartyPaginate::setTotal($rs->fields['FOUND_ROWS()']);

	return $vendorArray;

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     update_vendor<br>
* Purpose:  Updates A single vendor row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function update_vendor($_REQUEST){
	global $db;
	global $error;

	$q = "UPDATE vendor SET
		vendor_name					=". $db->qstr($_REQUEST['vendor_name']) ."	,
		vendor_website					=". $db->qstr($_REQUEST['vendor_website']) ."	,
		vendor_create_date					=". $db->qstr($_REQUEST['vendor_create_date']) ."	,
		vendor_active					=". $db->qstr($_REQUEST['vendor_active']) ."
	WHERE vendor_id = " . $db->qstr($_REQUEST['vendor_id']);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	return true;
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     delete_vendor<br>
* Purpose:  Deletes A single vendor row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function delete_vendor($vendor_id){
	global $db;
	global $error;

	$q = "DELETE FROM vendor
	WHERE vendor_id = " . $db->qstr($vendor_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	return true;
}


}
?>