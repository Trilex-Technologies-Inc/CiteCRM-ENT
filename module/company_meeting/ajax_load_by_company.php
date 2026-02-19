<?php


$core->verifyAdmin(CAN_READ);

require(CLASS_PATH.'/core/company_meeting.class.php');
require(SMARTY_PATH.'/SmartyPaginate.class.php');

$meetingObj     = new company_meeting();
$company_id     = $_POST['company_id'];
$field          = $_POST['field'];
$sort           = $_POST['sort'];
$next           = $_REQUEST['next'];


if(empty($field)){$field='company_meeting_start';}
if(empty($sort)){$sort='ASC';}

$_GET['next'] = $next;


// Clear Pagination
if(!isset($_REQUEST["next"])) {
    SmartyPaginate::disconnect("meeting");
}

// Paginate
SmartyPaginate::connect("meeting");

SmartyPaginate::setLimit(PAGINATION,"meeting");

$start  = SmartyPaginate::getCurrentIndex("meeting");

$limit  = SmartyPaginate::getLimit("meeting");


SmartyPaginate::setUrl('',"meeting",true);


$meeting_array = $meetingObj->load_by_company($company_id,$field,$sort,$start,$limit,&$total);

$smarty->assign('total',$total);


SmartyPaginate::setTotal($total,"meeting"); 

SmartyPaginate::assign($smarty,"paginate","meeting");


$smarty->assign('startItem', SmartyPaginate::getCurrentItem("meeting"));

if(SmartyPaginate::getCurrentItem("meeting") + $limit < $total) {
    $smarty->assign('endItem', SmartyPaginate::getCurrentItem("meeting") + $limit);

} else {
    $smarty->assign('endItem',$total);
}


$smarty->assign('field',$field);

$smarty->assign('sort',$sort);

$smarty->assign('next', $next);


    
$smarty->assign('meeting_array', $meeting_array);
    
$smarty->display('company_meeting/ajax_load_by_company.tpl');
?>