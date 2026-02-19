<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     view_product_to_category.php<br>
	* Purpose:  View a Single Product To Category row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/product_to_category.class.php');

	$core->verifyAdmin();
// Set Cache ID
$my_cache_id = $_REQUEST['product_to_category_id'];
// If the session is set to clear cache rebuild the cached page
if($_SESSION['CLEAR_CACHE'] == true) {
	print "Cache file rebuilt";
$smarty->clear_cache('product_to_category/view_product_to_category.tpl',$my_cache_id);
$smarty->clear_cache('product_to_category/search_product_to_category.tpl');
	$_SESSION['CLEAR_CACHE'] = false;
}
$smarty->caching = true;
// If we do not have a cached file build the page
if(!$smarty->is_cached('product_to_category/view_product_to_category.tpl',$my_cache_id)) {
		$product_to_category = new product_to_category();

	$product_to_category->view_product_to_category($_REQUEST['product_to_category_id']);

	$smarty->assign('product_to_category', $product_to_category);

}
$smarty->display('product_to_category/view_product_to_category.tpl',$my_cache_id);

?>