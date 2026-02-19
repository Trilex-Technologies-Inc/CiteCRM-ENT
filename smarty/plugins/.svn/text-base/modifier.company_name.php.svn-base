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
 * Name:     system_model_name<br>
 * Purpose:  convert operating_system_manufacture_id to String
 * @link 
 * @author   jaimie@citesoftware.com
 * @param string
 * @return string
 */
function smarty_modifier_company_name($string) {

	require_once(CLASS_PATH."/core/company.class.php");

	$companyObj = new company();

	$companyObj->view_company($string);

	$string = $companyObj->get_company_name();

	return $string;

}
?>