<?php
//ajax_load_employee_support
$core->verifyAdmin(CAN_READ);
require_once(CLASS_PATH."/core/support_call.class.php");
require(SMARTY_PATH.'/SmartyPaginate.class.php');

$supportCallObj = new support_call();

$employee_id = $_POST['user_id'];

$field      = $_POST['field'];
$sort       = $_POST['sort'];
$next       = $_REQUEST['next'];

if(empty($field)){$field='support_call_id';}
if(empty($sort)){$sort='ASC';}

$_GET['next'] = $next;

// Clear Pagination
if(!isset($_REQUEST["next"])) {
    SmartyPaginate::disconnect("support_calls");
}

// Paginate
SmartyPaginate::connect("support_calls");

SmartyPaginate::setLimit(PAGINATION,"support_calls");

$start  = SmartyPaginate::getCurrentIndex("support_calls");

$limit  = SmartyPaginate::getLimit("support_calls");


SmartyPaginate::setUrl('',"support_calls",true);

$support_call_array = $supportCallObj->load_by_empoloyee($employee_id,$field,$sort,$start,$limit,&$total);

$smarty->assign('total',$total);


SmartyPaginate::setTotal($total,"support_calls"); 

SmartyPaginate::assign($smarty,"paginate","support_calls");


$smarty->assign('startItem', SmartyPaginate::getCurrentItem("support_calls"));

if(SmartyPaginate::getCurrentItem("support_calls") + $limit < $total) {
    $smarty->assign('endItem', SmartyPaginate::getCurrentItem("support_calls") + $limit);

} else {
    $smarty->assign('endItem',$total);
}


$smarty->assign('field',$field);

$smarty->assign('sort',$sort);

$smarty->assign('next', $next);

$smarty->assign('support_call_array',$support_call_array);

$smarty->display('user/ajax_load_employee_support.tpl');

?>