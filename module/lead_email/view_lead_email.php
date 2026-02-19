<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     view_lead_email.php<br>
	* Purpose:  View a Single Lead Email row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/lead_email.class.php');

	$core->verifyAdmin();
// Set Cache ID
$my_cache_id = $_REQUEST['lead_email_id'];
// If the session is set to clear cache rebuild the cached page
if($_SESSION['CLEAR_CACHE'] == true) {
	print "Cache file rebuilt";
$smarty->clear_cache('lead_email/view_lead_email.tpl',$my_cache_id);
$smarty->clear_cache('lead_email/search_lead_email.tpl');
	$_SESSION['CLEAR_CACHE'] = false;
}
$smarty->caching = true;
// If we do not have a cached file build the page
if(!$smarty->is_cached('lead_email/view_lead_email.tpl',$my_cache_id)) {
		$lead_email = new lead_email();

	$lead_email->view_lead_email($_REQUEST['lead_email_id']);

	$smarty->assign('lead_email', $lead_email);

}
$smarty->display('lead_email/view_lead_email.tpl',$my_cache_id);

?>