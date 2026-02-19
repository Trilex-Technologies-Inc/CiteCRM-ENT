<?php
/**
* Type:     Cite CMS PHP Page<br>
* Name:     delete_tax_rate.php<br>
* Purpose:  delete a Single Tax Rates row<br>
* 
* @author Cite CMS Module Developer
* @access Public
* @version 1.0
*/

$core->verifyAdmin(SUPER_USER);

require(CLASS_PATH.'/core/tax_rate.class.php');

$tax_rate = new tax_rate();

$tax_rate->delete_tax_rate($_REQUEST['tax_rate_id']);

$smarty->display('tax_rate/delete_tax_rate.tpl')

?>