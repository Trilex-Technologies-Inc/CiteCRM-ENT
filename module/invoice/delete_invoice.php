<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     delete_invoice.php<br>
	* Purpose:  delete a Single Invoice row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/invoice.class.php');

	$auth = &new Auth($db, '/index.php?page=user:userLogin', 'secret');

$invoice = new invoice();

$invoice->delete_invoice($_REQUEST['invoice_id']);

$smarty->display('invoice/delete_invoice.tpl')

?>