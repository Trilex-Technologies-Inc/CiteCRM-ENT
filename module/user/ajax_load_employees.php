<?php
$core->verifyAdmin(CAN_READ);

require(CLASS_PATH."/core/user.class.php");
require(SMARTY_PATH.'/SmartyPaginate.class.php');

// instantiate the class
$user 		= new user();

$field		= $_POST['field'];
$sort		= $_POST['sort'];
$next 		= $_REQUEST['next'];

// And
// username
if(!empty($_POST['username'])) {$and .= " AND user_username LIKE " . $db->qstr($_POST['username']."%");}
		
// email
if(!empty($_POST['email'])) {$and .= " AND user_email = " . $db->qstr($_POST['email']);}
		
// First Name
if(!empty($_POST['first_name'])) {$and .= " AND user_first_name LIKE " . $db->qstr($_POST['first_name']."%");}
		
// Last Name
if(!empty($_POST['last_name'])) {$and .= " AND user_last_name LIKE " . $db->qstr($_POST['last_name']."%");}
		
// User Status
if(!empty($_POST['user_status'])) {$and .= " AND user_status = " . $db->qstr($_POST['user_status']);}

if(empty($field)){$field='user_id';}
if(empty($sort)){$sort='ASC';}

$_GET['next'] = $next;


// Clear Pagination
if(!isset($_REQUEST["next"])) {
	SmartyPaginate::disconnect("employee");
}

// Paginate
SmartyPaginate::connect("employee");

SmartyPaginate::setLimit(15,"employee");

$start	= SmartyPaginate::getCurrentIndex("employee");

$limit	= SmartyPaginate::getLimit("employee");


SmartyPaginate::setUrl('',"employee",true);


// Load Array
$userArray = $user->load_employees($field,$sort,$and,$start,$limit,&$total);

$smarty->assign('total',$total);


SmartyPaginate::setTotal($total,"employee"); 

SmartyPaginate::assign($smarty,"paginate","employee");


$smarty->assign('startItem', SmartyPaginate::getCurrentItem("employee"));

if(SmartyPaginate::getCurrentItem("employee") + $limit < $total) {
	$smarty->assign('endItem', SmartyPaginate::getCurrentItem("employee") + $limit);

} else {
	$smarty->assign('endItem',$total);
}


$smarty->assign('field',$field);

$smarty->assign('sort',$sort);

$smarty->assign('next', $next);


$smarty->assign('userArray', $userArray);

$smarty->display('user/ajax_load_employees.tpl');



?>