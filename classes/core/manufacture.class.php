<?php
/**
 * Type:     Cite CMS Core Class<br>
 * Name:     manufacture.class.php<br>
 * Purpose:  For all manufacture methods<br>
 * @author Cite CMS Module Developer
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions
 * @link http://www.citecsoftware.com
*/

require(CLASS_PATH.'/getter/manufacture_getter.class.php');

class manufacture extends manufacture_getter {


function manufacture(){
	global $smarty;
	global $translate;
	$translate = new translate();
	$translate_array = $translate->translate_module("manufacture");
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
* Name:     add_manufacture<br>
* Purpose:  Adds A single manufacture row<br>
*
* @author Cite CMS Module Developer
* @access Public
* @return manufacture Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function add_manufacture(){
	global $db;
	global $error;

	$q = "INSERT INTO  manufacture SET
		manufacture_name					=". $db->qstr($_REQUEST['manufacture_name']) .",
		manufacture_image					=". $db->qstr($_REQUEST['manufacture_image']);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

$_SESSION['CLEAR_CACHE'] = true;

 return $db->Insert_ID();
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     view_manufacture<br>
* Purpose:  Loads A single manufacture row<br>
*
* @author Cite CMS Module Developer
* @param $manufacture_id String The manufacture ID
* @access Public
* @return manufacture Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function view_manufacture($manufacture_id){
	global $db;
	global $error;

	$q = "SELECT * FROM manufacture
	WHERE manufacture_id = ". $db->qstr($manufacture_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     search_manufacture<br>
* Purpose:  Loads All manufacture rows paginated<br>
*
* @author Cite CMS Module Developer
* @param SmartyPaginate::getCurrentIndex() Smarty Paginate Object
* @param  SmartyPaginate::getLimit() Smarty Paginate Object
* @access Public
* @return $manufactureArray Array  The paginated result set  of manufactures
* @version 1.0
* @uses $db Datbase object, $error the Error object, $smarty Smarty Object
*/
function search_manufacture(){
	global $db;
	global $error;

	$q = sprintf("SELECT SQL_CALC_FOUND_ROWS * FROM manufacture LIMIT %d,%d",SmartyPaginate::getCurrentIndex(), SmartyPaginate::getLimit() );

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
}

	$manufactureArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$manufactureArray[$counter] = new manufacture();
		$manufactureArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	// now we get the total number of records from the table
	$q = "SELECT FOUND_ROWS()";
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	SmartyPaginate::setTotal($rs->fields['FOUND_ROWS()']);

	return $manufactureArray;

}


function loadAll(){
	global $db;
	global $error;
	
	$q = "SELECT * FROM manufacture ORDER BY manufacture_name";
	
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$manufactureArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$manufactureArray[$counter] = new manufacture();
		$manufactureArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}


	return $manufactureArray;

}

/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     update_manufacture<br>
* Purpose:  Updates A single manufacture row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function update_manufacture($_REQUEST){
	global $db;
	global $error;

	$q = "UPDATE manufacture SET
		manufacture_name					=". $db->qstr($_REQUEST['manufacture_name']) ."	,
		manufacture_image					=". $db->qstr($_REQUEST['manufacture_image']) ."
	WHERE manufacture_id = " . $db->qstr($_REQUEST['manufacture_id']);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

$_SESSION['CLEAR_CACHE'] = true;

	return true;
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     delete_manufacture<br>
* Purpose:  Deletes A single manufacture row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function delete_manufacture($manufacture_id){
	global $db;
	global $error;

	$q = "DELETE FROM manufacture
	WHERE manufacture_id = " . $db->qstr($manufacture_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

$_SESSION['CLEAR_CACHE'] = true;

	return true;
}


}
?>