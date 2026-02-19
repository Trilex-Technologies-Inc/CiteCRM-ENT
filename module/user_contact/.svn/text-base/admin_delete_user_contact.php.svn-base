<?php
require(CLASS_PATH."/core/user_contact.class.php");


$core->verifyAdmin();

$contact = new user_contact();
		
$contact->deleteContact($_REQUEST);
		
$core->force_page('/index.php?page=user:admin_view_user_detail&userID='. $_REQUEST['user_id']);




?>