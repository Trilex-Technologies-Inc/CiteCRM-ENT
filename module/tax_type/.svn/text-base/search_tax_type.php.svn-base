<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     search_tax_type.php<br>
	* Purpose:  Search Tax Type<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/tax_type.class.php');
	require(SMARTY_PATH.'/SmartyPaginate.class.php');

// If the session is set to clear cache rebuild the cached page
if($_SESSION['CLEAR_CACHE'] == true) {
	print "Cache file rebuilt";
	$smarty->clear_cache('tax_type/search_tax_type.tpl');
	$_SESSION['CLEAR_CACHE'] = false;
}
$smarty->caching = true;
// If we do not have a cached file build the page
if(!$smarty->is_cached('tax_type/search_tax_type.tpl')) {
		// Paginate
		SmartyPaginate::connect();
		SmartyPaginate::setLimit(50);
		SmartyPaginate::setUrl('/?page=tax_type:search_tax_type');
	
	$tax_type = new tax_type();
	$tax_typeArray = $tax_type->search_tax_type();
	$smarty->assign('tax_typeArray', $tax_typeArray);
	SmartyPaginate::assign($smarty);
}
	$smarty->display('tax_type/search_tax_type.tpl');

?>