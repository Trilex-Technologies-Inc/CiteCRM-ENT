<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     search_product_description.php<br>
	* Purpose:  Search Product Description<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/product_description.class.php');
	require(SMARTY_PATH.'/SmartyPaginate.class.php');

// If the session is set to clear cache rebuild the cached page
if($_SESSION['CLEAR_CACHE'] == true) {
	print "Cache file rebuilt";
	$smarty->clear_cache('product_description/search_product_description.tpl');
	$_SESSION['CLEAR_CACHE'] = false;
}
$smarty->caching = true;
// If we do not have a cached file build the page
if(!$smarty->is_cached('product_description/search_product_description.tpl')) {
		// Paginate
		SmartyPaginate::connect();
		SmartyPaginate::setLimit(50);
		SmartyPaginate::setUrl('/?page=product_description:search_product_description');
	
	$product_description = new product_description();
	$product_descriptionArray = $product_description->search_product_description();
	$smarty->assign('product_descriptionArray', $product_descriptionArray);
	SmartyPaginate::assign($smarty);
}
	$smarty->display('product_description/search_product_description.tpl');

?>