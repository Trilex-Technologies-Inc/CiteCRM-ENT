<?php
/**
 * Type:     Cite CMS PHP Page<br>
 * Name:     ajax_view_workorder_notes.php<br>
 * Purpose:  View a Single Work Order row<br>
 * 
 * @author Cite CMS Module Developer
 * @access Public
 * @version 1.0
*/
$core->verifyAdmin(CAN_READ);
	
require_once(CLASS_PATH.'/core/product.class.php');
require_once(SMARTY_PATH.'/SmartyPaginate.class.php');
require_once(CLASS_PATH."/core/workorder.class.php");

$product	 = new product();
$workorderObj = new workorder();

$workorder_id = $_REQUEST['workorder_id'];

$field		= $_POST['field'];
$sort		= $_POST['sort'];
$next 		= $_REQUEST['next'];

// Check Active
$is_active = $workorderObj->is_active($workorder_id);
$smarty->assign('is_active',$is_active);


if(empty($field)){$field='product.product_id';}
if(empty($sort)){$sort='ASC';}

$_GET['next'] = $next;


// Clear Pagination
if(!isset($_REQUEST["next"])) {
	SmartyPaginate::disconnect("product");
}

// Paginate
SmartyPaginate::connect("product");

SmartyPaginate::setLimit(5,"product");

$start	= SmartyPaginate::getCurrentIndex("product");

$limit	= SmartyPaginate::getLimit("product");


SmartyPaginate::setUrl('',"product",true);

	$product_array = $product->load_product_by_workorder($workorder_id,$field,$sort,$start,$limit,&$total);
	
$smarty->assign('total',$total);


SmartyPaginate::setTotal($total,"product"); 

SmartyPaginate::assign($smarty,"paginate","product");


$smarty->assign('startItem', SmartyPaginate::getCurrentItem("product"));

if(SmartyPaginate::getCurrentItem("product") + $limit < $total) {
	$smarty->assign('endItem', SmartyPaginate::getCurrentItem("product") + $limit);

} else {
	$smarty->assign('endItem',$total);
}


$smarty->assign('field',$field);

$smarty->assign('sort',$sort);

$smarty->assign('next', $next);



$smarty->assign('product_array',	$product_array);
	
$smarty->display('workorder/ajax_view_workorder_products.tpl');
	
?>