<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     search_user_type.php<br>
	* Purpose:  Search User Type<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/
$core->verifyAdmin(SUPER_USER);
$smarty->display('user_type/search_user_type.tpl');

?>