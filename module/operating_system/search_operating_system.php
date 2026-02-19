<?php
/**
* Type:     Cite CMS PHP Page<br>
* Name:     search_operating_system.php<br>
* Purpose:  Search Operating System<br>
* 
* @author Cite CMS Module Developer
* @access Public
* @version 1.0
*/

$core->verifyAdmin(SUPER_USER);

	require(CLASS_PATH.'/core/operating_system.class.php');
	require(SMARTY_PATH.'/SmartyPaginate.class.php');

	// Paginate
	SmartyPaginate::connect();
	SmartyPaginate::setLimit(50);
	SmartyPaginate::setUrl('/?page=operating_system:search_operating_system');

	$operating_system = new operating_system();
	$operating_systemArray = $operating_system->search_operating_system();
	$smarty->assign('operating_systemArray', $operating_systemArray);
	SmartyPaginate::assign($smarty);
	$smarty->display('operating_system/search_operating_system.tpl');

?>