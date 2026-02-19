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
require_once(CLASS_PATH."/core/lead.class.php");
require_once(SMARTY_PATH.'/SmartyPaginate.class.php');

$leadObj = new lead();


$field		= $_POST['field'];
$sort		= $_POST['sort'];
$next 		= $_REQUEST['next'];

if($_POST['lead_assigned_user'] == 'Select One') {
    $_POST['lead_assigned_user'] = '';
}

//And
if(!empty($_POST['company_id'])) {$and .= " AND company_id = " . $db->qstr($_POST['company_id']);}
if(!empty($_POST['lead_campaign'])) {$and .= " AND lead_campaign = " . $db->qstr($_POST['lead_campaign']);}
if($_POST['lead_assigned_user'] != ""	) {$and .= " AND lead_assigned_user = " . $db->qstr($_POST['lead_assigned_user']);}
if(!empty($_POST['lead_referer'])) {$and .= " AND lead_referer LIKE " . $db->qstr("%".$_POST['lead_referer']."%");}
if($_POST['lead_status_id'] > 1) {$and .= " AND lead_status_id = " . $db->qstr($_POST['lead_status_id']);}
if($_POST['lead_type_id'] > 1) {$and .= " AND lead_type_id = " . $db->qstr($_POST['lead_type_id']);}

if(!empty($_POST['lead_create_date'])) {

	$_os = strtotime($_POST['lead_create_date']);
	$_oc = strtotime($_POST['lead_create_date_c']);

	$openStart = mktime(0,0,0,date("m",$_os),date("d",$_os),date("Y",$_os));
	$openEnd = mktime(23,59,59,date("m",$_oc),date("d",$_oc),date("Y",$_oc));

	$and .= " AND lead_create_date >= " . $db->qstr($openStart);
	$and .= " AND lead_create_date <= " . $db->qstr($openEnd);

}


if(empty($field)){$field='lead_id';}
if(empty($sort)){$sort='DESC';}

$_GET['next'] = $next;


// Clear Pagination
if(!isset($_REQUEST["next"])) {
	SmartyPaginate::disconnect("leads");
}

// Paginate
SmartyPaginate::connect("leads");

SmartyPaginate::setLimit(15,"leads");

$start	= SmartyPaginate::getCurrentIndex("leads");

$limit	= SmartyPaginate::getLimit("leads");


SmartyPaginate::setUrl('',"leads",true);


$leadArray = $leadObj->search_leads($field,$sort,$and,$start,$limit,&$total);

$smarty->assign('total',$total);


SmartyPaginate::setTotal($total,"leads"); 

SmartyPaginate::assign($smarty,"paginate","leads");


$smarty->assign('startItem', SmartyPaginate::getCurrentItem("leads"));

if(SmartyPaginate::getCurrentItem("leads") + $limit < $total) {
	$smarty->assign('endItem', SmartyPaginate::getCurrentItem("leads") + $limit);

} else {
	$smarty->assign('endItem',$total);
}


$smarty->assign('field',$field);

$smarty->assign('sort',$sort);

$smarty->assign('next', $next);


$smarty->assign('leadArray', $leadArray);


$smarty->display('leads/ajax_search_leads.tpl');

?>