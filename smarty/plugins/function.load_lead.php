<?php

/**
 * Smarty plugin
 * @package CiteCMS
 * @subpackage plugins
 */
function smarty_function_load_lead($params, &$smarty) {

    
    require_once(CLASS_PATH."/core/lead.class.php");

    $leadObj = new lead();

    $leadObj->load_by_id($params['lead_id']);

    $smarty->assign('leadObj',$leadObj);

    
    print_r($leadObj);
    

}
?>