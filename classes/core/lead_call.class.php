<?php
/**
 * Type:     Cite CMS Core Class<br>
 * Name:     lead_call.class.php<br>
 * Purpose:  For all lead_call methods<br>
 * @author Cite CMS Module Developer
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions
 * @link http://www.citecsoftware.com
*/

require(CLASS_PATH.'/getter/lead_call_getter.class.php');

class lead_call extends lead_call_getter {


function lead_call(){
	global $smarty;
	global $translate;
	$translate = new translate();
	$translate_array = $translate->translate_module("lead_call");
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
* Name:     add_lead_call<br>
* Purpose:  Adds A single lead_call row<br>
*
* @author Cite CMS Module Developer
* @access Public
* @return lead_call Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function add_lead_call($lead_id,$lead_call_subject,$lead_call_text,$lead_call_date,$lead_call_duration,$lead_call_by){
	global $db;
	global $error;

	$q = "INSERT INTO  lead_call SET
		lead_id							=". $db->qstr($lead_id) .",
		lead_call_subject				=". $db->qstr($lead_call_subject) .",
		lead_call_text					=". $db->qstr($lead_call_text) .",
		lead_call_date					=". $db->qstr($lead_call_date) .",
		lead_call_duration				=". $db->qstr($lead_call_duration) .",
        lead_call_active                = '1',
		lead_call_by					=". $db->qstr($_SESSION['SESSION_USER_ID']);


	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

 	return $db->Insert_ID();
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     view_lead_call<br>
* Purpose:  Loads A single lead_call row<br>
*
* @author Cite CMS Module Developer
* @param $lead_call_id String The lead_call ID
* @access Public
* @return lead_call Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function view_lead_call($lead_call_id){
	global $db;
	global $error;

	$q = "SELECT * FROM lead_call
	WHERE lead_call_id = ". $db->qstr($lead_call_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     search_lead_call<br>
* Purpose:  Loads All lead_call rows paginated<br>
*
* @author Cite CMS Module Developer
* @param SmartyPaginate::getCurrentIndex() Smarty Paginate Object
* @param  SmartyPaginate::getLimit() Smarty Paginate Object
* @access Public
* @return $lead_callArray Array  The paginated result set  of lead_calls
* @version 1.0
* @uses $db Datbase object, $error the Error object, $smarty Smarty Object
*/
function search_lead_call(){
	global $db;
	global $error;

	$q = sprintf("SELECT SQL_CALC_FOUND_ROWS * FROM lead_call LIMIT %d,%d",SmartyPaginate::getCurrentIndex(), SmartyPaginate::getLimit() );

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$lead_callArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$lead_callArray[$counter] = new lead_call();
		$lead_callArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	// now we get the total number of records from the table
	$q = "SELECT FOUND_ROWS()";
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	SmartyPaginate::setTotal($rs->fields['FOUND_ROWS()']);

	return $lead_callArray;

}


function load_by_lead_id($lead_id) {
	global $db;
	global $error;
	
	$q = "SELECT * FROM lead_call WHERE lead_id = " .$db->qstr($lead_id) . " AND lead_call_active = '1' ORDER BY lead_call_date ASC";


	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$lead_callArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$lead_callArray[$counter] = new lead_call();
		$lead_callArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}


	return $lead_callArray;
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     update_lead_call<br>
* Purpose:  Updates A single lead_call row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function update_lead_call($lead_call_id,$lead_call_subject,$lead_call_text,$lead_call_date,$lead_call_duration){
	global $db;
	global $error;

	$q = "UPDATE lead_call SET
            lead_call_subject       = " . $db->qstr($lead_call_subject) . ",
            lead_call_text          = " . $db->qstr($lead_call_text) . ",
            lead_call_date          = " . $db->qstr($lead_call_date) . ",
            lead_call_duration      = " . $db->qstr($lead_call_duration) . "
	   WHERE lead_call_id           = " . $db->qstr($lead_call_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}


	return true;
}



/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     delete_lead_call<br>
* Purpose:  Deletes A single lead_call row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function delete_lead_call($lead_call_id){
	global $db;
	global $error;

	$q = "UPDATE lead_call SET
            lead_call_active = '0'
	       WHERE lead_call_id = " . $db->qstr($lead_call_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	return true;
}


}
?>