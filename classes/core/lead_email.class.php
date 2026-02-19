<?php
/**
 * Type:     Cite CMS Core Class<br>
 * Name:     lead_email.class.php<br>
 * Purpose:  For all lead_email methods<br>
 * @author Cite CMS Module Developer
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions
 * @link http://www.citecsoftware.com
*/

require(CLASS_PATH.'/getter/lead_email_getter.class.php');

class lead_email extends lead_email_getter {


function lead_email(){
	global $smarty;
	global $translate;
	$translate = new translate();
	$translate_array = $translate->translate_module("lead_email");
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
* Name:     add_lead_email<br>
* Purpose:  Adds A single lead_email row<br>
*
* @author Cite CMS Module Developer
* @access Public
* @return lead_email Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function add_lead_email($lead_id,$mail_id,$lead_mail_sent_by,$lead_mail_date_sent){
	global $db;
	global $error;

	$q = "INSERT INTO  lead_email SET
		lead_id						=". $db->qstr($lead_id) .",
		mail_id						=". $db->qstr($mail_id) .",
		lead_mail_sent_by			=". $db->qstr($lead_mail_sent_by) .",
		lead_mail_date_sent			=". $db->qstr($lead_mail_date_sent);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}


 	return $db->Insert_ID();
}

function add_lead_email_details($email_text,$email_subject,$email_to,$email_name,$mail_from_name,$mail_from_email,$email_delivered,$mail_creation){
	global $db;
	global $error;
	
	$q = "INSERT INTO mail SET
			mail_to_email				= " . $db->qstr($email_to) . ",
			mail_to_name				= " . $db->qstr($email_name) . ",
			mail_from_email				= " . $db->qstr($mail_from_email) . ",
			mail_from_name				= " . $db->qstr($mail_from_name) .",
			mail_subject				= " . $db->qstr($email_subject) . ",		
			mail_body					= " . $db->qstr($email_text) . ",
			mail_deliverd				= " . $db->qstr($email_delivered) . ",
			mail_creation_unixtime		= " . $db->qstr($mail_creation);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}


 	return $db->Insert_ID();
	
}

/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     view_lead_email<br>
* Purpose:  Loads A single lead_email row<br>
*
* @author Cite CMS Module Developer
* @param $lead_email_id String The lead_email ID
* @access Public
* @return lead_email Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function view_lead_email($lead_email_id){
	global $db;
	global $error;

	$q = "SELECT * FROM lead_email
	WHERE lead_email_id = ". $db->qstr($lead_email_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     search_lead_email<br>
* Purpose:  Loads All lead_email rows paginated<br>
*
* @author Cite CMS Module Developer
* @param SmartyPaginate::getCurrentIndex() Smarty Paginate Object
* @param  SmartyPaginate::getLimit() Smarty Paginate Object
* @access Public
* @return $lead_emailArray Array  The paginated result set  of lead_emails
* @version 1.0
* @uses $db Datbase object, $error the Error object, $smarty Smarty Object
*/
function search_lead_email(){
	global $db;
	global $error;

	$q = sprintf("SELECT SQL_CALC_FOUND_ROWS * FROM lead_email LIMIT %d,%d",SmartyPaginate::getCurrentIndex(), SmartyPaginate::getLimit() );

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$lead_emailArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$lead_emailArray[$counter] = new lead_email();
		$lead_emailArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	// now we get the total number of records from the table
	$q = "SELECT FOUND_ROWS()";
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	SmartyPaginate::setTotal($rs->fields['FOUND_ROWS()']);

	return $lead_emailArray;

}

function load_by_lead_id($lead_id){
	global $db;
	global $error;

	$q ="SELECT lead_email.*, mail.*
			FROM lead_email 
			LEFT JOIN mail ON lead_email.mail_id = mail.mail_id
			WHERE lead_email.lead_id = " . $db->qstr($lead_id);


	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$lead_emailArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$lead_emailArray[$counter] = new lead_email();
		$lead_emailArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	return $lead_emailArray;
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     update_lead_email<br>
* Purpose:  Updates A single lead_email row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function update_lead_email($_REQUEST){
	global $db;
	global $error;

	$q = "UPDATE lead_email SET
		lead_id					=". $db->qstr($_REQUEST['lead_id']) ."	,
		mail_id					=". $db->qstr($_REQUEST['mail_id']) ."	,
		lead_mail_sent_by					=". $db->qstr($_REQUEST['lead_mail_sent_by']) ."	,
		lead_mail_date_sent					=". $db->qstr($_REQUEST['lead_mail_date_sent']) ."
	WHERE lead_email_id = " . $db->qstr($_REQUEST['lead_email_id']);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

$_SESSION['CLEAR_CACHE'] = true;

	return true;
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     delete_lead_email<br>
* Purpose:  Deletes A single lead_email row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function delete_lead_email($lead_email_id){
	global $db;
	global $error;

	$q = "DELETE FROM lead_email
	WHERE lead_email_id = " . $db->qstr($lead_email_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

$_SESSION['CLEAR_CACHE'] = true;

	return true;
}


}
?>