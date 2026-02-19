<?php
$core->verifyAdmin(CAN_READ);

require_once(CLASS_PATH."/core/alert.class.php");
require_once(SMARTY_PATH.'/SmartyPaginate.class.php');

$alertObj = new alert();

$user_id 	= $_SESSION['SESSION_USER_ID'];
$field		= $_POST['field'];
$sort		= $_POST['sort'];
$next 		= $_REQUEST['next'];


if(empty($field)){$field='alert.alert_id';}
if(empty($sort)){$sort='ASC';}

$_GET['next'] = $next;

// Clear Pagination
if(!isset($_GET['next'])) {
	SmartyPaginate::disconnect("alerts");
}

SmartyPaginate::connect("alerts");

SmartyPaginate::setLimit(SMALLPAGINATION,"alerts");

$start	= SmartyPaginate::getCurrentIndex("alerts");

$limit	= SmartyPaginate::getLimit("alerts");


SmartyPaginate::setUrl('',"alerts",true);

// ARRAY
$alertArray = $alertObj->load_by_user($user_id,$field,$sort,$start,$limit,$total);


$smarty->assign('total',$total);


SmartyPaginate::setTotal($total,"alerts"); 

SmartyPaginate::assign($smarty,"paginate","alerts");


$smarty->assign('startItem', SmartyPaginate::getCurrentItem("alerts"));

if(SmartyPaginate::getCurrentItem("alerts") + $limit < $total) {
	$smarty->assign('endItem', SmartyPaginate::getCurrentItem("alerts") + $limit);
} else {
	$smarty->assign('endItem',$total);
}


$smarty->assign('field',$field);

$smarty->assign('sort',$sort);

$smarty->assign('next', $next);

$smarty->assign('alertArray',$alertArray);


$smarty->display('user/ajax_load_alerts.tpl');

?>