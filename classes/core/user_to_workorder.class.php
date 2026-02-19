<?php
/**
 * Type:     Cite CMS Core Class<br>
 * Name:     user_to_workorder.class.php<br>
 * Purpose:  For all user_to_workorder methods<br>
 * @author Cite CMS Module Developer
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions
 * @link http://www.citecsoftware.com
*/

require(CLASS_PATH.'/getter/user_to_workorder_getter.class.php');

class user_to_workorder extends user_to_workorder_getter {

function add_user_to_workorder($workorder_id,$user_id){
	global $db;
	global $error;

	$q = "INSERT INTO  user_to_workorder SET
		user_id		     =". $db->qstr($user_id) .",
		workorder_id	 =". $db->qstr($workorder_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

 return $db->Insert_ID();
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     view_user_to_workorder<br>
* Purpose:  Loads A single user_to_workorder row<br>
*
* @author Cite CMS Module Developer
* @param $user_to_workorder_id String The user_to_workorder ID
* @access Public
* @return user_to_workorder Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function view_user_to_workorder($user_to_workorder_id){
	global $db;
	global $error;

	$q = "SELECT * FROM user_to_workorder
	WHERE user_to_workorder_id = ". $db->qstr($user_to_workorder_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     search_user_to_workorder<br>
* Purpose:  Loads All user_to_workorder rows paginated<br>
*
* @author Cite CMS Module Developer
* @param SmartyPaginate::getCurrentIndex() Smarty Paginate Object
* @param  SmartyPaginate::getLimit() Smarty Paginate Object
* @access Public
* @return $user_to_workorderArray Array  The paginated result set  of user_to_workorders
* @version 1.0
* @uses $db Datbase object, $error the Error object, $smarty Smarty Object
*/
function search_user_to_workorder(){
	global $db;
	global $error;

	$q = sprintf("SELECT SQL_CALC_FOUND_ROWS * FROM user_to_workorder LIMIT %d,%d",SmartyPaginate::getCurrentIndex(), SmartyPaginate::getLimit() );

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
}

	$user_to_workorderArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$user_to_workorderArray[$counter] = new user_to_workorder();
		$user_to_workorderArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	// now we get the total number of records from the table
	$q = "SELECT FOUND_ROWS()";
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	SmartyPaginate::setTotal($rs->fields['FOUND_ROWS()']);

	return $user_to_workorderArray;

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     update_user_to_workorder<br>
* Purpose:  Updates A single user_to_workorder row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function update_user_to_workorder($_REQUEST){
	global $db;
	global $error;

	$q = "UPDATE user_to_workorder SET
		user_id					=". $db->qstr($_REQUEST['user_id']) ."	,
		workorder_id					=". $db->qstr($_REQUEST['workorder_id']) ."
	WHERE user_to_workorder_id = " . $db->qstr($_REQUEST['user_to_workorder_id']);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	return true;
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     delete_user_to_workorder<br>
* Purpose:  Deletes A single user_to_workorder row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function delete_user_to_workorder($user_to_workorder_id){
	global $db;
	global $error;

	$q = "DELETE FROM user_to_workorder
	WHERE user_to_workorder_id = " . $db->qstr($user_to_workorder_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

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
	
	$q = "DELETE FROM user_to_workorder WHERE  workorder_id = " . $db->qstr( $workorder_id );
	
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}
	
	
	return true;

}


}
?>