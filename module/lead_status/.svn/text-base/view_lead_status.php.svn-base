<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     view_lead_status.php<br>
	* Purpose:  View a Single Lead Status row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/
$core->verifyAdmin(SUPER_USER);

	require(CLASS_PATH.'/core/lead_status.class.php');

// Set Cache ID
$my_cache_id = $_REQUEST['lead_status_id'];
// If the session is set to clear cache rebuild the cached page
if($_SESSION['CLEAR_CACHE'] == true) {
	print "Cache file rebuilt";
$smarty->clear_cache('lead_status/view_lead_status.tpl',$my_cache_id);
$smarty->clear_cache('lead_status/search_lead_status.tpl');
	$_SESSION['CLEAR_CACHE'] = false;
}
$smarty->caching = true;
// If we do not have a cached file build the page
if(!$smarty->is_cached('lead_status/view_lead_status.tpl',$my_cache_id)) {
		$lead_status = new lead_status();

	$lead_status->view_lead_status($_REQUEST['lead_status_id']);

	$smarty->assign('lead_status', $lead_status);

}
$smarty->display('lead_status/view_lead_status.tpl',$my_cache_id);

?>