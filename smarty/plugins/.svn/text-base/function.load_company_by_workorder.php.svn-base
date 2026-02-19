<?php
/**
 * Smarty plugin
 * @package CiteCMS
 * @subpackage plugins
 */
function smarty_function_load_company_by_workorder($params, &$smarty) {

    require_once(CLASS_PATH."/core/workorder.class.php");

    $workorderObj = new workorder();

    $workorderObj->load_company_by_workorder($params['workorder_id']);

    $smarty->assign('workorderObj',$workorderObj);

}
?>