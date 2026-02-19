<?php
$core->verifyAdmin(CAN_READ);

require_once(CLASS_PATH.'/core/file.class.php');
require(SMARTY_PATH.'/SmartyPaginate.class.php');

$user_id = $_SESSION['SESSION_USER_ID'];

$fileObj = new file();

$field      = $_POST['field'];
$sort       = $_POST['sort'];
$next       = $_REQUEST['next'];


if(empty($field)){$field='user_id';}
if(empty($sort)){$sort='ASC';}

$_GET['next'] = $next;


// Clear Pagination
if(!isset($_REQUEST["next"])) {
    SmartyPaginate::disconnect("files");
}

// Paginate
SmartyPaginate::connect("files");

SmartyPaginate::setLimit(5,"files");

$start  = SmartyPaginate::getCurrentIndex("files");

$limit  = SmartyPaginate::getLimit("files");


SmartyPaginate::setUrl('',"files",true);


$fileArray = $fileObj->load_by_type('user_id',$user_id,$field,$sort,$start,$limit,&$total);

$smarty->assign('total',$total);


SmartyPaginate::setTotal($total,"files"); 

SmartyPaginate::assign($smarty,"paginate","files");


$smarty->assign('startItem', SmartyPaginate::getCurrentItem("files"));

if(SmartyPaginate::getCurrentItem("notes") + $limit < $total) {
    $smarty->assign('endItem', SmartyPaginate::getCurrentItem("files") + $limit);

} else {
    $smarty->assign('endItem',count($fileArray));
}


$smarty->assign('field',$field);

$smarty->assign('sort',$sort);

$smarty->assign('next', $next);

$smarty->assign('fileArray',$fileArray);

$smarty->display('user/ajax_load_files.tpl');

?>