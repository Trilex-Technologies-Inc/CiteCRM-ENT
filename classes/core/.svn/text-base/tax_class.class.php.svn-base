<?php
/**
 * Type:     Cite CMS Core Class<br>
 * Name:     tax_class.class.php<br>
 * Purpose:  For all tax_class methods<br>
 * @author Cite CMS Module Developer
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions
 * @link http://www.citecsoftware.com
*/

require(CLASS_PATH.'/getter/tax_class_getter.class.php');

class tax_class extends tax_class_getter {


function tax_class(){
	global $smarty;
	global $translate;
	$translate = new translate();
	$translate_array = $translate->translate_module("tax_class");
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
* Name:     add_tax_class<br>
* Purpose:  Adds A single tax_class row<br>
*
* @author Cite CMS Module Developer
* @access Public
* @return tax_class Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function add_tax_class(){
	global $db;
	global $error;

	$q = "INSERT INTO  tax_class SET
		tax_class_title					=". $db->qstr($_REQUEST['tax_class_title']) .",
		tax_class_description					=". $db->qstr($_REQUEST['tax_class_description']) .",
		tax_type					=". $db->qstr($_REQUEST['tax_type']) .",
		tax_class_active					=". $db->qstr($_REQUEST['tax_class_active']);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

$_SESSION['CLEAR_CACHE'] = true;

 return $db->Insert_ID();
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     view_tax_class<br>
* Purpose:  Loads A single tax_class row<br>
*
* @author Cite CMS Module Developer
* @param $tax_class_id String The tax_class ID
* @access Public
* @return tax_class Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function view_tax_class($tax_class_id){
	global $db;
	global $error;

	$q = "SELECT * FROM tax_class
	WHERE tax_class_id = ". $db->qstr($tax_class_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     search_tax_class<br>
* Purpose:  Loads All tax_class rows paginated<br>
*
* @author Cite CMS Module Developer
* @param SmartyPaginate::getCurrentIndex() Smarty Paginate Object
* @param  SmartyPaginate::getLimit() Smarty Paginate Object
* @access Public
* @return $tax_classArray Array  The paginated result set  of tax_classs
* @version 1.0
* @uses $db Datbase object, $error the Error object, $smarty Smarty Object
*/
function search_tax_class(){
	global $db;
	global $error;

	$q = sprintf("SELECT SQL_CALC_FOUND_ROWS * FROM tax_class LIMIT %d,%d",SmartyPaginate::getCurrentIndex(), SmartyPaginate::getLimit() );

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
}

	$tax_classArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$tax_classArray[$counter] = new tax_class();
		$tax_classArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	// now we get the total number of records from the table
	$q = "SELECT FOUND_ROWS()";
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	SmartyPaginate::setTotal($rs->fields['FOUND_ROWS()']);

	return $tax_classArray;

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     update_tax_class<br>
* Purpose:  Updates A single tax_class row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function update_tax_class($_REQUEST){
	global $db;
	global $error;

	$q = "UPDATE tax_class SET
		tax_class_title					=". $db->qstr($_REQUEST['tax_class_title']) ."	,
		tax_class_description					=". $db->qstr($_REQUEST['tax_class_description']) ."	,
		tax_type					=". $db->qstr($_REQUEST['tax_type']) ."	,
		tax_class_active					=". $db->qstr($_REQUEST['tax_class_active']) ."
	WHERE tax_class_id = " . $db->qstr($_REQUEST['tax_class_id']);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

$_SESSION['CLEAR_CACHE'] = true;

	return true;
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     delete_tax_class<br>
* Purpose:  Deletes A single tax_class row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function delete_tax_class($tax_class_id){
	global $db;
	global $error;

	$q = "DELETE FROM tax_class
	WHERE tax_class_id = " . $db->qstr($tax_class_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

$_SESSION['CLEAR_CACHE'] = true;

	return true;
}


}
?>