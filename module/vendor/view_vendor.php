<?php
/**
 * Type:     Cite CMS PHP Page<br>
 * Name:     view_vendor.php<br>
 * Purpose:  View a Single Vendor row<br>
 * 
 * @author Cite CMS Module Developer
 * @access Public
 * @version 1.0
*/

$core->verifyAdmin();

// Set Cache ID
$my_cache_id = $_REQUEST['vendor_id'];

// If the session is set to clear cache rebuild the cached page
if($_SESSION['CLEAR_CACHE'] == true) {	

	print "Cache file rebuilt";
	
	$smarty->clear_cache('vendor/view_vendor.tpl',$my_cache_id);
	$smarty->clear_cache('vendor/search_vendor.tpl');
	$smarty->cache_lifetime = 300000;
	
	$_SESSION['CLEAR_CACHE'] = false;
	
}

$smarty->caching = true;

// If we do not have a cached file build the page
if(!$smarty->is_cached('vendor/view_vendor.tpl',$my_cache_id)) {

	require(CLASS_PATH.'/core/vendor.class.php');
	require(CLASS_PATH.'/core/vendor_address.class.php');
	require(CLASS_PATH.'/core/vendor_contact.class.php');
	

	$vendor = new vendor();

	$vendor_address = new vendor_address();
	
	$vendor_contact = new vendor_contact();


	$vendor->view_vendor($_REQUEST['vendor_id']);

	$vendor_address_array = $vendor_address->load_by_vendor($_REQUEST['vendor_id']);

	$vendor_contact_array = $vendor_contact->load_by_vendor($_REQUEST['vendor_id']);

	$smarty->assign('vendor_address_array',$vendor_address_array);

	$smarty->assign('vendor_contact_array',$vendor_contact_array);

	$smarty->assign('vendor', $vendor);
	
}

$smarty->display('vendor/view_vendor.tpl',$my_cache_id);

?>