<?php
/**
 * Type:     Cite CMS PHP Page<br>
 * Name:     search_vendor.php<br>
 * Purpose:  Search Vendor<br>
 * 
 * @author Cite CMS Module Developer
 * @access Public
 * @version 1.0
*/

	$core->verifyAdmin();
	
	if($_SESSION['CLEAR_CACHE'] == true) {	

		print "Cache file rebuilt";
	
		$smarty->display('vendor/search_vendor.tpl');
		$smarty->cache_lifetime = 300000;
		
		$_SESSION['CLEAR_CACHE'] = false;
	
	}

	$smarty->caching = true;

	if(!$smarty->is_cached('vendor/search_vendor.tpl')) {

		require(CLASS_PATH.'/core/vendor.class.php');
		
		require(SMARTY_PATH.'/SmartyPaginate.class.php');
	
		// Paginate
		SmartyPaginate::connect();
		
		SmartyPaginate::setLimit(50);
		
		SmartyPaginate::setUrl('/?page=vendor:search_vendor');
	
		$vendor = new vendor();
		
		$vendorArray = $vendor->search_vendor();
		
		$smarty->assign('vendorArray', $vendorArray);
		
		SmartyPaginate::assign($smarty);
	
	}
	
	$smarty->display('vendor/search_vendor.tpl');

?>