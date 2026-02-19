<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     delete_invoice_labor.php<br>
	* Purpose:  delete a Single Invoice Labor row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/invoice_labor.class.php');

	$core->verifyAdmin();

$invoice_labor = new invoice_labor();

$invoice_labor->delete_invoice_labor($_REQUEST['invoice_labor_id']);

$smarty->display('invoice_labor/delete_invoice_labor.tpl')

?>