<?php

/**
 * @author Jaimie
 * @copyright 2007
 */

require_once(CLASS_PATH."/core/company_task.class.php");
require(SMARTY_PATH.'/SmartyPaginate.class.php');

$taskObj = new company_task();

$company_id	= $_POST['company_id'];
$field		= $_POST['field'];
$sort		= $_POST['sort'];
$next 		= $_REQUEST['next'];

if(empty($field)){$field='company_task_priority';}
if(empty($sort)){$sort='ASC';}



$_GET['next'] = $next;


// Clear Pagination
if(!isset($_REQUEST["next"])) {
	SmartyPaginate::disconnect("task");
}

// Paginate
SmartyPaginate::connect("task");

SmartyPaginate::setLimit(PAGINATION,"task");

$start	= SmartyPaginate::getCurrentIndex("task");

$limit	= SmartyPaginate::getLimit("task");


SmartyPaginate::setUrl('',"task",true);

$task_array = $taskObj->load_by_company($company_id,$and,$field,$sort,$start,$limit,&$total);

$smarty->assign('total',$total);


SmartyPaginate::setTotal($total,"task"); 

SmartyPaginate::assign($smarty,"paginate","task");


$smarty->assign('startItem', SmartyPaginate::getCurrentItem("task"));

if(SmartyPaginate::getCurrentItem("task") + $limit < $total) {
	$smarty->assign('endItem', SmartyPaginate::getCurrentItem("task") + $limit);

} else {
	$smarty->assign('endItem',$total);
}


$smarty->assign('field',$field);

$smarty->assign('sort',$sort);

$smarty->assign('next', $next);

$smarty->assign('task_array', $task_array);


$smarty->display('company_task/ajax_load_by_company.tpl');

?>