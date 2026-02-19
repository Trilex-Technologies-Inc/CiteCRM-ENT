<?php
/**
 * Smarty plugin
 * @package CiteCMS
 * @subpackage plugins
 */


/**
 * Smarty   workorder_status modifier plugin
 *
 * Type:     modifier<br>
 * Name:     workorder_status<br>
 * Purpose:  convert Workorer Status ID to String
 * @link 
 * @author   jaimie@citesoftware.com
 * @param string
 * @return string
 */
function smarty_modifier_category_name($string) {

	global $db;
	global $error;
	
	$q = "SELECT category_name FROM category WHERE category_id = " . $db->qstr($string);
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}
	
	$string = $rs->fields['category_name'];
	
	return $string;

}