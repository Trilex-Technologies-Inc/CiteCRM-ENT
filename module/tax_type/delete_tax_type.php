<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     delete_tax_type.php<br>
	* Purpose:  delete a Single Tax Type row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/tax_type.class.php');

	$core->verifyAdmin();

$tax_type = new tax_type();

$tax_type->delete_tax_type($_REQUEST['tax_type_id']);

$smarty->display('tax_type/delete_tax_type.tpl')

?>