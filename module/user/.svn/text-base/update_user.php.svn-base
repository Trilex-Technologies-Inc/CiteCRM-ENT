<?php
/** Update User
 * Type:     Cite CMS PHP Page<br>
 * Name:     add_state.php<br>
 * Purpose:  Add New State<br>
 * 
 * @author Cite CMS Module Developer
 * @access Public
 * @version 1.0
*/

$auth = &new Auth($db, '/index.php?page=user:userLogin', 'secret');

require(CLASS_PATH.'/core/user.class.php');

$user = new User();

$user->loadUserByID($_SESSION['SESSION_USER_ID']);

$smarty->assign('user', $user);

if(isset($_REQUEST['submit'])){

	SmartyValidate::connect($smarty);
	
	if(SmartyValidate::is_valid($_POST)) {
	
		SmartyValidate::disconnect();
		
		$user->update_user($_REQUEST);
		
		$core->force_page('/index.php?page=user:view_user');
		
	} else {
	
		$smarty->assign('errorOccurred', true);
	
		$smarty->display('user/update_user_frm.tpl');
		
	}

} else {

	SmartyValidate::connect($smarty, true);
	
	SmartyValidate::register_form('update_user_frm');
	
	$smarty->display('user/update_user_frm.tpl');

}

?>