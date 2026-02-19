<?php
/**
 * Type:     Cite CMS Core Class<br>
 * Name:     billing_rates.class.php<br>
 * Purpose:  For all billing_rates methods<br>
 * @author Cite CMS Module Developer
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions
 * @link http://www.citecsoftware.com
*/

require(CLASS_PATH.'/getter/billing_rates_getter.class.php');

class billing_rates extends billing_rates_getter {

function add_billing_rates($billing_rate_text,$billing_rate_amount,$billing_rate_active){
	global $db;
	global $error;

	$q = "INSERT INTO  billing_rates SET
		billing_rate_text					=". $db->qstr($billing_rate_text) .",
		billing_rate_amount					=". $db->qstr($billing_rate_amount) .",
		billing_rate_active					=". $db->qstr($billing_rate_active);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

 	return $db->Insert_ID();
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     view_billing_rates<br>
* Purpose:  Loads A single billing_rates row<br>
*
* @author Cite CMS Module Developer
* @param $billing_rates_id String The billing_rates ID
* @access Public
* @return billing_rates Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function view_billing_rates($billing_rates_id){
	global $db;
	global $error;

	$q = "SELECT * FROM billing_rates
	WHERE billing_rates_id = ". $db->qstr($billing_rates_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     search_billing_rates<br>
* Purpose:  Loads All billing_rates rows paginated<br>
*
* @author Cite CMS Module Developer
* @param SmartyPaginate::getCurrentIndex() Smarty Paginate Object
* @param  SmartyPaginate::getLimit() Smarty Paginate Object
* @access Public
* @return $billing_ratesArray Array  The paginated result set  of billing_ratess
* @version 1.0
* @uses $db Datbase object, $error the Error object, $smarty Smarty Object
*/
function search_billing_rates(){
	global $db;
	global $error;

	$q = "SELECT  * FROM billing_rates";

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$billing_ratesArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$billing_ratesArray[$counter] = new billing_rates();
		$billing_ratesArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	

	return $billing_ratesArray;

}

function loadAll() {
	global $db;
	global $error;
	
	$q = "SELECT * FROM billing_rates ORDER BY billing_rate_amount ASC";
	
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$billing_ratesArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$billing_ratesArray[$counter] = new billing_rates();
		$billing_ratesArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}
	
	return $billing_ratesArray;
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     update_billing_rates<br>
* Purpose:  Updates A single billing_rates row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function update_billing_rates($billing_rates_id,$billing_rate_text,$billing_rate_amount,$billing_rate_active){
	global $db;
	global $error;

	$q = "UPDATE billing_rates SET
		billing_rate_text					=". $db->qstr($billing_rate_text) ."	,
		billing_rate_amount					=". $db->qstr($billing_rate_amount) ."	,
		billing_rate_active					=". $db->qstr($billing_rate_active) ."
	WHERE billing_rates_id = " . $db->qstr($billing_rates_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	return true;
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     delete_billing_rates<br>
* Purpose:  Deletes A single billing_rates row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function delete_billing_rates($billing_rates_id){
	global $db;
	global $error;

	$q = "DELETE FROM billing_rates
	WHERE billing_rates_id = " . $db->qstr($billing_rates_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	return true;
}


}
?>