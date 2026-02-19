<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     view_campaign_type.php<br>
	* Purpose:  View a Single Campaign Type row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/
$core->verifyAdmin(CAN_READ);

require(CLASS_PATH.'/core/campaign_type.class.php');

// Set Cache ID
$my_cache_id = $_REQUEST['campaign_type_id'];
// If the session is set to clear cache rebuild the cached page
if($_SESSION['CLEAR_CACHE'] == true) {
	print "Cache file rebuilt";
$smarty->clear_cache('campaign_type/view_campaign_type.tpl',$my_cache_id);
$smarty->clear_cache('campaign_type/search_campaign_type.tpl');
	$_SESSION['CLEAR_CACHE'] = false;
}
$smarty->caching = true;
// If we do not have a cached file build the page
if(!$smarty->is_cached('campaign_type/view_campaign_type.tpl',$my_cache_id)) {
		$campaign_type = new campaign_type();

	$campaign_type->view_campaign_type($_REQUEST['campaign_type_id']);

	$smarty->assign('campaign_type', $campaign_type);

}
$smarty->display('campaign_type/view_campaign_type.tpl',$my_cache_id);

?>