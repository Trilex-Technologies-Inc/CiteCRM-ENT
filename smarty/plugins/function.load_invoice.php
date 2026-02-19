<?php
/**
 * Smarty plugin
 * @package CiteCMS
 * @subpackage plugins
 */


/**
 * Smarty {html_select_state} function plugin
 *
 * Type:     function<br>
 * Name:     html_select_state<br>
 * Purpose:  Prints the dropdowns for state selection
 * @link http://www.citesoftware.com
 * @author Jaimie Garner jaimie@citesoftware.com
 * @param array
 * @param Smarty
 * @return string
 */
function smarty_function_load_invoice($params, &$smarty) {

    require_once(CLASS_PATH."/core/invoice.class.php");

    $invoiceObj = new Invoice();

    $invoiceObj->load_invoice_by_workorder_id($params['workorder_id']);


    $smarty->assign('invoiceObj',$invoiceObj);

}
?>