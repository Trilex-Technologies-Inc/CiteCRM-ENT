<?php
/**
 * Type:     Cite CMS PHP Page<br>
 * Name:     search_category.php<br>
 * Purpose:  Search Category<br>
 * 
 * @author Cite CMS Module Developer
 * @access Public
 * @version 1.0
*/

	require(CLASS_PATH.'/core/category.class.php');
	
	require(SMARTY_PATH.'/SmartyPaginate.class.php');
	
	$category = new category();
	
	$smarty->caching = false;

	$parentID = 0;
	
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

		$smarty->display('category/search_category.tpl');

?>