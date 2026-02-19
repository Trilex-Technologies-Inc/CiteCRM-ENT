<?php
$core->verifyAdmin();

require_once(CLASS_PATH."/core/invoice.class.php");
require(SMARTY_PATH.'/SmartyPaginate.class.php');

$invoiceObj = new invoice();

$account_type = "company_id";

$account_type_id = $_POST['company_id'];

$invoiceArray = $invoiceObj->load_invoice_items($account_type,$account_type_id);
    
$smarty->assign('invoiceArray',$invoiceArray);

$smarty->assign('company_id',$account_type_id);

$smarty->display('invoice/ajax_load_statements.tpl');


//$smarty->display('invoice/ajax_load_by_company.tpl');


?>