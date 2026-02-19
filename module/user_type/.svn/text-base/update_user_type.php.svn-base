<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     update_user_type.php<br>
	* Purpose:  Update a Single User Type row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/
$core->verifyAdmin(SUPER_USER);
	require(CLASS_PATH.'/core/user_type.class.php');


// If form Submission
if(isset($_POST['submit']) ) {

	$user_type_text	= $_POST['user_type_text'];
	
	$user_type_id = $_POST['user_type_id'];

	$user_type = new user_type();
	
	$user_type->update_user_type($user_type_id,$user_type_text);
			
	
} else {
	// Display the Form

	$user_type = new user_type();
	$user_type->view_user_type($_POST['user_type_id']);

	$smarty->assign('user_type',$user_type);
	$smarty->display('user_type/update_user_type_frm.tpl');
}
?>