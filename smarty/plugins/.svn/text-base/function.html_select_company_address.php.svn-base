<?php
/**
 * Smarty plugin
 * @package CiteCMS
 * @subpackage plugins
 */


/**
 * Smarty {html_select_company_users} function plugin
 *
 * Type:     function<br>
 * Name:     html_select_company_users<br>
 * Purpose:  Prints the dropdowns for Company Users selection
 * @link http://www.citesoftware.com
 * @author Jaimie Garner jaimie@citesoftware.com
 * @param array
 * @param Smarty
 * @return string
 */
function smarty_function_html_select_company_address($params, &$smarty) {

    require_once(CLASS_PATH."/core/company_address.class.php");

    $company_addressObj = new company_address();

    $address_array = $company_addressObj->load_by_company_id($params['company_id']);

    $html ="<select name=\"".$params['fieldName']."\" id=\"".$params['fieldName']."\">\n";

    foreach($address_array as $address) {
        $html .="<option value=\"".$address->get_company_address_id()."\"";

        if($params['value'] == $address->get_company_address_id()) {
            $html .= " selected ";
        }

        $html .=">".$address->get_company_address_name()."</option>\n";

    }
    


    $html .= "</select>\n";

	return $html;
	

}