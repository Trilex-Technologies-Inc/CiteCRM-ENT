<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     delete_invoice_part.php<br>
	* Purpose:  delete a Single Invoice Part row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/invoice_part.class.php');

	$core->verifyAdmin();

$invoice_part = new invoice_part();

$invoice_part->delete_invoice_part($_REQUEST['invoice_part_id']);

$smarty->display('invoice_part/delete_invoice_part.tpl')

?>