<?php
/**
 * Type:     Cite CMS Core Class<br>
 * Name:     workorder_comment.class.php<br>
 * Purpose:  For all workorder_comment methods<br>
 * @author Cite CMS Module Developer
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions
 * @link http://www.citecsoftware.com
*/

require(CLASS_PATH.'/getter/workorder_comment_getter.class.php');
require_once(CLASS_PATH."/core/workorder_history.class.php");

class workorder_comment extends workorder_comment_getter {

function add_workorder_comment(){
	global $db;
	global $error;

	$q = "INSERT INTO  workorder_comment SET
		workorder_id								=". $db->qstr($_REQUEST['workorder_id']) .",
		workorder_comment_create_by			=". $db->qstr($_SESSION['SESSION_USER_ID']) .",
		workorder_comment_text					=". $db->qstr($_REQUEST['workorder_comment_text']);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$this->fields['workorder_comment_id'] = $db->Insert_ID();

	$this->fields['workorder_id'] = $_REQUEST['workorder_id'];

	$this->_save_history("New comment added# ". $this->fields['workorder_comment_id']);

 return $this->fields['workorder_comment_id'];
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     view_workorder_comment<br>
* Purpose:  Loads A single workorder_comment row<br>
*
* @author Cite CMS Module Developer
* @param $workorder_comment_id String The workorder_comment ID
* @access Public
* @return workorder_comment Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function view_workorder_comment($workorder_comment_id){
	global $db;
	global $error;

	$q = "SELECT * FROM workorder_comment
	WHERE workorder_comment_id = ". $db->qstr($workorder_comment_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     search_workorder_comment<br>
* Purpose:  Loads All workorder_comment rows paginated<br>
*
* @author Cite CMS Module Developer
* @param SmartyPaginate::getCurrentIndex() Smarty Paginate Object
* @param  SmartyPaginate::getLimit() Smarty Paginate Object
* @access Public
* @return $workorder_commentArray Array  The paginated result set  of workorder_comments
* @version 1.0
* @uses $db Datbase object, $error the Error object, $smarty Smarty Object
*/
function search_workorder_comment(){
	global $db;
	global $error;

	$q = sprintf("SELECT SQL_CALC_FOUND_ROWS * FROM workorder_comment LIMIT %d,%d",SmartyPaginate::getCurrentIndex(), SmartyPaginate::getLimit() );

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
}

	$workorder_commentArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$workorder_commentArray[$counter] = new workorder_comment();
		$workorder_commentArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	// now we get the total number of records from the table
	$q = "SELECT FOUND_ROWS()";
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	SmartyPaginate::setTotal($rs->fields['FOUND_ROWS()']);

	return $workorder_commentArray;

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     load_by_workorder_id<br>
* Purpose:  Loads All workorder_comment rows by work order id<br>
*
* @author Cite CMS Module Developer
* @param String $workorder_id The work order ID
* @access Public
* @return $workorder_commentArray Array of workorder_comment objects
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function load_by_workorder_id($workorder_id) {

	global $db;
	global $error;
	
	$q = "SELECT * FROM  workorder_comment WHERE workorder_id = " . $db->qstr( $workorder_id);
	
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$workorder_commentArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$workorder_commentArray[$counter] = new workorder_comment();
		$workorder_commentArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}
	
	return $workorder_commentArray;
}

/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     update_workorder_comment<br>
* Purpose:  Updates A single workorder_comment row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function update_workorder_comment($_REQUEST){
	global $db;
	global $error;

	$q = "UPDATE workorder_comment SET
				workorder_id						=". $db->qstr( $_REQUEST['workorder_id']) ."	,
				workorder_comment_create_by	=". $db->qstr( $_REQUEST['workorder_comment_create_by']) ."	,
				workorder_comment_text			=". $db->qstr( $_REQUEST['workorder_comment_text']) ."
		WHERE workorder_comment_id 			=". $db->qstr( $_REQUEST['workorder_comment_id']);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$this->fields['workorder_id'] = $_REQUEST['workorder_id'];
	
	$this->_save_history("Comment Updated # ". $_REQUEST['workorder_id']);
	
	return true;
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     delete_workorder_comment<br>
* Purpose:  Deletes A single workorder_comment row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function delete_workorder_comment($workorder_comment_id){
	global $db;
	global $error;

	$q = "DELETE FROM workorder_comment
	WHERE workorder_comment_id = " . $db->qstr($workorder_comment_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}
	
	$this->fields['workorder_id'] = $_REQUEST['workorder_id'];
	
	$this->_save_history("Comment Deleted # ". $workorder_comment_id);
	
	return true;
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     delete_by_workorder<br>
* Purpose:  Deletes All workorder_comment that belong to Work Order row<br>
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
	
	$q = "DELETE FROM workorder_comment WHERE  workorder_id = " . $db->qstr( $workorder_id );
	
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

	$workorder_history = new workorder_history($history_msg);
	
	$workorder_history->fields['workorder_id'] 							= $this->fields['workorder_id'];
	$workorder_history->fields['user_id'] 								= $_SESSION['SESSION_USER_ID'];
	$workorder_history->fields['workorder_history_text']		 	= $history_msg;
	$workorder_history->fields['workorder_history_create_date']	= time();
	
	$workorder_history->add_workorder_history($workorder_history);

}

}
?>