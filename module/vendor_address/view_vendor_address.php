<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     view_vendor_address.php<br>
	* Purpose:  View a Single Vendor Address row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/vendor_address.class.php');

	$core->verifyAdmin();
	$vendor_address = new vendor_address();

$vendor_address->view_vendor_address($_REQUEST['vendor_address_id']);

$smarty->assign('vendor_address', $vendor_address);

$smarty->display('vendor_address/view_vendor_address.tpl');

?>