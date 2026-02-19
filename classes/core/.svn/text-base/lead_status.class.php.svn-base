<?php
/**
 * Type:     Cite CMS Core Class<br>
 * Name:     lead_status.class.php<br>
 * Purpose:  For all lead_status methods<br>
 * @author Cite CMS Module Developer
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions
 * @link http://www.citecsoftware.com
*/

require(CLASS_PATH.'/getter/lead_status_getter.class.php');

class lead_status extends lead_status_getter {


function lead_status(){
	global $smarty;
	global $translate;
	$translate = new translate();
	$translate_array = $translate->translate_module("lead_status");
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
* Name:     add_lead_status<br>
* Purpose:  Adds A single lead_status row<br>
*
* @author Cite CMS Module Developer
* @access Public
* @return lead_status Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function add_lead_status($lead_status_text,$lead_status_active){
	global $db;
	global $error;

	$q = "INSERT INTO  lead_status SET
		lead_status_text					=". $db->qstr($_REQUEST['lead_status_text']) .",
		lead_status_active					=". $db->qstr($_REQUEST['lead_status_active']);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

$_SESSION['CLEAR_CACHE'] = true;

 return $db->Insert_ID();
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     view_lead_status<br>
* Purpose:  Loads A single lead_status row<br>
*
* @author Cite CMS Module Developer
* @param $lead_status_id String The lead_status ID
* @access Public
* @return lead_status Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function view_lead_status($lead_status_id){
	global $db;
	global $error;

	$q = "SELECT * FROM lead_status
	WHERE lead_status_id = ". $db->qstr($lead_status_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     search_lead_status<br>
* Purpose:  Loads All lead_status rows paginated<br>
*
* @author Cite CMS Module Developer
* @param SmartyPaginate::getCurrentIndex() Smarty Paginate Object
* @param  SmartyPaginate::getLimit() Smarty Paginate Object
* @access Public
* @return $lead_statusArray Array  The paginated result set  of lead_statuss
* @version 1.0
* @uses $db Datbase object, $error the Error object, $smarty Smarty Object
*/
function search_lead_status(){
	global $db;
	global $error;

	$q = "SELECT * FROM lead_status";

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$lead_statusArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$lead_statusArray[$counter] = new lead_status();
		$lead_statusArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	
	return $lead_statusArray;

}

function load_all() {
	global $db;
	global $error;

	$q = "SELECT * FROM lead_status WHERE lead_status_active='1'";

	
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$lead_statusArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$lead_statusArray[$counter] = new lead_status();
		$lead_statusArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	return $lead_statusArray;

}

/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     update_lead_status<br>
* Purpose:  Updates A single lead_status row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function update_lead_status($lead_status_text,$lead_status_active,$lead_status_id){
	global $db;
	global $error;

	$q = "UPDATE lead_status SET
		lead_status_text					=". $db->qstr($lead_status_text) ."	,
		lead_status_active					=". $db->qstr($lead_status_active) ."
	WHERE lead_status_id = " . $db->qstr($lead_status_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

$_SESSION['CLEAR_CACHE'] = true;

	return true;
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     delete_lead_status<br>
* Purpose:  Deletes A single lead_status row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function delete_lead_status($lead_status_id){
	global $db;
	global $error;

	$q = "DELETE FROM lead_status
	WHERE lead_status_id = " . $db->qstr($lead_status_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	return true;
}


}
?>