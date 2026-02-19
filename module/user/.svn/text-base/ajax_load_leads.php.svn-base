<?php
$core->verifyAdmin(CAN_READ);

require_once(CLASS_PATH."/core/lead.class.php");
require(SMARTY_PATH.'/SmartyPaginate.class.php');

$leadObj = new lead();

$field		= $_POST['field'];
$sort			= $_POST['sort'];
$next 		= $_REQUEST['next'];
$user_id		= $_SESSION['SESSION_USER_ID'];

if(empty($field)){$field='lead_id';}
if(empty($sort)){$sort='ASC';}

$_GET['next'] = $next;


// Clear Pagination
if(!isset($_REQUEST["next"])) {
	SmartyPaginate::disconnect("leads");
}

// Paginate
SmartyPaginate::connect("leads");

SmartyPaginate::setLimit(15,"leads");

$start	= SmartyPaginate::getCurrentIndex("leads");

$limit	= SmartyPaginate::getLimit("leads");


SmartyPaginate::setUrl('',"leads",true);


$leadArray = $leadObj->load_by_user($user_id,$field,$sort,$start=0,$limit=15,&$total);

$smarty->assign('total',$total);


SmartyPaginate::setTotal($total,"leads"); 

SmartyPaginate::assign($smarty,"paginate","leads");


$smarty->assign('startItem', SmartyPaginate::getCurrentItem("leads"));

if(SmartyPaginate::getCurrentItem("leads") + $limit < $total) {
	$smarty->assign('endItem', SmartyPaginate::getCurrentItem("leads") + $limit);

} else {
	$smarty->assign('endItem',$total);
}


$smarty->assign('field',$field);

$smarty->assign('sort',$sort);

$smarty->assign('next', $next);


$smarty->assign('leadArray', $leadArray);


$smarty->display('user/ajax_load_leads.tpl');

?>