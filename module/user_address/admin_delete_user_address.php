<?php
/**  
 *
 * Type:     Cite CMS PHP Page<br>
 * Name:     admin_update_user_address.php<br>
 * Purpose:  Delete a User Address<br>
 * 
 * @author jaimie@citesoftware.com
 * @access Public
 * @version 1.0
*/

$core->verifyAdmin();

require(CLASS_PATH."/core/user_address.class.php");

$address = new user_address();

$address->delete_user_address($_REQUEST);

$core->force_page('/index.php?page=user:admin_view_user_detail&userID='.$_REQUEST['user_id']);

?>