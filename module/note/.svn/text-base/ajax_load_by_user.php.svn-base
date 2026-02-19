<?php
$core->verifyAdmin(CAN_READ);

require(CLASS_PATH.'/core/note.class.php');
require(SMARTY_PATH.'/SmartyPaginate.class.php');

$noteObj = new note();

$user_id		= $_POST['user_id'];
$field			= $_POST['field'];
$sort			= $_POST['sort'];
$next 			= $_REQUEST['next'];
$note_type		= 'user_id';
$note_type_id 	= $user_id;

if(empty($field)){$field='note_create_date';}
if(empty($sort)){$sort='ASC';}

$_GET['next'] = $next;


// Clear Pagination
if(!isset($_REQUEST["next"])) {
	SmartyPaginate::disconnect("note");
}

// Paginate
SmartyPaginate::connect("note");

SmartyPaginate::setLimit(PAGINATION,"note");

$start	= SmartyPaginate::getCurrentIndex("note");

$limit	= SmartyPaginate::getLimit("note");


SmartyPaginate::setUrl('',"note",true);


$noteArray = $noteObj->load_by_type($note_type,$note_type_id,$field,$sort,$start,$limit,&$total);

$smarty->assign('total',$total);


SmartyPaginate::setTotal($total,"note"); 

SmartyPaginate::assign($smarty,"paginate","note");


$smarty->assign('startItem', SmartyPaginate::getCurrentItem("note"));

if(SmartyPaginate::getCurrentItem("note") + $limit < $total) {
	$smarty->assign('endItem', SmartyPaginate::getCurrentItem("note") + $limit);

} else {
	$smarty->assign('endItem',$total);
}


$smarty->assign('field',$field);

$smarty->assign('sort',$sort);

$smarty->assign('next', $next);


	
$smarty->assign('noteArray', $noteArray);
	
$smarty->display('note/ajax_load_by_company.tpl');


?>