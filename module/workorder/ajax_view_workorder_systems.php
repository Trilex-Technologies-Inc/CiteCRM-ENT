<?php
/**
 * Type:     Cite CMS PHP Page<br>
 * Name:     ajax_view_workorder_systems.php<br>
 * Purpose:  View Workorder systems row<br>
 * 
 * @author Cite CMS Module Developer
 * @access Public
 * @version 1.0
*/

$core->verifyAdmin(CAN_READ);

require_once(CLASS_PATH.'/core/system.class.php');
require_once(SMARTY_PATH.'/SmartyPaginate.class.php');
require_once(CLASS_PATH."/core/workorder.class.php");


$system = new System();
$workorderObj = new workorder();

$workorder_id = $_REQUEST['workorder_id'];

$field		= $_POST['field'];
$sort		= $_POST['sort'];
$next 		= $_REQUEST['next'];

// Check Active
$is_active = $workorderObj->is_active($workorder_id);
$smarty->assign('is_active',$is_active);

if(empty($field)){$field='workorder_id';}
if(empty($sort)){$sort='ASC';}

$_GET['next'] = $next;


// Clear Pagination
if(!isset($_REQUEST["next"])) {
	SmartyPaginate::disconnect("systems");
}

// Paginate
SmartyPaginate::connect("systems");

SmartyPaginate::setLimit(5,"systems");

$start	= SmartyPaginate::getCurrentIndex("systems");

$limit	= SmartyPaginate::getLimit("systems");


SmartyPaginate::setUrl('',"systems",true);


$system_array = $system->load_by_workorder_id($workorder_id,$field,$sort,$start,$limit,&$total);


$smarty->assign('total',$total);


SmartyPaginate::setTotal($total,"systems"); 

SmartyPaginate::assign($smarty,"paginate","systems");


$smarty->assign('startItem', SmartyPaginate::getCurrentItem("systems"));

if(SmartyPaginate::getCurrentItem("systems") + $limit < $total) {
	$smarty->assign('endItem', SmartyPaginate::getCurrentItem("systems") + $limit);

} else {
	$smarty->assign('endItem',$total);
}


$smarty->assign('field',$field);

$smarty->assign('sort',$sort);

$smarty->assign('next', $next);


$smarty->assign('system_array',	$system_array);

$smarty->assign('edit', $_POST['edit']);

$smarty->display('workorder/ajax_view_workorder_system.tpl');

?>