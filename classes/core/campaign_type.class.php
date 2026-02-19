<?php
/**
 * Type:     Cite CMS Core Class<br>
 * Name:     campaign_type.class.php<br>
 * Purpose:  For all campaign_type methods<br>
 * @author Cite CMS Module Developer
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions
 * @link http://www.citecsoftware.com
*/

require(CLASS_PATH.'/getter/campaign_type_getter.class.php');

class campaign_type extends campaign_type_getter {


function campaign_type(){
	global $smarty;
	global $translate;
	$translate = new translate();
	$translate_array = $translate->translate_module("campaign_type");
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
* Name:     add_campaign_type<br>
* Purpose:  Adds A single campaign_type row<br>
*
* @author Cite CMS Module Developer
* @access Public
* @return campaign_type Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function add_campaign_type($campaign_type_text,$campaign_type_active){
	global $db;
	global $error;

	$q = "INSERT INTO  campaign_type SET
		campaign_type_text					=". $db->qstr($campaign_type_text) .",
		campaign_type_active				=". $db->qstr($campaign_type_active);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}


 return $db->Insert_ID();
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     view_campaign_type<br>
* Purpose:  Loads A single campaign_type row<br>
*
* @author Cite CMS Module Developer
* @param $campaign_type_id String The campaign_type ID
* @access Public
* @return campaign_type Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function view_campaign_type($campaign_type_id){
	global $db;
	global $error;

	$q = "SELECT * FROM campaign_type
	WHERE campaign_type_id = ". $db->qstr($campaign_type_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     search_campaign_type<br>
* Purpose:  Loads All campaign_type rows paginated<br>
*
* @author Cite CMS Module Developer
* @param SmartyPaginate::getCurrentIndex() Smarty Paginate Object
* @param  SmartyPaginate::getLimit() Smarty Paginate Object
* @access Public
* @return $campaign_typeArray Array  The paginated result set  of campaign_types
* @version 1.0
* @uses $db Datbase object, $error the Error object, $smarty Smarty Object
*/
function search_campaign_type(){
	global $db;
	global $error;

	$q = "SELECT * FROM campaign_type";

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$campaign_typeArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$campaign_typeArray[$counter] = new campaign_type();
		$campaign_typeArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}	

	return $campaign_typeArray;

}


function load_all() {
	global $db;
	global $error;

	$q = "SELECT * FROM campaign_type WHERE campaign_type_active='1'";

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$campaign_typeArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$campaign_typeArray[$counter] = new campaign_type();
		$campaign_typeArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	return $campaign_typeArray;

}

/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     update_campaign_type<br>
* Purpose:  Updates A single campaign_type row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function update_campaign_type($campaign_type_text,$campaign_type_active,$campaign_type_id){
	global $db;
	global $error;

	$q = "UPDATE campaign_type SET
			campaign_type_text		= " . $db->qstr($campaign_type_text) ."	,
			campaign_type_active	= " . $db->qstr($campaign_type_active) ."
		WHERE campaign_type_id 		= " . $db->qstr($campaign_type_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

$_SESSION['CLEAR_CACHE'] = true;

	return true;
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     delete_campaign_type<br>
* Purpose:  Deletes A single campaign_type row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function delete_campaign_type($campaign_type_id){
	global $db;
	global $error;

	$q = "DELETE FROM campaign_type
	WHERE campaign_type_id = " . $db->qstr($campaign_type_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

$_SESSION['CLEAR_CACHE'] = true;

	return true;
}


}
?>