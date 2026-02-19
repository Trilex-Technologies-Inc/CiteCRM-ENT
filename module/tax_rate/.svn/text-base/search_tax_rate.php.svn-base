<?php
/**
* Type:     Cite CMS PHP Page<br>
* Name:     search_tax_rate.php<br>
* Purpose:  Search Tax Rates<br>
* 
* @author Cite CMS Module Developer
* @access Public
* @version 1.0
*/

$core->verifyAdmin(SUPER_USER);

	require(CLASS_PATH.'/core/tax_rate.class.php');
	require(SMARTY_PATH.'/SmartyPaginate.class.php');

// If the session is set to clear cache rebuild the cached page
if($_SESSION['CLEAR_CACHE'] == true) {
	print "Cache file rebuilt";
	$smarty->clear_cache('tax_rate/search_tax_rate.tpl');
	$_SESSION['CLEAR_CACHE'] = false;
}
$smarty->caching = true;
// If we do not have a cached file build the page
if(!$smarty->is_cached('tax_rate/search_tax_rate.tpl')) {
		// Paginate
		SmartyPaginate::connect();
		SmartyPaginate::setLimit(50);
		SmartyPaginate::setUrl('/?page=tax_rate:search_tax_rate');
	
	$tax_rate = new tax_rate();
	$tax_rateArray = $tax_rate->search_tax_rate();
	$smarty->assign('tax_rateArray', $tax_rateArray);
	SmartyPaginate::assign($smarty);
}
	$smarty->display('tax_rate/search_tax_rate.tpl');

?>