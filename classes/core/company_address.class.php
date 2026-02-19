<?php
/**
 * Type:     Cite CMS Core Class<br>
 * Name:     company_address.class.php<br>
 * Purpose:  For all company_address methods<br>
 * @author Cite CMS Module Developer
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions
 * @link http://www.citecsoftware.com
*/

require(CLASS_PATH.'/getter/company_address_getter.class.php');

class company_address extends company_address_getter {

function add_company_address($company_id,$company_address_type,$company_street_1,$company_street_2,$company_city,$company_state,$company_postal_code,$company_country){
	global $db;
	global $error;

	$q = "INSERT INTO  company_address SET
		company_id						=". $db->qstr($company_id) .",
		company_address_type			=". $db->qstr($company_address_type) .",
		company_street_1				=". $db->qstr($company_street_1) .",
		company_street_2				=". $db->qstr($company_street_2) .",
		company_city					=". $db->qstr($company_city) .",
		company_state					=". $db->qstr($company_state) .",
		company_postal_code				=". $db->qstr($company_postal_code) .",
		company_country					=". $db->qstr($company_country);


	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}


	
 	return $db->Insert_ID();
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     view_company_address<br>
* Purpose:  Loads A single company_address row<br>
*
* @author Cite CMS Module Developer
* @param $company_address_id String The company_address ID
* @access Public
* @return company_address Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function view_company_address($company_address_id){
	global $db;
	global $error;

	$q = "SELECT * FROM company_address
	WHERE company_address_id = ". $db->qstr($company_address_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     search_company_address<br>
* Purpose:  Loads All company_address rows paginated<br>
*
* @author Cite CMS Module Developer
* @param SmartyPaginate::getCurrentIndex() Smarty Paginate Object
* @param  SmartyPaginate::getLimit() Smarty Paginate Object
* @access Public
* @return $company_addressArray Array  The paginated result set  of company_addresss
* @version 1.0
* @uses $db Datbase object, $error the Error object, $smarty Smarty Object
*/
function search_company_address(){
	global $db;
	global $error;

	$q = sprintf("SELECT SQL_CALC_FOUND_ROWS * FROM company_address LIMIT %d,%d",SmartyPaginate::getCurrentIndex(), SmartyPaginate::getLimit() );

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
}

	$company_addressArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$company_addressArray[$counter] = new company_address();
		$company_addressArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	// now we get the total number of records from the table
	$q = "SELECT FOUND_ROWS()";
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	SmartyPaginate::setTotal($rs->fields['FOUND_ROWS()']);

	return $company_addressArray;

}

function load_by_company_id($company_id) {

	global $db;
	global $error;
	
	$q = "SELECT * FROM company_address WHERE company_id = " . $db->qstr( $company_id );


	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}
	
	$company_addressArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$company_addressArray[$counter] = new company_address();
		$company_addressArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	return $company_addressArray;
}

function load_by_company_id_and_type($company_id,$type) {
	global $db;
	global $error;
	
	$q = "SELECT * FROM company_address WHERE company_id = " . $db->qstr( $company_id ) ."
			AND company_address_type = " . $db->qstr($type);


	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     update_company_address<br>
* Purpose:  Updates A single company_address row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function update_company_address($company_address_id,$company_address_type,$company_id,$company_street_1,$company_street_2,$company_city,$company_state,$company_postal_code,$company_country){
	global $db;
	global $error;

	$q = "UPDATE company_address SET
		company_id						=". $db->qstr($company_id) ."	,
		company_address_type			=". $db->qstr($company_address_type) .",
		company_street_1				=". $db->qstr($company_street_1) ."	,
		company_street_2				=". $db->qstr($company_street_2) ."	,
		company_city					=". $db->qstr($company_city) ."	,
		company_state					=". $db->qstr($company_state) ."	,
		company_postal_code				=". $db->qstr($company_postal_code) ."	,
		company_country					=". $db->qstr($company_country) ."
	WHERE company_address_id = " . $db->qstr($company_address_id);


	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	return true;
}

function add_company_address_to_user($user_id,$company_address_id) {
    global $db;
    global $error;

    $q = "INSERT INTO company_address_to_user SET
            company_address_id  = " . $db->qstr($company_address_id) . ",
            user_id             = " . $db->qstr($user_id);


    if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

}


function clear_company_address_to_user($user_id) {
    global $db;
    global $error;

    $q = "DELETE FROM company_address_to_user WHERE user_id = " . $db->qstr($user_id);

    
    if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     delete_company_address<br>
* Purpose:  Deletes A single company_address row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function delete_company_address($company_address_id){
	global $db;
	global $error;

	$q = "DELETE FROM company_address
	WHERE company_address_id = " . $db->qstr($company_address_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	return true;
}


}
?>