<?php
/**
 * Type:     Cite CMS Core Class<br>
 * Name:     user_to_company.class.php<br>
 * Purpose:  For all user_to_company methods<br>
 * @author Cite CMS Module Developer
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions
 * @link http://www.citecsoftware.com
*/

require(CLASS_PATH.'/getter/user_to_company_getter.class.php');

class user_to_company extends user_to_company_getter {

function add_user_to_company($userID,$companyID){
	global $db;
	global $error;

	$q = "INSERT INTO  user_to_company SET
			user_id						=". $db->qstr($userID) .",
			company_id					=". $db->qstr($companyID);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

 return $db->Insert_ID();
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     view_user_to_company<br>
* Purpose:  Loads A single user_to_company row<br>
*
* @author Cite CMS Module Developer
* @param $user_to_company_id String The user_to_company ID
* @access Public
* @return user_to_company Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function view_user_to_company($user_to_company_id){
	global $db;
	global $error;

	$q = "SELECT * FROM user_to_company
	WHERE user_to_company_id = ". $db->qstr($user_to_company_id);


	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];

}

function load_primary($company_id){
	global $db;
	global $error;

	$q = "SELECT * FROM user_to_company
	WHERE company_id = ". $db->qstr($company_id) . "
	AND user_to_company_primary='1'";

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     search_user_to_company<br>
* Purpose:  Loads All user_to_company rows paginated<br>
*
* @author Cite CMS Module Developer
* @param SmartyPaginate::getCurrentIndex() Smarty Paginate Object
* @param  SmartyPaginate::getLimit() Smarty Paginate Object
* @access Public
* @return $user_to_companyArray Array  The paginated result set  of user_to_companys
* @version 1.0
* @uses $db Datbase object, $error the Error object, $smarty Smarty Object
*/
function search_user_to_company($start=0,$limit=50,&$total){
	global $db;
	global $error;

	$q = "SELECT SQL_CALC_FOUND_ROWS * FROM user_to_company LIMIT $start, $limit";

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
}

	$user_to_companyArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$user_to_companyArray[$counter] = new user_to_company();
		$user_to_companyArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	// now we get the total number of records from the table
	$q = "SELECT FOUND_ROWS()";
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$total = $rs->fields['FOUND_ROWS()'];

	return $user_to_companyArray;

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     update_user_to_company<br>
* Purpose:  Updates A single user_to_company row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function update_user_to_company($_REQUEST){
	global $db;
	global $error;

	$q = "UPDATE user_to_company SET
		user_id					=". $db->qstr($_REQUEST['user_id']) ."	,
		company_id					=". $db->qstr($_REQUEST['company_id']) ."
	WHERE user_to_company_id = " . $db->qstr($_REQUEST['user_to_company_id']);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	return true;
}


function validate_user_to_company($user_id,$company_id) {
   global $db;
	global $error;

    $q = "SELECT COUNT(*) AS count FROM user_to_company
            WHERE user_id   = " . $db->qstr($user_id) . "
            AND company_id  = " . $db->qstr($company_id);

    if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

    if($rs->fields[count] > 0){
        return false;
    } else {
        return true;
    }

}

function load_company_by_user($user_id) {
	global $db;
	global $error;
	
	$q = "SELECT * FROM user_to_company WHERE user_id = " . $db->qstr($user_id);
	
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];
	
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     delete_user_to_company<br>
* Purpose:  Deletes A single user_to_company row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function delete_user_to_company($userID,$companyID){
	global $db;
	global $error;

	$q = "DELETE FROM user_to_company
			WHERE user_id = " . $db->qstr($userID) ."
			AND company_id = " . $db->qstr($companyID);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	return true;
}


}
?>