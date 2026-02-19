<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     delete_vendor_address.php<br>
	* Purpose:  delete a Single Vendor Address row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/vendor_address.class.php');

	$core->verifyAdmin();

$vendor_address = new vendor_address();

$vendor_address->delete_vendor_address($_REQUEST['vendor_address_id']);

$smarty->display('vendor_address/delete_vendor_address.tpl')

?>