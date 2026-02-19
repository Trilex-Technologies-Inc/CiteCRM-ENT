<?php
/**
 * Type:     Cite CMS Core Class<br>
 * Name:     user_type.class.php<br>
 * Purpose:  For all user_type methods<br>
 * @author Cite CMS Module Developer
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions
 * @link http://www.citecsoftware.com
*/

require(CLASS_PATH.'/getter/user_type_getter.class.php');

class user_type extends user_type_getter {

function add_user_type($user_type_text){
	global $db;
	global $error;

	$q = "INSERT INTO  user_type SET
		user_type_text	=". $db->qstr($user_type_text);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

 	return $db->Insert_ID();
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     view_user_type<br>
* Purpose:  Loads A single user_type row<br>
*
* @author Cite CMS Module Developer
* @param $user_type_id String The user_type ID
* @access Public
* @return user_type Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function view_user_type($user_type_id){
	global $db;
	global $error;

	$q = "SELECT * FROM user_type
	WHERE user_type_id = ". $db->qstr($user_type_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     search_user_type<br>
* Purpose:  Loads All user_type rows paginated<br>
*
* @author Cite CMS Module Developer
* @param SmartyPaginate::getCurrentIndex() Smarty Paginate Object
* @param  SmartyPaginate::getLimit() Smarty Paginate Object
* @access Public
* @return $user_typeArray Array  The paginated result set  of user_types
* @version 1.0
* @uses $db Datbase object, $error the Error object, $smarty Smarty Object
*/
function search_user_type(){
	global $db;
	global $error;

	$q = "SELECT * FROM user_type";

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$user_typeArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$user_typeArray[$counter] = new user_type();
		$user_typeArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}


	return $user_typeArray;

}

function load_all() {
	global $db;
	global $error;

	$q = "SELECT * FROM user_type";

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$user_typeArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$user_typeArray[$counter] = new user_type();
		$user_typeArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	return $user_typeArray;
}

/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     update_user_type<br>
* Purpose:  Updates A single user_type row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function update_user_type($user_type_id,$user_type_text){
	global $db;
	global $error;

	$q = "UPDATE user_type SET
		user_type_text	=". $db->qstr($user_type_text) ."
	WHERE user_type_id 	= " . $db->qstr($user_type_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	return true;
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     delete_user_type<br>
* Purpose:  Deletes A single user_type row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function delete_user_type($user_type_id){
	global $db;
	global $error;

	$q = "DELETE FROM user_type
	WHERE user_type_id = " . $db->qstr($user_type_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	return true;
}


}
?>