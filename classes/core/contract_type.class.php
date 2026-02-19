<?php
/**
 * Type:     Cite CMS Core Class<br>
 * Name:     contract_type.class.php<br>
 * Purpose:  For all contract_type methods<br>
 * @author Cite CMS Module Developer
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions
 * @link http://www.citecsoftware.com
*/

require(CLASS_PATH.'/getter/contract_type_getter.class.php');

class contract_type extends contract_type_getter {


function contract_type(){
	global $smarty;
	global $translate;
	$translate = new translate();
	$translate_array = $translate->translate_module("contract_type");
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
* Name:     add_contract_type<br>
* Purpose:  Adds A single contract_type row<br>
*
* @author Cite CMS Module Developer
* @access Public
* @return contract_type Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function add_contract_type($contract_type_name,$contract_type_text,$contract_type_rate,$contract_type_term,$contract_type_active,$contract_type_covered_labor,$contract_type_covered_labor_rate,$contract_type_non_covered_labor_rate,$contract_type_call_min,$contract_type_call_covered_rate,$contract_type_call_non_covered_rate,$contract_type_increament){
	global $db;
	global $error;

	$q = "INSERT INTO  contract_type SET
	        contract_type_name                      = " . $db->qstr($contract_type_name) . ",
            contract_type_text                      = " . $db->qstr($contract_type_text) . ",
            contract_type_rate                      = " . $db->qstr($contract_type_rate) . ",
            contract_type_term                      = " . $db->qstr($contract_type_term) . ",
            contract_type_active                    = " . $db->qstr($contract_type_active) . ",
            contract_type_covered_labor             = " . $db->qstr($contract_type_covered_labor) . ",
            contract_type_covered_labor_rate        = " . $db->qstr($contract_type_covered_labor_rate) . ",
            contract_type_non_covered_labor_rate    = " . $db->qstr($contract_type_non_covered_labor_rate) . ",
            contract_type_call_min                  = " . $db->qstr($contract_type_call_min) . ",
            contract_type_call_covered_rate         = " . $db->qstr($contract_type_call_covered_rate) . ",
            contract_type_call_non_covered_rate     = " . $db->qstr($contract_type_call_non_covered_rate) . ",
            contract_type_increament                = " . $db->qstr($contract_type_increament);



	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}



 	return $db->Insert_ID();
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     view_contract_type<br>
* Purpose:  Loads A single contract_type row<br>
*
* @author Cite CMS Module Developer
* @param $contract_type_id String The contract_type ID
* @access Public
* @return contract_type Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function view_contract_type($contract_type_id){
	global $db;
	global $error;

	$q = "SELECT * FROM contract_type
	WHERE contract_type_id = ". $db->qstr($contract_type_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     search_contract_type<br>
* Purpose:  Loads All contract_type rows paginated<br>
*
* @author Cite CMS Module Developer
* @param SmartyPaginate::getCurrentIndex() Smarty Paginate Object
* @param  SmartyPaginate::getLimit() Smarty Paginate Object
* @access Public
* @return $contract_typeArray Array  The paginated result set  of contract_types
* @version 1.0
* @uses $db Datbase object, $error the Error object, $smarty Smarty Object
*/
function search_contract_type(){
	global $db;
	global $error;

	$q = "SELECT  * FROM contract_type";

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$contract_typeArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$contract_typeArray[$counter] = new contract_type();
		$contract_typeArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}



	return $contract_typeArray;

}

function load_all() {
	global $db;
	global $error;

	$q = "SELECT * FROM contract_type WHERE contract_type_active ='1'";

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$contract_typeArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$contract_typeArray[$counter] = new contract_type();
		$contract_typeArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	return $contract_typeArray;
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     update_contract_type<br>
* Purpose:  Updates A single contract_type row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function update_contract_type($contract_type_id,$contract_type_name,$contract_type_text,$contract_type_rate,$contract_type_term,$contract_type_active,$contract_type_covered_labor,$contract_type_covered_labor_rate,$contract_type_non_covered_labor_rate,$contract_type_call_min,$contract_type_call_covered_rate,$contract_type_call_non_covered_rate,$contract_type_increament){
	global $db;
	global $error;

	$q = "UPDATE contract_type SET
		 contract_type_name                      = " . $db->qstr($contract_type_name) . ",
            contract_type_text                      = " . $db->qstr($contract_type_text) . ",
            contract_type_rate                      = " . $db->qstr($contract_type_rate) . ",
            contract_type_term                      = " . $db->qstr($contract_type_term) . ",
            contract_type_active                    = " . $db->qstr($contract_type_active) . ",
            contract_type_covered_labor             = " . $db->qstr($contract_type_covered_labor) . ",
            contract_type_covered_labor_rate        = " . $db->qstr($contract_type_covered_labor_rate) . ",
            contract_type_non_covered_labor_rate    = " . $db->qstr($contract_type_non_covered_labor_rate) . ",
            contract_type_call_min                  = " . $db->qstr($contract_type_call_min) . ",
            contract_type_call_covered_rate         = " . $db->qstr($contract_type_call_covered_rate) . ",
            contract_type_call_non_covered_rate     = " . $db->qstr($contract_type_call_non_covered_rate) . ",
            contract_type_increament                = " . $db->qstr($contract_type_increament) . "
	WHERE contract_type_id					=". $db->qstr($contract_type_id);

    print $q;

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	return true;
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     delete_contract_type<br>
* Purpose:  Deletes A single contract_type row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function delete_contract_type($contract_type_id){
	global $db;
	global $error;

	$q = "DELETE FROM contract_type
	WHERE contract_type_id = " . $db->qstr($contract_type_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

$_SESSION['CLEAR_CACHE'] = true;

	return true;
}


}
?>