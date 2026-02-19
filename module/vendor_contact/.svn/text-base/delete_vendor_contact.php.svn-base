<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     delete_vendor_contact.php<br>
	* Purpose:  delete a Single Vendor Contact row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/vendor_contact.class.php');

	$core->verifyAdmin();

$vendor_contact = new vendor_contact();

$vendor_contact->delete_vendor_contact($_REQUEST['vendor_contact_id']);

$smarty->display('vendor_contact/delete_vendor_contact.tpl')

?>