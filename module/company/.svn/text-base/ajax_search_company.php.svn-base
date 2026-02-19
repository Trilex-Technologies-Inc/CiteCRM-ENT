<?php
/**
 * Type:     Cite CMS PHP Page<br>
 * Name:     search_company.php<br>
 * Purpose:  Search Company<br>
 * 
 * @author Cite CMS Module Developer
 * @access Public
 * @version 1.0
*/
$core->verifyAdmin(CAN_READ);

require(CLASS_PATH.'/core/company.class.php');
require(SMARTY_PATH.'/SmartyPaginate.class.php');

$companyObj = new company();

$field		= $_POST['field'];
$sort		= $_POST['sort'];
$next 		= $_REQUEST['next'];

// Set up search params
if(!empty($_POST['company_name'])) {
	$and .= " AND company_name LIKE  '%".$_POST['company_name']."%'";
}


$and .= " AND company_active = " . $db->qstr($_POST['company_active']);


if(!empty($_POST['company_create_date'])) {
	$and .= " AND company_create_date = " . $db->qstr($_POST['company_create_date']);
}

if(empty($field)){$field='company_name';}
if(empty($sort)){$sort='ASC';}

$_GET['next'] = $next;


// Clear Pagination
if(!isset($_REQUEST["next"])) {
	SmartyPaginate::disconnect("company");
}

// Paginate
SmartyPaginate::connect("company");

SmartyPaginate::setLimit(PAGINATION,"company");

$start	= SmartyPaginate::getCurrentIndex("company");

$limit	= SmartyPaginate::getLimit("company");


SmartyPaginate::setUrl('',"company",true);


$companyArray = $companyObj->search_company($field,$sort,$and,$start,$limit,&$total);

$smarty->assign('total',$total);


SmartyPaginate::setTotal($total,"company"); 

SmartyPaginate::assign($smarty,"paginate","company");


$smarty->assign('startItem', SmartyPaginate::getCurrentItem("company"));

if(SmartyPaginate::getCurrentItem("company") + $limit < $total) {
	$smarty->assign('endItem', SmartyPaginate::getCurrentItem("company") + $limit);

} else {
	$smarty->assign('endItem',$total);
}


$smarty->assign('field',$field);

$smarty->assign('sort',$sort);

$smarty->assign('next', $next);


$smarty->assign('companyArray', $companyArray);

$smarty->display('company/ajax_search_company.tpl');

$core->log_action($_SESSION['SESSION_USER_ID'],'Search','Searched Companies');
?>