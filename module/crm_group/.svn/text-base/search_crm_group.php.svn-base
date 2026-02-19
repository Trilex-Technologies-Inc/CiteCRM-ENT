<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     search_crm_group.php<br>
	* Purpose:  Search Group<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/crm_group.class.php');
	require(SMARTY_PATH.'/SmartyPaginate.class.php');

// If the session is set to clear cache rebuild the cached page
if($_SESSION['CLEAR_CACHE'] == true) {
	print "Cache file rebuilt";
	$smarty->clear_cache('crm_group/search_crm_group.tpl');
	$_SESSION['CLEAR_CACHE'] = false;
}
$smarty->caching = true;
// If we do not have a cached file build the page
if(!$smarty->is_cached('crm_group/search_crm_group.tpl')) {
		// Paginate
		SmartyPaginate::connect();
		SmartyPaginate::setLimit(50);
		SmartyPaginate::setUrl('/?page=crm_group:search_crm_group');
	
	$crm_group = new crm_group();
	$crm_groupArray = $crm_group->search_crm_group();
	$smarty->assign('crm_groupArray', $crm_groupArray);
	SmartyPaginate::assign($smarty);
}
	$smarty->display('crm_group/search_crm_group.tpl');

?>