<?php
/**  
 *
 * Type:     Cite CMS PHP Page<br>
 * Name:     adminViewAllUsers.php<br>
 * Purpose:  Displays all users<br>
 * 
 * @author jaimie@citesoftware.com
 * @access Public
 * @version 1.0
*/

require(CLASS_PATH."/core/user.class.php");
require(SMARTY_PATH.'/SmartyPaginate.class.php');

$core->verifyAdmin(CAN_READ);

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
		
// User Type
if(!empty($_POST['user_type'])) {
	$and .= " AND user_type_id = " . $db->qstr($_POST['user_type']);
} else {
	$and .= " AND user_type_id !='1'";
}


if(empty($field)){$field='workorder_id';}
if(empty($sort)){$sort='ASC';}

$_GET['next'] = $next;


// Clear Pagination
if(!isset($_REQUEST["next"])) {
	SmartyPaginate::disconnect("users");
}

// Paginate
SmartyPaginate::connect("users");

SmartyPaginate::setLimit(15,"users");

$start	= SmartyPaginate::getCurrentIndex("users");

$limit	= SmartyPaginate::getLimit("users");


SmartyPaginate::setUrl('',"users",true);


// Load Array
$userArray = $user->search_user($field,$sort,$and,$start,$limit,&$total);

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


$smarty->assign('userArray', $userArray);

$smarty->display('user/ajax_search_user.tpl');




?>