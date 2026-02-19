<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     delete_vendor.php<br>
	* Purpose:  delete a Single Vendor row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/vendor.class.php');

	$core->verifyAdmin();

$vendor = new vendor();

$vendor->delete_vendor($_REQUEST['vendor_id']);

$smarty->display('vendor/delete_vendor.tpl')

?>