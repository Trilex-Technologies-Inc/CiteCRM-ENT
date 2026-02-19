<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     view_vendor_contact.php<br>
	* Purpose:  View a Single Vendor Contact row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/vendor_contact.class.php');

	$core->verifyAdmin();
	$vendor_contact = new vendor_contact();

$vendor_contact->view_vendor_contact($_REQUEST['vendor_contact_id']);

$smarty->assign('vendor_contact', $vendor_contact);

$smarty->display('vendor_contact/view_vendor_contact.tpl');

?>