<?php
/**
 * Type:     Cite CMS Core Class<br>
 * Name:     tax_type.class.php<br>
 * Purpose:  For all tax_type methods<br>
 * @author Cite CMS Module Developer
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions
 * @link http://www.citecsoftware.com
*/

require(CLASS_PATH.'/getter/tax_type_getter.class.php');

class tax_type extends tax_type_getter {


function tax_type(){
	global $smarty;
	global $translate;
	$translate = new translate();
	$translate_array = $translate->translate_module("tax_type");
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
* Name:     add_tax_type<br>
* Purpose:  Adds A single tax_type row<br>
*
* @author Cite CMS Module Developer
* @access Public
* @return tax_type Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function add_tax_type(){
	global $db;
	global $error;

	$q = "INSERT INTO  tax_type SET
		tax_type_text					=". $db->qstr($_REQUEST['tax_type_text']) .",
		tax_type_active					=". $db->qstr($_REQUEST['tax_type_active']);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

$_SESSION['CLEAR_CACHE'] = true;

 return $db->Insert_ID();
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     view_tax_type<br>
* Purpose:  Loads A single tax_type row<br>
*
* @author Cite CMS Module Developer
* @param $tax_type_id String The tax_type ID
* @access Public
* @return tax_type Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function view_tax_type($tax_type_id){
	global $db;
	global $error;

	$q = "SELECT * FROM tax_type
	WHERE tax_type_id = ". $db->qstr($tax_type_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     search_tax_type<br>
* Purpose:  Loads All tax_type rows paginated<br>
*
* @author Cite CMS Module Developer
* @param SmartyPaginate::getCurrentIndex() Smarty Paginate Object
* @param  SmartyPaginate::getLimit() Smarty Paginate Object
* @access Public
* @return $tax_typeArray Array  The paginated result set  of tax_types
* @version 1.0
* @uses $db Datbase object, $error the Error object, $smarty Smarty Object
*/
function search_tax_type(){
	global $db;
	global $error;

	$q = sprintf("SELECT SQL_CALC_FOUND_ROWS * FROM tax_type LIMIT %d,%d",SmartyPaginate::getCurrentIndex(), SmartyPaginate::getLimit() );

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
}

	$tax_typeArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$tax_typeArray[$counter] = new tax_type();
		$tax_typeArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	// now we get the total number of records from the table
	$q = "SELECT FOUND_ROWS()";
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	SmartyPaginate::setTotal($rs->fields['FOUND_ROWS()']);

	return $tax_typeArray;

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     update_tax_type<br>
* Purpose:  Updates A single tax_type row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function update_tax_type($_REQUEST){
	global $db;
	global $error;

	$q = "UPDATE tax_type SET
		tax_type_text					=". $db->qstr($_REQUEST['tax_type_text']) ."	,
		tax_type_active					=". $db->qstr($_REQUEST['tax_type_active']) ."
	WHERE tax_type_id = " . $db->qstr($_REQUEST['tax_type_id']);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

$_SESSION['CLEAR_CACHE'] = true;

	return true;
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     delete_tax_type<br>
* Purpose:  Deletes A single tax_type row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function delete_tax_type($tax_type_id){
	global $db;
	global $error;

	$q = "DELETE FROM tax_type
	WHERE tax_type_id = " . $db->qstr($tax_type_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

$_SESSION['CLEAR_CACHE'] = true;

	return true;
}


}
?>