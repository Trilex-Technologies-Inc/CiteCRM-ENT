<?php

/**
 * @author 
 * @copyright 2007
 */

$core->verifyAdmin(CAN_READ);
require_once(CLASS_PATH.'/core/workorder_service.class.php');
require_once(SMARTY_PATH.'/SmartyPaginate.class.php');
require_once(CLASS_PATH."/core/workorder.class.php");

$workorder_service = new workorder_service();
$workorderObj = new workorder();

$workorder_id = $_POST['workorder_id'];
$field		= $_POST['field'];
$sort		= $_POST['sort'];
$next 		= $_REQUEST['next'];

// Check Active
$is_active = $workorderObj->is_active($workorder_id);
$smarty->assign('is_active',$is_active);

if(empty($field)){$field='workorder_service_id';}
if(empty($sort)){$sort='ASC';}

$_GET['next'] = $next;


// Clear Pagination
if(!isset($_REQUEST["next"])) {
	SmartyPaginate::disconnect("service");
}

// Paginate
SmartyPaginate::connect("service");

SmartyPaginate::setLimit(5,"service");

$start	= SmartyPaginate::getCurrentIndex("service");

$limit	= SmartyPaginate::getLimit("service");


SmartyPaginate::setUrl('',"service",true);

$workorder_service_array	= $workorder_service->load_by_workorder($workorder_id,$field,$sort,$start,$limit,&$total);

$smarty->assign('total',$total);


SmartyPaginate::setTotal($total,"service"); 

SmartyPaginate::assign($smarty,"paginate","service");


$smarty->assign('startItem', SmartyPaginate::getCurrentItem("service"));

if(SmartyPaginate::getCurrentItem("service") + $limit < $total) {
	$smarty->assign('endItem', SmartyPaginate::getCurrentItem("service") + $limit);

} else {
	$smarty->assign('endItem',$total);
}


$smarty->assign('field',$field);

$smarty->assign('sort',$sort);

$smarty->assign('next', $next);



$smarty->assign('workorder_service_array',$workorder_service_array);

$smarty->display('workorder/ajax_view_service.tpl');


?>