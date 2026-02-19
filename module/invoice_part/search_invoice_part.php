<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     search_invoice_part.php<br>
	* Purpose:  Search Invoice Part<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/invoice_part.class.php');
	require(SMARTY_PATH.'/SmartyPaginate.class.php');

// If the session is set to clear cache rebuild the cached page
if($_SESSION['CLEAR_CACHE'] == true) {
	print "Cache file rebuilt";
	$smarty->clear_cache('invoice_part/search_invoice_part.tpl');
	$_SESSION['CLEAR_CACHE'] = false;
}
$smarty->caching = true;
// If we do not have a cached file build the page
if(!$smarty->is_cached('invoice_part/search_invoice_part.tpl')) {
		// Paginate
		SmartyPaginate::connect();
		SmartyPaginate::setLimit(50);
		SmartyPaginate::setUrl('/?page=invoice_part:search_invoice_part');
	
	$invoice_part = new invoice_part();
	$invoice_partArray = $invoice_part->search_invoice_part();
	$smarty->assign('invoice_partArray', $invoice_partArray);
	SmartyPaginate::assign($smarty);
}
	$smarty->display('invoice_part/search_invoice_part.tpl');

?>