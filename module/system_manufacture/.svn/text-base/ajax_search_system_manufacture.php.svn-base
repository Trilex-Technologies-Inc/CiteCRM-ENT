<?php

/**
 * @author Jaimie
 * @copyright 2007
 */

$core->verifyAdmin(CAN_READ);

require_once(CLASS_PATH."/core/system_manufacture.class.php");
require_once(SMARTY_PATH.'/SmartyPaginate.class.php');

$manufactureObj = new system_manufacture();

$field		= $_POST['field'];
$sort		= $_POST['sort'];
$next 		= $_REQUEST['next'];

if(empty($field)){$field='manufacture_name';}
if(empty($sort)){$sort='ASC';}

$_GET['next'] = $next;

// Set up search params
if(!empty($_POST['manufacture_name'])) {
	$and .= " AND manufacture_name LIKE  '%".$_POST['manufacture_name']."%'";
}


// Clear Pagination
if(!isset($_REQUEST["next"])) {
	SmartyPaginate::disconnect("manufacture");
}

// Paginate
SmartyPaginate::connect("manufacture");

SmartyPaginate::setLimit(PAGINATION,"manufacture");

$start	= SmartyPaginate::getCurrentIndex("manufacture");

$limit	= SmartyPaginate::getLimit("manufacture");


SmartyPaginate::setUrl('',"manufacture",true);

$system_manufacture_array = $manufactureObj->search_system_manufacture($field,$sort,$and,$start,$limit,&$total);


$smarty->assign('total',$total);


SmartyPaginate::setTotal($total,"manufacture"); 

SmartyPaginate::assign($smarty,"paginate","manufacture");


$smarty->assign('startItem', SmartyPaginate::getCurrentItem("manufacture"));

if(SmartyPaginate::getCurrentItem("manufacture") + $limit < $total) {
	$smarty->assign('endItem', SmartyPaginate::getCurrentItem("manufacture") + $limit);

} else {
	$smarty->assign('endItem',$total);
}


$smarty->assign('field',$field);

$smarty->assign('sort',$sort);

$smarty->assign('next', $next);


$smarty->assign('system_manufacture_array', $system_manufacture_array);

$smarty->display('system_manufacture/ajax_search_system_manufacture.tpl');

?>