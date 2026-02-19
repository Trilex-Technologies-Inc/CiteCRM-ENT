<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     view_workorder_time.php<br>
	* Purpose:  View a Single Workorder Time row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/workorder_time.class.php');

	$core->verifyAdmin();
// Set Cache ID
$my_cache_id = $_REQUEST['workorder_time_id'];
// If the session is set to clear cache rebuild the cached page
if($_SESSION['CLEAR_CACHE'] == true) {
	print "Cache file rebuilt";
$smarty->clear_cache('workorder_time/view_workorder_time.tpl',$my_cache_id);
$smarty->clear_cache('workorder_time/search_workorder_time.tpl');
	$_SESSION['CLEAR_CACHE'] = false;
}
$smarty->caching = true;
// If we do not have a cached file build the page
if(!$smarty->is_cached('workorder_time/view_workorder_time.tpl',$my_cache_id)) {
		$workorder_time = new workorder_time();

	$workorder_time->view_workorder_time($_REQUEST['workorder_time_id']);

	$smarty->assign('workorder_time', $workorder_time);

}
$smarty->display('workorder_time/view_workorder_time.tpl',$my_cache_id);

?>