<?php
/**
* Type:     Cite CMS PHP Page<br>
* Name:     ajax_load_workorders.php<br>
* Purpose:  Search Work Order<br>
* 
* @Author Cite CMS Module Developer
* @access Public
* @version 1.0
*/
$core->verifyAdmin();
require(CLASS_PATH.'/core/workorder.class.php');
require(SMARTY_PATH.'/SmartyPaginate.class.php');

$workorderObj = new workorder();

$field		= $_POST['field'];
$sort		= $_POST['sort'];
$next 		= $_REQUEST['next'];
$and		= '';
// And
$and .= " AND workorder_assigned_to = " . $db->qstr($_SESSION['SESSION_USER_ID']);

if(empty($field)){$field='workorder_active';}
if(empty($sort)){$sort='DESC';}

$_GET['next'] = $next;


// Clear Pagination
if(!isset($_REQUEST["next"])) {
	SmartyPaginate::disconnect("workorder");
}

// Paginate
SmartyPaginate::connect("workorder");

SmartyPaginate::setLimit(15,"workorder");

$start	= SmartyPaginate::getCurrentIndex("workorder");

$limit	= SmartyPaginate::getLimit("workorder");


SmartyPaginate::setUrl('',"workorder",true);

$workorderArray = $workorderObj->search_workorder($field,$sort,$and,$start,$limit,&$total);


$smarty->assign('total',$total);


SmartyPaginate::setTotal($total,"workorder"); 

SmartyPaginate::assign($smarty,"paginate","workorder");


$smarty->assign('startItem', SmartyPaginate::getCurrentItem("workorder"));

if(SmartyPaginate::getCurrentItem("workorder") + $limit < $total) {
	$smarty->assign('endItem', SmartyPaginate::getCurrentItem("workorder") + $limit);

} else {
	$smarty->assign('endItem',$total);
}


$smarty->assign('field',$field);

$smarty->assign('sort',$sort);

$smarty->assign('next', $next);

$smarty->assign('workorderArray',$workorderArray);

$smarty->display('user/ajax_load_workorders.tpl');

?>