<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     view_calendar.php<br>
	* Purpose:  View a Single Calendar row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/calendar.class.php');

	$core->verifyAdmin();
// Set Cache ID
$my_cache_id = $_REQUEST['calendar_id'];
// If the session is set to clear cache rebuild the cached page
if($_SESSION['CLEAR_CACHE'] == true) {
	print "Cache file rebuilt";
$smarty->clear_cache('calendar/view_calendar.tpl',$my_cache_id);
$smarty->clear_cache('calendar/search_calendar.tpl');
	$_SESSION['CLEAR_CACHE'] = false;
}
$smarty->caching = true;
// If we do not have a cached file build the page
if(!$smarty->is_cached('calendar/view_calendar.tpl',$my_cache_id)) {
		$calendar = new calendar();

	$calendar->view_calendar($_REQUEST['calendar_id']);

	$smarty->assign('calendar', $calendar);

}
$smarty->display('calendar/view_calendar.tpl',$my_cache_id);

?>