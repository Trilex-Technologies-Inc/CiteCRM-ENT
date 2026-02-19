<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     view_invoice_labor.php<br>
	* Purpose:  View a Single Invoice Labor row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/invoice_labor.class.php');

	$core->verifyAdmin();
// Set Cache ID
$my_cache_id = $_REQUEST['invoice_labor_id'];
// If the session is set to clear cache rebuild the cached page
if($_SESSION['CLEAR_CACHE'] == true) {
	print "Cache file rebuilt";
$smarty->clear_cache('invoice_labor/view_invoice_labor.tpl',$my_cache_id);
$smarty->clear_cache('invoice_labor/search_invoice_labor.tpl');
	$_SESSION['CLEAR_CACHE'] = false;
}
$smarty->caching = true;
// If we do not have a cached file build the page
if(!$smarty->is_cached('invoice_labor/view_invoice_labor.tpl',$my_cache_id)) {
		$invoice_labor = new invoice_labor();

	$invoice_labor->view_invoice_labor($_REQUEST['invoice_labor_id']);

	$smarty->assign('invoice_labor', $invoice_labor);

}
$smarty->display('invoice_labor/view_invoice_labor.tpl',$my_cache_id);

?>