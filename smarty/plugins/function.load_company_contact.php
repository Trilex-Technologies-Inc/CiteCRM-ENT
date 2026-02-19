<?php

/**
 * Smarty plugin
 * @package CiteCMS
 * @subpackage plugins
 */
function smarty_function_load_company_contact($params, &$smarty) {

    if(!isset($params['company_id'])) {
        $smarty->_trigger_fatal_error("[plugin] Missing param company_id");
    }

    if(!isset($params['contact_type'])) {
        $smarty->_trigger_fatal_error("[plugin] Missing param contact_type");
    }

    require_once(CLASS_PATH."/core/company_contact.class.php");

    $company_contactObj = new company_contact();

    $company_contactObj->load_by_company_and_type($params['company_id'],$params['contact_type']);

   
    return $company_contactObj->get_company_contact_value();
    
    

}
?>