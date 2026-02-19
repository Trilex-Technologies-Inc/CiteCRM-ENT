<?php
$core->verifyAdmin(CAN_READ);

require_once(CLASS_PATH."/core/workorder.class.php");
require(SMARTY_PATH.'/SmartyPaginate.class.php');

$workorder = new Workorder();

$system_id	= $_POST['system_id'];
$field		= $_POST['field'];
$sort		= $_POST['sort'];
$next 		= $_REQUEST['next'];

if(empty($field)){$field='workorder.workorder_id';}
if(empty($sort)){$sort='ACS';}

$_GET['next'] = $next;


// Clear Pagination
if(!isset($_REQUEST["next"])) {
	SmartyPaginate::disconnect("system");
}

// Paginate
SmartyPaginate::connect("system");

SmartyPaginate::setLimit(5,"system");

$start	= SmartyPaginate::getCurrentIndex("system");

$limit	= SmartyPaginate::getLimit("system");


SmartyPaginate::setUrl('',"system",true);


$workorder_array = $workorder->load_by_system($system_id,$field,$sort,$start,$limit,&$total);


$smarty->assign('total',$total);


SmartyPaginate::setTotal($total,"system"); 

SmartyPaginate::assign($smarty,"paginate","system");


$smarty->assign('startItem', SmartyPaginate::getCurrentItem("system"));

if(SmartyPaginate::getCurrentItem("system") + $limit < $total) {
	$smarty->assign('endItem', SmartyPaginate::getCurrentItem("system") + $limit);

} else {
	$smarty->assign('endItem',$total);
}


$smarty->assign('field',$field);

$smarty->assign('sort',$sort);

$smarty->assign('next', $next);

$smarty->assign('workorder_array', $workorder_array);

$smarty->display('workorder/ajax_load_by_system.tpl');

?>