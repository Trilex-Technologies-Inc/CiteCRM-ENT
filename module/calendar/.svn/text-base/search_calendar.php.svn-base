<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     search_calendar.php<br>
	* Purpose:  Search Calendar<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/calendar.class.php');
	require(SMARTY_PATH.'/SmartyPaginate.class.php');

// If the session is set to clear cache rebuild the cached page
if($_SESSION['CLEAR_CACHE'] == true) {
	print "Cache file rebuilt";
	$smarty->clear_cache('calendar/search_calendar.tpl');
	$_SESSION['CLEAR_CACHE'] = false;
}
$smarty->caching = true;
// If we do not have a cached file build the page
if(!$smarty->is_cached('calendar/search_calendar.tpl')) {
		// Paginate
		SmartyPaginate::connect();
		SmartyPaginate::setLimit(50);
		SmartyPaginate::setUrl('/?page=calendar:search_calendar');
	
	$calendar = new calendar();
	$calendarArray = $calendar->search_calendar();
	$smarty->assign('calendarArray', $calendarArray);
	SmartyPaginate::assign($smarty);
}
	$smarty->display('calendar/search_calendar.tpl');

?>