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



$core->verifyAdmin();

// instantiate the class
$user 		= new user();


// Paginate
// Paginate
if(!isset($_REQUEST["next"])) {
	SmartyPaginate::disconnect("user");
}

SmartyPaginate::connect("user");

SmartyPaginate::setLimit(50,"user");

SmartyPaginate::setUrl('/?page=user:admin_view_all_users',"user");

$start	= SmartyPaginate::getCurrentIndex("user");

$limit	= SmartyPaginate::getLimit("user");

$userArray = $user->loadAllUsers($start,$limit,&$total);

$smarty->assign('userArray', $userArray);

SmartyPaginate::setTotal($total,"user"); 

SmartyPaginate::assign($smarty,"paginate","user");


$smarty->display('user/admin_view_all_users.tpl');

?>