<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     view_tax_class.php<br>
	* Purpose:  View a Single Tax Class row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/tax_class.class.php');

	$core->verifyAdmin();
// Set Cache ID
$my_cache_id = $_REQUEST['tax_class_id'];
// If the session is set to clear cache rebuild the cached page
if($_SESSION['CLEAR_CACHE'] == true) {
	print "Cache file rebuilt";
$smarty->clear_cache('tax_class/view_tax_class.tpl',$my_cache_id);
$smarty->clear_cache('tax_class/search_tax_class.tpl');
	$_SESSION['CLEAR_CACHE'] = false;
}
$smarty->caching = true;
// If we do not have a cached file build the page
if(!$smarty->is_cached('tax_class/view_tax_class.tpl',$my_cache_id)) {
		$tax_class = new tax_class();

	$tax_class->view_tax_class($_REQUEST['tax_class_id']);

	$smarty->assign('tax_class', $tax_class);

}
$smarty->display('tax_class/view_tax_class.tpl',$my_cache_id);

?>