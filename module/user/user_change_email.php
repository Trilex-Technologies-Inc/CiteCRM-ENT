<?php
/**  
 *
 * Type:     Cite CMS PHP Page<br>
 * Name:     userView.php<br>
 * Purpose:  Displays a single Users Details<br>
 * 
 * @author jaimie@citesoftware.com
 * @access Public
 * @version 1.0
*/

// Validate authentication
$auth = &new Auth($db, '/index.php?page=user:user_login', 'secret');



$smarty->display('user/user_change_email.tpl');
?>