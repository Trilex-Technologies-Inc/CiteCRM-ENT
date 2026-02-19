<?php
/**
 * Type:     Cite CMS Core Class<br>
 * Name:     crm_group.class.php<br>
 * Purpose:  For all crm_group methods<br>
 * @author Cite CMS Module Developer
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions
 * @link http://www.citecsoftware.com
*/

require(CLASS_PATH.'/getter/crm_group_getter.class.php');

class crm_group extends crm_group_getter {


function crm_group(){
	global $smarty;
	global $translate;
	$translate = new translate();
	$translate_array = $translate->translate_module("crm_group");
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
* Name:     add_crm_group<br>
* Purpose:  Adds A single crm_group row<br>
*
* @author Cite CMS Module Developer
* @access Public
* @return crm_group Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function add_crm_group(){
	global $db;
	global $error;

	$q = "INSERT INTO  crm_group SET
		crm_group_text					=". $db->qstr($_REQUEST['crm_group_text']) .",
		crm_group_bit					=". $db->qstr($_REQUEST['crm_group_bit']) .",
		crm_group_active					=". $db->qstr($_REQUEST['crm_group_active']);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

$_SESSION['CLEAR_CACHE'] = true;

 return $db->Insert_ID();
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     view_crm_group<br>
* Purpose:  Loads A single crm_group row<br>
*
* @author Cite CMS Module Developer
* @param $crm_group_id String The crm_group ID
* @access Public
* @return crm_group Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function view_crm_group($crm_group_id){
	global $db;
	global $error;

	$q = "SELECT * FROM crm_group
	WHERE crm_group_id = ". $db->qstr($crm_group_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     search_crm_group<br>
* Purpose:  Loads All crm_group rows paginated<br>
*
* @author Cite CMS Module Developer
* @param SmartyPaginate::getCurrentIndex() Smarty Paginate Object
* @param  SmartyPaginate::getLimit() Smarty Paginate Object
* @access Public
* @return $crm_groupArray Array  The paginated result set  of crm_groups
* @version 1.0
* @uses $db Datbase object, $error the Error object, $smarty Smarty Object
*/
function search_crm_group(){
	global $db;
	global $error;

	$q = sprintf("SELECT SQL_CALC_FOUND_ROWS * FROM crm_group LIMIT %d,%d",SmartyPaginate::getCurrentIndex(), SmartyPaginate::getLimit() );

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
}

	$crm_groupArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$crm_groupArray[$counter] = new crm_group();
		$crm_groupArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	// now we get the total number of records from the table
	$q = "SELECT FOUND_ROWS()";
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	SmartyPaginate::setTotal($rs->fields['FOUND_ROWS()']);

	return $crm_groupArray;

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     update_crm_group<br>
* Purpose:  Updates A single crm_group row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function update_crm_group($_REQUEST){
	global $db;
	global $error;

	$q = "UPDATE crm_group SET
		crm_group_text					=". $db->qstr($_REQUEST['crm_group_text']) ."	,
		crm_group_bit					=". $db->qstr($_REQUEST['crm_group_bit']) ."	,
		crm_group_active					=". $db->qstr($_REQUEST['crm_group_active']) ."
	WHERE crm_group_id = " . $db->qstr($_REQUEST['crm_group_id']);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

$_SESSION['CLEAR_CACHE'] = true;

	return true;
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     delete_crm_group<br>
* Purpose:  Deletes A single crm_group row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function delete_crm_group($crm_group_id){
	global $db;
	global $error;

	$q = "DELETE FROM crm_group
	WHERE crm_group_id = " . $db->qstr($crm_group_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

$_SESSION['CLEAR_CACHE'] = true;

	return true;
}


}
?>