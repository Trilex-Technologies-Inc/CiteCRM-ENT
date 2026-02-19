<?php
/**
 * Type:     Cite CMS Core Class<br>
 * Name:     country.class.php<br>
 * Purpose:  For all country methods<br>
 * @author Cite CMS Module Developer
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions
 * @link http://www.citecsoftware.com
*/

require(CLASS_PATH.'/getter/country_getter.class.php');

class country extends country_getter {

function add_country(){
	global $db;
	global $error;

	$q = "INSERT INTO  country SET
		country_code					=". $db->qstr($_REQUEST['country_code']) .",
		country_text					=". $db->qstr($_REQUEST['country_text']);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

 return $db->Insert_ID();
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     view_country<br>
* Purpose:  Loads A single country row<br>
*
* @author Cite CMS Module Developer
* @param $country_id String The country ID
* @access Public
* @return country Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function view_country($country_id){
	global $db;
	global $error;

	$q = "SELECT * FROM country
	WHERE country_id = ". $db->qstr($country_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     search_country<br>
* Purpose:  Loads All country rows paginated<br>
*
* @author Cite CMS Module Developer
* @param SmartyPaginate::getCurrentIndex() Smarty Paginate Object
* @param  SmartyPaginate::getLimit() Smarty Paginate Object
* @access Public
* @return $countryArray Array  The paginated result set  of countrys
* @version 1.0
* @uses $db Datbase object, $error the Error object, $smarty Smarty Object
*/
function search_country(){
	global $db;
	global $error;

	$q = sprintf("SELECT SQL_CALC_FOUND_ROWS * FROM country LIMIT %d,%d",SmartyPaginate::getCurrentIndex(), SmartyPaginate::getLimit() );

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
}

	$countryArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$countryArray[$counter] = new country();
		$countryArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	// now we get the total number of records from the table
	$q = "SELECT FOUND_ROWS()";
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	SmartyPaginate::setTotal($rs->fields['FOUND_ROWS()']);

	return $countryArray;

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     loadAll<br>
* Purpose:  Loads All country rows<br>
*
* @author Cite CMS Module Developer
* @param SmartyPaginate::getCurrentIndex() Smarty Paginate Object
* @param  SmartyPaginate::getLimit() Smarty Paginate Object
* @access Public
* @return $countryArray Array  The paginated result set  of countrys
* @version 1.0
* @uses $db Datbase object, $error the Error object, $smarty Smarty Object
*/
function loadAll() {
	global $db;
	global $error;

	$q = "SELECT * FROM country WHERE  country_active='1'";

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$countryArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$countryArray[$counter] = new country();
		$countryArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}
	
	return $countryArray;
}

/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     update_country<br>
* Purpose:  Updates A single country row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function update_country($_REQUEST){
	global $db;
	global $error;

	$q = "UPDATE country SET
		country_code					=". $db->qstr($_REQUEST['country_code']) ."	,
		country_text					=". $db->qstr($_REQUEST['country_text']) ." ,
		country_active					=". $db->qstr($_REQUEST['country_active']) ."
	WHERE country_id = " . $db->qstr($_REQUEST['country_id']);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	return true;
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     delete_country<br>
* Purpose:  Deletes A single country row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function delete_country($country_id){
	global $db;
	global $error;

	$q = "DELETE FROM country
	WHERE country_id = " . $db->qstr($country_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	return true;
}


}
?>