<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     search_product_to_category.php<br>
	* Purpose:  Search Product To Category<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/product_to_category.class.php');
	require(SMARTY_PATH.'/SmartyPaginate.class.php');

// If the session is set to clear cache rebuild the cached page
if($_SESSION['CLEAR_CACHE'] == true) {
	print "Cache file rebuilt";
	$smarty->clear_cache('product_to_category/search_product_to_category.tpl');
	$_SESSION['CLEAR_CACHE'] = false;
}
$smarty->caching = true;
// If we do not have a cached file build the page
if(!$smarty->is_cached('product_to_category/search_product_to_category.tpl')) {
		// Paginate
		SmartyPaginate::connect();
		SmartyPaginate::setLimit(50);
		SmartyPaginate::setUrl('/?page=product_to_category:search_product_to_category');
	
	$product_to_category = new product_to_category();
	$product_to_categoryArray = $product_to_category->search_product_to_category();
	$smarty->assign('product_to_categoryArray', $product_to_categoryArray);
	SmartyPaginate::assign($smarty);
}
	$smarty->display('product_to_category/search_product_to_category.tpl');

?>