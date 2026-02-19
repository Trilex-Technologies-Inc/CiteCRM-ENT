<?php
/**
 * Type:     Cite CMS Core Class<br>
 * Name:     state.class.php<br>
 * Purpose:  For all state methods<br>
 * @author Cite CMS Module Developer
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions
 * @link http://www.citecsoftware.com
*/

require(CLASS_PATH.'/getter/state_getter.class.php');

class state extends state_getter {

function add_state(){
	global $db;
	global $error;

	$q = "INSERT INTO  state SET
		country_id					=". $db->qstr($_REQUEST['country_id']) .",
		state_code					=". $db->qstr($_REQUEST['state_code']) .",
		state_text					=". $db->qstr($_REQUEST['state_text']);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

 return $db->Insert_ID();
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     view_state<br>
* Purpose:  Loads A single state row<br>
*
* @author Cite CMS Module Developer
* @param $state_id String The state ID
* @access Public
* @return state Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function view_state($state_id){
	global $db;
	global $error;

	$q = "SELECT * FROM state
	WHERE state_id = ". $db->qstr($state_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     search_state<br>
* Purpose:  Loads All state rows paginated<br>
*
* @author Cite CMS Module Developer
* @param SmartyPaginate::getCurrentIndex() Smarty Paginate Object
* @param  SmartyPaginate::getLimit() Smarty Paginate Object
* @access Public
* @return $stateArray Array  The paginated result set  of states
* @version 1.0
* @uses $db Datbase object, $error the Error object, $smarty Smarty Object
*/
function search_state(){
	global $db;
	global $error;

	$q = sprintf("SELECT SQL_CALC_FOUND_ROWS * FROM state LIMIT %d,%d",SmartyPaginate::getCurrentIndex(), SmartyPaginate::getLimit() );

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
}

	$stateArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$stateArray[$counter] = new state();
		$stateArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	// now we get the total number of records from the table
	$q = "SELECT FOUND_ROWS()";
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	SmartyPaginate::setTotal($rs->fields['FOUND_ROWS()']);

	return $stateArray;

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     load_by_county_id<br>
* Purpose:  Loads All state rows By Country ID<br>
*
* @author Cite CMS Module Developer
* @param SmartyPaginate::getCurrentIndex() Smarty Paginate Object
* @param  SmartyPaginate::getLimit() Smarty Paginate Object
* @access Public
* @return $stateArray Array  The paginated result set  of states
* @version 1.0
* @uses $db Datbase object, $error the Error object, $smarty Smarty Object
*/
function load_by_county_id($country_id) {

	global $db;
	global $error;

	$q = "SELECT * FROM state 
			WHERE country_id = " . $db->qstr( $country_id) . "
			AND  state_active = '1'";

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$stateArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$stateArray[$counter] = new state();
		$stateArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}
	
	return $stateArray;
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     update_state<br>
* Purpose:  Updates A single state row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function update_state($_REQUEST){
	global $db;
	global $error;

	$q = "UPDATE state SET
		country_id					=". $db->qstr($_REQUEST['country_id']) ."	,
		state_code					=". $db->qstr($_REQUEST['state_code']) ."	,
		state_text					=". $db->qstr($_REQUEST['state_text']) ."
	WHERE state_id = " . $db->qstr($_REQUEST['state_id']);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	return true;
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     delete_state<br>
* Purpose:  Deletes A single state row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function delete_state($state_id){
	global $db;
	global $error;

	$q = "DELETE FROM state
	WHERE state_id = " . $db->qstr($state_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	return true;
}


}
?>