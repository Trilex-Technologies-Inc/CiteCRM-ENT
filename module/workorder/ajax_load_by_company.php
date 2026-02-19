<?php
/**
 * Type:     Cite CMS PHP Page<br>
 * Name:     ajax_load_workorder_by_company.php<br>
 * Purpose:  View a Company workorder assigned to a company<br>
 * 
 * @author Cite CMS Module Developer
 * @access Public
 * @version 1.0
*/	

$core->verifyAdmin(CAN_READ);

require_once(CLASS_PATH."/core/workorder.class.php");
require(SMARTY_PATH.'/SmartyPaginate.class.php');


$workorder				= new Workorder();

$company_id	= $_POST['company_id'];
$field		= $_POST['field'];
$sort		= $_POST['sort'];
$next 		= $_REQUEST['next'];


if(empty($field)){$field='workorder_id';}
if(empty($sort)){$sort='ASC';}

$_GET['next'] = $next;


// Clear Pagination
if(!isset($_REQUEST["next"])) {
	SmartyPaginate::disconnect("company");
}

// Paginate
SmartyPaginate::connect("company");

SmartyPaginate::setLimit(PAGINATION,"company");

$start	= SmartyPaginate::getCurrentIndex("company");

$limit	= SmartyPaginate::getLimit("company");


SmartyPaginate::setUrl('',"company",true);

$workorder_array = $workorder->load_by_company_id($company_id,$field,$sort,$start,$limit,&$total);


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

$smarty->assign('workorder_array', $workorder_array);


$smarty->display('workorder/ajax_load_by_company.tpl');



?>