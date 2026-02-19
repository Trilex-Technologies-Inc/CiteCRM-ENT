<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     search_workorder_time.php<br>
	* Purpose:  Search Workorder Time<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/workorder_time.class.php');
	require(SMARTY_PATH.'/SmartyPaginate.class.php');

// If the session is set to clear cache rebuild the cached page
if($_SESSION['CLEAR_CACHE'] == true) {
	print "Cache file rebuilt";
	$smarty->clear_cache('workorder_time/search_workorder_time.tpl');
	$_SESSION['CLEAR_CACHE'] = false;
}
$smarty->caching = true;
// If we do not have a cached file build the page
if(!$smarty->is_cached('workorder_time/search_workorder_time.tpl')) {
		// Paginate
		SmartyPaginate::connect();
		SmartyPaginate::setLimit(50);
		SmartyPaginate::setUrl('/?page=workorder_time:search_workorder_time');
	
	$workorder_time = new workorder_time();
	$workorder_timeArray = $workorder_time->search_workorder_time();
	$smarty->assign('workorder_timeArray', $workorder_timeArray);
	SmartyPaginate::assign($smarty);
}
	$smarty->display('workorder_time/search_workorder_time.tpl');

?>