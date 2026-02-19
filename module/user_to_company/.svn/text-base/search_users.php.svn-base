<?php
/**  
 *
 * Type:     Cite CMS PHP Page<br>
 * Name:     search_users.php<br>
 * Purpose:  Searches Users<br>
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


$username		= $_REQUEST['username'];
$email			= $_REQUEST['email'];
$first_name		= $_REQUEST['first_name'];
$last_name		= $_REQUEST['last_name'];
$user_status	= $_REQUEST['user_status'];
$user_type		= $_REQUEST['user_type'];


// Paginate
if(!isset($_REQUEST["next"])) {
	SmartyPaginate::disconnect("user");
}

SmartyPaginate::connect("user");

SmartyPaginate::setLimit(50,"user");

$start	= SmartyPaginate::getCurrentIndex("user");

$limit	= SmartyPaginate::getLimit("user");

SmartyPaginate::setUrl("/index.php?page=user_to_company:search_users&username=$username&email=$email&first_name=$first_name&last_name=$last_name&user_status=$user_status&user_type=$user_type","user");

// Load Array
$userArray = $user->search_user($username,$email,$first_name,$last_name,$user_status,$user_type,$start,$limit,&$total);

SmartyPaginate::setTotal($total,"user");   

$smarty->assign('userArray', $userArray);

SmartyPaginate::assign($smarty,"paginate","user");

$smarty->display('user_to_company/add_user_to_company_frm.tpl');
?>