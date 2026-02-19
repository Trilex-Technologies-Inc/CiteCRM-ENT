<?php
/**
 * Type:     Cite CMS PHP Page<br>
 * Name:     ajax_load_by_user.php<br>
 * Purpose:  View users systems<br>
 * 
 * @author Cite CMS Module Developer
 * @access Public
 * @version 1.0
*/
$core->verifyAdmin(CAN_READ);

require_once(CLASS_PATH.'/core/system.class.php');
require_once(SMARTY_PATH.'/SmartyPaginate.class.php');

$system = new System();

$user_id	= $_REQUEST['user_id'];
$field		= $_POST['field'];
$sort		= $_POST['sort'];
$next 		= $_REQUEST['next'];

if(empty($field)){$field='system_id';}
if(empty($sort)){$sort='ASC';}

$_GET['next'] = $next;

// Paginate
SmartyPaginate::connect("system");

SmartyPaginate::setLimit(PAGINATION,"system");

$start	= SmartyPaginate::getCurrentIndex("system");

$limit	= SmartyPaginate::getLimit("system");


SmartyPaginate::setUrl('',"system",true);

$system_array = $system->load_by_user_id($user_id,$field,$sort,$start,$limit,&$total);


$smarty->assign('total',$total);


SmartyPaginate::setTotal($total,"system"); 

SmartyPaginate::assign($smarty,"paginate","system");


$smarty->assign('startItem', SmartyPaginate::getCurrentItem("system"));

if(SmartyPaginate::getCurrentItem("system") + $limit < $total) {
	$smarty->assign('endItem', SmartyPaginate::getCurrentItem("system") + $limit);

} else {
	$smarty->assign('endItem',$total);
}

$smarty->assign('field',$field);

$smarty->assign('sort',$sort);

$smarty->assign('next', $next);


$smarty->assign('system_array', $system_array);

$smarty->display('system/ajax_load_by_user.tpl');
?>
