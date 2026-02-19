<?php

/**
 * Smarty plugin
 * @package CiteCMS
 * @subpackage plugins
 */
function smarty_function_load_company_name_by_invoice($params, &$smarty) {

    require_once(CLASS_PATH."/core/company.class.php");
    $companyObj = new company();

    $companyObj->load_name_by_invoice($params['invoice_id']);

    return "<a href=\"".ROOT_URL."/index.php?page=company:view_company&company_id=".$companyObj->get_company_id()."\">".$companyObj->get_company_name()."</a>";
   

}
?>