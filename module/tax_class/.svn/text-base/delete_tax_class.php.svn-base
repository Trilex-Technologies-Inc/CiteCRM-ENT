<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     delete_tax_class.php<br>
	* Purpose:  delete a Single Tax Class row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/tax_class.class.php');

	$core->verifyAdmin();

$tax_class = new tax_class();

$tax_class->delete_tax_class($_REQUEST['tax_class_id']);

$smarty->display('tax_class/delete_tax_class.tpl')

?>