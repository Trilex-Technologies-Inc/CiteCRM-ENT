<?php
/**
 * Type:     Cite CMS Core Class<br>
 * Name:     lead_meeting.class.php<br>
 * Purpose:  For all lead_meeting methods<br>
 * @author Cite CMS Module Developer
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions
 * @link http://www.citecsoftware.com
*/

require(CLASS_PATH.'/getter/lead_meeting_getter.class.php');

class lead_meeting extends lead_meeting_getter {


function lead_meeting(){
	global $smarty;
	global $translate;
	$translate = new translate();
	$translate_array = $translate->translate_module("lead_meeting");
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
* Name:     add_lead_meeting<br>
* Purpose:  Adds A single lead_meeting row<br>
*
* @author Cite CMS Module Developer
* @access Public
* @return lead_meeting Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function add_lead_meeting($lead_id,$lead_meeting_subject,$lead_meeting_text,$lead_meeting_start,$lead_meeting_end,$lead_meeting_active){
	global $db;
	global $error;

	$q = "INSERT INTO  lead_meeting SET
		lead_id						= " . $db->qstr($lead_id) .",
		lead_meeting_start			= " . $db->qstr($lead_meeting_start) .",
		lead_meeting_end			= " . $db->qstr($lead_meeting_end) .",
		lead_meeting_subject		= " . $db->qstr($lead_meeting_subject) .",
        lead_meeting_text           = " . $db->qstr($lead_meeting_text) . ",
		lead_meeting_created_by		= " . $db->qstr($_SESSION['SESSION_USER_ID']) .",
		lead_meeting_active			= " . $db->qstr($lead_meeting_active);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}



 	return $db->Insert_ID();
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     view_lead_meeting<br>
* Purpose:  Loads A single lead_meeting row<br>
*
* @author Cite CMS Module Developer
* @param $lead_meeting_id String The lead_meeting ID
* @access Public
* @return lead_meeting Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function view_lead_meeting($lead_meeting_id){
	global $db;
	global $error;

	$q = "SELECT * FROM lead_meeting
	WHERE lead_meeting_id = ". $db->qstr($lead_meeting_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     search_lead_meeting<br>
* Purpose:  Loads All lead_meeting rows paginated<br>
*
* @author Cite CMS Module Developer
* @param SmartyPaginate::getCurrentIndex() Smarty Paginate Object
* @param  SmartyPaginate::getLimit() Smarty Paginate Object
* @access Public
* @return $lead_meetingArray Array  The paginated result set  of lead_meetings
* @version 1.0
* @uses $db Datbase object, $error the Error object, $smarty Smarty Object
*/
function search_lead_meeting(){
	global $db;
	global $error;

	$q = sprintf("SELECT SQL_CALC_FOUND_ROWS * FROM lead_meeting LIMIT %d,%d",SmartyPaginate::getCurrentIndex(), SmartyPaginate::getLimit() );

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
}

	$lead_meetingArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$lead_meetingArray[$counter] = new lead_meeting();
		$lead_meetingArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	// now we get the total number of records from the table
	$q = "SELECT FOUND_ROWS()";
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	SmartyPaginate::setTotal($rs->fields['FOUND_ROWS()']);

	return $lead_meetingArray;

}


function load_by_lead_id($lead_id){
	global $db;
	global $error;

	$q = "SELECT * FROM lead_meeting WHERE lead_id = " . $db->qstr($lead_id) . " ORDER BY lead_meeting_start ASC";


	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}
	
	$lead_meetingArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$lead_meetingArray[$counter] = new lead_meeting();
		$lead_meetingArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	return $lead_meetingArray;
}

/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     update_lead_meeting<br>
* Purpose:  Updates A single lead_meeting row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function update_lead_meeting($lead_meeting_id,$lead_meeting_start,$lead_meeting_end,$lead_meeting_subject,$lead_meeting_text){
	global $db;
	global $error;

	$q = "UPDATE lead_meeting SET
           lead_meeting_start   = " . $db->qstr($lead_meeting_start) .",
           lead_meeting_end     = " . $db->qstr($lead_meeting_end) .",
           lead_meeting_subject = " . $db->qstr( $lead_meeting_subject) .",
           lead_meeting_text    = " . $db->qstr( $lead_meeting_text) ."
	       WHERE lead_meeting_id = " . $db->qstr($lead_meeting_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	return true;
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     delete_lead_meeting<br>
* Purpose:  Deletes A single lead_meeting row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function delete_lead_meeting($lead_meeting_id){
	global $db;
	global $error;

	$q = "UPDATE lead_meeting SET
            lead_meeting_active = '0'
	WHERE lead_meeting_id = " . $db->qstr($lead_meeting_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	return true;
}


function load_lead_by_lead_meeting($lead_meeting_id){
    global $db;
    global $error;

    $q = "SELECT lead_meeting.lead_id,lead.company_id,company.*
            FROM lead_meeting
            LEFT JOIN lead ON lead_meeting.lead_id = lead.lead_id
            LEFT JOIN company ON lead.company_id = company.company_id
            WHERE   lead_meeting.lead_meeting_id = " . $db->qstr($lead_meeting_id);

    if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

    $tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];

}

}
?>