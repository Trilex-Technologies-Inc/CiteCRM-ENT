<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     view_tax_type.php<br>
	* Purpose:  View a Single Tax Type row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/tax_type.class.php');

	$core->verifyAdmin();
// Set Cache ID
$my_cache_id = $_REQUEST['tax_type_id'];
// If the session is set to clear cache rebuild the cached page
if($_SESSION['CLEAR_CACHE'] == true) {
	print "Cache file rebuilt";
$smarty->clear_cache('tax_type/view_tax_type.tpl',$my_cache_id);
$smarty->clear_cache('tax_type/search_tax_type.tpl');
	$_SESSION['CLEAR_CACHE'] = false;
}
$smarty->caching = true;
// If we do not have a cached file build the page
if(!$smarty->is_cached('tax_type/view_tax_type.tpl',$my_cache_id)) {
		$tax_type = new tax_type();

	$tax_type->view_tax_type($_REQUEST['tax_type_id']);

	$smarty->assign('tax_type', $tax_type);

}
$smarty->display('tax_type/view_tax_type.tpl',$my_cache_id);

?>