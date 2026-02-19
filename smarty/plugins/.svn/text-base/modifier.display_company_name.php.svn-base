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
 * Name:     display_names<br>
 * Purpose:  convert A user ID to First Name Last Name
 * @link 
 * @author   jaimie@citesoftware.com
 * @param string
 * @return string
 */
function smarty_modifier_display_company_name($string) {


		require_once(CLASS_PATH."/core/company.class.php");
		
		$company = new Company();
		
		$company->view_company($string);
		
		$string = $company->get_company_name();
		
	
		
	return($string);

}