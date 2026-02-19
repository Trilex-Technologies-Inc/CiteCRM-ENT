<?php
$core->verifyAdmin();

require(CLASS_PATH.'/core/calendar.class.php');

require(SMARTY_PATH.'/SmartyPaginate.class.php');

$calendarObj = new calendar();

$smarty->assign('calendarObj',$calendarObj);

$day 	= $_REQUEST['day'];
$month	= $_REQUEST['month'];
$year	= $_REQUEST['year'];
$field	= $_REQUEST['field'];
$sort	= $_REQUEST['sort'];
$start	= $_REQUEST['start'];
$limit	= $_REQUEST['limit'];
$next	= $_REQUEST['next'];

if(empty($field)){$field='calendar_hour';}
if(empty($sort)){$sort='ASC';}

$_GET['next'] = $next;

// Paginate
SmartyPaginate::connect("calendar");

SmartyPaginate::setLimit(PAGINATION,"calendar");

$start	= SmartyPaginate::getCurrentIndex("calendar");

$limit	= SmartyPaginate::getLimit("calendar");

SmartyPaginate::setUrl('',"calendar",true);


$dayArray = $calendarObj->load_day($day,$month,$year,$field,$sort,$start,$limit,&$total);


$smarty->assign('total',$total);

SmartyPaginate::setTotal($total,"calendar"); 

SmartyPaginate::assign($smarty,"paginate","calendar");


$smarty->assign('startItem', SmartyPaginate::getCurrentItem("calendar"));

if(SmartyPaginate::getCurrentItem("calendar") + $limit < $total) {
	$smarty->assign('endItem', SmartyPaginate::getCurrentItem("calendar") + $limit);
} else {
	$smarty->assign('endItem',$total);
}


$smarty->assign('field',$field);

$smarty->assign('sort',$sort);

$smarty->assign('next', $next);

$smarty->assign('dayArray',$dayArray);

$smarty->display('calendar/ajax_load_day.tpl');


?>