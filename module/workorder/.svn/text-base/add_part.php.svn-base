<?php
/**
 * Type:     Cite CMS PHP Page<br>
 * Name:     add_parts.php<br>
 * Purpose:  Add New Work Order<br>
 * 
 * @author Cite CMS Module Developer
 * @access Public
 * @version 1.0
*/
$core->verifyAdmin(CAN_CREATE);

$smarty->caching = false;

$workorder_id = $_REQUEST['workorder_id'];



// Load Systems
require(CLASS_PATH."/core/system.class.php");
$system		= new system();
$system_array 	= $system->load_by_workorder_id($workorder_id,'system.system_id','ASC',0,0,&$total);	
$smarty->assign('system_array',$system_array);
		



if(isset($_REQUEST['Submit'])){
	require(CLASS_PATH.'/core/workorder.class.php');
    require(CLASS_PATH."/core/product.class.php");


	$product_id			= $_REQUEST['product_id'];
	$workorder_id		= $_REQUEST['workorder_id'];
	$qty				= $_REQUEST['product_qty'];
	$system_id			= $_REQUEST['system_id'];
		
	$workorder = new workorder();

    $productObj = new product();

    $productObj->view_product($product_id);

    $product_to_workorder_amount = $productObj->get_product_price();

    $product_to_workorder_sub_total = $qty * $product_to_workorder_amount;

    $product_to_workorder_description = $productObj->fields['product_name'];
	
	$workorder->add_product_to_workorder($product_id,$workorder_id,$product_to_workorder_description,$qty,$product_to_workorder_amount,$product_to_workorder_sub_total);

	// Map Part to system
	if($system_id > 0) {
		require_once(CLASS_PATH . "/core/system.class.php");
		
		$systemObj = new System();
	
		$systemObj->map_product_to_system($system_id,$product_id,$qty,$workorder_id);
	
	} 


} else {

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
		
		$smarty->display('workorder/search_product.tpl');
        
		
	} else {
	
		
	
		$smarty->assign('categoryArray', $categoryArray);

		$smarty->display('workorder/loadAjaxSubCategory.tpl');
	}


}

?>