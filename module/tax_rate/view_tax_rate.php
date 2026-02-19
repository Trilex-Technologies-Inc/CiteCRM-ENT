<?php
/**
* Type:     Cite CMS PHP Page<br>
* Name:     view_tax_rate.php<br>
* Purpose:  View a Single Tax Rates row<br>
* 
* @author Cite CMS Module Developer
* @access Public
* @version 1.0
*/
$core->verifyAdmin(SUPER_USER);

require(CLASS_PATH.'/core/tax_rate.class.php');

$tax_rate = new tax_rate();

$tax_rate->view_tax_rate($_REQUEST['tax_rate_id']);

$smarty->assign('tax_rate', $tax_rate);

$smarty->display('tax_rate/view_tax_rate.tpl');

?>