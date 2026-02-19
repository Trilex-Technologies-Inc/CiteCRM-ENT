<?php
/**
 * Type:     Cite CMS Core Class<br>
 * Name:     vendor_address.class.php<br>
 * Purpose:  For all vendor_address methods<br>
 * @author Cite CMS Module Developer
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions
 * @link http://www.citecsoftware.com
*/

require(CLASS_PATH.'/getter/vendor_address_getter.class.php');

class vendor_address extends vendor_address_getter {

	function vendor_address() {
		global $smarty;
		global $translate;
		
		$translate = new translate();

		$translate_array = $translate->translate_module("vendor_address");


		if(!empty($translate_array)) {
		
			foreach($translate_array as $translate){
				
				$tans = "translate_".strtolower($translate['name']);
				
				$val = $translate['content'];
				
				$smarty->assign($tans,$val);
			}
		}
	}


	function add_vendor_address($_REQUEST){
		global $db;
		global $error;
	
		$q = "INSERT INTO  vendor_address SET
			vendor_id							=". $db->qstr($_REQUEST['vendor_id']) .",
			vendor_address_type				=". $db->qstr($_REQUEST['vendor_address_type']) .",
			vendor_street_1					=". $db->qstr($_REQUEST['vendor_street_1']) .",
			vendor_street_2					=". $db->qstr($_REQUEST['vendor_street_2']) .",
			vendor_city							=". $db->qstr($_REQUEST['vendor_city']) .",
			vendor_state_id					=". $db->qstr($_REQUEST['vendor_state_id']) .",
			vendor_postal_code				=". $db->qstr($_REQUEST['vendor_postal_code']) .",
			vendor_country_id					=". $db->qstr($_REQUEST['vendor_country_id']);
	
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
	
	return $db->Insert_ID();
	}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     view_vendor_address<br>
* Purpose:  Loads A single vendor_address row<br>
*
* @author Cite CMS Module Developer
* @param $vendor_address_id String The vendor_address ID
* @access Public
* @return vendor_address Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function view_vendor_address($vendor_address_id){
	global $db;
	global $error;

	$q = "SELECT * FROM vendor_address
	WHERE vendor_address_id = ". $db->qstr($vendor_address_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     search_vendor_address<br>
* Purpose:  Loads All vendor_address rows paginated<br>
*
* @author Cite CMS Module Developer
* @param SmartyPaginate::getCurrentIndex() Smarty Paginate Object
* @param  SmartyPaginate::getLimit() Smarty Paginate Object
* @access Public
* @return $vendor_addressArray Array  The paginated result set  of vendor_addresss
* @version 1.0
* @uses $db Datbase object, $error the Error object, $smarty Smarty Object
*/
function search_vendor_address(){
	global $db;
	global $error;

	$q = sprintf("SELECT SQL_CALC_FOUND_ROWS * FROM vendor_address LIMIT %d,%d",SmartyPaginate::getCurrentIndex(), SmartyPaginate::getLimit() );

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$vendor_addressArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$vendor_addressArray[$counter] = new vendor_address();
		$vendor_addressArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	// now we get the total number of records from the table
	$q = "SELECT FOUND_ROWS()";
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	SmartyPaginate::setTotal($rs->fields['FOUND_ROWS()']);

	return $vendor_addressArray;

}


	function load_by_vendor($vendor_id){
		global $db;
		global $error;
	
		$q = "SELECT * FROM vendor_address WHERE vendor_id = " . $db->qstr($vendor_id);
	
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}

		$vendor_addressArray = array();

		$counter = 0;

		$tempArray = $rs->GetArray();

		while($counter < count($tempArray)) {
			$vendor_addressArray[$counter] = new vendor_address();
			$vendor_addressArray[$counter]->fields = $tempArray[$counter];
			$counter++;
		}
	
		return $vendor_addressArray;
	
	}

/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     update_vendor_address<br>
* Purpose:  Updates A single vendor_address row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function update_vendor_address($_REQUEST){
	global $db;
	global $error;

	$q = "UPDATE vendor_address SET
		vendor_id					=". $db->qstr($_REQUEST['vendor_id']) ."	,
		vendor_address_type					=". $db->qstr($_REQUEST['vendor_address_type']) ."	,
		vendor_street_1					=". $db->qstr($_REQUEST['vendor_street_1']) ."	,
		vendor_street_2					=". $db->qstr($_REQUEST['vendor_street_2']) ."	,
		vendor_city					=". $db->qstr($_REQUEST['vendor_city']) ."	,
		vendor_state_id					=". $db->qstr($_REQUEST['vendor_state_id']) ."	,
		vendor_postal_code					=". $db->qstr($_REQUEST['vendor_postal_code']) ."	,
		vendor_country_id					=". $db->qstr($_REQUEST['vendor_country_id']) ."
	WHERE vendor_address_id = " . $db->qstr($_REQUEST['vendor_address_id']);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	return true;
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     delete_vendor_address<br>
* Purpose:  Deletes A single vendor_address row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function delete_vendor_address($vendor_address_id){
	global $db;
	global $error;

	$q = "DELETE FROM vendor_address
	WHERE vendor_address_id = " . $db->qstr($vendor_address_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	return true;
}


}
?>