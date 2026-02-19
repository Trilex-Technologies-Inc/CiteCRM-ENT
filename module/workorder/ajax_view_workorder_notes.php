<?php
/**
 * Type:     Cite CMS PHP Page<br>
 * Name:     ajax_view_workorder_notes.php<br>
 * Purpose:  View a Single Work Order row<br>
 * 
 * @author Cite CMS Module Developer
 * @access Public
 * @version 1.0
*/
$core->verifyAdmin(CAN_READ);
	
require(CLASS_PATH.'/core/workorder_note.class.php');
require(SMARTY_PATH.'/SmartyPaginate.class.php');

$workorder_note 		= new workorder_note();

$workorder_id = $_REQUEST['workorder_id'];

$field		= $_POST['field'];
$sort		= $_POST['sort'];
$next 		= $_REQUEST['next'];


if(empty($field)){$field='workorder_id';}
if(empty($sort)){$sort='ASC';}

$_GET['next'] = $next;


// Clear Pagination
if(!isset($_REQUEST["next"])) {
	SmartyPaginate::disconnect("notes");
}

// Paginate
SmartyPaginate::connect("notes");

SmartyPaginate::setLimit(5,"notes");

$start	= SmartyPaginate::getCurrentIndex("notes");

$limit	= SmartyPaginate::getLimit("notes");


SmartyPaginate::setUrl('',"notes",true);


$workorder_note_array = $workorder_note->load_by_workorder_id($workorder_id,$field,$sort,$start,$limit,&$total);
	
$smarty->assign('total',$total);


SmartyPaginate::setTotal($total,"notes"); 

SmartyPaginate::assign($smarty,"paginate","notes");


$smarty->assign('startItem', SmartyPaginate::getCurrentItem("notes"));

if(SmartyPaginate::getCurrentItem("notes") + $limit < $total) {
	$smarty->assign('endItem', SmartyPaginate::getCurrentItem("notes") + $limit);

} else {
	$smarty->assign('endItem',$total);
}


$smarty->assign('field',$field);

$smarty->assign('sort',$sort);

$smarty->assign('next', $next);




	$smarty->assign('workorder_note_array', $workorder_note_array);
	
	$smarty->display('workorder/ajax_view_workorder_notes.tpl');
	
?>