<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     search_tax_class.php<br>
	* Purpose:  Search Tax Class<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/tax_class.class.php');
	require(SMARTY_PATH.'/SmartyPaginate.class.php');

// If the session is set to clear cache rebuild the cached page
if($_SESSION['CLEAR_CACHE'] == true) {
	print "Cache file rebuilt";
	$smarty->clear_cache('tax_class/search_tax_class.tpl');
	$_SESSION['CLEAR_CACHE'] = false;
}
$smarty->caching = true;
// If we do not have a cached file build the page
if(!$smarty->is_cached('tax_class/search_tax_class.tpl')) {
		// Paginate
		SmartyPaginate::connect();
		SmartyPaginate::setLimit(50);
		SmartyPaginate::setUrl('/?page=tax_class:search_tax_class');
	
	$tax_class = new tax_class();
	$tax_classArray = $tax_class->search_tax_class();
	$smarty->assign('tax_classArray', $tax_classArray);
	SmartyPaginate::assign($smarty);
}
	$smarty->display('tax_class/search_tax_class.tpl');

?>