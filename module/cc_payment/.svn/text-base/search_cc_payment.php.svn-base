<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     search_cc_payment.php<br>
	* Purpose:  Search Credit Card Payment<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/cc_payment.class.php');
	require(SMARTY_PATH.'/SmartyPaginate.class.php');

// If the session is set to clear cache rebuild the cached page
if($_SESSION['CLEAR_CACHE'] == true) {
	print "Cache file rebuilt";
	$smarty->clear_cache('cc_payment/search_cc_payment.tpl');
	$_SESSION['CLEAR_CACHE'] = false;
}
$smarty->caching = true;
// If we do not have a cached file build the page
if(!$smarty->is_cached('cc_payment/search_cc_payment.tpl')) {
		// Paginate
		SmartyPaginate::connect();
		SmartyPaginate::setLimit(50);
		SmartyPaginate::setUrl('/?page=cc_payment:search_cc_payment');
	
	$cc_payment = new cc_payment();
	$cc_paymentArray = $cc_payment->search_cc_payment();
	$smarty->assign('cc_paymentArray', $cc_paymentArray);
	SmartyPaginate::assign($smarty);
}
	$smarty->display('cc_payment/search_cc_payment.tpl');

?>