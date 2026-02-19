<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     search_lead_call.php<br>
	* Purpose:  Search Lead Call<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/lead_call.class.php');
	require(SMARTY_PATH.'/SmartyPaginate.class.php');

// If the session is set to clear cache rebuild the cached page
if($_SESSION['CLEAR_CACHE'] == true) {
	print "Cache file rebuilt";
	$smarty->clear_cache('lead_call/search_lead_call.tpl');
	$_SESSION['CLEAR_CACHE'] = false;
}

$smarty->caching = true;
// If we do not have a cached file build the page
if(!$smarty->is_cached('lead_call/search_lead_call.tpl')) {
		// Paginate
		SmartyPaginate::connect();
		SmartyPaginate::setLimit(50);
		SmartyPaginate::setUrl('/?page=lead_call:search_lead_call');
	
	$lead_call = new lead_call();
	$lead_callArray = $lead_call->search_lead_call();
	$smarty->assign('lead_callArray', $lead_callArray);
	SmartyPaginate::assign($smarty);
}
	$smarty->display('lead_call/search_lead_call.tpl');

?>