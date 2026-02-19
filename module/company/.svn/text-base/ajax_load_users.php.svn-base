<?php
/**
 * Type:     Cite CMS PHP Page<br>
 * Name:     ajax_load_users_by_company.php<br>
 * Purpose:  View a Company Users assigned to a company<br>
 * 
 * @author Cite CMS Module Developer
 * @access Public
 * @version 1.0
*/

$core->verifyAdmin(CAN_READ);


require_once(CLASS_PATH.'/core/user.class.php');
require(SMARTY_PATH.'/SmartyPaginate.class.php');
	
$user				= new User();

$company_id	= $_POST['company_id'];
$field		= $_POST['field'];
$sort		= $_POST['ssort'];
$next 		= $_REQUEST['next'];


if(empty($field)){$field='workorder_id';}
if(empty($sort)){$sort='ASC';}

$_GET['next'] = $next;


// Clear Pagination
if(!isset($next)) {
	SmartyPaginate::disconnect("users");
}

// Paginate
SmartyPaginate::connect("users");

SmartyPaginate::setLimit(PAGINATION,"users");

$start	= SmartyPaginate::getCurrentIndex("users");

$limit	= SmartyPaginate::getLimit("users");


SmartyPaginate::setUrl('',"users",true);

$user_array = $user->load_by_company_id($company_id,$field,$sort,$start,$limit,&$total);


$smarty->assign('total',$total);


SmartyPaginate::setTotal($total,"users"); 

SmartyPaginate::assign($smarty,"paginate","users");


$smarty->assign('startItem', SmartyPaginate::getCurrentItem("users"));

if(SmartyPaginate::getCurrentItem("users") + $limit < $total) {
	$smarty->assign('endItem', SmartyPaginate::getCurrentItem("users") + $limit);

} else {
	$smarty->assign('endItem',$total);
}


$smarty->assign('field',$field);

$smarty->assign('sort',$sort);

$smarty->assign('next', $next);


	
$smarty->assign('user_array', $user_array);
	
$smarty->display('user/ajax_load_user_by_company.tpl');

?>