<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     add_user_type.php<br>
	* Purpose:  Add New User Type<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/
$core->verifyAdmin(SUPER_USER);

require(CLASS_PATH.'/core/user_type.class.php');

// If form Submission
if(isset($_POST['submit']) ) {

	$user_type_text = $_POST['user_type_text'];
	
	$user_type = new user_type();
	
	$user_type_id = $user_type->add_user_type($user_type_text);

} else {


	$smarty->display('user_type/add_user_type_frm.tpl');
}
?>