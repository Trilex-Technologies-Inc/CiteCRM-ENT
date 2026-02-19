<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     view_lead_call.php<br>
	* Purpose:  View a Single Lead Call row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/lead_call.class.php');

	$core->verifyAdmin();
// Set Cache ID
$my_cache_id = $_REQUEST['lead_call_id'];
// If the session is set to clear cache rebuild the cached page
if($_SESSION['CLEAR_CACHE'] == true) {
	print "Cache file rebuilt";
$smarty->clear_cache('lead_call/view_lead_call.tpl',$my_cache_id);
$smarty->clear_cache('lead_call/search_lead_call.tpl');
	$_SESSION['CLEAR_CACHE'] = false;
}
$smarty->caching = true;
// If we do not have a cached file build the page
if(!$smarty->is_cached('lead_call/view_lead_call.tpl',$my_cache_id)) {
		$lead_call = new lead_call();

	$lead_call->view_lead_call($_REQUEST['lead_call_id']);

	$smarty->assign('lead_call', $lead_call);

}
$smarty->display('lead_call/view_lead_call.tpl',$my_cache_id);

?>