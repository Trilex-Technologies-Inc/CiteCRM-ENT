<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     search_lead_email.php<br>
	* Purpose:  Search Lead Email<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/lead_email.class.php');
	require(SMARTY_PATH.'/SmartyPaginate.class.php');

// If the session is set to clear cache rebuild the cached page
if($_SESSION['CLEAR_CACHE'] == true) {
	print "Cache file rebuilt";
	$smarty->clear_cache('lead_email/search_lead_email.tpl');
	$_SESSION['CLEAR_CACHE'] = false;
}
$smarty->caching = true;
// If we do not have a cached file build the page
if(!$smarty->is_cached('lead_email/search_lead_email.tpl')) {
		// Paginate
		SmartyPaginate::connect();
		SmartyPaginate::setLimit(50);
		SmartyPaginate::setUrl('/?page=lead_email:search_lead_email');
	
	$lead_email = new lead_email();
	$lead_emailArray = $lead_email->search_lead_email();
	$smarty->assign('lead_emailArray', $lead_emailArray);
	SmartyPaginate::assign($smarty);
}
	$smarty->display('lead_email/search_lead_email.tpl');

?>