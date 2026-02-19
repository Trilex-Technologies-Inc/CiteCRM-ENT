<?php
/**
 * Type:     Cite CMS Core Class<br>
 * Name:     module_method.class.php<br>
 * Purpose:  For all module_method methods<br>
 * @author Cite CMS Module Developer
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions
 * @link http://www.citecsoftware.com
*/

require(CLASS_PATH.'/getter/module_method_getter.class.php');

class module_method extends module_method_getter {

	function module_method() {
		global $smarty;
		global $translate;
		
		$translate = new translate();

		$translate_array = $translate->translate_module("module_method");


		if(!empty($translate_array)) {
		
			foreach($translate_array as $translate){
				
				$tans = "translate_".strtolower($translate['name']);
				
				$val = $translate['content'];
				
				$smarty->assign($tans,$val);
			}
		}
	
	}

function add_module_method(){
	global $db;
	global $error;

	$q = "INSERT INTO  module_method SET
		module_id					=". $db->qstr($_REQUEST['module_id']) .",
		module_method_name					=". $db->qstr($_REQUEST['module_method_name']) .",
		module_method_translate					=". $db->qstr($_REQUEST['module_method_translate']) .",
		module_method_admin_menu					=". $db->qstr($_REQUEST['module_method_admin_menu']) .",
		module_method_user_menu					=". $db->qstr($_REQUEST['module_method_user_menu']) .",
		module_method_public_menu					=". $db->qstr($_REQUEST['module_method_public_menu']);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

 return $db->Insert_ID();
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     view_module_method<br>
* Purpose:  Loads A single module_method row<br>
*
* @author Cite CMS Module Developer
* @param $module_method_id String The module_method ID
* @access Public
* @return module_method Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function view_module_method($module_method_id){
	global $db;
	global $error;

	$q = "SELECT * FROM module_method
	WHERE module_method_id = ". $db->qstr($module_method_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     load_methods_for_module<br>
* Purpose:  Loads all module_methods for a Module<br>
*
* @author Cite CMS Module Developer
* @param $module_id String The module_ ID
* @access Public
* @return $module_method_array Array of module_method Objects
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function load_methods_for_module($module_id){
	global $db;
	global $error;
	
	$q = "SELECT * FROM module_method WHERE module_id = " . $db->qstr( $module_id );
	
	
	
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}


	$module_method_array = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$module_method_array[$counter] = new module_method();
		$module_method_array[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	return $module_method_array;
	
}

function load_methods_for_menu($module_id) {
	global $db;
	global $error;
	
	$q = "SELECT module_method_name,module_method_translate FROM module_method 
			WHERE module_id = " . $db->qstr( $module_id ) . "
			AND module_method_admin_menu='1'";
	
	
	
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}


	$module_method_array = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$module_method_array[$counter] = new module_method();
		$module_method_array[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	return $module_method_array;

}

/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     search_module_method<br>
* Purpose:  Loads All module_method rows paginated<br>
*
* @author Cite CMS Module Developer
* @param SmartyPaginate::getCurrentIndex() Smarty Paginate Object
* @param  SmartyPaginate::getLimit() Smarty Paginate Object
* @access Public
* @return $module_methodArray Array  The paginated result set  of module_methods
* @version 1.0
* @uses $db Datbase object, $error the Error object, $smarty Smarty Object
*/
function search_module_method(){
	global $db;
	global $error;

	$q = sprintf("SELECT SQL_CALC_FOUND_ROWS * FROM module_method LIMIT %d,%d",SmartyPaginate::getCurrentIndex(), SmartyPaginate::getLimit() );

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$module_methodArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$module_methodArray[$counter] = new module_method();
		$module_methodArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	// now we get the total number of records from the table
	$q = "SELECT FOUND_ROWS()";
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	SmartyPaginate::setTotal($rs->fields['FOUND_ROWS()']);

	return $module_methodArray;

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     update_module_method<br>
* Purpose:  Updates A single module_method row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function update_module_method($_REQUEST){
	global $db;
	global $error;

	// Update module_method
	$q = "UPDATE module_method SET
			module_method_admin_menu			=" . $db->qstr($_REQUEST['module_method_admin_menu']) ."	,
			module_method_user_menu			=" . $db->qstr($_REQUEST['module_method_user_menu']) ."	,
			module_method_public_menu			=" . $db->qstr($_REQUEST['module_method_public_menu']) ."
		WHERE module_method_id 					=" . $db->qstr($_REQUEST['module_method_id']);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}


	// Update page_setup
	$q = "UPDATE page_setup SET
				page_setup_page_title			=" . $db->qstr($_REQUEST['page_setup_page_title']) ." ,
				page_setup_description			=" . $db->qstr($_REQUEST['page_setup_description']) ." ,
				page_setup_keywords				=" . $db->qstr($_REQUEST['page_setup_keywords']) ." , 
				page_setup_active					=" . $db->qstr($_REQUEST['page_setup_active']) ." ,
				page_views							=" . $db->qstr($_REQUEST['page_setup_active']) ."
			WHERE  page_setup_id					=" . $db->qstr($_REQUEST['page_setup_id']);
			
	print $q;
			
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}		
	
	return true;
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     delete_module_method<br>
* Purpose:  Deletes A single module_method row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function delete_module_method($module_method_id){
	global $db;
	global $error;

	$q = "DELETE FROM module_method
	WHERE module_method_id = " . $db->qstr($module_method_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	return true;
}


}
?>