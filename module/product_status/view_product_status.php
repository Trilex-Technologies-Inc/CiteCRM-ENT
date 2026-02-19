<?php
/**
* Type:     Cite CMS PHP Page<br>
* Name:     view_product_status.php<br>
* Purpose:  View a Single Product Status row<br>
* 
* @author Cite CMS Module Developer
* @access Public
* @version 1.0
*/

$core->verifyAdmin(SUPER_USER);

require(CLASS_PATH.'/core/product_status.class.php');

// Set Cache ID
$my_cache_id = $_REQUEST['product_status_id'];
// If the session is set to clear cache rebuild the cached page
if($_SESSION['CLEAR_CACHE'] == true) {
	print "Cache file rebuilt";
$smarty->clear_cache('product_status/view_product_status.tpl',$my_cache_id);
$smarty->clear_cache('product_status/search_product_status.tpl');
	$_SESSION['CLEAR_CACHE'] = false;
}
$smarty->caching = true;
// If we do not have a cached file build the page
if(!$smarty->is_cached('product_status/view_product_status.tpl',$my_cache_id)) {
		$product_status = new product_status();

	$product_status->view_product_status($_REQUEST['product_status_id']);

	$smarty->assign('product_status', $product_status);

}
$smarty->display('product_status/view_product_status.tpl',$my_cache_id);

?>