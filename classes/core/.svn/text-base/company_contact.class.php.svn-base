<?php
/**
 * Type:     Cite CMS Core Class<br>
 * Name:     company_contact.class.php<br>
 * Purpose:  For all company_contact methods<br>
 * @author Cite CMS Module Developer
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions
 * @link http://www.citecsoftware.com
*/

require(CLASS_PATH.'/getter/company_contact_getter.class.php');

class company_contact extends company_contact_getter {

function add_company_contact($company_id,$company_contact_type,$company_contact_value){
	global $db;
	global $error;

	$q = "INSERT INTO  company_contact SET
		company_id								=". $db->qstr($company_id) .",
		company_contact_type					=". $db->qstr($company_contact_type) .",
		company_contact_value					=". $db->qstr($company_contact_value);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

 	return $db->Insert_ID();
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     view_company_contact<br>
* Purpose:  Loads A single company_contact row<br>
*
* @author Cite CMS Module Developer
* @param $company_contact_id String The company_contact ID
* @access Public
* @return company_contact Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function view_company_contact($company_contact_id){
	global $db;
	global $error;

	$q = "SELECT * FROM company_contact
	WHERE company_contact_id = ". $db->qstr($company_contact_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     search_company_contact<br>
* Purpose:  Loads All company_contact rows paginated<br>
*
* @author Cite CMS Module Developer
* @param SmartyPaginate::getCurrentIndex() Smarty Paginate Object
* @param  SmartyPaginate::getLimit() Smarty Paginate Object
* @access Public
* @return $company_contactArray Array  The paginated result set  of company_contacts
* @version 1.0
* @uses $db Datbase object, $error the Error object, $smarty Smarty Object
*/
function search_company_contact(){
	global $db;
	global $error;

	$q = sprintf("SELECT SQL_CALC_FOUND_ROWS * FROM company_contact LIMIT %d,%d",SmartyPaginate::getCurrentIndex(), SmartyPaginate::getLimit() );

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
}

	$company_contactArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$company_contactArray[$counter] = new company_contact();
		$company_contactArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	// now we get the total number of records from the table
	$q = "SELECT FOUND_ROWS()";
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	SmartyPaginate::setTotal($rs->fields['FOUND_ROWS()']);

	return $company_contactArray;

}


    function load_by_company_and_type($company_id,$type) {
        global $db;
        global $error;

        $q = "SELECT * FROM company_contact 
                WHERE company_id= ". $db->qstr($company_id) . " 
                AND company_contact_type = ". $db->qstr($type);	

        if(!$rs = $db->Execute($q)) {
		  $error->dbError($db->ErrorMsg(), $q);
	    }

        $tempArray = $rs->GetArray();

	    $this->fields = $tempArray[0];

    }

function load_by_company_id($company_id) {
	global $db;
	global $error;

	$q = "SELECT * FROM company_contact WHERE company_id= ". $db->qstr($company_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$company_contactArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$company_contactArray[$counter] = new company_contact();
		$company_contactArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	return $company_contactArray;	
}

/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     update_company_contact<br>
* Purpose:  Updates A single company_contact row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function update_company_contact($company_id,$company_contact_type,$company_contact_value){
	global $db;
	global $error;

	$q = "UPDATE company_contact SET
			company_contact_value		=". $db->qstr($company_contact_value) ."
			WHERE company_contact_type	=". $db->qstr($company_contact_type) . "
			AND company_id				=". $db->qstr($company_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	return true;
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     delete_company_contact<br>
* Purpose:  Deletes A single company_contact row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function delete_company_contact($company_contact_id){
	global $db;
	global $error;

	$q = "DELETE FROM company_contact
	WHERE company_contact_id = " . $db->qstr($company_contact_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	return true;
}

function clear_all($company_id) {
	global $db;
	global $error;

	$q = "DELETE FROM company_contact
	WHERE company_id = " . $db->qstr($company_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	return true;
}

function number_search($number) {
    global $db;
	global $error;

    $q = "SELECT * FROM company_contact WHERE company_contact_type = 'Business Phone' AND company_contact_value = " . $db->qstr($number);

    if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

    $tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];
}

}
?>