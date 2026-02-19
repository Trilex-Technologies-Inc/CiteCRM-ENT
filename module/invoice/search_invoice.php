<?php
/**
* Type:     Cite CMS PHP Page<br>
* Name:     search_invoice.php<br>
* Purpose:  Search Invoice<br>
* 
* @author Cite CMS Module Developer
* @access Public
* @version 1.0
*/
$core->verifyAdmin();
require(CLASS_PATH.'/core/invoice.class.php');

$invoiceObj = new invoice();

$smarty->display('invoice/search_invoice.tpl');
?>