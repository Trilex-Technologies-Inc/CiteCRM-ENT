<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     view_category.php<br>
	* Purpose:  View a Single Category row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/category.class.php');
	
	require(SMARTY_PATH.'/SmartyPaginate.class.php');

	$smarty->caching = false;
		
	$category = new category();	

	$parentID = $_REQUEST['category_id'];

	
	// Paginate
	SmartyPaginate::connect();
		
	SmartyPaginate::setLimit(50);

	SmartyPaginate::setUrl('/?page=category:search_category');
		
	$start = SmartyPaginate::getCurrentIndex();
		
	$limit = SmartyPaginate::getLimit();
		
	$categoryArray = $category->loadParent($parentID, $total,$start,$limit);
		
	SmartyPaginate::setTotal($total);
		
	$smarty->assign('categoryArray', $categoryArray);
		
	SmartyPaginate::assign($smarty);

	$smarty->assign('categoryArray', $categoryArray);

	$smarty->display('category/view_category.tpl');



?>