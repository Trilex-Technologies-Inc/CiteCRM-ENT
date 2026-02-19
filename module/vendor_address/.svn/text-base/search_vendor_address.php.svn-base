<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     search_vendor_address.php<br>
	* Purpose:  Search Vendor Address<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/vendor_address.class.php');
	require(SMARTY_PATH.'/SmartyPaginate.class.php');

	// Paginate
	SmartyPaginate::connect();
	SmartyPaginate::setLimit(50);
	SmartyPaginate::setUrl('/?page=vendor_address:search_vendor_address');

	$vendor_address = new vendor_address();
	$vendor_addressArray = $vendor_address->search_vendor_address();
	$smarty->assign('vendor_addressArray', $vendor_addressArray);
	SmartyPaginate::assign($smarty);
	$smarty->display('vendor_address/search_vendor_address.tpl');

?>