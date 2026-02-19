<?php
/**
 * Smarty plugin
 * @package CiteCMS
 * @subpackage plugins
 */


/**
 * Smarty {html_select_employee} function plugin
 *
 * Type:     function<br>
 * Name:     html_select_employee<br>
 * Purpose:  Prints the dropdowns for Employee selection
 * @link http://www.citesoftware.com
 * @author Jaimie Garner jaimie@citesoftware.com
 * @param array
 * @param Smarty
 * @return string
 */
function smarty_function_fetch_system_owner($params, &$smarty) {

    require_once(CLASS_PATH."/core/user.class.php");
    require_once(CLASS_PATH.'/core/company.class.php');

    $userObj    = new User();
    $companyObj = new Company();

    $companyObj->system_to_company($params['system_id']);

    if($companyObj->get_company_id() > 0) {
        $smarty->assign($params['assign'],$companyObj);
        $smarty->assign('companyObj', 'true');
        $smarty->assign('userObj', 'false');
    } else {
        $userObj->system_to_user($params['system_id']);
        $smarty->assign($params['assign'],$userObj);
         $smarty->assign('companyObj', 'false');
        $smarty->assign('userObj', 'true');
    }




}


?>