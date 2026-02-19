<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     search_vendor_contact.php<br>
	* Purpose:  Search Vendor Contact<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/vendor_contact.class.php');
	require(SMARTY_PATH.'/SmartyPaginate.class.php');

	// Paginate
	SmartyPaginate::connect();
	SmartyPaginate::setLimit(50);
	SmartyPaginate::setUrl('/?page=vendor_contact:search_vendor_contact');

	$vendor_contact = new vendor_contact();
	$vendor_contactArray = $vendor_contact->search_vendor_contact();
	$smarty->assign('vendor_contactArray', $vendor_contactArray);
	SmartyPaginate::assign($smarty);
	$smarty->display('vendor_contact/search_vendor_contact.tpl');

?>