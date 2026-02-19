<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     view_invoice_part.php<br>
	* Purpose:  View a Single Invoice Part row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/invoice_part.class.php');

	$core->verifyAdmin();
// Set Cache ID
$my_cache_id = $_REQUEST['invoice_part_id'];
// If the session is set to clear cache rebuild the cached page
if($_SESSION['CLEAR_CACHE'] == true) {
	print "Cache file rebuilt";
$smarty->clear_cache('invoice_part/view_invoice_part.tpl',$my_cache_id);
$smarty->clear_cache('invoice_part/search_invoice_part.tpl');
	$_SESSION['CLEAR_CACHE'] = false;
}
$smarty->caching = true;
// If we do not have a cached file build the page
if(!$smarty->is_cached('invoice_part/view_invoice_part.tpl',$my_cache_id)) {
		$invoice_part = new invoice_part();

	$invoice_part->view_invoice_part($_REQUEST['invoice_part_id']);

	$smarty->assign('invoice_part', $invoice_part);

}
$smarty->display('invoice_part/view_invoice_part.tpl',$my_cache_id);

?>