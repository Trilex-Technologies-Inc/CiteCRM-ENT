<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     view_check_payment.php<br>
	* Purpose:  View a Single Check Payment row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/check_payment.class.php');

	$core->verifyAdmin();
// Set Cache ID
$my_cache_id = $_REQUEST['check_payment_id'];
// If the session is set to clear cache rebuild the cached page
if($_SESSION['CLEAR_CACHE'] == true) {
	print "Cache file rebuilt";
$smarty->clear_cache('check_payment/view_check_payment.tpl',$my_cache_id);
$smarty->clear_cache('check_payment/search_check_payment.tpl');
	$_SESSION['CLEAR_CACHE'] = false;
}
$smarty->caching = true;
// If we do not have a cached file build the page
if(!$smarty->is_cached('check_payment/view_check_payment.tpl',$my_cache_id)) {
		$check_payment = new check_payment();

	$check_payment->view_check_payment($_REQUEST['check_payment_id']);

	$smarty->assign('check_payment', $check_payment);

}
$smarty->display('check_payment/view_check_payment.tpl',$my_cache_id);

?>