<?php
/**
 * Type:     Cite CMS Core Class<br>
 * Name:     payment_option.class.php<br>
 * Purpose:  For all payment_option methods<br>
 * @author Cite CMS Module Developer
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions
 * @link http://www.citecsoftware.com
*/

require(CLASS_PATH.'/getter/payment_option_getter.class.php');

class payment_option extends payment_option_getter {


function payment_option(){
	global $smarty;
	global $translate;
	$translate = new translate();
	$translate_array = $translate->translate_module("payment_option");
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
* Name:     add_payment_option<br>
* Purpose:  Adds A single payment_option row<br>
*
* @author Cite CMS Module Developer
* @access Public
* @return payment_option Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function add_payment_option(){
	global $db;
	global $error;

	$q = "INSERT INTO  payment_option SET
		payment_option_text					=". $db->qstr($_REQUEST['payment_option_text']) .",
		payment_option_active					=". $db->qstr($_REQUEST['payment_option_active']) .",
		payment_option_order					=". $db->qstr($_REQUEST['payment_option_order']);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

$_SESSION['CLEAR_CACHE'] = true;

 return $db->Insert_ID();
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     view_payment_option<br>
* Purpose:  Loads A single payment_option row<br>
*
* @author Cite CMS Module Developer
* @param $payment_option_id String The payment_option ID
* @access Public
* @return payment_option Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function view_payment_option($payment_option_id){
	global $db;
	global $error;

	$q = "SELECT * FROM payment_option
	WHERE payment_option_id = ". $db->qstr($payment_option_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     search_payment_option<br>
* Purpose:  Loads All payment_option rows paginated<br>
*
* @author Cite CMS Module Developer
* @param SmartyPaginate::getCurrentIndex() Smarty Paginate Object
* @param  SmartyPaginate::getLimit() Smarty Paginate Object
* @access Public
* @return $payment_optionArray Array  The paginated result set  of payment_options
* @version 1.0
* @uses $db Datbase object, $error the Error object, $smarty Smarty Object
*/
function search_payment_option(){
	global $db;
	global $error;

	$q = "SELECT * FROM payment_option";

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$payment_optionArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$payment_optionArray[$counter] = new payment_option();
		$payment_optionArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	// now we get the total number of records from the table
	

	return $payment_optionArray;

}

function loadActive() {
	global $db;
	global $error;

	$q = "SELECT * FROM payment_option WHERE payment_option_active = '1' ORDER BY payment_option_order";


	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$payment_optionArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$payment_optionArray[$counter] = new payment_option();
		$payment_optionArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	return $payment_optionArray;

}

/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     update_payment_option<br>
* Purpose:  Updates A single payment_option row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function update_payment_option($payment_option_id,$payment_option_active){
	global $db;
	global $error;

	$q = "UPDATE payment_option SET
			payment_option_active	= " . $db->qstr($payment_option_active) ."
		WHERE payment_option_id 	= " . $db->qstr($payment_option_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	return true;
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     delete_payment_option<br>
* Purpose:  Deletes A single payment_option row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function delete_payment_option($payment_option_id){
	global $db;
	global $error;

	$q = "DELETE FROM payment_option
	WHERE payment_option_id = " . $db->qstr($payment_option_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

$_SESSION['CLEAR_CACHE'] = true;

	return true;
}


}
?>