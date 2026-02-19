<?php
/**
 * Type:     Cite CMS PHP Page<br>
 * Name:     ajax_view_workorder_time.php<br>
 * Purpose:  View workorder Time<br>
 * 
 * @author Cite CMS Module Developer
 * @access Public
 * @version 1.0
*/
$core->verifyAdmin(CAN_READ);
require_once(CLASS_PATH.'/core/workorder_time.class.php');
require_once(SMARTY_PATH.'/SmartyPaginate.class.php');
require_once(CLASS_PATH."/core/workorder.class.php");

$workorder_time = new workorder_time();
$workorderObj = new workorder();

$workorder_id = $_POST['workorder_id'];

$company_id	= $_POST['company_id'];
$field		= $_POST['field'];
$sort		= $_POST['sort'];
$next 		= $_REQUEST['next'];

// Check Active
$is_active = $workorderObj->is_active($workorder_id);
$smarty->assign('is_active',$is_active);

if(empty($field)){$field='workorder_time_start';}
if(empty($sort)){$sort='ASC';}

$_GET['next'] = $next;


// Clear Pagination
if(!isset($_REQUEST["next"])) {
	SmartyPaginate::disconnect("time");
}

// Paginate
SmartyPaginate::connect("time");

SmartyPaginate::setLimit(5,"time");

$start	= SmartyPaginate::getCurrentIndex("time");

$limit	= SmartyPaginate::getLimit("time");


SmartyPaginate::setUrl('',"time",true);

$workorder_time_array	= $workorder_time->load_by_workorder($workorder_id,$field,$sort,$start,$limit,&$total);

$smarty->assign('total',$total);


SmartyPaginate::setTotal($total,"time"); 

SmartyPaginate::assign($smarty,"paginate","time");


$smarty->assign('startItem', SmartyPaginate::getCurrentItem("time"));

if(SmartyPaginate::getCurrentItem("time") + $limit < $total) {
	$smarty->assign('endItem', SmartyPaginate::getCurrentItem("time") + $limit);

} else {
	$smarty->assign('endItem',$total);
}


$smarty->assign('field',$field);

$smarty->assign('sort',$sort);

$smarty->assign('next', $next);



$smarty->assign('workorder_time_array',$workorder_time_array);

$smarty->display('workorder/ajax_view_workorder_time.tpl');

?>