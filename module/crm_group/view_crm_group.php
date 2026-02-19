<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     view_crm_group.php<br>
	* Purpose:  View a Single Group row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/crm_group.class.php');

	$core->verifyAdmin();
// Set Cache ID
$my_cache_id = $_REQUEST['crm_group_id'];
// If the session is set to clear cache rebuild the cached page
if($_SESSION['CLEAR_CACHE'] == true) {
	print "Cache file rebuilt";
$smarty->clear_cache('crm_group/view_crm_group.tpl',$my_cache_id);
$smarty->clear_cache('crm_group/search_crm_group.tpl');
	$_SESSION['CLEAR_CACHE'] = false;
}
$smarty->caching = true;
// If we do not have a cached file build the page
if(!$smarty->is_cached('crm_group/view_crm_group.tpl',$my_cache_id)) {
		$crm_group = new crm_group();

	$crm_group->view_crm_group($_REQUEST['crm_group_id']);

	$smarty->assign('crm_group', $crm_group);

}
$smarty->display('crm_group/view_crm_group.tpl',$my_cache_id);

?>