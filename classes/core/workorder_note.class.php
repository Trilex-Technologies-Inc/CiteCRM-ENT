<?php
/**
 * Type:     Cite CMS Core Class<br>
 * Name:     workorder_note.class.php<br>
 * Purpose:  For all workorder_note methods<br>
 * @author Cite CMS Module Developer
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions
 * @link http://www.citecsoftware.com
*/

require(CLASS_PATH.'/getter/workorder_note_getter.class.php');
require_once(CLASS_PATH."/core/workorder_history.class.php");

class workorder_note extends workorder_note_getter {

var $this;

function workorder_note() {
	
}

function add_workorder_note($workorder_id,$workorder_note_text,$workorder_note_create_by,$workorder_subject){
	global $db;
	global $error;

	$q = "INSERT INTO  workorder_note SET
		workorder_id					= " . $db->qstr($workorder_id) . ",
		workorder_note_text				= " . $db->qstr($workorder_note_text) . ",
        workorder_subject               = " . $db->qstr($workorder_subject) . ",
        workorder_active                = '1',
		workorder_note_create_by		= " . $db->qstr($workorder_note_create_by);




	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

 	return $db->Insert_ID();
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     view_workorder_note<br>
* Purpose:  Loads A single workorder_note row<br>
*
* @author Cite CMS Module Developer
* @param $workorder_note_id String The workorder_note ID
* @access Public
* @return workorder_note Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function view_workorder_note($workorder_note_id){
	global $db;
	global $error;

	$q = "SELECT * FROM workorder_note
	WHERE workorder_note_id = ". $db->qstr($workorder_note_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     search_workorder_note<br>
* Purpose:  Loads All workorder_note rows paginated<br>
*
* @author Cite CMS Module Developer
* @param SmartyPaginate::getCurrentIndex() Smarty Paginate Object
* @param  SmartyPaginate::getLimit() Smarty Paginate Object
* @access Public
* @return $workorder_noteArray Array  The paginated result set  of workorder_notes
* @version 1.0
* @uses $db Datbase object, $error the Error object, $smarty Smarty Object
*/
function search_workorder_note(){
	global $db;
	global $error;

	$q = sprintf("SELECT SQL_CALC_FOUND_ROWS * FROM workorder_note LIMIT %d,%d",SmartyPaginate::getCurrentIndex(), SmartyPaginate::getLimit() );

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
}

	$workorder_noteArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$workorder_noteArray[$counter] = new workorder_note();
		$workorder_noteArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	// now we get the total number of records from the table
	$q = "SELECT FOUND_ROWS()";
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	SmartyPaginate::setTotal($rs->fields['FOUND_ROWS()']);

	return $workorder_noteArray;

}

/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     load_by_workorder_id<br>
* Purpose:  Loads All workorder_note rows By workorder ID<br>
*
* @author Cite CMS Module Developer
* @param String $workorder_id The work order ID
* @access Public
* @return $workorder_noteArray Array  of Workorder Note Objects
* @version 1.0
* @uses $db Datbase object, $error the Error object, $smarty Smarty Object
*/

function load_by_workorder_id($workorder_id,$field,$sort,$start,$limit,&$total) {

	global $db;
	global $error;
	
	$q = "SELECT SQL_CALC_FOUND_ROWS  * 
			FROM workorder_note 
			WHERE workorder_id = " . $db->qstr($workorder_id) . "
            AND workorder_active = '1'
		ORDER BY $field $sort";

	if($limit > 0) {
		$q .= "	LIMIT $start,$limit";
	}

	
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$workorder_noteArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$workorder_noteArray[$counter] = new workorder_note();
		$workorder_noteArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	// now we get the total number of records from the table
	$q = "SELECT FOUND_ROWS()";
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$total = $rs->fields['FOUND_ROWS()'];

	
	return $workorder_noteArray;
	
}

/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     update_workorder_note<br>
* Purpose:  Updates A single workorder_note row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function update_workorder_note($workorder_note_id,$workorder_note_text,$workorder_note_subject){
	global $db;
	global $error;

	$q = "UPDATE workorder_note SET
			workorder_note_text			= " . $db->qstr($workorder_note_text) .",
            workorder_subject           = " . $db->qstr($workorder_note_subject) ."
			WHERE workorder_note_id 	= " . $db->qstr($workorder_note_id);


	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}
	
	return true;
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     delete_workorder_note<br>
* Purpose:  Deletes A single workorder_note row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function delete_workorder_note($workorder_note_id){
	global $db;
	global $error;

	$q = "UPDATE workorder_note SET
                workorder_active = '0'
			WHERE workorder_note_id = " . $db->qstr($workorder_note_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}
	
	return true;
}



/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     delete_by_workorder<br>
* Purpose:  Deletes All workorder_notes that belong to Work Order row<br>
*
* @author Cite CMS Module Developer
* @param String $workorder_id The workorder_id
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function delete_by_workorder($workorder_id) {

	global $db;
	
	$q = "DELETE FROM workorder_note WHERE  workorder_id = " . $db->qstr( $workorder_id );
	
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}
	
	
	return true;

}


/**
*
* Type:     Cite CMS Private Methods<br>
* Name:     _save_history<br>
* Purpose:  Updates Work order History<br>
*
* @author Cite CMS Module Developer
* @param String $history_msg The history Message
* @access Private
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function _save_history($history_msg) {

	$this->fields['workorder_id'] = $_REQUEST['workorder_id'];
	
	$workorder_history = new workorder_history($history_msg);
	
	$workorder_history->fields['workorder_id'] 							= $this->fields['workorder_id'];
	$workorder_history->fields['user_id'] 							  = $_SESSION['SESSION_USER_ID'];
	$workorder_history->fields['workorder_subject']		 	   = $history_msg;
	$workorder_history->fields['workorder_history_create_date']	       = time();
	
	$workorder_history->add_workorder_history($workorder_history);

}

}
?>