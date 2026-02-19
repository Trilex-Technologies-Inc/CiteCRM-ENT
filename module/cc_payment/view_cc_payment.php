<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     view_cc_payment.php<br>
	* Purpose:  View a Single Credit Card Payment row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/cc_payment.class.php');

	$core->verifyAdmin();
// Set Cache ID
$my_cache_id = $_REQUEST['cc_payment_id'];
// If the session is set to clear cache rebuild the cached page
if($_SESSION['CLEAR_CACHE'] == true) {
	print "Cache file rebuilt";
$smarty->clear_cache('cc_payment/view_cc_payment.tpl',$my_cache_id);
$smarty->clear_cache('cc_payment/search_cc_payment.tpl');
	$_SESSION['CLEAR_CACHE'] = false;
}
$smarty->caching = true;
// If we do not have a cached file build the page
if(!$smarty->is_cached('cc_payment/view_cc_payment.tpl',$my_cache_id)) {
		$cc_payment = new cc_payment();

	$cc_payment->view_cc_payment($_REQUEST['cc_payment_id']);

	$smarty->assign('cc_payment', $cc_payment);

}
$smarty->display('cc_payment/view_cc_payment.tpl',$my_cache_id);

?>