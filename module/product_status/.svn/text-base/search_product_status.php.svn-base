<?php
/**
* Type:     Cite CMS PHP Page<br>
* Name:     search_product_status.php<br>
* Purpose:  Search Product Status<br>
* 
* @author Cite CMS Module Developer
* @access Public
* @version 1.0
*/
$core->verifyAdmin(SUPER_USER);

require(CLASS_PATH.'/core/product_status.class.php');

require(SMARTY_PATH.'/SmartyPaginate.class.php');

// If the session is set to clear cache rebuild the cached page
if($_SESSION['CLEAR_CACHE'] == true) {
	print "Cache file rebuilt";
	$smarty->clear_cache('product_status/search_product_status.tpl');
	$_SESSION['CLEAR_CACHE'] = false;
}
$smarty->caching = true;
// If we do not have a cached file build the page
if(!$smarty->is_cached('product_status/search_product_status.tpl')) {
		// Paginate
		SmartyPaginate::connect();
		SmartyPaginate::setLimit(50);
		SmartyPaginate::setUrl('/?page=product_status:search_product_status');
	
	$product_status = new product_status();
	$product_statusArray = $product_status->search_product_status();
	$smarty->assign('product_statusArray', $product_statusArray);
	SmartyPaginate::assign($smarty);
}
	$smarty->display('product_status/search_product_status.tpl');

?>