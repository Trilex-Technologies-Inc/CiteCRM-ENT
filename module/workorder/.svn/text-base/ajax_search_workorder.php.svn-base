<?php
/**
* Type:     Cite CMS PHP Page<br>
* Name:     search_workorder.php<br>
* Purpose:  Search Work Order<br>
* 
* @Author Cite CMS Module Developer
* @access Public
* @version 1.0
*/
$core->verifyAdmin(CAN_READ);

require(CLASS_PATH.'/core/workorder.class.php');
require(SMARTY_PATH.'/SmartyPaginate.class.php');

$workorderObj = new workorder();

$field		= $_POST['field'];
$sort		= $_POST['sort'];
$next 		= $_REQUEST['next'];


// And

if(!empty($_POST['upcCode'])) {
   
    $workorder_id = substr($_POST['upcCode'],3);

    $and .= " AND workorder_id = " . $db->qstr($workorder_id);

} else {

    if(!empty($_POST['workorder_id'])){$and .= " AND workorder_id = " . $db->qstr($_POST['workorder_id']);}
}
   
    if($_POST['workorder_status'] != 'Select One' && $_POST['workorder_status'] > 0) {$and .= " AND workorder_status = " . $db->qstr($_POST['workorder_status']);}
    
    if($_POST['workorder_assigned_to'] != 'Select One' &&$_POST['workorder_assigned_to'] > 0 ) {$and .= " AND workorder_assigned_to = " . $db->qstr($_POST['workorder_assigned_to']);}
    
    if(!empty($_POST['workorder_active'])){$and .= " AND workorder_active = " . $db->qstr($_POST['workorder_active']);}

if(!empty($_POST['workorder_open_date'])) {

	$_os = strtotime($_POST['workorder_open_date']);
	$_oc = strtotime($_POST['workorder_open_date_c']);

	$openStart = mktime(0,0,0,date("m",$_os),date("d",$_os),date("Y",$_os));

	$openEnd = mktime(23,59,59,date("m",$_oc),date("d",$_oc),date("Y",$_oc));

	$and .= " AND workorder_open_date >= " . $db->qstr($openStart);

	$and .= " AND workorder_open_date <= " . $db->qstr($openEnd);

}
if(!empty($_POST['workorder_close_date'])) {

	$_os = strtotime($_POST['workorder_close_date']);
	$_oc = strtotime($_POST['workorder_close_date_c']);

	$closeStart = mktime(0,0,0,date("m",$_os),date("d",$_os),date("Y",$_os));

	$closeEnd = mktime(23,59,59,date("m",$_oc),date("d",$_oc),date("Y",$_oc));


	$and .= " AND workorder_close_date >= " . $db->qstr($closeStart);

	$and .= " AND workorder_open_date <= " . $db->qstr($closeEnd);
}


if(empty($field)){$field='workorder_id';}
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

$smarty->display('workorder/ajax_search_workorder.tpl');

?>