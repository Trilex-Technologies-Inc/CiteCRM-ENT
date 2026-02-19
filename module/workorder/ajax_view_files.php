<?php
$core->verifyAdmin(CAN_READ);

require_once(CLASS_PATH.'/core/file.class.php');
require(SMARTY_PATH.'/SmartyPaginate.class.php');

$workorder_id = $_REQUEST['workorder_id'];

$fileObj = new file();

$field		= $_POST['field'];
$sort		= $_POST['sort'];
$next 		= $_REQUEST['next'];


if(empty($field)){$field='workorder_id';}
if(empty($sort)){$sort='ASC';}

$_GET['next'] = $next;


// Clear Pagination
if(!isset($_REQUEST["next"])) {
	SmartyPaginate::disconnect("files");
}

// Paginate
SmartyPaginate::connect("files");

SmartyPaginate::setLimit(5,"files");

$start	= SmartyPaginate::getCurrentIndex("files");

$limit	= SmartyPaginate::getLimit("files");


SmartyPaginate::setUrl('',"files",true);


$fileArray = $fileObj->load_by_type('workorder_id',$workorder_id,$field='file_id',$sort='ASC',$start=0,$limit=5,&$total);

$smarty->assign('total',$total);


SmartyPaginate::setTotal($total,"files"); 

SmartyPaginate::assign($smarty,"paginate","files");


$smarty->assign('startItem', SmartyPaginate::getCurrentItem("files"));

if(SmartyPaginate::getCurrentItem("notes") + $limit < $total) {
	$smarty->assign('endItem', SmartyPaginate::getCurrentItem("files") + $limit);

} else {
	$smarty->assign('endItem',$total);
}


$smarty->assign('field',$field);

$smarty->assign('sort',$sort);

$smarty->assign('next', $next);

$smarty->assign('fileArray',$fileArray);

$smarty->display('file/ajax_load_file.tpl');

?>