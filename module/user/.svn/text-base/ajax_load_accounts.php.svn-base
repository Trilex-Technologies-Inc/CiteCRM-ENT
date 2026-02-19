<?php
$core->verifyAdmin(CAN_READ);

require_once(CLASS_PATH."/core/company.class.php");
require_once(SMARTY_PATH.'/SmartyPaginate.class.php');

$companyObj = new company();

$user_id 	= $_SESSION['SESSION_USER_ID'];
$field		= $_POST['field'];
$sort			= $_POST['sort'];
$next 		= $_REQUEST['next'];


if(empty($field)){$field='company_id';}
if(empty($sort)){$sort='ASC';}

$_GET['next'] = $next;


// Clear Pagination
if(!isset($_GET['next'])) {
	SmartyPaginate::disconnect("company");
}

SmartyPaginate::connect("company");

SmartyPaginate::setLimit(SMALLPAGINATION,"company");

$start	= SmartyPaginate::getCurrentIndex("company");

$limit	= SmartyPaginate::getLimit("company");


SmartyPaginate::setUrl('',"company",true);

// ARRAY
$companyArray = $companyObj->load_by_assigned($user_id,$field,$sort,$start,$limit,&$total);

$smarty->assign('total',$total);


SmartyPaginate::setTotal($total,"company"); 

SmartyPaginate::assign($smarty,"paginate","company");


$smarty->assign('startItem', SmartyPaginate::getCurrentItem("company"));

if(SmartyPaginate::getCurrentItem("company") + $limit < $total) {
	$smarty->assign('endItem', SmartyPaginate::getCurrentItem("company") + $limit);
} else {
	$smarty->assign('endItem',$total);
}


$smarty->assign('field',$field);

$smarty->assign('sort',$sort);

$smarty->assign('next', $next);

$smarty->assign('companyArray',$companyArray);

$smarty->display('user/ajax_load_accounts.tpl');

?>