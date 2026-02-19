<?php
/**
 * Type:     Cite CMS Core Class<br>
 * Name:     invoice_labor.class.php<br>
 * Purpose:  For all invoice_labor methods<br>
 * @author Cite CMS Module Developer
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions
 * @link http://www.citecsoftware.com
*/

require(CLASS_PATH.'/getter/invoice_labor_getter.class.php');

class invoice_labor extends invoice_labor_getter {


function invoice_labor(){
	global $smarty;
	global $translate;
	$translate = new translate();
	$translate_array = $translate->translate_module("invoice_labor");
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
* Name:     add_invoice_labor<br>
* Purpose:  Adds A single invoice_labor row<br>
*
* @author Cite CMS Module Developer
* @access Public
* @return invoice_labor Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function add_invoice_labor($invoice_id,$invoice_labor_hours,$invoice_labor_rate,$invoice_labor_description,$invoice_labor_sub_total){

	global $db;
	global $error;

	$q = "INSERT INTO  invoice_labor SET
		invoice_id							=". $db->qstr($invoice_id) .",
		invoice_labor_hours				=". $db->qstr($invoice_labor_hours) .",
		invoice_labor_rate				=". $db->qstr($invoice_labor_rate) .",
		invoice_labor_description		=". $db->qstr($invoice_labor_description) .",
		invoice_labor_sub_total			=". $db->qstr($invoice_labor_sub_total);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$_SESSION['CLEAR_CACHE'] = true;

 return $db->Insert_ID();
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     view_invoice_labor<br>
* Purpose:  Loads A single invoice_labor row<br>
*
* @author Cite CMS Module Developer
* @param $invoice_labor_id String The invoice_labor ID
* @access Public
* @return invoice_labor Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function view_invoice_labor($invoice_labor_id){
	global $db;
	global $error;

	$q = "SELECT * FROM invoice_labor
	WHERE invoice_labor_id = ". $db->qstr($invoice_labor_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     search_invoice_labor<br>
* Purpose:  Loads All invoice_labor rows paginated<br>
*
* @author Cite CMS Module Developer
* @param SmartyPaginate::getCurrentIndex() Smarty Paginate Object
* @param  SmartyPaginate::getLimit() Smarty Paginate Object
* @access Public
* @return $invoice_laborArray Array  The paginated result set  of invoice_labors
* @version 1.0
* @uses $db Datbase object, $error the Error object, $smarty Smarty Object
*/
function search_invoice_labor(){
	global $db;
	global $error;

	$q = sprintf("SELECT SQL_CALC_FOUND_ROWS * FROM invoice_labor LIMIT %d,%d",SmartyPaginate::getCurrentIndex(), SmartyPaginate::getLimit() );

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
}

	$invoice_laborArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$invoice_laborArray[$counter] = new invoice_labor();
		$invoice_laborArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	// now we get the total number of records from the table
	$q = "SELECT FOUND_ROWS()";
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	SmartyPaginate::setTotal($rs->fields['FOUND_ROWS()']);

	return $invoice_laborArray;

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     update_invoice_labor<br>
* Purpose:  Updates A single invoice_labor row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function update_invoice_labor($_REQUEST){
	global $db;
	global $error;

	$q = "UPDATE invoice_labor SET
		invoice_id					=". $db->qstr($_REQUEST['invoice_id']) ."	,
		invoice_labor_hours					=". $db->qstr($_REQUEST['invoice_labor_hours']) ."	,
		invoice_labor_rate					=". $db->qstr($_REQUEST['invoice_labor_rate']) ."	,
		invoice_labor_description					=". $db->qstr($_REQUEST['invoice_labor_description']) ."	,
		invoice_labor_sub_total					=". $db->qstr($_REQUEST['invoice_labor_sub_total']) ."
	WHERE invoice_labor_id = " . $db->qstr($_REQUEST['invoice_labor_id']);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

$_SESSION['CLEAR_CACHE'] = true;

	return true;
}

function load_by_invoice_id($invoice_id){
	global $db;
	global $error;

	$q="SELECT * FROM invoice_labor WHERE invoice_id = " . $db->qstr($invoice_id);
	
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$invoice_laborArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$invoice_laborArray[$counter] = new invoice_labor();
		$invoice_laborArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}
	
	return $invoice_laborArray;
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     delete_invoice_labor<br>
* Purpose:  Deletes A single invoice_labor row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function delete_invoice_labor($invoice_labor_id){
	global $db;
	global $error;

	$q = "DELETE FROM invoice_labor
	WHERE invoice_labor_id = " . $db->qstr($invoice_labor_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

$_SESSION['CLEAR_CACHE'] = true;

	return true;
}


}
?>