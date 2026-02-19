<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     view_product_description.php<br>
	* Purpose:  View a Single Product Description row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/product_description.class.php');

// Set Cache ID
$my_cache_id = $_REQUEST['product_description_id'];
// If the session is set to clear cache rebuild the cached page
if($_SESSION['CLEAR_CACHE'] == true) {
	print "Cache file rebuilt";
$smarty->clear_cache('product_description/view_product_description.tpl',$my_cache_id);
$smarty->clear_cache('product_description/search_product_description.tpl');
	$_SESSION['CLEAR_CACHE'] = false;
}
$smarty->caching = true;
// If we do not have a cached file build the page
if(!$smarty->is_cached('product_description/view_product_description.tpl',$my_cache_id)) {
		$product_description = new product_description();

	$product_description->view_product_description($_REQUEST['product_description_id']);

	$smarty->assign('product_description', $product_description);

}
$smarty->display('product_description/view_product_description.tpl',$my_cache_id);

?>