<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     search_state.php<br>
	* Purpose:  Search State<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/state.class.php');
	require(SMARTY_PATH.'/SmartyPaginate.class.php');

	// Paginate
	SmartyPaginate::connect();
	SmartyPaginate::setLimit(50);
	SmartyPaginate::setUrl('/?page=state:search_state');

	$state = new state();
	$stateArray = $state->search_state();
	$smarty->assign('stateArray', $stateArray);
	SmartyPaginate::assign($smarty);
	$smarty->display('state/search_state.tpl');

?>