<?php
//ajax_load_employee_workorders.php
$core->verifyAdmin(CAN_READ);

require_once(CLASS_PATH."/core/workorder.class.php");
require(SMARTY_PATH.'/SmartyPaginate.class.php');

$user_id = $_REQUEST['user_id'];

$field      = $_POST['field'];
$sort       = $_POST['sort'];
$next       = $_REQUEST['next'];

$smarty->assign('user_id',$user_id);

$workorder = new Workorder();

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

$start  = SmartyPaginate::getCurrentIndex("workorder");

$limit  = SmartyPaginate::getLimit("workorder");


SmartyPaginate::setUrl('',"workorder",true);


$workorder_array = $workorder->load_by_user_id($user_id,$field,$sort,$and,$start,$limit,&$total);

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


$smarty->assign('workorder_array', $workorder_array);

$smarty->assign('workorder_status', 'Employee');

$smarty->display('workorder/ajax_load_workorder_by_employee.tpl');

?>