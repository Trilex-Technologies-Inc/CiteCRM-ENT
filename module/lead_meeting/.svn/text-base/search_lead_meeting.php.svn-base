<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     search_lead_meeting.php<br>
	* Purpose:  Search Lead Meeting<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/lead_meeting.class.php');
	require(SMARTY_PATH.'/SmartyPaginate.class.php');

// If the session is set to clear cache rebuild the cached page
if($_SESSION['CLEAR_CACHE'] == true) {
	print "Cache file rebuilt";
	$smarty->clear_cache('lead_meeting/search_lead_meeting.tpl');
	$_SESSION['CLEAR_CACHE'] = false;
}
$smarty->caching = true;
// If we do not have a cached file build the page
if(!$smarty->is_cached('lead_meeting/search_lead_meeting.tpl')) {
		// Paginate
		SmartyPaginate::connect();
		SmartyPaginate::setLimit(50);
		SmartyPaginate::setUrl('/?page=lead_meeting:search_lead_meeting');
	
	$lead_meeting = new lead_meeting();
	$lead_meetingArray = $lead_meeting->search_lead_meeting();
	$smarty->assign('lead_meetingArray', $lead_meetingArray);
	SmartyPaginate::assign($smarty);
}
	$smarty->display('lead_meeting/search_lead_meeting.tpl');

?>