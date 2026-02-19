<?php
/**
 * Type:     Cite CMS PHP Page<br>
 * Name:     search_product.php<br>
 * Purpose:  Search Products<br>
 * 
 * @author Cite CMS Module Developer
 * @access Public
 * @version 1.0
*/

require(CLASS_PATH.'/core/category.class.php');

	$category 	= new category();
		
	$parentID 		= $_REQUEST['parent_id'];

	$categoryArray = $category->loadParent($parentID, $total);
	
	if(count($categoryArray) == 0) {
	
		require(CLASS_PATH.'/core/product.class.php');		
		require(SMARTY_PATH.'/SmartyPaginate.class.php');
						
		$product		= new product();
				
		// Load Category
		$category_id = $parentID;	
		$parent_id = $category->loadParentIDBYChild($parentID);
		$smarty->assign('category_id',$category_id);		
		$smarty->assign('parent_id',$parent_id);

				
		$field		= $_POST['field'];
		$sort		= $_POST['sort'];
		$next 		= $_REQUEST['next'];

		if(empty($field)){$field='product_id';}
		if(empty($sort)){$sort='ASC';}
		

		$_GET['next'] = $next;

		// Clear Pagination
		if($_GET['next'] < 1) {
			SmartyPaginate::disconnect("parts");
		}
		
		// Paginate
		SmartyPaginate::connect("parts");
		
		SmartyPaginate::setLimit(15,"parts");
		
		$start	= SmartyPaginate::getCurrentIndex("parts");
		
		$limit	= SmartyPaginate::getLimit("parts");
		
		
		SmartyPaginate::setUrl('',"parts",true);
			
		// Load Products
		$productArray = $product->loadByCategoryID($category_id,$field,$sort,$start,$limit,&$total);
	

		$smarty->assign('total',$total);


		SmartyPaginate::setTotal($total,"parts"); 
		
		SmartyPaginate::assign($smarty,"paginate","parts");
		
		
		$smarty->assign('startItem', SmartyPaginate::getCurrentItem("parts"));
		
		if(SmartyPaginate::getCurrentItem("parts") + $limit < $total) {
			$smarty->assign('endItem', SmartyPaginate::getCurrentItem("parts") + $limit);		
		} else {
			$smarty->assign('endItem',$total);
		}
	
		
		$smarty->assign('field',$field);
		
		$smarty->assign('sort',$sort);
		
		$smarty->assign('next', $next);

		
		$smarty->assign('productArray', $productArray);
		
		$smarty->display('product/ajax_display_product_list.tpl');
		
	} else {
	
		
	
		$smarty->assign('categoryArray', $categoryArray);

		$smarty->display('product/loadAjaxSubCategory.tpl');
	}

?>