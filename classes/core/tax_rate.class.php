<?php
/**
 * Type:     Cite CMS Core Class<br>
 * Name:     tax_rate.class.php<br>
 * Purpose:  For all tax_rate methods<br>
 * @author Cite CMS Module Developer
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions
 * @link http://www.citecsoftware.com
*/

require(CLASS_PATH.'/getter/tax_rate_getter.class.php');

class tax_rate extends tax_rate_getter {


function tax_rate(){
	global $smarty;
	global $translate;
	$translate = new translate();
	$translate_array = $translate->translate_module("tax_rate");
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
* Name:     add_tax_rate<br>
* Purpose:  Adds A single tax_rate row<br>
*
* @author Cite CMS Module Developer
* @access Public
* @return tax_rate Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function add_tax_rate(){
	global $db;
	global $error;

	$q = "INSERT INTO  tax_rate SET
		tax_rate_zone_id					=". $db->qstr($_REQUEST['tax_rate_zone_id']) .",
		tax_class_id					=". $db->qstr($_REQUEST['tax_class_id']) .",
		tax_rate_priority					=". $db->qstr($_REQUEST['tax_rate_priority']) .",
		tax_rate_value					=". $db->qstr($_REQUEST['tax_rate_value']) .",
		tax_rate_description					=". $db->qstr($_REQUEST['tax_rate_description']);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

$_SESSION['CLEAR_CACHE'] = true;

 return $db->Insert_ID();
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     view_tax_rate<br>
* Purpose:  Loads A single tax_rate row<br>
*
* @author Cite CMS Module Developer
* @param $tax_rate_id String The tax_rate ID
* @access Public
* @return tax_rate Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function view_tax_rate($tax_rate_id){
	global $db;
	global $error;

	$q = "SELECT * FROM tax_rate
	WHERE tax_rate_id = ". $db->qstr($tax_rate_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     search_tax_rate<br>
* Purpose:  Loads All tax_rate rows paginated<br>
*
* @author Cite CMS Module Developer
* @param SmartyPaginate::getCurrentIndex() Smarty Paginate Object
* @param  SmartyPaginate::getLimit() Smarty Paginate Object
* @access Public
* @return $tax_rateArray Array  The paginated result set  of tax_rates
* @version 1.0
* @uses $db Datbase object, $error the Error object, $smarty Smarty Object
*/
function search_tax_rate(){
	global $db;
	global $error;

	$q = sprintf("SELECT SQL_CALC_FOUND_ROWS * FROM tax_rate LIMIT %d,%d",SmartyPaginate::getCurrentIndex(), SmartyPaginate::getLimit() );

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
}

	$tax_rateArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$tax_rateArray[$counter] = new tax_rate();
		$tax_rateArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	// now we get the total number of records from the table
	$q = "SELECT FOUND_ROWS()";
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	SmartyPaginate::setTotal($rs->fields['FOUND_ROWS()']);

	return $tax_rateArray;

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     update_tax_rate<br>
* Purpose:  Updates A single tax_rate row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function update_tax_rate($_REQUEST){
	global $db;
	global $error;

	$q = "UPDATE tax_rate SET
		tax_rate_zone_id					=". $db->qstr($_REQUEST['tax_rate_zone_id']) ."	,
		tax_class_id					=". $db->qstr($_REQUEST['tax_class_id']) ."	,
		tax_rate_priority					=". $db->qstr($_REQUEST['tax_rate_priority']) ."	,
		tax_rate_value					=". $db->qstr($_REQUEST['tax_rate_value']) ."	,
		tax_rate_description					=". $db->qstr($_REQUEST['tax_rate_description']) ."
	WHERE tax_rate_id = " . $db->qstr($_REQUEST['tax_rate_id']);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

$_SESSION['CLEAR_CACHE'] = true;

	return true;
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     delete_tax_rate<br>
* Purpose:  Deletes A single tax_rate row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function delete_tax_rate($tax_rate_id){
	global $db;
	global $error;

	$q = "DELETE FROM tax_rate
	WHERE tax_rate_id = " . $db->qstr($tax_rate_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

$_SESSION['CLEAR_CACHE'] = true;

	return true;
}


}
?>