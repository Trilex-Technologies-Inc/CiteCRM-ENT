<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     search_check_payment.php<br>
	* Purpose:  Search Check Payment<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/check_payment.class.php');
	require(SMARTY_PATH.'/SmartyPaginate.class.php');

// If the session is set to clear cache rebuild the cached page
if($_SESSION['CLEAR_CACHE'] == true) {
	print "Cache file rebuilt";
	$smarty->clear_cache('check_payment/search_check_payment.tpl');
	$_SESSION['CLEAR_CACHE'] = false;
}
$smarty->caching = true;
// If we do not have a cached file build the page
if(!$smarty->is_cached('check_payment/search_check_payment.tpl')) {
		// Paginate
		SmartyPaginate::connect();
		SmartyPaginate::setLimit(50);
		SmartyPaginate::setUrl('/?page=check_payment:search_check_payment');
	
	$check_payment = new check_payment();
	$check_paymentArray = $check_payment->search_check_payment();
	$smarty->assign('check_paymentArray', $check_paymentArray);
	SmartyPaginate::assign($smarty);
}
	$smarty->display('check_payment/search_check_payment.tpl');

?>