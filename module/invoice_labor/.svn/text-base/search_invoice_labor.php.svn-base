<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     search_invoice_labor.php<br>
	* Purpose:  Search Invoice Labor<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/invoice_labor.class.php');
	require(SMARTY_PATH.'/SmartyPaginate.class.php');

// If the session is set to clear cache rebuild the cached page
if($_SESSION['CLEAR_CACHE'] == true) {
	print "Cache file rebuilt";
	$smarty->clear_cache('invoice_labor/search_invoice_labor.tpl');
	$_SESSION['CLEAR_CACHE'] = false;
}
$smarty->caching = true;
// If we do not have a cached file build the page
if(!$smarty->is_cached('invoice_labor/search_invoice_labor.tpl')) {
		// Paginate
		SmartyPaginate::connect();
		SmartyPaginate::setLimit(50);
		SmartyPaginate::setUrl('/?page=invoice_labor:search_invoice_labor');
	
	$invoice_labor = new invoice_labor();
	$invoice_laborArray = $invoice_labor->search_invoice_labor();
	$smarty->assign('invoice_laborArray', $invoice_laborArray);
	SmartyPaginate::assign($smarty);
}
	$smarty->display('invoice_labor/search_invoice_labor.tpl');

?>