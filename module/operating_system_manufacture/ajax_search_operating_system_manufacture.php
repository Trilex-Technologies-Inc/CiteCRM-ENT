<?php

/**
 * @author Jaimie
 * @copyright 2007
 */

$core->verifyAdmin(SUPER_USER);
require_once(CLASS_PATH."/core/operating_system_manufacture.class.php");
require_once(SMARTY_PATH.'/SmartyPaginate.class.php');

$manufactureObj = new operating_system_manufacture();

$field		= $_POST['field'];
$sort		= $_POST['sort'];
$next 		= $_REQUEST['next'];

if(empty($field)){$field='operating_system_manufacture_name';}
if(empty($sort)){$sort='ASC';}


$_GET['next'] = $next;

// Set up search params
if(!empty($_POST['operating_system_manufacture_name'])) {
	$and .= " AND operating_system_manufacture_name LIKE  '%".$_POST['operating_system_manufacture_name']."%'";
}

// Clear Pagination
if(!isset($_REQUEST["next"])) {
	SmartyPaginate::disconnect("operating_manufacture");
}

// Paginate
SmartyPaginate::connect("operating_manufacture");

SmartyPaginate::setLimit(PAGINATION,"operating_manufacture");

$start	= SmartyPaginate::getCurrentIndex("operating_manufacture");

$limit	= SmartyPaginate::getLimit("operating_manufacture");


SmartyPaginate::setUrl('',"operating_manufacture",true);

// Array
$operating_system_manufacture_array = $manufactureObj->search_operating_system_manufacture($field,$sort,$and,$start,$limit,&$total);

$smarty->assign('total',$total);


SmartyPaginate::setTotal($total,"operating_manufacture"); 

SmartyPaginate::assign($smarty,"paginate","operating_manufacture");


$smarty->assign('startItem', SmartyPaginate::getCurrentItem("operating_manufacture"));

if(SmartyPaginate::getCurrentItem("operating_manufacture") + $limit < $total) {
	$smarty->assign('endItem', SmartyPaginate::getCurrentItem("operating_manufacture") + $limit);

} else {
	$smarty->assign('endItem',$total);
}


$smarty->assign('field',$field);

$smarty->assign('sort',$sort);

$smarty->assign('next', $next);


$smarty->assign('operating_system_manufacture_array', $operating_system_manufacture_array);

$smarty->display('operating_system_manufacture/ajax_search_operating_system_manufacture.tpl');

?>