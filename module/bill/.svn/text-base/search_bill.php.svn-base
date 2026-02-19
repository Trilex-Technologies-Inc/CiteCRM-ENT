<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     search_bill.php<br>
	* Purpose:  Search Bills<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/bill.class.php');
	require(SMARTY_PATH.'/SmartyPaginate.class.php');

	// Paginate
	SmartyPaginate::connect();
	SmartyPaginate::setLimit(50);
	SmartyPaginate::setUrl('/?page=bill:search_bill');

	$bill = new bill();
	$billArray = $bill->search_bill();
	$smarty->assign('billArray', $billArray);
	SmartyPaginate::assign($smarty);
	$smarty->display('bill/search_bill.tpl');

?>