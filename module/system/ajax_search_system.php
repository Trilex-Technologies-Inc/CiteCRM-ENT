<?php
/**
 * Type:     Cite CMS PHP Page<br>
 * Name:     search_system.php<br>
 * Purpose:  Search System<br>
 * 
 * @author Cite CMS Module Developer
 * @access Public
 * @version 1.0
*/
$core->verifyAdmin();

require(CLASS_PATH.'/core/system.class.php');
require(SMARTY_PATH.'/SmartyPaginate.class.php');

$system = new system();

$field		= $_POST['field'];
$sort		= $_POST['sort'];
$next 		= $_REQUEST['next'];

//And
if(!empty($_POST['upcCode'])) {
	$system_id = str_replace("SYS", "", $_POST['upcCode']);
	$and .= " AND system_id = " . $db->qstr($system_id);	
}

if(!empty($_POST['system_name'])) {$and .= " AND system_name LIKE " . $db->qstr("%".$_POST['system_name']."%");}
if(!empty($_POST['system_ip_address'])) {$and .= " AND system_ip_address = " . $db->qstr($_POST['system_ip_address']);}
if(!empty($_POST['system_host_name'])) {$and .= " AND system_host_name LIKE" . $db->qstr("%".$_POST['system_host_name']."%");}
if(!empty($_POST['system_active'])) {$and .= " AND system_active = " . $db->qstr($_POST['system_active']);}

if(!empty($_POST['system_last_service'])) {
	$_os = strtotime($_POST['system_last_service']);
	$_oc = strtotime($_POST['system_last_service_c']);

	$openStart = mktime(0,0,0,date("m",$_os),date("d",$_os),date("Y",$_os));
	$openEnd = mktime(23,59,59,date("m",$_oc),date("d",$_oc),date("Y",$_oc));

	$and .= " AND system_last_service >= " . $db->qstr($openStart);
	$and .= " AND system_last_service <= " . $db->qstr($openEnd);
}

if(empty($field)){$field='system_id';}
if(empty($sort)){$sort='DESC';}

$_GET['next'] = $next;


// Clear Pagination
if(!isset($_REQUEST["next"])) {
	SmartyPaginate::disconnect("system");
}

// Paginate
SmartyPaginate::connect("system");

SmartyPaginate::setLimit(15,"system");

$start	= SmartyPaginate::getCurrentIndex("system");

$limit	= SmartyPaginate::getLimit("system");


SmartyPaginate::setUrl('',"system",true);

$systemArray = $system->search_system($field,$sort,$and,$start,$limit,&$total);

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

$smarty->assign('systemArray',$systemArray);

$smarty->display('system/ajax_search_systems.tpl');

?>