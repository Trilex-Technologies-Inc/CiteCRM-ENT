<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     view_lead_meeting.php<br>
	* Purpose:  View a Single Lead Meeting row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/lead_meeting.class.php');

	$core->verifyAdmin();
// Set Cache ID
$my_cache_id = $_REQUEST['lead_meeting_id'];
// If the session is set to clear cache rebuild the cached page
if($_SESSION['CLEAR_CACHE'] == true) {
	print "Cache file rebuilt";
$smarty->clear_cache('lead_meeting/view_lead_meeting.tpl',$my_cache_id);
$smarty->clear_cache('lead_meeting/search_lead_meeting.tpl');
	$_SESSION['CLEAR_CACHE'] = false;
}
$smarty->caching = true;
// If we do not have a cached file build the page
if(!$smarty->is_cached('lead_meeting/view_lead_meeting.tpl',$my_cache_id)) {
		$lead_meeting = new lead_meeting();

	$lead_meeting->view_lead_meeting($_REQUEST['lead_meeting_id']);

	$smarty->assign('lead_meeting', $lead_meeting);

}
$smarty->display('lead_meeting/view_lead_meeting.tpl',$my_cache_id);

?>