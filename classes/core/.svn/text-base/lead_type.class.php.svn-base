<?php
/**
 * Type:     Cite CMS Core Class<br>
 * Name:     lead_type.class.php<br>
 * Purpose:  For all lead_type methods<br>
 * @author Cite CMS Module Developer
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions
 * @link http://www.citecsoftware.com
*/

require(CLASS_PATH.'/getter/lead_type_getter.class.php');

class lead_type extends lead_type_getter {


function lead_type(){
	global $smarty;
	global $translate;
	$translate = new translate();
	$translate_array = $translate->translate_module("lead_type");
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
* Name:     add_lead_type<br>
* Purpose:  Adds A single lead_type row<br>
*
* @author Cite CMS Module Developer
* @access Public
* @return lead_type Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function add_lead_type($lead_type_text,$lead_type_active){
	global $db;
	global $error;

	$q = "INSERT INTO  lead_type SET
		lead_type_text					=". $db->qstr($lead_type_text) .",
		lead_type_active				=". $db->qstr($lead_type_active);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}


 	return $db->Insert_ID();
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     view_lead_type<br>
* Purpose:  Loads A single lead_type row<br>
*
* @author Cite CMS Module Developer
* @param $lead_type_id String The lead_type ID
* @access Public
* @return lead_type Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function view_lead_type($lead_type_id){
	global $db;
	global $error;

	$q = "SELECT * FROM lead_type
	WHERE lead_type_id = ". $db->qstr($lead_type_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     search_lead_type<br>
* Purpose:  Loads All lead_type rows paginated<br>
*
* @author Cite CMS Module Developer
* @param SmartyPaginate::getCurrentIndex() Smarty Paginate Object
* @param  SmartyPaginate::getLimit() Smarty Paginate Object
* @access Public
* @return $lead_typeArray Array  The paginated result set  of lead_types
* @version 1.0
* @uses $db Datbase object, $error the Error object, $smarty Smarty Object
*/
function search_lead_type(){
	global $db;
	global $error;

	$q = "SELECT * FROM lead_type";

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$lead_typeArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$lead_typeArray[$counter] = new lead_type();
		$lead_typeArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}


	return $lead_typeArray;

}

function load_all() {
	global $db;
	global $error;

	$q = "SELECT * FROM lead_type WHERE lead_type_active='1'";

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$lead_typeArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$lead_typeArray[$counter] = new lead_type();
		$lead_typeArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}
	
	return $lead_typeArray;
	
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     update_lead_type<br>
* Purpose:  Updates A single lead_type row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function update_lead_type($lead_type_id,$lead_type_active,$lead_type_text){
	global $db;
	global $error;

	$q = "UPDATE lead_type SET
		lead_type_text					=". $db->qstr($lead_type_text) ."	,
		lead_type_active				=". $db->qstr($lead_type_active) ."
	WHERE lead_type_id = " . $db->qstr($lead_type_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

$_SESSION['CLEAR_CACHE'] = true;

	return true;
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     delete_lead_type<br>
* Purpose:  Deletes A single lead_type row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function delete_lead_type($lead_type_id){
	global $db;
	global $error;

	$q = "DELETE FROM lead_type
	WHERE lead_type_id = " . $db->qstr($lead_type_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}


	return true;
}


}
?>